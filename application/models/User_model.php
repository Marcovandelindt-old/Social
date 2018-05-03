<?php 

defined('BASEPATH') or exit('No direct script access allowed');

class User_model extends CI_Model 
{
	/**
	 * __construct function
	 *
	 * @access public
	 * @return void
	 */
	public function __construct()
	{
		$this->load->database();
	}

	/** 
	 * Create a new user
	 *
	 * @param str $username
	 * @param str $email
	 * @param str $password
	 */
	public function createUser($username, $email, $password)
	{	
		// Create array with user data
		$userdata = [
			'user_name'		=> $username,
			'email'			=> $email,
			'password'		=> $this->hash_password($password),
			'ip_address'	=> $_SERVER['REMOTE_ADDR'],
			'user_agent'	=> $_SERVER['HTTP_USER_AGENT'],
			'created_at'	=> date('Y-m-d H:i:s'),
		];	

		// Create user
		return $this->db->insert('users', $userdata);
	}

	/**
	 * hash_password function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @return string|bool could be a string on success, or bool false on failure
	 */
	private function hash_password($password) {
		
		return password_hash($password, PASSWORD_BCRYPT);
		
	}
	
	/**
	 * verify_password_hash function.
	 * 
	 * @access private
	 * @param mixed $password
	 * @param mixed $hash
	 * @return bool
	 */
	private function verify_password_hash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
}