$election->setMethodOption('Borda Count', 'Starting', 0);

// The result object keeps metadata about options passed in a readonly property
$election->getResult('Borda Count')->methodOptions; // ['Starting' => 0]
