use CondorcetPHP\Condorcet\Utils\CondorcetUtil;

$electionWithVotes->getWinner(); // Return NULL if there is not, else return the winner candidate object
$electionWithVotes->getWinner('Schulze'); // Same thing, but try to resolve by Schulze method if there is not one. Can return an array of winners if there are multiple.

// Natural Condorcet Loser
$electionWithVotes->getLoser(); // Return NULL if there is not, else return the winner candidate object

// Advanced Method
$electionWithVotes->getResult(); // Result set for defaut method (Should be Schulze Winning)
$electionWithVotes->getResult('Copeland'); // Do it with the Copeland method

// Get an easy game outcome to read and understand (Table populated by string)
$easyResult = CondorcetUtil::format($electionWithVotes->getResult());
