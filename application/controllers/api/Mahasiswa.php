<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Mahasiswa extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model', 'mhs');
    }

    public function index_get()
    {
        $nim = $this->get('nim');
        if ($nim === null) {
            $Mahasiswa = $this->mhs->getMahasiswa();
        } else {
            $Mahasiswa = $this->mhs->getMahasiswa($nim);
        }

        if ($Mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $Mahasiswa
            ], REST_Controller::HTTP_OK);
        }
    }

    public function ambil1_get()
    {
        $nim = $this->get('nim');
        $Mahasiswa = $this->mhs->getPeminjamanNIM($nim);
        if ($Mahasiswa) {
            $this->response([
                'status' => true,
                'data' => $Mahasiswa
            ], REST_Controller::HTTP_OK);
        }
    }
}
