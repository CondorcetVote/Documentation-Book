use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\DataHandlerDriverInterface;
use Tests\MyNamespace\NewHandlerDriver;

$driver = new NewHandlerDriver(); // Must be ready to use (connection, access etc..)
assert($driver instanceof DataHandlerDriverInterface); // true

$election->setExternalDataHandler($driver);
