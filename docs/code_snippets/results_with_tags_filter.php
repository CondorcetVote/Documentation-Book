// Use the Schulze ranking method, but only compute votes with tags 'Julien' or tag 'Beethoven'.
$election->getResult(   'Schulze',
                        ['tags' => ['Julien', 'Beethoven'], 'withTag' => true]
                    );

// Use the Copeland method, no special parameters to it, but only compute with a vote without tag 'Julien' and without tag 'Beethoven'.
$election->getResult(   'Copeland',
                        ['tags' => ['Julien', 'Beethoven'], 'withTag' => false]
                    );
