use \CondorcetPHP\Condorcet\Constraints\NoTie;

$election->allowsVoteWeight();
$election->parseCandidates('A;B;C;D');
$election->parseVotes('
    A>B>C>D
    C>B=A>D * 3 # Means 3 votes
    B>A ^42  #  Means 1 vote with weight of 42. B=D is implicit at the second rank.
' );


$election->getWinner(); // Return Candidate B

$election->addConstraint(NoTie::class);
$election->getWinner(); // Return Candidate A

$election->clearConstraints();
$election->getWinner(); // return Candidate B

$election->addConstraint(NoTie::class);
$election->getWinner(); // Return Candidate A

$election->sumValidVotesWeightWithConstraints(); // Return 1
$election->sumVotesWeight(); // Return 46 (1 + 3 + 42)
$election->countVotes(); // Return 5
$election->countValidVoteWithConstraints(); // return 1
$election->countInvalidVoteWithConstraints(); // return 4

$election->getWinner(); // Return Candidate A
$election->setImplicitRanking(false);
$election->getWinner(); // Return Candidate B

// The vote B^42 become valid under constraint, since implicit ranking is false
$election->sumValidVoteWeightsWithConstraints(); // Return 43
$election->sumVotesWeight(); // Return 46
$election->countVotes(); // Return 5
$election->countValidVoteWithConstraints(); // Return 2
$election->countInvalidVoteWithConstraints(); // Return 3
