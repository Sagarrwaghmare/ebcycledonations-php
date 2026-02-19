<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        
        $this->load->model('User_Model');
        $this->load->model('Donation_Model');
        
    }

    public function index()
    {
        // $this->load->view('admin/admin-login');
    }

    public function supporter($supporter_id)
    {
        $this->load->view('base/base');
        $data["supporter"] = $this->User_Model->get_by_id($supporter_id); 
        $data["recipients"] = $this->Donation_Model->get_by_user_id($supporter_id);
        // var_dump($data['recipients']);
        $this->load->view('main/supporter',$data);
    }

    public function recipient($supporter_id,$recipient_id) {
        $this->load->view('base/base');
        
        $data["supporter"] = $this->User_Model->get_by_id($supporter_id); 
        $data["recipient"] = $this->Donation_Model->get_by_id($recipient_id);

        // var_dump($data);

        $this->load->view('main/recipient',$data);
    }
}
