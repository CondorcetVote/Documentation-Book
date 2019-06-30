# Get Winner / Loser

## Original Condorcet method Winner / Loser

```php
Election::getWinner ( [mixed $method = false] )
Election::getLoser ( [mixed $method = false] )
```
**method:** String name of an available advanced Condorcet method. True for default method.

**Return value:** \CondorcetPHP\Condorcet\Candidate object, null if there are no available winner or loser. Advanced method can return multiples winner, an array will be returned.

## Just orthodox Condorcet Winner / Loser
```php
$winner = $election->getWinner() ; // Will return a string with the Condorcet Winner candidate name
$loser = $election->getLoser() ; // Will return a string with the Condorcet loser candidate name

if ($winner !== null) :
    echo 'My winner is ' . $winner->getName() ;
else :
    echo 'There is no winner. Cause of Condorcet paradox.'
endif;

if ($loser !== null) :
    echo 'My loser is ' . (string) $loser ; // Little tips : CondorcetPHP\Condorcet\Candidat implement __toString() magic method.
else :
    echo 'There is no loser. Cause of Condorcet paradox.'
endif;
```


## Use winner from an advanced method

If there is not a regular Condorcet Winner or Loser, process to a special winner(s) using an advanced method.  
Have a look to [Condorcet Methods manual chapter](https://github.com/julien-boudry/Condorcet/wiki/I-%23-Installation-%26-Basic-Configuration-%23-2.-Condorcet-Methods)

```php
$election->getWinner(true) ; // With the default object method (Class Default: Schulze Winning)  
$election->getWinner('Copeland') ; // Name of a valid method  

$election->getLoser(true) // With the default object method (Class Default: Schulze Winning)  
$election->getLoser('Kemeny-Young') ; // Name of a valid method  
```

In case of using some advanced Condorcet methods, like Schulze. getWinner() ou getLoser() methods can return one or multiple winners/losers. If there is only one, a Candidate object will be returning, else an array of Candidate objects.