# Initialize Condorcet Class

## Basically
```php

## Vanilla PHP
require_once 'Condorcet/__CondorcetAutoload.php' ; 
use CondorcetPHP\Condorcet\Election ;

$election = new Election () ;
``

## With Composer
`composer require julien-boudry/condorcet`    

Look https://packagist.org/packages/julien-boudry/condorcet    
You can use the composer autoloader.


## With Frameworks
*Read the doc! The Condorcet folder inside the lib directory can be move into your solution lib directory*

Condorcet library is compliant with PSR-4 autoloader.

