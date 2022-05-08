<?php 


$url = 'http://localhost:8096/api/register';

// Create a new cURL resource
$ch = curl_init($url);

// Setup request to send json via POST
$data = array(
    'username' => 'ayoubsmayen3',
    'email'=>"ayoubsmayen3@gmail.com",
     'gender' =>"homme",
    'password' => '1234562',
    'phonenumber'=>'29966019'
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

echo $result;

printf($result);

// Close cURL resource
curl_close($ch);

?>