$election->getPairwise();
$election->getLastTimer(); // Return the pairwise computation time ONLY if call before getResult(), getWinner(), getLoser(). Besause, cache system skip operation next time exept if there are new votes.

$election->getResult('RankedPairs');
$election->getLastTimer(); // Return 0.00112 (string)
$election->getResult('RankedPairs');
$election->getLastTimer(); // Return 0.00003 . See the cache system working!
$election->getResult('KemenyYoung');
$election->getLastTimer(true); // Return 0.14926002 (float) . KemenyYoung can be really slow....
$election->getResult('Copeland');
$election->getLastTimer(true); // Return 0.00010030 (float) . But Copeland is really fast!
