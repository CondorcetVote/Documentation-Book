use \CondorcetPHP\Condorcet\Algo\StatsVerbosity;
use CondorcetPHP\Condorcet\Election;

$electionWithVotes->statsVerbosity; // StatsVerbosity::STD

$electionWithVotes->setStatsVerbosity(StatsVerbosity::FULL);
$result = $electionWithVotes->getResult('Kemeny Young');

$electionWithVotes->statsVerbosity; // StatsVerbosity::FULL
$result->statsVerbosity; // StatsVerbosity::FULL
