use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;

$debianFormat = new DebianFormat('debian_leader2020_tally.txt'); # CondorcetPHP\Condorcet\Tools\Converters\DebianFormat
$election = $debianFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
