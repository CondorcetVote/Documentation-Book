$winner = $electionWithVotes->getCondorcetWinner();
$loser = $electionWithVotes->getCondorcetLoser();

if ($winner !== null) {
    $winner = $winner->name;
} else {
    $winner = 'There is no winner. Cause of Condorcet paradox.';
}

if ($loser !== null) {
    $loser = 'My loser is ' . (string) $loser ; // Little tip: \CondorcetPHP\Condorcet\Candidate implements the __toString() magic method.
} else {
    $loser = 'There is no loser. Cause of Condorcet paradox.';
}
