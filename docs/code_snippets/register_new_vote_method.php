<?php

namespace MyNamespace {
    use CondorcetPHP\Condorcet\Algo\Methods\Schulze\SchulzeWinning;
    use CondorcetPHP\Condorcet\Condorcet;

    class NewVotingMethod extends SchulzeWinning
    {
        public const array METHOD_NAME = ['VotingMethodName', 'VotingMethodNameAlias'];
    }

    Condorcet::addMethod(NewVotingMethod::class);
}
