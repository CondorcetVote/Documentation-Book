$election->allowsVoteWeight();
$election->parseCandidates('A;B;C;D');

$vote = new Vote('A>B');
$vote->setWeight(42);

$election->addVote($vote);

$election->countVotes(); // 1
$election->sumVotesWeights(); // 42
