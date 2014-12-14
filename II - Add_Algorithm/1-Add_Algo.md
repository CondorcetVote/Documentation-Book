# Link your algorithm

The class name should be in this format: 
```php
class AlgorithmName implements namespace\Condorcet_Algo  
```
File on disk must follow this format: `AlgorithmName.algo.php`  

You must register this algorithm this way:  
```php
Condorcet::addAlgos('AlgorithmName') ;
```  

You can specify it as default algorithm:  

_[See the appropriate instructions at the top](#change-the-class-default-method-if-needed)_  
