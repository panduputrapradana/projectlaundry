<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Beranda extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        date_default_timezone_set('Asia/Jakarta');

        $this->load->model('m_data');

        // Cek session yang login,
        // jika session status tidak sama dengan session telahlogin, berarti pengguna belum login
        // maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $title['title'] = ['header' => 'Home', 'dash' => 'Home'];
        $data['data'] = $this->m_data->select();
        $data['karyawan'] = $this->m_data->selectkaryawan();
        $data['total_karyawan'] = $this->m_data->total_karyawan();
        $data['total_pelanggan'] = $this->m_data->total_pelanggan();
        $data['total_pesanan'] = $this->m_data->total_pesanan();
        $data['total_pesanan_baru'] = $this->m_data->total_pesanan_baru();
        $this->load->view('owner/dashboard', $data);
        $this->load->view('owner/template/footer');
    }


    public function profil()
    {
        $title['title'] = ['header' => 'Home', 'dash' => 'Home'];
        $data['data'] = $this->m_data->select();
        $this->load->view('admin/profil', $data);
    }

    public function keluar()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('pesan', 'Logout berhasil, success');
        redirect('login?alert=logout');
    }


    // END CRUD MEMBER   
}
