<?php
namespace YOUR_NAMESPACE;

use CondorcetPHP\Condorcet\{Election, Vote, VoteConstraintInterface};

class NoTieAlternative implements VoteConstraintInterface
{
    public static function isVoteAllowed (Election $election, Vote $vote) : bool
    {
        $voteRanking = $vote->getContextualRankingWithoutSort($election);

        foreach ($voteRanking as $oneRank) {
            if (\count($oneRank) > 1) {
                return false;
            }
        }

        return true;
    }
}
