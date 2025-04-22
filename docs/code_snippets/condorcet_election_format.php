use CondorcetPHP\Condorcet\Tools\Converters\CEF\CondorcetElectionFormat;

$condorcetFormat = new CondorcetElectionFormat($file);

// Create a new election from format, with all data
$election = $condorcetFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election

// Or add data to a new election, vote must not have started yet
$myElection = new class extends CondorcetPHP\Condorcet\Election {};
$condorcetFormat->setDataToAnElection($myElection); # CondorcetPHP\Condorcet\Election
