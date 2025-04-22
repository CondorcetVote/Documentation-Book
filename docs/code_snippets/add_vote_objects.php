use CondorcetPHP\Condorcet\Vote;

$vote1 = new Vote('A>B=C=H>G=T>Q');
$vote2 = new Vote([
    1 => 'A',
    2 => 'C',
    3 => 'B',
    4 => ['H', 'G']
]);

$vote3 = new Vote([
    1 => $CandidateA, // Condorcet\Candidate
    2 => $election->getCandidatesList()[array_search('B', $election->getCandidatesList(), false)],
    3 => 'C' // Condorcet will do the job for you.
]);

$election->addVote($vote1);
$election->addVote($vote2);
$election->addVote($vote3);
