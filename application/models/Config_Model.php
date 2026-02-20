<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Config_Model extends CI_Model
{

    public function index() {}

    public function get_all()
    {
        $query = $this->db->get('config');
        return $query->result_array();
    }


    public function get_by_id($id)
    {
        $query = $this->db->get_where('config', array('id' => $id));
        return $query->result_array();
    }

    public function get_by_user_id($id)
    {
        $query = $this->db->get_where('config', array('UserId' => $id));
        return $query->result_array();
    }

    public function delete($id)
    {
        $data = array(
            'id' => $id
        );
        $this->db->delete('config', $data);

        return TRUE;
    }

    public function add($data)
    {
        $this->db->insert('config', $data);
        return TRUE;
    }
    public function update($id, $data)
    { 
        $this->db->set($data);
        $this->db->where('id', $id);
        $this->db->update('config');

        return TRUE;
    }
}
