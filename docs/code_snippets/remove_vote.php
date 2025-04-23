use CondorcetPHP\Condorcet\Election;

$election = new Election;
$election->parseCandidates('A;B;C');
$voteObject = $election->addVote('A > B > C'); // Returns a new vote object

$election->removeVote($voteObject); // Cancel the vote