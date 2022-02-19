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
        $this->load->view('member/dashboard', $data);
        $this->load->view('admin/template/footer');
    }

    public function edit($id)
    {
        $title['title'] = ['header' => 'Home', 'dash' => 'Home'];
        $data['data'] = $this->m_data->edit($id);
        $data['karyawan'] = $this->m_data->selectkaryawan();
        $this->load->view('admin/edit_dashboard', $data);
        $this->load->view('admin/template/footer');
    }

    public function simpan_edit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_profil', 'Id_Profil', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('ig', 'Ig', 'required|trim', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('wa', 'Wa', 'required|trim', [
            'required' => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);
        $this->form_validation->set_rules('fb', 'Fb', 'required|trim', [
            'required' => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $title['title'] = ['header' => 'Home', 'dash' => 'Home'];
            $data['karyawan'] = $this->m_data->selectkaryawan();
            $this->load->library('form_validation');
            $this->load->view('admin/edit_dashboard', $data);
        } else {

            $id_profil = $this->input->post('id_profil');
            $nama = $this->input->post('nama');
            $ig = $this->input->post('ig');
            $wa = $this->input->post('wa');
            $fb = $this->input->post('fb');

            // $upload_foto = $_FILES['foto']['name'];

            // if ($upload_foto) {
            //     $config['upload_path']          = './upload/';
            //     $config['allowed_types']        = 'gif|jpg|png';
            //     $config['max_size']             = 10000;

            //     $this->load->library('upload', $config);

            //     if ($this->upload->do_upload('foto')) {
            //         echo $this->upload->display_errors();
            //     } else {
            //         $data = array('upload_data' => $this->upload->data());
            //     }
            // }


            $profil = array(
                'nama' => $nama,
                'ig' => $ig,
                'wa' => $wa,
                'fb' => $fb

            );
            $this->db->update('tb_profil', $profil, [
                'id_profil' => $id_profil,
            ]);

            $this->session->set_flashdata('profilE', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data profil diperbarui! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/beranda');
        }
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
