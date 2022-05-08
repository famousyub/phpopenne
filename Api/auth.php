<?php 
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 1000");
header("Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Cache-Control, Pragma, Authorization, Accept, Accept-Encoding");
header("Access-Control-Allow-Methods: PUT, POST, GET, OPTIONS, DELETE");
header('Content-Type: application/json');
require 'URL.php';
$method = $_SERVER["REQUEST_METHOD"];

if($method=="GET"){
    $data= ["data"=>"hello ", "status"=>200,"ping"=>$_SERVER["REMOTE_ADDR"]];
    echo json_encode($data);
    
}
else {
    
    $data = json_decode(file_get_contents("php://input"));
    $username = $data->usernameOrEmail;
    $password = $data->password;
    
    
    $username = htmlspecialchars($username);
    
    $password = htmlspecialchars($password);
    $url1 = 'http://localhost:8096/api/login';
    $url=LOGIN_API;
    // Create a new cURL resource
    $ch = curl_init($url);
    
    // Setup request to send json via POST
    $data = array(
        'usernameOrEmail' => $username,
        
        'password' => $password
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
    curl_close($ch);
    
    echo json_decode($result,true);
    
}


?>