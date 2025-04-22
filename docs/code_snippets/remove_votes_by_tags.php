$election->removeVotesByTags('Charlie') ; // Remove vote(s) with tag Charlie
$election->removeVotesByTags('Charlie', false) ; // Remove votes without tag Charlie
$election->removeVotesByTags('Charlie, Julien', false) ; // Remove votes without tag Charlie AND without tag Julien.
$election->removeVotesByTags(['Julien','Charlie']) ; // Remove votes with tag Charlie OR with tag Julien.
