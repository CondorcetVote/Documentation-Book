$electionWithVotes->getResult()->rankingAsString; // "Claude Debussy > Richard Wagner"
$vote->setRanking('Richard Wagner > Claude Debussy');
$electionWithVotes->getResult()->rankingAsString; // Richard Wagner > "Claude Debussy"
$vote->rankingHistory; // Every changes are logued