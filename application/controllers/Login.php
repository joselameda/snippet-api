<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

    }

    public function index()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $this->User_model->get_login($email, $password);
        if(!$user){
            echo json_encode(['error' => 'Authentication failed!']);exit;
        }
        $this->session->set_userdata('id_user', $user->id);
        $response = [
            "data" => true
        ];
        echo json_encode($response);
    }

    public function logout()
    {
        $this->session->unset_userdata('id_user');
        echo json_encode(["data" => true]);
    }

    public function is_logged()
    {
        $id_user = $this->session->userdata('id_user');
        if($id_user){
            $response = [
                "data" => true
            ];
        }else{
            $response = [
                "data" => false
            ];            
        }
        echo json_encode($response);
    }
}