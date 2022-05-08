<?php 

use classes\Wo_Posts;

//use classes\Wo_Posts;
//<script src="<https://cdn.jsdelivr.net/npm/vue@2.6.14/dist/vue.js>"></script>
//<script src="<https://cdn.jsdelivr.net/npm/vue@2.6.14>"></script>
require   __DIR__ .'/Database.php';
require   $_SERVER["DOCUMENT_ROOT"].'/classes/Wo_Posts.php';

$database = new Database("127.0.0.1", "root", "", "famousme");
$redis = new Redis();

$redis->connect('127.0.0.1', 6379);
$user_id = $redis->get("login_id");


if(!empty( $user_id)){
    
    
    $query = "SELECT post_id ,user_id, postText , postFile,postType,postFeeling FROM Wo_Posts WHERE user_id = ".$user_id." order by post_id limit 10";
    $query= $database->escape($query);
    //echo $query;
    $result = $database->query($query);
    
    $posts =  array();
    
    if($result->num_rows>0){
        
        while($row = mysqli_fetch_assoc($result)) {
            
            //echo "postText: " . $row["postText"];
            $post = new \classes\Wo_Posts();
            
            if(!empty( $row["postText"])){
                
                $post->setPostText($row["postText"]);
                
            }
            
            if(!empty($row["postFile"])){
                $postFile  = $row["postFile"];
                $post->setPostFile($postFile);
                
            }
            if(!empty($row["postFeeling"])){
                $postFeeling = $row["postFeeling"];
                $post->setPostFeeling($postFeeling);
                
            }
            
            $postType=$row["postType"];
            $post_id= $row["post_id"];
            $u_id = $row["user_id"];
            
            $post->setPost_id($post_id);
            $post->setPostType($postType);
            $post->setUser_id($user_id);
           
            
            array_push($posts,$post);
            
       
            
            
            
        }
        
    }
    
  
    
}

//print_r($posts);

$p = new Wo_Posts();

$smarty = new Smarty();

//$smarty->assign("posts",$posts);
$rllink ="http://localhost:82/famousme/";
$smarty->assignByRef("posts", $posts);
$smarty->assign("link",$rllink);
//assign_by_ref("posts",$posts);

$template = $_SERVER["DOCUMENT_ROOT"]."/templates/myposts.tpl";
$smarty->display($template);



/*

foreach ($posts as $key =>$value){
    
    if($value instanceof Wo_Posts ){
        
        echo $value->getPostText();
        echo $value->getPostFeeling();
        echo $value->getPostFile();
        
    }
    else break;
   // $postType = 
    
    //echo "<h1>".."</h1>";
    
}

*/
$database->close();

?>