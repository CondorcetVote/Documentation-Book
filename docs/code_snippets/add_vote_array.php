$vote[1] = 'Wagner';
$vote[2] = 'Debussy';
$vote[3] = $myPucciniCandidateObject; // can be a string or a candidate object
$vote[4] = 'Varese'; // The last rank is optional
$election->addVote($vote);

// Use commas or an array in the case of a tie:
$vote[1] = 'Debussy,Wagner';
$vote[2] = [$myPucciniCandidateObject, 'Varese'];
$election->addVote($vote);
