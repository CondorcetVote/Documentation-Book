$result = $electionWithVotes->getResult('Schulze');

$result->byClass; // Namespace of the Schulze module. Like 'CondorcetPHP\Condorcet\Algo\Methods\SchulzeWinning'
$result->fromMethod; // Method who build this result. Like 'Schulze'.
$result->electionCondorcetVersion; // Condorcet version at the build time.
$result->buildTimestamp; // Return timestamp (float) of the build time.
