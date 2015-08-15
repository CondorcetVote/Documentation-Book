# Timer benchmarking 
These two methods can be useful in estimating the computation time of each call to the algorithm. It is not a calculation of all operations carried out by the library, but those specifically related to modules of algorithms for calculating election results.

## Last timer
```php
getLastTimer (bool $float = false)
```
**float:** If true, return a float number. Else, it return number_format($result, 5).

**Return value:** Returns the CPU time measured during the last arithmetic operation results with getResult() getWinner() getLoser() OR the Pairwise with getPairwise().    


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
getGlobalTimer (bool $float = false)
```
**float:** If true, return a float number. Else, it return number_format($result, 5).

**Return value:** Returns the CPU time measured in the overall operations of calculation results with getResult () getWinner () getLoser () AND the Pairwise. Since the creation of the object.    


```php
$election->getResult('RankedPairs');
$election->getResult('KemenyYoung');
$election->getResult('Copeland');
$election->getLastTimer(true); // Return 0.02600050 (float) . Time calculation, including that of the Pairwise
```
