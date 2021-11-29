# Ranking mode - Implicit versus Partial

## Description


By default, if you not ranking all election candidates into a vote. We assume that all missing candidates are implicitly ranked last.
Optionally, you can prefer to allow voters to not rank all candidate.

You can change this mode. It will reset all computed result and provide new result, they can be different.

## Example

```php
    $election->getImplicitRanking(); // Return True. Your are in an explicit mode. You ranks all candidates.

    $this->election->addCandidate('A');
    $this->election->addCandidate('B');
    $this->election->addCandidate('C');

    $this->election->parseVotes('
        A > B * 68
        B > C * 72
        C > A * 52
    ');

    // Not supporting not ranked candidate. Last candidate is implicitly added at rank 3.
    $this->election->getWinner('Ranked Pairs'); // Return candidate B

    // Supporting not ranked candidate
    $this->election->setImplicitRanking(false);
    $election->getImplicitRankingRule(); // Return False.
    $this->election->getWinner('Ranked Pairs'); // Return candidate A

    // Rollback
    $this->election->setImplicitRanking(true);
    $this->election->getWinner('Ranked Pairs'); // Return candidate B
```
