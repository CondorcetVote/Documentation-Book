use \CondorcetPHP\Condorcet\{Candidate, Election, Vote};

// Create objetcs
$candidateA = new Candidate('A');
$candidateB = new Candidate('B');
$candidateC = new Candidate('C');

$election1 = new Election;
$election1->authorizeVoteWeight = true;

$election1->addCandidate($candidateA);
$election1->addCandidate($candidateB);
$election1->addCandidate($candidateC);

$election2 = clone $election1;

$voteUnique1 = new Vote([1 => $candidateA, 2=> $candidateB, 3 => $candidateC]);
$voteUnique2 = clone $voteUnique1;
$voteMix = clone $voteUnique1;

$voteMix->setWeight(2);
$voteUnique1->setWeight(3);
$voteUnique2->getWeight(); // 1

// register candidates + $voteMix in both elections
foreach([$election1, $election2] as $e) {
    $e->addVote($voteMix); // In both election
}

// Add other vote to their elections
$election1->addVote($voteUnique1);
$election2->addVote($voteUnique2);

// Count Links for Votes
$voteUnique1->countLinks(); // 1
$voteUnique1->getLinks()[0] === $election1; // True
$voteUnique2->countLinks(); // 1
$voteUnique2->getLinks()[0] === $election2; // True
$voteMix->countLinks(); // 2
$voteMix->getLinks()[0] === $election1; // True
$voteMix->getLinks()[1] === $election2; // True

// Count Links for Candidates
$candidateA->countLinks(); // 2
$candidateA->getLinks()[0] === $election1; // True
$candidateA->getLinks()[1] === $election2; // True

$election1->getWinner() === $election2->getWinner(); // True

$voteMix->setRanking([1 => $candidateB, 2=> $candidateC, 3 => $candidateA]);

$election1->getWinner() === $election2->getWinner(); // False
$election1->getWinner() === $candidateA; // True
$election2->getWinner() === $candidateB; // True