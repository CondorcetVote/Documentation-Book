<?php

use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Vote;

$election= new Election;
$election->parseCandidates('A; B; C');
$vote = new Vote('A > B > C');
$election->addVote($vote);

expect($election->getResult()->rankingAsString)->toBe('A > B > C');

$vote->setRanking('C > A > B');

expect($election->getResult()->rankingAsString)->toBe('C > A > B');

// Every changes are logged
$vote->rankingHistory;