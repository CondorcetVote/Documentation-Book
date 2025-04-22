<?php
use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Vote;

// Create a second election

require 'get_election_results.php';

$myElection2 = new Election;

// Create three candidate : 'A', 'B' and 'C'
for ($i = 0 ; $i < 3 ; $i++) {
    $myElection2->addCandidate();
}

// Same candidate in multiple elections

// Add two participating candidates from $myElection1
$myElection2->addCandidate( $myElection1->getCandidateObjectFromName('Debussy') );
$myElection2->addCandidate($myLutoCandidate);

// And, I can change again theirs name. The new name is now applied in the two elections and their votes. If namesake in another election, an exception is throw.
$myLutoCandidate->setName('W.Lutoslawski');

// Have a look on $myLutoCandidate history
$myLutoCandidate->nameHistory;

// In what elections, this candidates have a part ?
$myLutoCandidate->getLinks(); // Get Condorcet objects
$myLutoCandidate->countLinks(); // Or just count it

// The same vote applied to multiple elections.

$myNewVote = new Vote ( [$myLutoCandidate,'Debussy'] );

// Add it on election 1 and 2
$myElection1->addVote( $myNewVote ); // Note that Vote has been altered. 'Debussy' string become a reference to $myElection1->getCandidateObjectFromName('Debussy'); Cause there are namesake and there was not any conflict.
$myElection2->addVote( $myNewVote );


// In what election, this candidates have a part ?
$myNewVote->getLinks(); // Get Condorcet objects
$myNewVote->countLinks(); // Or just count it

// Get the vote ranking in context of each elections
foreach ($myNewVote->getLinks() as &$link)
{
    $myNewVote->getContextualRanking($link);
}

// Now we can change vote ranking

$myNewVote->setRanking([$myElection1->getCandidateObjectFromName('Debussy'),$myLutoCandidate]); // If these votes are already engaged in the election, you must use compatible Candidate objects with all relevant elections. Else, get a nice exception.

// Get Ranking history
$myNewVote->rankingHistory; // Get the full history of this vote ranking
