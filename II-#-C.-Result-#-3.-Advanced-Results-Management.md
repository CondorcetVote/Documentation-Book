# Advanced Results

## Get compute details
```php
$election->getPairwise() ; // Return an explicit array using your Candidate Name as keys.  

$election->getResultStats() ; // Get stats about computing result for the default object method. (Class Default: Schulze)  
$election->getResultStats('Schulze') ; // Same thing with a specific method.  
```


## Specials options on getResult()

### Kemeny-Young
Currently Kemeny-Young is potentially subject to conflict leading to a relatively arbitrary final choice. Very likely thing in the case of a very small number of voters. The current implementation does not include any trick to the resolver.   

The next option allows you to get rather than ranking, information on the existence or the absence of these conflicts. The following example mounts how to you use it.   

```php
$test = $election->getResult( 'KemenyYoung', array('algoOptions' => ['noConflict' => true]) ) ;

if ( !empty($result->getWarning(\Condorcet\Algo\Methods\KemenyYoung::CONFLICT_WARNING_CODE)) )
{
    $kemeny_conflicts = explode( ';', $result->getWarning(\Condorcet\Algo\Methods\KemenyYoung::CONFLICT_WARNING_CODE)[0]['msg'] ) ;

    echo '<strong style="color:red;">Arbitrary results: Kemeny-Young has '.$kemeny_conflicts[0].' possible solutions at score '.$kemeny_conflicts[1].'</strong>' ;
}
else
{
	// $test is your habitual result ;
}
```   


