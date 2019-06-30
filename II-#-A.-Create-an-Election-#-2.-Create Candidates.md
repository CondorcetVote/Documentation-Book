# 1: Manage Candidates

## Registering

### Regular

```php
Election::addCandidate ( [mixed $name = automatic] ) 
```
**name:** Alphanumeric string or Condorcet\Candidate objet. Your candidate name will be trim()    

**Return value:** The new candidate object. Throw an exception on error (existing candidate...)    

Enter (or not) a Candidate Name 

```php
use Condorcet\Candidate;

$election->addCandidate('Wagner') ; // mb_strlen(Candidate Name) <= Election::MAX_LENGTH_CANDIDATE_ID, Default: 30

$myAutoCandidate = $election->addCandidate() ; // Empty argument will return an candidate object with an automatic name for you (From A to ZZZZZ)  

$election->addCandidate(2) ; // If you use integer, he will be converted to string (= '2')

$election->addCandidate(new Candidate ('Edgard Varèse')) ;
```
### Add multiple candidates from string or text file

#### Syntax
```
Candidate1
Candidate2 # You can add optionnal comments
Candidate3 ; Candidate4 # Or in the same line separated by ; with or without space (will be trim)
Candidate5
``` 

#### Method
```php
$election->parseCandidates('data/candidates.txt'); // Path to text file. Absolute or relative.
$election->parseCandidates($my_big_string); // Just my big string.
```

### Add multiple candidates from Json

#### Syntax
```php
json_encode( array(
	'CandidateName1',
	'CandidateName2'
) );
``` 

#### Method
```php
$election->jsonCandidates($my_json_string);
```

## Removing
```php
Election::removeCandidate ( mixed $name )
```
**name:** Alphanumeric string or Condorcet\Candidate object.   

**Return value:** True on success. Throw an exception if candidate name can't be found or if the vote has began.


```php
$election->removeCandidate('Wagner') ;
$election->removeCandidate($myCandidateObject); // Not destroying your Candidate object. But just unlink it from this Election.
```


## Verify the Candidates list
```php
Election::getCandidatesList ( bool $string_mode = false )
```
**string_mode:** If false, Candidate object are returned. Else Candidate as string name.

**Return value:** Array list of registered Candidates.


```php
$election->getCandidatesList(); // Will return an array with all Candidate object.
$election->getCandidatesList(true); // Will return an array with all candidate name as string.
```

_Note: When you start voting, you will never be able to edit the candidates list._  