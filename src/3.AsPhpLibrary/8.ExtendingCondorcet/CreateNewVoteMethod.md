# Create a new Vote Method

## Link your algorithm

Take inspiration from the simplified example below. Read code from ```CondorcetPHP\Condorcet\Algo\Method``` (abstract class) and ```CondorcetPHP\Condorcet\Algo\MethodInterface``` (interface).
You should also read ```CondorcetPHP\Condorcet\Algo\Methods\Copeland``` code, it's a simple and efficient implementation.

## Basic example

```php
namespace MyNameSpace;

class AlgorithmName extends CondorcetPHP\Condorcet\Algo\Method implements CondorcetPHP\Condorcet\Algo\MethodInterface
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
        return []; // You are free to do all you want. Must be an array.;
    }



/////////// COMPUTE ///////////


    //:: ALGORITHM. :://

    protected function makeRanking ()
    {
        $myPairwise = $this->_selfElection->getPairwise(false);

        $result = [0=> [3], 1=> [0,4], 2 => [2]]; // Candidate must be valid internal candidate key.

        $this->_Result = $this->createResult($result);
    }
}
```

You must register this algorithm this way:
```php
CondorcetPHP\Condorcet\Condorcet::addMethod('MyNameSpace\AlgorithmName') ;
```
