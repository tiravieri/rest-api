<?php

class Mahasiswa_model extends CI_Model
{

    public function getMahasiswa($nim = null)
    {

        if ($nim === null) {
            return $this->db->get('mahasiswa')->result_array();
        } else {
            return $this->db->get_where('mahasiswa', ['nim' => $nim])->result_array();
        }
    }

    public function getPeminjamanNIM($nim)
    {
        return $this->db->get_where('mahasiswa', ['nim' => $nim])->result_array();
    }
}
