use CondorcetPHP\Condorcet\Election;

Election::$maxVotePerElection = 2042; // All elections, new or woken up, will be limited to this maximum vote number.
Election::$maxVotePerElection = null; // No limit for everybody. (Default)
