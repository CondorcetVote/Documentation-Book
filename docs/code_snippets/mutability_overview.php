use \CondorcetPHP\Condorcet\{Candidate, Election, Vote};

$election = new Election;

$candidateWagner = new Candidate('Wagner');
$election->addCandidate($candidateWagner) === $candidateWagner; // True
$candidateDebussy = $election->addCandidate('Debussy'); // Create and register the new Candidate('Debussy');

$vote = new Vote('Debussy > Wagner'); // Create from string, will internally create temporary Candidate object. This does not happen if you work directly with Candidate object.
$vote->getRanking()[1] === $candidateDebussy; // False, internally, it's using a temporary candidate object
$vote->getRanking()[2] === $candidateWagner; // False, internally, it's using a temporary candidate object


$election->addVote($vote);
$vote->getRanking()[1][0] === $candidateDebussy; // True, the temporary candidate is replaced by the real one.
$vote->getRanking()[2][0] === $candidateWagner; // True, the temporary candidate is replaced by the real one.

// The getHistory method log any change, including this automatic one.
count($vote->rankingHistory); // 2
$vote->rankingHistory[0]['timestamp'] < $vote->rankingHistory[1]['timestamp']; // True