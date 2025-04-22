use \CondorcetPHP\Condorcet\Algo\StatsVerbosity;

$election->getStatsVerbosity(); // StatsVerbosity::STD

$election->setStatsVerbosity(StatsVerbosity::FULL);
$result = $election->getResult('Kemeny Young');

$election->getStatsVerbosity(); // StatsVerbosity::FULL
$result->statsVerbosity; // StatsVerbosity::FULL
