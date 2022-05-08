<?php 


use includes\ClassTwo;
use entity\User;

require_once   $_SERVER["DOCUMENT_ROOT"]."/includes/ClassTwo.php";


$u = new ClassTwo("127.0.0.1", "root", "", "godb");

$users= $u->getAllUsers();

$c = $u->getUsersCount();


echo "<p>".$c."</p>";



foreach ($users as $key =>$value){
    
    if($value instanceof User ){
        
        echo $value->getEmail();
        echo $value->getUsername();
        echo $value->getGender();
        
    }
    else echo "no users found";
    // $postType =
    
    //echo "<h1>".."</h1>";
    
}

//mysqli_free_result($users); 
$u->closedb();


$smarty = new Smarty();

$smarty->assignByRef("users", $users);
$template = $_SERVER["DOCUMENT_ROOT"]."/templates/allusers.tpl";
$smarty->display($template);

?>

<?php

if(isset($_GET["des"])){
    
    echo '  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
 ';
    
    
}

?>