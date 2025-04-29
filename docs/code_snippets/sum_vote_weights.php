use CondorcetPHP\Condorcet\Vote;
$election->authorizeVoteWeight = true;
$election->parseCandidates('A;B;C;D');

$vote = $election->addVote('A>B');
$vote->setWeight(42);

expect($election->countVotes())->toBe(1);
expect($election->sumVoteWeights())->toBe(42);
