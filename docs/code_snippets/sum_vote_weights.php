use CondorcetPHP\Condorcet\Vote;
$election->authorizeVoteWeight = true;
$election->parseCandidates('A;B;C;D');

$vote = new Vote('A>B');
$vote->setWeight(42);

$election->addVote($vote);

$election->countVotes(); // 1
$election->sumVoteWeights(); // 42
