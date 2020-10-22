<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class peminjaman extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('peminjaman_model', 'pm');
    }

    public function index_get()
    {
        $nim = $this->get('nim');
        if ($nim === null) {
            $pinjam = $this->pm->getPeminjaman();
        } else {
            $pinjam = $this->pm->getPeminjaman($nim);
        }

        if ($pinjam) {
            $this->response([
                'status' => true,
                'data' => $pinjam
            ], REST_Controller::HTTP_OK);
        } else {
            $this->response([
                'status' => false,
                'message' => 'kode not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }
    }

    public function ambil_get()
    {
        $nip = $this->get('nim');
        $pinjam = $this->pm->getPeminjamannip($nip);

        if ($pinjam) {
            $this->response([
                'status' => true,
                'data' => $pinjam
            ], REST_Controller::HTTP_OK);
        }
    }

    public function index_post()
    {
        $data = [
            'nim' => $this->post('nim'),
            'tgl_transaksi' => $this->post('transaksi'),
            'kode_logistik' => $this->post('kode'),
            'status' => $this->post('status'),
            'kegiatan' => $this->post('kegiatan'),
            'tgl_pinjam' => $this->post('pinjam'),
            'tgl_pengembalian' => $this->post('balik')
        ];

        if ($this->pm->createPeminjaman($data) > 0) {
            $this->response([
                'status' => true,
                'message' => 'New Peminjaman has been created.'
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
        $no = $this->put('no');
        $data = [
            'nim' => $this->put('nim'),
            'tgl_transaksi' => $this->put('transaksi'),
            'kode_logistik' => $this->put('kode'),
            'status' => $this->put('status'),
            'kegiatan' => $this->put('kegiatan'),
            'tgl_pinjam' => $this->put('pinjam'),
            'tgl_pengembalian' => $this->put('balik')
        ];

        if ($this->pm->updatePeminjaman($data, $no) > 0) {
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
