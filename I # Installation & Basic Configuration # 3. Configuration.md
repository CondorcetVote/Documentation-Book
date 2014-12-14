# Configure it if needed

## Change the object default method if needed
```php
$condorcet->setMethod('Schulze') ; // Argument: A supported method. Return the string name of new default method for this object (
or forced method after the class if fonctionnalitée enabled). Throw an exception on error.
```

## Change the class default method if needed
```php
Condorcet::setClassMethod('Schulze') ; // Argument: A supported method  
Condorcet::setClassMethod('Schulze', true) ; // Will force actual and futher object to use this by default.  
Condorcet::forceMethod(false) ; // Unforce actual and futher object to use the class default method (or force it if argument is true)
```

## Get information 
```php
$condorcet->getConfig (); // Will return an explicit array about the object and Class Constant.  

$condorcet->getMethod (); // Return a string with the name of the default method in use for this object, including if the force class Constant is defined to true.  

Condorcet::getAuthMethods (); // Get an array of authorized methods to use with the correct string to use as parameter.  
```

## Get library version / Get object version

The distinction may be useful in the case of a storage of the object in the database.
```php
Condorcet::getClassVersion();  // Return the Class engine
$condorcet->getObjectVersion(); // Return the Class engine who build this object
```

#### Reset object without destroying it (discouraged pratice)
```php
$condorcet->resetAll (); // Destroy all but keep timer stats.
``` 