<?php

class Paket_model extends CI_Model
{
    function select()
    {
        $result = $this->db->get('tb_paket');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function
    generate_kode_paket()
    {
        $this->db->select('RIGHT(tb_paket.id_paket,3) as kode', false);
        $this->db->order_by('id_paket', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_paket');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "PK" . $kodemax;
        return $kodejadi;
    }

    public function
    getAllDataKaryawan()
    {
        return $this->db->get('tb_karyawan')->result();
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_paket');
        $this->db->where('id_paket', $id);
        return $this->db->get()->row_array();
    }
    function selectkaryawan()
    {
        $result = $this->db->get('tb_karyawan');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }
    function hapus($id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        if ($this->db->delete('tb_paket'))
            return true;
        else
            return false;
    }
}

/* End of file ModelName.php */
