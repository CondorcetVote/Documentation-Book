$election->addCandidate('A');
$election->addCandidate('B');
$election->addCandidate('C');
$election->addCandidate('D');

$election->seatsToElect = 6;
$election->parseVotes('A * 42; B * 31; C * 15; D * 12');

$election->getResult('Jefferson')->rankingAsArrayString;
// Return:
[   1 => "A",
    2 => "B",
    3 => "A",
    4 => "B",
    5 => "C",
    6 => "A",   ];

$election->getResult('Jefferson')->stats['Seats per Candidates'];
// Return:
['A' => 3, 'B' => 2, 'C' => 1, 'D' => 0];
