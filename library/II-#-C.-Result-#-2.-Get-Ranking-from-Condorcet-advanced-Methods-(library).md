# Get a complete ranking from advanced methods
```php
Election::getResult ( [mixed $method = false , array $options] )
```
**method:** String name of an available advanced Condorcet method. True for default method.
**options:** Array

**Return value:** Return a CondorcetPHP\Condorcet\Result object. He is Iterable, Countable and support array access, It behaves just like an ordered array.


## Usual Use

```php
echo 'Schulze winner is : ' . $election->getWinner('Schulze')->getName() . '\n';

foreach ($election->getResult('Schulze') as $rank => $candidates) :

    echo 'Rank ' . $rank . ': ';
    echo implode(',',$candidates);
    echo '\n';
    
endforeach;

echo 'Schulze loser is : ' . $election->getLoser('Schulze') .'\n\n'; // Optionally, use __toString magic method

echo 'Condorcet winner is : ' . ($election->getCondorcetWinner() ?? 'No Condorcet winner') .'\n';
echo 'Condorcet loser is : ' . ($election->getCondorcetLoser() ?? 'No Condorcet Loser') .'\n';


/* Output can be :

Schulze Winner is : Candidate 3

Rank 1: Candidate 3
Rank 2: Candidate 1,Candidate 4
Rank 3: Candidate 5
Rank 4: Candidate 2

Schulze Loser is : Candidate 2

Condorcet winner is : Candidate 3
Condorcet winner is : No Condorcet Loser
*/

```


## Use with tag filter option

__Warning: Using getResult() with tags filter option don't use cache engine and computing each time you call it.__


```php
// Use the Schulze ranking method, but only compute votes with tags 'Julien' or tag 'Beethoven'.
$election->getResult(   'Schulze',
                        ['tags' => array('Julien', 'Beethoven'), 'withTag' => true]
                    ); 

// Use the Copeland methodd, no special parameters to it, but only compute with vote without tag 'Julien' and without tag 'Beethoven'.
$election->getResult(   'Copeland',
                        ['tags' => array('Julien', 'Beethoven'), 'withTag' => false]
                    ) ; 
```