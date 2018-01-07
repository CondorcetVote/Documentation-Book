# Vote weight

## Description

You can add a weight (integer >= 1) to each vote.  
If you enable this mode at the election level (deactivated by default) then the votes will be proportional to their weight when calculating all the algorithms.   

For example, if the weight is 2, then the vote will count double. This is an alternative and complementary to adding multiple votes. Using this mode of operation can save you (for large elections) a high cost in RAM or the configuration / development of a [[DataHandler |III-#-A.-Avanced-features---Configuration-#-3.-Get-started-to-handle-millions-of-votes]], which can be complex.  

However, if you need to keep the information of each elector at Condorcet level, this functionality will not satisfy you, it is useful if at this level the voting information is useless or if it makes no sense.

## Example

```php
        $election = new Election;

        $election->addCandidate('A');
        $election->addCandidate('B');
        $election->addCandidate('C');
        $election->addCandidate('D');

        $election->parseVotes('
            A > C > D * 6
            B > A > D * 1
            C > B > D * 3
            D > B > A * 3
        ');

        $voteWithWeight = $election->addVote('D > C > B');
        $voteWithWeight->setWeight(2); // You put a weight, bu weight still no allow at election level.

        // Return 'A > C > D > B'
        $election->getResult('Schulze Winning')->getResultAsString();

        $election->allowVoteWeight(true);

        // Return 'A = D > C > B'
        $election->getResult('Schulze Winning')->getResultAsString();

        $election->removeVote($voteWithWeight);

        $election->parseVotes('
            D > C > B ^2 * 1
        ');

        // Return 'A = D > C > B',
        $election->getResult('Schulze Winning')->getResultAsString();

        $election->addVote('D > C > B');

        /* Return D > C > B > A with 2 lines. one for weight ^2 and one for force ^1
        'A > C > D > B * 6
        C > B > D > A * 3
        D > B > A > C * 3
        D > C > B > A ^2 * 1
        B > A > D > C * 1
        D > C > B > A * 1/*
        $election->getVotesListAsString();
```
