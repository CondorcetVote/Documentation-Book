$originalChecksum = $election->getChecksum();
$toStore = serialize($election);
unset($election);
$newElection = unserialize($toStore);

$newElection->getChecksum() === $myChecksum; // True
