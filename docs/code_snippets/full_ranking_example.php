use \CondorcetPHP\Condorcet\Election;

$election = new Election;
$election->parseCandidates('Copland; Ives; Bernstein; Barber; Cage');

$election->addVote('Copland > Ives = Bernstein > Barber > Cage');
$election->addVote('Copland > Cage > Ives = Bernstein > Barber');

$result = $election->getResult('Schulze');

$winner = $result->Winner ?? 'No method winner';;
$loser = $result->Loser ?? 'No method loser';
$condorcetWinner = $election->getCondorcetWinner() ?? 'No Condorcet winner';
$condorcetLoser =  $election->getCondorcetLoser() ?? 'No Condorcet Loser';

// Schulze Ranking
$ranking = $result->rankingAsArrayString;
