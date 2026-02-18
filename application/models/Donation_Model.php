<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class donation_Model extends CI_Model{

    public function index(){}

    public function get_all(){
        $query = $this->db->get('donation');
        return $query->result_array();
    }
    

    public function get_by_id($id)
    {
        $query = $this->db->get_where('donation', array('id' => $id));
        return $query->result_array();
    }

    public function get_by_user_id($id){
        $query = $this->db->get_where('donation',array('UserId'=>$id));
        return $query->result_array();
    }

    public function delete($id){
        $data = array(
            'id'=>$id
        );
        $this->db->delete('donation',$data);
    }

    public function add($name,$email){
        $data = array(
            'name'=>$name,
            'email'=>$email,
        );
        $this->db->insert('donation',$data);
    }
    public function update($id,$name){
        $array = array(
            'name' => $name,
        );
        $this->db->set($array);
        $this->db->where('id', $id);
        $this->db->update('donation');
    }

}
?>