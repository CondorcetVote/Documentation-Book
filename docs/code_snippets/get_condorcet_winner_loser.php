$winner = $election->getCondorcetWinner();
$loser = $election->getCondorcetLoser();

if ($winner !== null) {
    echo 'My winner is ' . $winner->getName();
} else {
    echo 'There is no winner. Cause of Condorcet paradox.';
}

if ($loser !== null) {
    echo 'My loser is ' . (string) $loser ; // Little tip: \CondorcetPHP\Condorcet\Candidate implements the __toString() magic method.
} else {
    echo 'There is no loser. Cause of Condorcet paradox.';
}
