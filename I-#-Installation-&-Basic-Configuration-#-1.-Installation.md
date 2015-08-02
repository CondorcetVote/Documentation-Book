# Initialize Condorcet Class

## Basically
```php
require_once 'Condorcet/lib/Condorcet/Condorcet.php' ; // Customize the path for your use.
use Condorcet\Condorcet ; // Optionnal if you prefer to use the full namespace length

$condorcet = new Condorcet () ;
```

#### Example with the official PSR-0 example of Autoloader
```php
// PSR-0 style Loader

	// ENTER HERE THE PATH TO YOUR LIB FOLDER
	define('LIB_PATH', 'lib'.DIRECTORY_SEPARATOR);

	function autoload($className)
	{
	    $className = ltrim($className, '\\');
	    $fileName  = '' ;
	    $namespace = '';
	    if ($lastNsPos = strripos($className, '\\')) {
	        $namespace = substr($className, 0, $lastNsPos);
	        $className = substr($className, $lastNsPos + 1);
	        $fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	    }
	    $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';

	    require LIB_PATH.$fileName;
	}

	spl_autoload_register('autoload');


///// STARTING

use Condorcet\Condorcet ; // Optional!

$condorcet = new Condorcet (); // If you omit the previous line, do: new Condorcet\Condorcet () ;

```


## With Frameworks
*Read the doc! The Condorcet folder inside the lib directory can be move into your solution lib directory*


## With Composer
`composer require julien-boudry/condorcet`

Look https://packagist.org/packages/julien-boudry/condorcet  