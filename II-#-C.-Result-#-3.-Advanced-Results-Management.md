# Advanced Results

## Get metadata

```php
$election->getResult('Schulze')->getClassGenerator() ; // Return namespace of the Schulze module. Like '/Condorcet/Algo/Methods/SchulzeWinning'
$election->getResult('Schulze')->getMethod() ; // Return method who build this result. Like 'Schulze'.

$election->getResult('Schulze')->getCondorcetElectionGeneratorVersion() ; // Return Condorcet version at the build time.

$election->getResult('Schulze')->getBuildTimeStamp() ; // Return timestamp (float) of the build time.

$election->getResult('Schulze')->getOriginalArrayWithString() ; // Return the result as array with Candidate as string by name. because Candidate name can continue to change (Even if you can get the history of the changes.). This method give you serenity.
```

## Get compute details
```php
$election->getPairwise() ; // Return an explicit array using your Candidate Name as keys.  

$election->getResult('Schulze')->getStats() ; // Get stats about computing result for the default object method. Output vary between the methods. Should be an array.
```

## Get result infos
```php
$election->getResult('Schulze')->getWinner(); // Equivalent to $election->getWinner('Schulze');
$election->getResult('Schulze')->getLoser(); // Equivalent to $election->getLoser('Schulze');

$election->getResult('Schulze')->getCondorcetWinner() ; // Get the condorcet winner from the parent election at the build time (can became different. This one never change) or null if he don't exist.
$election->getResult('Schulze')->getCondorcetLoser() ; // Get the condorcet loser from the parent election at the build time (can became different. This one never change) or null if he don't exist.

$election->getResult('Schulze')->getResultAsArray() ; // Return Result ranking as array. So, the original Result object is iterable, support array access and count... Why doing that ?
$election->getResult('Schulze')->getResultAsArray(true) ; // Same thing. But more : that convert Candidate object into string by name.
```

## Specials options on getResult()

### Kemeny-Young
Currently Kemeny-Young is potentially subject to conflict leading to a relatively arbitrary final choice. Very likely thing in the case of a very small number of voters. The current implementation does not include any trick to the resolver.   

The next option allows you to get rather than ranking, information on the existence or the absence of these conflicts. The following example mounts how to you use it.   

```php
$result = $election->getResult( 'KemenyYoung' ) ;

if ( !empty($result->getWarning(\Condorcet\Algo\Methods\KemenyYoung::CONFLICT_WARNING_CODE)) )
{
    $kemeny_conflicts = explode( ';', $result->getWarning(\Condorcet\Algo\Methods\KemenyYoung::CONFLICT_WARNING_CODE)[0]['msg'] ) ;

    echo '<strong style="color:red;">
        Arbitrary results: Kemeny-Young has '.$kemeny_conflicts[0].
        ' possible solutions at score '.$kemeny_conflicts[1]
    .'</strong>' ;
}
else
{
	// $result is your habitual result ;
}
```   


