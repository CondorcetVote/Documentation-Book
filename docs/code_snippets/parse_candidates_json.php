$json = json_encode([
    'CandidateName1',
    'CandidateName2'
]);

$election->addCandidatesFromJson($json);