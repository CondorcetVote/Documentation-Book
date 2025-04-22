use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\PdoDriver\PdoHandlerDriver;
use CondorcetPHP\Condorcet\Tools\Randomizers\VoteRandomizer;

// II - Create Election

$election = new Election;
$election->parseCandidates('A;B;C;D;E;F');

// II - Setup external drivers

/* We will use PDO SQLITE, but can be MySQL or else */

$sqlitePath = __DIR__.'/bdd.sqlite';

if (file_exists($sqlitePath)) {
    unlink($sqlitePath);
}

$driver = new PdoHandlerDriver(new \PDO('sqlite:'.$sqlitePath), true);
$election->setExternalDataHandler($driver);

// III - Add hundred of thousands votes

$howMany = 100_000;
$votesRandomizer = new VoteRandomizer($election->getCandidatesList());

for ($i = 0; $i < $howMany; $i++) {
    $election->addVote($votesRandomizer->getNewVote());
}

// IV - Get somes results
$election->getCondorcetWinner();
$election->getResult('Schulze');
