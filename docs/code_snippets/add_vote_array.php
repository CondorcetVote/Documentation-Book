use CondorcetPHP\Condorcet\Candidate;

$pucciniCandidate = new Candidate('Puccini');
$election->parseCandidates('Wagner;Debussy;Varese');
$election->addCandidate($pucciniCandidate);

$vote = [];
$vote[1] = 'Wagner';
$vote[2] = 'Debussy';
$vote[3] = $pucciniCandidate; // can be a string or a candidate object
$vote[4] = 'Varese'; // The last rank is optional
$election->addVote($vote);

// Use commas or an array in the case of a tie:
$vote = [];
$vote[1] = 'Debussy,Wagner';
$vote[2] = [$pucciniCandidate, 'Varese'];
$election->addVote($vote);
