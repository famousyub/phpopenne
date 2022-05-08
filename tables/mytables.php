<?php 

class Motorcycle
{
    public $name;
    public $type;
}
$tables = array();

$constatnts =["table0"=>"users","tables0"=>"countries","tables2"=>"posts"];






use tables\TablesData;

$tables[0] = new TablesData("users");


/*for($i=0;$i<sizeof($constatnts);$i++){
    
    $tables[i] =new TablesData("") 
}
*/

foreach ($constatnts as $key=>$value){
    
    $tables[$key] = new TablesData($value);


}

define ("T_USERS",$tables[0]->getTable_name($constatnts[0]));








?>