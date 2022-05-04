# Timer benchmarking 
These two methods can be useful in estimating the computation time of each call to the algorithm. It is not a calculation of all operations carried out by the library, but those specifically related to modules of algorithms for calculating election results.

## Last timer
```php
Election->getLastTimer (): float
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--getLastTimer.md)  

```php
$election->getPairwise();
$election->getLastTimer(); // Return the pairwise computation time ONLY if call before getResult(), getWinner(), getLoser(). Besause, cache system skip operation next time exept if there are new votes.

$election->getResult('RankedPairs');
$election->getLastTimer(); // Return 0.00112 (string)
$election->getResult('RankedPairs');
$election->getLastTimer(); // Return 0.00003 . See the cache system working!
$election->getResult('KemenyYoung');
$election->getLastTimer(true); // Return 0.14926002 (float) . KemenyYoung can be really slow....
$election->getResult('Copeland');
$election->getLastTimer(true); // Return 0.00010030 (float) . But Copeland is really fast!
```

## Global timer
```php
public Election->getGlobalTimer (): float
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--getGlobalTimer.md)   


```php
$election->getResult('RankedPairs');
$election->getResult('KemenyYoung');
$election->getResult('Copeland');
$election->getGlobalTimer(true); // Return 0.02600050 (float) . Time calculation, including that of the Pairwise
```
