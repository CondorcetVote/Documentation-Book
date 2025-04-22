use \CondorcetPHP\Condorcet\Election;

$election = new Election;
$election->parseCandidates('A;B;C');

$election->implicitRankingRule; // True, it's the default.

$election->parseVotes('
    A > B * 68
    B > C * 72
    C > A * 52
');

// Not supporting not ranked candidate. Last candidate is implicitly added at rank 3.
$election->getWinner('Ranked Pairs'); // Return candidate B

// Supporting not ranked candidate
$election->implicitRankingRule = false;
$election->implicitRankingRule; // False.
$election->getWinner('Ranked Pairs'); // Return candidate A

// Rollback
$election->implicitRankingRule = true;
$election->getWinner('Ranked Pairs'); // Return candidate B
