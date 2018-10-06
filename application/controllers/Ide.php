<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class C_ide extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data id_ide
   function index_get() {
        $id_ide = $this->get('id_ide');
        if ($id_ide == '') {
            $id_ide = $this->db->get('Ide')->result();
            $this->response(array( 'result' => $id_ide, ), 200);
        } else {
            $this->db->where('id_ide', $id_ide);
            if($id_ide = $this->db->get('ide')->result()){
                $this->response($id_ide, 200);
            }else{$this->response(array(
                    'result' =>
                        array( ['message' => '404 NOT FOUND']
        ),
        ), 404);
            }  
        }
       
    }
 
    // insert new data to id_ide
    function index_post() {
        $data = array(
            
                    'judul_ide'          => $this->post('judul_ide'),
                    'foto_ide'          => $this->post('foto_ide'),
                    'deskripsi_ide'        => $this->post('deskripsi_ide'));
        $insert = $this->db->insert('ide', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data id_ide
    function index_put() {
        $id_ide = $this->put('id_ide');
        $data = array(
                
                    'judul_ide'          => $this->put('judul_ide'),
                    'foto_ide'          => $this->put('foto_ide'),
                    'deskripsi_ide'        => $this->put('deskripsi_ide'));
        $this->db->where('id_ide', $id_ide);
        $update = $this->db->update('ide', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete id_ide
    function index_delete() {
        $id_ide = $this->delete('id_ide');
        $this->db->where('id_ide', $id_ide);
        $delete = $this->db->delete('ide');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}