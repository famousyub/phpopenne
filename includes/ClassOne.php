<?php
namespace includes;

class ClassOne
{
    
    
    private $sqlconection ;
    private $data  =array();
    private $query;
    
    function __construct($sqlconnect){
        $this->sqlconection =$sqlconnect;
        
    }
    
    public function Famo_GetTerms($table){
        
        $sql ="select * from".$table;
        $this->query = mysqli_query($this->sqlconection, $sql);
        
        if(mysqli_num_rows($this->query)){
            while($fetched_data = mysqli_fetch_assoc($this->query)){
                $this->data[$fetched_data['type']]=$fetched_data['text'];
            }
        }
        
        
        return $this->data;
    }
    
    public static function  Famo_Config($table){
        
        $data =array();
        $sql ="select * from ".$table;
        $query=mysqli_query($this->sqlconection, $sql);
        
        if (mysqli_num_rows($query)) {
            while ($fetched_data = mysqli_fetch_assoc($query)) {
                $data[$fetched_data['name']] = $fetched_data['value'];
            }
        }
        
        return $data;
    }
    
    public  function Famo_GetHtmlEmails($table){
        $sql = "SELECT * FROM ".$table;
        $squery= mysqli_query($this->sqlconection, $sql);
        
        if (mysqli_num_rows($squery)) {
            while ($fetched_data = mysqli_fetch_assoc($squery)) {
                $this->data[$fetched_data['name']] = $fetched_data['value'];
            }
        }
        
        return $this>data;
        
        
    }
    
    public function Famo_GetUserFromSessionID($session_id,$platform='web'){
        
        if(empty($session_id)){
            return false;
        }
    }
   
}

