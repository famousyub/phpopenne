<?php 

$url = "http://localhost:5000/loginuser";

$curl = curl_init($url);
curl_setopt($curl, CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

//for debug only!
curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

$resp = curl_exec($curl);
curl_close($curl);
//var_dump($resp);
//print_r($resp);
//var_dump(json_decode($resp,true));
//echo json_encode($resp,true);
$res=  json_decode($resp,true);
?>


<?php 


foreach ($res as $key=>$value){
    
    echo "<p>{$key}".$value."</p>";
}

?>
