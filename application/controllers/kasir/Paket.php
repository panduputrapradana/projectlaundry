<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Paket extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Admin/Paket_model', 'PaketModel');
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }


    public function index()
    {
        $data['paket'] = $this->PaketModel->select();
        $data['namakaryawan'] = $this->PaketModel->selectkaryawan();
        $this->load->view('kasir/paket', $data);
        $this->load->view('admin/template/footer');
    }

    public function tambah_paket()
    {
        $data['paket'] = $this->PaketModel->select();
        $data['id_paket'] = $this->PaketModel->generate_kode_paket();
        $data['namakaryawan'] = $this->PaketModel->selectkaryawan();
        $this->load->view('kasir/tambah_paket', $data);
        $this->load->view('admin/template/footer');
    }

    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id_paket', 'Id_Paket', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_paket', 'Nama_Paket', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama Paket wajib diisi!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|min_length[3]|max_length[255]', [
            'required' => 'Masukkan Harga!',
            'min_length' => 'Masukkan Harga minimal 500!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['paket'] = $this->PaketModel->select();
            $data['id_paket'] = $this->PaketModel->generate_kode_paket();
            $data['namakaryawan'] = $this->PaketModel->selectkaryawan();
            $this->load->library('form_validation');
            $this->load->view('kasir/tambah_paket', $data);
        } else {

            $id_paket = $this->input->post('id_paket');
            $nama_paket = $this->input->post('nama_paket');
            $harga = $this->input->post('harga');

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

            $paket = array(
                'id_paket' => $id_paket,
                'nama_paket' => $nama_paket,
                'harga' => $harga

            );
            $this->db->insert('tb_paket', $paket);


            $this->session->set_flashdata('paket', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('kasir/paket');
        }
    }

    public function edit($id)
    {
        $data['namakaryawan'] = $this->PaketModel->selectkaryawan();
        $data['paket'] = $this->PaketModel->edit($id);
        $this->load->view('kasir/edit_paket', $data);
        $this->load->view('admin/template/footer');
    }


    public function simpan_edit()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('id_paket', 'Id_Paket', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('nama_paket', 'Nama_Paket', 'required|trim|min_length[1]|max_length[255]', [
            'required' => 'Nama Paket wajib diisi!'
        ]);
        $this->form_validation->set_rules('harga', 'Harga', 'required|trim|min_length[3]|max_length[255]', [
            'required' => 'Masukkan Harga!',
            'min_length' => 'Masukkan Harga minimal 500!'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->library('form_validation');
            $this->load->view('kasir/edit_paket');
        } else {

            $id_paket = $this->input->post('id_paket');
            $nama_paket = $this->input->post('nama_paket');
            $harga = $this->input->post('harga');

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


            $paket = array(
                'nama_paket' => $nama_paket,
                'harga' => $harga

            );
            $this->db->update('tb_paket', $paket, [
                'id_paket' => $id_paket,
            ]);

            $this->session->set_flashdata('paketE', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('kasir/paket');
        }
    }

    public function hapus($id_paket)
    {
        if ($this->PaketModel->hapus($id_paket))
            $this->session->set_flashdata('paketH', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('paketH', '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert"> Data telah gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('kasir/paket');
    }
}

/* End of file Controllername.php */
