use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;

$debianFormat = new DebianFormat(__DIR__.'/DebianData/leader2020_tally.txt'); # CondorcetPHP\Condorcet\Tools\Converters\DebianFormat
$election = $debianFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
