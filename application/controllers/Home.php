<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller 
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('url');
	}

	/**
	 * Load the home view
	 */
	public function index ($sPageName = 'home')
	{
		$data['pageName'] = 'home';

		$this->load->view('partials/header', $data);
		$this->load->view('home', $data);
		$this->load->view('partials/footer', $data);
	}
}