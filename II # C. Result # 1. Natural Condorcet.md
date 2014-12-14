# Just get the natural Condorcet Winner

```php
getWinner ( [mixed $method = false] )
getLoser ( [mixed $method = false] )
```
**method:** String name of an available advanced Condorcet method. True for default method.

**Return value:** Candidate name, null if there are no aviable winner or loser. Throw an exception on error.

## Regular
```php
$condorcet->getWinner() ; // Will return a string with the Condorcet Winner candidate name
$condorcet->getLoser() ; // Will return a string with the Condorcet looser candidate name
```


## Special
If there is not a regular Condorcet Winner or Loser, process to a special winner(s) using an advanced method.  

```php
$condorcet->getWinner(true) ; // With the default object method (Class Default: Schulze)  
$condorcet->getWinner('Schulze') ; // Name of an valid method  

$condorcet->getLoser(true) // With the default object method (Class Default: Schulze)  
$condorcet->getLoser('Schulze') ; // Name of an valid method  
```

Will return a string with the Candidate Name or many separated by commas  