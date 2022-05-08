<?php


$url = 'http://localhost:8096/api/login';

// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
$data = array(
    'usernameOrEmail' => 'ayoubsmayen',
    
    'password' => '1234516'
);
$payload = json_encode(array("user" => $data));
$user= json_encode($data);
// Attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $user);

// Set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

// Return response instead of outputting

curl_setopt($ch, CURLOPT_PORT, 8096);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
//curl_setopt($ch, CURLOPT_POSTFIELDS, $json_id);
curl_setopt($ch, CURLOPT_SSLVERSION, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute the POST request
$result = curl_exec($ch);

//echo json_decode($result);

$d =  json_decode($result,true);


if(!empty( $d['token'])){
    
    print_r($d);
    
    $go_login=$d["token"];
    //echo $d["token"];
    
    //printf($result);
    
    
    $redis = new Redis();
    
    $redis->connect('127.0.0.1', 6379);
    
    $redis->set("go_login",$go_login);
    
}
else echo $d['error'];




// Close cURL resource
curl_close($ch);

?>