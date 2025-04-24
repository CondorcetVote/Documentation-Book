<?php
require 'play_with_candidates.php';

$myElection1->parseVotes('strangeVote || Koechlin > Debussy * 12');

$myElection1->getVotesList(); // Returns an array of all votes as object.

// How many Vote with tag "strangeVote" ?
expect($myElection1->countVotes('strangeVote'))->toBe(12);

// Return the 12 votes !
$myElection1->getVotesList('strangeVote');

// Or without this tags and get the first of them
$voteWithoutTag = $myElection1->addVote('Caplet = Ligeti');
$votesListWithoutStrangeTag = $myElection1->getVotesList('strangeVote', false);
$oneVoteToDelete = reset($votesListWithoutStrangeTag);

expect($voteWithoutTag === $oneVoteToDelete)->toBe(true);


// Vote objet
$oneVote = $myElection1->getVotesList('strangeVote')[0]; // Return the current ranking
$oneVote->getRanking(); // Return the current ranking
$oneVote->getContextualRanking($myElection1); // Return the full ranking in the context of election 1 (with 6 candidates)

// Change the vote
$oneVote->setRanking([
                $myLutoCandidate,
                $myDebussyCandidate,
                $myElection1->getCandidateObjectFromName('Caplet'),
                $myElection1->getCandidateObjectFromName('Ligeti')]
                );
                // Note that when a Vote object is linked to one or more elections, you can can only change his ranking by passing Candidate object.

// Check the vote history
$oneVote->rankingHistory; // Return the full history of this vote ranking

// Delete Votes

// Delete a specific vote object
$myElection1->removeVote($oneVoteToDelete);

// Delete all vote with tag "strangeVote" or "frenchies"
$myElection1->removeVotesByTags( ['strangeVote','frenchies'] );

// Delete all vote without tag 'Wagnerian'
# $myElection1->removeVotesByTags( ['strangeVote','frenchies'], false ); // Here, if uncomment, all the vote will be deleted.
