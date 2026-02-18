<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);



        $method = $this->router->fetch_method();
        $public_methods = ['index', 'login_submit'];
        if (!$this->session->userdata('logged_in') && !in_array($method, $public_methods)) {
            redirect('admin');
        }
    }

    // Pages
    public function index()
    {
        $this->load->view('base/base');
        $this->load->view('admin/admin-login');
    }

    public function supporters()
    {
        $this->load->model('User_model');

        $data['supporters'] = $this->User_model->get_all_users();
        // var_dump($data);


        $this->load->view('base/base');
        $this->load->view('admin/supporters', $data);
    }
    public function recipients($supporter_id = null)
    {
        $this->load->model('Donation_Model');


        if ($supporter_id == null) {
            $data['recipients'] = $this->Donation_Model->get_all();
            // show all recipient
        } else {
            // show recipient by id
            $data['recipients'] = $this->Donation_Model->get_by_user_id($supporter_id);
        }
        $this->load->view('base/base');

        $this->load->view('admin/recipients', $data);
    }


    public function add_supporters($id = null)
    {
        $this->load->model('User_model');
        if ($id == null) {
            // add
            $data["data"] = array("create" => TRUE, "supporter" => null);
        } else {
            // update
            $data["data"] = array("create" => FALSE, "supporter" => $this->User_model->get_by_id($id));
        }
        $this->load->view('base/base');

        $this->load->view('admin/add-supporters', $data);
    }

    public function add_recipients($id = null)
    {

        $this->load->model('Donation_model');
        if ($id == null) {
            // add
            $data["data"] = array("create" => TRUE, "supporter" => null);
        } else {
            // update
            $data["data"] = array("create" => FALSE, "supporter" => $this->Donation_model->get_by_id($id));
        }
        $this->load->view('base/base');

        $this->load->view('admin/add-recipients', $data);
    }

    // Functions
    public function login_submit()
    {
        // $this->session->dele 
        // Set validation rules
        $this->form_validation->set_rules('username', 'Username', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');

        if (($this->form_validation->run() == FALSE)) {
            echo "Login Fail";
        } else {
            $user_data = [
                'username' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'logged_in' => TRUE,
            ];
            $this->session->set_userdata($user_data);
            redirect('admin/supporters');
        }
    }
}
