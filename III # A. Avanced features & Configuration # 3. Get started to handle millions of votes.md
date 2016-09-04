# Get started to handle millions of votes

Condorcet is now designed to manage billion of votes.

By default, vote are stored into a PHP array, which limits the feasibility of such practices, because of limitation of RAM or even performance (PHP array are not designed to do that).
So, Condorcet allow you to use an external driver to store vote between processing (register vote, compute result...).

Benchmark shows that on PHP 7 + SQLite, 200 000 votes can be registered and computed in less than 60 seconds on a little server, with ~60mb RAM use. However, the speed of the driver does not change much the performance. From a certain point: slowdowns are intrinsically linked to internal processing side Condorcet engine (integrity check, abstraction...). Major optimizations for speed could be done, but this would require a trade-off between speed and code complexity. We believe that current performance is acceptable.

In specific situations and mastered, disable certain controls could vastly performance. If you needed, you can consider to fork Condorcet, and ask some support to do that well.

Condorcet provide a driver for PDO, that allow you to use most current Relationnal datbase. You can extend it to get more optimization. Ou work on your own driver to use - for example - noSQL database.

_Note :_ Please consider this functionality as a Beta stage. Some specific uses are not tested or supported (serialize election use this driver, have votes object into multiples elections is the same time...).


## Handle millions of votes with default PDO driver

Have a look on the [example below](https://github.com/julien-boudry/Condorcet/blob/master/examples/specifics_examples/use_large_election_external_database_drivers.php) !

```php
<?php


// I - Install
    use Condorcet\Condorcet;
    use Condorcet\Election;
    use Condorcet\Candidate;
    use Condorcet\Vote;
    use Condorcet\DataManager\DataHandlerDrivers\PdoHandlerDriver;

    require_once '../../__CondorcetAutoload.php';

    $start_time = microtime(TRUE);


 // II - Create Election

    $myElection = new Election ();

    $myElection->addCandidate( new Candidate ('A') );
    $myElection->addCandidate( new Candidate ('B') );
    $myElection->addCandidate( new Candidate ('C') );
    $myElection->addCandidate( new Candidate ('D') );
    $myElection->addCandidate( new Candidate ('E') );
    $myElection->addCandidate( new Candidate ('F') );

 // II - Setup external drivers

    /* We will use PDO SQLITE, but can be MySQL or else */

    unlink(__DIR__.'/bdd.sqlite');

    $pdo_object = new \PDO ('sqlite:'.__DIR__.'/bdd.sqlite');

    $database_map = ['tableName' => 'Entitys', 'primaryColumnName' => 'id', 'dataColumnName' => 'data'];

    $driver = new PdoHandlerDriver ($pdo_object, true, $database_map); // true = Try to create table

    $myElection->setExternalDataHandler($driver);

// III - Add hundred of thousands votes

    set_time_limit ( 60 * 5 );

    $howMany = 100000;

    $voteModel = $myElection->getCandidatesList();

    for ($i = 0 ; $i < $howMany ; $i++) {
        shuffle($voteModel);
        $myElection->addVote( $voteModel );
    }


// IV - Get somes results

    $myElection->getWinner();

    $myElection->getResult('Schulze');


print 'Success!  
Process in: '. (microtime(true) - $start_time) . 's
';

echo ' Peak of memory allocated : '.round(memory_get_peak_usage()/pow(1024,($i=floor(log(memory_get_peak_usage(),1024)))),2).' '.['b','kb','mb','gb','tb','pb'][$i].'<br>';
```


## Create your own driver

### Must implement Interface [Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/DataHandlerDriverInterface.php)

And read the relatively simple example : [Condorcet\DataManager\DataHandlerDrivers\PdoHandlerDriver](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/PdoHandlerDriver.php)

```php

interface DataHandlerDriverInterface
{
    /* public $_dataContextObject; */
    // The Data Manager will set an object into this property. You should call for each Entity $_dataContextObject->dataCallBack($EntityData) before returning stored data by the two select method.


    // Entitys to register. 
        // Ex: [Condorcet/Vote,Condorcet/Vote,Condorcet/Vote]. The key should not be kept
    public function insertEntitys(array $input);

    // Update Entity with this key to this Data.
        // Args example: (42,Condorcet/Vote)
    public function updateOneEntity (int $key,$data);

    // Delete Entity with this key to this Data. If justTry is true, don't throw Exception if row not exist. Else throw one Concordet/CondorcetException(30)
    public function deleteOneEntity (int $key, bool $justTry);

    // Return (int) max register key.
        // SQL example : SELECT max(key) FROM...
    public function selectMaxKey ();

    // Return (int) max register key.
        // SQL example : SELECT min(key) FROM...
    public function selectMinKey ();

    // Return (int) :nomber of recording
        // SQL example : SELECT count(*) FROM...
    public function countEntitys () : int;

    // Return one Entity by key
    public function selectOneEntity (int $key);

    // Return an array of entity where $key is the first Entity and $limit is the maximum number of entity. Must return an array, keys must be preseve into there.
        // Arg example : (42, 3)
        // Return example : [42 => Condorcet/Vote, 43 => Condorcet/Vote, 44 => Condorcet/Vote]
    public function selectRangeEntitys (int $key, int $limit) : array;

    // Delete * Entitys
        // SQL example : DELETE * FROM...
    public function flushAll ();
}
```



```php
    $driver = new yourDriverClass (); // Must be ready to use (connection, access etc..)

    $myElection->setExternalDataHandler($driver);
```

