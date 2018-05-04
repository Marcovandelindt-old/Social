<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Logout extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		// Load the helpers
		$this->load->helper('url');

		// Load the libraries
		$this->load->library('session');

		// Load the model
		$this->load->model('User_model');
	}

	/**
	 * Log the user out
	 */
	public function index()
	{
		// Check if the user session exists
		if ( $this->session->has_userdata('user') ) {
			$this->session->unset_userdata('user');
			redirect(base_url('login'));
		} else {
			redirect(base_url('home'));
		}
	}
}