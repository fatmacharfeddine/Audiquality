<?php
defined('BASEPATH') or exit('No direct script access allowed');

class LoginAccount extends CI_Controller
{

	function __construct()
	{
		parent::__construct();
		$this->load->model('MloginAccount');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->load->helper('url');
	}

	public function commonData()
	{
		/********************** Session Control ***************************/
		if ($this->session->userdata('logged_in') == TRUE) {
			if (($this->session->userdata('type')) == "Auditor") {
				redirect(base_url() . 'Auditor');
			} else if (($this->session->userdata('type')) == "Technical") {
				redirect(base_url() . 'Technical');
			} else if (($this->session->userdata('type')) == "Employee") {
				redirect(base_url() . 'Employee');
			}
		} else if (($this->session->userdata('type')) == "grh") {
			redirect(base_url() . 'Employee');
		}
		/********************* End Session Control ************************/
	}
	public function Account()
	{
		$this->commonData();

		$this->load->view('Account');
	}
	public function login()
	{
		$this->commonData();
		$data['account'] = $_GET['account'];

		$this->load->view('Login', $data);
	}
	public function post_login()
	{
		if (isset($_POST['radiologin'])) {

			//echo $_POST['radiologin']; 
			if (($_POST['radiologin']) == "Auditor") {
				//	echo "client h";
				//	die();
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Enter email', 'required');
				//	$this->form_validation->set_rules('password', 'Enter Password', 'required');

				if ($this->form_validation->run() == FALSE) {
					// $this->login();
					// redirect('CloginRegister');


					$this->session->set_flashdata('user_error', 'verify your login or password');

					$this->load->view('Account');
				} else {

					$this->MloginAccount->login_Auditor($email, $password);


					if ($this->session->userdata('logged_in')) {

						$this->session->set_flashdata('user_connect', $email);

						redirect(base_url() . '/Employee_Account');
					}
					$this->session->set_flashdata('user_error', 'verify your login or password');

					$this->load->view('Account');
				}
			} else if (($_POST['radiologin']) == "Director") {
				//	echo "client h";
				//	die();
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Enter email', 'required');
				//	$this->form_validation->set_rules('password', 'Enter Password', 'required');

				if ($this->form_validation->run() == FALSE) {
					// $this->login();
					// redirect('CloginRegister');


					$this->session->set_flashdata('user_error', 'verify your login or password');

					$this->load->view('Account');
				} else {

					$this->MloginAccount->login_Director($email, $password);


					if ($this->session->userdata('logged_in')) {

						$this->session->set_flashdata('user_connect', $email);

						redirect(base_url() . '/Employee_Account');
					}
					$this->session->set_flashdata('user_error', 'verify your login or password');

					$this->load->view('Account');
				}
			} else if (($_POST['radiologin']) == "Technical") {
				//	echo "eval h";
				//	die();
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Enter email', 'required');
				$this->form_validation->set_rules('password', 'Enter Password', 'required');

				if ($this->form_validation->run() == FALSE) {

					$this->load->view('login');
				} else {

					$this->MloginAccount->login_Technical($email, $password);

					if ($this->session->userdata('logged_in')) {

						$this->session->set_flashdata('user_connect', $email);

						redirect(base_url() . '/Technical_Account');
					}
					$this->session->set_flashdata('user_error', 'verify your login or password');

					// redirect('CloginRegister');

					$this->load->view('Account');
				}
			} else if (($_POST['radiologin']) == "Employee") {
				//	echo "eval h";
				//	die();
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Enter email', 'required');
				$this->form_validation->set_rules('password', 'Enter Password', 'required');

				if ($this->form_validation->run() == FALSE) {

					$this->load->view('Account');
				} else {

					$this->MloginAccount->login_Employee($email, $password);


					if ($this->session->userdata('logged_in')) {

						$this->session->set_flashdata('user_connect', $email);

						redirect(base_url() . '/Employee_Account');
					}
					$this->session->set_flashdata('user_error', 'verify your login or password');


					$this->load->view('Account');
				}
			} else if (($_POST['radiologin']) == "grh") {
				//	echo "eval h";
				//	die();
				$email = $this->input->post('email');
				$password = $this->input->post('password');

				$this->load->library('form_validation');
				$this->form_validation->set_rules('email', 'Enter email', 'required');
				$this->form_validation->set_rules('password', 'Enter Password', 'required');

				if ($this->form_validation->run() == FALSE) {

					$this->load->view('Account');
				} else {

					$this->MloginAccount->login_grh($email, $password);


					if ($this->session->userdata('logged_in')) {

						$this->session->set_flashdata('user_connect', $email);

						redirect(base_url() . '/Employee_Account');
					}
					$this->session->set_flashdata('user_error', 'verify your login or password');


					$this->load->view('Account');
				}
			}
		}
	}

	public function logout()
	{
		//$this->commonData();
		$this->session->sess_destroy();
		redirect('LoginAccount/Account');
	}
}
