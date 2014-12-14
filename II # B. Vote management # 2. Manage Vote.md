# Managing Votes

## Verify the registered votes list
```php
getVotesList ( [mixed $tag = null, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)   

```php
$condorcet->getVotesList (); // Will return an array where key is the internal numeric vote_id and value an other array like your input.   
$condorcet->getVotesList ('Charlie'); // Will return an array with each vote with this tag.   
$condorcet->getVotesList ('Charlie', false); // Will return an array where each vote without this tag.   
$condorcet->getVotesList ('Charlie,Julien'); // With this tag OR this tag   
$condorcet->getVotesList (array('Julien', 'Charlie'), true); // Or do it like this   
$condorcet->getVotesList (array('Julien', 'Charlie'), false); // Without this tag AND without this tag ...   
```

__Note: Make a test, and look the return format. For each vote, you can get as a tag an unique ID and registered timestamp.__


## Count registered votes

```php
countVotes ( [mixed $tag = null, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)    

```php
$condorcet->countVotes (); // Return a numeric value about the number of registered votes.  
$condorcet->countVotes ('Julien,Charlie'); // Count vote with this tag OR this tag.   
$condorcet->countVotes (array('Julien','Charlie'), false); // Count vote without this tag AND without this tag.   
```


## Remove vote
```php
removeVote( mixed $tag [, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)    

```php
$condorcet->removeVote('Charlie') ; // Remove vote(s) with tag Charlie
$condorcet->removeVote('Charlie', false) ; // Remove votes without tag Charlie
$condorcet->removeVote('Charlie, Julien', false) ; // Remove votes without tag Charlie AND without tag Julien.
$condorcet->removeVote(array('Julien','Charlie')) ; // Remove votes with tag Charlie OR with tag Julien.
```

_Note: You can remove a vote after the results have already been given._  