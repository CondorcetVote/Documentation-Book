# Create an Election

## Make a new Election
```php
// Classic way :
$myElection = new Condorcet\Condorcet ();
```

## Election Cycle

**1. Add candidate**    
_-- When you add your first vote, you will never can change candidate list without starting a new election --_   
**2. Add vote** _Note than a same vote object can take part in multiple elections simultaneously._    
**3. Get result from one ore multiple methods. If you don't change the vote list, you can enjoy the cache engine. Else cache it's clear.   
4. You can serialize your election and enjoy continue enjoying the cache engine after unserialize them.   