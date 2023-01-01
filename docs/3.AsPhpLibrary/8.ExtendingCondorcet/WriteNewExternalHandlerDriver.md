# Write New External Handler Driver

****Implement Interface [Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/DataHandlerDriverInterface.php)**

And read the relatively simple example : [Condorcet\DataManager\DataHandlerDrivers\PdoHandlerDriver](https://github.com/julien-boudry/Condorcet/blob/master/lib/DataManager/DataHandlerDrivers/PdoDriver/PdoHandlerDriver.php)

```php
    $driver = new yourDriverClass (); // Must be ready to use (connection, access etc..)

    $myElection->setExternalDataHandler($driver);
```