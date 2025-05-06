<?php
use \CondorcetPHP\Condorcet\Constraints\NoTie;

$election->authorizeVoteWeight = true;
$election->parseCandidates('A;B;C;D');
$election->parseVotes('
    A>B>C>D
    C>B=A>D * 3 # Means 3 votes
    B>A ^42  #  Means 1 vote with weight of 42. B=D is implicit at the second rank.
' );


$election->getWinner(); // Return Candidate B

$election->addConstraint(NoTie::class);
expect($election->getWinner()->name)->toBe('A');

$election->clearConstraints();
expect($election->getWinner()->name)->toBe('B');

$election->addConstraint(NoTie::class);
expect($election->getWinner()->name)->toBe('A');

expect($election->sumValidVoteWeightsWithConstraints())->toBe(1);
expect($election->sumVoteWeights())->toBe(1 + 3 + 42);
expect($election->countVotes())->toBe(5);
expect($election->countValidVoteWithConstraints())->toBe(1);
expect($election->countInvalidVoteWithConstraints())->toBe(4);

expect($election->getWinner()->name)->toBe('A');
$election->implicitRankingRule(false);
expect($election->getWinner()->name)->toBe('B');

// The vote B^42 become valid under constraint, since implicit ranking is false
expect($election->sumValidVoteWeightsWithConstraints())->toBe(43);
expect($election->sumVoteWeights())->toBe(46);
expect($election->countVotes())->toBe(5);
expect($election->countValidVoteWithConstraints())->toBe(2);
expect($election->countInvalidVoteWithConstraints())->toBe(3);
