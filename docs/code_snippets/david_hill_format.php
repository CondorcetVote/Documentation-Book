use CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat;

$davidFormat = new DavidHillFormat(__DIR__.'/TidemanData/A77.HIL'); # CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat
$election = $davidFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
