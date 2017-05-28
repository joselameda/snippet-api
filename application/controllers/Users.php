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
		$data = $this->User_model->create($name, $email, $password);
		if($data){
			$response = [
				"data" => $data
			];
		}else{
			$response = [
				"error" => "Something goes wrong"
			];
		}
		echo json_encode($response);exit;		
	}

	//Update
	public function put($id){
		if(!$id){
			echo json_encode(["error" => "Id missing"]);exit;
		}
		$name = $_POST['name'];
		$data = $this->User_model->update($id, $name);
		if($data){
			$response = [
				"data" => $data
			];
		}else{
			$response = [
				"error" => "Something goes wrong"
			];
		}
		echo json_encode($response);exit;
	}

	//Delete
	public function delete($id){
		if(!$id){
			echo json_encode(["error" => "Id missing"]);exit;
		}
		$data = $this->User_model->delete($id);
		if($data){
			$response = [
				"data" => $data
			];
		}else{
			$response = [
				"error" => "Something goes wrong"
			];
		}
		echo json_encode($response);exit;
	}
}
