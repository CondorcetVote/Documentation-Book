# Get a complete ranking from advanced methods
```php
getResult ( [mixed $method = false , array $extra_param = null, mixed $tag , bool $with = true] )
```
**method:** String name of an available advanced Condorcet method. True for default method.
**extra_param:** Specific for each method, if needed.
**tag:** Use a special set of votes.  
**with:** With or without one a this tag(s)   

**Return value:** Throw an exception on error, else a nice array for ranking.

__Warning: Using getResult() with tags filter don't use cache engin and computing each time you call it, prefer clone object and remove votes if you can do it.__


```php
$condorcet->getResult() ; // Set of results with ranking from the default method. (Class Default: Schulze)  
$condorcet->getResult('Schulze') ; // Get the result for a valid method.
$condorcet->getResult( 'KemenyYoung', array('noConflict' => true) ) ; // Sometimes (actually only this one for KemenyYoung), you can use an array for some algorithm configuration. See details above.
$condorcet->getResult(true, null, 'Julien,Beethoven') ; // Use the default ranking method, no special parameters to it, but only compute with vote get tag 'Julien' or tag 'Beethoven'.
$condorcet->getResult('Copeland', null, 'Julien,Beethoven', false) ; // Use the Copeland methodd, no special parameters to it, but only compute with vote without tag 'Julien' and without tag 'Beethoven'.
```