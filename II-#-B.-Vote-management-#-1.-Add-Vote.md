# 2: Start voting
_Note: All votes are adjusted to estimate all candidates. The pairwise is calculated accordingly._

## Restrict the number of possible votes for one election
_Note: By default, there is no limit_  

```php
Condorcet::setMaxVoteNumber(2042); // All election, new or wake up, will be limit at this maximum vote number.
Condorcet::setMaxVoteNumber(null); // No limit for evrybody. (Default)
```

## Add a vote
_Note: You can add new votes after the results have already been given_  


```php
Election::addVote ( mixed $vote [, mixed $tag = null] )
```
**data:** The vote ranking or vote object   
**tag:** add tag(s) to this vote for further actions



### With an array
```php
$vote[1] = 'Wagner' ;  
$vote[2] = 'Debussy' ;  
$vote[3] = $myRegisteredCandidateObject ;  
$vote[4] = 'Varese' ; // The last rank is optionnal 
$election->addVote($vote) ;  
```

Use commas or an array in the case of a tie:  
```php
$vote[1] = 'Debussy,Wagner' ;  
$vote[2] = [$myRegisteredCandidateObject,'Varese'] ;  
$election->addVote($vote) ; 
```

*The last rank is optionnal, it will be automatically deducted.*  

### With a string
You can do like this:

```php
$vote = 'A>B=C=H>G=T>Q' ;
$election->addVote($vote) ;  

// It's working with some space, if you want to be durty...
$vote = 'A> B = C=H >G=T > Q' ;
$election->addVote($vote) ;  

// But you can not use '<' operator
$vote = 'A<B<C' ; // It's not correct
// Follow can't work too
$vote = 'A>BC>D' ; // It's not correct
```

*The last rank is optionnal too, it will be automatically deducted.* 


### With Vote object
Well, let be a little more powerful:

```php
use CondorcetPHP\Condorcet\Vote;

$vote1 = new Vote ('A>B=C=H>G=T>Q');
$vote2 = new Vote ( array( 1 => 'A',
                           2 => 'C',
                           3 => 'B',
                           4 => ['H','G']
));
$vote3 = new Vote ( array(
1 => $CandidateA // Condorcet\Candidate
2 => $election->getCandidatesList()[array_search('B',$election->getCandidatesList(),false)] // Put the object corresponding to the 'B' candidate from getCandidatesList method. Off course, ou can also just entrer string 'B' and Condorcet will do the job for you.
3 => 'C' // Condorcet will do the job for you.
));

$election->addVote($vote1);  
$election->addVote($vote2);  
$election->addVote($vote3);  
```

### Add a tag
You can add the same or different tag for each vote:  
```php
// Directly with addVote method (will add it to the Vote object)

$election->addVote($vote, 'Charlie') ; // Please note that a single tag is always created for each vote. 
$election->addVote($vote, 'Charlie,Claude') ; // You can also add multiple tags, separated by commas. 

// Or into the vote object
$vote1 = new Vote ([$candidate1,$candidate2]);
$vote2 = new Vote ([$candidate1,$candidate2], 'Charlie');
$vote3 = new Vote ([$candidate1,$candidate2], ['Charlie','Hebdo']);

$election->addVote($vote1); $election->addVote($vote2); $election->addVote($vote3);
$vote1->addTags('Charlie');
```   

## Add multiple votes from string or text file
Once your list of candidates previously recorded. You can parse a text file or as a PHP string character to record a large number of votes at once.   

*You can simultaneously combine this method with traditional PHP calls above.*  

### Syntax
```
tag1,tag2,tag3[...] || A>B=D>C # A comment at the end of the line prefixed by '#'. Never use ';' in comment!
Titan,CoteBoeuf || A>B=D>C # Tags at first, vote at second, separated by '||'
A>C>D>B # Line break to start a new vote. Tags are optionals. View above for vote syntax.
tag1,tag2,tag3 || A>B=D>C * 5 # This vote and his tag will be register 5 times
   tag1  ,  tag2, tag3     ||    A>B=D>C*2        # Working too.
C>D>B*8;A=D>B;Julien,Christelle||A>C>D>B*4;D=B=C>A # Alternatively, you can replace the line break by a semicolon.
``` 

### Method
```php
$election->parseVotes('data/vote42.txt'); // Path to text file. Absolute or relative.
$election->parseVotes($my_big_string); // Just my big string.
```

## Add multiple votes from Json

### Syntax
```php
$json_votes = json_encode( [
	['vote' => 'A>B=D>C', 'tag' => 'ben,jerry'],
	['vote' => ['D', 'B,A', 'C'], 'tag' => ['bela','bartok'], 'multi' => 5],
	['vote' => ['A', ['B','C'], 'D']]
] );
``` 

In the previous example, all parameters are optional exept vote.
* 'multi' is used to record N times the vote.   
* 'tag' is used in the same way as addVote ()  
* 'vote' is used in the same way as addVote ()   

### Method
```php
$election->addVotesFromJson($json_votes);
```

**Anti-flood:**

Be applied and reset each call parseVotes() or addVotesFromJson()   

```php
Election::setMaxParseIteration(500); // Will generate an exception and stop after 500 registered vote by call. Not any vote will be registered.
Election::setMaxParseIteration(null); // No limit (default mode)
```  