<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('base/base');
    }

    public function index()
    {
        // $this->load->view('admin/admin-login');
    }

    public function supporter()
    {
        $this->load->view('main/supporter');

    }

    public function recipient() {
        $this->load->view('main/recipient');
    }
}
