<?php
namespace AnotherNamespace {
    use CondorcetPHP\Condorcet\Algo\Method;
    use CondorcetPHP\Condorcet\Algo\MethodInterface;
    use CondorcetPHP\Condorcet\Algo\Stats\BaseMethodStats;
    use CondorcetPHP\Condorcet\Algo\Stats\StatsInterface;
    use CondorcetPHP\Condorcet\Result;

    class NewVotingMethod extends Method implements MethodInterface
    {
        public const array METHOD_NAME = ['FirstMethodName','Alias1','Alias_2','Alias 3'];

        protected ?Result $result = null;


        // Get the Result object
        public function getResult () : Result
        {
            // Cache
            if ( $this->result !== null )
            {
                return $this->result;
            }

                //////

            // Ranking calculation
            $thePairwise = $this->getElection()->getPairwise();

            $result = [0=> [3], 1=> [0,4], 2 => [2]]; // Candidate must be valid internal candidate key.

            $this->result = $this->createResult($result);

            // Return
            return $this->result;
        }


        // Compute the Stats
        protected function getStats () : StatsInterface
        {
            return new BaseMethodStats([]);
        }

    }
}
