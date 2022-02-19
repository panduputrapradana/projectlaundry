<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pelanggan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Pelanggan_model', 'PelangganModel');
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }

    public function index()
    {
        $data['pelanggan'] = $this->PelangganModel->select();
        $data['namakaryawan'] = $this->PelangganModel->selectkaryawan();
        $this->load->view('kasir/pelanggan', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_pelanggan()
    {
        $data['pelanggan'] = $this->PelangganModel->select();
        $data['id_member'] = $this->PelangganModel->generate_kode_karyawan();
        $data['id_user'] = $this->PelangganModel->generate_kode_user();
        $data['namakaryawan'] = $this->PelangganModel->selectkaryawan();
        $this->load->view('kasir/tambah_pelanggan', $data);
        $this->load->view('admin/template/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_pelanggan', 'Id_Pelanggan', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]|max_length[255]', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|min_length[9]|max_length[14]', [
            'required' => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[1]|max_length[255]|is_unique[tb_user.username]', [
            'is_unique' => 'Email sudah terdaftar!',
            'required' => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[20]|matches[password2]', [
            'matches' => 'Password tidak sama!',
            'required' => 'Harap Masukkan Password!',
            'min_length' => 'Masukkan password minimal 5 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['pelanggan'] = $this->PelangganModel->select();
            $data['id_member'] = $this->PelangganModel->generate_kode_karyawan();
            $data['id_user'] = $this->PelangganModel->generate_kode_user();
            $data['namakaryawan'] = $this->PelangganModel->selectkaryawan();
            $this->load->library('form_validation');
            $this->load->view('kasir/tambah_pelanggan', $data);
        } else {

            $id_pelanggan = $this->input->post('id_pelanggan');
            $nama = $this->input->post('nama');
            $alamat = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tlp = $this->input->post('tlp');
            $id_user = $this->input->post('id_user');
            $username = $this->input->post('email');
            $foto = 'default.png';
            $password = md5($this->input->post('password'));
            $role = 'Member';

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

            $user = array(
                'id_user' => $id_user,
                'username' => $username,
                'password' => $password,
                'role' => $role,

            );
            $this->db->insert('tb_user', $user);

            $pelanggan = array(
                'id_member' => $id_pelanggan,
                'nama' => $nama,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tlp' => $tlp,
                'foto' => $foto,
                'id_user' => $id_user,

            );
            $this->db->insert('tb_member', $pelanggan);

            $this->session->set_flashdata('pelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('kasir/pelanggan');
        }
    }

    public function edit($id)
    {
        $data['namakaryawan'] = $this->PelangganModel->selectkaryawan();
        $data['pelanggan'] = $this->PelangganModel->edit($id);
        $this->load->view('kasir/edit_pelanggan', $data);
        $this->load->view('admin/template/footer');
    }


    public function simpan_edit()
    {
        $this->load->library('form_validation', 'upload');


        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
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
            $this->load->library('form_validation');
            $this->load->view('kasir/edit_pelanggan');
        } else {

            $id_pelanggan = $this->input->post('id_pelanggan');
            $nama = $this->input->post('nama');
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


            $pelanggan = array(
                'nama' => $nama,
                'alamat' => $alamat,
                'tlp' => $tlp,

            );
            $this->db->update('tb_member', $pelanggan, [
                'id_member' => $id_pelanggan,
            ]);

            $this->session->set_flashdata('epelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('kasir/pelanggan');
        }
    }

    public function hapus($id_user)
    {
        if ($this->PelangganModel->hapus($id_user))
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('hpelanggan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('kasir/pelanggan');
    }
}

/* End of file Controllername.php */
