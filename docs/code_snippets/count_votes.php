$election->countVotes(); // Return a numeric value about the number of registered votes.
$election->countVotes('Julien,Charlie'); // Count vote with this tag OR this tag.
$election->countVotes(['Julien','Charlie'], false); // Count vote without this tag AND without this tag.
