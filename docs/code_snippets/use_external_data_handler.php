<?php use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface;
use Tests\MyNamespace\NewHandlerDriver;

$driver = new NewHandlerDriver(); // Must be ready to use (connection, access etc..)
expect($driver::class)->toImplement(DataHandlerDriverInterface::class);

$election->setExternalDataHandler($driver);
