$election->parseCandidates('A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z');

$json_votes = json_encode( [
	['vote' => 'A>B=D>C', 'tag' => 'ben,jerry'],
	['vote' => ['D', 'B,A', 'C'], 'tag' => ['bela','bartok'], 'multi' => 5],
	['vote' => ['A', ['B','C'], 'D']]
] );

$election->addVotesFromJson($json_votes);
