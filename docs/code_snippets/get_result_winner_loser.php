$result = $electionWithVotes->getResult('Schulze');

// All those below return null or the candidate object
$result->Winner;
$result->Loser;

// All those below return null, the candidate object or an array of candidates objects
$result->CondorcetWinner;
$result->CondorcetLoser;
