# Initialize Condorcet Class

## Basically
```php
require_once 'Condorcet/__CondorcetAutoload.php' ; // Customize the path for your use.
use Condorcet\Condorcet ; // Optionnal if you prefer to use the full namespace length

$condorcet = new Condorcet () ;
```
Include __CondorcetAutoload.php only if you don't have any PSR-4 autoloader. If you don't know, include it.

## With Frameworks
*Read the doc! The Condorcet folder inside the lib directory can be move into your solution lib directory*

Condorcet library is compliant with PSR-4 autoloader.

## With Composer
`composer require julien-boudry/condorcet`    

Look https://packagist.org/packages/julien-boudry/condorcet    
You can use the composer autoloader.