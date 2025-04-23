use CondorcetPHP\Condorcet\Tools\Converters\CEF\CondorcetElectionFormat;

$condorcetFormat = new CondorcetElectionFormat('election.cef');

// Create a new election from format, with all data
$election = $condorcetFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election