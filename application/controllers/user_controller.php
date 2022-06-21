<?php

class User_controller extends CI_Controller
{

	public function __construct()
	{

		parent::__construct();
		$this->load->library('session');
		$this->load->model('User_model');
	}
	public function loginForm()
	{
		$this->load->view('auth');
	}
	public function login()
	{
		$this->load->model('User_Model');
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

	

		if ($this->form_validation->run()==true) {

			$email = $this->input->post('email');
			$password = $this->input->post('password');
			$validate = $this->User_model->index($email, $password);
			if ($validate) {
				$this->load->model('Inventory_model');
				$data['inventory'] = $this->Inventory_model->all();
				$this->load->view('listing', $data);
			} 
			else {
				echo "bruuuuh";
				$this->session->set_flashdata('error', 'Invalid login details.Please try again.');
				$this->load->view('auth');
			}
		// } else {
		// 	$this->load->view('auth');
		 }
	}

	public function list()
	{
		$users = $this->User_model->display();
		$user = array();
		$user['users'] = $users;
		$this->load->view('userDisplay', $user);
	}
	public function create()
	{

		$this->load->library('form_validation');
		$this->form_validation->set_rules('first_name', 'FirstName', 'trim|required');
		$this->form_validation->set_rules('last_name', 'lastName', 'trim|required');
		$this->form_validation->set_rules('username', 'username', 'trim|required|min_length[6]|is_unique[users.userName]');
		$this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'trim|required|alpha_numeric|min_length[6]');
		$this->form_validation->set_rules('nationality', 'nationality', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
			echo validation_errors();
			// $this->load->view('user_view.php');

		} else {
			$this->load->model('User_model');
			$result = $this->User_model->addUser();
			if (!$result) {
				// echo mysqli_error($result);
			} else {
				echo "done";
				// redirect(base_url().'index.php/user_controller/list/');
			}
		}
		$this->load->view('user_view');
	}
	public function userEdit($userId)
	{
		$users = $this->User_model->getUser($userId);
		$data = array();
		$data['data'] = $users;
		// $this->form_validation->set_rules('inventory_id', 'productId', 'required');
		if (isset($_POST['updateuser'])) {
			$this->User_model->updateUser($userId);
			redirect(base_url() . 'index.php/user_controller/list/');
			echo "done";
		}
		$this->load->view('userEdit.php', $data);
	}
	function delete($userId)
	{
		$user = $this->User_model->getuser($userId);
		if (empty($user)) {
			echo "failed";
		}
		$this->User_model->deleteUser($userId);
		redirect(base_url() . 'index.php/user_controller/list/');
	}

	function home(){
		$this->load->view('home');
	}
}
