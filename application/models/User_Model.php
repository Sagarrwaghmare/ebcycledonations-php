<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{

    public function index() {}

    public function get_all()
    {
        $query = $this->db->get('user');
        return $query->result_array();
    }
    public function get_all_users()
    {
        $this->db->select('user.*, COUNT(donation.userId) as total_donation');
        $this->db->from('user');
        $this->db->join('donation', 'donation.userId = user.id', 'left');
        $this->db->group_by('user.id');
        $query = $this->db->get();
        return $query->result_array();
    }

    public function get_by_username($username)
    {
        $query = $this->db->get_where('user', array('username' => $username));
        return $query->result_array();
    }

    public function get_by_id($id)
    {
        $query = $this->db->get_where('user', array('id' => $id));
        return $query->result_array();
    }

    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $this->db->delete('user', $data);
    }

    public function add($username, $email, $password)
    {
        $data = array(
            'username' => $username,
            'email' => $email,
            'password' => $password,
        );
        $this->db->insert('user', $data);
    }

    public function update($id, $name)
    {
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('user');
    }
}
