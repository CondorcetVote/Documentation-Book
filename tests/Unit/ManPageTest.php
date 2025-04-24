<?php declare(strict_types=1);

use CondorcetPHP\Condorcet\Console\CondorcetApplication;
use Symfony\Component\Console\Application;
use Symfony\Component\Console\Tester\CommandTester;

it('has an updated manpage', function (): void {
    $manPage = file_get_contents(__DIR__ . '/../../docs/book/2.AsCommandLineApplication/4.ManPage.md');

    preg_match('/```shell\s*(.*?)\s*```/s', $manPage, $matches);

    // Vérifie que la regex a bien matché
    expect($matches)->toBeArray()->toHaveCount(2)->not->toBeEmpty();
    expect($matches[1])->not->toBeEmpty()->toContain('condorcet --help');

    $manPage = $matches[1];

    CondorcetApplication::create();
    $condorcetApplication = CondorcetApplication::$SymfonyConsoleApplication;
    $electionCommand = new CommandTester($condorcetApplication->find('help'));
    $electionCommand->execute(['command_name' => 'election']);
    $electionCommandOutput = mb_rtrim($electionCommand->getDisplay());
    $electionCommandOutput = "condorcet --help\n" . $electionCommandOutput;

    expect($manPage)->toBe($electionCommandOutput);
});