<?php

namespace Application\controllers;

class Timeline {
   
    public function index($params)
    {
        $service = new Services\Users();
        $data = $service->{strtolower($_SERVER['REQUEST_METHOD'])}();
        echo json_encode($data);
    }
}    
