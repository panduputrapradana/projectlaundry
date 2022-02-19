<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Profil extends CI_Controller
{


    public function __construct()
    {
        parent::__construct();
        $this->load->model('admin/Profil_model', 'ProfilModel');
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }


    public function index()
    {
        $data['profil']   = $this->ProfilModel->select();
        $data['karyawan'] = $this->ProfilModel->selectkaryawan();
        $this->load->view('admin/profil', $data);
        $this->load->view('admin/template/footer');
    }
    function tambah_profil()
    {
        $data['karyawan'] = $this->ProfilModel->selectkaryawan();
        $data['id_outlet'] = $this->ProfilModel->generate_kode_outlet();
        $data['profil']   = $this->ProfilModel->select();
        $this->load->view('admin/tambah_profil', $data);
        $this->load->view('admin/template/footer');
    }
    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_outlet', 'Id_Outlet', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_outlet', 'Nama_Outlet', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]|max_length[255]', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|min_length[9]|max_length[14]', [
            'required' => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['karyawan'] = $this->ProfilModel->selectkaryawan();
            $data['id_outlet'] = $this->ProfilModel->generate_kode_outlet();
            $data['profil']   = $this->ProfilModel->select();
            $this->load->library('form_validation');
            $this->load->view('admin/tambah_profil', $data);
        } else {

            $id_outlet = $this->input->post('id_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $tlp = $this->input->post('tlp');

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

            $outlet = array(
                'id_outlet' => $id_outlet,
                'nama_outlet' => $nama_outlet,
                'alamat' => $alamat,
                'tlp' => $tlp

            );
            $this->db->insert('tb_outlet', $outlet);

            $this->session->set_flashdata('pesan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Outlet telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/profil');
        }
    }

    public function edit($id)
    {
        $data['karyawan'] = $this->ProfilModel->selectkaryawan();
        $data['id_outlet'] = $this->ProfilModel->generate_kode_outlet();
        $data['profil'] = $this->ProfilModel->edit($id);
        $this->load->view('admin/edit_profil', $data);
        $this->load->view('admin/template/footer');
    }

    public function simpan_edit()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_outlet', 'Id_Outlet', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_outlet', 'Nama_Outlet', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]|max_length[255]', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|min_length[9]|max_length[14]', [
            'required' => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['karyawan'] = $this->ProfilModel->selectkaryawan();
            $data['id_outlet'] = $this->ProfilModel->generate_kode_outlet();
            $data['profile']   = $this->ProfilModel->profile();
            $this->load->library('form_validation');
            $this->load->view('admin/edit_profil', $data);
        } else {

            $id_outlet = $this->input->post('id_outlet');
            $nama_outlet = $this->input->post('nama_outlet');
            $alamat = $this->input->post('alamat');
            $tlp = $this->input->post('tlp');

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

            $outlet = array(
                'nama_outlet' => $nama_outlet,
                'alamat' => $alamat,
                'tlp' => $tlp

            );
            $this->db->update('tb_outlet', $outlet, [
                'id_outlet' => $id_outlet,
            ]);

            $this->session->set_flashdata('epesan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Outlet telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/profil');
        }
    }

    public function hapus($id_outlet)
    {
        if ($this->ProfilModel->hapus($id_outlet))
            $this->session->set_flashdata('outletH', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Outlet telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('outletH', '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert"> Outlet gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/profil');
    }
}

/* End of file Profile.php */
