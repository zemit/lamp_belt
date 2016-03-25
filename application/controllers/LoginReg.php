<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LoginReg extends CI_Controller {

	public function index()
	{
		$this->load->view('main');
	}
	public function processRegister()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('fullName', 'Full Name', 'trim|required');
		$this->form_validation->set_rules('alias', 'Alias', 'trim|required');
		$this->form_validation->set_rules('email', 'Email', 'valid_email|trim|required');
		$this->form_validation->set_rules('password', 'Password', 'matches[passwordConf]|trim|required|md5');
		$this->form_validation->set_rules('passwordConf', 'Password Confirmation', 'trim|required');
		$this->form_validation->set_rules('timeStamp', 'Birthday Confirmation', 'trim|required');
			if($this->form_validation->run() === TRUE) {
	 				$newUser['fullName'] = $this->input->post('fullName');
					$newUser['alias'] = $this->input->post('alias');
					$newUser['email'] = $this->input->post('email');
					$newUser['password'] = $this->input->post('password');
					$newUser['timeStamp'] = $this->input->post('timeStamp');
					$this->load->model('Data');
					$addNewUser = $this->Data->addUser($newUser);
					redirect('/Master/SignIn');
				}
			else {
					$this->view_data["errors"] = validation_errors();
				    $this->session->set_userdata('regError', $this->view_data["errors"]);
				    redirect('/Master/Register');
				}
	}
	public function AdminCheck()
	{
		if ($this->session->userdata('currentUser')['user_level']==9)
		{
			redirect('/LoginReg/Admin');
		}
		else
		{
			$this->load->view('/LoginReg/SignIn');
		}
	}
	public function process_login()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
		$this->form_validation->set_rules("password", "Password", 'trim|required|md5');
			if($this->form_validation->run() === FALSE)
				{
				     $this->view_data["errors"] = validation_errors();
				     $this->session->set_userdata('loginError', $this->view_data["errors"]);
				     // $this->session->set_userdata('regError', validation_errors());
				     redirect('/Homepage/SignIn');
				}
			else
				{
					 $newUser['email'] = $this->input->post('email');
					 $newUser['password'] = $this->input->post('password');
					 $this->load->model('User');
					 // var_dump($newUser);
				  	 // die();
					 $currentUser = $this->User->loginUser($newUser);
					 $this->session->set_userdata('currentUser', $currentUser);
				     // $this->load->view('registration_success');
				     redirect('/LoginReg/AdminCheck');
				}
	}
	public function SignIn()
	{
		$this->load->view('SignIn_view');
	}
	public function Register()
	{
		$this->load->view('main');
	}
	public function Admin()
	{
		$this->load->model('User');
		$this->session->set_userdata('all_users',$this->User->DisplayAllUsers());
		$this->load->view('admin_view');
	}
	public function destroy($userID) {
		$this->load->model("User");

		$user = $this->User->getUserByID($userID);

		$this->load->view("delete_user_confirmation_view", ['user' => $user]);
	}

	public function deleteUser($userID)
	{
		$this->load->model('User');
		$this->User->deleteUser($userID);
	}
}























