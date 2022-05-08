<?php 


echo __DIR__;
require   __DIR__ .'/Database.php';
require    __DIR__ .'/User.php';

include __DIR__ . '/secure.php';

$cachefile =$_SERVER["DOCUMENT_ROOT"]."/caches/storecache.php";
// Include cache class
//include_once 'cache.php';
include_once $_SERVER["DOCUMENT_ROOT"]."/classes/CacheConfig.php";
$buffer_object = new \classes\CacheConfig($cachefile);

// check already buffered data
if( $buffer_object->check() ) {
    include_once $cachefile;
} else {
    // start buffering
    $buffer_object->startBuffering();
}

echo "<br/>";

$root = $_SERVER["DOCUMENT_ROOT"];
echo $root;

echo "<br/>";
$user= new User();

$database = new Database("127.0.0.1", "root", "", "famousme");
$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$user_id = $redis->get("login_id");
$query = "SELECT username , email,gender FROM Wo_Users WHERE user_id = ".$user_id;
$query= $database->escape($query);
//echo $query;
$result = $database->query($query);

if($result->num_rows >0)
{
    while($row = mysqli_fetch_assoc($result)) {
        
        echo "UserName: " . $row["username"];
        
        $user->setUsername($row["username"]);
        $user->setEmail($row["email"]);
        $user->setGender($row["gender"]);
        
    }
}




$database->close();


echo "<h1>{$user->getEmail()}</h1>";

echo "<small> {$user->getUsername()} </small>" ;







    


?>


<html>
<head>
<title>
</title>
</head>

<body>

<div id="root"></div>
</body>
</html>







<?php 

$buffer_object->stopBuffering();
?>







