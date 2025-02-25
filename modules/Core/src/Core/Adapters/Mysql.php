<?php

namespace Core\Adapters;
use Core\Application\Application;

class Mysql implements AdapterInterface, MysqlInterface
{
    private $link;
    protected $table;
    
    public function __construct($table=null) 
    {
        $this->table = $table;
        $config = Application::getConfig();
        $this->connect($config);
    }
  
    /**
     * Reliza una conexión, con los datos de una array de configuarción
     * como parámetro.
     * @param array $config
     */
    public function connect($config)
    {
        // Conectarse al DBMS
        $this->link = mysqli_connect($config['database']['host'],
            $config['database']['user'],
            $config['database']['password']);
        
        mysqli_select_db($this->link, $config['database']['database']);        
    }
    
    /**
     * Realiza la desconexión a la Base de Datos.
     */
    public function disconnect()
    {
        mysqli_close($this->link);
    }
    
    /**
     * @param field_type $table
     */
    public function setTable($table)
    {
        $this->table = $table;
    }
    
    /**
     * Fetch all rows from table
     * @return rows
     */
    public function fetchAll()
    {
        // SELECT * FROM users;
        $sql = "SELECT * FROM ".$this->table;
       
        // Retornar el data
        $result = mysqli_query($this->link, $sql);
        $rows = array();
        while ($row = mysqli_fetch_assoc($result))
        {
            $rows[] = $row;
        }
        return $rows;
    }
    
    /**
     * Fetch id row from table
     * @param array $id
     * @return row 
     */
    public function fetch($id)
    {               

        $sql = "SELECT * 
                FROM ".$this->table." 
                WHERE ".key($id)."='".$id[key($id)]."'";
        
        // Retornar el data
        $result = mysqli_query($this->link, $sql);

        $row = mysqli_fetch_assoc($result);
        
        return $row;

    }
    
    /**
     * 
     * @param array $id
     * @return boolean 
     */
    public function delete($id) 
    {       
        $sql = "DELETE 
                FROM ".$this->table." 
                WHERE ".key($id)."='".$id[key($id)]."'";
        
        $result = mysqli_query($this->link, $sql);
        
        return $result;
    }
    
    /**
     * 
     * @param array $data
     * @return boolean 
     */
    public function insert($data) 
    {
        $sql = "INSERT INTO ".$this->table." SET "; 
        
        foreach ($data as $key => $value){
            $sql .= "$key = '$value',";
        }
        $sql = rtrim($sql,",");
        
//         echo "<pre>sql: ";
//         print_r($sql);
//         echo "</pre>";
//         die;

        $result = mysqli_query($this->link, $sql);
        
        return $result;
    }
    
    /**
     * 
     * @param array $id
     * @param array $data
     * @return boolean
     */
    public function update($id, $data) 
    {
        $sql = "UPDATE ".$this->table." SET "; 
         
        foreach ($data as $key => $value){
            $sql .= "$key = '$value',";
        }
        $sql = rtrim($sql,",");
        
        $sql .= " WHERE ".key($id)."='".$id[key($id)]."'";
        
        $result = mysqli_query($this->link, $sql);
        
        return $result;
    }
}
