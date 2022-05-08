<?php
namespace includes;
session_start();
use entity\User;
use includes\Error;

require_once  $_SERVER['DOCUMENT_ROOT'].'/includes/Error.php';
require_once  $_SERVER['DOCUMENT_ROOT'].'/entity/User.php';

require_once 'includes/Session.php';
require_once 'includes/Cookie.php';
class Authentication
{
    
    static   function IsLogged() {
        
        return  !empty($_SESSION["current_user"]);
        
      /*  if(!empty($_SESSION["current_user"])){
            
            return true;
        }
        
        return false;*/
    }
    
    
    static function Activate($key){
        
        
        if(empty($key)){
            Error::Set("activation", "invalidlink");
        }
        
        else  {
            
            
            $user  = ClassTwo::getUserById(1);
          
            
            if($user!=false){
                $result =$user->getEmail();
                
                return $result;
            }
         
            else Error::Set("useractive", "invaliduserToken");
            
            
            
            
          
        }
        return false;
    }
    
    static function getUserLoginName(){
        
    }
    
    static function login($field ,$encrypted=false){
        
        $usernameOremail = $field['usernameOrEmail'];
        $password = $field['password'];
        
        
        $usernameOremail = htmlspecialchars($usernameOremail);
        
        $password = htmlspecialchars($password);
        $url = 'http://localhost:8096/api/login';
        
        // Create a new cURL resource
        $ch = curl_init($url);
        
        // Setup request to send json via POST
        $data = array(
            'usernameOrEmail' => $usernameOremail,
            
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
        $d =  json_decode($result,true);
        //&& array_key_exists("token", array($d)
        
      //  return $d;
        if(!empty( $d["token"] )){
            
            
            //if(!empty( $d['token']) && array_key_exists("token",$d)  ){
                
                //print_r($d);
                
                $go_login=$d["token"];
                //echo $d["token"];
                
                //printf($result);
                
                
                $redis = new \Redis();
                
                $redis->connect('127.0.0.1', 6379);
                
                $redis->set("go_login",$go_login);
                
                $redis->set("usergo",$usernameOremail);
                Session::Set("current_user", $redis->get('go_login'));
                
                
                if(isset($field['rememberme']))
                    Cookie::Set($usernameOremail, $password);
                    header('Location :home');
                    return true;
                    
                    
                    
                    
            //}
            
        }
        
        
        else  {
            
            Error::Set("username", "something wrong ");
            
            return false;
        }
        
        
       
        //print_r($d);if(!empty($d["error"]))
        
    //    $go_login=$d["token"];
        //echo $d["token"];
        
        //printf($result);
        
        
        
        
        
        //$redis = new \Redis();
        
       // $redis->connect('127.0.0.1', 6379);
        
        //$redis->set("go_login",$go_login);
        
        
        // Close cURL resource
        
        
        
    }
    
    static function signup($field){
        $url = 'http://localhost:8096/api/register';
        
        
        $username = $field['username'];
        $password = $field['password'];
        $gender= $field['gender'];
        $phone_number= $field['phone_number'];
        
        $email = $field['email'];
        
        $username = htmlspecialchars($username);
        $phone_number = htmlspecialchars($phone_number);
        $gender = htmlspecialchars($gender);
        $password = htmlspecialchars($password);
        
        
        // Create a new cURL resource
        $ch = curl_init($url);
        
        // Setup request to send json via POST
        $data = array(
            'username' => $username,
            'email'=>$email,
            'gender' =>$gender,
            'password' => $password,
            'phonenumber'=>$phone_number
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
        
        
    }
    
    
}

