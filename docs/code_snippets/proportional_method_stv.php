use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Algo\Tools\StvQuotas;

$election = new Election;

$election->addCandidate('Andrea');
$election->addCandidate('Carter');
$election->addCandidate('Brad');
$election->addCandidate('Delilah');
$election->addCandidate('Scott');

$election->setImplicitRanking(false);

$election->parseVotes('
    Andrea *25
    Carter > Brad > Delilah *34
    Brad > Delilah *7
    Delilah > Brad *8
    Delilah > Scott *5
    Scott > Delilah *21
');

$election->setSeatsToElect(3);
$election->setMethodOption('STV', 'Quota', StvQuotas::HAGENBACH_BISCHOFF);

$election->getResult('STV')->stats['Votes Needed to Win']; // 25


$election->getResult('STV')->rankingAsArrayString;
// Return:
//     [
//         1 => 'Carter',
//         2 => 'Andrea',
//         3 => 'Scott',
//     ]

$election->getResult('STV')->stats['rounds'];
// Return:
//     [
//         1 => [
//             'Carter' => 34.0,
//             'Andrea' => 25.0,
//             'Scott' => 21.0,
//             'Delilah' => 13.0,
//             'Brad' => 7.0,
//         ],
//         2 => [
//             'Scott' => 21.0,
//             'Brad' => 16.0,
//             'Delilah' => 13.0,
//         ],
//         3 => [
//             'Scott' => 26.0,
//             'Brad' => 24.0,
//         ],
//     ]
