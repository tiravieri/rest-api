<?php
use Restserver\Libraries\REST_Controller;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class staff extends REST_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Staff_model', 'staff');
    }

    public function index_get()
    {
        $nip = $this->get('nip');
        if ($nip === null) {
            $staff = $this->staff->getstaff();
        } else {
            $staff = $this->staff->getstaff($nip);
        }

        if ($staff) {
            $this->response([
                'status' => true,
                'data' => $staff
            ], REST_Controller::HTTP_OK);
        }
    }
}
