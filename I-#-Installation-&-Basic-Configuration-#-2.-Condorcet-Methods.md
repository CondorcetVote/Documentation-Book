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

These advances give you methods (in some cases) alternatives to address the lack of winning or losing natural Condorcet if Condorcet paradox.   
They also provide a comprehensive ranking, which does not allow the original method of Marquis de Condorcet.

Unless otherwise against these advanced methods can not contradict the results of Condorcet. It is therefore essential supplements.   

## Description

* **Condorcet Basic** Give you the natural winner or loser of Condorcet, if there is one.  
* **Copeland** http://en.wikipedia.org/wiki/Copeland%27s_method
* **Dodgson Approximations** *(Not the real Dodgson method, see: [Lewis Caroll, Voting and the taxicab metric](https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf))*
    * **Dodgson Quick** *(recommended)*  
    * **Dodgson Tideman approximation**
* **Kemeny-Young** http://en.wikipedia.org/wiki/Kemeny-Young_method _Kemeny-Young is currently limited up to 8 candidats. Note that, for 8 candidates, you must provide into php.ini a memory_limit upper than 160MB._
* **Minimax Family** http://en.wikipedia.org/wiki/Minimax_Condorcet
    * **Minimax Winning** *(Does not satisfy the Condorcet loser criterion)*  
    * **Minimax Margin** *(Does not satisfy the Condorcet loser criterion)*
    * **Minimax Opposition** *(By nature, this alternative does not meet any criterion of Condorcet)*
* **RankedPairs *(:warning: Experimental implementation)*** https://en.wikipedia.org/wiki/Ranked_pairs  
* **Schulze Family** http://en.wikipedia.org/wiki/Schulze_method  
    * **Schulze Winning** Schulze Winning is recommended by Markus Schulze himself. ***This is the default choice.*** *This method is also known as Schulze Method.*
    * **Schulze Margin** Variant from Markus Schulze himself.
    * **Schulze Ratio** Markus Schulze himself.

### Comparative
* [Table on Condorcet.Vote](http://www.condorcet.vote/Condorcet_Methods)

## Use an advanced method

```php
// Provide a full ranking
$election->getResult() ; // Class default algo. Without your intervention, it is Schulze Winning.
$election->getResult('Minimax Winning') ;
$election->getResult('Kemeny-Young') ;
$election->getResult('Schulze') ;
[...]

// Just get Winner or Loser

$election->getWinner() ; // Give you a winner by strict use of the original method from Marquis of Condorcet.
$election->getLoser('Schulze Margin') ; // use the Schulze margin method, which complements the original method.
$election->getWinner('Kemeny-Young') ;
[...]
```

Family  | Name  | String Class Name | Default Algo.
:-----: | :-----: | :-----:| :-----:
| [Copeland](http://en.wikipedia.org/wiki/Copeland%27s_method) | Copland | 'Copeland'
| [Dodgson](https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf) | Dodgson Quick | 'Dodgson Quick'
| [Dodgson](https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf) | Dodgson Tideman approximation | 'Dodgson Tideman'
| [Kemeny–Young](http://en.wikipedia.org/wiki/Kemeny-Young_method) | Kemeny–Young | 'Kemeny-Young'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Winning | 'Minimax Winning'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Margin | 'Minimax Margin'
| [Minimax](http://en.wikipedia.org/wiki/Minimax_Condorcet) | Minimax Opposition | 'Minimax Opposition'
| [Ranked Pairs](https://en.wikipedia.org/wiki/Ranked_pairs) | Ranked Pairs | 'Ranked Pairs'
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Winning | 'Schulze' | X
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Margin | 'Schulze Margin'
| [Schulze](http://en.wikipedia.org/wiki/Schulze_method) | Schulze Ratio | 'Schulze Ratio'




