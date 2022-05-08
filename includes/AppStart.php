<?php
namespace includes;


error_reporting(0);
header('Cache-Control: max-age=846000');

@ini_set('max_execution_time', 0);
@ini_set("memory_limit", "-1");
@set_time_limit(0);

require_once $_SERVER["DOCUMENT_ROOT"]. '/config.php';



class AppStart
{
    
    private $ca ;
    private $dt = array();
    
    private $sqlCoonect ;
    private $ServerErrors = array();
    private $query ;
    
   private   $config ;
   //ClassOne::Famo_Config("T_CONFIG");
    
    
    
    
    function  __construct($host,$username,$password,$database) {
        $this->sqlCoonect = $dt["sqlConnect"] = new FamDatabase($host, $username, $password, $database);
        
        
        $this->config = ClassOne::Famo_Config("T_CONFIG");
        
        if(mysqli_connect_errno()){
            $this->ServerErrors[] = "Failed to connect to mYsql".mysqli_connect_error();
            
        }
        if (!function_exists('curl_init')) {
            $this->ServerErrors[] = "PHP CURL is NOT installed on your web server !";
        }
        if (!extension_loaded('gd') && !function_exists('gd_info')) {
            $this->ServerErrors[] = "PHP GD library is NOT installed on your web server !";
        }
        if (!extension_loaded('zip')) {
            $this->ServerErrors[] = "ZipArchive extension is NOT installed on your web server !";
        }
        
        $this->query= mysqli_query($this->sqlConnect, "SET NAMES utf8mb4");
        
        if (isset($this->ServerErrors) && !empty($this->ServerErrors)) {
            foreach ($ServerErrors as $Error) {
                echo "<h3>" . $Error . "</h3>";
            }
            die();
        }
        
        
        $this->config["theme_url"]=$site_url . "/themes/".$config["themes"];
        
        $this->dt["site_url"] = $site_url;
        
        
        
    }
    
    
    
}

