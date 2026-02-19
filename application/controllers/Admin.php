<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin  extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->library(['form_validation', 'session']);
        $this->load->model('User_Model');
        $this->load->model('Donation_Model');
        $this->load->helper(array('form', 'url'));
        $this->load->helper("my_upload_helper");

        $method = $this->router->fetch_method();
        $public_methods = ['index', 'login_submit'];
        if (!$this->session->userdata('logged_in') && !in_array($method, $public_methods)) {
            redirect('admin');
        }
    }

    // Pages
    public function index()
    {
        if ($this->session->userdata('logged_in')) {
        redirect("admin/supporters");
        }
        $this->load->view('base/base');
        $this->load->view('admin/admin-login');
    }

    public function supporters()
    {
        $this->load->model('User_Model');

        $data['supporters'] = $this->User_Model->get_all_users();
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
        $this->load->model('User_Model');
        if ($id == null) {
            // add
            $data["data"] = array("create" => TRUE, "supporter" => null);
        } else {
            // update
            $data["data"] = array("create" => FALSE, "supporter" => $this->User_Model->get_by_id($id));
        }
        $this->load->view('base/base');

        $this->load->view('admin/add-supporters', $data);
    }

    public function add_recipients($supporter_id, $id = null)
    {

        $this->load->model('Donation_Model');
        $this->load->model('User_Model');
        if ($id == null) {
            // add
            $data["data"] = array("create" => TRUE, "recipient" => null, "userId" => $supporter_id, "user_info" => $this->User_Model->get_by_id($supporter_id));
        } else {
            // update
            $data["data"] = array("create" => FALSE, "recipient" => $this->Donation_Model->get_by_id($id), "userId" => $supporter_id, "user_info" => $this->User_Model->get_by_id($supporter_id));
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
            $this->session->set_flashdata("error", "Please Enter All Fields");
        } else {
            if ($this->input->post('username') == "admin" && $this->input->post('password') == "admin") {
                $user_data = [
                    'username' => $this->input->post('username'),
                    'password' => $this->input->post('password'),
                    'logged_in' => TRUE,
                ];
                $this->session->set_userdata($user_data);
                redirect('admin/supporters');
                return;
            } else {
                $this->session->set_flashdata("error", "Invalid Username or Password");
                echo "Login Fail, invalid password";
            }
        }
        redirect('admin/');
    }

    public function add_update_recipient($recipient_id = null)
    {
        $this->load->model('Donation_Model');

        // Get all POST data from the form
        $data = $this->input->post();
        $is_update = ($recipient_id !== null);

        // --- Step 1: Handle the file upload if a new photo is provided ---
        $new_photo_path = null;
        // Check if a file was actually submitted and there are no upload errors
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] === UPLOAD_ERR_OK) {
            $unique_filename = str_replace(".", "", microtime(true));
            $upload_path = './assets/images/';

            $upload_data = do_custom_upload($upload_path, "photo", $unique_filename);

            if (isset($upload_data['error'])) {
                // On failure, set an error message and redirect back
                $this->session->set_flashdata('error', 'There was an error uploading the photo: ' . $upload_data['error']);
                redirect("admin/recipients/" . $data['userId']);
                return; // Stop execution
            }

            // On success, store the full filename for database update
            $new_photo_path = $unique_filename . $upload_data['file_ext'];
            $data['photoUrl'] = $new_photo_path;
        }

        // --- Step 2: Perform the Database Operation (Create or Update) ---
        if (!$is_update) {
            // --- This is a CREATE operation ---
            if ($this->Donation_Model->add($data)) {
                $this->session->set_flashdata('success', 'Recipient added successfully!');
            } else {
                $this->session->set_flashdata('error', 'Error adding recipient to the database.');
            }
        } else {
            // --- This is an UPDATE operation ---
            $old_photo_name = null;

            // If a new photo was successfully uploaded, get the old photo name for deletion later
            if ($new_photo_path !== null) {
                $current_recipient = $this->Donation_Model->get_by_id($recipient_id);
                if (!empty($current_recipient) && !empty($current_recipient[0]["photoUrl"])) {
                    $old_photo_name = $current_recipient[0]["photoUrl"];
                }
            }

            if ($this->Donation_Model->update($recipient_id, $data)) {
                $this->session->set_flashdata('success', 'Recipient updated successfully!');
                // After a successful DB update, delete the old photo if a new one was uploaded
                if ($old_photo_name !== null) {
                    delete_image($upload_path, $old_photo_name);
                }
            } else {
                $this->session->set_flashdata('error', 'Error updating recipient in the database.');
            }
        }

        // --- Step 3: Redirect the user ---
        redirect("admin/recipients/" . $data['userId']);
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

        // Define the path where recipient photos are stored.
        $upload_path = './assets/images/';

        // --- Step 1: Fetch recipient data to get the photo filename BEFORE deleting ---
        $recipient = $this->Donation_Model->get_by_id($recipient_id);

        // --- Step 2: Check if the recipient exists ---
        if (empty($recipient)) {
            $this->session->set_flashdata('error', 'Recipient not found.');
            redirect("admin/recipients/" . $supporter_id);
            return; // Stop execution
        }

        // Store the photo name from the fetched data
        $photo_to_delete = $recipient[0]["photoUrl"];

        // --- Step 3: Attempt to delete the recipient from the database ---
        if ($this->Donation_Model->delete($recipient_id)) {
            // SUCCESS: The database record was deleted.
            $this->session->set_flashdata('success', 'Recipient has been deleted successfully.');

            // Now, delete the associated photo file, if it exists.
            if (!empty($photo_to_delete)) {
                // Assumes delete_image() is a helper function that safely handles file deletion.
                delete_image($upload_path, $photo_to_delete);
            }
        } else {
            // FAILURE: The database record could not be deleted.
            $this->session->set_flashdata('error', 'Failed to delete the recipient.');
        }

        // --- Step 4: Redirect the user back to the recipients list ---
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
