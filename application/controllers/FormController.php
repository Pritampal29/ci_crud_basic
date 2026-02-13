<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class FormController extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        $this->load->model('formmodel');
    }

    public function index(){
        $data['users'] = $this->formmodel->get_user();
        return $this->load->view('dashboard',$data);
    }

    public function form_save(){
        $this->form_validation->set_rules('name','Name','required|trim');
        $this->form_validation->set_rules('email','Email','required|trim');
        $this->form_validation->set_rules('mobile','Mobile','required|trim');
        $this->form_validation->set_rules('gender','Gender','required|trim');
        $this->form_validation->set_rules('skills[]','Skills','required|trim');
        $this->form_validation->set_rules('role','Role','required|trim');

        if($this->form_validation->run()){
            $form_data['name'] = $this->input->post('name');
            $form_data['email'] = $this->input->post('email');
            $form_data['mobile'] = $this->input->post('mobile');
            $form_data['gender'] = $this->input->post('gender');
            $form_data['skills'] = implode(',',$this->input->post('skills'));
            $form_data['role'] = $this->input->post('role');  
            
            $id = $this->input->post('id');
            if(empty($id)){
                $this->formmodel->insert_data($form_data);
            }else{
                $this->formmodel->update_data($id,$form_data);
            }
            
            redirect('formcontroller');
        }else{
            $this->load->view('form');
        }
    }

    public function single_data($id){
        $data['users'] = $this->formmodel->single_view($id);
        $this->load->view('form',$data);
    }

    public function delete($id){
        $this->formmodel->delete_data($id);
        redirect('formcontroller');
    }
    
}