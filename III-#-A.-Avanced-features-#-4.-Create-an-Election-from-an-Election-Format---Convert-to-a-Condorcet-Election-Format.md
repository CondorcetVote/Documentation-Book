## Import from Election files formats

From [Condorcet Election Format](https://github.com/CondorcetPHP/CondorcetElectionFormat), from [Debian Tally Format](https://www.debian.org/vote/2021/vote_001_tally.txt), from [David Hill Format](https://rangevoting.org/TidemanData.html).


### From Condorcet Election Format
**Specifications:** https://github.com/CondorcetPHP/CondorcetElectionFormat

```$file``` can be a string file path, or a ```\SplFileInfo``` (or ```\SplFileObject```, ```\SplTempFileObject```

```php
$condorcetFormat = new CondorcetElectionFormat($file); # CondorcetPHP\Condorcet\Tools\Converters\CondorcetElectionFormat
$election = $condorcetFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
```

### From Debian Format
**Specifications:** https://www.debian.org/vote/2021/vote_001_tally.txt

```php
$debianFormat = new DebianFormat(__DIR__.'/DebianData/leader2020_tally.txt') # CondorcetPHP\Condorcet\Tools\Converters\DebianFormat
$election = $debianFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
```

_To set up parameters before set Data (but can be done after):_
```php
$election = new Election;
$election->setImplicitRanking(false);
$election->setNumberOfSeats(42);

$debianFormat = new DebianFormat(__DIR__.'/DebianData/leader2020_tally.txt') # CondorcetPHP\Condorcet\Tools\Converters\DebianFormat
$election = $debianFormat->setDataToAnElection($election); # CondorcetPHP\Condorcet\Election
```

### From David Hill Format
**Specifications:** https://rangevoting.org/TidemanData.html

```php
$davidFormat = new DavidHillFormat(__DIR__.'/TidemanData/A77.HIL') # CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat
$election = $davidFormat->setDataToAnElection(); # CondorcetPHP\Condorcet\Election
```

_To set up parameters before set Data (but can be done after):_
```php
$election = new Election;
$election->setImplicitRanking(false);

$davidFormat = new DavidHillFormat(__DIR__.'/DebianData/leader2020_tally.txt') # CondorcetPHP\Condorcet\Tools\Converters\DavidHillFormat
$election = $davidFormat->setDataToAnElection($election); # CondorcetPHP\Condorcet\Election
```

## Convert an election (or another format) to Condorcet Election Format  

**Specifications:** https://github.com/CondorcetPHP/CondorcetElectionFormat  
=> [**Full method documentation**](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/Tools_Converters_CondorcetElectionFormat%20Class/public%20static%20Tools_Converters_CondorcetElectionFormat--exportElectionToCondorcetElectionFormat.md)

```php
use CondorcetPHP\Condorcet\Election;
use CondorcetPHP\Condorcet\Tools\Converters\DebianFormat;
use CondorcetPHP\Condorcet\Tools\Converters\CondorcetElectionFormat;

// An election object
$election = new Election;

// Set or data as usual, or import it from a format like this
(new DebianFormat(__DIR__.'/DebianData/leader2020_tally.txt'))->setDataToAnElection($election); # The election get the data from debian format)

CondorcetElectionFormat::exportElectionToCondorcetElectionFormat($election) # Return string.

# Write to a file
$myFile = new \SplFileObject($pathToFile);
CondorcetElectionFormat::exportElectionToCondorcetElectionFormat(election:$election, file: $myFile) # Return null