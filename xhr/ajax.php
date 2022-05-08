<?php 



use includes\Authentication;
use includes\Error;

if(isset($_POST['action'])){
    
    $success = false;
    $message =array();
    
    $data=array();
    
    if($_POST['action'] =='login'){
        
        $success = Authentication::login($_POST);
        $message = Error::GetAll();
        $data = 'hello';
        
    }
}

$response = array('success'=>$success,'message'=>$message,'data'=>$data);

echo json_encode($response);
?>