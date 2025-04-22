<?php
use \CondorcetPHP\Condorcet\Election;

$election = new Election;
$election->parseCandidates('A;B;C');
$election->addVote('A>B>C');

$explicitPairwise = $election->getExplicitPairwise(); // Equivalent to $election->getPairwise()->getExplicitPairwise();

print_r($explicitPairwise);
// Return for each candidate, the result (win/null/lose) face to the others
    [
        'A' => [
            'win' => [
                'B' => 1,
                'C' => 1,
            ],
            'null' => [
                'B' => 0,
                'C' => 0,
            ],
            'lose' => [
                'B' => 0,
                'C' => 0,
            ],
        ],
        'B' => [
            'win' => [
                'A' => 0,
                'C' => 1,
            ],
            'null' => [
                'A' => 0,
                'C' => 0,
            ],
            'lose' => [
                'A' => 1,
                'C' => 0,
            ],
        ],
        'C' => [
            'win' => [
                'A' => 0,
                'B' => 0,
            ],
            'null' => [
                'A' => 0,
                'B' => 0,
            ],
            'lose' => [
                'A' => 1,
                'B' => 1,
            ],
        ],
    ];
