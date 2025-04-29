use CondorcetPHP\Condorcet\Algo\Tools\StvQuotas;

expect(StvQuotas::fromString('imperiali'))->toBe(StvQuotas::IMPERIALI);

// Statically compute a quotas.
expect(StvQuotas::HARE->getQuota(votesWeight: 40, seats: 10))->toBe(4.0); // Because the Hare formula is: $votes / $seats
