<?php
require 'play_with_candidates.php';

$myElection1->getVotesList(); // Returns an array of all votes as object.

// How many Vote with tag "strangeVote" ?
$myElection1->countVotes('strangeVote'); // Return 12 (int)

// Return this 12 votes !
$myElection1->getVotesList('strangeVote');
// Or without this tags and get the first of them
$oneVoteToDelete = $myElection1->getVotesList('strangeVote', false)[0] ;

// Vote objet
$myVote111->getRanking(); // Return the current ranking
$myVote111->getContextualRanking($myElection1); // Return the full ranking in the context of election 1 (with 6 candidates)

// Change the vote
$myVote111->setRanking([
                $myLutoCandidate,
                $myDebussyCandidate,
                $myElection1->getCandidateObjectFromName('Caplet'),
                $myElection1->getCandidateObjectFromName('Ligeti')]
                );
                // Note that when a Vote object is linked to one or more elections, you can can only change his ranking by passing Candidate object.

// Check the vote history
$myVote111->getHistory();

// Delete Votes

// Delete a specific vote object
$myElection1->removeVote( $oneVoteToDelete );

// Delete all vote with tag "strangeVote" or "frenchies"
$myElection1->removeVotesByTags( ['strangeVote','frenchies'] );

// Delete all vote without tag 'Wagnerian'
# $myElection1->removeVotesByTags( ['strangeVote','frenchies'], false ); // Here, if uncomment, all the vote will be deleted.
