<?php

use CondorcetPHP\Condorcet\Constraints\NoTie;
use CondorcetPHP\Condorcet\VoteConstraintInterface;

class NoTieAlternative extends NoTie implements VoteConstraintInterface {}

$election->addConstraint(NoTieAlternative::class);
