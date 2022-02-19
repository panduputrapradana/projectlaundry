<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Admin/Laporan_model', 'LaporanModel');

        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }


    public function index()
    {
        $data['karyawan']     = $this->LaporanModel->select();
        $data['namakaryawan'] = $this->LaporanModel->selectkaryawan();
        $this->load->view('admin/laporan', $data);
        $this->load->view('admin/template/footer');
    }

    public function cetak_laporan()
    {
        $this->load->library('dompdf_gen');
        $tgl_mulai = $this->input->post('tanggal_mulai');
        $tgl_akhir = $this->input->post('tanggal_akhir');
        $data['laporan'] = $this->LaporanModel->filter_laporan($tgl_mulai, $tgl_akhir);

        $this->session->set_userdata('tanggal_mulai', $tgl_mulai);

        $this->session->set_userdata('tanggal_akhir', $tgl_akhir);


        $this->load->view('admin/cetak_laporan', $data);

        $paper_size = 'A4';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Laporan Pencucian.pdf", array('Attachment' => 0));
    }

    public function tambah_karyawan()
    {
        $data['karyawan']     = $this->KaryawanModel->select();
        $data['id_karyawan']  = $this->KaryawanModel->generate_kode_karyawan();
        $data['id_user']      = $this->KaryawanModel->generate_kode_user();
        $data['namakaryawan'] = $this->KaryawanModel->selectkaryawan();
        $this->load->view('admin/tambah_karyawan', $data);
        $this->load->view('admin/template/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_karyawan', 'Id_Karyawan', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]|max_length[255]', [
            'required'   => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis_Kelamin', 'required');
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|min_length[9]|max_length[14]', [
            'required'   => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);
        $this->form_validation->set_rules('bagian', 'Bagian', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|min_length[1]|max_length[255]|is_unique[tb_user.username]', [
            'is_unique' => 'Email sudah terdaftar!',
            'required'  => 'Email wajib diisi!'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[5]|max_length[20]|matches[password2]', [
            'matches'    => 'Password tidak sama!',
            'required'   => 'Harap Masukkan Password!',
            'min_length' => 'Masukkan password minimal 5 karakter!'
        ]);
        $this->form_validation->set_rules('password2', 'Password2', 'required|trim|matches[password]');

        if ($this->form_validation->run() == false) {
            $data['karyawan']     = $this->KaryawanModel->select();
            $data['id_karyawan']  = $this->KaryawanModel->generate_kode_karyawan();
            $data['id_user']      = $this->KaryawanModel->generate_kode_user();
            $data['namakaryawan'] = $this->KaryawanModel->selectkaryawan();
            $this->load->library('form_validation');
            $this->load->view('admin/tambah_karyawan', $data);
        } else {

            $id_karyawan   = $this->input->post('id_karyawan');
            $nama          = $this->input->post('nama');
            $alamat        = $this->input->post('alamat');
            $jenis_kelamin = $this->input->post('jenis_kelamin');
            $tlp           = $this->input->post('tlp');
            $role          = $this->input->post('bagian');
            $id_user       = $this->input->post('id_user');
            $username      = $this->input->post('email');
            $foto          = 'default.png';
            $password      = md5($this->input->post('password'));

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
                'id_user'  => $id_user,
                'username' => $username,
                'password' => $password,
                'role'     => $role

            );
            $this->db->insert('tb_user', $user);

            $karyawan = array(
                'id_karyawan'   => $id_karyawan,
                'nama'          => $nama,
                'alamat'        => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tlp'           => $tlp,
                'foto'          => $foto,
                'role'          => $role,
                'id_user'       => $id_user,

            );
            $this->db->insert('tb_karyawan', $karyawan);

            $this->session->set_flashdata('karyawan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/karyawan');
        }
    }

    public function edit($id)
    {
        $data['namakaryawan'] = $this->KaryawanModel->selectkaryawan();
        $data['karyawan']     = $this->KaryawanModel->edit($id);
        $this->load->view('admin/edit_karyawan', $data);
        $this->load->view('admin/template/footer');
    }


    public function simpan_edit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_karyawan', 'Id_Karyawan', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('alamat', 'Alamat', 'required|trim|min_length[3]|max_length[255]', [
            'required'   => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        $this->form_validation->set_rules('tlp', 'Tlp', 'required|trim|min_length[9]|max_length[14]', [
            'required'   => 'No Telepon wajib diisi!',
            'min_length' => 'Masukkan No telepon aktif minimal 9 angka!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $this->load->view('admin/edit_karyawan');
        } else {

            $id_karyawan = $this->input->post('id_karyawan');
            $nama        = $this->input->post('nama');
            $alamat      = $this->input->post('alamat');
            $tlp         = $this->input->post('tlp');

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


            $karyawan = array(
                'nama'   => $nama,
                'alamat' => $alamat,
                'tlp'    => $tlp,

            );
            $this->db->update('tb_karyawan', $karyawan, [
                'id_karyawan' => $id_karyawan,
            ]);

            $this->session->set_flashdata('karyawanE', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/karyawan');
        }
    }

    public function hapus($id_user)
    {
        if ($this->KaryawanModel->hapus($id_user))
            $this->session->set_flashdata('karyawanH', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('karyawanH', '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert"> Data telah gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('admin/karyawan');
    }
}

/* End of file Controllername.php */
