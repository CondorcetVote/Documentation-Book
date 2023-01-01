# Manage Votes

## Verify the registered votes list
```php
Election::getVotesList ( [mixed $tag = null, bool $with = true] ) : array
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--getVotesList.md)

```php
$election->getVotesList (); // Will return an array where key is the internal numeric vote_id and value an other array like your input.
$election->getVotesList ('Charlie'); // Will return an array with each vote with this tag.
$election->getVotesList ('Charlie', false); // Will return an array where each vote without this tag.
$election->getVotesList ('Charlie,Julien'); // With this tag OR this tag
$election->getVotesList (array('Julien', 'Charlie'), true); // Or do it like this
$election->getVotesList (array('Julien', 'Charlie'), false); // Without this tag AND without this tag ...
```

__Note: Make a test, and look at the return format. For each vote, you can get as a tag a unique ID and registered timestamp.__


## Count registered votes

```php
Election::countVotes ( [mixed $tag = null, bool $with = true] ) : int
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--countVotes.md)
```php
$election->countVotes (); // Return a numeric value about the number of registered votes.
$election->countVotes ('Julien,Charlie'); // Count vote with this tag OR this tag.
$election->countVotes (['Julien','Charlie'], false); // Count vote without this tag AND without this tag.
```


## Remove vote
```php
Election->removeVote ( CondorcetPHP\Condorcet\Vote vote ): bool
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--removeVote.md)

```php
$election->removeVote($myVoteObject) ; // Remove a specific registered Vote.
```



```php
Election::removeVotesByTags( mixed $tag [, bool $with = true] ): array
```
[>>>>>>> Method Reference](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Election%20Class/public%20Election--removeVotesByTags.md)

```php
$election->removeVotesByTags('Charlie') ; // Remove vote(s) with tag Charlie
$election->removeVotesByTags('Charlie', false) ; // Remove votes without tag Charlie
$election->removeVotesByTags('Charlie, Julien', false) ; // Remove votes without tag Charlie AND without tag Julien.
$election->removeVotesByTags( ['Julien','Charlie'] ) ; // Remove votes with tag Charlie OR with tag Julien.
```

_Note: You can remove a vote after the results have already been given._