use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;

$election->implicitRankingRule = false;
$election->seatsToElect = 42;

$debianFormat = new DebianFormat('debian_leader2020_tally.txt');
$debianFormat->setDataToAnElection($election);

expect($election->countCandidates())->toBe(4);
expect($election->countVotes())->toBe(339);