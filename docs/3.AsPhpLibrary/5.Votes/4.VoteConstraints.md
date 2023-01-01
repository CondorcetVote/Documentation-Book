# Vote Constraints

## Description

You can optionally add vote constraint(s) to determine which vote is allowed or invalid when results are computed.
For example, votes with ties are invalid. It is the only basic one supplied by Condorcet PHP. But you can extend the operation via your own constraints.


## Example

### Excluding votes with tie

```php
        $this->expectExceptionCode(29);

        $constraintClass = 'CondorcetPHP\Condorcet\Constraints\NoTie';

        $this->election->addConstraint($constraintClass); // Return True

        $this->election->getConstraints(); // Return [$constraintClass]

        $this->election->parseVotes('
            B > A > C > D
            A > B=C=D
            A > B
            A > C
        ' );

        $this->election->getWinner(); // Return Candidate B
        $this->election->countValidVoteWithConstraints(); // Return 1
        $this->election->countInvalidVoteWithConstraints(); // return 2

        $this->election->setImplicitRanking(false);

        $this->election->getWinner(); // Return Candidate A
        $this->election->countValidVoteWithConstraints(); // Return 3
        $this->election->countInvalidVoteWithConstraints(); // return 1
```


```php
        $this->expectExceptionCode(29);

        $constraintClass = 'CondorcetPHP\Condorcet\Constraints\NoTie';

        $this->election->addConstraint($class); // Return True

        $this->election->getConstraints();

        $this->election->parseVotes('
            A>B>C
            C>B=A * 3
            B^42
        ' );

        $this->election->allowVoteWeight();

        $this->election->getWinner()); // Return Candidate B

        $this->election->addConstraint($constraintClass);

        $this->election->getWinner(); // Return Candidate A

        $this->election->clearConstraints();

        $this->election->getWinner(); // return Candidate B

        $this->election->addConstraint($constraintClass);

        $this->election->getWinner(); // Return Candidate A

        $this->election->sumValidVotesWeightWithConstraints(); // Return 1
        $this->election->sumVotesWeight(); // Return 46
        $this->election->countVotes(); // Return 5
        $this->election->countValidVoteWithConstraints(); // return 1
        $this->election->countInvalidVoteWithConstraints(); // return 4

        $this->election->getWinner('FTPT'); // Return Candidate A

        $this->election->setImplicitRanking(false);

        $this->election->getWinner('FTPT'); // Return Candidate B

        $this->election->sumValidVotesWeightWithConstraints(); // Return 43
        $this->election->sumVotesWeight(); // Return 46
        $this->election->countVotes(); // Return 5
        $this->election->countValidVoteWithConstraints(); // Return 2
        $this->election->countInvalidVoteWithConstraints(); // Return 3
```


### Create your own constraint

```php

namespace <<YOUR NAMESPACE>>;

use CondorcetPHP\Condorcet\VoteConstraint;


// Example of the the complete source code of No Tie implementation from CondorcetPHP\Condorcet\Constraints\NoTie
class NoTie extends VoteConstraint
{
    protected static function evaluateVote (array $vote) : bool
    {
        foreach ($vote as $oneRank) :
            if (count($oneRank) > 1) :
                return false;
            endif;
        endforeach;

        return true;
    }
}

// Alternative possible implementation, with exactly the same result. But opens the door to more complex treatments.
use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Vote;

class NoTie_Alternative extends VoteConstraint
{
    public static function isVoteAllow (Election $election, Vote $vote) : bool
    {
        foreach ($vote->getContextualRanking($election) as $oneRank) :
            if (count($oneRank) > 1) :
                return false;
            endif;
        endforeach;

        return true;
    }
}
```