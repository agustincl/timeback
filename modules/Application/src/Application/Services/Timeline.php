<?php
namespace Application\Services;

use Application\Mappers\Timeline as TimelineMapper;
/**
 * TODO No me reconoce el TimelineMapper
 */

class Timeline
{
    public function get($id=null)
    {
        if(!$id)
        {
            $mapper = new TimelineMapper();
            $data = $mapper->fetchAllTimeline();
            return $data;
        }        
        else{
            $data = $this->getOne($id);
            return $data;
        }
    }
    
    private function getOne($id)
    {
        $mapper = new TimelineMapper();
        $mapper->setId($id);
        $data = $mapper->fetchTimeline($id);
        return $data;
    }
    
    public function post($id, $data)
    {
    	$mapper = new TimelineMapper();
     	$mapper->setId($id);
     	
     	$exists = self::getOne($data['id']);
     	if (empty($exists['id']))
            $ok = $mapper->insertTimeline($data);
        else 
            die("Timeline exists");
        
        if (!$ok)
        	die("POST Method failure");
        return $ok;
    }
    
    /**
     * @param unknown_type $id
     * @param array $data
     */
    public function patch($id, $data)
    {
    	$mapper = new TimelineMapper();
        $mapper->setId($id);
        $ok = $mapper->updateTimeline($data);
        if (!$ok)
        	die("POST Method failure");
        return $ok;
    }
        
    public function delete($id)
    {
    	$mapper = new TimelineMapper();
        $mapper->setId($id);
        $ok = $mapper->deleteTimeline();
        if (!$ok)
        	die("POST Method failure");
        return $ok;
    }
    
    public function options()
    {
        die("OPTIONS Method not implemented");
    }
    
    public function put()
    {
        die("PUT Method not implemented");
    }
    
}