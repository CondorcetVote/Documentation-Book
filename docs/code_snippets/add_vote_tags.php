// Directly with the addVote method (will add it to the Vote object)
$election->addVote($vote, 'Baroque'); // Please note that a single tag is always created for each vote.
$election->addVote($vote, 'Baroque, Modern'); // You can also add multiple tags, separated by commas.
$election->addVote($vote, ['Baroque', 'Modern']); // You can also add multiple tags using an array.

// Or add tags to the vote object
$vote1 = new Vote('Bartok > Lully');
$election->addVote($vote1);
$vote1->addTags('Charlie');

// With vote object constructor
new Vote('Bartok > Lully', 'Baroque');
new Vote('Bartok > Lully', ['Baroque', 'Modern']);
new Vote('Bartok > Lully', 'Baroque, Modern'); // With commas
