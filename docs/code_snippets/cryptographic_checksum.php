<?php

use CondorcetPHP\Condorcet\Election;

$election = new Election;
$originalChecksum = $election->getChecksum();
$toStore = serialize($election);
unset($election);
$newElection = unserialize($toStore);

assert($newElection->getChecksum() === $originalChecksum); // true
