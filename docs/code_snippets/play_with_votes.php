<?php
use CondorcetPHP\Condorcet\Vote;

$VoteModel = [
    $myDebussyCandidate,
    'Caplet',
    ['Olivier Messiaen', 'Ligeti'],
    'Koechlin'
]; // Messiaen & Ligeti are at equallity. $myLutoCandidate is not here, but it will be automatically detect in $myElection1 objet a add at the last rank.

for ($i = 0 ; $i < 95 ; $i++) {
    shuffle($VoteModel);
    $myElection1->addVote( $VoteModel );
}

// How Many Vote could I Have now ?
$myElection1->countVotes(); // Return 95 (int)

// More fun way to add Vote from full string input !
$myVote96 = $myElection1->addVote('Debussy > Olivier Messiaen = Ligeti > Wiltod Lutoslawski');

//Add some tags
$myVote97 = $myElection1->addVote(  [$myDebussyCandidate, 'Koechlin'],
                                    ['greatFrenchVote','strangeVote'] // You can also pu your tags for this vote
);

// Parse multiple Votes
$myElection1->parseVotes("
    tag1,frenchies,tag3 || Olivier Messiaen > Debussy = Caplet > Ligeti # Tags at first, vote at second, separated by '||'
    Ligeti > Caplet # Line break to start a new vote. Tags are optionals.
    strangeVote,tag3 || Debussy=Koechlin= Ligeti = Wiltod Lutoslawski = Olivier Messiaen>Caplet * 11 # This vote and his tag will be register 11 times
");

// Creating self Vote object
$myVote111 = new Vote ( [$myDebussyCandidate, $myLutoCandidate, 'Caplet'], 'customeVoteTag,AnAnotherTag' );
$myVote112 = new Vote ( 'Olivier Messiaen = Caplet > Wiltod Lutoslawski', ['customVoteTag','AnAnotherTag'] );

$myElection1->addVote($myVote111);
$myElection1->addVote($myVote112);
