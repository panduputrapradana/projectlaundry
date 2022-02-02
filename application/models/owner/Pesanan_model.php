<?php

class Pesanan_model extends CI_Model
{
    function select()
    {
        $result = $this->db->get('tb_transaksi');
        if ($result->num_rows() > 0)
            return $result->result();
        else
            return $result->result();
    }

    public function
    getHargaPaket($id_paket)
    {
        $this->db->where('id_paket', $id_paket);
        return $this->db->get('tb_paket')->row_array();
    }

    public function
    generate_kode_pesanan()
    {
        $this->db->select('RIGHT(tb_transaksi.id,3) as kode', false);
        $this->db->order_by('id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('tb_transaksi');
        if ($query->num_rows() > 0) {
            $data = $query->row();
            $kode = intval($data->kode) + 1;
        } else {
            $kode = 1;
        }

        $kodemax =
            str_pad($kode, 6, "0", STR_PAD_LEFT);
        $kodejadi = "SSH-" . $kodemax;
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
        $this->db->from('tb_transaksi');
        $this->db->join('tb_paket', 'tb_transaksi.id_paket = tb_paket.id_paket');
        $this->db->where('id', $id);
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
    function hapus($id)
    {
        $this->db->where('id', $id);
        if ($this->db->delete('tb_transaksi'))
            return true;
        else
            return false;
    }

    public function
    getAllTransaksi()
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->order_by('id', 'desc');
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
        $this->db->join('tb_outlet', 'tb_transaksi.id_outlet = tb_outlet.id_outlet');
        $this->db->join('tb_paket', 'tb_transaksi.id_paket = tb_paket.id_paket');
        return $this->db->get()->result();
    }

    public function
    update_status($id, $status)
    {
        $this->db->set('status', $status);
        $this->db->where('id', $id);
        $this->db->update('tb_transaksi');
    }

    public function
    update_status1($id, $status, $tgl_ambil, $dibayar)
    {
        $this->db->set('status', $status);
        $this->db->set('tgl_ambil', $tgl_ambil);
        $this->db->set('dibayar', $dibayar);
        $this->db->where('id', $id);
        $this->db->update('tb_transaksi');
    }

    public function detail($id)
    {
        $this->db->select('*');
        $this->db->from('tb_transaksi');
        $this->db->join('tb_member', 'tb_transaksi.id_member = tb_member.id_member');
        $this->db->join('tb_outlet', 'tb_transaksi.id_outlet = tb_outlet.id_outlet');
        $this->db->join('tb_paket', 'tb_transaksi.id_paket = tb_paket.id_paket');
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
}

/* End of file ModelName.php */
