<?php
 
require APPPATH . '/libraries/REST_Controller.php';

class Error404 extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    function index(){
        $respon = $this->response(array(
            'result' => 
                
                    array( ['message' => '404 NOT FOUND']
        ),
        ), 404);

        json_encode($respon);
    }

}