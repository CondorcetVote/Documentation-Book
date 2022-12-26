# Cryptographic checksum
```php
public Election->getChecksum (): string
```
**Return value:** SHA-2 256 checksum of following internal data:
* Candidates
* Votes list & tags
* Computed data (pairwise, algorithm cache, stats)
* Class version (major version like 0.14)

Powerfull method to check the integrity after a wakeup action or detect some changes (new votes, new computing data...). Or also the need to rebuild object from scratch after a major update of Condorcet Class (working also with exception code 11 on wake up).    