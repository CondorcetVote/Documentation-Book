$election->getResult()->getResultAsString(); // "Claude Debussy > Richard Wagner"
$vote->setRanking('Richard Wagner > Claude Debussy');
$election->getResult()->getResultAsString(); // Richard Wagner > "Claude Debussy"
$vote->getHistory(); // Every change is logued