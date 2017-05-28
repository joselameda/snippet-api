<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');

    }

	//Read
	public function get($id=null)
	{
		$data = $this->User_model->get($id);
		if($data){
			$response = [
				"data" => $data
			];
		}else{
			$response = [
				"error" => "Not found"
			];
		}

		echo json_encode($response);exit;
	}

	//Create
	public function post(){
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//creo usuario
	}

	//Update
	public function put($id){
		if(!$id){
			//retorno error
		}
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		//Actualizo usuario
	}

	//Delete
	public function delete($id){
		if(!$id){
			//retorno error
		}
		//Borro usuario
	}
}
