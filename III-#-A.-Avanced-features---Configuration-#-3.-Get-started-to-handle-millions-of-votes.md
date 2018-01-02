# Get started to handle millions of votes

Condorcet is now designed to manage billion of votes.

By default, vote are stored into a PHP array, which limits the feasibility of such practices, because of limitation of RAM or even performance (PHP array are not designed to do that).
So, Condorcet allow you to use an external driver to store vote between processing (register vote, compute result...).

Benchmark shows that on PHP 7 + SQLite, 200 000 votes can be registered and computed in less than 60 seconds on a little server, with ~60mb RAM use. However, the speed of the driver does not change much the performance. From a certain point: slowdowns are intrinsically linked to internal processing side Condorcet engine (integrity check, abstraction...). Major optimizations for speed could be done, but this would require a trade-off between speed and code complexity. We believe that current performance is acceptable.

In specific situations and mastered, disable certain controls could vastly performance. If you needed, you can consider to fork Condorcet, and ask some support to do that well.

Condorcet provide a driver for PDO, that allow you to use most current Relationnal datbase. You can extend it to get more optimization. Ou work on your own driver to use - for example - noSQL database.

_Note :_ Please consider this functionality as a Beta stage. Some specific uses are not tested or supported (serialize election use this driver, have votes object into multiples elections at the same time...).


## Handle millions of votes with default PDO driver

Have a look on [this example](https://github.com/julien-boudry/Condorcet/blob/master/Examples/Specifics_Examples/use_large_election_external_database_drivers.php) !

## Create your own driver

### Must implement Interface [Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/DataHandlerDriverInterface.php)

And read the relatively simple example : [Condorcet\DataManager\DataHandlerDrivers\PdoHandlerDriver](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/PdoHandlerDriver.php)

```php
    $driver = new yourDriverClass (); // Must be ready to use (connection, access etc..)

    $myElection->setExternalDataHandler($driver);
```

