<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginAdmin extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('MloginAdmin');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->load->helper('url');
	}

	public function commonData()
	{
		/********************** Session Control ***************************/

		if ($this->session->userdata('logged_in') == TRUE) {

			redirect(base_url() . 'Admin');
		} 
		
		/*if ($this->session->userdata('logged_in') == False) {

			redirect(base_url() . 'Login/login');
		}*/

		/********************* End Session Control ************************/
	}
	public function login()
	{
			$this->commonData();

		$this->load->view('Admin/login');
	}

	public function post_login()
	{

		$this->commonData();

		$email = $this->input->post('email');
		$password = $this->input->post('password');
		//echo $email . '//' . $password;
		//die();

		$this->load->library('form_validation');
		$this->form_validation->set_rules('email', 'Enter email', 'required');

		if ($this->form_validation->run() == FALSE) {



			$this->session->set_flashdata('user_error', 'verify your login or password');

			$this->load->view('Admin/login');
		} else {

			$this->MloginAdmin->login_user($email, $password);


			if ($this->session->userdata('logged_in')) {

				$this->session->set_flashdata('user_connect', $email);

				redirect(base_url());
			}
			$this->session->set_flashdata('user_error', 'verify your login or password');


			$this->load->view('Admin/login');
		}
	}

	public function logout()
	{
		//$this->commonData();
		$this->session->sess_destroy();
		redirect('LoginAdmin/login');
	}
}
