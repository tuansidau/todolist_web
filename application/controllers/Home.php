<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$this->load->view('login_view');
	}


	public function test(){
		$this->load->view('header');
		
	}
	public function afterLogin(){
		//$this->load->view('JobView');
		redirect("index.php/JobController/index");
	}

	public function login(){
		$email = $this->input->post('email');
		$pass = md5($this->input->post('pass'));
		$this->load->model('login_model');
		$result = $this->login_model->login($email,$pass);
		if($result == 1 ){
			$session_data = array(
				'username' => $email
			);
			$this->session->set_userdata($session_data);
			redirect("index.php/Home/afterLogin");

		}else{
			 $this->session->set_flashdata('error', 'Tài khoản hoặc mật khẩu không đúng');  
             redirect('index.php/Home/index');
		}	
	}

	public function logout(){
		$this->session->unset_userdata('username'); 
		redirect('index.php/Home/index');
	}
}
