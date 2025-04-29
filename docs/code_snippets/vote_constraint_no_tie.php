use \CondorcetPHP\Condorcet\Constraints\NoTie;

$election->addConstraint(NoTie::class);

expect($election->getConstraints())->toBe([
    NoTie::class
]);

$election->parseCandidates('A;B;C;D');
$election->parseVotes('
    B > A > C > D
    A > B = C = D
    A > B > C = D
' );

expect($election->getWinner()->name)->toBe('B');
expect($election->countValidVoteWithConstraints())->toBe(1);
expect($election->countInvalidVoteWithConstraints())->toBe(2);

$election->clearConstraints();

expect($election->getWinner()->name)->toBe('A');
expect($election->countValidVoteWithConstraints())->toBe(3);
expect($election->countInvalidVoteWithConstraints())->toBe(0);
