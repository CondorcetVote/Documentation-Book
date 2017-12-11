# Original Condorcet Method (Winner / Loser)

* **Condorcet Basic** Give you the natural winner or looser of Condorcet, if there is one.  
*(This method is the only core method, you cannot remove it)*

```php
// Will return the strict natural Condorcet Winner candidate. Or Null if there is not.
$election->getWinner() ; 
// Will return the strict natural Condorcet Loser candidate. Or Null if there is not.
$election->getLoser() ;
```

# Advanced Condorcet Methods

These advances give you methods (in some cases) alternatives to address the lack of winning or losing natural Condorcet if Condorcet paradox occur.   
They also provide a comprehensive ranking, which does not allow the original method of Marquis de Condorcet.

Most of these methods cannot contradict the result of the original method of the Marquis de Condorcet. It completes it, however, with a complete ranking, and an alternative if the original method does not achieve a result (Condorcet's paradox).

## Description

* **Copeland** http://en.wikipedia.org/wiki/Copeland%27s_method
* **Dodgson Approximations** *(Not the real Dodgson method, see: [Lewis Caroll, Voting and the taxicab metric](https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf))*
    * **Dodgson Quick** *(recommended)*
    * **Dodgson Tideman approximation**
* **Kemeny–Young** http://en.wikipedia.org/wiki/Kemeny-Young_method _Kemeny-Young is currently limited up to 8 candidats. Note that, for 8 candidates, you must provide into php.ini a memory_limit upper than 160MB._
* **Minimax Family** http://en.wikipedia.org/wiki/Minimax_Condorcet
    * **Minimax Winning** *(Does not satisfy the Condorcet loser criterion)*  
    * **Minimax Margin** *(Does not satisfy the Condorcet loser criterion)*
    * **Minimax Opposition** *(By nature, this alternative does not meet any criterion of Condorcet)*
* **Ranked Pairs Family** https://en.wikipedia.org/wiki/Ranked_pairs *This method is also known as Tideman method.*
    * **Ranked Pairs Margin** Margin variant is recommended by Nicolaus Tideman himself. ***This is the default choice.***
    * **Ranked Pairs Winning** Widely used variant, maybe more than the original.
* **Schulze Family** http://en.wikipedia.org/wiki/Schulze_method *This method is also known as Schulze Method.*
    * **Schulze Winning** Schulze Winning is recommended by Markus Schulze himself. ***This is the default choice.***
    * **Schulze Margin** Variant from Markus Schulze himself.
    * **Schulze Ratio** Variant from Markus Schulze himself.

Comparative : [Table on Condorcet.Vote](http://www.condorcet.vote/Condorcet_Methods)

## Details

### Copeland

#### Characteristics

> **Family:** Copeland method  
> **Wikipedia** : http://en.wikipedia.org/wiki/Copeland%27s_method  
> **Variant** : *None*  

> **Implementation Comments:** *None*

> **Choice of character strings available for function calls (case-insensitive)**: "Copeland"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Copeland') ;

// Just get Winner or Loser
$election->getWinner('Copeland') ;
$election->getLoser('Copeland') ;
```

### Dodgson Quick

#### Characteristics

> **Family:** Dodgson method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Dodgson%27s_method  
> **Variant** : Approximation for Dodgson method called "Dodgson Quick" from https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Dodgson Quick" / "DodgsonQuick" / "Dodgson Quick Winner"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Dodgson Quick') ;

// Just get Winner or Loser
$election->getWinner('Dodgson Quick') ;
$election->getLoser('Dodgson Quick') ;
```

### Dodgson Tideman Approximation

#### Characteristics

> **Family:** Dodgson method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Dodgson%27s_method  
> **Variant** : Approximation for Dodgson method called "Tideman approximation" from https://www.maa.org/sites/default/files/pdf/cmj_ftp/CMJ/September%202010/3%20Articles/6%2009-229%20Ratliff/Dodgson_CMJ_Final.pdf  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Dodgson Tideman Approximation" / "DodgsonTidemanApproximation" / "Dodgson Tideman" / "DodgsonTideman"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Dodgson Tideman') ;

// Just get Winner or Loser
$election->getWinner('Dodgson Tideman') ;
$election->getLoser('Dodgson Tideman') ;
```


### Kemeny–Young

#### Characteristics

> **Family:** Kemeny–Young method  
> **Wikipedia** : http://en.wikipedia.org/wiki/Kemeny-Young_method _Kemeny-Young  
> **Variant:** *None*

> **Implementation Comments:** Kemeny-Young is currently limited up to 8 candidats. Note that, for 8 candidates, you must provide into php.ini a memory_limit upper than 160MB.  

> **Choice of character strings available for function calls (case-insensitive)**: "Kemeny–Young" / "Kemeny-Young" / "Kemeny Young" / "KemenyYoung" / "Kemeny rule" / "VoteFair popularity ranking" / "Maximum Likelihood Method" / "Median Relation"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Kemeny-Young') ;

// Just get Winner or Loser
$election->getWinner('Kemeny-Young'') ;
$election->getLoser('Kemeny-Young') ;
```


### Minixmax Winning

#### Characteristics

> **Family:** Minimax method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Minimax_Condorcet  
> **Variant:** Winning *(Does not satisfy the Condorcet loser criterion)*  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Minimax Winning" / "MinimaxWinning" / "Minimax" / "Minimax_Winning" / "Simpson" / "Simpson-Kramer" / "Simpson-Kramer Method" / "Simpson Method"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Minimax Winning') ;

// Just get Winner or Loser
$election->getWinner('Minimax Winning') ;
$election->getLoser('Minimax Winning') ;
```


### Minixmax Margin

#### Characteristics

> **Family:** Minimax method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Minimax_Condorcet  
> **Variant:** Margin *(Does not satisfy the Condorcet loser criterion)*  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Minimax Margin" / "MinimaxMargin" / "MinimaxMargin" / "Minimax_Margin"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Minimax Margin') ;

// Just get Winner or Loser
$election->getWinner('Minimax Margin') ;
$election->getLoser('Minimax Margin') ;
```


### Minixmax Oppositon

#### Characteristics

> **Family:** Minimax method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Minimax_Condorcet  
> **Variant:** Opposition *(By nature, this alternative does not meet any criterion of Condorcet)*  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Minimax Opposition" / "MinimaxOpposition" / "Minimax_Opposition"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Minimax Opposition') ;

// Just get Winner or Loser
$election->getWinner('Minimax Opposition') ;
$election->getLoser('Minimax Opposition') ;
```


### Ranked Pairs Margin

#### Characteristics

> **Family:** Schulze method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Ranked_pairs  
> **Variant:** Margin *(Ranked Pairs Margin is used by Nicolaus Tideman himself from originals papers. But it's not necessarily the most common. Most other documentation preferring the Winning variant. Even Wikipedia is the different from one language to another.)*  

> **Implementation Comments:** In the event of impossibility of ordering a pair by their margin of victory. Try to separate them when possible by their smaller minority opposition. In case of a tie in the classification. No advanced methods are used. It is therefore an implementation in accordance with the first paper published in 1987. Without advanced tie-breaking, because it brings unnecessary complexity and is partly based on randomness. this method can therefore come out ties on some ranks. Even if that is very unlikely on an honest election of good size.  

> **Choice of character strings available for function calls (case-insensitive)**: "Ranked Pairs Margin" / "Tideman Margin" / "RP Margin" / "Ranked Pairs" / "RankedPairs" / "Tideman method"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Ranked Pairs Margin') ;

// Just get Winner or Loser
$election->getWinner('Ranked Pairs Margin') ;
$election->getLoser('Ranked Pairs Margin') ;
```


### Ranked Pairs Winning

#### Characteristics

> **Family:** Schulze method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Ranked_pairs  
> **Variant:** Winning  

> **Implementation Comments:** In the event of impossibility of ordering a pair by their margin of victory. Try to separate them when possible by their smaller minority opposition. It is therefore an implementation in accordance with the first paper published in 1987. Without advanced tie-breaking, because it brings unnecessary complexity and is partly based on randomness. this method can therefore come out ties on some ranks. Even if that is very unlikely on an honest election of good size.  

> **Choice of character strings available for function calls (case-insensitive)**: "Ranked Pairs Winning" / "Tideman Winning" / "RP Winning"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Ranked Pairs Winning') ;

// Just get Winner or Loser
$election->getWinner('Ranked Pairs Winning') ;
$election->getLoser('Ranked Pairs Winning') ;
```


### Schulze Winning

#### Characteristics

> **Family:** Schulze method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Schulze_method  
> **Variant:** Winning *(Schulze Winning is recommended by Markus Schulze himself. This is the default choice. This variant is also known as Schulze Method.)*  

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Schulze Winning" / "Schulze" / "SchulzeWinning" / "Schulze_Winning" / "Schwartz Sequential Dropping" / "SSD" / "Cloneproof Schwartz Sequential Dropping" / "CSSD" / "Beatpath" / "Beatpath Method" / "Beatpath Winner" / "Path Voting" / "Path Winner"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Schulze') ;

// Just get Winner or Loser
$election->getWinner('Schulze') ;
$election->getLoser('Schulze') ;
```


### Schulze Margin

#### Characteristics

> **Family:** Schulze method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Schulze_method  
> **Variant:** Margin    

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Schulze Margin" / "SchulzeMargin" / "Schulze_Margin"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Schulze Margin') ;

// Just get Winner or Loser
$election->getWinner('Schulze Margin') ;
$election->getLoser('Schulze Margin') ;
```


### Schulze Ratio

#### Characteristics

> **Family:** Schulze method  
> **Wikipedia** : https://en.wikipedia.org/wiki/Schulze_method  
> **Variant:** Ratio    

> **Implementation Comments:** *None*  

> **Choice of character strings available for function calls (case-insensitive)**: "Schulze Ratio" / "SchulzeRatio" / "Schulze_Ratio"  

#### Code example

```php
// Get Full Ranking
$election->getResult('Schulze Ratio') ;

// Just get Winner or Loser
$election->getWinner('Schulze Ratio') ;
$election->getLoser('Schulze Ratio') ;
```