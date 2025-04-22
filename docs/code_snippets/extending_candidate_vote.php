use CondorcetPHP\Condorcet\Candidate;
use CondorcetPHP\Condorcet\Vote;
use CondorcetPHP\Condorcet\Election;

class yourVoteClass extends Vote {
    // ...
}

class yourCandidateClass extends Candidate {
    // ...
}

$election = new Election;

$election->addCandidate(new yourCandidateClass('A'));
$election->addCandidate(new yourCandidateClass('B'));
$election->addCandidate(new yourCandidateClass('C'));

$election->addVote(new yourVoteClass('A>B>C'));

//...
