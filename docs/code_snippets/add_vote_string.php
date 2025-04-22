$election->addVote('A>B=C=H>G=T>Q');

// It works with spaces, if you want to be less strict...
$election->addVote('A> B = C=H >G=T > Q');

// But you cannot use the '<' operator
$vote = 'A<B<C'; // This is not correct
// The following won't work either
$vote = 'A>BC>D'; // This is not correct
