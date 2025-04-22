<?php declare(strict_types=1);

require_once __DIR__ . '/vendor/autoload.php';

// Directory path for code snippets
const SNIPPETS_DIR = __DIR__ . '/docs/code_snippets';

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

        // Evaluate the code
        eval($code);
    } catch (Throwable $e) {
        echo "Error: " . $e->getMessage() . PHP_EOL;
    }

    echo "------------------------" . PHP_EOL;
}

