# Link your algorithm

Take inspiration from the simplified example below. Read code from Condorcet\Algo\Method (abstract class) and Condorcet\Algo\MethodInterface (interface).
You should also read Condorcet\Algo\Methods\Copeland code, it's a simple and efficient implementation.

```php
namespace MyNameSpace;

class AlgorithmName extends Condorcet\Algo\Method implements Condorcet\Algo\MethodInterface
{
    const METHOD_NAME = ['FirstMethodName','Alias1','Alias_2','Alias 3'];


    // Get the Result object
    public function getResult ($options = null) : Result
    {
        // Cache
        if ( $this->_Result !== null )
        {
            return $this->_Result;
        }

            //////

        // Ranking calculation
        $this->makeRanking();

        // Return
        return $this->_Result;
    }


    // Compute the Stats
    protected function getStats () : array
    {
        return []; // You are free to do all you wants. Must be an array.;
    }



/////////// COMPUTE ///////////


    //:: ALGORITHM. :://

    protected function makeRanking ()
    {
        $myPairwise = $this->_selfElection->getPairwise(false);

        $result = [0=>$CandidateX, 1=> [$CandidateY,$CandidateZ], 2=> $CandidateR]; // Candidate must be valid Condorcet\Candidate object.

        $this->_Result = $this->createResult($result);
    }
}
```  

You must register this algorithm this way:  
```php
Condorcet\Condorcet::addAlgos('MyNameSpace\AlgorithmName') ;
```
