$election->parseCandidates('A;B;C;D');

$election->parseVotes('
    A > C > D * 6
    B > A > D * 1
    C > B > D * 3
    D > B > A * 3
');

$voteWithWeight = $election->addVote('D > C > B'); // Returns a new vote object
$voteWithWeight->setWeight(2); // You set a weight, but weight is still not allowed at the election level.

// Return 'A > C > D > B'
$election->getResult('Schulze Winning')->rankingAsString;

$election->allowsVoteWeight(true);

// Return 'A = D > C > B'
$election->getResult('Schulze Winning')->rankingAsString;

$election->removeVote($voteWithWeight);

$election->parseVotes('
    D > C > B ^2
');

// Return 'A = D > C > B',
$election->getResult('Schulze Winning')->rankingAsString;

$election->addVote('D > C > B');

$election->getVotesListAsString();
// Return D > C > B > A with 2 lines. one for weight ^2 and one for force ^1
/*
A > C > D > B * 6
C > B > D > A * 3
D > B > A > C * 3
D > C > B > A ^2 * 1
B > A > D > C * 1
D > C > B > A * 1
*/
