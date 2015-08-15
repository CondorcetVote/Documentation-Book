# Just get the natural Condorcet Winner

```php
getWinner ( [mixed $method = false] )
getLoser ( [mixed $method = false] )
```
**method:** String name of an available advanced Condorcet method. True for default method.

**Return value:** Candidate name, null if there are no available winner or loser. Throw an exception on error.

## Regular
```php
$election->getWinner() ; // Will return a string with the Condorcet Winner candidate name
$election->getLoser() ; // Will return a string with the Condorcet loser candidate name
```


## Special
If there is not a regular Condorcet Winner or Loser, process to a special winner(s) using an advanced method.  

```php
$election->getWinner(true) ; // With the default object method (Class Default: Schulze)  
$election->getWinner('Schulze') ; // Name of an valid method  

$election->getLoser(true) // With the default object method (Class Default: Schulze)  
$election->getLoser('Schulze') ; // Name of an valid method  
```

In case of using some advanced Condorcet methods, like Schulze. getWinner() ou getLoser() methods can return one or multiple winners/losers. If there is only one, a Candidate object will be returning, else an array of Candidate objects.