<?php
namespace includes;


use entity\User;

require_once   $_SERVER["DOCUMENT_ROOT"]."/entity/User.php";

require_once  $_SERVER["DOCUMENT_ROOT"]."/includes/FamDatabase.php"   ;



class ClassTwo
{
    
    
    
    private  $db ;
    
    function __construct($host ,$username,$pass,$db){
        
        
        $this->db = new FamDatabase($host, $username, $pass, $db);
        
        
        
    }
    
    
    public function getUsersCount(){
        
        
        $counnter = $this->db->query("select count(*) AS news_count  from users");
        
        if($counnter->num_rows >0){
            
            $row =mysqli_fetch_array($counnter);
            
            
            return  $row["news_count"];
            
        }
    }
    
    static  function getUserById($id){
        
        $us = new User();
        $u = $this->db->query("select username , gender , email,id,phone_number from users Where id =".$id);
        
        if($u->num_rows>0){
            while($row = mysqli_fetch_assoc($u)){
                
                
                $username = $row["username"];
                $us->setUsername($username);
                $gender =  $row['gender'];
                $us->setGender($gender);
                $email = $row['email'];
                $us->setEmail($email);
                $phone_number= $row['phone_number'];
                $us->setPhonenumber($phone_number);
                $id =$row['id'];
                $us->setId($id);
                
                
            }
            
            return $us;
        }
        
        return false;
    }
    
    public function getAllUsers(){
        
        $data  =array();
        
        $users =array();
        
        
        
        
        $user = $this->db->query("select username,phone_number , email , id , gender from users");
       
        
        
        
        
        if($user->num_rows >0){
            
            
            while($row = mysqli_fetch_assoc($user)) {
                
                //echo "postText: " . $row["postText"];
                $u  = new  User();
                
                if(!empty( $row["username"])){
                    
                    $u->setUsername($row["username"]);
                    
                }
                
                if(!empty($row["email"])){
                    $postFile  = $row["email"];
                    $u->setEmail($postFile);
                    
                }
                if(!empty($row["gender"])){
                    $postFeeling = $row["gender"];
                    $u->setGender($postFeeling);
                    
                }
                
                //$postType=$row["id"];
                //$post_id= $row["id"];
                $u_id = $row["id"];
                
                
               $u->setId($u_id);
               
               $u->setPhonenumber($row["phone_number"]);
                
                
                array_push($users,$u);
                
                
                
                
                
            }
            
            return  $users;
            
            
        }
        
        return false;
        
        
        
        
        /*if($user->num_rows >1){
            
            $data["users"] = $user->fetch_assoc();
            //mysqli_fetch_assoc($user);
            
            
            
            while($fetched_data=mysqli_fetch_assoc($user)){
                $data[]
            }
            
            $ret= GeneralSettings::Famo_Sql_Result($user);
            
            
            return $data["users"];
        }
 
          return  false;
       
        
        
        if(mysqli_num_rows($user)){
            return mysqli_fetch_assoc($user);
        }
        
        return false;
        */
    }
    
    
    public function closedb(){
        $this->db->close();
    }
    
    
     
}

