# Managing Votes

## Verify the registered votes list
```php
Election::getVotesList ( [mixed $tag = null, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)   

```php
$election->getVotesList (); // Will return an array where key is the internal numeric vote_id and value an other array like your input.   
$election->getVotesList ('Charlie'); // Will return an array with each vote with this tag.   
$election->getVotesList ('Charlie', false); // Will return an array where each vote without this tag.   
$election->getVotesList ('Charlie,Julien'); // With this tag OR this tag   
$election->getVotesList (array('Julien', 'Charlie'), true); // Or do it like this   
$election->getVotesList (array('Julien', 'Charlie'), false); // Without this tag AND without this tag ...   
```

__Note: Make a test, and look the return format. For each vote, you can get as a tag an unique ID and registered timestamp.__


## Count registered votes

```php
Election::countVotes ( [mixed $tag = null, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)    

```php
$election->countVotes (); // Return a numeric value about the number of registered votes.  
$election->countVotes ('Julien,Charlie'); // Count vote with this tag OR this tag.   
$election->countVotes (array('Julien','Charlie'), false); // Count vote without this tag AND without this tag.   
```


## Remove vote
```php
Election::removeVote( mixed $tag [, bool $with = true] )
```
**tag:** List of tags   
**with:** With or without one a this tag(s)    

```php
$election->removeVote('Charlie') ; // Remove vote(s) with tag Charlie
$election->removeVote('Charlie', false) ; // Remove votes without tag Charlie
$election->removeVote('Charlie, Julien', false) ; // Remove votes without tag Charlie AND without tag Julien.
$election->removeVote(array('Julien','Charlie')) ; // Remove votes with tag Charlie OR with tag Julien.
$election->removeVote($myVoteObject) ; // Remove a specific registered Vote.
```

_Note: You can remove a vote after the results have already been given._  