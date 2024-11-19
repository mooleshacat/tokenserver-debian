<?php

$server_id = getenv('SERVER_ID');
$num_tokens = getenv('NUM_TOKENS');
$token_expiry = getenv('TOKEN_EXPIRY');

$rnd = rand(0,$num_tokens);

$the_key = "tokenserver:TOKEN-$rnd:tokendata";

$redis = new Redis();
$redis->connect('localhost', 6379);

$token_data = $redis->get($the_key);

$token_data_array = explode("\n", $token_data);

$token_data_add = array( 'server_id: "$server_id",' );

$token_data_array = array_splice( $token_data_array, 1, 0, $token_data_add );

print_r($token_data_array);






echo "<br />";

$token_data = str_replace("'", '"', $token_data);

$jsonarray = json_decode($token_data);

print_r($jsonarray);

echo "<br />token_data:<br >";

# nl2br will preserve \n - if causes problem use str_replace
echo nl2br($token_data);

?>