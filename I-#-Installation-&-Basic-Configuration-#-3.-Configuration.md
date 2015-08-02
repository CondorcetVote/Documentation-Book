# Configure it if needed

## Change the class default method if needed
```php
Condorcet::setDefaultMethod('Schulze'); // Argument: A supported method  
```

## Get information 
```php
$condorcet->getConfig (); // Will return an explicit array about the object and Class Constant.  

Condorcet::getDefaultMethod('Schulze'); // Return a string with the name of the default method in used.

Condorcet::getAuthMethods (); // Get an array of authorized methods to use with the correct string to use as parameter.  
```

## Get library version / Get object version

The distinction may be useful in the case of a storage of the object in the database.
```php
Condorcet::getClassVersion();  // Return the Class engine
$condorcet->getObjectVersion(); // Return the Class engine who build this object
```