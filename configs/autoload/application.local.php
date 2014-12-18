<?php
// Local identities configuration settings on $config variable
$config = array(
	'database'=>array(
        'user'=>'root',
        'password'=>'1234',
	    'database'=>'timeline'
    ),
    'gdata'=>array(
        'user'=>'',
        'pass'=>'',
        'service'=>'Zend_Gdata_Docs::AUTH_SERVICE_NAME'  
    ),
    'repository'=>'db',
    'adapter'=>'\Core\Adapters\Mysql',
    'filename'=> 'usuarios.txt',
    'default_controller'=>'Timeline',
    'default_action'=>'index'
);
