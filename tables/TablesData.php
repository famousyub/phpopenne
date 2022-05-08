<?php
namespace tables;

class TablesData
{
    
    private $table_name ;
    
    
    /**
     * @return mixed
     */
    public function getTable_name()
    {
        return $this->table_name;
    }

    /**
     * @param mixed $table_name
     */
    public function setTable_name($table_name)
    {
        $this->table_name = $table_name;
    }

    function __construct($table_name){
        $this->table_name =$table;
        
    }
    
    
}

