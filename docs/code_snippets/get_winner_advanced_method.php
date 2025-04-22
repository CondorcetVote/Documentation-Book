use CondorcetPHP\Condorcet\Condorcet;

$election->getWinner(); // With the default object method (Default: Schulze Winning)
$election->getWinner('Copeland'); // Name of a valid method

$election->getLoser(); // With the default object method (Default: Schulze Winning)
$election->getLoser('Kemeny-Young'); // Name of a valid method

Condorcet::getDefaultMethod(); // CondorcetPHP\Condorcet\Algo\Methods\Schulze\SchulzeWinning
