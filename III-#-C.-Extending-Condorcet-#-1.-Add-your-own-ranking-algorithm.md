# Link your algorithm

The class specifications and name should be in this format: 
```php
class AlgorithmName extends namespace\CondorcetAlgo implements namespace\Condorcet_Algo
```
File on disk must follow this format: `AlgorithmName.algo.php`  

You must register this algorithm this way:  
```php
Condorcet::addAlgos('AlgorithmName') ;
```
