<?php
use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Vote;

// Create a second election

$election1 = new Election;
$election2 = new Election;

// Create four candidates
$election1->parseCandidates('Debussy;Caplet;Messiaen;Lutoslawski');
$lutoCandidate = $election1->getCandidateObjectFromName('Lutoslawski');
$debussyCandidate = $election1->getCandidateObjectFromName('Debussy');


// Add two participating candidates from $myElection1
$election2->addCandidate($lutoCandidate);
$election2->addCandidate($debussyCandidate);

// And, I can change again theirs name. The new name is now applied in the two elections and their votes. If namesake in another election, an exception is throw.
$lutoCandidate->setName('W.Lutoslawski');

// Have a look on $myLutoCandidate history
$lutoCandidate->nameHistory;

// In what elections, this candidates have a part ?
$lutoCandidate->getLinks(); // Get Condorcet objects
expect($lutoCandidate->getLinks())->toBe([$election1, $election2]);

// The same vote applied to multiple elections.

$myNewVote = new Vote([$lutoCandidate, 'Debussy', 'Messiaen']);

// Add it on election 1 and 2
$election1->addVote($myNewVote); // Note that Vote has been altered. 'Debussy' string become a reference to $myElection1->getCandidateObjectFromName('Debussy'); Cause there are namesake and there was not any conflict.
$election2->addVote($myNewVote);


// In what election, this candidates have a part ?
$myNewVote->getLinks(); // Get Condorcet objects
expect($myNewVote->getLinks())->toBe([$election1, $election2]);

// Get the vote ranking in context of each elections
$contextualRankingInElection1 = $myNewVote->getRankingAsString(context: $election1);
$contextualRankingInElection2 = $myNewVote->getRankingAsString(context: $election2);

expect($contextualRankingInElection1)->toBe('W.Lutoslawski > Debussy > Messiaen > Caplet');
expect($contextualRankingInElection2)->toBe('W.Lutoslawski > Debussy');


// Now we can change vote ranking
$myNewVote->setRanking([$election1->getCandidateObjectFromName('Debussy'),$lutoCandidate]); // If these votes are already engaged in the election, you must use compatible Candidate objects with all relevant elections. Else, get a nice exception.

// Get Ranking history
$myNewVote->rankingHistory; // Get the full history of this vote ranking
