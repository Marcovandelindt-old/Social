<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller 
{
	/**
	 * Load the home view
	 */
	public function index ()
	{
		$data['page_name'] = 'home'; 
		$this->load->view('home', $data);
	}
}