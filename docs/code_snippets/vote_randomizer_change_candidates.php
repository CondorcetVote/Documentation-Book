use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Tools\Randomizers\VoteRandomizer;

for ($i = 1; $i <= 4; $i++) {
    $candidates[$i] = new Candidate("Candidate $i");
}

$voteRandomizer = new VoteRandomizer($candidates);
$newVote1 = $voteRandomizer->getNewVote();

$voteRandomizer->setCandidates([$candidates[1], $candidates[4]]); // change the candidates (replace)
$newVote2 = $voteRandomizer->getNewVote();
