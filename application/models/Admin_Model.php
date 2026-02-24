<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_Model extends CI_Model
{

    public function index()
    {
    }

    public function login_check($username, $password)
    {
        $this->db->where('username', $username);
        $this->db->where('password', $password); // NOTE: In a real app, use password_verify() with hashed passwords
        $query = $this->db->get('admin'); // Assuming your table name is 'admin'

        if ($query->num_rows() == 1) {
            return $query->row(); // Return user data
        } else {
            return false;
        }
    }
    public function get_all()
    {
        $query = $this->db->get('admin');
        return $query->result_array();
    }
    
    public function get_by_id($id)
    {
        $query = $this->db->get_where('admin', array('id' => $id));
        return $query->result_array();
    }

    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $this->db->delete('admin', $data);

        return TRUE;
    }

    public function add($data)
    {
        $this->db->insert('admin', $data);
        return TRUE;
    }
    public function update($id, $data)
    {
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('admin');

        return TRUE;
    }
}
