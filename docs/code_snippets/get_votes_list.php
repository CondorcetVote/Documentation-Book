$election->getVotesList(); // Will return an array where key is the internal numeric vote_id and value an other array like your input.
$election->getVotesList('Charlie'); // Will return an array with each vote with this tag.
$election->getVotesList('Charlie', false); // Will return an array where each votes without this tag.
$election->getVotesList('Charlie,Julien'); // With this tag OR this tag
$election->getVotesList(['Julien', 'Charlie'], true); // Or do it with array
$election->getVotesList(['Julien', 'Charlie'], false); // Without this tag AND without this tag ...
