<?php declare(strict_types=1);

namespace Tests\MyNamespace;

use CondorcetPHP\Condorcet\DataManager\DataHandlerDrivers\PdoDriver\PdoHandlerDriver;

class NewHandlerDriver extends PdoHandlerDriver {
    public function __construct() {
        $sqlitePath = 'bdd.sqlite';

        if (file_exists($sqlitePath)) {
            unlink($sqlitePath);
        }

        parent::__construct(new \PDO('sqlite:'.$sqlitePath), true);
    }
}