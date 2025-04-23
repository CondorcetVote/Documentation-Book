<?php

use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface;
use DriverNamespace\NewHandlerDriver;

$driver = new NewHandlerDriver(); // Must be ready to use (connection, access etc..)
assert($driver instanceof DataHandlerDriverInterface, 'Driver must implement ExternalDataHandlerInterface');

$election->setExternalDataHandler($driver);
