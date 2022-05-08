<?php 

//use includes\Authentication;

use includes\Authentication;

header("Content-type: application/json");
require_once  $_SERVER['DOCUMENT_ROOT'].'/includes/Authentication.php';
if($_SERVER["REQUEST_METHOD"] == "GET"){
    
    echo "hello there ";
    echo "hello" ;
    echo $_SERVER["REQUEST_URI"];
    echo $_SERVER["REQUEST_METHOD"];
}

else  {
    
 
  
    
    
    $data = json_decode(file_get_contents("php://input"));
    
    if($data->action=='login' ){
        //print_r($data);
        //sleep(12);
        $request = $data->request;
        //if($request == 1 && $_POST['action'] == 'login'){
        $username = $data->usernameOrEmail;
        $password = $data->password;
        
        //echo $username;
        //echo $data;
        
        $login_data =array();
        $login_data["usernameOrEmail"] = $username;
        $login_data["password"] = $password;
        //$res =array()
        
        //print_r($login_data);
        $res= Authentication::login($login_data);
        //  array_push($res,Authentication::login($login_data));
        // array_push($res,Authentication::login($login_data));
        //sleep(12);
        
      //  print_r($res)  ;
        
        //sleep(12);
        
        if($res== 1 ){
            $response[] = array('status'=>1,"ok"=>"next");
            
        }
        else{
            $response[] = array('status'=>0,"ok"=>"stay");
        }
        echo   json_encode($response);
        exit();
        
        
        
        //return json_encode($response);
    }
    
    //}
    
    /*
     if(isset($_POST['action'])  && isset($_SERVER['REMOTE_ADDR']) ){
     
     $data = json_decode(file_get_contents("php://input"));
     print_r($data);
     sleep(12);
     $request = $data->request;
     if($request == 1 && $_POST['action'] == 'login'){
     $username = $data->usernameOrEmail;
     $password = $data->password;
     
     echo $username;
     //echo $data;
     
     $login_data =array();
     $login_data["usernameOrEmail"] = $username;
     $login_data["password"] = $password;
     
     print_r($login_data);
     $res= Authentication::login($login_data);
     
     if($res==true){
     $response[] = array('status'=>1);
     }
     else{
     $response[] = array('status'=>0);
     }
     
     header("Content-type: application/json");
     echo json_encode($response);
     exit;
     }
     
     }
     else {
     
     $erro= array("error"=>"somethingwrong");
     echo json_encode($erro);
     }
    
   */





    
}
?>
<script>

alert("<?php echo $res; ?>" ) ; 

</script>
