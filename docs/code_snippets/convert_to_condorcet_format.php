use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;
use CondorcetPHP\Condorcet\Tools\Converters\CEF\CondorcetElectionFormat;

// Convert Debian Format to an election
$election = (new DebianFormat('DebianData/leader2020_tally.txt'))->setDataToAnElection();

# Return the Condorcet Election Format for this election
CondorcetElectionFormat::createFromElection($election);

# Write to a file
$myFile = new \SplFileObject($pathToFile);
CondorcetElectionFormat::createFromElection(election: $election, file: $myFile);
