use CondorcetPHP\Condorcet\Condorcet;

$election->getResult(); // Uses Schulze Winning, the default method

Condorcet::getDefaultMethod(); // returns 'CondorcetPHP\Condorcet\Algo\Methods\Schulze\SchulzeWinning'
Condorcet::setDefaultMethod('Ranked Pairs');
