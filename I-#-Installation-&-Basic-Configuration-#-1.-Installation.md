# Initialize Condorcet Class

## Basically
```php
require_once 'Condorcet/__CondorcetAutoload.php' ; // Customize the path for your use. You don't need that if you use composer or other external PSR-4 autoloader.

use Condorcet\Election ;

$election = new Election () ;
``

## With Frameworks
*Read the doc! The Condorcet folder inside the lib directory can be move into your solution lib directory*

Condorcet library is compliant with PSR-4 autoloader.

## With Composer
`composer require julien-boudry/condorcet`    

Look https://packagist.org/packages/julien-boudry/condorcet    
You can use the composer autoloader.