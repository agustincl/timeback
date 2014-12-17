<?php

namespace Core\Adapters;
use Core\Application\Application;

Class Txt implements AdapterInterface, TxtInterface
{
    private $filename;
    
    public function __construct() {
        $config = Application::getConfig();
        $this->setFilename($_SERVER['DOCUMENT_ROOT']."/".$config['filename']);
    }
    public function setFilename($filename) 
    {
        $this->filename = $filename;
    }
    
    public function getFilename() 
    {
        return $this->filename;
    }
    
    public function fetchAll()
    {
        $users = file_get_contents($this->filename);
        $users = explode("\n", $users);
        return $users;                 
    }
    
    public function fetch($id) 
    {
        $data = file_get_contents($this->filename);
        $data = explode("\n", $data);
        $user = $data[$id];
        $user = explode("|", $usuario);
        return $user;
        break;
    }
    
	public function delete($id)
	{
	    $data = file_get_contents($this->filename);
	    $data = explode("\n", $data);
	    unset($data[$id]);
	    $users = implode("\n", $data);
	    return file_put_contents($this->filename, $users);
	    break;
	}
	
	public function insert($data)
	{
	    foreach($data as $key => $value)
        {
            return file_put_contents($this->filename, $data."\n", FILE_APPEND);
        }
	}
	
	public function update($id,$data)
	{
	    $users = file_get_contents($this->filename);
	    $users = explode("\n", $users);
	    foreach($data as $key => $value)
	    {
	        if(is_array($value))
	            $value=implode(',', $value);
	        $data[$key]=$value;
	    }
	    $data = implode('|', $data);
	    $users[$data['id']] = $data;
	    $users = implode("\n", $users);
	    // Escribir todo el array al fichero
	    return file_put_contents($this->filename, $users);
	     
	}
    
}
