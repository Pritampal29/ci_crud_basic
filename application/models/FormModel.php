<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormModel extends CI_Model{
    
    public function get_user(){
        $data = $this->db->get('users');
        return $data->result();
    }

    public function insert_data($form_data){
        $this->db->insert('users',$form_data);
    }

    public function single_view($id){
        return $this->db->where('id',$id)->get('users')->row();
    }

    public function update_data($id,$form_data){
        $this->db->where('id',$id)->update('users',$form_data);
    }

    public function delete_data($id){
        $this->db->where('id',$id)->delete('users');
    }
}