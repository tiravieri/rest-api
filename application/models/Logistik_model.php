<?php

class Logistik_model extends CI_Model{

    public function getLogistik($kode = null){

        if ($kode === null){
            return $this->db->get('logistik')->result_array();
        } else{
            return $this->db->get_where('logistik', ['kode_logistik' => $kode])->result_array();
        }
    }

    public function deleteLogistik($kode)
    {
        $this->db->delete('logistik', ['kode_logistik' => $kode]);
        return $this->db->affected_rows();
    }

    public function createLogistik($data)
    {
        $this->db->insert('logistik', $data);
        return $this->db->affected_rows();
    }

    public function updateLogistik($data, $kode)
    {
        $this->db->update('logistik', $data, ['kode_logistik' => $kode]);
        return $this->db->affected_rows();
    }
}