use \CondorcetPHP\Condorcet\{Election, Vote};

$election1 = new Election;
$election1->parseCandidates('A;B;C;D');

$vote = new Vote('A>Z>B'); // Candidate Z is not a candidate of this election. C=D is implicit.
$election1->addVote($vote);

$election1->implicitRankingRule; // Return True, it's the default.

$vote->getRankingAsArrayString(context: $election1); // [1 => "A", 2 => "B", 3 => ['C', 'D']]
$vote->getRankingAsString(context: $election1); // 'A > B > C = D'
$vote->getRankingAsString(); // 'A > Z > B > C = D'

$election1->implicitRankingRule = false;
$vote->getRankingAsArrayString(context: $election1); // [1 => "A", 2 => "B"]
$vote->getRankingAsString(context: $election1); // 'A > B'
$vote->getRankingAsString(); // 'A > Z > B > C = D'
