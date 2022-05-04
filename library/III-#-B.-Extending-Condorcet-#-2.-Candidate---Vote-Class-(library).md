# Extending Candidate & Vote Class

 Vote & Candidate classes are ready to be extended.

 ```php
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

$election->addCandidate(new yourCandidateClass);
$election->addCandidate(new yourCandidateClass);
$election->addCandidate(new yourCandidateClass);

$election->addVote(new yourVoteClass(//...));
$election->addVote(new yourVoteClass(//...));
$election->addVote(new yourVoteClass(//...));

//...
```

Please read the class. And ask for support if needed.