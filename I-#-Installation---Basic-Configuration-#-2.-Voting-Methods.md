# Original Condorcet Method (Winner / Loser)

* **Condorcet Basic** Give you the natural winner or loser of Condorcet, if there is one.  
*(This method is the only core method, you cannot remove it)*

```php
// Will return the strict natural Condorcet Winner candidate. Or Null if there is not.
$election->getCondorcetWinner() ; 
// Will return the strict natural Condorcet Loser candidate. Or Null if there is not.
$election->getCondorcetLoser() ;
```

# Advanced Voting Methods

These advances give you methods (in some cases) alternatives to address the lack of winning or losing natural Condorcet if Condorcet paradox occurs.   
They also provide a comprehensive ranking, which does not allow the original method of Marquis de Condorcet.  

Most of these methods cannot contradict the result of the original method of the Marquis de Condorcet. It completes it, however, with a complete ranking, and an alternative if the original method does not achieve a result (Condorcet's paradox).
Some methods do not follow the Condorcet criteria.

```php
$election->getWinner('Schulze Winning') ; 
$election->getLoser('Copeland') ;
$election->getResult('Ranked Pairs Winning') ;
```

**=> [View Methods List & Explanations](https://github.com/julien-boudry/Condorcet/blob/master/VOTING_METHODS.md)**