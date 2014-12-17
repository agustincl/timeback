<?php

namespace Core\Adapters;
use Core\Application\Application;

Class Gdata implements AdapterInterface, GdataInterface
{
    private $gdClient;
    
    public function __construct()
    {
//         $config = Application::getConfig();
//         $this->connect($config);
    }
    
    /**
     * Reliza una conexión, con los datos de una array de configuarción
     * como parámetro.
     * @param array $config
     */
    public function connect($config)
    {
//         $httpClient = Zend_Gdata_ClientLogin::getHttpClient($config['gdata']['user'], 
//                                                             $config['gdata']['pass'], 
//                                                             $config['gdata']['service']');
//         $this->gdClient = new Zend_Gdata_Docs($httpClient);
    }
    
    /**
     * Realiza la desconexión a la Base de Datos.
     */
    public function disconnect()
    {
        
    }
    
    /**
     * Fetch all rows from table
     * @return rows
     */
    public function fetchAll()
    {
        
    }
    
    /**
     * Fetch id row from table
     * @param array $id
     * @return row
     */
    public function fetch($id)
    {
    
    }
    
    /**
     *
     * @param array $id
     * @return boolean
     */
    public function delete($id) 
    {
      
    }
    
    /**
     *
     * @param array $data
     * @return boolean
     */
    public function insert($data) 
    {
        
    }
    
    /**
     *
     * @param array $id
     * @param array $data
     * @return boolean
     */
    public function update($id, $data) 
    {
            
    }
}
