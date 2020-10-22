<?php

class Staff_model extends CI_Model
{

    public function getstaff($nip = null)
    {

        if ($nip === null) {
            return $this->db->get('staff')->result_array();
        } else {
            return $this->db->get_where('staff', ['nip' => $nip])->result_array();
        }
    }
}
