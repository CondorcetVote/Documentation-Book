## Import from Election files formats (command line)

_From [Condorcet Election Format](https://github.com/CondorcetPHP/CondorcetElectionFormat), from [Debian Tally Format](https://www.debian.org/vote/2021/vote_001_tally.txt), from [David Hill Format](https://rangevoting.org/TidemanData.html).

### From Conforcet Election Format
Specifications:** https://github.com/CondorcetPHP/CondorcetElectionFormat

The number of seats, vote weight, and implicit rules will be set up by the file unless you overload this with the corresponding arguments, which will then take priority. Candidates must be specified in the file, otherwise, an error will occur.
```shell
condorcet election --import-condorcet-election-format=/path/to/file -lr Schulze Borda Minimax
```

### From Debian Tally Format
Specifications:** https://www.debian.org/vote/2021/vote_001_tally.txt

The number of seats will be set to ```1``` unless you overload this with the corresponding arguments, which will then take priority. Other parameters are as default. Candidates must be specified in the file, otherwise, an error will occur.
```shell
condorcet election --import-debian-format=/path/to/file -lr Schulze Borda Minimax
```

### From Debian Tally Format
Specifications:** https://rangevoting.org/TidemanData.html

The number of seats will be set up by the file unless you overload this with the corresponding arguments, which will then take priority. Other parameters are as default. Candidates must be specified in the file, otherwise, an error will occur.
```shell
condorcet election --import-david-hill-format=/path/to/file -lr Schulze Borda Minimax
```