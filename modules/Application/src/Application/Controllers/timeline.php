<?php
namespace Application\controllers;
use Application\Mappers\Timeline as TimelineMapper;

use Application\Services;

class Timeline
{
    
    public $layout = null;
    
    
    public function index()
    {
        $service = new Services\Timeline();
        $data = $service->{strtolower($_SERVER['REQUEST_METHOD'])}($id);
        
//         echo "<pre>Data: ";
//         print_r($data);
//         echo "<pre>";
//         echo "kaka";
//         die;
        echo json_encode($data);
        
    }

}


