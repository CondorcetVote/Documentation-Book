$election->getResult('Schulze')->CondorcetWinner; // Equivalent to $election->getWinner('Schulze');
$election->getResult('Schulze')->CondorcetLoser; // Equivalent to $election->getLoser('Schulze');

$election->getResult('Schulze')->CondorcetWinner ; // Get the condorcet winner from the parent election at the build time (can became different. This one never change) or null if he don't exist.
$election->getResult('Schulze')->CondorcetLoser ; // Get the condorcet loser from the parent election at the build time (can became different. This one never change) or null if he don't exist.

$election->getResult('Schulze')->ranking ; // Return Result ranking as array. So, the original Result object is iterable, support array access and count... Why doing that ?
$election->getResult('Schulze')->rankingAsArrayString ; // Same thing. But more: that convert Candidate object into string by name.
