# Native Supported Condorcet Method

* **Condorcet Basic** Give you the natural winner or looser of Condorcet, if there is one.  
*(This method is the only core method, you cannot remove it)*

```php
// Will return the strict natural Condorcet Winner candidate. Or Null if there is not.
$election->getWinner() ; 
// Will return the strict natural Condorcet Loser candidate. Or Null if there is not.
$election->getLoser() ;
```

# Advanced Condorcet Methods

These advances give you methods (in some cases) alternatives to address the lack of winning or losing natural condorcet if Condorcet paradox.   
They also provide a comprehensive ranking, which does not allow the original method of Marquis de Condorcet.

Unless otherwise against these advanced methods can not contradict the results of Condorcet. It is therefore essential supplements.   

## Description

* **Copeland** http://en.wikipedia.org/wiki/Copeland%27s_method

* **Dodgson** https://en.wikipedia.org/wiki/Dodgson%27s_method

* **Kemeny-Young** http://en.wikipedia.org/wiki/Kemeny-Young_method   
*Kemeny-Young does not support default over 8 candidates per election, for performance reasons. This limit can be increased manually to 9 in this way ``` Condorcet\KemenyYoung::$_maxCandidates = 9; ```. However, you will first places provisioned at least 1024M memory for PHP ``` ini_set ('memory_limit', '1024M'); ```, and provide a calculation time can exceed 30 seconds!*

* **Minimax Family** http://en.wikipedia.org/wiki/Minimax_Condorcet
    * **Minimax Winning** *(Does not satisfy the Condorcet loser criterion)*  
    * **Minimax Margin** *(Does not satisfy the Condorcet loser criterion)*
    * **Minimax Opposition**:warning: *By nature, this alternative does not meet any criterion of Condorcet.*

* **RankedPairs *(Since v0.10, EXPERIMENTAL)*** https://en.wikipedia.org/wiki/Ranked_pairs  

* **Schulze Family** http://en.wikipedia.org/wiki/Schulze_method
    * **Schulze** Schulze Winning is recommended by Markus Schulze himself. ***This is the default choice.***
    * **Schulze Margin**
    * **Schulze Ratio**

### Comparative
* [Table on Condorcet.Vote](http://www.condorcet.vote/Condorcet_Methods)

## Use an advanced method

```php
// Provide a full ranking
$election->getResult() ; // Class default algo. Without your intervention, it is Schulze Winning.
$election->getResult('Minimax_Winning') ;
$election->getResult('KemenyYoung') ;
$election->getResult('Schulze') ;
[...]

// Just get Winner or Loser

$election->getWinner() ; // Give you a winner by strict use of the original method from Marquis of Condorcet.
$election->getLoser('Schulze_Margin') ; // use the Schulze margin method, which complements the original method.
$election->getWinner('KemenyYoung') ;
[...]
```

Family  | Name  | String Class Name | Default Algo.
:-----: | :-----: | :-----:| :-----:
| [Copeland](http://en.wikipedia.org/wiki/Copeland%27s_method) | Copland | 'Copeland'
| [Kemeny–Young](http://en.wikipedia.org/wiki/Kemeny-Young_method) | Kemeny–Young | 'KemenyYoung'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Winning | 'Minimax_Winning'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Margin | 'Minimax_Margin'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Opposition | 'Minimax_Opposition'
| [Ranked Pairs](https://en.wikipedia.org/wiki/Ranked_pairs) | Ranked Pairs | 'RankedPairs'
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Winning | 'Schulze' | X
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Margin | 'Schulze_Margin'
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Ratio | 'Schulze_Ratio'




