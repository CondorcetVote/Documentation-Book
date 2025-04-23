$election->parseCandidates('A;B;C;D');

$election->parseVotes('votes.txt'); // Path to text file. Absolute or relative.
$election->parseVotes($myVotesToParse); // Just a vote string