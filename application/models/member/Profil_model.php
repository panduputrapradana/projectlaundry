<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil_model extends CI_Model
{
    function select()
    {
        return $this->db->get('tb_outlet')->result_array();
    }


    function selectkaryawan()
    {
        $result = $this->db->get('tb_karyawan');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }

    function profile()
    {
        $result = $this->db->get('tb_outlet');
        if ($result->num_rows() > 0)
            return $result->result()[0];
        else
            return $result->result();
    }

    public function
    generate_kode_outlet()
    {
        $this->db->select('RIGHT(tb_outlet.id_outlet,3) as kode', false);
        $this->db->order_by('id_outlet', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_outlet');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "ENL-" . $kodemax;
        return $kodejadi;
    }

    public function edit($id)
    {
        $this->db->select('*');
        $this->db->from('tb_outlet');
        $this->db->where('id_outlet', $id);
        return $this->db->get()->row_array();
    }

    function hapus($id_outlet)
    {
        $this->db->where('id_outlet', $id_outlet);
        if ($this->db->delete('tb_outlet'))
            return true;
        else
            return false;
    }
}
