use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Election;

$election = new Election(); // Create a new election

$candidate = new Candidate('Wagner'); // Add a candidate to the election

assert($election->canAddCandidate($candidate)); // true: the candidate object and the candidate string name are available.
assert($election->hasCandidate($candidate) === false); // false

$election->addCandidate($candidate); // Finally add the candidate to the election

assert($election->hasCandidate($candidate)); // true
assert($election->hasCandidate(candidate: 'Wagner', strictMode: false)); // true

