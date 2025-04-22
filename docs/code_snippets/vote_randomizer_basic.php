use CondorcetPHP\Condorcet\Tools\Randomizers\VoteRandomizer;

$voteRandomizer = new VoteRandomizer([$candidate1,$candidate2,$candidate3]);
$newVote1 = $voteRandomizer->getNewVote();
$newVote2 = $voteRandomizer->getNewVote();
$newVote3 = $voteRandomizer->getNewVote();
