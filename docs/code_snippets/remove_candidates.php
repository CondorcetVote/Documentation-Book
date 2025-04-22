$election->removeCandidate('Wagner');
$election->removeCandidate($myCandidateObject); // Does not destroy your Candidate object if it exists outside of the election object scope. It just unlinks it from this Election.
