use CondorcetPHP\Condorcet\Tools\Randomizers\VotesRandomGenerator;

$voteRandomizer = new VotesRandomGenerator([$candidate1,$candidate2,$candidate3]);
$newVote1 = $voteRandomizer->getNewVote();
$voteRandomizer->setCandidates($candidate1,$candidate4);
$newVote2 = $voteRandomizer->getNewVote();
