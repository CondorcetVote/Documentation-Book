use CondorcetPHP\Condorcet\Vote;

$vote = new Vote('Bartok > Lully > Haendel');
$vote->addTags(['Baroque', 'Modern']);
$vote->setRanking('Lully > Haendel');
$vote->removeTags('Modern');
$vote->tags; // ['Baroque']
