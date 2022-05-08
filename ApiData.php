<?php 



use includes\Authentication;

require $_SERVER['DOCUMENT_ROOT'].'/includes/Authentication.php';
?>
<?php  
if(Authentication::IsLogged()) :

?>

<?php  else:?>

<a href="authlogin">login</a>

<?php endif ?>

<?php 

/*
 * 
 * 
 * 
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^(.+)$ index.php?url=$1 [QSA,L]

RewriteRule ^$  /index.php [L,NC,QSA]
RewriteRule ^view$  /index.php [L,NC,QSA]
RewriteRule ^share$  /home.php [L,NC,QSA]
RewriteRule ^([a-zA-Z0-9]{8}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{4}-[a-zA-Z0-9]{12})$ /index.php?id=$1 [L,NC,QSA]
 */
echo "home";



echo "<a href='/share'>share</a>";
$ch = curl_init();
try {
    curl_setopt($ch, CURLOPT_URL, "http://localhost:5000/loginuser");
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, false);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_MAXREDIRS, 2);
    curl_setopt($ch, CURLOPT_NOBODY, true);
    
    $response = curl_exec($ch);
    
    if (curl_errno($ch)) {
        echo curl_error($ch);
        die();
    }
    
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    if($http_code == intval(200)){
        echo "Ressource valide";
    }
    else{
        echo "Ressource introuvable : " . $http_code;
    }
} catch (\Throwable $th) {
    throw $th;
} finally {
    curl_close($ch);
}


echo json_decode($response);

echo "</br>";
echo "hello tehere ";

echo $_SERVER["REMOTE_ADDR"];

$arr_ = array("username"=>["name"=>"ayoubsmayen"],"data"=>["age"=>25,"learning"=>"software"]);


print_r($arr);

foreach ($arr_ as $key=>$value ){
    foreach ($value as $k => $val ){
        echo $val;
    }
}
/*
 *  <p>
        <em>Please note:</em> This demo loads our desired machine learning model via <a href="https://github.com/tensorflow/tfjs-models/tree/master/coco-ssd" title="View TensorFlow.js COCO-SSD on our GitHub">an easy to use JavaScript class</a> made by the TensorFlow.js team to do the hard work for you. No machine learning knowledge is needed to use this. View the link to learn more about fine tuning this machine learning model. See our other tutorials if you want to load a model directly yourself, or recognize a custom object using your own data.
      </p>
 * 
 */
?>