<?php declare(strict_types=1);

namespace DriverNamespace;

use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\PdoDriver\PdoHandlerDriver;

require_once __DIR__ . '/vendor/autoload.php';

class NewHandlerDriver extends PdoHandlerDriver {
    public function __construct() {
        $sqlitePath = 'bdd.sqlite';

        if (file_exists($sqlitePath)) {
            unlink($sqlitePath);
        }

        parent::__construct(new \PDO('sqlite:'.$sqlitePath), true);
    }
}


namespace SnippetTester;

require_once __DIR__ . '/vendor/autoload.php';

// Check if assertions are enabled
if (!filter_var(ini_get('zend.assertions'), FILTER_VALIDATE_BOOLEAN)) {
    trigger_error('Warning: PHP assertions are disabled (zend.assertions=0). Some tests may not work as expected.', E_USER_WARNING);
}

use CondorcetPHP\Condorcet\Condorcet;
use CondorcetPHP\Condorcet\Election;
use DirectoryIterator;
use ReflectionClass;
use Throwable;

set_error_handler(function($errno, $errstr, $errfile, $errline) {
    // Converts warnings and other non-fatal errors into exceptions
    if ($errno !== E_ERROR) {
        throw new \ErrorException($errstr, 0, $errno, $errfile, $errline);
    }

    return false; // For fatal errors, let PHP handle normally
});

// Directory path for code snippets
const SNIPPETS_DIR = __DIR__ . '/docs/code_snippets';

// Init var
$myCandidatesToParse = file_get_contents(SNIPPETS_DIR . '/candidates.txt');
$myVotesToParse = file_get_contents(SNIPPETS_DIR . '/votes.txt');


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

// Init an election
$electionModel = new Election;
$electionWithVotesModel = new Election;
$electionWithVotesModel->parseCandidates('A;B;C');
$electionWithVotesModel->parseVotes('A > B > C * 3');


// Display the list of PHP files found
foreach ($phpFiles as $file)
{
    try {
        // Read the file content
        $code = file_get_contents($file);
        $code = str_replace("require '", "require '" . SNIPPETS_DIR . DIRECTORY_SEPARATOR, $code);

        // Remove the opening PHP tag if it exists
        $code = preg_replace('/^<\?php\s+/', '', $code);

        // Replace input
        $code = str_replace('candidates.txt', SNIPPETS_DIR . '/candidates.txt', $code);
        $code = str_replace('votes.txt', SNIPPETS_DIR . '/votes.txt', $code);
        $code = str_replace('debian_leader2020_tally.txt', SNIPPETS_DIR . '/debian_leader2020_tally.txt', $code);
        $code = str_replace('election.cef', SNIPPETS_DIR . '/election.cef', $code);
        $code = str_replace('david_hill_format.hil', SNIPPETS_DIR . '/david_hill_format.hil', $code);

        // Transform assert() calls to add a second argument new \Exception
        $code = preg_replace('/assert\((.+)\);/', 'assert($1, new \Exception("failed to assert"));', $code);

        // Init common var
        $election = clone $electionModel;
        $election1 = clone $electionModel;
        $election2 = clone $electionModel;
        $electionWithVotes = clone $electionWithVotesModel;

        // Evaluate the code
        eval($code);
    } catch (Throwable $e) {
        echo "\nTesting file: " . basename($file) . PHP_EOL;
        echo "Error: " . $e->getMessage() . " / line: " . $e->getLine() . PHP_EOL;
        // throw $e;
    } finally {
        // Set back to false for next test
        Condorcet::$UseTimer = new ReflectionClass(Condorcet::class)->getProperty('UseTimer')->getDefaultValue();
        $candidates = [];
    }
}