<?php

class Laporan_model extends CI_Model
{
    function select()
    {
        $result = $this->db->get('tb_karyawan');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function
    filter_laporan($tgl_mulai, $tgl_akhir)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member', 'left');
        $this->db->join('tb_paket', 'tb_transaksi.id_paket = tb_paket.id_paket', 'left');
        $this->db->join('tb_outlet', 'tb_transaksi.id_outlet = tb_outlet.id_outlet', 'left');
        $this->db->where('tb_transaksi.tgl_masuk>=', $tgl_mulai);
        $this->db->where('tb_transaksi.tgl_masuk<=', $tgl_akhir);
        return $this->db->get()->result();
    }

    public function
    generate_kode_karyawan()
    {
        $this->db->select('RIGHT(tb_karyawan.id_karyawan,3) as kode', false);
        $this->db->order_by('id_karyawan', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_karyawan');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "KS" . $kodemax;
        return $kodejadi;
    }

    public function
    generate_kode_user()
    {
        $this->db->select('RIGHT(tb_user.id_user,3) as kode', false);
        $this->db->order_by('id_user', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_user');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 3, "0", STR_PAD_LEFT);
        $kodejadi = "USR" . $kodemax;
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
        $this->db->from('tb_karyawan');
        $this->db->where('id_karyawan', $id);
        return $this->db->get()->row_array();
    }

    public function edituser($id)
    {
        $this->db->select('*');
        $this->db->from('tb_user');
        $this->db->where('id_user', $id);
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
    function hapus($id_user)
    {
        $this->db->where('id_user', $id_user);
        if ($this->db->delete('tb_user'))
            return true;
        else
            return false;
    }
}
