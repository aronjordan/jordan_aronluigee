<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

/**
 * Controller: StudentsController
 * 
 * Automatically generated via CLI.
 */
class StudentsController extends Controller {
    public function __construct()
    {
        parent::__construct();
        $this->call->database();
        $this->call->model('StudentsModel');
        

    }

    function test(){
        if($this->db){
            echo "good";
        }
    }
    function get_all(){

    $students = $this->StudentsModel->all();   // fetch from model
    $this->call->view('getall', ['students' => $students]);
   
    
}


    function create(){
    if($this->io->method() == 'post') {
        $first_name = $this->io->post('firstname');
        $last_name = $this->io->post('lastname');
        $email = $this->io->post('email');
        $students = array(
            'first_name' => $first_name,
            'last_name' => $last_name,
            'email' => $email
        );
        if($this->StudentsModel->insert($students)){
            redirect('/');
        } 
    } else {
            $this->call->view('create');
        }
    
       
    





       
    }

    function update($id){
        $user = $this->StudentsModel->find($id);
        if($this->io->method() == 'post') {
            $first_name = $this->io->post('firstname');
            $last_name = $this->io->post('lastname');
            $email = $this->io->post('email');
            $students = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'email' => $email
            );
            if($this->StudentsModel->update($id, $students)){
                redirect('/');
            } 
        } else {
                $students['user'] = $user;
                $this->call->view('update', ['user' => $user]);
            }
    }

    function delete($id){
        if($this->StudentsModel->delete($id)){
            redirect('/');
        } else {
            echo "Failed to delete record.";
        }
    }


}