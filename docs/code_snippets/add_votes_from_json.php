$json_votes = json_encode( [
	['vote' => 'A>B=D>C', 'tag' => 'ben,jerry'],
	['vote' => ['D', 'B,A', 'C'], 'tag' => ['bela','bartok'], 'multi' => 5],
	['vote' => ['A', ['B','C'], 'D']]
] );

$election->addVotesFromJson($json_votes);
