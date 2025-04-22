<?php declare(strict_types=1);

use CondorcetPHP\Condorcet\Election;

require_once __DIR__ . '/vendor/autoload.php';

// Directory path for code snippets
const SNIPPETS_DIR = __DIR__ . '/docs/code_snippets';

// Init var
$myCandidateFile = file_get_contents(SNIPPETS_DIR . '/candidates.txt');


// Get all PHP files from the code_snippets directory
$phpFiles = [];

// Check if directory exists
if (is_dir(SNIPPETS_DIR)) {
    // Use DirectoryIterator to scan the directory
    foreach (new DirectoryIterator(SNIPPETS_DIR) as $fileInfo) {
        if ($fileInfo->isFile() && $fileInfo->getExtension() === 'php') {
            $phpFiles[] = $fileInfo->getPathname();
        }
    }
}

// Display the list of PHP files found
foreach ($phpFiles as $file) {
    echo "\nTesting file: " . basename($file) . PHP_EOL;

    try {
        // Read the file content
        $code = file_get_contents($file);

        // Remove the opening PHP tag if it exists
        $code = preg_replace('/^<\?php\s+/', '', $code);

        // Replace input
        $code = str_replace('candidates.txt', SNIPPETS_DIR . '/candidates.txt', $code);

        // Init common var
        $election = new Election;
        $election1 = clone $election;
        $election2 = clone $election;

        // Evaluate the code
        eval($code);
    } catch (Throwable $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }

    echo "------------------------" . PHP_EOL;
}

