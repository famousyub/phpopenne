<?php 
require   __DIR__ .'/Database.php';
require    __DIR__ .'/User.php';

//require $_SERVER["DOCUMENT_ROOT"].  '/vendor/smarty/smarty/libs/Smarty.class.php';


$redis = new Redis();

$redis->connect('127.0.0.1', 6379);

$user = new User();

$database = new Database("127.0.0.1", "root", "", "famousme");

$user_id = $redis->get("login_id");
if(!empty($user_id)){
    
    $query = "SELECT user_id , username , email,gender,avatar FROM Wo_Users WHERE user_id = ".$user_id;
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
            $user->setUser_id($row["user_id"]);
            $user->setAvatar($row["avatar"]);
            
        }
    }
    
    
    
    
    $database->close();
    
    $smarty = new Smarty();
    
    $smarty->assign("username",$user->getUsername());
    $smarty->assign("email",$user->getEmail());
    $smarty->assign("gender",$user->getGender());
    $smarty->assign("user_id",$user->getUser_id());
    $link = "http://localhost:82/famousme/{$user->getAvatar()}";
    
    $smarty->assign("avatar",$link);
    $sufrfing = "http://localhost:82/famousme/{$user->getUsername()}";
    $smarty->assign("surfing",$sufrfing);
    
    $template = $_SERVER["DOCUMENT_ROOT"]."/templates/Profile.tpl";
    $smarty->display($template);
    
    
    
}
else  
echo "not user soemthing wrong";








?> 