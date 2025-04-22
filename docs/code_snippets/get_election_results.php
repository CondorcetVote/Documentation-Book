<?php
// Natural Condorcet Winner

use CondorcetPHP\Condorcet\Utils\CondorcetUtil;

require 'manage_votes.php';

$myElection1->getWinner(); // Return NULL if there is not, else return the winner candidate object
$myElection1->getWinner('Schulze'); // Same thing, but try to resolve by Schulze method if there is not one. Can return an array of winners if there are multiple.

// Natural Condorcet Loser
$myElection1->getLoser(); // Return NULL if there is not, else return the winner candidate object

// Advanced Method
$myElection1->getResult(); // Result set for defaut method (Should be Schulze Winning)
$myElection1->getResult('Copeland'); // Do it with the Copeland method

// Get an easy game outcome to read and understand (Table populated by string)
$easyResult = CondorcetUtil::format($myElection1->getResult());
