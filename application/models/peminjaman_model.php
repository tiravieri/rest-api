<?php

class peminjaman_model extends CI_Model
{

    public function getPeminjaman($nim = null)
    {

        if ($nim === null) {
            return $this->db->get('peminjaman')->result_array();
        } else {
            return $this->db->get_where('peminjaman', ['nim' => $nim])->result_array();
        }
    }

    public function getPeminjamannip($nip)
    {
        return $this->db->get_where('peminjaman', ['nim' => $nip])->result_array();
    }

    public function createPeminjaman($data)
    {
        $this->db->insert('peminjaman', $data);
        return $this->db->affected_rows();
    }

    public function updatePeminjaman($data, $no)
    {
        $this->db->update('peminjaman', $data, ['noPeminjaman' => $no]);
        return $this->db->affected_rows();
    }
}
