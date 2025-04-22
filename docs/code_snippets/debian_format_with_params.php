use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;

$election->setImplicitRanking(false);
$election->setNumberOfSeats(42);

$debianFormat = new DebianFormat(__DIR__.'/DebianData/leader2020_tally.txt'); # CondorcetPHP\Condorcet\Tools\Converters\DebianFormat
$election = $debianFormat->setDataToAnElection($election); # CondorcetPHP\Condorcet\Election
