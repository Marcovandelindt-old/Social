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
	 * Check if the email exists in the database
	 *
	 * @param str $email
	 * @return bool
	 */
	public function checkEmail($email)
	{
		$this->db->select('email');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('email');
	}

	/**
	 * Get the user
	 *
	 * @param str $email
	 * @param str $password
	 *
	 * @return bool
	 */
	public function verifyPassword($email, $password)
	{
		$this->db->select('password');
		$this->db->from('users');
		$this->db->where('email', $email);
		$hashed_password = $this->db->get()->row('password');

		return $this->verifyPasswordHash($password, $hashed_password);
	}

	/**
	 * Get the user id
	 *
	 * @param str $email
	 * @return int user_id
	 */
	public function getUserIdByEmail($email)
	{
		$this->db->select('user_id');
		$this->db->from('users');
		$this->db->where('email', $email);

		return $this->db->get()->row('user_id');
	}

	/**
	 * Get the full user
	 *
	 * @param int $user_id
	 * @return user
	 */
	public function getUser($user_id)
	{
		$this->db->from('users');
		$this->db->where('user_id', $user_id);
		return $this->db->get()->row();
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
	private function verifyPasswordHash($password, $hash) {
		
		return password_verify($password, $hash);
		
	}
}