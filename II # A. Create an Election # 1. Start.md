# Create an Election

## A classic way for 99% of use
```php
// Classic way :
$myElection = new Condorcet\Condorcet ();
```

## An another way
If you want to change default method for getResult() _(Change the default method. Will not prevent you change your mind later, or manage several methods for the same election. It is a method for comfort.)_

```php
$myElection = new Condorcet\Condorcet ('Copeland');

// Is strictly equivalent to :
  $myElection = new Condorcet\Condorcet ();
  $myElection->setMethod('Copeland');
```
