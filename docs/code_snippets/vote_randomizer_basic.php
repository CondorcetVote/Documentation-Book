use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Tools\Randomizers\VoteRandomizer;

for ($i = 1; $i <= 3; $i++) {
    $candidates[$i] = new Candidate("Candidate $i");
}

$voteRandomizer = new VoteRandomizer($candidates);

$newVote1 = $voteRandomizer->getNewVote();
$newVote2 = $voteRandomizer->getNewVote();
$newVote3 = $voteRandomizer->getNewVote();
