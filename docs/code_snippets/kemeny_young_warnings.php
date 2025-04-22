use \CondorcetPHP\Condorcet\Algo\Methods\KemenyYoung\KemenyYoung;

$result = $election->getResult('KemenyYoung');

if (!empty($result->getWarning(KemenyYoung::CONFLICT_WARNING_CODE))) {
    $kemeny_conflicts = explode(';', $result->getWarning(KemenyYoung::CONFLICT_WARNING_CODE)[0]['msg']);
    echo 'Arbitrary results, Kemeny-Young has ' . $kemeny_conflicts[0] . ' possible solutions at score ' . $kemeny_conflicts[1];
} else {
    // $result is your usual result
}
