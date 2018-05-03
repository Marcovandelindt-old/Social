<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Register extends CI_Controller 
{
	public function __construct()
	{
		parent::__construct();

		// Load needed libraries
		$this->load->library([
			'session',
			'form_validation'
		]);

		// Load needed helpers
		$this->load->helper([
			'url',
			'form'
		]);

		// Load the model
		$this->load->model('user_model');

	}

	/**
	 * Load the view
	 */
	public function index()
	{
		// Create new data object
		$data 			= new stdClass();
		$data->pageName = 'register';

		// Set the validation
		$this->form_validation->set_rules('username', 'Username', 'trim|required|min_length[3]|max_length[25]|is_unique[users.user_name]', [
			'is_unique' => 'This username already exists.']);
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|is_unique[users.email]', [
			'is_unique' => 'This e-mailaddress already exists.'
		]);
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]');
		$this->form_validation->set_rules('password_confirm', 'Confirm Password', 'trim|required|min_length[6]|matches[password]',[
			'matches' => 'Both passwords do not match.'
		]);

		// Check if user has submitted the form
		if ( $this->form_validation->run() === FALSE ) {

			// Load the view
			$this->load->view('partials/header', $data);
			$this->load->view('auth/register', $data);
			$this->load->view('partials/footer', $data);

		} else {

			// Set variables for the form
			$username 			= $this->input->post('username');
			$email 				= $this->input->post('email');
			$password 			= $this->input->post('password');

			if ( $this->user_model->createUser($username, $email, $password) ) {

				// Create new data object
				$data 			= new stdClass();
				$data->pageName = 'Registration successfull';
				$data->message 	= 'Account sucessfully registerd. You can now login.';

				// Load the view
				$this->load->view('partials/header', $data);
				$this->load->view('auth/regsiter_success', $data);
				$this->load->view('partials/footer', $data);

			} else {

				// User creation failed
				$data->error = 'Could not create account. Please try again.';

				// Load the view
				$this->load->view('partials/header', $data);
				$this->load->view('auth/register', $data);
				$this->load->view('partials/footer', $data);

			}
		}
	}
}