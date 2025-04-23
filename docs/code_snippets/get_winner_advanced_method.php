use CondorcetPHP\Condorcet\Condorcet;

$electionWithVotes->getWinner(); // With the default object method (Default: Schulze Winning)
$electionWithVotes->getWinner('Copeland'); // Name of a valid method

$electionWithVotes->getLoser(); // With the default object method (Default: Schulze Winning)
$electionWithVotes->getLoser('Kemeny-Young'); // Name of a valid method

Condorcet::getDefaultMethod(); // CondorcetPHP\Condorcet\Algo\Methods\Schulze\SchulzeWinning
