<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['form_validation', 'session']);
        $this->load->helper(['url', 'form']);
        $this->load->model('User_Model');
        $this->load->model('Donation_Model');



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
        $this->load->model('User_Model');


        if ($supporter_id == null) {
            $data['recipients'] = $this->Donation_Model->get_all();
            echo "no id";
            // show all recipient
        } else {
            // show recipient by id
            $data['recipients'] = $this->Donation_Model->get_by_user_id($supporter_id);
            $data['supporterId'] = $supporter_id;
            $data['supporter'] = $this->User_Model->get_by_id($supporter_id);
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

    public function add_recipients($supporter_id, $id = null)
    {

        $this->load->model('Donation_model');
        if ($id == null) {
            // add
            $data["data"] = array("create" => TRUE, "recipient" => null, "userId" => $supporter_id);
        } else {
            // update
            $data["data"] = array("create" => FALSE, "recipient" => $this->Donation_model->get_by_id($id), "userId" => $supporter_id);
        }
        // var_dump($data);
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

    public function add_update_recipient($recipient_id = null)
    {
        $this->load->model('Donation_Model');
        // studentName, standard, schoolName, location, userId
        var_dump($recipient_id, $this->input->post());

        //  photoUrl
        if ($recipient_id == null) {
            // create
            if ($this->Donation_Model->add($this->input->post())) {
                echo "Record Inserted";
            } else {
                echo "Record Insertion Failed";
            }
        } else {
            // update
            if ($this->Donation_Model->update($recipient_id, $this->input->post())) {
                echo "Record Updated";
            } else {
                echo "Record Updation Failed";
            }
        }

        redirect("admin/recipients/" . $this->input->post("userId"));
    }
    public function add_update_supporter($supporter_id = null)
    {
        var_dump($supporter_id, $this->input->post());
        $this->load->model('User_Model');
        if ($supporter_id == null) {
            // create
            if ($this->User_Model->add($this->input->post())) {
                echo "Record Inserted";
            } else {
                echo "Record Insertion Failed";
            }
        } else {
            // update
            if ($this->User_Model->update($supporter_id, $this->input->post())) {
                echo "Record Updated";
            } else {
                echo "Record Updation Failed";
            }
        }

        redirect("admin/supporters");
    }
    public function delete_recipient($supporter_id, $recipient_id)
    {

        $this->load->model('Donation_Model');

        if ($this->Donation_Model->delete($recipient_id)) {
            echo "record deleted";
        } else {
            echo "record deletion failed";
        }



        redirect("admin/recipients/" . $supporter_id);
    }

    public function delete_supporter($supporter_id)
    {

        $this->load->model('User_Model');

        if ($this->User_Model->delete($supporter_id)) {
            echo "record deleted";
        } else {
            echo "record deletion failed";
        }
        
        redirect("admin/supporters");
    }
}
