<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load the needed libraries
		$this->load->library([
			'session',
			'form_validation'
		]);

		// Load the needed helpers
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
		$data 			= new stdClass();
		$data->pageName = 'login';

		// Set the validation rules
		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		// Check if user submitted form
		if ( $this->form_validation->run() === FALSE ) {

			// Load the view
			$this->load->view('partials/header', $data);
			$this->load->view('auth/login', $data);
			$this->load->view('partials/footer', $data);

		} else {

			// Set the variables
			$email 		= $this->input->post('email');
			$password 	= $this->input->post('password');

			if ( !empty($this->user_model->checkEmail($email)) ) {

				// Check if the password matches the password in the database
				if (  $this->user_model->verifyPassword($email, $password) === TRUE ) {

					$user_id = $this->user_model->getUserIdByEmail($email);

					if ( !empty($user_id) && is_numeric($user_id) ) {

						// Get the full user
						$user = $this->user_model->getUser($user_id);

						if ( !empty($user) && !is_null($user) ) {

							// Set session with the user data
							$userdata = [
								'id'			=> $user->user_id,
								'user_name'		=> $user->user_name,
								'email'			=> $user->email,
								'ip_address'	=> $user->ip_address,
								'user_agent'	=> $user->user_agent,
								'created_at'	=> $user->created_at,
								'updated_at'	=> $user->updated_at
							];

							$this->session->set_userdata($userdata);

							// Redirect to home
							redirect(base_url() . '/home');

						} else {

							// No user found
							$data->error = 'No user could be found. Please try again.';
							$this->load->view('partials/header', $data);
							$this->load->view('auth/login', $data);
							$this->load->view('partials/footer', $data);
						}

					} else {

						// No user id found or not numeric
						$data->error = 'We could not retrieve a user. Please try again.';
						$this->load->view('partials/header', $data);
						$this->load->view('auth/login', $data);
						$this->load->view('partials/footer', $data);
					}

				} else {

					// No matching password
					$data->error = 'The email and password combination is incorrect.';
					$this->load->view('partials/header', $data);
					$this->load->view('auth/login', $data);
					$this->load->view('partials/footer', $data);
				}

			} else {

				// No email could be found
				$data->error = 'No user with the provided e-mail could be found.';
				$this->load->view('partials/header', $data);
				$this->load->view('auth/login', $data);
				$this->load->view('partials/footer', $data);
			}
		}
	}
}