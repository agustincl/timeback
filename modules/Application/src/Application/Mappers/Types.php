<?php
//Mapper to table types (Timeline)
namespace Application\Mappers;

class Types{

    private $adapterName;

    /**
     * Constructor que al instanciar recibe el adapter
     */
    public function __construct()
    {
        $config = Application::getConfig();
        $request = Application::getRequest();
        $this->setAdapterName($config['adapter']);
        if(isset($request['params']['id']))
            $this->setId($request['params']['id']);
    }

    public function setAdapterName($adapterName)
    {
        $this->adapterName = $adapterName;
    }

    /**
     *
     * @return array de users
     */
    public function fetchAll()
    {


    }

    public function fetch()
    {

    }

    public function insert()
    {

    }

     public function delete($id)
     {
      $adapter = new $this->adapterName();
        if(method_exists($adapter, 'setTable')){
            $adapter->setTable('tag');
        }
        return $adapter->delete($id);
    }
}