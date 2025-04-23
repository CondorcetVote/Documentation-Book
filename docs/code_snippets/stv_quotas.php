use CondorcetPHP\Condorcet\Algo\Tools\StvQuotas;

StvQuotas::fromString('imperiali'); // Return StvQuotas::IMPERIALI.

// Statically compute a quotas.
StvQuotas::HARE->getQuota(votesWeight: 40, seats: 10); // Return 4.0 because the Hare formula is: $votes / $seats
