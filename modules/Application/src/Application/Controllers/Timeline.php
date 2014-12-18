<?php
namespace Application\controllers;

use Application\Services;

// if(!isset($_SESSION['email']))    
//     header("Location: /home/select");

class Timeline
{    
    public $layout = null;
    
    public function index()
    {
        $id = \Core\Application\Application::getRequest()['id'];
        $service = new Services\Timeline();
        
        $data = json_decode((file_get_contents('php://input')), true);
        $data = $service->{strtolower($_SERVER['REQUEST_METHOD'])}($id, $data);
        
        header('Content-Type: application/json');
        header('Access-Control-Allow-Origin: *');
        echo json_encode($data);        
    }
    
}