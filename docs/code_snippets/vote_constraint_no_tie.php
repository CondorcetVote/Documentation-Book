use \CondorcetPHP\Condorcet\Constraints\NoTie;

$election->addConstraint(NoTie::class);
$election->getConstraints(); // Return [NoTie::class]

$election->parseCandidates('A;B;C;D');
$election->parseVotes('
    B > A > C > D
    A > B = C = D
    A > B > C = D
' );

$election->getWinner(); // return Candidate B
$election->countValidVoteWithConstraints(); // return 1
$election->countInvalidVoteWithConstraints(); // return 2

$election->clearConstraints();

$election->getWinner(); // Return Candidate A
$election->countValidVoteWithConstraints(); // return 3
$election->countInvalidVoteWithConstraints(); // return 0
