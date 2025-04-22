use \CondorcetPHP\Condorcet\Election;

$election = new Election;
$election->parseCandidates('Copland; Ives; Bernstein; Barber; Cage');

$election->addVote('Copland > Ives = Bernstein > Barber > Cage');
$election->addVote('Copland > Cage > Ives = Bernstein > Barber');

$result = $election->getResult('Schulze');

echo 'Schulze winner is : ' . $result->Winner->name . "\n";
echo 'Schulze loser is : ' . $result->Loser . "\n"; // Or use __toString magic method from Candidate object
echo 'Condorcet winner is : ' . ($election->getCondorcetWinner() ?? 'No Condorcet winner') . "\n";
echo 'Condorcet loser is : ' . ($election->getCondorcetLoser() ?? 'No Condorcet Loser') . "\n";

echo "Schulze Ranking: \n";

foreach ($result as $rank => $candidates) {
    echo 'Rank ' . $rank . ': ';
        echo implode(',',$candidates); // Echo convert Candidte object with __toString()
    echo "\n";
}

/* Output is:

Schulze winner is : Copland
Schulze loser is : Barber
Condorcet winner is : Copland
Condorcet loser is : No Condorcet Loser

Schulze Ranking:
Rank 1: Copland
Rank 2: Bernstein,Cage,Ives
Rank 3: Barber
*/
