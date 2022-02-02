<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        date_default_timezone_set('Asia/Jakarta');
        $this->load->model('Member/Pesanan_model', 'PesananModel');
        if ($this->session->userdata('status') != "telah_login") {
            $this->session->set_flashdata('pesan', 'Anda Harus Login Terlebih Dahulu, error');
            redirect(base_url() . 'login?alert=belum_login');
        }
    }


    public function index()
    {
        $data['pesanan'] = $this->PesananModel->select();
        $data['id_pesanan'] = $this->PesananModel->generate_kode_pesanan();
        $data['namakaryawan'] = $this->PesananModel->selectkaryawan();
        $data['pelanggan'] = $this->db->get('tb_member')->result();
        $data['paket'] = $this->db->get('tb_paket')->result();
        $data['outlet'] = $this->db->get('tb_outlet')->result();
        $this->load->view('member/pesanan', $data);
        $this->load->view('admin/template/footer');
    }

    public function getHargaPaket()
    {
        $id_paket = $this->input->post('id_paket');
        $data = $this->PesananModel->getHargaPaket($id_paket);
        echo json_encode($data);
    }


    public function simpan()
    {
        $this->load->library('form_validation', 'upload');

        $this->form_validation->set_rules('id', 'Id', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('id_member', 'Id_Member', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('id_paket', 'Id_Paket', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('id_outlet', 'Id_Outlet', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('tgl_masuk', 'Tgl_Masuk', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('total', 'Total', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('status', 'Status', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('dibayar', 'Dibayar', 'required|trim', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);

        if ($this->form_validation->run() == false) {
            $data['pesanan'] = $this->PesananModel->select();
            $data['id_pesanan'] = $this->PesananModel->generate_kode_pesanan();
            $data['namakaryawan'] = $this->PesananModel->selectkaryawan();
            $data['pelanggan'] = $this->db->get('tb_member')->result();
            $data['paket'] = $this->db->get('tb_paket')->result();
            $data['outlet'] = $this->db->get('tb_outlet')->result();
            $this->load->library('form_validation');
            $this->load->view('member/pesanan', $data);
            $this->session->set_flashdata('gpesanan', '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert"> Pesanan gagal ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('admin/pesanan');
        } else {

            $id = $this->input->post('id');
            $id_member = $this->input->post('id_member');
            $id_paket = $this->input->post('id_paket');
            $id_outlet = $this->input->post('id_outlet');
            $tgl_masuk = $this->input->post('tgl_masuk');
            $tgl_ambil = '';
            $jumlah = $this->input->post('jumlah');
            $total = $this->input->post('total');
            $status = $this->input->post('status');
            $dibayar = $this->input->post('dibayar');

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

            $transaksi = array(
                'id' => $id,
                'id_member' => $id_member,
                'id_paket' => $id_paket,
                'id_outlet' => $id_outlet,
                'tgl_masuk' => $tgl_masuk,
                'tgl_ambil' => $tgl_ambil,
                'jumlah' => $jumlah,
                'total' => $total,
                'status' => $status,
                'dibayar' => $dibayar,

            );
            $this->db->insert('tb_transaksi', $transaksi);

            $this->session->set_flashdata('pesanan', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Pesanan telah ditambahkan! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('member/pesanan');
        }
    }

    public function transaksi()
    {
        $data['paket'] = $this->PesananModel->select();
        $data['namakaryawan'] = $this->PesananModel->selectkaryawan();
        $data['transaksi'] = $this->PesananModel->getAllTransaksi();
        $this->load->view('member/transaksi', $data);
        $this->load->view('admin/template/footer');
    }

    public function update_status()
    {
        $id = $this->input->post('id');
        $status = $this->input->post('stt');
        $tgl_ambil = date('Y-m-d h:i:s');
        $dibayar = 'dibayar';
        if ($status == "baru" or $status == "proses" or $status == "selesai") {
            $this->PesananModel->update_status($id, $status);
        } else {
            $this->PesananModel->update_status1($id, $status, $tgl_ambil, $dibayar);
        }
    }

    public function edit($id)
    {
        $data['pesanan'] = $this->PesananModel->select();
        $data['transaksi'] = $this->PesananModel->edit($id);
        $data['namakaryawan'] = $this->PesananModel->selectkaryawan();
        $data['pelanggan'] = $this->db->get('tb_member')->result();
        $data['paket'] = $this->db->get('tb_paket')->result();
        $data['outlet'] = $this->db->get('tb_outlet')->result();
        $this->load->view('member/edit_transaksi', $data);
        $this->load->view('admin/template/footer');
    }


    public function simpan_edit()
    {
        $this->load->library('form_validation');


        $this->form_validation->set_rules('id', 'Id', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('id_paket', 'Id_Paket', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('jumlah', 'Jumlah', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('total', 'Total', 'required|trim', [
            'required' => 'Nama lengkap wajib diisi!'
        ]);
        $this->form_validation->set_rules('dibayar', 'Dibayar', 'required|trim', [
            'required' => 'Alamat wajib diisi!',
            'min_length' => 'Masukkan alamat lengkap!'
        ]);
        if ($this->form_validation->run() == false) {
            $data['pesanan'] = $this->PesananModel->select();
            $data['namakaryawan'] = $this->PesananModel->selectkaryawan();
            $data['pelanggan'] = $this->db->get('tb_member')->result();
            $data['paket'] = $this->db->get('tb_paket')->result();
            $data['outlet'] = $this->db->get('tb_outlet')->result();
            $this->load->library('form_validation');
            $this->load->view('member/edit_transaksi', $data);
        } else {

            $id = $this->input->post('id');
            $id_paket = $this->input->post('id_paket');
            $jumlah = $this->input->post('jumlah');
            $total = $this->input->post('total');
            $dibayar = $this->input->post('dibayar');

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


            $transaksi = array(
                'id_paket' => $id_paket,
                'jumlah' => $jumlah,
                'total' => $total,
                'dibayar' => $dibayar,

            );
            $this->db->update('tb_transaksi', $transaksi, [
                'id' => $id
            ]);

            $this->session->set_flashdata('etransaksi', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Pesanan telah diedit! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
            redirect('member/pesanan/transaksi');
        }
    }

    public function hapus($id)
    {
        if ($this->PesananModel->hapus($id))
            $this->session->set_flashdata('transaksiH', '<div class="text-center alert alert-success alert-dismissible fade show" role="alert"> Data telah dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        else
            $this->session->set_flashdata('karyawanH', '<div class="text-center alert alert-danger alert-dismissible fade show" role="alert"> Data telah gagal dihapus! <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button></div>');
        redirect('member/pesanan/transaksi');
    }

    public function detail($id)
    {
        $this->load->library('dompdf_gen');
        $data['transaksi'] = $this->PesananModel->detail($id);
        $this->load->view('member/detail', $data);

        $paper_size = 'A5';
        $orientation = 'landscape';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);

        $this->dompdf->load_html($html);
        $this->dompdf->render();
        $this->dompdf->stream("Detail Transaksi.pdf", array('Attachment' => 0));
    }
}

/* End of file Controllername.php */
