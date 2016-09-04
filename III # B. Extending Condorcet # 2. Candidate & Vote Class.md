# Extending Candidate & Vote Class

 Vote & Candidate class are ready to be extend.

 ```php
use Condorcet/Candidate;
use Condorcet/Vote;
use Condorcet/Election;

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

Please read the class. And ask support if needed.