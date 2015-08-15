# Link your algorithm

The class specifications and name should be in this format: 
```php
namespace MyNameSpace;

class AlgorithmName extends Condorcet\Algo\Method implements Condorcet\Algo\MethodInterface
{
	const METHOD_NAME = 'FirstMethodName,Alias1,Alias_2,Alias 3,Other Alias[...]'; // Note: All of them will be converted to uppercase.

	$protected $myResult;
	$protected $myStats;

	public function getResult ($options) {
		$this->mywork($this->_selfElection, $options);

		return $this->myResult;
	}

	public function getStats () {
		$this->myWork();

		return $this->myStats; // You are free to return all you want or null, this go directly to the userland.
	}

	protected function myWork (Condorcet\Election $election, $options) {
		
		if ( empty($myResult) ) {
			// Your job here

			# Result must follow this format
			$this->myResult = [0=>$CandidateX, 1=> [$CandidateY,$CandidateZ], 2=> $CandidateR]; // Candidate must be valid Condorcet\Candidate object.

			# Additionnals stats
			$this->myStats = 'You are free to do all you wants';
		}		
	}
}
```  

You must register this algorithm this way:  
```php
Condorcet\Condorcet::addAlgos('MyNameSpace\AlgorithmName') ;
```
