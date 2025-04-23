use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Tools\Randomizers\VoteRandomizer;

for ($i = 1; $i <= 6; $i++) {
    $candidates[] = new Candidate("Candidate $i");
}

$voteRandomizer = new VoteRandomizer($candidates);

// If not null, each vote will rank maximum of 4 candidates but a minimum of 3.
$voteRandomizer->maxCandidatesRanked = 4;
$voteRandomizer->minCandidatesRanked = 3;
$newVote1 = $voteRandomizer->getNewVote();

// Each vote will rank 4 candidates
$voteRandomizer->maxCandidatesRanked = 4;
$voteRandomizer->minCandidatesRanked = true;
$newVote2 = $voteRandomizer->getNewVote();

// Not a question of candidates, but max number of ranks
$voteRandomizer->maxRanksCount = 3;
$newVote3 = $voteRandomizer->getNewVote();

// Each vote has 50.42% of probability to get a least 1 tie in a rank.
$voteRandomizer->tiesProbability = 50.42;
$newVote4 = $voteRandomizer->getNewVote();

// Each vote will have at least 2 ties, and 50% chance of at least one more.
$voteRandomizer->tiesProbability = 250;
$newVote5 = $voteRandomizer->getNewVote();
