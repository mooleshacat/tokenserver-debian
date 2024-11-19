<?php

$server_id = getenv('SERVER_ID');
$num_tokens = getenv('NUM_TOKENS');
$token_expiry = getenv('TOKEN_EXPIRY');

$rnd = rand(0,$num_tokens);

$the_key = "tokenserver:TOKEN-$rnd:tokendata";

$redis = new Redis();
$redis->connect('localhost', 6379);

$token_data = $redis->get($the_key);

$token_data = str_replace("'", '"', $token_data)

#$jsonarray = json_decode($token_data);

#var_dump($jsonarray);

echo "<br />token_data:<br >";

# nl2br will preserve \n - if causes problem use str_replace
echo nl2br($token_data);

?>