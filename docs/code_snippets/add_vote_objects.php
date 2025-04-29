use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Vote;

$election = new Election;
$election->parseCandidates('A;B;C;D;E;F;G;H;I;J;K;L;M;N;O;P;Q;R;S;T');

$vote1 = new Vote('A>B=C=H>G=T>Q');
$vote2 = new Vote([
    1 => 'A',
    2 => 'C',
    3 => 'B',
    4 => ['H', 'G']
]);

$vote3 = new Vote([
    1 => 'A',
    2 => $election->getCandidateObjectFromName('B'),
    3 => 'C' // Condorcet will do the job for you.
]);

$election->addVote($vote1);
$election->addVote($vote2);
$election->addVote($vote3);

expect($election->countVotes())->toBe(3);