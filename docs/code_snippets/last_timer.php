<?php

use CondorcetPHP\Condorcet\Condorcet;

Condorcet::$UseTimer = true;

$electionWithVotes->getResult('RankedPairs');
$electionWithVotes->getLastTimer(); // Return 0.00112 (string)
$electionWithVotes->getResult('RankedPairs');
$electionWithVotes->getLastTimer(); // Return 0.00003 . See the cache system working!
$electionWithVotes->getResult('KemenyYoung');
$electionWithVotes->getLastTimer(true); // Return 0.14926002 (float) . KemenyYoung can be really slow....
$electionWithVotes->getResult('Copeland');
$electionWithVotes->getLastTimer(true); // Return 0.00010030 (float) . But Copeland is really fast!
