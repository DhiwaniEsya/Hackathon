<?php
 
require APPPATH . '/libraries/REST_Controller.php';
 
class C_invest extends REST_Controller {
 
    function __construct($config = 'rest') {
        parent::__construct($config);
    }
 
    // show data id_invest
   function index_get() {
        $id_invest = $this->get('id_invest');
        if ($id_invest == '') {
            $id_invest = $this->db->get('invest')->result();
            $this->response(array( 'result' => $id_invest, ), 200);
        } else {
            $this->db->where('id_invest', $id_invest);
            if($id_invest = $this->db->get('id_invest')->result()){
                $this->response($id_invest, 200);
            }else{$this->response(array(
                    'result' =>
                        array( ['message' => '404 NOT FOUND']
        ),
        ), 404);
            }  
        }
       
    }
 
    // insert new data to id_invest
    function index_post() {
        $data = array(
            
                    'nama_invest'          => $this->post('nama_invest'),
                    'foto_invest'          => $this->post('foto_invest'),
                    'waktu_invest'        => $this->post('waktu_invest'),
                    'kebutuhan_invest'        => $this->post('kebutuhan_invest'),
                    'kembali_invest'        => $this->post('kembali_invest'),
                    'terkumpul_invest'        => $this->post('terkumpul_invest'));
        $insert = $this->db->insert('id_invest', $data);
        if ($insert) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // update data id_invest
    function index_put() {
        $id_invest = $this->put('id_invest');
        $data = array(
                
                    'nama_invest'          => $this->post('nama_invest'),
                    'foto_invest'          => $this->post('foto_invest'),
                    'waktu_invest'        => $this->post('waktu_invest'),
                    'kebutuhan_invest'        => $this->post('kebutuhan_invest'),
                    'kembali_invest'        => $this->post('kembali_invest'),
                    'terkumpul_invest'        => $this->post('terkumpul_invest'));
        $this->db->where('id_invest', $id_invest);
        $update = $this->db->update('id_invest', $data);
        if ($update) {
            $this->response($data, 200);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
    // delete id_invest
    function index_delete() {
        $id_invest = $this->delete('id_invest');
        $this->db->where('id_invest', $id_invest);
        $delete = $this->db->delete('id_invest');
        if ($delete) {
            $this->response(array('status' => 'success'), 201);
        } else {
            $this->response(array('status' => 'fail', 502));
        }
    }
 
}