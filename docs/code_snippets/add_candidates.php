use CondorcetPHP\Condorcet\Candidate;

// From string, returns the newly built candidate object
$election->addCandidate('Wagner');

// Directly from a Candidate Object
$election->addCandidate(new Candidate('Edgard Varèse'));

// Empty argument will return a candidate object with an automatic name for you (From A to ZZZZZ)
$myAutoCandidate = $election->addCandidate();

// If you use an integer, it will be converted to string (= '2')
$election->addCandidate(2);