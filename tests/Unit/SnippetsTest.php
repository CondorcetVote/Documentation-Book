<?php declare(strict_types=1);

use CondorcetPHP\Condorcet\Condorcet;
use CondorcetPHP\Condorcet\Election;
use Tests\TestCase;

const SNIPPETS_DIR = __DIR__ . '/../../docs/code_snippets';

beforeAll(function (): void {
    TestCase::$myCandidatesToParse = file_get_contents(SNIPPETS_DIR . '/candidates.txt');
    TestCase::$myVotesToParse = file_get_contents(SNIPPETS_DIR . '/votes.txt');
});

// Set back to false for next test
afterEach(fn() => Condorcet::$UseTimer = new ReflectionClass(Condorcet::class)->getProperty('UseTimer')->getDefaultValue());

test('snippets', function (string $file): void {
    $myCandidatesToParse = TestCase::$myCandidatesToParse;
    $myVotesToParse = TestCase::$myVotesToParse;

    // Init an election
    $electionModel = new Election;
    $electionWithVotesModel = new Election;
    $electionWithVotesModel->parseCandidates('A;B;C');
    $electionWithVotesModel->parseVotes('A > B > C * 3');

    // Read the file content
    $code = file_get_contents($file);
    $code = str_replace("require '", "require '" . SNIPPETS_DIR . DIRECTORY_SEPARATOR, $code);

    // Remove the opening PHP tag if it exists
    $code = preg_replace('/^<\?php\s+/', '', $code);

    // Replace input
    $code = str_replace('candidates.txt', SNIPPETS_DIR . DIRECTORY_SEPARATOR . 'candidates.txt', $code);
    $code = str_replace('votes.txt', SNIPPETS_DIR . DIRECTORY_SEPARATOR . 'votes.txt', $code);
    $code = str_replace('debian_leader2020_tally.txt', SNIPPETS_DIR . DIRECTORY_SEPARATOR . 'debian_leader2020_tally.txt', $code);
    $code = str_replace('election.cef', SNIPPETS_DIR . DIRECTORY_SEPARATOR . 'election.cef', $code);
    $code = str_replace('david_hill_format.hil', SNIPPETS_DIR . DIRECTORY_SEPARATOR . 'david_hill_format.hil', $code);

    // Transform assert() calls to add a second argument new \Exception
    // $code = preg_replace('/assert\((.+)\);/', 'assert($1, new \Exception("failed to assert"));', $code);

    // Init common var
    $election = clone $electionModel;
    $election1 = clone $electionModel;
    $election2 = clone $electionModel;
    $electionWithVotes = clone $electionWithVotesModel;

    // Evaluate the code
    eval($code);

    expect(trim($code))->not->toBeEmpty();
})->with(function(): array {
    $phpFiles = [];

    // Check if directory exists
    if (is_dir(SNIPPETS_DIR)) {
        // Use DirectoryIterator to scan the directory
        foreach (new DirectoryIterator(SNIPPETS_DIR) as $fileInfo) {
            if ($fileInfo->isFile() && $fileInfo->getExtension() === 'php') {
                $phpFiles[$fileInfo->getFilename()] = $fileInfo->getPathname();
            }
        }
    }

    return $phpFiles;
});
