<?php 

session_start();
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);
echo  $me["message"];
$_SESSION["user_id"] =  1;
$_SESSION["message"] = $me["message"];

echo  $redis->get("login_id");
$user_id = $redis->get("login_id");
$curl = curl_init();
$server_key ="243ff5897fcd6ec23f4dbf822535ce0f";
$app_id="f08cf18c015409b2b9a6079ab753aced";
curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost:82/famousme/api/is-active',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => array('server_key' => $server_key,'user_id' => $user_id),
));

$response = curl_exec($curl);

curl_close($curl);
$me =  json_decode($response,true);

foreach ($me as $key=> $value) {
    echo "<p>".$value." " .$key ."  </p>";
}

?>