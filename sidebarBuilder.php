<?php

declare(strict_types=1);

use League\Flysystem\StorageAttributes;

require_once 'vendor/autoload.php';

const LIST_SYMBOL = '*';


$adapter = new League\Flysystem\Local\LocalFilesystemAdapter(__DIR__.'/docs');
$filesystem = new League\Flysystem\Filesystem($adapter);

$listing = $filesystem->listContents('.', true)
    ->filter(fn (StorageAttributes $attributes) => $attributes->isFile())
    ->filter(fn (StorageAttributes $attributes) => str_ends_with($attributes->path(), '.md'))
    ->filter(fn (StorageAttributes $attributes) => ! str_starts_with($attributes->path(), '_'))
    ->filter(fn (StorageAttributes $attributes) => ! str_contains($attributes->path(), 'SUMMARY'))
    ->sortByPath();

// var_dump($listing->toArray());

// Create an array structure for the sidebar
$sidebarItems = [];

// Add the first item - Condorcet Presentation
$sidebarItems[] = [
    'text' => 'Condorcet - Presentation',
    'link' => '/GithubReadme'
];

$currentSection = null;
$lastPath = false;
$currentSectionIndex = -1;

foreach ($listing as $file) {
    $fileContent = file_get_contents(__DIR__.'/docs/'.$file->path());

    $re = '/#(.*)\n/m';

    preg_match_all($re, $fileContent, $matches, PREG_SET_ORDER, 0);

    // Print the entire match result
    // var_dump($matches);
    $firstMatch = reset($matches);
    $title = is_array($firstMatch) ? $firstMatch[1] : false;

    if (is_string($title)) {
        $path = explode(DIRECTORY_SEPARATOR, $file->path());
        $fileName = array_pop($path);
        $folder = end($path);

        $depth = count($path);
        $depth < 0 && $depth = 0;

        $title = removeIndex(trim($title));

        $thePath = !str_contains($file->path(), '1.Start') ? $file->path() : 'README';
        $link = str_replace('.md', '', '/'.$thePath);

        if ($folder !== $lastPath && is_string($folder)) {
            $lastPath = $folder;
            $pathTitle = preg_replace('/([a-z])([A-Z])/m', '$1 $2', $folder);
            $pathTitle = removeIndex($pathTitle);

            // Create a new section
            $sidebarItems[] = [
                'text' => $pathTitle,
                'items' => []
            ];

            // Store the index of the current section
            $currentSectionIndex = count($sidebarItems) - 1;
        }

        // Add item to the current section or directly to sidebar if no section
        if ($currentSectionIndex >= 0 && $depth > 0) {
            // Add directly to the sidebar items array using the index
            $sidebarItems[$currentSectionIndex]['items'][] = [
                'text' => $title,
                'link' => $link
            ];
        } elseif ($depth === 0 && $title !== 'Start') {
            // Top level items
            $sidebarItems[] = [
                'text' => $title,
                'link' => $link
            ];
        }
    } else {
        throw new Exception($file->path().' has no title');
    }
}

// Add the additional static items
$sidebarItems[] = [
    'text' => 'Voting Methods',
    'link' => '/VotingMethods'
];

$sidebarItems[] = [
    'text' => 'API References',
    'link' => '/ApiReferences'
];

$sidebarItems[] = [
    'text' => 'Changelog',
    'link' => '/Changelog'
];

// Create the final sidebar structure
$sidebarStructure = [
    'sidebar' => $sidebarItems
];

// Convert to JSON
$jsonOutput = json_encode($sidebarStructure, JSON_PRETTY_PRINT);

// Output for debugging
var_dump($jsonOutput);

// Write to file
$filesystem->write('sidebar.json', $jsonOutput);


function removeIndex(string $title): string
{
    $title = trim($title);

    return preg_replace('/^([0-9]\.)/m', '', $title) ?? $title;
}
