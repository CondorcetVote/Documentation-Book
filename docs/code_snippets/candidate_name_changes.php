$candidateWagner->setName('Richard Wagner');
$candidateDebussy->setName('Claude Debussy');

$vote->getRanking()[1][0]->getName(); // 'Claude Debussy'
$vote->getRanking()[2][0]->getName(); // 'Richard Wagner'