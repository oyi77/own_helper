<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testing extends CI_Controller {

	public function index()
	{	
	$this->load->helper('own');
	// echo login('registereduser', '1', '1');
	echo cek(login('registereduser', '1', '1'));
	$data = array('email' => 'mbahkoe.pendekar@gmail.com',
				  'password' => '1234567890',
				  'username' => 'fikri',
				  'user_type' => 0);
	register('registereduser', $data);
	}

}
