<?php
class Signin extends CI_Controller
{

	public function index()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'email', 'required|valid_email');
		$this->form_validation->set_rules('password', 'password', 'required');

		if ($this->form_validation->run()) {

			$email = $this->input->post('email');
			$password = $this->input->post('password');

			$this->load->model('Signin_Model');

			$validate = $this->Signin_Model->index($email, $password);

			if ($validate) {
				$this->session->set_userdata('userId', $validate->userId);
				$this->session->set_userdata('firstName', $validate->FirstName);
				$this->load->model('Inventory_Model');

				$data['inventory'] = $this->Inventory_model->all();
				$this->load->view('listing', $data);
			} else {
				$this->session->set_flashdata('error', 'Invalid login details.Please try again.');
				redirect('signin');
			}
		} else {
			$this->load->model('Inventory_Model');

			$data['inventory'] = $this->Inventory_model->all();
			$this->load->view('signin', $data);
		}
	}
}
