use CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat;

$davidFormat = new DavidHillFormat('david_hill_format.hil'); # CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat
$election = $davidFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
