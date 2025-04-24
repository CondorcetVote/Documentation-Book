use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Election;

$election = new Election(); // Create a new election

$candidate = new Candidate('Wagner'); // Add a candidate to the election

expect($election->canAddCandidate($candidate))->toBeTrue(); // true: the candidate object and the candidate string name are available.
expect($election->hasCandidate($candidate))->toBeFalse(); // false: the candidate object and the candidate string name are available.

$election->addCandidate($candidate); // Finally add the candidate to the election

expect($election->hasCandidate($candidate))->toBeTrue();
expect($election->hasCandidate(candidate: 'Wagner', strictMode: false))->toBeTrue(); // true: the candidate object and the candidate string name are available.