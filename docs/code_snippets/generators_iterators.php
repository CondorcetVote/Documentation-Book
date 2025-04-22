// Works exactly as $election->getVotesList() but returns a generator instead. Provide the same objects and logic.
$election->getVotesListGenerator();

// Works exactly as $election->getVotesList() with an additional filter of invalid votes under constraints. It's returning a generator instead. Provide the same objects and logic.
$election->getVotesValidUnderConstraintGenerator(); // It's also the favorite method for voting method modules implementation.
