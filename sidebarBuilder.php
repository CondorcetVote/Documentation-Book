<?php

declare(strict_types=1);

use League\Flysystem\StorageAttributes;

require_once 'vendor/autoload.php';

const LIST_SYMBOL = '*';

$adapter = new League\Flysystem\Local\LocalFilesystemAdapter(__DIR__.'/docs/book');
$filesystem = new League\Flysystem\Filesystem($adapter);

$listing = $filesystem->listContents('.', true)
    ->filter(fn (StorageAttributes $attributes) => $attributes->isFile())
    ->filter(fn (StorageAttributes $attributes) => str_ends_with($attributes->path(), '.md'))
    ->filter(fn (StorageAttributes $attributes) => ! str_starts_with($attributes->path(), '_'))
    ->filter(fn (StorageAttributes $attributes) => ! str_contains($attributes->path(), 'SUMMARY'))
    ->filter(fn (StorageAttributes $attributes) => ! str_ends_with($attributes->path(), 'index.md'))
    ->sortByPath();

// Create an array structure for the sidebar
$sidebarItems = [];

// Add the first item - Condorcet Presentation
$sidebarItems[] = [
    'text' => 'Get started',
    'link' => '/book/1.Start'
];
$sidebarItems[] = [
    'text' => 'Complete Readme',
    'link' => '/gh/Readme'
];

// Store file information for processing
$fileEntries = [];

// First pass: collect all file information
foreach ($listing as $file) {
    $fileContent = file_get_contents(__DIR__.'/docs/book/'.$file->path());

    $re = '/#(.*)\n/m';
    preg_match_all($re, $fileContent, $matches, PREG_SET_ORDER, 0);

    $firstMatch = reset($matches);
    $title = is_array($firstMatch) ? $firstMatch[1] : false;

    if (is_string($title)) {
        $pathParts = explode(DIRECTORY_SEPARATOR, $file->path());
        $fileName = array_pop($pathParts);

        $title = removeIndex(trim($title));

        $thePath = !str_contains($file->path(), '1.Start') ? $file->path() : 'README';
        $thePath = 'book/'.$thePath;
        $link = str_replace('.md', '', '/'.$thePath);

        $fileEntries[] = [
            'path' => $pathParts,
            'title' => $title,
            'link' => $link,
            'fullPath' => $file->path()
        ];
    } else {
        throw new Exception($file->path().' has no title');
    }
}

// Build a nested structure based on directory hierarchy
$nestedSections = [];

// Process top-level sections first
foreach ($fileEntries as $entry) {
    if (count($entry['path']) === 0 && $entry['title'] !== 'Start') {
        // Top-level items
        $sidebarItems[] = [
            'text' => $entry['title'],
            'link' => $entry['link']
        ];
    } else if (count($entry['path']) > 0) {
        // Group by first level directory
        $mainSection = $entry['path'][0];

        if (!isset($nestedSections[$mainSection])) {
            $mainSectionTitle = preg_replace('/([a-z])([A-Z])/m', '$1 $2', $mainSection);
            $mainSectionTitle = removeIndex($mainSectionTitle);

            $nestedSections[$mainSection] = [
                'text' => $mainSectionTitle,
                'items' => [],
                'subSections' => []
            ];
        }

        // Handle different nesting levels
        if (count($entry['path']) === 1) {
            // Direct children of main section
            $nestedSections[$mainSection]['items'][] = [
                'text' => $entry['title'],
                'link' => $entry['link']
            ];
        } else if (count($entry['path']) > 1) {
            // Subsection items
            $subSection = $entry['path'][1];

            if (!isset($nestedSections[$mainSection]['subSections'][$subSection])) {
                $subSectionTitle = preg_replace('/([a-z])([A-Z])/m', '$1 $2', $subSection);
                $subSectionTitle = removeIndex($subSectionTitle);

                $nestedSections[$mainSection]['subSections'][$subSection] = [
                    'text' => $subSectionTitle,
                    'collapsed' => true,
                    'items' => []
                ];
            }

            $nestedSections[$mainSection]['subSections'][$subSection]['items'][] = [
                'text' => $entry['title'],
                'link' => $entry['link']
            ];
        }
    }
}

// Build the final structure
foreach ($nestedSections as $section) {
    $sectionEntry = [
        'text' => $section['text'],
        'items' => $section['items']
    ];

    // Add subsections if they exist
    foreach ($section['subSections'] as $subSection) {
        $sectionEntry['items'][] = $subSection;
    }

    $sidebarItems[] = $sectionEntry;
}

// Add the additional static items
$sidebarItems[] = [
    'text' => 'Voting Methods',
    'link' => '/gh/VotingMethods'
];

$sidebarItems[] = [
    'text' => 'API References',
    'link' => '/ApiReferences'
];

$sidebarItems[] = [
    'text' => 'Changelog',
    'link' => '/gh/Changelog'
];

// Convert to JSON
$jsonOutput = json_encode(
    value: $sidebarItems,
    flags: JSON_PRETTY_PRINT
);

// Write to file
file_put_contents(__DIR__.'/docs/.vitepress/sidebar.json', $jsonOutput);

function removeIndex(string $title): string
{
    $title = trim($title);

    return preg_replace('/^([0-9]\.)/m', '', $title) ?? $title;
}
