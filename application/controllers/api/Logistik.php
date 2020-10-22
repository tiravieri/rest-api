<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Logistik extends REST_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Logistik_model', 'lgs');
    }

    public function index_get(){
        $kode = $this->get('kode');
        if ($kode === null){
            $logistik = $this->lgs->getLogistik();
        } else{
            $logistik = $this->lgs->getLogistik($kode);
        }
        
        if ($logistik){
            $this->response([
                'status' => true,
                'data' => $logistik
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'kode not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function index_delete()
    {
        $kode = $this->delete('kode');

        if ($kode === null){
            $this->response([
                'status' => false,
                'message' => 'provide a kode'
            ], REST_Controller::HTTP_BAD_REQUEST);
        } else {
            if ($this->lgs->deleteLogistik($kode) > 0) {
                $this->response([
                    'status' => true,
                    'kode' => $kode,
                    'message' => 'Deleted.'
                ], REST_Controller::HTTP_NO_CONTENT);
            } else {
                $this->response([
                    'status' => false,
                    'message' => 'kode not found'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
    }

    public function index_post()
    {
        $data = [
            'kode_logistik' => $this->post('kode'),
            'nama' => $this->post('nama'),
            'status' => $this->post('status'),
            'tipe' => $this->post('tipe'),
            'foto' => $this->post('foto')
        ];

        if ($this->lgs->createLogistik($data) > 0){
            $this->response([
                'status' => true,
                'message' => 'New Logistik has been created.'
            ], REST_Controller::HTTP_CREATED);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to create new data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }

    public function index_put()
    {
        $kode = $this->put('kode');
        $data = [
            'nama' => $this->put('nama'),
            'status' => $this->put('status'),
            'tipe' => $this->put('tipe'),
            'foto' => $this->put('foto')
        ];

        if ($this->lgs->updateLogistik($data, $kode) > 0){
            $this->response([
                'status' => true,
                'message' => 'data Logistik has been updated.'
            ], REST_Controller::HTTP_NO_CONTENT);
        } else {
            $this->response([
                'status' => false,
                'message' => 'Failed to update data'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }
}