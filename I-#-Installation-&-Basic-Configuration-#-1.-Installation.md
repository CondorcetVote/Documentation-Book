# Initialize Condorcet Class

## Basically
```php
require_once 'Condorcet/lib/Condorcet.php' ; // Customize the path for your use.
use Condorcet\Condorcet ; // Optionnal if you prefer to use the full namespace length

$condorcet = new Condorcet () ;
```

If not other compatible autoloader is use, Condorcet will apply his own PSR-0 like autoloader (limited to himself). But, if you have your own PSR-0 or PSR-4 autoloader, dont worry about requiring Condorcet file.

## With Frameworks
*Read the doc! The Condorcet folder inside the lib directory can be move into your solution lib directory*

Condorcet library is compliant with PSR-0 and PSR-4 autoloader.

## With Composer
`composer require julien-boudry/condorcet`

Look https://packagist.org/packages/julien-boudry/condorcet  