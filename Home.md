> **[Presentation](https://github.com/julien-boudry/Condorcet/blob/master/README.md) | Manual | [Methods References](https://github.com/julien-boudry/Condorcet/blob/master/Documentation/README.md) | [Tests](https://github.com/julien-boudry/Condorcet/tree/master/Tests)**  

# Manual - Condorcet PHP

<p align="center">
  <img src="https://raw.githubusercontent.com/julien-boudry/Condorcet/master/condorcet-logo.png" alt="Condorcet Class" width="25%">
</p>   

## Condorcet Manual

This wiki contains examples and tutorials for common use of the possibility of Condorcet PHP.   

This wiki is deemed to be current on the most recent version of the library. However, most of information may be valid for lower versions.  


### Manual Summary

* Condorcet as a PHP library
  * I. - Installation - Basic Configuration
    * [[1. Installation|I-#-Installation---Basic-Configuration-#-1.-Installation-(library)]]
    * [[2. Voting Methods|I-#-Installation---Basic-Configuration-#-2.-Voting-Methods-(library)]]
      * [[List of Voting Methods|https://github.com/julien-boudry/Condorcet/blob/master/VOTING_METHODS.md]]
    * [[3. Configuration|I-#-Installation---Basic-Configuration-#-3.-Configuration-(library)]]
    * [[4. Condorcet Exception Code|I-#-Installation---Basic-Configuration-#-4.-Condorcet-Exception-Code-(library)]]
  * II. Use it !
    * A. Create an Election
      * [[1. Start|II-#-A.-Create-an-Election-#-1.-Start-(library)]] 
      * [[2. Create Candidates|II-#-A.-Create-an-Election-#-2.-Create-Candidates-(library)]]
    * B. Vote Management
      * [[1. Add Vote|II-#-B.-Vote-management-#-1.-Add-Vote-(library)]]
      * [[2. Manage Vote|II-#-B.-Vote-management-#-2.-Manage-Vote-(library)]]
    * C. Result
      * [[1. Natural Condorcet Winner - Loser|II-#-C.-Result-#-1.-Natural-Condorcet-(library)]]
      * [[2. Simple Ranking from Condorcet Method(s)|II-#-C.-Result-#-2.-Get-Ranking-from-Condorcet-advanced-Methods-(library)]]
      * [[3. Ranking mode - Implicit versus Partial|II-#-C.-Result-#-3.-Ranking-mode---Implicit-versus-Partial-(library)]]
      * [[4. Vote weight|II-#-C.-Result-#-4.-Vote-weight-(library)]]
      * [[5. Vote Constraints|II-#-C.-Result-#-5.-Vote-Constraints-(library)]]
      * [[6. Advanced Results Management|II-#-C.-Result-#-6.-Advanced-Results-Management-(library)]]
  * III. Advanced Use
    * A. Advanced Features
      * [[1. Timer Benchmarking|III-#-A.-Avanced-features---Configuration-#-1.-Timer-Benchmarking-(library)]]
      * [[2. Cryptographic Checksum|III-#-A.-Avanced-features---Configuration-#-2.-Cryptographic-Checksum-(library)]]
      * [[3. Get started to handle millions of votes |III-#-A.-Avanced-features---Configuration-#-3.-Get-started-to-handle-millions-of-votes-(library)]]
    * B. Extending Condorcet
      * [[1. Add your own ranking algorithm|III-#-B.-Extending-Condorcet-#-1.-Add-your-own-ranking-algorithm-(library)]]
      * [[2. Candidate - Vote Class|III-#-B.-Extending-Condorcet-#-2.-Candidate---Vote-Class-(library)]]
* Condorcet as a Command Line Application
  * [[I. - Installation|I-#-Installation-(command-line)]]
  * [[II. - Man page|II-#-Man-Page-(command-line)]]
  * [[III. - Usage|III-#-Usage-(command-line)]]

## [Methods References](https://github.com/julien-boudry/Condorcet/tree/master/Documentation/README.md)

## [[.CVOTES - Condorcet Format Specifications|Condorcet-Format]]

## [Examples of implementation](https://github.com/julien-boudry/Condorcet/wiki#examples)

## Examples

### Officials examples

* [Quick tour](https://github.com/julien-boudry/Condorcet#really-quick-and-simple-example)  
* [Great tour - Part I](https://github.com/julien-boudry/Condorcet/blob/master/Examples/1.%20Overview.php)
* [Great tour - Part II (Crazy objects management)](https://github.com/julien-boudry/Condorcet/blob/master/Examples/2.%20AdvancedObjectManagement.php)
* [Basic and intermediate demonstration with html](https://github.com/julien-boudry/Condorcet/tree/master/Examples/Examples-with-html)

* [Setup Condorcet to manage up to hundred millions votes](https://github.com/julien-boudry/Condorcet/blob/master/Examples/Specifics_Examples/use_large_election_external_database_drivers.php)


### Condorcet PHP Implementation

_This example of implementation in others project can very nice or strange... They can be current, or otherwise affect older versions of Condorcet._   

* [www.Condorcet.Vote](https://www.Condorcet.Vote) Online free election.    
  * [And it source Code](https://github.com/julien-boudry/Condorcet.Vote)
* [Gustav Mahler fans, making comparative blind test](https://github.com/julien-boudry/Mahler-S2-BlindTest-Condorcet) _(very old Condorcet v0.13)


### Tests

* [Read the tests](https://github.com/julien-boudry/Condorcet/tree/master/Tests)