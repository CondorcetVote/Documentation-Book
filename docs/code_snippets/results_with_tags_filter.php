$election->parseCandidates('A;B;C');

// Add votes with 'Julien' tag
$election->addVote('A > B > C', ['Julien']);
$election->addVote('A > C > B', ['Julien']);

// Add votes with 'Beethoven' tag
$election->addVote('B > A > C', ['Beethoven']);
$election->addVote('B > C > A', ['Beethoven']);

// Add votes with both tags
$election->addVote('C > A > B', ['Julien', 'Beethoven']);

// Add votes with no tags
$election->addVote('C > B > A');

// Use the Schulze ranking method, but only compute votes with tags 'Julien' or tag 'Beethoven'.
$election->getResult(
                        method: 'Schulze',
                        methodOptions: ['tags' => ['Julien', 'Beethoven'], 'withTag' => true]
                    );

// Use the Copeland method, no special parameters to it, but only compute with a vote without tag 'Julien' and without tag 'Beethoven'.
$election->getResult(
                        method: 'Copeland',
                        methodOptions: ['tags' => ['Julien', 'Beethoven'], 'withTag' => false]
                    );
