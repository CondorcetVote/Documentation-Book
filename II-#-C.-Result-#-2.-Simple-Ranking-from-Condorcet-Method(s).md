# Get a complete ranking from advanced methods
```php
getResult ( [mixed $method = false , array $options] )
```
**method:** String name of an available advanced Condorcet method. True for default method.
**options:** Array

**Return value:** Throw an exception on error, else a nice array for ranking.

__Warning: Using getResult() with tags filter don't use cache engin and computing each time you call it, prefer clone object and remove votes if you can do it.__


```php
$election->getResult() ; // Set of results with ranking from the default method. (Class Default: Schulze)  
$election->getResult('Schulze') ; // Get the result for a valid method.
$election->getResult( 'KemenyYoung', array('algoOptions' => ['noConflict' => true]) ) ; // Sometimes (actually only this one for KemenyYoung), you can use an array for some algorithm configuration. See details above.
$election->getResult(true, ['tags' => array('Julien', 'Beethoven'),
                             'withTag' => true	]) ; // Use the default ranking method, no special parameters to it, but only compute with vote get tag 'Julien' or tag 'Beethoven'.
$election->getResult('Copeland', ['tags' => array('Julien', 'Beethoven'),
                             'withTag' => false	]) ; // Use the Copeland methodd, no special parameters to it, but only compute with vote without tag 'Julien' and without tag 'Beethoven'.
```