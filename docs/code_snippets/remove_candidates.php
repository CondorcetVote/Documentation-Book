use CondorcetPHP\Condorcet\Candidate;

$election->addCandidate('Wagner');
$debussyCandidate = new Candidate('Debussy');
$election->addCandidate($debussyCandidate);

$election->removeCandidates('Wagner');
$election->removeCandidates($debussyCandidate); // Does not destroy your Candidate object if it exists outside of the election object scope. It just unlinks it from this Election.