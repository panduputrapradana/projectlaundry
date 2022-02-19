<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_data');
    }

    public function index()
    {
        $data['data']   = $this->m_data->select();
        $this->load->view('login/Form_login', $data);
    }

    public function ceklogin()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if ($this->form_validation->run() != false) {

            // Menangkap data username dan password dari halaman login
            $username = $this->input->post('email');
            $password = $this->input->post('password');

            $where = array(
                'username' => $username,
                'password' => md5($password)
            );
            $this->load->model('m_data');

            // Cek kesesuaian login pada table pengguna
            $cek = $this->m_data->cek_login('tb_user', $where)->num_rows();

            // Cek jika Login benar
            if ($cek > 0) {

                // ambil data penggunna yang melakukan login
                $data = $this->m_data->cek_login('tb_user', $where)->row();
                $role = $data->role;
                if ($role == 'Admin') {
                    // buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id'       => $data->id_user,
                        'username' => $data->username,
                        'role'     => $data->role,
                        'status'   => 'telah_login'
                    );

                    $this->session->set_userdata($data_session);


                    // alihkan halaman ke halaman dashboard pengguna yang berasil login

                    redirect(base_url('admin/beranda'));
                } elseif ($role == 'Kasir') {
                    // Buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id'       => $data->id_user,
                        'username' => $data->username,
                        'role'     => $data->role,
                        'status'   => 'telah_login'
                    );
                    $this->session->set_userdata($data_session);

                    // alihkan halaman ke halaman dashboard pengguna (kasir)
                    redirect(base_url('kasir/beranda'));
                } elseif ($role == 'Member') {
                    // buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id'       => $data->id_user,
                        'username' => $data->username,
                        'role'     => $data->role,
                        'status'   => 'telah_login'
                    );
                    $this->session->set_userdata($data_session);

                    // alihkan halaman ke halaman dashboard (owner)
                    redirect(base_url('member/beranda'));
                } elseif ($role == 'Owner') {
                    // buat session untuk pengguna yang berhasil login
                    $data_session = array(
                        'id'       => $data->id_user,
                        'username' => $data->username,
                        'role'     => $data->role,
                        'status'   => 'telah_login'
                    );
                    $this->session->set_userdata($data_session);

                    // alihkan halaman ke halaman dashboard (owner)
                    redirect(base_url('owner/Beranda'));
                }
            } else {
                $this->session->set_flashdata('pesan', 'Email & Password tidak sesuai, error');
                redirect(base_url() . 'login?alert=gagal');
            }
        } else {
            $this->load->view('login/Form_login');
        }
    }

    public function landing()
    {
        $data['paket']           = $this->m_data->selectpaket();
        $data['data']            = $this->m_data->select();
        $data['total_karyawan']  = $this->m_data->total_karyawan();
        $data['total_pelanggan'] = $this->m_data->total_pelanggan();
        $data['total_pesanan']   = $this->m_data->total_pesanan();
        $data['total_outlet']    = $this->m_data->total_outlet();
        $this->load->view('login/landing', $data);
    }



    public function registrasi()
    {
        $data['idmember']   = $this->m_data->generate_kode_member();
        $data['id_user']    = $this->m_data->generate_kode_user();
        $data['namamember'] = $this->m_data->selectmember();
        $data['data']       = $this->m_data->select();
        $this->load->view('login/Form_register', $data);
    }


    public function register()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_member', 'Id_Member', 'required|trim|min_length[1]|max_length[255]', [
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
            $data['idmember'] = $this->m_data->generate_kode_member();
            $data['id_user'] = $this->m_data->generate_kode_user();
            $data['namamember'] = $this->m_data->selectmember();
            $this->load->library('form_validation');
            $this->load->view('login/Form_register', $data);
        } else {

            $id_member = $this->input->post('id_member');
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

            $data = array(
                'id_member' => $id_member,
                'nama' => $nama,
                'alamat' => $alamat,
                'jenis_kelamin' => $jenis_kelamin,
                'tlp' => $tlp,
                'foto' => $foto,
                'id_user' => $id_user,

            );
            $this->db->insert('tb_member', $data);

            $this->session->set_flashdata('pesan', 'Registrasi berhasil Silahkan Login, success');
            redirect(base_url('login'));
        }
    }
}
