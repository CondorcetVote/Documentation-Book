use CondorcetPHP\Condorcet\Election;

Election::$maxParseIteration = 500; // Will generate an exception and stop after 500 registered votes by call. No votes will be registered.
Election::$maxParseIteration = null; // No limit (default mode)
