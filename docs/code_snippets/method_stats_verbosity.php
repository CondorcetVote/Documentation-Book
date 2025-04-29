use \CondorcetPHP\Condorcet\Algo\StatsVerbosity;
use CondorcetPHP\Condorcet\Election;

$electionWithVotes->statsVerbosity; // StatsVerbosity::STD

$electionWithVotes->setStatsVerbosity(StatsVerbosity::FULL);
$result = $electionWithVotes->getResult('Kemeny Young');

expect($electionWithVotes->statsVerbosity)->toBe(StatsVerbosity::FULL);
expect($result->statsVerbosity)->toBe(StatsVerbosity::FULL);