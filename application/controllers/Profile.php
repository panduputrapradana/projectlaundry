<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('M_data');
    }

    public function index()
    {
        $title['title'] = ['header' => 'Home', 'dash' => 'Home'];
        $data['data'] = $this->Profile->select();
        $this->load->view('admin/dashboard', $data);
    }
}
