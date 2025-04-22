<?php
use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Candidate;

// Create Election
$myElection1 = new Election ();
$myElection2 = new Election ();

// Manage Candidate

// Add candidates
// A string
$myElection1->addCandidate('A');

// An objet
$myElection1->addCandidate( new Candidate ('Koechlin') );
$myElection1->addCandidate( new Candidate ('Caplet') );
$myElection1->addCandidate( new Candidate ('Debussy') );
$myElection1->addCandidate( new Candidate ('Olivier Messiaen') );
$myElection1->addCandidate( new Candidate ('Ligeti') );

// Automatic name
$myAutomaticCandidate = $myElection1->addCandidate();
$myAutomaticCandidate->name; // 'C'

// Follow this one
$myLutoCandidate = new Candidate('Lutoslawski');
$myElection1->addCandidate($myLutoCandidate);

// Change your mind?
$myElection1->removeCandidates('A');
$myElection1->removeCandidates($myAutomaticCandidate);

// Lutoslawski change his name
$myLutoCandidate->setName('Wiltod Lutoslawski'); # Done !

// What was his old names?
$myLutoCandidate->nameHistory; // return the full history with timestamp of this Candidate naming

// Check your candidate list, if you forget it
$myElection1->getCandidatesList(); // Return an array pupulate by each Candidate objet
$myElection1->getCandidatesList(true); // Return an array pupulate by each Candidate name as String.

// OK, I need my Debussy (want his candidate object)
$myDebussyCandidate = $myElection1->getCandidateObjectFromName('Debussy');
