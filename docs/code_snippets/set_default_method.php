use CondorcetPHP\Condorcet\Condorcet;

$electionWithVotes->getResult(); // Uses Schulze Winning, the default method

Condorcet::getDefaultMethod(); // returns 'CondorcetPHP\Condorcet\Algo\Methods\Schulze\SchulzeWinning'
Condorcet::setDefaultMethod('Ranked Pairs');

$electionWithVotes->getResult(); // Uses Ranked Pairs Winning, the new default method