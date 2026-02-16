<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->view('base/base');
    }

    public function index()
    {
        $this->load->view('admin/admin-login');
    }

    public function recipients()
    {
        $this->load->view('admin/recipients');
    }
    public function add_recipients($id = null)
    {
        $this->load->view('admin/add-recipients');
    }
    public function supporters()
    {
        $this->load->view('admin/supporters');
    }
    public function add_supporters($id = null)
    {
        $this->load->view('admin/add-supporters');
    }
}
