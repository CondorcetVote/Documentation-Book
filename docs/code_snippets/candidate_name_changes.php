use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Vote;

$malcolm = new Candidate('Malcolm Little');
$lenine = new Candidate('Vladimir Ilyich Ulyanov');

$vote = new Vote([1 => $malcolm, 2 => $lenine]);

$malcolm->setName('Malcolm X');
$lenine->setName('Lenine');

$vote->getRanking()[1][0]->name; // 'Malcolm X'
$vote->getRanking()[2][0]->name; // 'Lenine'