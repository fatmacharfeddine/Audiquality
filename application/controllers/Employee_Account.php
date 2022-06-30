<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_Account extends CI_Controller
{
	var $ID_company = 0;
	public $dept = 0;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mcommon');

		$this->load->model('Minterest');

		$this->load->model('Mpolicy');

		$this->load->model('Mdoc_iso');

		$this->load->model('Memployeeaccount');

		$this->load->model('Mcompany');

		$this->load->model('Mtechnical');

		$this->load->model('Mskill');

		$this->load->model('MContexte');


		$this->load->model('Mpost');

		$this->load->model('Mskillmanagement');

		$this->load->model('Mskillemployee');

		$this->load->model('Mdepartment');

		$this->load->model('Mdepartmentpost');

		$this->load->model('Mdepartmentemployee');

		$this->load->model('Memployee');

		$this->load->model('Maccess_group');

		$this->load->model('Mfunction');

		$this->load->model('Mchapter');

		$this->load->model('Mdoc_request');

		$this->load->model('Mdocument');

		$this->load->model('Msubject');

		$this->load->model('Mfunctions_access');

		$this->load->model('Memployee_new');

		$this->load->model('Mrisk');

		$this->load->model('Mrisk_objectif');

		$this->load->model('Mrisk_planification');

		$this->load->model('Maction');

		$this->load->model('Mrisk_identification');

		$this->load->model('Mrisk_evaluation');

		$this->load->model('Mrisk_analysis');

		$this->load->model('Mrisk_assessment');

		$this->load->model('Mrisk_action');

		$this->load->model('Mrisk_residential');

		$this->load->model('Mrisk_processus');

		$this->load->model('Mprocess');

		$this->load->model('Mfield');

		$this->load->model('Maudit');

		/***************************************************/
		$this->load->model('Mtraining');

		$this->load->model('Mtraining_request');

		$this->load->model('Mtraining_group_request');

		$this->load->model('Maudit_plan');

		//$this->load->model('Msurvey');

		$this->load->model('Mquestion');

		$this->load->model('MLeadership');

		$this->load->model('Mprocessus');

		$this->load->model('Mrevue');

		$this->load->model('Morganigramme');

		$this->load->model('Mrecrutement');

		$this->load->model('Mfollowup');

		$this->load->model('Mres_qse');

		$this->load->model('Mres_technic');

		$this->load->model('Maudit_extern');

		$this->load->model('Mentete');

		$this->load->model('Mrecuitment');


		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->ID_company = 0;
		$this->current_function = "";

		$this->load->library('grocery_CRUD');
	}


	public function commonData()
	{
		/********************** Access Management *************************/
		$ID_access_group = $this->session->userdata('ID_access_group');
		$this->data['listaccess'] = $this->Mcommon->get_function_by_group($ID_access_group);
		//echo print_r($this->data['listaccess']);
		//die();
		$this->viewarray = array();
		$this->editarray = array();
		$i = 0;
		foreach (($this->data['listaccess']) as $row) {
			$view_employee = $this->data['listaccess'][$i]['View_functions_access'];
			$edit_employee = $this->data['listaccess'][$i]['Edit_functions_access'];
			$url_employee = $this->data['listaccess'][$i]['URL_function'];

			if ($view_employee == 1) {
				array_push($this->viewarray, $url_employee);
				//echo $url_employee;
			}
			//echo "****";
			if ($edit_employee == 1) {
				array_push($this->editarray, $url_employee);
				//echo $url_employee;
			}
			$i = $i + 1;
		}
		/*echo print_r($this->viewarray);
		echo "**************";
		echo print_r($this->editarray);*/
		//die();
		//die();
		//echo "<pre>";
		//echo print_r($this->data['listaccess']);
		//echo "<pre>";
		//die();

		//Fecho "**********************************************";
		/*echo "<pre>";
		echo print_r($edit_employee);
		echo "<pre>";
		die();*/

		/****************** End Access Management *************************/

		/********************* Technical Information **************************/
		$this->data['employee'] = $this->Memployee->get_employee_by_ID_only($this->session->userdata('ID_employee'));
		$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
		$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
		/********************End Technical Information ************************/
		$this->data['employee'] = $this->Mcommon->get_employee_by_ID($this->session->userdata('ID_employee'));

		$this->data['ID_company'] = $this->data['employee'][0]['ID_company'];
		$this->data['Logo_company'] = $this->data['employee'][0]['Logo_company'];

		/************************ Access Menu *******************************/
		$this->data['ID_connected_employee'] = $this->session->userdata('ID_employee');
		$this->data['access_account'] = $this->Memployeeaccount->get_access_by_employee($this->data['ID_connected_employee']);
		/*		echo print_r($this->data['access_account']);
		die();*/
		$this->data['department_account'] = $this->Memployeeaccount->get_department_by_employee($this->data['ID_connected_employee']);
		$this->data['current_department'] = $this->data['department_account'][0]['ID_department'];

		/******************** End Access Menu *******************************/

		/********************** Session Control ***************************/
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect(base_url() . 'LoginAccount/Account');
		}

		if (($this->session->userdata('logged_in') == TRUE) &&  ($this->session->userdata('type') != "Employee")) {

			redirect(base_url() . 'LoginAccount/Account');
		}
		/********************* End Session Control ************************/
	}

	public function commonAccess($current_function)
	{
		//echo $current_function;
		//die();
		/******************************** Session Access Control **********************************/
		$this->test_verif_view = 0;
		foreach ($this->viewarray as $row) {
			if ($row == $current_function) {
				//echo $row;
				$this->test_verif_view = 1;
				break;
			}
		}


		$this->test_verif_edit = 0;
		foreach ($this->editarray as $row) {
			//echo $row;
			if ($row == $current_function) {
				//echo $row;
				//echo $this->current_function;

				$this->test_verif_edit = 1;
				break;
			}
		}
		//die();


		/*foreach ($this->viewarray as $row) {
			if ($row == $this->current_function) {
				$this->test_verif_view = 1;
			} else {
				$this->test_verif_view = 0;
			}
		}
		$this->test_verif_edit = 0;
		foreach ($this->editarray as $row) {
			if ($row == $this->current_function) {
				$this->test_verif_edit = 1;
			} else {
				$this->test_verif_edit = 0;
			}
		}*/


		/*echo $this->test_verif_view;
		echo "********";
		echo $this->test_verif_edit;
		die();*/
		/**************************** End Session Access Control **********************************/
	}

	/*public function Global_function($controller_function)
	{
		$this->commonData();
		$List_skills=array("Form_add_skill","Submit_add_skill","Form_edit_skill","Delete_skill","view_skill")
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			$this->$controller_function();
			echo $controller_function;
			die();
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
	}*/

	public function index()
	{
		$this->commonData();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->data['policy'] = $this->Mpolicy->get_policy_by_ID_company($this->data['ID_company']);
		$this->data['ID_policy'] = $this->data['policy'][0]['ID_policy'];
		$this->data['File_policy'] = $this->data['policy'][0]['File_policy'];



		$this->data['employee'] = $this->Mcommon->get_employee_by_ID($this->session->userdata('ID_employee'));

		$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
		$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
		$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
		$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
		$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
		$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
		$this->data['Name_company'] = $this->data['employee'][0]['Name_company'];
		$this->data['Address_company'] = $this->data['employee'][0]['Address_company'];
		$this->data['Logo_company'] = $this->data['employee'][0]['Logo_company'];
		$this->data['status_policy'] = $this->data['employee'][0]['status_policy'];

		$this->data['my_skill'] = $this->Mcommon->get_skill_employee_by_ID($this->session->userdata('ID_employee'));
		$this->data['list_employee'] = $this->Mcommon->get_all_employee();
		//echo print_r($this->data['list_employee']);
		//die();

		$this->data['my_action'] = $this->Mrisk_action->get_action_by_responsable($this->session->userdata('ID_employee'));
		/*echo "<pre>";
		echo print_r($this->data['my_action']);
		echo "<pre>";
		die();*/
		$this->load->view('Employee/Index.php', $this->data);
		$this->load->view('Employee/Footer');
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** Fiche ******************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function List_fiche()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//echo $_GET['ID_post'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mpost->get_posts_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['posts'] = $this->Mpost->get_posts_paging($page);
			}
			$this->data['nb'] = $this->Mpost->get_posts_nb_page();

			/******************End Paging******************************/


			//	$this->data['posts'] = $this->Mpost->get_posts();
			$this->load->view('Employee/PositionMod/List_fiche.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function view_fiche()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
				/*	echo print_r($this->data['post']);
			die();*/

				$this->data['Name_post'] = $this->data['post'][0]['Name_post'];
				$this->data['Do_post'] = $this->data['post'][0]['Do_post'];
				$this->data['Plan_post'] = $this->data['post'][0]['Plan_post'];
				$this->data['Check_post'] = $this->data['post'][0]['Check_post'];
				$this->data['Act_post'] = $this->data['post'][0]['Act_post'];
				$this->data['Formation_post'] = $this->data['post'][0]['Formation_post'];
				$this->data['Experience_post'] = $this->data['post'][0]['Experience_post'];
				$this->data['Moyen_post'] = $this->data['post'][0]['Moyen_post'];
				$this->data['Contraint_post'] = $this->data['post'][0]['Contraint_post'];
				$this->data['Indicateur_post'] = $this->data['post'][0]['Indicateur_post'];
				$this->data['Name_parent'] = $this->data['post'][0]['Name_parent'];
				$this->data['ID_company'] = $this->data['post'][0]['ID_company'];

				$this->data['postskills'] = $this->Mpost->get_skills_by_post($this->data['ID_post']);

				//echo print_r($this->data['postskills']);
				//die();
			}
			$this->load->view('Employee/PositionMod/View_fiche.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/***************************************************************************/
	/************************** END Fiche **************************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** access_group *******************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['company'] = $this->Maccess_group->get_companies();
			$this->load->view('Employee/AccessMod/Add_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(
					'Name_access_group' => $_POST['Name_access_group'],
					'ID_company' => $_POST['ID_company'],
				);
				if ($_POST['ID_access_group']) {
					//echo 'heey'; die();
					$ID_access_group = $_POST['ID_access_group'];

					$this->Maccess_group->edit_access_group($this->data, $ID_access_group);
				} else {
					$this->Maccess_group->add_access_group($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_access_group');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//echo $_GET['ID_access_group'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Maccess_group->get_access_group_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['access_group'] = $this->Maccess_group->get_access_group_paging($page);
			}
			$this->data['nb'] = $this->Maccess_group->get_access_group_nb_page();

			/******************End Paging******************************/
			//	$this->data['access_group'] = $this->Maccess_group->get_access_group();
			$this->load->view('Employee/AccessMod/List_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['company'] = $this->Maccess_group->get_companies();

				//echo 'hi'; die();
				$this->data['ID_access_group'] = $_GET['ID_access_group'];
				$this->data['access_group'] = $this->Maccess_group->get_access_group_by_ID($this->data['ID_access_group']);
				$this->data['ID_company'] = $this->data['access_group'][0]['ID_company'];
				$this->data['Name_access_group'] = $this->data['access_group'][0]['Name_access_group'];
				$this->data['Name_company'] = $this->data['access_group'][0]['Name_company'];
			}
			$this->load->view('Employee/AccessMod/Add_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_access_group'] = $_GET['ID_access_group'];
				$this->data['access_group'] = $this->Maccess_group->delete_access_group($this->data['ID_access_group']);
			}
			return redirect(base_url() . 'Employee_Account/List_access_group');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_access_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_access_group'] = $_GET['ID_access_group'];
				$this->data['access_group'] = $this->Maccess_group->get_access_group_by_ID($this->data['ID_access_group']);
				$this->data['Name_access_group'] = $this->data['access_group'][0]['Name_access_group'];
				$this->data['Name_company'] = $this->data['access_group'][0]['Name_company'];
			}
			$this->load->view('Employee/AccessMod/View_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END access_group *******************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** function ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	public function Form_add_function()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->data['parent_list'] = $this->Mfunction->get_functions_main();
			/*echo "<pre>";
		echo (print_r($this->data['parent']));
		echo "<pre>";

		die();*/
			$this->load->view('Employee/FunctionsMod/Add_function.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_function()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if (($_POST['radio'] == "main")) {
				$ismain = 1;
				$parent = 0;
			}
			if (($_POST['radio'] == "parent")) {
				$ismain = 1;
				$parent = $_POST['ID_department'];
			}
			if ($_POST) {
				$this->data = array(
					'Name_function' => $_POST['Name_function'],
					'URL_function' => $_POST['URL_function'],
					'ismain' => $ismain,
					'parent' => $parent,
				);
				if ($_POST['ID_function']) {
					//echo 'heey'; die();
					$ID_function = $_POST['ID_function'];

					$this->Mfunction->edit_function($this->data, $ID_function);
				} else {
					$this->Mfunction->add_function($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_function');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_function()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			//echo $_GET['ID_function'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mfunction->get_function_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['function'] = $this->Mfunction->get_function_paging($page);
			}
			$this->data['nb'] = $this->Mfunction->get_function_nb_page();

			/******************End Paging******************************/


			//	$this->data['function'] = $this->Mfunction->get_function();
			$this->load->view('Employee/FunctionsMod/List_function.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_function()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_function'] = $_GET['ID_function'];
				$this->data['function'] = $this->Mfunction->get_function_by_ID($this->data['ID_function']);
				$this->data['parent'] = $this->data['function'][0]['parent'];
				$this->data['URL_function'] = $this->data['function'][0]['URL_function'];
				$this->data['Name_function'] = $this->data['function'][0]['Name_function'];
			}
			$this->load->view('Employee/FunctionsMod/Add_function.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_function()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_function'] = $_GET['ID_function'];
				$this->data['function'] = $this->Mfunction->delete_function($this->data['ID_function']);
			}
			return redirect(base_url() . 'Employee_Account/List_function');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*****Unused 
	public function view_function()
	{
		if ($_GET) {
			$this->data['ID_function'] = $_GET['ID_function'];
			$this->data['function'] = $this->Mfunction->get_function_by_ID($this->data['ID_function']);
			$this->data['Name_function'] = $this->data['function'][0]['Name_function'];
			$this->data['URL_function'] = $this->data['function'][0]['URL_function'];
		}
		$this->load->view('Employee/FunctionsMod/View_function.php', $this->data);
	}*/

	/***************************************************************************/
	/***************************************************************************/
	/************************** END function ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/************************** functions_access *******************************/
	/***************************************************************************/
	/***************************************************************************/

	/******Unused
	 public function Form_add_functions_access()
	{
						
		
		$this->commonData();
		if ($_GET['ID_access_group']) {
			$this->data['ID_access_group'] = $_GET['ID_access_group'];
			$this->data['functions_access'] = $this->Mfunctions_access->get_functions_access();
			//echo print_r($this->data['functions_access']); die();

			//$this->data['function'] = $this->Mfunctions_access->get_posts();
		}

		//echo $_GET['ID_function'] ; die();

		$this->load->view('Employee/AccessMod/Add_function_access.php', $this->data);
	}
	public function Submit_add_functions_access()
	{
		$this->commonData();
		if ($_POST) {
			if ($_POST['View_functions_access'] == Null) {
				$_POST['View_functions_access'] = 0;
			}
			if ($_POST['Edit_functions_access'] == Null) {
				$_POST['Edit_functions_access'] = 0;
			}
			$this->data = array(
				'ID_function' => $_POST['ID_function'],
				'ID_access_group' => $_POST['ID_access_group'],
				'View_functions_access' => $_POST['View_functions_access'],
				'Edit_functions_access' => $_POST['Edit_functions_access'],


			);
		}
		//echo print_r($this->data); die();
		if (isset($_POST['ID_functions_access'])) {
			//echo 'heey'; die();
			$ID_functions_access = $_POST['ID_functions_access'];

			$this->Mfunctions_access->edit_functions_access($this->data, $ID_functions_access);
			$this->data['access_group'] = $this->Mfunctions_access->get_functions_access();
		} else {
			$this->Mfunctions_access->add_functions_access($this->data);
		}

		//echo print_r ($this->data);die();
		return redirect(base_url() . 'Employee_Account/List_functions_access?ID_access_group=' . $this->data['ID_access_group']);
	}

	public function List_functions_access()
	{
		$this->data['ID_access_group'] = $_GET['ID_access_group'];
		//echo $this->data['ID_access_group'] ; die();
		$this->data['nb'] = 1;
		$page = 1;
		if (!isset($_GET['page'])) {
			$p = 1;
		} else {
			$p = $_GET['page'];
		}
		$page = ($p - 1) * 9;
		if ($this->Mfunctions_access->get_skills_by_post_management_paging($page, $this->data['ID_access_group']) == False) {
			$this->data['empty'] = 1;
		}
		//} else {
		$this->data['function_access'] = $this->Mfunctions_access->get_skills_by_post_management_paging($page, $this->data['ID_access_group']);
		//}
		$this->data['nb'] = $this->Mfunctions_access->get_functions_access_by_post_nb_page($this->data['ID_access_group']);

		//echo print_r($this->data['function_access']);
		//die();



		$this->commonData();
		//	$this->data['function_access'] = $this->Mfunctions_access->get_functions_access();
		$this->load->view('Employee/AccessMod/List_function_access.php', $this->data);
	}
	public function Form_edit_functions_access()
	{
		if ($_GET) {
			$this->data['functions_access'] = $this->Mfunctions_access->get_functions_access();

			//echo 'hi'; die();
			$this->data['ID_functions_access'] = $_GET['ID_functions_access'];
			//echo $this->data['ID_functions_access'];
			//die();

			$this->data['access_group'] = $this->Mfunctions_access->get_skills();

			//$this->data['function'] = $this->Mfunctions_access->get_posts();
			$this->data['function_access'] = $this->Mfunctions_access->get_functions_access_by_ID($this->data['ID_functions_access']);
			//$this->data['Name_function'] = $this->data['function_access'][0]['Name_function'];
			$this->data['Name_access_group'] = $this->data['function_access'][0]['Name_access_group'];
			$this->data['ID_access_group'] = $this->data['function_access'][0]['ID_access_group'];
			$this->data['ID_function'] = $this->data['function_access'][0]['ID_function'];
			$this->data['View_functions_access'] = $this->data['function_access'][0]['View_functions_access'];
			$this->data['Edit_functions_access'] = $this->data['function_access'][0]['Edit_functions_access'];

			//$this->data['function'] = $this->Mfunctions_access->get_post_by_post_management($this->data['ID_functions_access']);
			//$this->data['ID_function'] = $this->data['function'][0]['ID_function'];
			//echo print_r($this->data['access_group']); die();
		}
		$this->load->view('Employee/AccessMod/Add_function_access.php', $this->data);
	}
	public function Delete_functions_access()
	{
		if ($_GET) {

			$this->data['ID_functions_access'] = $_GET['ID_functions_access'];
			$this->data['function'] = $this->Mfunctions_access->get_access_by_post_functionaccess($this->data['ID_functions_access']);
			$this->data['ID_access_group'] = $this->data['function'][0]['ID_access_group'];
			$this->data['function_access'] = $this->Mfunctions_access->delete_functions_access($this->data['ID_functions_access']);
		}
		//echo $this->data['ID_function'] ; die();
		return redirect(base_url() . 'Employee_Account/List_functions_access?ID_access_group=' . $this->data['ID_access_group']);
	}

	public function view_functions_access()
	{
		if ($_GET) {

			$this->data['ID_functions_access'] = $_GET['ID_functions_access'];
			$this->data['function_access'] = $this->Mfunctions_access->get_functions_access_by_ID($this->data['ID_functions_access']);
			$this->data['Name_function'] = $this->data['function_access'][0]['Name_function'];
			$this->data['Name_access_group'] = $this->data['function_access'][0]['Name_access_group'];
			$this->data['View_functions_access'] = $this->data['function_access'][0]['View_functions_access'];

			$this->data['Edit_functions_access'] = $this->data['function_access'][0]['Edit_functions_access'];

			$this->data['function'] = $this->Mfunctions_access->get_access_by_post_functionaccess($this->data['ID_functions_access']);
			$this->data['ID_access_group'] = $this->data['function'][0]['ID_access_group'];
		}
		$this->load->view('Employee/AccessMod/View_function_access.php', $this->data);
	}*/

	/***************************************************************************/
	/***************************************************************************/
	/********************** END functions_access *******************************/
	/***************************************************************************/
	/***************************************************************************/



	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/******************** New Functions for Employee Account *******************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/****************************** Chapters ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	public function Form_add_chapter()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			//	$this->data['parent_list'] = $this->Mchapter->get_chapters();
			/*echo "<pre>";
		echo (print_r($this->data['parent']));
		echo "<pre>";

		die();*/
			$this->load->view('Employee/ChaptersMod/Add_chapter.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_chapter()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			/*	if (($_POST['radio'] == "main")) {
			$ismain = 1;
			$parent = 0;
		}
		if (($_POST['radio'] == "parent")) {
			$ismain = 1;
			$parent = $_POST['ID_department'];
		}*/
			if ($_POST) {
				$this->data = array(
					'Title_chapter' => $_POST['Title_chapter'],
					'Name_chapter' => $_POST['Name_chapter'],
					//	'ismain' => $ismain,
					//	'parent' => $parent,
				);
				if ($_POST['ID_chapter']) {
					//echo 'heey'; die();
					$ID_chapter = $_POST['ID_chapter'];

					$this->Mchapter->edit_chapter($this->data, $ID_chapter);
				} else {
					$this->Mchapter->add_chapter($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_chapter');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);

		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			//echo $_GET['ID_chapter'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mchapter->get_chapter_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['chapter'] = $this->Mchapter->get_chapter_paging($page);
			}
			$this->data['nb'] = $this->Mchapter->get_chapter_nb_page();

			/******************End Paging******************************/


			//	$this->data['chapter'] = $this->Mchapter->get_chapter();


			$this->load->view('Employee/ChaptersMod/List_chapter', $this->data);


			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}

		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function view_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			if ($_GET) {
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['subject'] = $this->Mchapter->get_subjects_by_chapter($this->data['ID_chapter']);
				//echo print_r($this->data['subject']);
				//die();
				$this->data['chapter'] = $this->Mchapter->get_chapter_by_ID($this->data['ID_chapter']);
				$this->data['Title_chapter'] = $this->data['chapter'][0]['Title_chapter'];
				$this->data['Name_chapter'] = $this->data['chapter'][0]['Name_chapter'];
			}
			$this->load->view('Employee/ChaptersMod/View_chapter.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function List_analyse()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//$this->data['risk_planification'] = $this->Mrisk_planification->get_risk_planification_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/EvaluationMod/Evaluation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/****************************** Grid ***********************************/
	/***************************************************************************/
	/***************************************************************************/
	public function Form_add_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {

			/*********************End Access Verif************************/


			$this->load->view('Employee/ChaptersMod/Add_grid.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(

					'Year_grid' =>  $_POST['Year_grid'],
					'Date_grid' => date('Y-m-d H:i:s'),

				);
			}

			$this->Mchapter->add_grid($this->data);

			return redirect(base_url() . 'Employee_Account/List_grid');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function List_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_grid";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			//echo $_GET['ID_chapter'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mchapter->get_grid_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['grid'] = $this->Mchapter->get_grid_paging($page);
			}
			$this->data['nb'] = $this->Mchapter->get_grid_nb_page();

			/******************End Paging******************************/

			//echo print_r($this->data['grid']); die();
			//	$this->data['grid'] = $this->Mchapter->get_grid();
			$this->load->view('Employee/ChaptersMod/List_grid.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//echo 'hi';
			//die();
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_grid'] = $_GET['ID_grid'];
				$this->Mchapter->delete_grid($this->data['ID_grid']);
			}
			return redirect(base_url() . 'Employee_Account/List_grid');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_chapter_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_grid'] = $_GET['ID_grid'];
			$this->data['grid'] = $this->Mchapter->get_grid_by_ID($this->data['ID_grid']);
			$this->data['Year_grid'] = $this->data['grid'][0]['Year_grid'];

			//echo $_GET['ID_chapter'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mchapter->get_chapter_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['chapter'] = $this->Mchapter->get_chapter_paging($page);
			}
			$this->data['nb'] = $this->Mchapter->get_chapter_nb_page();

			/******************End Paging******************************/


			//	$this->data['chapter'] = $this->Mchapter->get_chapter();
			$this->load->view('Employee/ChaptersMod/List_chapter_grid.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['chapter'] = $this->Mchapter->get_chapter_by_ID($this->data['ID_chapter']);
				//$this->data['parent'] = $this->data['chapter'][0]['parent'];
				$this->data['Name_chapter'] = $this->data['chapter'][0]['Name_chapter'];
				$this->data['Title_chapter'] = $this->data['chapter'][0]['Title_chapter'];
			}
			$this->load->view('Employee/ChaptersMod/Add_chapter.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//echo 'hi';
			//die();
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['chapter'] = $this->Mchapter->delete_chapter($this->data['ID_chapter']);
			}
			return redirect(base_url() . 'Employee_Account/List_chapter');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/*public function test_chart()
	{
		$this->commonData();

		$this->load->view('Employee/chart.php', $this->data);
	}*/

	public function view_chapter_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			if ($_GET) {
				$this->data['ID_grid'] = $_GET['ID_grid'];

				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['subject'] = $this->Mchapter->get_subjects_by_chapter($this->data['ID_chapter']);
				$this->data['question'] = $this->Mquestion->get_questions_by_chapter($this->data['ID_chapter']);
				$this->data['note'] = $this->Mchapter->get_note_by_chapter_by_grid($this->data['ID_chapter'], $this->data['ID_grid']);
				$this->data['response'] = $this->Mquestion->get_response_by_chapter_by_grid($this->data['ID_chapter'], $this->data['ID_grid']);
				//$this->data['response1'] = $this->Mquestion->get_response_by_chapter_by_grid_bysubject($this->data['ID_chapter'], $this->data['ID_grid']);

				//echo $this->data['ID_chapter'];
				/*	echo "<pre>";
				echo print_r($this->data['question']);
				echo "<pre>";
				echo '**************';
				echo "<pre>";
				echo print_r($this->data['response']);
				echo "<pre>";
				die();*/

				$this->data['chapter'] = $this->Mchapter->get_chapter_by_ID($this->data['ID_chapter']);
				$this->data['Title_chapter'] = $this->data['chapter'][0]['Title_chapter'];
				$this->data['Name_chapter'] = $this->data['chapter'][0]['Name_chapter'];
				//FlowChart
				$this->data['chart'] = $this->Mchapter->get_response_by_chapter_by_grid($this->data['ID_chapter'], $this->data['ID_grid']);
				//echo "<pre>";echo print_r($this->data['chart']);echo "<pre>"; die();


			}
			$this->load->view('Employee/ChaptersMod/View_chapter_grid.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END Chapters ***********************************/
	/***************************************************************************/
	/***************************************************************************/



	/***************************************************************************/
	/***************************************************************************/
	/****************************** subjects ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_subject()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_chapter'] = $_GET['ID_chapter'];

			$this->load->view('Employee/SubjectsMod/Add_subject.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_subject()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_chapter'] = $_POST['ID_chapter'];
			//$this->data['subject'] = $this->Mchapter->get_subjects_by_chapter($this->data['ID_chapter']);
			//echo print_r($this->data['ID_chapter']);
			//die();
			//$this->data['chapter'] = $this->Mchapter->get_chapter_by_ID($this->data['ID_chapter']);
			//$this->data['Title_chapter'] = $this->data['chapter'][0]['Title_chapter'];
			//$this->data['Name_chapter'] = $this->data['chapter'][0]['Name_chapter'];


			if ($_POST) {
				$this->data = array(
					'Title_subject' => $_POST['Title_subject'],
					'Number_subject' => $_POST['Number_subject'],
					//	'ismain' => $ismain,
					//	'parent' => $parent,
				);
				$this->data['ID_chapter'] = $_POST['ID_chapter'];
			}
			if (isset($_POST['ID_subject'])) {
				//echo 'heey'; die();
				$ID_subject = $_POST['ID_subject'];

				$this->Msubject->edit_subject($this->data, $ID_subject);
			} else {
				$this->Msubject->add_subject($this->data);
			}



			//echo ($this->data['ID_chapter']);
			//die();
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/*public function List_subject()
	{
		$page = 1;
		if (!isset($_GET['page'])) {
			$p = 1;
		} else {
			$p = $_GET['page'];
		}
		$page = ($p - 1) * 9;
		if ($this->Msubject->get_subject_paging($page) == False) {
			$this->data['empty'] = 1;
		} else {
			$this->data['subject'] = $this->Msubject->get_subject_paging($page);
		}
		$this->data['nb'] = $this->Msubject->get_subject_nb_page();
		$this->commonData();
		$this->load->view('Employee/ChaptersMod/View_chapter.php', $this->data);
	}*/
	public function Form_edit_subject()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_subject'] = $_GET['ID_subject'];
				$this->data['chapter'] = $this->Msubject->get_chapter_by_subject($this->data['ID_subject']);
				$this->data['ID_chapter'] = $this->data['chapter'][0]['ID_chapter'];

				$this->data['subject'] = $this->Msubject->get_subject_by_ID($this->data['ID_subject']);
				//$this->data['parent'] = $this->data['subject'][0]['parent'];
				$this->data['Number_subject'] = $this->data['subject'][0]['Number_subject'];
				$this->data['Title_subject'] = $this->data['subject'][0]['Title_subject'];
			}
			$this->load->view('Employee/SubjectsMod/Add_subject.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_subject()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_subject'] = $_GET['ID_subject'];
				//	echo $this->data['ID_subject'] ;

				$this->data['chapter'] = $this->Msubject->get_chapter_by_subject($this->data['ID_subject']);
				$this->data['ID_chapter'] = $this->data['chapter'][0]['ID_chapter'];
				$this->data['subject'] = $this->Msubject->delete_subject($this->data['ID_subject']);

				//echo $this->data['ID_chapter'];
				//die();
			}
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/*public function view_subject()
	{
		$this->commonData();

		if ($_GET) {
			$this->data['ID_subject'] = $_GET['ID_subject'];
			$this->data['subject'] = $this->Msubject->get_subjects_by_subject($this->data['ID_subject']);
			//echo print_r($this->data['subject']);
			//die();
			$this->data['subject'] = $this->Msubject->get_subject_by_ID($this->data['ID_subject']);
			$this->data['Title_subject'] = $this->data['subject'][0]['Title_subject'];
			$this->data['Number_subject'] = $this->data['subject'][0]['Number_subject'];
		}
		$this->load->view('Employee/SubjectsMod/View_subject.php', $this->data);
	}*/


	public function Form_add_response()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_chapter'] = $_GET['ID_chapter'];
			$this->data['ID_question'] = $_GET['ID_question'];
			$this->data['ID_grid'] = $_GET['ID_grid'];
			$this->data['listconstat'] = $this->Msubject->get_constat();
			$this->data['question'] = $this->Mquestion->get_question_by_ID($this->data['ID_question']);
			$this->data['Text_question'] = $this->data['question'][0]['Text_question'];

			$this->load->view('Employee/SubjectsMod/Add_response.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_response()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_grid'] = $_GET['ID_grid'];
				$this->data['ID_response'] = $_GET['ID_response'];
				$this->data['ID_question'] = $_GET['ID_question'];
				$this->data['listconstat'] = $this->Msubject->get_constat();
				$this->data['question'] = $this->Mquestion->get_question_by_ID($this->data['ID_question']);
				$this->data['Text_question'] = $this->data['question'][0]['Text_question'];
				$this->data['ID_chapter'] = $this->data['question'][0]['ID_chapter'];

				$this->data['response'] = $this->Mquestion->get_response_by_ID($this->data['ID_response']);
				//$this->data['parent'] = $this->data['subject'][0]['parent'];
				$this->data['ID_constat'] = $this->data['response'][0]['ID_constat'];
				$this->data['Value_response'] = $this->data['response'][0]['Value_response'];
			}
			$this->load->view('Employee/SubjectsMod/Add_response.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_response()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//$this->data['ID_chapter'] = $_POST['ID_chapter'];


			if ($_POST) {
				$this->data = array(
					//'Text_question' => $_POST['Text_question'],
					'ID_constat' => $_POST['ID_constat'],
					'Value_response' => $_POST['Value_response'],
					'ID_chapter' => $_POST['ID_chapter'],
					'ID_question' => $_POST['ID_question'],
					'ID_grid' => $_POST['ID_grid'],


				);
			}
			//echo print_r($this->data);
			//die();
			if (isset($_POST['ID_response'])) {
				//echo 'heey'; die();
				$ID_response = $_POST['ID_response'];

				$this->Mquestion->edit_response($this->data, $ID_response);
			} else {
				$this->Mquestion->add_response($this->data);
			}



			//echo ($this->data['ID_chapter']);
			//die();
			return redirect(base_url() . 'Employee_Account/View_chapter_grid?ID_chapter=' . $this->data['ID_chapter'] . '&ID_grid=' . $this->data['ID_grid']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_response()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['ID_grid'] = $_GET['ID_grid'];

				$this->data['ID_response'] = $_GET['ID_response'];
				//	echo $this->data['ID_subject'] ;

				//$this->data['chapter'] = $this->Msubject->get_chapter_by_constat($this->data['ID_constat']);
				//$this->data['ID_chapter'] = $this->data['chapter'][0]['ID_chapter'];
				//$this->Mquestion->delete_question($this->data['ID_question']);
				$this->Mquestion->delete_response($this->data['ID_response']);

				//echo $this->data['ID_chapter'];
				//die();
			}
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter'] . '&ID_grid=' . $this->data['ID_grid']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_question_grid()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_chapter'] = $_POST['ID_chapter'];


			if ($_POST) {
				$this->data_question = array(
					'Text_question' => $_POST['Text_question'],
					//'ID_constat' => $_POST['ID_constat'],
					//'Value_response' => $_POST['Value_response'],
					'ID_chapter' => $_POST['ID_chapter'],
					'ID_subject' => $_POST['ID_subject'],
					'ID_grid' => $_POST['ID_grid'],


				);
			}
			if (isset($_POST['ID_question'])) {
				//echo 'heey'; die();
				$ID_question = $_POST['ID_question'];

				$this->Mquestion->edit_question($this->data_question, $ID_question);
				$this->data_response = array(
					'ID_question' => $ID_question,
					'ID_constat' => $_POST['ID_constat'],
					'Value_response' => $_POST['Value_response'],
					'ID_chapter' => $_POST['ID_chapter'],
					'ID_subject' => $_POST['ID_subject'],
				);
				$this->Mquestion->edit_response($this->data_response, $ID_question);
			} else {
				$this->data['ID_question'] = $this->Mquestion->add_question($this->data_question);
				$this->data_response = array(
					'ID_question' => $this->data['ID_question'],
					'ID_constat' => $_POST['ID_constat'],
					'Value_response' => $_POST['Value_response'],
					'ID_chapter' => $_POST['ID_chapter'],
					//'ID_subject' => $_POST['ID_subject'],
				);
				$this->Mquestion->add_response($this->data_response);
			}



			//echo ($this->data['ID_chapter']);
			//die();
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END subjects ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/************************** Questions ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	public function List_question()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			$this->data['ID_subject'] = $_GET['ID_subject'];
			$this->data['ID_chapter'] = $_GET['ID_chapter'];

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mquestion->get_question_paging($page, $this->data['ID_subject']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['question'] = $this->Mquestion->get_question_paging($page, $this->data['ID_subject']);
			}
			$this->data['nb'] = $this->Mquestion->get_question_nb_page($this->data['ID_subject']);

			/******************End Paging******************************/


			//	$this->data['chapter'] = $this->Mchapter->get_chapter();
			$this->load->view('Employee/QuestionMod/List_question.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_add_question()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_chapter'] = $_GET['ID_chapter'];
			$this->data['ID_subject'] = $_GET['ID_subject'];

			$this->load->view('Employee/QuestionMod/Add_question.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_question()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			if ($_POST) {
				$this->data = array(
					'Text_question' => $_POST['Text_question'],
					//'Number_question' => $_POST['Number_question'],
					'ID_chapter' => $_POST['ID_chapter'],
					'ID_subject' => $_POST['ID_subject'],

				);
				$this->data['ID_chapter'] = $_POST['ID_chapter'];
				$this->data['ID_subject'] = $_POST['ID_subject'];
			}
			if (isset($_POST['ID_question'])) {
				//echo 'heey'; die();
				$ID_question = $_POST['ID_question'];

				$this->Mquestion->edit_question($this->data, $ID_question);
			} else {
				$this->Mquestion->add_question($this->data);
			}



			//echo ($this->data['ID_chapter']);
			//die();
			return redirect(base_url() . 'Employee_Account/List_question?ID_chapter=' . $this->data['ID_chapter'] . '&ID_subject=' . $this->data['ID_subject']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_question()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['ID_subject'] = $_GET['ID_subject'];
				$this->data['ID_question'] = $_GET['ID_question'];
				$this->data['question'] = $this->Mquestion->get_question_by_ID($this->data['ID_question']);
				$this->data['Text_question'] = $this->data['question'][0]['Text_question'];
			}
			$this->load->view('Employee/QuestionMod/Add_question.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_question()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['ID_subject'] = $_GET['ID_subject'];
				$this->data['ID_question'] = $_GET['ID_question'];

				$this->Mquestion->delete_question($this->data['ID_question']);
			}
			return redirect(base_url() . 'Employee_Account/List_question?ID_chapter=' . $this->data['ID_chapter'] . '&ID_subject=' . $this->data['ID_subject']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** Questions ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/************************** Note ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	public function Form_add_note()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {

			/*********************End Access Verif************************/

			$this->data['ID_chapter'] = $_GET['ID_chapter'];
			$this->data['ID_subject'] = $_GET['ID_subject'];
			$this->data['ID_grid'] = $_GET['ID_grid'];

			$this->load->view('Employee/SubjectsMod/Add_note.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_note()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_grid'] = $_GET['ID_grid'];
				$this->data['ID_note'] = $_GET['ID_note'];
				$this->data['ID_subject'] = $_GET['ID_subject'];
				$this->data['ID_chapter'] = $_GET['ID_chapter'];

				$this->data['note'] = $this->Msubject->get_note_by_ID($this->data['ID_note']);
				$this->data['Text_note'] = $this->data['note'][0]['Text_note'];
			}
			$this->load->view('Employee/SubjectsMod/Add_note.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_note()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//$this->data['ID_chapter'] = $_POST['ID_chapter'];


			if ($_POST) {
				$this->data = array(

					'Text_note' => $_POST['Text_note'],
					'ID_chapter' => $_POST['ID_chapter'],
					'ID_subject' => $_POST['ID_subject'],
					'ID_grid' => $_POST['ID_grid'],


				);
			}
			//echo print_r($this->data);
			//die();
			if (isset($_POST['ID_note'])) {
				//echo 'heey'; die();
				$ID_note = $_POST['ID_note'];

				$this->Msubject->edit_note($this->data, $ID_note);
			} else {
				$this->Msubject->add_note($this->data);
			}



			//echo ($this->data['ID_chapter']);
			//die();
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter'] . '&ID_grid=' . $this->data['ID_grid']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_note()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_chapter'] = $_GET['ID_chapter'];
				$this->data['ID_grid'] = $_GET['ID_grid'];

				$this->data['ID_note'] = $_GET['ID_note'];
				//	echo $this->data['ID_subject'] ;

				//$this->data['chapter'] = $this->Msubject->get_chapter_by_constat($this->data['ID_constat']);
				//$this->data['ID_chapter'] = $this->data['chapter'][0]['ID_chapter'];
				//$this->Mquestion->delete_question($this->data['ID_question']);
				$this->Msubject->delete_note($this->data['ID_note']);

				//echo $this->data['ID_chapter'];
				//die();
			}
			return redirect(base_url() . 'Employee_Account/View_chapter?ID_chapter=' . $this->data['ID_chapter'] . '&ID_grid=' . $this->data['ID_grid']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	/***************************************************************************/
	/***************************************************************************/
	/****************************** doc_requests ***********************************/
	/***************************************************************************/
	/***************************************************************************/



	/**************************** Create Request *******************************/
	public function Form_add_doc_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
				//	if ($this->data['Type_requests'] == 0) {

				$this->data['document'] = $this->Mdoc_request->get_documents();

				$this->data['ID_document'] = $this->data['document'][0]['ID_document'];
				$this->data['Title_document'] = $this->data['document'][0]['Title_document'];

				if ($this->data['document'] == false) {
					$this->data['no_docs'] = 1;
					//die();
				}
				/*echo "<pre>";
			echo print_r($this->data['document']);
			echo "<pre>";
			die();*/

				$this->load->view('Employee/doc_requestsMod/Add_doc_request.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_doc_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if (isset($_POST['ID_document'])) {
				$ID_document = $_POST['ID_document'];
			} else {
				$ID_document = 0;
			}
			if ($_POST) {
				$this->data = array(
					'Type_requests' => $_POST['Type_requests'],
					'Description_requests' => $_POST['Description_requests'],
					'Type_requests' => $_POST['Type_requests'],
					'Date_creation_requests' => date('Y-m-d H:i:s'),
					'Status_requests' => 0,
					'Createdby_requests' => ($this->session->userdata('ID_employee')),
					'Revisedby_requests' => 0,
					'Validatedby_requests' => 0,
					'ID_document' => $ID_document,
					'ID_employee' => ($this->session->userdata('ID_employee')),
					'ID_department' => $this->data['current_department'],

				);
				//echo print_r($this->data); die();

				if ($_POST['ID_requests']) {
					$ID_requests = $_POST['ID_requests'];

					$this->Mdoc_request->edit_doc_request($this->data, $ID_requests);
				} else {
					$this->Mdoc_request->add_doc_request($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_request');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/************************ End Create Request *******************************/

	public function Form_edit_doc_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_requests'] = $_GET['ID_requests'];
				$this->data['doc_request'] = $this->Mdoc_request->get_doc_request_by_ID($this->data['ID_requests']);
				//$this->data['parent'] = $this->data['doc_request'][0]['parent'];
				$this->data['Description_requests'] = $this->data['doc_request'][0]['Description_requests'];
				$this->data['Type_requests'] = $this->data['doc_request'][0]['Type_requests'];
			}
			$this->load->view('Employee/doc_requestsMod/Add_doc_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_doc_request()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//echo 'hi';
			//die();
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_requests'] = $_GET['ID_requests'];
				$this->data['doc_request'] = $this->Mdoc_request->delete_doc_request($this->data['ID_requests']);
				/*************************Access Verif************************/
			} else {
				$this->load->view('Employee/No_access.php', $this->data);
			}
			$this->load->view('Employee/Footer');
			/*********************End Access Verif************************/
		}
		return redirect(base_url() . 'Employee_Account/List_doc_request');
	}
	/*********Unused 
	public function view_doc_request()
	{
		$this->commonData();
		//*************************Access Verif************************
		$this->function_type = "edit";
		$current_function = "List_document";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {

			//*********************End Access Verif************************

			if ($_GET) {
				$this->data['ID_requests'] = $_GET['ID_requests'];
				$this->data['subject'] = $this->Mdoc_request->get_subjects_by_doc_request($this->data['ID_requests']);
				//echo print_r($this->data['subject']);
				//die();
				$this->data['doc_request'] = $this->Mdoc_request->get_doc_request_by_ID($this->data['ID_requests']);
				$this->data['Type_requests'] = $this->data['doc_request'][0]['Type_requests'];
				$this->data['Description_requests'] = $this->data['doc_request'][0]['Description_requests'];
			}
			$this->load->view('Employee/doc_requestsMod/View_doc_request.php', $this->data);
			//*************************Access Verif************************
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		//*********************End Access Verif************************
	} */

	public function List_request()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//$this->data['update_doc'] = $_GET['update_doc'];
			$this->load->view('Employee/doc_requestsMod/List_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_document_view()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_document_view";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			//$this->data['document'] = $this->Mdocument->get_document();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdocument->get_document_view_paging($page, $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdocument->get_document_view_nb_page($this->data['current_department']);
			}
			$this->data['doc'] = $this->Mdocument->get_document_view_paging($page, $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document_view.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_doc_request()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			/********************** Type Request ************************/
			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
			}
			/****************** End Type Request ************************/

			$this->data['doc_request'] = $this->Mdoc_request->get_doc_requests();

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_request->get_doc_request_paging_by_type($page, $this->data['Type_requests']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdoc_request->get_doc_request_nb_page_by_type($this->data['Type_requests']);
			}
			if ($this->data['Type_requests'] == 0) {
				$this->data['doc_requests'] = $this->Mdoc_request->get_doc_request_paging_by_type($page, $this->data['Type_requests']);
			} else {
				$this->data['doc_requests'] = $this->Mdoc_request->get_doc_request_paging_by_type_edit($page, $this->data['Type_requests']);
				//$this->data['doc_requests_sent'] = $this->Mdoc_request->get_doc_request_sent($this->data['Type_requests']);
			}
			/*echo "<pre>";
		echo print_r($this->data['doc_requests']);
		echo "<pre>";
		die();*/
			/*******************End Paging******************************/

			$this->load->view('Employee/doc_requestsMod/List_doc_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END doc_requests ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/****************************** Document ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/******************************Account Auditor******************************/
	/***************************************************************************/

	/**************************** Create Request *******************************/
	public function Form_add_document()
	{
		//	if (isset($_GET['Type_requests'])) {
		//	$this->data['Type_requests'] = $_GET['Type_requests'];
		//	if ($this->data['Type_requests'] == 0) {
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//	$this->data['document'] = $this->Mdocument->get_document();
			//$this->data['ID_document'] = $this->data['document'][0]['ID_document'];
			//	$this->data['Title_document'] = $this->data['document'][0]['Title_document'];
			//	$this->data['Title_document'] = $this->data['document'][0]['Title_document'];

			$this->data['ID_requests'] = $_GET['ID_requests'];
			$this->data['type'] = $this->Mdocument->get_type();

			//echo print_r($this->data['type']); die();

			$this->load->view('Employee/documentsMod/Add_document.php', $this->data);
			//	}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_document()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_request";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->data['ID_requests'] = $_POST['ID_requests'];
			if (isset($_POST['update_doc'])) {
				$this->data['update_doc'] = $_POST['update_doc'];
				$this->data['Type_requests'] = $_POST['Type_requests'];
			}
			/*************************Upload File*********************************/
			if ($_FILES['File_version']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_version']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_version']['tmp_name'];
				$fileDestination = './uploads/Document/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			/*****************************Update***************************************/

			if (isset($_POST['ID_version'])) {
				$ID_version = $_POST['ID_version'];
				//	$this->data['document'] = $this->Mdocument->get_document_by_version($ID_version);
				//	$this->data['ID_document'] = $this->data['document'][0]['ID_document'];
				$ID_document = $_POST['ID_document'];
			} else {
				/*****************************Add***************************************/

				$ID_document = 0;
				$ID_version = 0;
			}
			if ($_POST) {
				/************************Add - Update***************************************/

				$this->data_doc = array(

					'Title_document'	=> $_POST['Title_document'],
					'ID_department' => $this->data['current_department'],
				);


				//echo print_r($this->data); die();
				/*****************************Update***************************************/
				if (isset($_POST['ID_document'])) {
					//$ID_document = $_POST['ID_document'];

					$this->data['version'] = $this->Mdocument->get_last_version($ID_document);
					$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
					//$this->data['ID_Last_version'] = $this->data['version'][0]['ID_version'];



					$this->data_vers = array(
						'Title_version'	=> $_POST['Title_document'],
						'File_version'	=> $insertfile,
						'Date_version' => date('Y-m-d H:i:s'),
						'Number_version' => $this->data['Number_version'] + 1,
						'Createdby_version' => $this->session->userdata('ID_employee'),
						'Revisedby_version' => 0,
						'Validatedby_version' => 0,
						'Date_creation_version' => date('Y-m-d H:i:s'),
						//'Date_revision_version'
						//'Date_validation_version'
						//'Refusedstatus_version'
						'ID_doc' => $_POST['ID_doc'],
						'ID_document' => $ID_document,

					);
					$this->data['new_ID_version'] = $this->Mdocument->add_version($this->data_vers, $ID_document);
					$this->data_doc_request = array('ID_new_version' => $this->data['new_ID_version']);
					$this->Mdoc_request->edit_doc_request($this->data_doc_request, $this->data['ID_requests']);

					//$this->Mdocument->edit_document($this->data_doc, $ID_document);
				} else {
					/*************************Add******************************/

					$ID_document = $this->Mdocument->add_document($this->data_doc);
					//echo $ID_document ; die();
					$this->data_vers = array(
						'Title_version'	=> $_POST['Title_document'],
						'File_version'	=> $insertfile,
						'Date_version' => date('Y-m-d H:i:s'),
						'Number_version' => 0,
						'Createdby_version' => $this->session->userdata('ID_employee'),
						'Revisedby_version' => 0,
						'Validatedby_version' => 0,
						'Date_creation_version' => date('Y-m-d H:i:s'),
						'ID_doc' => $_POST['ID_doc'],
						'ID_document' => $ID_document,

					);

					/*****************************Generate Code Document***********************/
					$var_alia = $this->Mdocument->Get_department_by_document($ID_document);
					$var_version = $this->Mdocument->Get_version_by_document($ID_document);
					//echo $ID_document;
					//echo print_r($var_version);
					$year =  date('Y');
					$code = '';
					$ID = $ID_document;
					$code = $var_alia . $year . $var_version . '-' . $ID;
					$this->Mdocument->edit_code_document($ID_document, $code);
					/*************************End Generate Code Document***********************/

					$this->data['new_ID_version'] = $this->Mdocument->add_version($this->data_vers);
					$this->data_doc_request = array('ID_new_version' => $this->data['new_ID_version']);
					$this->Mdoc_request->edit_doc_request($this->data_doc_request, $this->data['ID_requests']);


					//$this->data_request = array ('ID_document'=>$ID_document);
					$this->Mdoc_request->edit_request_doc($ID_document, $_POST['ID_requests']);
					/*echo $ID_document;
				echo "//";
				echo $_POST['ID_requests'];
				die();*/
				}
			}
			return redirect(base_url() . 'Employee_Account/List_doc_request?Type_requests=' . $this->data['Type_requests'] . '&update_doc=' . $this->data['update_doc']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/************************ End Create Request *******************************/
	/********Unused
	public function Form_edit_document()
	{
		$this->commonData();

		//	if ($_GET) {
		$this->data['Type_requests'] = $_GET['Type_requests'];

		//echo 'hi'; die();
		$this->data['ID_requests'] = $_GET['ID_requests'];
		$this->data['update_doc'] = $_GET['ID_requests'];

		$this->data['request'] = $this->Mdocument->get_document_by_ID_request($this->data['ID_requests']);
		$this->data['ID_document'] = $this->data['request'][0]['ID_document'];
		$this->data['document'] = $this->Mdocument->get_document_by_ID($this->data['ID_document']);
		$this->data['Title_document'] = $this->data['document'][0]['Title_document'];
		$this->data['ID_doc'] = $this->data['document'][0]['ID_doc'];
		$this->data['ID_version'] = $this->data['document'][0]['ID_version'];
		//echo $this->data['ID_version'] ; die();
		$this->data['type'] = $this->Mdocument->get_type();

		//echo "<pre>";
		//echo print_r($this->data['document']);
		//echo "<pre>";
		//die();
	//$this->data['parent'] = $this->data['document'][0]['parent'];
	//$this->data['Description_requests'] = $this->data['document'][0]['Description_requests'];
	//$this->data['Type_requests'] = $this->data['document'][0]['Type_requests'];
	//		}
	$this->load->view('Employee/documentsMod/Add_document.php', $this->data);
	}
	 */
	/***************************************************************************/
	/******************************Account Auditor******************************/
	/***************************************************************************/


	public function Revision_requests()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Revision_Requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			$this->load->view('Employee/doc_requestsMod/List_request_Revision.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_doc_request_Revision()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Revision_Requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);




		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/********************** Type Request ************************/
			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
			}
			/****************** End Type Request ************************/
			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_Revision = array(
						'Revisedby_requests' => $this->session->userdata('ID_employee'),
						'Date_revision_requests' => date('Y-m-d H:i:s'),

					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
					//echo "done" ; die();
				}
				if ($_GET['action'] == "refuse") {
					$data_Revision = array(
						'Revisedby_requests' => $this->session->userdata('ID_employee'),
						'Date_revision_requests' => date('Y-m-d H:i:s'),
						'Date_validation_requests' => date('Y-m-d H:i:s'),

						'Refusedstatus_requests' => 1,
					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
				}
				//die();
			}
			/****************** End Type Request ************************/


			$this->data['doc_request'] = $this->Mdoc_request->get_doc_requests();

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_request->get_doc_request_Revision_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdoc_request->get_doc_request_Revision_nb_page_by_type($this->data['Type_requests'], $this->data['current_department']);
			}
			$this->data['doc_requests'] = $this->Mdoc_request->get_doc_request_Revision_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc_requests']);
		echo "<pre>";
		echo $this->data['Type_requests'].'//'. $this->data['current_department'];
		die();*/
			$this->load->view('Employee/doc_requestsMod/List_doc_request_Revision.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');

		/*********************End Access Verif************************/
	}

	public function List_doc_Revision()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Revision_Requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['revision_mode'] = 1;

			/********************** Type Request ************************/
			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
			}
			/****************** End Type Request ************************/
			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_Revision = array(
						'Revisedby_requests' => $this->session->userdata('ID_employee'),
					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
				}
				if ($_GET['action'] == "refuse") {
					$data_Revision = array(
						'Revisedby_requests' => -1,
					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
				}
				//die();
			}
			/****************** End Type Request ************************/

			$this->data['doc_request'] = $this->Mdoc_request->get_doc_requests();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_request->get_doc_Revision_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdoc_request->get_doc_Revision_nb_page_by_type($this->data['Type_requests'], $this->data['current_department']);
			}
			$this->data['doc'] = $this->Mdoc_request->get_doc_Revision_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/**************************End Account Auditor******************************/
	/***************************************************************************/




	/***************************************************************************/
	/******************************Account Director*****************************/
	/***************************************************************************/


	public function Validation_requests()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Validation_requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/doc_requestsMod/List_request_validation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_doc_request_validation()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Validation_requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/********************** Type Request ************************/
			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
			}
			/****************** End Type Request ************************/
			/********************** Type Request ************************/
			if (isset($_GET['action'])) {

				if ($_GET['action'] == "accept") {
					$this->data['req'] = $this->Mdoc_request->get_doc_request_by_ID($_GET['ID_requests']);
					$this->data['ID_document'] = $this->data['req'][0]['ID_document'];

					$data_validation = array(
						'Validatedby_requests' => $this->session->userdata('ID_employee'),
						'Date_validation_requests' => date('Y-m-d H:i:s'),

					);
					$this->Mdoc_request->edit_doc_request($data_validation, $_GET['ID_requests']);
					/******************************************************** */
					if ($this->data['Type_requests'] == 2) {

						$data_doc = array(
							'Archive_status' => 1,
						);
						$this->Mdocument->edit_document($data_doc, $this->data['ID_document']);
					}
					/******************************************************* */
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Validatedby_requests' => $this->session->userdata('ID_employee'),
						'Date_validation_requests' => date('Y-m-d H:i:s'),
						'Refusedstatus_requests' => 2,
					);
					$this->Mdoc_request->edit_doc_request($data_validation, $_GET['ID_requests']);
				}
				//die();
			}
			/****************** End Type Request ************************/


			$this->data['doc_request'] = $this->Mdoc_request->get_doc_requests();

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_request->get_doc_request_validation_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdoc_request->get_doc_request_validation_nb_page_by_type($this->data['Type_requests'], $this->data['current_department']);
			}
			$this->data['doc_requests'] = $this->Mdoc_request->get_doc_request_validation_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc_requests']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/doc_requestsMod/List_doc_request_validation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_doc_validation()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "Validation_requests";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['validation_mode'] = 1;

			/********************** Type Request ************************/
			if (isset($_GET['Type_requests'])) {
				$this->data['Type_requests'] = $_GET['Type_requests'];
			}
			/****************** End Type Request ************************/
			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_validation = array(
						'Validatedby_requests' => $this->session->userdata('ID_employee'),
					);
					$this->Mdoc_request->edit_doc_request($data_validation, $_GET['ID_requests']);
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Validatedby_requests' => -1,
					);
					$this->Mdoc_request->edit_doc_request($data_validation, $_GET['ID_requests']);
				}
				//die();
			}
			/****************** End Type Request ************************/

			$this->data['doc_request'] = $this->Mdoc_request->get_doc_requests();

			$this->data['nb'] = 1;



			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_request->get_doc_validation_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdoc_request->get_doc_validation_nb_page_by_type($this->data['Type_requests'], $this->data['current_department']);
			}
			$this->data['doc'] = $this->Mdoc_request->get_doc_validation_paging_by_type($page, $this->data['Type_requests'], $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/**************************End Account Director*****************************/
	/***************************************************************************/

	/***************************************************************************/
	/*****************************Account Auditor*******************************/
	/***************************************************************************/


	public function List_document()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_document";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//$this->data['document'] = $this->Mdocument->get_document();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdocument->get_document_paging($page, $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdocument->get_document_nb_page($this->data['current_department']);
			}
			$this->data['doc'] = $this->Mdocument->get_document_paging($page, $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Detail_document()
	{
		$this->commonData();
		$this->data['validation_form'] = 1;
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_document";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_validation = array(
						'Revisedby_version' => $this->session->userdata('ID_employee'),
						'Date_revision_version' => date('Y-m-d H:i:s'),

					);
					$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Revisedby_version' => $this->session->userdata('ID_employee'),
						'Date_revision_version' => date('Y-m-d H:i:s'),
						'Refusedstatus_version' => 1,
					);
					$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
				}
				//die();
				$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
				$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
			} else {

				/****************** End Type Request ************************/


				if (isset($_GET['ID_document'])) {
					$this->data['ID_document'] = $_GET['ID_document'];
				}
			}
			//$this->data['document'] = $this->Mdocument->get_document();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdocument->get_document_version_paging($page, $this->data['ID_document']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdocument->get_document_version_nb_page($this->data['ID_document']);
			}
			$this->data['doc'] = $this->Mdocument->get_document_version_paging($page, $this->data['ID_document']);
			$this->data['Title_document'] = $this->data['doc'][0]['Title_document'];
			$this->data['Code_document'] = $this->data['doc'][0]['Code_document'];

			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document_version.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function view_version()
	{
		$this->commonData();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		$this->data['session_cu'] = $this->session->userdata('ID_access_group');

		if ($_GET) {
			$this->data['ID_version'] = $_GET['ID_version'];
			$this->data['version'] = $this->Mdocument->get_version_by_ID($this->data['ID_version']);
			$this->data['Title_document'] = $this->data['version'][0]['Title_version'];
			$this->data['Code_document'] = $this->data['version'][0]['Code_document'];
			$this->data['File_version'] = $this->data['version'][0]['File_version'];
			$this->data['Date_version'] = $this->data['version'][0]['Date_creation_version'];
			$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
			$this->data['Createdby_version'] = $this->data['version'][0]['Name_employee'] . ' ' . $this->data['version'][0]['Lastname_employee'];
			$this->data['Revisedby_version'] = $this->data['version'][0]['Revisedby_version'];
			$this->data['Refusedstatus_version'] = $this->data['version'][0]['Refusedstatus_version'];
			$this->data['Validatedby_version'] = $this->data['version'][0]['Validatedby_version'];
			$this->data['Type_doc'] = $this->data['version'][0]['Type_doc'];
			$this->data['versionrevis'] = $this->Mdocument->get_employee_by_ID($this->data['Revisedby_version']);
			$this->data['Revisedby_version'] = $this->data['versionrevis'][0]['Name_employee'] . ' ' . $this->data['versionrevis'][0]['Lastname_employee'];
			$this->data['versionrevalid'] = $this->Mdocument->get_employee_by_ID($this->data['Validatedby_version']);
			$this->data['Validatedby_version'] = $this->data['versionrevalid'][0]['Name_employee'] . ' ' . $this->data['versionrevalid'][0]['Lastname_employee'];



			/*echo "<pre>";
	echo print_r($this->data['version']);
	echo "<pre>";
	echo "**" . ($this->data['Revisedby_version']) . "**";
	echo "//" . ($this->data['Validatedby_version']) . "//";
	//die();*/
			if ($this->data['Revisedby_version'] == ' ') {
				$this->data['Revisedby_version_none'] = 1;
				//echo 'no revised'; //die();
			}
			//else { echo $this->data['Revisedby_version'] ;  }
			if ($this->data['Validatedby_version'] == ' ') {
				$this->data['Validatedby_version_none'] = 1;
				//	echo 'no validated'; 
			}
			//	 else {echo $this->data['Validatedby_version'];}
		}
		/**************************Account QSE ***************************/
		if ($this->session->userdata('ID_access_group') == 3) {
			/*************************Access Verif************************/
			$this->function_type = "view";
			$current_function = "List_document";
			$current_function2 = "Revision_Requests";

			$this->commonAccess($current_function);
			$test1 = $this->test_verif_edit;
			$test2 = $this->test_verif_view;
			$this->commonAccess($current_function2);
			$test3 = $this->test_verif_edit;
			$test4 = $this->test_verif_view;

			if (($test1 == 1) || ($test2 == 1) || ($test3 == 1) || ($test4 == 1)) {
				/*********************End Access Verif************************/

				/********************** Revision ************************/
				if (isset($_GET['action'])) {
					if ($_GET['action'] == "accept") {
						$data_validation = array(
							'Revisedby_version' => $this->session->userdata('ID_employee'),
							'Date_revision_version' => date('Y-m-d H:i:s'),

						);
						$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
					}
					if ($_GET['action'] == "refuse") {
						$data_validation = array(
							'Revisedby_version' => $this->session->userdata('ID_employee'),
							'Date_revision_version' => date('Y-m-d H:i:s'),
							'Refusedstatus_version' => 1,
						);
						$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
					}
					//die();
					if ($_GET) {
						$this->data['ID_version'] = $_GET['ID_version'];
						$this->data['version'] = $this->Mdocument->get_version_by_ID($this->data['ID_version']);
						$this->data['Title_document'] = $this->data['version'][0]['Title_version'];
						$this->data['Code_document'] = $this->data['version'][0]['Code_document'];
						$this->data['File_version'] = $this->data['version'][0]['File_version'];
						$this->data['Date_version'] = $this->data['version'][0]['Date_creation_version'];
						$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
						$this->data['Createdby_version'] = $this->data['version'][0]['Name_employee'] . ' ' . $this->data['version'][0]['Lastname_employee'];
						$this->data['Revisedby_version'] = $this->data['version'][0]['Revisedby_version'];
						$this->data['Refusedstatus_version'] = $this->data['version'][0]['Refusedstatus_version'];
						$this->data['Validatedby_version'] = $this->data['version'][0]['Validatedby_version'];
						$this->data['Type_doc'] = $this->data['version'][0]['Type_doc'];
						$this->data['versionrevis'] = $this->Mdocument->get_employee_by_ID($this->data['Revisedby_version']);
						$this->data['Revisedby_version'] = $this->data['versionrevis'][0]['Name_employee'] . ' ' . $this->data['versionrevis'][0]['Lastname_employee'];
						$this->data['versionrevalid'] = $this->Mdocument->get_employee_by_ID($this->data['Validatedby_version']);
						$this->data['Validatedby_version'] = $this->data['versionrevalid'][0]['Name_employee'] . ' ' . $this->data['versionrevalid'][0]['Lastname_employee'];



						/*echo "<pre>";
				echo print_r($this->data['version']);
				echo "<pre>";
				echo "**" . ($this->data['Revisedby_version']) . "**";
				echo "//" . ($this->data['Validatedby_version']) . "//";
				//die();*/
						if ($this->data['Revisedby_version'] == ' ') {
							$this->data['Revisedby_version_none'] = 1;
							//echo 'no revised'; //die();
						}
						//else { echo $this->data['Revisedby_version'] ;  }
						if ($this->data['Validatedby_version'] == ' ') {
							$this->data['Validatedby_version_none'] = 1;
							//	echo 'no validated'; 
						}
						//	 else {echo $this->data['Validatedby_version'];}


					}
					$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
					$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
				}

				/****************** Revision ************************/

				$this->load->view('Employee/documentsMod/View_version.php', $this->data);
				/*************************Access Verif************************/
			} else {
				$this->load->view('Employee/No_access.php', $this->data);
			}
			/*********************End Access Verif************************/
		}
		/***********************Account Director ***********************/

		else if ($this->session->userdata('ID_access_group') == 4) {
			/*************************Access Verif************************/
			$this->function_type = "view";
			$current_function = "List_document_validation";
			$current_function2 = "Validation_requests";

			$this->commonAccess($current_function);
			$test1 = $this->test_verif_edit;
			$test2 = $this->test_verif_view;
			$this->commonAccess($current_function2);
			$test3 = $this->test_verif_edit;
			$test4 = $this->test_verif_view;

			if (($test1 == 1) || ($test2 == 1) || ($test3 == 1) || ($test4 == 1)) {
				/*********************End Access Verif************************/

				/************************** Validation ******************************/

				if (isset($_GET['action'])) {
					$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
					///echo print_r($this->data['document_version']);
					//die();			

					$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
					$this->data['Title_version'] = $this->data['document_version'][0]['Title_version'];

					if ($_GET['action'] == "accept") {
						$data_validation = array(
							'Validatedby_version' => $this->session->userdata('ID_employee'),
							'Date_validation_version' => date('Y-m-d H:i:s'),

						);
						$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
						$data_doc = array(
							'Title_document' => $this->data['Title_version'],
						);
						$this->Mdocument->edit_document($data_doc, $this->data['ID_document']);

						/*******************Document Version************************/
						$this->data['document_version'] = $this->Mdocument->get_last_version($this->data['ID_document']);
						//echo print_r($this->data['document_version']);
						//die();
						$this->data['ID_version'] = $this->data['document_version'][0]['ID_version'];
						$data_doc2 = array(
							'Last_version_document' => $this->data['ID_version'],
						);
						$this->Mdocument->edit_document($data_doc2, $this->data['ID_document']);
						/*******************Document Version************************/
					}
					if ($_GET['action'] == "refuse") {
						$data_validation = array(
							'Validatedby_version' => $this->session->userdata('ID_employee'),
							'Refusedstatus_version' => 2,
							'Date_validation_version' => date('Y-m-d H:i:s'),

						);
						$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
					}
					//die();
				}
				if ($_GET) {
					$this->data['ID_version'] = $_GET['ID_version'];
					$this->data['version'] = $this->Mdocument->get_version_by_ID($this->data['ID_version']);
					$this->data['Title_document'] = $this->data['version'][0]['Title_version'];
					$this->data['Code_document'] = $this->data['version'][0]['Code_document'];
					$this->data['File_version'] = $this->data['version'][0]['File_version'];
					$this->data['Date_version'] = $this->data['version'][0]['Date_creation_version'];
					$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
					$this->data['Createdby_version'] = $this->data['version'][0]['Name_employee'] . ' ' . $this->data['version'][0]['Lastname_employee'];
					$this->data['Revisedby_version'] = $this->data['version'][0]['Revisedby_version'];
					$this->data['Refusedstatus_version'] = $this->data['version'][0]['Refusedstatus_version'];
					$this->data['Validatedby_version'] = $this->data['version'][0]['Validatedby_version'];
					$this->data['Type_doc'] = $this->data['version'][0]['Type_doc'];
					$this->data['versionrevis'] = $this->Mdocument->get_employee_by_ID($this->data['Revisedby_version']);
					$this->data['Revisedby_version'] = $this->data['versionrevis'][0]['Name_employee'] . ' ' . $this->data['versionrevis'][0]['Lastname_employee'];
					$this->data['versionrevalid'] = $this->Mdocument->get_employee_by_ID($this->data['Validatedby_version']);
					$this->data['Validatedby_version'] = $this->data['versionrevalid'][0]['Name_employee'] . ' ' . $this->data['versionrevalid'][0]['Lastname_employee'];



					/*echo "<pre>";
			echo print_r($this->data['version']);
			echo "<pre>";
			echo "**" . ($this->data['Revisedby_version']) . "**";
			echo "//" . ($this->data['Validatedby_version']) . "//";
			//die();*/
					if ($this->data['Revisedby_version'] == ' ') {
						$this->data['Revisedby_version_none'] = 1;
						//echo 'no revised'; //die();
					}
					//else { echo $this->data['Revisedby_version'] ;  }
					if ($this->data['Validatedby_version'] == ' ') {
						$this->data['Validatedby_version_none'] = 1;
						//	echo 'no validated'; 
					}
					//	 else {echo $this->data['Validatedby_version'];}


				}
				$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
				$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];

				/************************** Validation ******************************/
				$this->load->view('Employee/documentsMod/View_version.php', $this->data);
				/*************************Access Verif************************/
			} else {
				$this->load->view('Employee/No_access.php', $this->data);
			}
			/*********************End Access Verif************************/
		}
		/***********************Account Employee ***********************/

		else /*if ($this->session->userdata('ID_access_group') == 2)*/ {
			//}
			/*************************Access Verif************************/
			$this->function_type = "view";
			$current_function = "List_request";
			$current_function2 = "List_document_view";

			$this->commonAccess($current_function);
			$test1 = $this->test_verif_edit;
			$test2 = $this->test_verif_view;
			$this->commonAccess($current_function2);
			$test3 = $this->test_verif_edit;
			$test4 = $this->test_verif_view;

			if (($test1 == 1) || ($test2 == 1) || ($test3 == 1) || ($test4 == 1)) {
				/*********************End Access Verif************************/


				if ($_GET) {
					$this->data['ID_version'] = $_GET['ID_version'];
					$this->data['version'] = $this->Mdocument->get_version_by_ID($this->data['ID_version']);
					$this->data['Title_document'] = $this->data['version'][0]['Title_version'];
					$this->data['Code_document'] = $this->data['version'][0]['Code_document'];
					$this->data['File_version'] = $this->data['version'][0]['File_version'];
					$this->data['Date_version'] = $this->data['version'][0]['Date_creation_version'];
					$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
					$this->data['Createdby_version'] = $this->data['version'][0]['Name_employee'] . ' ' . $this->data['version'][0]['Lastname_employee'];
					$this->data['Revisedby_version'] = $this->data['version'][0]['Revisedby_version'];
					$this->data['Refusedstatus_version'] = $this->data['version'][0]['Refusedstatus_version'];
					$this->data['Validatedby_version'] = $this->data['version'][0]['Validatedby_version'];
					$this->data['Type_doc'] = $this->data['version'][0]['Type_doc'];
					$this->data['versionrevis'] = $this->Mdocument->get_employee_by_ID($this->data['Revisedby_version']);
					$this->data['Revisedby_version'] = $this->data['versionrevis'][0]['Name_employee'] . ' ' . $this->data['versionrevis'][0]['Lastname_employee'];
					$this->data['versionrevalid'] = $this->Mdocument->get_employee_by_ID($this->data['Validatedby_version']);
					$this->data['Validatedby_version'] = $this->data['versionrevalid'][0]['Name_employee'] . ' ' . $this->data['versionrevalid'][0]['Lastname_employee'];



					/*echo "<pre>";
			echo print_r($this->data['version']);
			echo "<pre>";
			echo "**" . ($this->data['Revisedby_version']) . "**";
			echo "//" . ($this->data['Validatedby_version']) . "//";
			//die();*/
					if ($this->data['Revisedby_version'] == ' ') {
						$this->data['Revisedby_version_none'] = 1;
						//echo 'no revised'; //die();
					}
					//else { echo $this->data['Revisedby_version'] ;  }
					if ($this->data['Validatedby_version'] == ' ') {
						$this->data['Validatedby_version_none'] = 1;
						//	echo 'no validated'; 
					}
					//	 else {echo $this->data['Validatedby_version'];}


				}
				$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
				$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];

				$this->load->view('Employee/documentsMod/View_version.php', $this->data);
				/*************************Access Verif************************/
			} else {
				$this->load->view('Employee/No_access.php', $this->data);
			}
			/*********************End Access Verif************************/
		}
		$this->load->view('Employee/Footer');
		//die();
	}


	/***************************************************************************/
	/*************************End Account Auditor*******************************/
	/***************************************************************************/

	/***************************************************************************/
	/****************************Account Director*******************************/
	/***************************************************************************/


	public function List_document_validation()
	{

		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_document_validation";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/



			//$this->data['document'] = $this->Mdocument->get_document();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdocument->get_document_paging($page, $this->data['current_department']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdocument->get_document_nb_page($this->data['current_department']);
			}
			$this->data['doc'] = $this->Mdocument->get_document_paging($page, $this->data['current_department']);
			/******************End Paging******************************/
			/*echo "<pre>";
		echo print_r($this->data['doc']);
		echo "<pre>";
		die();*/
			$this->load->view('Employee/documentsMod/List_document_validation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Detail_document_validation()
	{
		$this->commonData();

		$this->data['validation_form'] = 1;

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_document_validation";
		$current_function1 = "Revision_requests";
		$current_function2 = "Validation_requests";

		$this->commonAccess($current_function);
		$test1 = $this->test_verif_edit;
		$test2 = $this->test_verif_view;
		$this->commonAccess($current_function2);
		$test3 = $this->test_verif_edit;
		$test4 = $this->test_verif_view;
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($test1 == 1) || ($test2 == 1) || ($test3 == 1) || ($test4 == 1)) {
			/*********************End Access Verif************************/


			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
				///echo print_r($this->data['document_version']);
				//die();			

				$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
				$this->data['Title_version'] = $this->data['document_version'][0]['Title_version'];

				if ($_GET['action'] == "accept") {
					$data_validation = array(
						'Validatedby_version' => $this->session->userdata('ID_employee'),
						'Date_validation_version' => date('Y-m-d H:i:s'),

					);
					$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
					$data_doc = array(
						'Title_document' => $this->data['Title_version'],
					);
					$this->Mdocument->edit_document($data_doc, $this->data['ID_document']);

					/*******************Document Version************************/
					$this->data['document_version'] = $this->Mdocument->get_last_version($this->data['ID_document']);
					//echo print_r($this->data['document_version']);
					//die();
					$this->data['ID_version'] = $this->data['document_version'][0]['ID_version'];
					$data_doc2 = array(
						'Last_version_document' => $this->data['ID_version'],
					);
					$this->Mdocument->edit_document($data_doc2, $this->data['ID_document']);
					/*******************Document Version************************/
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Validatedby_version' => $this->session->userdata('ID_employee'),
						'Refusedstatus_version' => 2,
						'Date_validation_version' => date('Y-m-d H:i:s'),

					);
					$this->Mdocument->edit_doc_version($data_validation, $_GET['ID_version']);
				}
				//die();
			} else {

				/****************** End Type Request ************************/


				if (isset($_GET['ID_document'])) {
					$this->data['ID_document'] = $_GET['ID_document'];
				}
			}
			//$this->data['document'] = $this->Mdocument->get_document();

			$this->data['nb'] = 1;

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdocument->get_document_validation_version_paging($page, $this->data['ID_document']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdocument->get_document_validation_version_nb_page($this->data['ID_document']);
			}
			$this->data['doc'] = $this->Mdocument->get_document_validation_version_paging($page, $this->data['ID_document']);
			$this->data['Title_document'] = $this->data['doc'][0]['Title_document'];
			$this->data['Code_document'] = $this->data['doc'][0]['Code_document'];

			/******************End Paging******************************/
			/*echo "<pre>";
			echo print_r($this->data['doc']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/documentsMod/List_document_validation_version.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******** Unused
	public function view_version_validation()
	{
		if ($_GET) {
			$this->data['ID_version'] = $_GET['ID_version'];
			$this->data['version'] = $this->Mdocument->get_version_by_ID($this->data['ID_version']);
			$this->data['Title_document'] = $this->data['version'][0]['Title_document'];
			$this->data['Code_document'] = $this->data['version'][0]['Code_document'];
			$this->data['File_version'] = $this->data['version'][0]['File_version'];
			$this->data['Date_version'] = $this->data['version'][0]['Date_version'];
			$this->data['Number_version'] = $this->data['version'][0]['Number_version'];
			$this->data['Createdby_version'] = $this->data['version'][0]['Name_employee'] . ' ' . $this->data['version'][0]['Lastname_employee'];
			$this->data['Revisedby_version'] = $this->data['version'][0]['Revisedby_version'];
			$this->data['Validatedby_version'] = $this->data['version'][0]['Validatedby_version'];
			$this->data['Type_doc'] = $this->data['version'][0]['Type_doc'];
			$this->data['versionrevis'] = $this->Mdocument->get_employee_by_ID($this->data['Revisedby_version']);
			$this->data['Revisedby_version'] = $this->data['versionrevis'][0]['Name_employee'] . ' ' . $this->data['versionrevis'][0]['Lastname_employee'];
			$this->data['versionrevalid'] = $this->Mdocument->get_employee_by_ID($this->data['Validatedby_version']);
			$this->data['Validatedby_version'] = $this->data['versionrevalid'][0]['Name_employee'] . ' ' . $this->data['versionrevalid'][0]['Lastname_employee'];



			//echo "<pre>";
			//echo print_r($this->data['version']);
			//echo "<pre>";
			//echo "**" . ($this->data['Revisedby_version']) . "**";
			//echo "//" . ($this->data['Validatedby_version']) . "//";
			//die();
		}
		$this->load->view('Employee/documentsMod/View_version_validation.php', $this->data);
	} */

	/***************************************************************************/
	/*************************End Account Director******************************/
	/***************************************************************************/

	/****************************** End STOP *******************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** Document ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/************************** RISK Management ********************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['processus'] = $this->Mrisk->get_all_processus();
			$this->data['field'] = $this->Mrisk->get_all_field();
			$this->data['responsable'] = $this->Mrisk->get_all_employees();
			$this->data['department'] = $this->Mrisk->get_all_department();
			//echo print_r($this->data['processus']);
			//die();
			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_risk.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_risk'] = $_GET['ID_risk'];

				//	$this->data['ID_risk'] = $_GET['ID_risk'];
				//$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['processus'] = $this->Mrisk->get_all_processus();
				$this->data['field'] = $this->Mrisk->get_all_field();
				$this->data['responsable'] = $this->Mrisk->get_all_employees();
				$this->data['department'] = $this->Mrisk->get_all_department();
				$this->data['risk'] = $this->Mrisk->get_risk_by_ID($this->data['ID_risk']);
				//echo print_r($this->data['risk']);
				//die();

				$this->data['ID_risk'] = $this->data['risk'][0]['ID_risk'];
				$this->data['ID_processus'] = $this->data['risk'][0]['ID_processus'];
				//$this->data['ID_field'] = $this->data['risk'][0]['ID_field'];
				$this->data['ID_Responsable'] = $this->data['risk'][0]['ID_Responsable'];
				//$this->data['Business_unit_risk'] = $this->data['risk'][0]['Business_unit_risk'];
				//$this->data['ID_department'] = $this->data['risk'][0]['ID_department'];
				//$this->data['Goal_risk'] = $this->data['risk'][0]['Goal_risk'];
				$this->data['Date_risk'] = $this->data['risk'][0]['Date_risk'];
				$this->data['Next_date_risk'] = $this->data['risk'][0]['Next_date_risk'];
				$this->data['Description_risk'] = $this->data['risk'][0]['Description_risk'];


				//$this->data['type'] = $this->Mdocument->get_type();

				$this->load->view('Employee/risksMod/Add_risk.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				$this->data = array(

					//'ID_evaluation'	=>$_POST['ID_evaluation'],
					'ID_processus'	=> $_POST['ID_processus'],
					//'ID_field' => $_POST['ID_field'],
					//'ID_responsable' => $_POST['ID_responsable'],
					//'Business_unit_risk' => $_POST['Business_unit_risk'],
					//'ID_department' => $_POST['ID_department'],
					//'Goal_risk' => $_POST['Goal_risk'],
					'Date_risk' => $_POST['Date_risk'],
					'Next_date_risk' => $_POST['Next_date_risk'],
					'Description_risk' => $_POST['Description_risk'],

				);

				if (isset($_POST['ID_risk'])) {
					//echo 'heey'; die();
					$ID_risk = $_POST['ID_risk'];
					$this->Mrisk->edit_risk($this->data, $ID_risk);
				} else {
					$_POST['ID_risk'] = $this->Mrisk->add_risk($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $_POST['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*public function Delete_risk()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->Mrisk_evaluation->delete_evaluation($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector'] . '&ID_identification=' . $this->data['ID_identification']);
	}*/
	public function List_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['eval'] = $this->Mrisk->get_risk();

			/*echo "<pre>";
		echo print_r($this->data['eval']);
		echo "<pre>";
		die();*/

			$this->load->view('Employee/risksMod/List_risk.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_risk'] = $_GET['ID_risk'];
				$this->Mrisk->delete_risk($this->data['ID_risk']);
				/**Delete in all tables */
				$this->Mrisk_identification->delete_identification($this->data['ID_risk']);
				$this->Mrisk_evaluation->delete_evaluation($this->data['ID_risk']);
				$this->Mrisk_analysis->delete_analysis($this->data['ID_risk']);
				$this->Mrisk_assessment->delete_assessment($this->data['ID_risk']);
				$this->Mrisk_action->delete_action($this->data['ID_risk']);
				$this->Mrisk_action->delete_action_list($this->data['ID_risk']);
			}
			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $_POST['ID_risk']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {

				$this->data['ID_risk'] = $_GET['ID_risk'];
				$this->data['risk_identif'] = $this->Mrisk_identification->get_risk_identif_by_ID($this->data['ID_risk']);


				$this->data['processus'] = $this->Mrisk->get_all_processus();
				$this->data['field'] = $this->Mrisk->get_all_field();
				$this->data['responsable'] = $this->Mrisk->get_all_employees();
				$this->data['department'] = $this->Mrisk->get_all_department();
				$this->data['risk'] = $this->Mrisk->get_risk_by_ID($this->data['ID_risk']);
				//echo print_r($this->data['risk']); die();
				$this->data['ID_risk'] = $this->data['risk'][0]['ID_risk'];
				$this->data['Title_processus'] = $this->data['risk'][0]['Title_processus'];
				$this->data['Photo_processus'] = $this->data['risk'][0]['Photo_processus'];
				$this->data['ID_processus'] = $this->data['risk'][0]['ID_processus'];
				$this->data['ID_Responsable'] = $this->data['risk'][0]['ID_Responsable'];
				$this->data['Date_risk'] = $this->data['risk'][0]['Date_risk'];
				$this->data['Next_date_risk'] = $this->data['risk'][0]['Next_date_risk'];
				//	$this->data['Description_risk'] = $this->data['risk'][0]['Description_risk'];
				$this->data['evaluation_row'] = $this->Mrisk_evaluation->get_risk_evaluation();

				$this->data['action_row'] = $this->Mrisk_action->get_risk_action();
				$this->data['actionlist_row'] = $this->Mrisk_action->get_risk_actionlist();

				$this->data['residential_row'] = $this->Mrisk_residential->get_risk_residential();
				$this->data['risk_processus_row'] = $this->Mrisk_processus->get_risk_processus();


				//echo print_r($this->data['action_row']);
				//die();
				/*echo "<pre>";
				echo print_r($this->data['risk_identif']);
				echo "<pre>";
				die();*/

				$this->load->view('Employee/risksMod/View_risk.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Generate_report_risk()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {



				$this->data['ID_risk'] = $_GET['ID_risk'];
				$this->data['risk_identif'] = $this->Mrisk_identification->get_risk_identif_by_ID($this->data['ID_risk']);


				$this->data['processus'] = $this->Mrisk->get_all_processus();
				$this->data['field'] = $this->Mrisk->get_all_field();
				$this->data['responsable'] = $this->Mrisk->get_all_employees();
				$this->data['department'] = $this->Mrisk->get_all_department();
				$this->data['risk'] = $this->Mrisk->get_risk_by_ID($this->data['ID_risk']);
				$this->data['ID_risk'] = $this->data['risk'][0]['ID_risk'];
				$this->data['Title_processus'] = $this->data['risk'][0]['Title_processus'];
				$this->data['Photo_processus'] = $this->data['risk'][0]['Photo_processus'];

				$this->data['ID_processus'] = $this->data['risk'][0]['ID_processus'];
				$this->data['ID_Responsable'] = $this->data['risk'][0]['ID_Responsable'];
				$this->data['Date_risk'] = $this->data['risk'][0]['Date_risk'];
				$this->data['Next_date_risk'] = $this->data['risk'][0]['Next_date_risk'];
				//	$this->data['Description_risk'] = $this->data['risk'][0]['Description_risk'];


				$this->data['evaluation_row'] = $this->Mrisk_evaluation->get_risk_evaluation();

				$this->data['action_row'] = $this->Mrisk_action->get_risk_action();
				$this->data['actionlist_row'] = $this->Mrisk_action->get_risk_actionlist();

				$this->data['residential_row'] = $this->Mrisk_residential->get_risk_residential();
				$this->data['risk_processus_row'] = $this->Mrisk_processus->get_risk_processus();

				//echo "<pre>";
				//echo print_r($this->data['action_row']);
				//echo "<pre>";
				//die();

				$this->load->view('Employee/risksMod/Generate_report_risk.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_sector()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_risk'] = $_GET['ID_risk'];

			$this->load->view('Employee/risksMod/Add_sector.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_sector()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_risk'] = $_GET['ID_risk'];
				$this->data['ID_sector'] = $_GET['ID_sector'];

				$this->data['sector'] = $this->Mrisk->get_sector_by_ID($this->data['ID_sector']);
				$this->data['Title_sector'] = $this->data['sector'][0]['Title_sector'];


				$this->load->view('Employee/risksMod/Add_sector.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_sector()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				$this->data = array(
					'Title_sector'	=> $_POST['Title_sector'],
					'ID_risk' => $_POST['ID_risk'],

				);

				if (isset($_POST['ID_sector'])) {
					//echo 'heey'; die();
					$ID_sector = $_POST['ID_sector'];
					$this->Mrisk->edit_sector($this->data, $ID_sector);
				} else {
					$this->Mrisk->add_sector($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $_POST['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_sector()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_risk'] = $_GET['ID_risk'];
				$this->data['ID_sector'] = $_GET['ID_sector'];

				$this->Mrisk->delete_sector($this->data['ID_sector']);

				/**Delete in all tables */
				$this->Mrisk_evaluation->delete_evaluation_bysector($this->data['ID_sector']);
				$this->Mrisk_analysis->delete_analysis_bysector($this->data['ID_sector']);
				$this->Mrisk_assessment->delete_assessment_bysector($this->data['ID_sector']);
				$this->Mrisk_action->delete_action_list_bysector($this->data['ID_sector']);
				$this->Mrisk_action->delete_action_bysector($this->data['ID_sector']);
				$this->Mrisk_identification->delete_identification_bysector($this->data['ID_sector']);
			}
			return redirect(base_url() . 'Employee_Account/List_risk');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function View_sector()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {


				$this->data['evaluation'] = $this->Mrisk_evaluation->get_all_evaluation();
				$this->data['analysis'] = $this->Mrisk_analysis->get_all_analysis();
				$this->data['assessment'] = $this->Mrisk_assessment->get_all_assessment();
				$this->data['action'] = $this->Mrisk_action->get_all_action();


				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];

				$this->data['risk_identif'] = $this->Mrisk_identification->get_risk_identif_by_ID($this->data['ID_risk']);
				if (($this->data['risk_identif']) != false) {
					if (isset($_GET['ID_identification'])) {
						$this->data['current_identification'] = $_GET['ID_identification'];
					} else {
						$this->data['current_identification'] = $this->data['risk_identif'][0]['ID_identification'];
					}
				} else {
					$this->data['empty'] = 1;
				}

				/*echo "<pre>";
			echo print_r($this->data['action']);
			echo "<pre>";
			die();*/
				$this->data['eval'] = $this->Mrisk->get_eval_by_ID($this->data['ID_risk']);

				//	echo print_r($this->data['eval']);
				//	die();
				/*	$this->data['Business_unit_risk'] = $this->data['eval'][0]['Business_unit_risk'];
				$this->data['Description_risk'] = $this->data['eval'][0]['Description_risk'];
				$this->data['Goal_risk'] = $this->data['eval'][0]['Goal_risk'];
				$this->data['Date_risk'] = date('D  d-M-Y', strtotime($this->data['eval'][0]['Date_risk']));
				$this->data['Business_unit_risk'] = $this->data['eval'][0]['Business_unit_risk'];
				$this->data['Next_date_risk'] =  date('D  d-M-Y', strtotime($this->data['eval'][0]['Next_date_risk']));
				$this->data['Name_process'] = $this->data['eval'][0]['Name_process'];
				$this->data['Picture_process'] = $this->data['eval'][0]['Picture_process'];
				$this->data['Name_employee'] = $this->data['eval'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['eval'][0]['Lastname_employee'];
				$this->data['Name_department'] = $this->data['eval'][0]['Name_department'];
				$this->data['Logo_department'] = $this->data['eval'][0]['Logo_department'];
				$this->data['Title_field'] = $this->data['eval'][0]['Title_field'];
				$this->data['eval_sector'] = $this->Mrisk->get_sector_by_eval($this->data['ID_risk']);
*/
				/*	$this->data['ID_evaluation'] = $this->data['eval'][0]['ID_evaluation'];
				$this->data['Gavity_evaluation'] = $this->data['eval'][0]['Gavity_evaluation'];
				$this->data['Probability_evaluation'] = $this->data['eval'][0]['Probability_evaluation'];
				$this->data['Detectability_evaluation'] = $this->data['eval'][0]['Detectability_evaluation'];
				$this->data['Priority_evaluation'] = $this->data['eval'][0]['Priority_evaluation'];
				$this->data['Criticality_evaluation'] = $this->data['eval'][0]['Criticality_evaluation'];
				$this->data['consequence_evaluation'] = $this->data['eval'][0]['consequence_evaluation'];
				$this->data['ID_risk'] = $this->data['eval'][0]['ID_risk'];
				$this->data['ID_identification'] = $this->data['eval'][0]['ID_identification'];
*/
				$this->load->view('Employee/risksMod/View_sector.php', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**********************************Risk Identification********************************/


	public function Form_edit_risk_identify()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_risk'] = $_GET['ID_risk'];

				$this->data['enjeu'] = $this->Mrisk_identification->get_all_enjeu($this->data['ID_risk']);
				$this->data['processus'] = $this->Mrisk_identification->get_all_processus($this->data['ID_risk']);


				//$this->data['ID_risk'] = $_GET['ID_risk'];
				//$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['ID_identification'] = $_GET['ID_identification'];

				$this->data['method'] = $this->Mrisk_identification->get_identification_method();
				$this->data['responsable'] = $this->Mrisk_identification->get_all_employees();

				$this->data['risk_identify'] = $this->Mrisk_identification->get_risk_identify_by_ID($this->data['ID_identification']);
				//		$this->data['ID_sector'] = $this->data['risk_identify'][0]['ID_sector'];
				//		$this->data['ID_responsable_identification'] = $this->data['risk_identify'][0]['ID_responsable_identification'];
				$this->data['Code_identification'] = $this->data['risk_identify'][0]['Code_identification'];
				$this->data['Description_identification'] = $this->data['risk_identify'][0]['Description_identification'];
				$this->data['ID_enjeu'] = $this->data['risk_identify'][0]['ID_enjeu'];
				$this->data['ID_processus'] = $this->data['risk_identify'][0]['ID_processus'];
				$this->data['ID_identification_method'] = $this->data['risk_identify'][0]['ID_identification_method'];
				$this->data['ID_risk'] = $this->data['risk_identify'][0]['ID_risk'];
			}
			$this->load->view('Employee/risksMod/Add_risk_identify.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_add_risk_identify()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['method'] = $this->Mrisk_identification->get_identification_method();
			$this->data['responsable'] = $this->Mrisk_identification->get_all_employees();
			$this->data['enjeu'] = $this->Mrisk_identification->get_all_enjeu($this->data['ID_risk']);
			$this->data['processus'] = $this->Mrisk_identification->get_all_processus_employee($this->data['ID_risk']);
			//echo print_r($this->data['processus']);
			//die();
			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_risk_identify.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_risk_identify()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$ID_risk = $_POST['ID_risk'];

			if (isset($_POST['update_doc'])) {
				$this->data['update_doc'] = $_POST['update_doc'];
			}
			/*************************Upload File*********************************/
			/*	if ($_FILES['File_identification']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_identification']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_identification']['tmp_name'];
				$fileDestination = './uploads/risk_doc/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}*/
			/*********************End Upload File*********************************/

			/*****************************Update***************************************/


			if ($_POST) {
				/*****************************Update***************************************/
				if (isset($_POST['ID_identification'])) {
					$ID_identification = $_POST['ID_identification'];

					$this->data = array(
						'ID_identification'	=> $_POST['ID_identification'],
						//'ID_sector'	=> $_POST['ID_sector'],
						//'ID_responsable_identification'	=> $_POST['ID_responsable_identification'],
						'Code_identification'	=> $_POST['Code_identification'],
						'Description_identification'	=> $_POST['Description_identification'],
						'ID_enjeu'	=> $_POST['ID_enjeu'],
						//	'ID_processus'	=>  $_POST['ID_processus'],
						'ID_identification_method'	=> $_POST['ID_identification_method'],
						'ID_risk'	=> $_POST['ID_risk']
					);
					$this->data['new_ID_identification'] = $this->Mrisk_identification->update_risk_identification($this->data, $ID_identification);
					//		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
					return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
				} else {
					/*************************Add******************************/


					$this->data = array(
						//'ID_identification'	=> $_POST['ID_identification'],
						//	'ID_identification'	=> $_POST['ID_identification'],
						//'ID_sector'	=> $_POST['ID_sector'],
						//'ID_responsable_identification'	=> $_POST['ID_responsable_identification'],
						'Code_identification'	=> $_POST['Code_identification'],
						'ID_enjeu'	=> $_POST['ID_enjeu'],
						//		'ID_processus'	=>  $_POST['ID_processus'],
						'ID_identification_method'	=> $_POST['ID_identification_method'],
						'ID_risk'	=> $_POST['ID_risk']

					);

					$this->data['new_ID_identification'] = $this->Mrisk_identification->add_risk_identification($this->data);

					return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
				}
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_risk_identification()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_risk'] = $_GET['ID_risk'];
				//			$this->data['ID_sector'] = $_GET['ID_sector'];

				$this->data['ID_identification'] = $_GET['ID_identification'];
				$this->data['identify'] = $this->Mrisk_identification->delete_identification($this->data['ID_identification']);
				$this->Mrisk_evaluation->delete_evaluation($this->data['ID_identification']);
				$this->Mrisk_analysis->delete_analysis($this->data['ID_identification']);
				$this->Mrisk_assessment->delete_assessment($this->data['ID_identification']);
				$this->data['ID_action'] = $this->Mrisk_action->get_risk_action_by_ID($this->data['ID_identification'])[0]['ID_risk_identification'];
				$this->Mrisk_action->delete_action($this->data['ID_identification']);
				$this->Mrisk_action->delete_action_list($this->data['ID_action']);
			}
			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function View_risk_identif()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {

				$this->data['ID_identification'] = $_GET['ID_identification'];

				/************************ Identification *********************/

				$this->data['identification'] = $this->Mrisk_identification->get_risk_identify_by_ID($this->data['ID_identification']);

				//$this->data['ID_identification'] = $this->data['identification'][0]['ID_identification'];
				$this->data['ID_sector'] = $this->data['identification'][0]['ID_sector'];
				$this->data['ID_responsable_identification'] = $this->data['identification'][0]['ID_responsable_identification'];
				$this->data['Code_identification'] = $this->data['identification'][0]['Code_identification'];
				$this->data['ID_enjeu'] = $this->data['identification'][0]['ID_enjeu'];
				$this->data['ID_processus'] = $this->data['identification'][0]['ID_processus'];
				$this->data['ID_identification_method'] = $this->data['identification'][0]['ID_identification_method'];
				$this->data['ID_risk'] = $this->data['identification'][0]['ID_risk'];
				/*****Method */
				$this->data['method'] = $this->Mrisk_identification->get_identification_method_by_ID($this->data['ID_identification_method']);
				$this->data['Metaphor_identification_method'] = $this->data['method'][0]['Metaphor_identification_method'];
				$this->data['Title_identification_method'] = $this->data['method'][0]['Title_identification_method'];
				/*****Responsable */

				$this->data['responsable'] = $this->Mrisk_identification->get_all_employees_by_ID($this->data['ID_responsable_identification']);
				$this->data['Name_employee'] = $this->data['responsable'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['responsable'][0]['Lastname_employee'];

				/************************ Evaluation *********************/
				$this->data['evaluation'] = $this->Mrisk_evaluation->get_risk_evaluation_by_ID($this->data['ID_identification']);
				$this->data['ID_evaluation'] = $this->data['evaluation'][0]['ID_evaluation'];
				$this->data['Gavity_evaluation'] = $this->data['evaluation'][0]['Gavity_evaluation'];
				$this->data['Probability_evaluation'] = $this->data['evaluation'][0]['Probability_evaluation'];
				$this->data['Detectability_evaluation'] = $this->data['evaluation'][0]['Detectability_evaluation'];
				$this->data['Priority_evaluation'] = $this->data['evaluation'][0]['Priority_evaluation'];
				$this->data['Criticality_evaluation'] = $this->data['evaluation'][0]['Criticality_evaluation'];
				$this->data['consequence_evaluation'] = $this->data['evaluation'][0]['consequence_evaluation'];
				//$this->data['ID_risk'] = $this->data['evaluation'][0]['ID_risk'];
				//$this->data['ID_identification'] = $this->data['evaluation'][0]['ID_identification'];



				/*****Gravity */
				$this->data['gravity'] = $this->Mrisk_evaluation->get_gravity_by_ID($this->data['Gavity_evaluation']);
				$this->data['ID_gravity'] = $this->data['gravity'][0]['ID_gravity'];
				$this->data['Title_gravity'] = $this->data['gravity'][0]['Title_gravity'];
				$this->data['Value_gravity'] = $this->data['gravity'][0]['Value_gravity'];

				/*****Probability */
				$this->data['probability'] = $this->Mrisk_evaluation->get_probability_by_ID($this->data['Probability_evaluation']);
				$this->data['ID_probability'] = $this->data['probability'][0]['ID_probability'];
				$this->data['Title_probability'] = $this->data['probability'][0]['Title_probability'];
				$this->data['Value_probability'] = $this->data['probability'][0]['Value_probability'];

				/*****Detectibility */
				$this->data['detectability'] = $this->Mrisk_evaluation->get_detectability_by_ID($this->data['Detectability_evaluation']);
				$this->data['ID_detectability'] = $this->data['detectability'][0]['ID_detectability'];
				$this->data['Title_detectability'] = $this->data['detectability'][0]['Title_detectability'];
				$this->data['Value_detectability'] = $this->data['detectability'][0]['Value_detectability'];



				/************************ Analysis *********************/

				$this->data['analysis'] = $this->Mrisk_analysis->get_risk_analysis_by_ID($this->data['ID_identification']);
				$this->data['ID_analysis'] = $this->data['analysis'][0]['ID_analysis'];
				$this->data['ID_analysis_method'] = $this->data['analysis'][0]['ID_analysis_method'];
				$this->data['Cause_analysis'] = $this->data['analysis'][0]['Cause_analysis'];
				$this->data['Consequence_analysis'] = $this->data['analysis'][0]['Consequence_analysis'];
				$this->data['File_analysis'] = $this->data['analysis'][0]['File_analysis'];
				//$this->data['ID_risk'] = $this->data['analysis'][0]['ID_risk'];
				//$this->data['ID_identification'] = $this->data['analysis'][0]['ID_identification'];

				/*****Method */
				$this->data['method_analys'] = $this->Mrisk_analysis->get_method_analysis_by_ID($this->data['ID_analysis_method']);
				$this->data['Metaphor_analysis_method'] = $this->data['method_analys'][0]['Metaphor_analysis_method'];
				$this->data['Title_analysis_method'] = $this->data['method_analys'][0]['Title_analysis_method'];

				/************************ Assessment *********************/

				$this->data['assessment'] = $this->Mrisk_assessment->get_risk_assessment_by_ID($this->data['ID_identification']);
				$this->data['ID_assessment'] = $this->data['assessment'][0]['ID_assessment'];
				$this->data['Value_assessment'] = $this->data['assessment'][0]['Value_assessment'];
				$this->data['Unit_assessment'] = $this->data['assessment'][0]['Unit_assessment'];
				$this->data['Probability_assessment'] = $this->data['assessment'][0]['Probability_assessment'];
				$this->data['Severity_assessment'] = $this->data['assessment'][0]['Severity_assessment'];
				$this->data['Result_assessment'] = $this->data['assessment'][0]['Result_assessment'];
				/*****probability */
				$this->data['probability_ass'] = $this->Mrisk_assessment->get_probability_severity_by_ID($this->data['Probability_assessment']);
				$this->data['Value_probability'] = $this->data['probability_ass'][0]['Value_probability_severity'];
				$this->data['Title_probability'] = $this->data['probability_ass'][0]['Title_probability_severity'];

				/*****severity */
				$this->data['severity_ass'] = $this->Mrisk_assessment->get_probability_severity_by_ID($this->data['Severity_assessment']);
				$this->data['Value_severity'] = $this->data['severity_ass'][0]['Value_probability_severity'];
				$this->data['Title_severity'] = $this->data['severity_ass'][0]['Title_probability_severity'];

				/*****unit */
				$this->data['unit'] = $this->Mrisk_assessment->get_unit_by_ID($this->data['Unit_assessment']);
				$this->data['Title_unit'] = $this->data['unit'][0]['Title_unit'];


				/************************ Action *********************/

				$this->data['action'] = $this->Mrisk_action->get_risk_action_by_ID($this->data['ID_identification']);
				$this->data['ID_action'] = $this->data['action'][0]['ID_action'];
				$this->data['Name_action'] = $this->data['action'][0]['Name_action'];
				$this->data['Response_action'] = $this->data['action'][0]['Response_action'];
				$this->data['Description_action'] = $this->data['action'][0]['Description_action'];

				/*****response */
				$this->data['response'] = $this->Mrisk_action->get_response_by_ID($this->data['Response_action']);
				$this->data['Title_response'] = $this->data['response'][0]['Title_response'];

				/*****unit */

				/*echo "<pre>";
			echo print_r($this->data['identification']);
			echo "<pre>";
			die();*/
				/*************************Action List  */
				/*********************Paging*******************************/
				$page = 1;
				if (!isset($_GET['page'])) {
					$p = 1;
				} else {
					$p = $_GET['page'];
				}
				$page = ($p - 1) * 9;
				if ($this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page) == False) {
					$this->data['empty'] = 1;
				} else {

					$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page);
				}
				$this->data['nb'] = $this->Mrisk_action->get_action_list_by_action_nb_page($this->data['ID_action']);

				/******************End Paging******************************/
				/**************************** Header *****************************/
				$this->data['eval'] = $this->Mrisk->get_eval_by_ID($this->data['ID_risk']);

				$this->data['Business_unit_risk'] = $this->data['eval'][0]['Business_unit_risk'];
				$this->data['Description_risk'] = $this->data['eval'][0]['Description_risk'];
				$this->data['Goal_risk'] = $this->data['eval'][0]['Goal_risk'];
				$this->data['Date_risk'] = date('D  d-M-Y', strtotime($this->data['eval'][0]['Date_risk']));
				$this->data['Business_unit_risk'] = $this->data['eval'][0]['Business_unit_risk'];
				$this->data['Next_date_risk'] =  date('D  d-M-Y', strtotime($this->data['eval'][0]['Next_date_risk']));
				$this->data['Name_process'] = $this->data['eval'][0]['Name_process'];
				$this->data['Picture_process'] = $this->data['eval'][0]['Picture_process'];
				$this->data['Name_employee'] = $this->data['eval'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['eval'][0]['Lastname_employee'];
				$this->data['Name_department'] = $this->data['eval'][0]['Name_department'];
				$this->data['Logo_department'] = $this->data['eval'][0]['Logo_department'];
				$this->data['Title_field'] = $this->data['eval'][0]['Title_field'];
				$this->data['eval_sector'] = $this->Mrisk->get_sector_by_eval($this->data['ID_risk']);
			}
			$this->load->view('Employee/risksMod/View_risk_identif.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/******************End Risk Identification*******************************/


	/****************** Risk Evaluation *******************************/
	public function Form_edit_risk_evaluation()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_identification'] = $_GET['ID_identification'];

				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];
				//$this->data['ID_evaluation'] = $_GET['ID_evaluation'];
				$this->data['gravity'] = $this->Mrisk_evaluation->get_all_gravity();
				$this->data['probability'] = $this->Mrisk_evaluation->get_all_probability();
				$this->data['detectability'] = $this->Mrisk_evaluation->get_all_detectability();

				$this->data['risk_eval'] = $this->Mrisk_evaluation->get_risk_evaluation_by_ID($this->data['ID_identification']);
				$this->data['ID_evaluation'] = $this->data['risk_eval'][0]['ID_evaluation'];
				$this->data['Gavity_evaluation'] = $this->data['risk_eval'][0]['Gavity_evaluation'];
				$this->data['Probability_evaluation'] = $this->data['risk_eval'][0]['Probability_evaluation'];
				$this->data['Detectability_evaluation'] = $this->data['risk_eval'][0]['Detectability_evaluation'];
				$this->data['Priority_evaluation'] = $this->data['risk_eval'][0]['Priority_evaluation'];
				$this->data['Criticality_evaluation'] = $this->data['risk_eval'][0]['Criticality_evaluation'];
				$this->data['consequence_evaluation'] = $this->data['risk_eval'][0]['consequence_evaluation'];
				$this->data['ID_risk'] = $this->data['risk_eval'][0]['ID_risk'];
				$this->data['ID_identification'] = $this->data['risk_eval'][0]['ID_identification'];
				/*echo "<pre>";
			echo print_r($this->data['risk_eval']);
			echo "<pre>";
			die();*/
			}
			$this->load->view('Employee/risksMod/Add_risk_evaluation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_risk_evaluation()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['gravity'] = $this->Mrisk_evaluation->get_all_gravity();
			$this->data['probability'] = $this->Mrisk_evaluation->get_all_probability();
			$this->data['detectability'] = $this->Mrisk_evaluation->get_all_detectability();



			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_risk_evaluation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_add_opportunity_evaluation()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['avantage'] = $this->Mrisk_evaluation->get_all_avantage();
			$this->data['effort'] = $this->Mrisk_evaluation->get_all_effort();
			//	$this->data['detectability'] = $this->Mrisk_evaluation->get_all_detectability();



			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_opportunity_evaluation.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_risk_evaluation()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$cr = 0;
			$pr = 0;
			if ($_POST) {
				$cr = $_POST['Gavity_evaluation'] * $_POST['Probability_evaluation'];
				if (($cr == 1) || ($cr == 2) || ($cr == 3)) {
					$pr = 3;
				}
				if (($cr == 4) || ($cr == 6)) {
					$pr = 2;
				}
				if (($cr == 8) || ($cr == 9) || ($cr == 12) || ($cr == 16)) {
					$pr = 1;
				}
				$this->data = array(

					//'ID_evaluation'	=>$_POST['ID_evaluation'],
					'Gavity_evaluation'	=> $_POST['Gavity_evaluation'],
					'Probability_evaluation' => $_POST['Probability_evaluation'],
					//	'Detectability_evaluation' => $_POST['Detectability_evaluation'],
					'Criticality_evaluation' => $cr,

					'Priority_evaluation' => $pr,
					'consequence_evaluation' => $_POST['consequence_evaluation'],
					'ID_risk' => $_POST['ID_risk'],
					'ID_identification' => $_POST['ID_identification'],

				);

				if (isset($_POST['ID_evaluation'])) {
					//echo 'heey'; die();
					$ID_evaluation = $_POST['ID_evaluation'];
					$this->Mrisk_evaluation->edit_evaluation($this->data, $ID_evaluation);
				} else {
					$this->Mrisk_evaluation->add_evaluation($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_opportunity_evaluation()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$cr = 0;
			$pr = 0;
			if ($_POST) {
				$cr = $_POST['avantage_evaluation'] * $_POST['effort_evaluation'];

				$one = $_POST['avantage_evaluation'];
				$two = $_POST['effort_evaluation'];

				if (($cr == 1) || ($cr == 4) || ($cr == 9) || ($cr == 16)) {
					$pr = 2;
				}

				if ($two < $one) {
					if (($cr == 2) || ($cr == 6) || ($cr == 12)) {
						$pr = 2;
					}

					if (($cr == 3) || ($cr == 8)) {
						$pr = 1;
					}

					if (($cr == 4)) {
						$pr = 1;
					}
				}

				if ($one < $two) {
					if (($cr == 2) || ($cr == 6) || ($cr == 12)) {
						$pr = 2;
					}

					if (($cr == 3) || ($cr == 8)) {
						$pr = 3;
					}

					if (($cr == 4)) {
						$pr = 3;
					}
				}
				$this->data = array(

					//'ID_evaluation'	=>$_POST['ID_evaluation'],
					'Avantage_evaluation'	=> $_POST['avantage_evaluation'],
					'Effort_evaluation' => $_POST['effort_evaluation'],
					//	'Detectability_evaluation' => $_POST['Detectability_evaluation'],
					'Criticality_evaluation' => $cr,
					'Priority_evaluation' => $pr,

					'consequence_evaluation' => $_POST['consequence_evaluation'],
					'ID_risk' => $_POST['ID_risk'],
					'ID_identification' => $_POST['ID_identification'],

				);

				if (isset($_POST['ID_evaluation'])) {
					//echo 'heey'; die();
					$ID_evaluation = $_POST['ID_evaluation'];
					$this->Mrisk_evaluation->edit_evaluation($this->data, $ID_evaluation);
				} else {
					$this->Mrisk_evaluation->add_evaluation($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Delete_risk_evaluation()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['ID_identification'] = $_GET['ID_identification'];

				$this->Mrisk_evaluation->delete_evaluation($this->data['ID_identification']);
			}
			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/************** End Risk Evaluation *******************************/


	/****************** Risk action *******************************/
	public function Form_edit_risk_action()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['ID_identification'] = $_GET['ID_identification'];

				//$this->data['action'] = $this->Mrisk_action->get_all_probability_severity();
				//$this->data['unit'] = $this->Mrisk_action->get_all_unit();
				$this->data['response'] = $this->Mrisk_action->get_all_response();

				$this->data['risk_action'] = $this->Mrisk_action->get_risk_action_by_ID($this->data['ID_identification']);
				$this->data['ID_action'] = $this->data['risk_action'][0]['ID_action'];
				$this->data['Name_action'] = $this->data['risk_action'][0]['Name_action'];
				$this->data['Response_action'] = $this->data['risk_action'][0]['Response_action'];
				$this->data['Description_action'] = $this->data['risk_action'][0]['Description_action'];
				$this->data['ID_risk'] = $this->data['risk_action'][0]['ID_risk'];
				$this->data['ID_identification'] = $this->data['risk_action'][0]['ID_identification'];

				/*echo "<pre>";
			echo print_r($this->data['risk_action']);
			echo "<pre>";
			die();*/
			}
			$this->load->view('Employee/risksMod/Add_risk_action.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_risk_action()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			//$this->data['action'] = $this->Mrisk_action->get_all_probability_severity();
			//$this->data['unit'] = $this->Mrisk_action->get_all_unit();
			$this->data['response'] = $this->Mrisk_action->get_all_response();


			$this->load->view('Employee/risksMod/Add_risk_action.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_risk_action()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(

					//'ID_action'	=>$_POST['ID_action'],
					'Name_action'	=> $_POST['Name_action'],
					'Response_action' => $_POST['Response_action'],
					'Description_action' => $_POST['Description_action'],
					'ID_risk' => $_POST['ID_risk'],
					'ID_identification' => $_POST['ID_identification'],

				);

				if (isset($_POST['ID_action'])) {
					//echo 'heey'; die();
					$ID_action = $_POST['ID_action'];
					$this->Mrisk_action->edit_action($this->data, $ID_action);
				} else {
					$ID_action = $this->Mrisk_action->add_action($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/Form_add_risk_action_list?ID_action=' . $ID_action . '&ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_risk_action()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['ID_identification'] = $_GET['ID_identification'];

				$this->Mrisk_action->delete_action($this->data['ID_identification']);
				$this->Mrisk_action->delete_action_list_by_action($this->data['ID_action']);
			}
			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/************** End Risk action *******************************/

	/****************** Risk action List *******************************/

	public function Form_add_risk_action_list()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//	$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];
			$this->data['ID_action'] = $_GET['ID_action'];

			$this->data['Actor'] = $this->Mrisk->get_all_employees();


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page);
			}
			$this->data['nb'] = $this->Mrisk_action->get_action_list_by_action_nb_page($this->data['ID_action']);

			/******************End Paging******************************/
			//$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action($this->data['ID_action']);
			$this->data['execute'] = $this->Mrisk_action->get_all_execute();
			$this->data['cost'] = $this->Mrisk_action->get_all_cost();
			$this->data['type'] = $this->Mrisk_action->get_all_action_type();




			$this->load->view('Employee/risksMod/Add_risk_action_list.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_risk_action_list()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$ID_risk = $_POST['ID_risk'];
			//	$ID_sector = $_POST['ID_sector'];
			$ID_identification = $_POST['ID_identification'];
			$ID_action = $_POST['ID_action'];

			if ($_POST) {
				$this->data = array(

					//'Real_value_action_list' => $_POST['Real_value_action_list'],
					'Efficacity_action_list' => $_POST['Efficacity_action_list'],
					'Date_action_list' => $_POST['Date_action_list'],
					//	'Result_action_list' => $_POST['Result_action_list'],
					//'Cible_value_action_list' => $_POST['Cible_value_action_list'],

					'Actor_action_list' => $_POST['Actor_action_list'],
					//'ID_cost' => $_POST['ID_cost'],
					//'Priority_action' => $_POST['Priority_action'],
					//'ID_type' => $_POST['ID_type'],
					//'Measure_action' => $_POST['Measure_action'],
					'ID_action' => $_POST['ID_action'],
				);
				//	echo print_r($this->data);
				//	die();
				if (isset($_POST['ID_action_list'])) {
					//echo 'heey'; die();
					$ID_action_list = $_POST['ID_action_list'];
					$this->Mrisk_action->edit_action_list($this->data, $ID_action_list);
				} else {
					$ID_action_list = $this->Mrisk_action->add_action_list($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/Form_add_risk_action_list?ID_action=' . $ID_action . '&ID_risk=' . $ID_risk . '&ID_identification=' . $ID_identification);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******************************** Action Report ************************/

	public function Form_fill_risk_action_list()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		//	$current_function = "List_action_report";

		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			//$this->data['ID_identification'] = $_GET['ID_identification'];
			$this->data['ID_action'] = $_GET['ID_action'];
			$this->data['ID_action_list'] = $_GET['ID_action_list'];


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page);
			}
			$this->data['nb'] = $this->Mrisk_action->get_action_list_by_action_nb_page($this->data['ID_action']);

			/******************End Paging******************************/
			//$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action($this->data['ID_action']);
			$this->data['execute'] = $this->Mrisk_action->get_all_execute();
			$this->data['cost'] = $this->Mrisk_action->get_all_cost();
			$this->data['type'] = $this->Mrisk_action->get_all_action_type();
			$this->data['Actor'] = $this->Mrisk->get_all_employees();




			$this->load->view('Employee/risksMod/Fill_risk_action_list.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_fill_risk_action_list()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		//	$current_function = "List_action_report";
		$current_function = "";

		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if (($_POST['radio'] == "execute")) {
				$ID_status = 1;
				//echo "execute";
			}
			if (($_POST['radio'] == "decline")) {
				$ID_status = 2;
				//echo "decline";
			}

			$ID_action = $_POST['ID_action'];

			if ($_POST) {
				$this->data = array(
					'Result_action_list' => $_POST['Result_action_list'],
					'Real_value_action_list' => $_POST['Real_value_action_list'],
					'Cible_value_action_list' => $_POST['Cible_value_action_list'],
					'Cause_action_list' => $_POST['Cause_action_list'],
					'Description_action_list' => $_POST['Description_action_list'],
					'ID_status' => $ID_status,
					'ID_type' => $_POST['ID_type'],
					'ID_execute' => $_POST['ID_execute'],
					'Date_response_action_list' => date('Y-m-d H:i:s'),
					'execute_action_list' =>  $_POST['execute_action_list'],

					//	'ID_cost' => $_POST['ID_cost'],
					//	'Priority_action' => $_POST['Priority_action'],
					//	'Measure_action' => $_POST['Measure_action'],
					//	'Result_action_list' => $_POST['Result_action_list'],
					//	'Cible_value_action_list' => $_POST['Cible_value_action_list'],


					//	'Value_cost_action_list' => $_POST['Value_cost_action_list'],
					//	'Actor_action_list' => $_POST['Actor_action_list'],

					//'ID_action' => $_POST['ID_action'],


				);

				//if (isset($_POST['ID_action_list'])) {
				//echo 'heey'; die();
				$ID_action_list = $_POST['ID_action_list'];
				$this->Mrisk_action->edit_action_list($this->data, $ID_action_list);
				/*echo "done";
			die();*/
				//} else {
				//	$ID_action_list = $this->Mrisk_action->add_action_list($this->data);
				//}
			}

			return redirect(base_url() . 'Employee_Account/List_action?ID_action=' . $ID_action);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_risk_action_list()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_action_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_action'] = $_GET['ID_action'];
				$this->data['ID_risk'] = $_GET['ID_risk'];
				//	$this->data['ID_sector'] = $_GET['ID_sector'];
				$this->data['ID_identification'] = $_GET['ID_identification'];

				//$this->Mrisk_action->delete_action($this->data['ID_risk']);
				$this->Mrisk_action->delete_action_list($this->data['ID_risk']);
			}
			return redirect(base_url() . 'Employee_Account/Form_add_risk_action_list?ID_action=' . $this->data['ID_action']  . '&ID_risk=' . $this->data['ID_risk'] . '&ID_identification=' . $this->data['ID_identification']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function List_action_report()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_action_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);




		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['action'] = $this->Mrisk_action->get_action_by_responsable($this->session->userdata('ID_employee'));

			$this->load->view('Employee/risksMod/List_action_report.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');

		/*********************End Access Verif************************/
	}

	public function List_action()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "";
		//	$current_function = "List_action_report";

		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_action'] = $_GET['ID_action'];

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action_paging($this->data['ID_action'], $page);
			}
			$this->data['nb'] = $this->Mrisk_action->get_action_list_by_action_nb_page($this->data['ID_action']);
			/*echo "<pre>";
		echo print_r($this->data['actionlist']);
		echo "<pre>";
		die();*/
			/******************End Paging******************************/
			$this->load->view('Employee/risksMod/List_action.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_add_risk_residential()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['gravity'] = $this->Mrisk_residential->get_all_gravity();
			$this->data['probability'] = $this->Mrisk_residential->get_all_probability();
			$this->data['detectability'] = $this->Mrisk_residential->get_all_detectability();



			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_risk_residential.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_risk_residential()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(

					//'ID_residential'	=>$_POST['ID_residential'],
					'Gavity_residential'	=> $_POST['Gavity_residential'],
					'Probability_residential' => $_POST['Probability_residential'],
					'Detectability_residential' => $_POST['Detectability_residential'],
					//'Priority_residential' => $_POST['Priority_residential'],
					'RR_residential' => ($_POST['Gavity_residential'] * $_POST['Probability_residential'] * $_POST['Detectability_residential']),
					//'consequence_residential' => $_POST['consequence_residential'],
					'ID_risk' => $_POST['ID_risk'],
					'ID_identification' => $_POST['ID_identification'],

				);

				if (isset($_POST['ID_residential'])) {
					//echo 'heey'; die();
					$ID_residential = $_POST['ID_residential'];
					$this->Mrisk_residential->edit_residential($this->data, $ID_residential);
				} else {
					$this->Mrisk_residential->add_residential($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_add_risk_processus()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['processus'] = $this->Mprocessus->get_processus_risk($this->data['ID_risk']);

			$this->load->view('Employee/risksMod/Add_risk_processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_risk_processus()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(

					//'ID_risk_processus'	=>$_POST['ID_risk_processus'],
					'Date_cible_risk_processus'	=> $_POST['Date_cible_risk_processus'],
					'Date_reel_risk_processus' => $_POST['Date_reel_risk_processus'],
					'ID_risk' => $_POST['ID_risk'],
					'ID_identification' => $_POST['ID_identification'],

				);

				if (isset($_POST['ID_risk_processus'])) {
					//echo 'heey'; die();
					$ID_risk_processus = $_POST['ID_risk_processus'];
					$this->Mrisk_processus->edit_risk_processus($this->data, $ID_risk_processus);
				} else {
					$this->Mrisk_processus->add_risk_processus($this->data);
				}
			}

			return redirect(base_url() . 'Employee_Account/View_risk?ID_risk=' . $this->data['ID_risk']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/***************************************************************************/
	/************************** RISK Management ********************************/
	/***************************************************************************/
	/***************************************************************************/

	/**************************************************************************/
	/**************************************************************************/
	/**************************** Objectif QSE ********************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_risk_objectif()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['risk_objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_ID_company($this->data['ID_company']);
			$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['management'] = $this->Mprocessus->get_processus_by_category(1);
			$this->data['realisation'] = $this->Mprocessus->get_processus_by_category(2);
			$this->data['support'] = $this->Mprocessus->get_processus_by_category(3);

			$this->load->view('Employee/Risk_objectifMod/List_risk_objectif.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_risk_objectif_by_type()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['processcategory'] = $_GET['processcategory'];

			$this->data['risk_objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_ID_company($this->data['ID_company']);
			$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['processus'] = $this->Mprocessus->get_processus_by_category($this->data['processcategory']);
			if (isset($_GET['ID_processus'])) {
				$this->data['current_processus'] = $_GET['ID_processus'];
			} else {
				$this->data['current_processus'] = $this->data['processus'][0]['ID_processus'];
			}
			$this->data['processus_ID'] = $this->Mprocessus->get_processus_by_ID($this->data['current_processus']);
			$this->data['Title_processus'] = $this->data['processus_ID'][0]['Title_processus'];

			$this->data['objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_processus($this->data['current_processus']);

			$this->load->view('Employee/Risk_objectifMod/List_risk_objectif_by_type.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_risk_objectif()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			//$this->data['processcategory'] = $_GET['processcategory'];


			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['processcategory'] = $_GET['processcategory'];

			$this->load->view('Employee/Risk_objectifMod/Add_risk_objectif.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_risk_objectif()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//if ($_POST) {
			$this->data['ID_processus'] = $_POST['ID_processus'];
			$this->data['processcategory'] = $_POST['processcategory'];

			/************************Add - Update***************************************/
			$Taux_risk_objectif1 = 0;
			$Taux_risk_objectif2 = 0;
			$Taux_risk_objectif3 = 0;
			if (isset($_POST['Taux_risk_objectif1'])) {
				$Taux_risk_objectif1 = $_POST['Taux_risk_objectif1'];
			}
			if (isset($_POST['Taux_risk_objectif2'])) {
				$Taux_risk_objectif2 = $_POST['Taux_risk_objectif2'];
			}
			if (isset($_POST['Taux_risk_objectif3'])) {
				$Taux_risk_objectif3 = $_POST['Taux_risk_objectif3'];
			}



			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_risk_objectif'	=> $_POST['Title_risk_objectif'],
				'Date_risk_objectif'	=> $_POST['Date_risk_objectif'],
				'Action_risk_objectif'	=> $_POST['Action_risk_objectif'],
				'Cible_risk_objectif'	=> $_POST['Cible_risk_objectif'],
				'Frequence_risk_objectif'	=> $_POST['Frequence_risk_objectif'],
				'Taux_risk_objectif1'	=> $Taux_risk_objectif1,
				'Taux_risk_objectif2'	=> $Taux_risk_objectif2,
				'Taux_risk_objectif3'	=> $Taux_risk_objectif3,

				'ID_processus'	=> $_POST['ID_processus'],

			);
			if (isset($_POST['ID_risk_objectif'])) {
				$this->Mrisk_objectif->edit_risk_objectif($this->data1, $_POST['ID_risk_objectif']);
			} else {
				/*************************Add******************************/
				$this->Mrisk_objectif->add_risk_objectif($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_risk_objectif_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_risk_objectif()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_processus'] = $_GET['ID_processus'];
				$this->data['processcategory'] = $_GET['processcategory'];
				$this->data['ID_risk_objectif'] = $_GET['ID_risk_objectif'];
				$this->data['risk_objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_ID($this->data['ID_risk_objectif']);
				$this->data['Title_risk_objectif'] = $this->data['risk_objectif'][0]['Title_risk_objectif'];
				$this->data['Date_risk_objectif'] = $this->data['risk_objectif'][0]['Date_risk_objectif'];
				$this->data['Action_risk_objectif'] = $this->data['risk_objectif'][0]['Action_risk_objectif'];
			}
			$this->load->view('Employee/Risk_objectifMod/Add_risk_objectif.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_risk_objectif()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['processcategory'] = $_GET['processcategory'];
			$this->data['ID_risk_objectif'] = $_GET['ID_risk_objectif'];

			$this->Mrisk_objectif->delete_risk_objectif($_GET['ID_risk_objectif']);

			return redirect(base_url() . 'Employee_Account/List_risk_objectif_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/**************************************************************************/
	/**************************************************************************/
	/**************************** Objectif QSE ********************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_risk_planification()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['risk_objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_ID_company($this->data['ID_company']);
			$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['management'] = $this->Mprocessus->get_processus_by_category(1);
			$this->data['realisation'] = $this->Mprocessus->get_processus_by_category(2);
			$this->data['support'] = $this->Mprocessus->get_processus_by_category(3);


			//$this->data['risk_planification'] = $this->Mrisk_planification->get_risk_planification_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/Risk_planificationMod/List_risk_planification.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_risk_planification_by_type()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_objectif";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['processcategory'] = $_GET['processcategory'];
			$this->data['risk_planification'] = $this->Mrisk_planification->get_risk_planification_by_ID_company($this->data['ID_company']);

			//$this->data['risk_objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_ID_company($this->data['ID_company']);
			$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['processus'] = $this->Mprocessus->get_processus_by_category($this->data['processcategory']);
			if (isset($_GET['ID_processus'])) {
				$this->data['current_processus'] = $_GET['ID_processus'];
			} else {
				$this->data['current_processus'] = $this->data['processus'][0]['ID_processus'];
			}
			$this->data['processus_ID'] = $this->Mprocessus->get_processus_by_ID($this->data['current_processus']);
			$this->data['Title_processus'] = $this->data['processus_ID'][0]['Title_processus'];

			//$this->data['objectif'] = $this->Mrisk_objectif->get_risk_objectif_by_processus($this->data['current_processus']);
			$this->data['planification'] = $this->Mrisk_planification->get_risk_planification_by_processus($this->data['current_processus']);

			$this->load->view('Employee/Risk_planificationMod/List_risk_planification_by_type.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_risk_planification()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['risk_planification'] = $this->Mrisk_planification->get_risk_planification_by_ID_company($this->data['ID_company']);
			$this->data['ID_risk_planification'] = $this->data['risk_planification'][0]['ID_risk_planification'];
			$this->data['Title_risk_planification'] = $this->data['risk_planification'][0]['Title_risk_planification'];
			$this->data['Date_risk_planification'] = $this->data['risk_planification'][0]['Date_risk_planification'];
			$this->data['Argumentation_risk_planification'] = $this->data['risk_planification'][0]['Argumentation_risk_planification'];
               */
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['processcategory'] = $_GET['processcategory'];

			//	$this->data['processus'] = $this->Mprocessus->get_processus();

			$this->load->view('Employee/Risk_planificationMod/Add_risk_planification.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_risk_planification()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/




			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data['ID_processus'] = $_POST['ID_processus'];
			$this->data['processcategory'] = $_POST['processcategory'];

			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_risk_planification'	=> $_POST['Title_risk_planification'],
				'Date_risk_planification'	=> $_POST['Date_risk_planification'],
				'Argumentation_risk_planification'	=> $_POST['Argumentation_risk_planification'],
				'Modification_risk_planification'	=> $_POST['Modification_risk_planification'],
				'ID_processus'	=> $_POST['ID_processus'],

			);
			if (isset($_POST['ID_risk_planification'])) {
				//echo $_POST['ID_risk_planification'];
				//die();
				$this->Mrisk_planification->edit_risk_planification($this->data1, $_POST['ID_risk_planification']);
			} else {
				/*************************Add******************************/
				$this->Mrisk_planification->add_risk_planification($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_risk_planification_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);

			//	return redirect(base_url() . 'Employee_Account/List_risk_planification');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_risk_planification()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_processus'] = $_GET['ID_processus'];
				$this->data['processcategory'] = $_GET['processcategory'];

				$this->data['ID_risk_planification'] = $_GET['ID_risk_planification'];
				$this->data['risk_planification'] = $this->Mrisk_planification->get_risk_planification_by_ID($this->data['ID_risk_planification']);
				$this->data['Title_risk_planification'] = $this->data['risk_planification'][0]['Title_risk_planification'];
				$this->data['Date_risk_planification'] = $this->data['risk_planification'][0]['Date_risk_planification'];
				$this->data['Argumentation_risk_planification'] = $this->data['risk_planification'][0]['Argumentation_risk_planification'];
				$this->data['Modification_risk_planification'] = $this->data['risk_planification'][0]['Modification_risk_planification'];
			}
			$this->load->view('Employee/Risk_planificationMod/Add_risk_planification.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_risk_planification()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_risk_planification";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['processcategory'] = $_GET['processcategory'];

			if ($_GET) {
				$this->data['ID_risk_planification'] = $_GET['ID_risk_planification'];
			}

			$this->Mrisk_planification->delete_risk_planification($_GET['ID_risk_planification']);

			return redirect(base_url() . 'Employee_Account/List_risk_planification_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/***************************************************************************/
	/***************************************************************************/
	/****************************** process *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_process()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_process";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/processMod/Add_process.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_process()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_process";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if (isset($_POST['update_doc'])) {
				$this->data['update_doc'] = $_POST['update_doc'];
			}
			/*************************Upload File*********************************/
			if ($_FILES['Picture_process']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['Picture_process']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['Picture_process']['tmp_name'];
				$fileDestination = './uploads/process/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/


			if ($_POST) {
				$this->data = array(
					'Name_process' => $_POST['Name_process'],
					'Picture_process' => $insertfile,
				);
				if ($_POST['ID_process']) {
					//echo 'heey'; die();
					$ID_process = $_POST['ID_process'];
					$this->Mprocess->edit_process($this->data, $ID_process);
				} else {
					$this->Mprocess->add_process($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_process');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_process()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_process";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mprocess->get_process_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['process'] = $this->Mprocess->get_process_paging($page);
			}
			$this->data['nb'] = $this->Mprocess->get_process_nb_page();

			/******************End Paging******************************/
			//	$this->data['process'] = $this->Mprocess->get_process();
			$this->load->view('Employee/processMod/List_process.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_process()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_process";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_process'] = $_GET['ID_process'];
				$this->data['process'] = $this->Mprocess->get_process_by_ID($this->data['ID_process']);
				$this->data['Name_process'] = $this->data['process'][0]['Name_process'];
				$this->data['Picture_process'] = $this->data['process'][0]['Picture_process'];
			}
			$this->load->view('Employee/processMod/Add_process.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_process()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_process";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_process'] = $_GET['ID_process'];
				$this->data['process'] = $this->Mprocess->delete_process($this->data['ID_process']);
			}
			return redirect(base_url() . 'Employee_Account/List_process');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/***************************************************************************/
	/****************************** field *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_field()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_field";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/fieldMod/Add_field.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_field()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_field";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				$this->data = array(
					'Title_field' => $_POST['Title_field'],
				);
				if ($_POST['ID_field']) {
					//echo 'heey'; die();
					$ID_field = $_POST['ID_field'];
					$this->Mfield->edit_field($this->data, $ID_field);
				} else {
					$this->Mfield->add_field($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_field');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_field()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_field";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mfield->get_field_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['field'] = $this->Mfield->get_field_paging($page);
			}
			$this->data['nb'] = $this->Mfield->get_field_nb_page();

			/******************End Paging******************************/
			//	$this->data['field'] = $this->Mfield->get_field();
			$this->load->view('Employee/fieldMod/List_field.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_field()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_field";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_field'] = $_GET['ID_field'];
				$this->data['field'] = $this->Mfield->get_field_by_ID($this->data['ID_field']);
				$this->data['Title_field'] = $this->data['field'][0]['Title_field'];
			}
			$this->load->view('Employee/fieldMod/Add_field.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_field()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_field";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_field'] = $_GET['ID_field'];
				$this->data['field'] = $this->Mfield->delete_field($this->data['ID_field']);
			}
			return redirect(base_url() . 'Employee_Account/List_field');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/**************************************************************************/
	/**************************************************************************/
	/********************************* New ************************************/
	/**************************************************************************/
	/**************************************************************************/


	/**************************************************************************/
	/**************************************************************************/
	/******************************* Training *********************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_training()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/


			//echo $_GET['ID_training_programm'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_training_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['training'] = $this->Mtraining->get_training_paging($page);
			}
			$this->data['nb'] = $this->Mtraining->get_training_nb_page();

			/******************End Paging******************************/


			//	$this->data['training'] = $this->Mtraining->get_training();
			$this->load->view('Employee/TrainingsMod/List_training.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_training()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['training_group'] = $this->Mtraining->get_all_training_group();
			$this->data['organization'] = $this->Mtraining->get_all_organization();
			$this->data['employee'] = $this->Mskillemployee->get_employees();
			$this->data['request'] = $this->Mtraining->get_all_training_group_request();

			$this->data['ID_status_training'] = $_GET['ID_status_training'];

			$this->load->view('Employee/trainingsMod/Add_training.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		$ID_organization = 0;
		$ID_employee = 0;
		if (isset($_POST['ID_organization'])) {
			$ID_organization = $_POST['ID_organization'];
		}
		if (isset($_POST['ID_employee'])) {
			$ID_employee = $_POST['ID_employee'];
		}
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				if (isset($_POST['ID_training_group_request'])) {
					$ID_training_group_request = $_POST['ID_training_group_request'];
				} else {
					$ID_training_group_request = 0;
				}
				$this->data = array(
					'Title_training_programm' => $_POST['Title_training_programm'],
					'ID_training_group' => $_POST['ID_training_group'],
					'ID_organization' => $ID_organization,
					'ID_employee' => $ID_employee,
					'Title_training_programm' => $_POST['Title_training_programm'],
					'Hours_training_programm' => $_POST['Hours_training_programm'],
					'Budget_training_programm' => $_POST['Budget_training_programm'],
					'Place_training_programm' => $_POST['Place_training_programm'],
					'Startdate_training_programm' => $_POST['Startdate_training_programm'],
					'Enddate_training_programm' => $_POST['Enddate_training_programm'],
					'Year_training_programm' => $_POST['Startdate_training_programm'],
					'Createdby_training_programm' => $this->session->userdata('ID_employee'),
					'ID_status_training' =>  $_POST['ID_status_training'],
					'ID_training_group_request' =>  $ID_training_group_request,

					//	'ismain' => $ismain,
					//	'parent' => $parent,
				);
				if ($_POST['ID_training_programm']) {
					//echo 'heey'; die();
					$ID_training_programm = $_POST['ID_training_programm'];

					$this->Mtraining->edit_training($this->data, $ID_training_programm);
				} else {
					$this->Mtraining->add_training($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_trainings?ID_status_training=' . $_POST['ID_status_training']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_training()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_training_programm'] = $_GET['ID_training_programm'];
				$this->data['training'] = $this->Mtraining->get_training_by_ID($this->data['ID_training_programm']);
				//$this->data['parent'] = $this->data['training'][0]['parent'];
				$this->data['Title_training_programm'] = $this->data['training'][0]['Title_training_programm'];
				$this->data['Title_training_programm'] = $this->data['training'][0]['Title_training_programm'];
			}
			$this->load->view('Employee/trainingsMod/Add_training.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_training()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//echo 'hi';
			//die();
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_training_programm'] = $_GET['ID_training_programm'];
				$this->data['training'] = $this->Mtraining->delete_training($this->data['ID_training_programm']);
			}
			return redirect(base_url() . 'Employee_Account/List_training');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Create_training()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['trainings'] = $this->Mtraining->get_training_program();

			$this->load->view('Employee/TrainingsMod/List_create_training.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_trainings()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			/********************** Type Request ************************/
			if (isset($_GET['ID_status_training'])) {
				$this->data['ID_status_training'] = $_GET['ID_status_training'];
			}
			/****************** End Type Request ************************/
			/********************** Type Request ************************/
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_Revision = array(
						'Revisedby_requests' => $this->session->userdata('ID_employee'),
						'Date_revision_requests' => date('Y-m-d H:i:s'),

					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
					//echo "done" ; die();
				}
				if ($_GET['action'] == "refuse") {
					$data_Revision = array(
						'Revisedby_requests' => $this->session->userdata('ID_employee'),
						'Date_revision_requests' => date('Y-m-d H:i:s'),
						'Date_validation_requests' => date('Y-m-d H:i:s'),

						'Refusedstatus_requests' => 1,
					);
					$this->Mdoc_request->edit_doc_request($data_Revision, $_GET['ID_requests']);
				}
				//die();
			}
			/****************** End Type Request ************************/


			$this->data['training_request'] = $this->Mtraining->get_trainings();

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_Training_paging_by_type($page, $this->data['ID_status_training']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_Training_nb_page_by_type($this->data['ID_status_training']);
			}
			$this->data['doc_requests'] = $this->Mtraining->get_Training_paging_by_type($page, $this->data['ID_status_training']);
			/******************End Paging******************************/
			/*echo "<pre>";
		    echo print_r($this->data['training_request']);
		    echo "<pre>";
		    die();*/
			//echo $this->data['ID_status_training'].'//'. $this->data['current_department'];
			//die();
			$this->load->view('Employee/trainingsMod/List_trainings.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_training_group()
	{
		if (isset($_GET['ID_training_group'])) {
			$this->data['ID_training_group'] = $_GET['ID_training_group'];
			$this->data['employees'] = $this->Mtraining->get_employee_by_group_training($this->data['ID_training_group']);
			//echo print_r($this->data['employees']);
			//die();
		}
		$this->data['group'] = $this->Mskill->get_group_training();
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_group_training_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_group_training_nb_page();
			}
			$this->data['group'] = $this->Mtraining->get_group_training_paging($page);
			/******************End Paging******************************/


			$this->load->view('Employee/trainingsMod/List_training_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	////////////////*************Training Programm*************/////////////////

	public function List_trainings_program()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$year = $_GET['Year_training_programm'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_Training_by_year_paging($page, $year) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_Training_by_year_nb_page($year);
			}
			$this->data['trainings'] = $this->Mtraining->get_Training_by_year_paging($page, $year);

			$this->load->view('Employee/trainingsMod/List_trainings_program.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function List_trainings_eval_choise()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['Year_training_programm'] = $_GET['Year_training_programm'];

			$this->load->view('Employee/trainingsMod/List_trainings_eval_choise.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_trainings_eval_emp()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$year = $_GET['Year_training_programm'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_Training_eval_emp_paging($page, $year) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_Training_eval_emp_nb_page($year);
			}
			$this->data['trainings'] = $this->Mtraining->get_Training_eval_emp_paging($page, $year);
			/*echo "<pre>";
			echo print_r($this->data['trainings']);
			echo "<pre>";
			die();*/
			$this->data['doc_upload'] = $this->Mtraining->get_doc_upload(1);
			$this->data['URL_link_document_upload'] = $this->data['doc_upload'][0]['URL_link_document_upload'];
			$this->data['File_document_upload'] = $this->data['doc_upload'][0]['File_document_upload'];

			$this->load->view('Employee/trainingsMod/List_trainings_program.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_trainings_eval_all()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$year = $_GET['Year_training_programm'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_Training_eval_all_paging($page, $year) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_Training_eval_all_nb_page($year);
			}
			$this->data['trainings'] = $this->Mtraining->get_Training_eval_all_paging($page, $year);
			/*	echo "<pre>";
			echo print_r($this->data['trainings']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/trainingsMod/List_trainings_program_all.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function View_trainings_eval_by_prog()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_training_programm'] = $_GET['ID_training_programm'];
			$this->data['Year_training_programm'] = $_GET['Year_training_programm'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining->get_trainings_eval_by_prog1_paging($page, $this->data['ID_training_programm']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining->get_trainings_eval_by_prog_nb_page($this->data['ID_training_programm']);
			}
			$this->data['trainings1'] = $this->Mtraining->get_trainings_eval_by_prog1_paging($page, $this->data['ID_training_programm']);
			$this->data['trainings2'] = $this->Mtraining->get_trainings_eval_by_prog2_paging($page, $this->data['ID_training_programm']);


			/*	echo "<pre>";
			echo print_r($this->data['trainings1']);
			echo "<pre>";

			echo "<pre>";
			echo print_r($this->data['trainings2']);
			echo "<pre>";
			die();*/


			$this->load->view('Employee/trainingsMod/List_trainings_eval_by_prog.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_training_evaluation_emp()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*************************Upload File*********************************/
			//echo $_FILES['File_training_evaluation_emp']['name'];die();
			if ($_FILES['File_training_evaluation_emp']['name'] == "") {
				$insertfile = '';
				//	echo 'hhhhh';die();
			} else {
				//echo'else';die();
				$fileimg = $_FILES['File_training_evaluation_emp']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_training_evaluation_emp']['tmp_name'];
				$fileDestination = './uploads/Training_eval_emp/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//echo $_POST[''];
			//die();
			//echo $_POST['Year_training_programm'];
			//echo $_POST['ID_training_programm'];

			//die();
			$this->data['Year_training_programm'] = $_POST['Year_training_programm'];
			if ($_POST) {
				$this->data = array(
					'ID_training_programm' => $_POST['ID_training_programm'],
					'Objectif_training_evaluation_emp' => $_POST['Objectif_training_evaluation_emp'],
					'File_training_evaluation_emp' => $insertfile,
					'ID_employee' => $this->session->userdata('ID_employee')
				);
				//echo print_r($insertfile);die();


				$this->Mtraining->insert_training_evaluation_emp($this->data);
			}
			return redirect(base_url() . 'Employee_Account/List_trainings_eval_emp?Year_training_programm=' . $_POST['Year_training_programm']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function delete_training_evaluation_emp()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_training_evaluation_emp'] = $_GET['ID_training_evaluation_emp'];
				$this->data['Year_training_programm'] = $_GET['Year_training_programm'];
			}

			$this->Mtraining->delete_training_evaluation_emp($_GET['ID_training_evaluation_emp']);

			return redirect(base_url() . 'Employee_Account/List_trainings_eval_emp?Year_training_programm=' . $_GET['Year_training_programm']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/******************************* Training Requests ************************/
	/**************************************************************************/
	/**************************************************************************/

	public function Training_request()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			$this->data['nb'] = 1;
			if ($this->Mtraining_request->get_Training_request_paging_accepted($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining_request->get_Training_request_nb_page_accepted();
			}
			$this->data['training_request'] = $this->Mtraining_request->get_Training_request_paging_accepted($page);
			//echo print_r($this->data['training_request']);
			//die();

			/******************End Paging******************************/
			$this->load->view('Employee/training_requestMod/List_training_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Training_request_employee()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			$this->data['nb'] = 1;
			if ($this->Mtraining_request->get_Training_request_paging_by_employee($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining_request->get_Training_request_nb_page_by_employee();
			}
			$this->data['training_request'] = $this->Mtraining_request->get_Training_request_paging_by_employee($page);
			//echo print_r($this->data['training_request']);
			//die();

			/******************End Paging******************************/
			$this->load->view('Employee/training_requestMod/List_training_request_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Training_request_director()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if (isset($_GET['ID_training_request'])) {
				$this->data['ID_training_request'] = $_GET['ID_training_request'];
			}
			/********************** Type Request ************************/
			$this->data['validation_form'] = 1;
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_validation = array(
						'Validatedby_training_request' => $this->session->userdata('ID_employee'),
						'Date_validation_training_request' => date('Y-m-d H:i:s'),

					);
					$this->Mtraining_request->edit_training_request($data_validation, $this->data['ID_training_request']);
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Validatedby_training_request' => $this->session->userdata('ID_employee'),
						'Date_validation_training_request' => date('Y-m-d H:i:s'),
						'Refusedstatus_training_request' => 1,
					);
					$this->Mtraining_request->edit_training_request($data_validation, $this->data['ID_training_request']);
				}
				//die();
				//$this->data['document_version'] =	$this->Mtraining_request->get_document_by_version($_GET['ID_version']);
				//$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
				//$this->load->view('Employee/training_requestMod/List_training_request_director.php', $this->data);

			}

			/****************** End Type Request ************************/


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			$this->data['nb'] = 1;
			if ($this->Mtraining_request->get_Training_request_paging_by_employee($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining_request->get_Training_request_nb_page_by_employee();
			}
			$this->data['training_request'] = $this->Mtraining_request->get_Training_request_paging_by_employee($page);
			//echo print_r($this->data['training_request']);
			//die();

			/******************End Paging******************************/
			$this->load->view('Employee/training_requestMod/List_training_request_director.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*************accept from qse ******************/
	public function Training_request_director_qse()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if (isset($_GET['ID_training_request'])) {
				$this->data['ID_training_request'] = $_GET['ID_training_request'];
			}
			/********************** Type Request ************************/
			$this->data['validation_form'] = 1;
			if (isset($_GET['action'])) {
				if ($_GET['action'] == "accept") {
					$data_validation = array(
						'Validatedby_training_request' => $this->session->userdata('ID_employee'),
						'Date_validation_training_request' => date('Y-m-d H:i:s'),
					);

					$this->Mtraining_request->edit_training_request($data_validation, $this->data['ID_training_request']);
				}
				if ($_GET['action'] == "refuse") {
					$data_validation = array(
						'Validatedby_training_request' => $this->session->userdata('ID_employee'),
						'Date_validation_training_request' => date('Y-m-d H:i:s'),
						'Refusedstatus_training_request' => 1,
					);
					$this->Mtraining_request->edit_training_request($data_validation, $this->data['ID_training_request']);
				}
				//die();
				//$this->data['document_version'] =	$this->Mtraining_request->get_document_by_version($_GET['ID_version']);
				//$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
				//$this->load->view('Employee/training_requestMod/List_training_request_director.php', $this->data);

			}

			/****************** End Type Request ************************/


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			$this->data['nb'] = 1;
			if ($this->Mtraining_request->get_Training_request_paging_by_group($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining_request->get_Training_request_nb_page_by_group();
			}
			$this->data['training_request'] = $this->Mtraining_request->get_Training_request_paging_by_group($page);
			//echo print_r($this->data['training_request']);
			//die();

			/******************End Paging******************************/
			$this->load->view('Employee/Training_requestMod/List_training_request_director_qse.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Training_request_qse()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			$this->data['nb'] = 1;
			if ($this->Mtraining_request->get_Training_request_paging_by_group($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mtraining_request->get_Training_request_nb_page_by_group();
			}
			$this->data['training_request'] = $this->Mtraining_request->get_Training_request_paging_by_group($page);
			//echo print_r($this->data['training_request']);
			//die();
			$this->data['group'] = $this->Mtraining_group_request->get_training_group_requests();

			/******************End Paging******************************/
			$this->load->view('Employee/training_requestMod/List_training_request_qse.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_training_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_current_employee'] = $this->session->userdata('ID_employee');
			//echo $this->data['ID_current_employee'];
			//die();

			$this->load->view('Employee/training_requestMod/Add_training_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_training_employee_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['group_training'] = $this->Mtraining_group_request->get_training_group_requests();

			$this->load->view('Employee/training_requestMod/Add_training_employee_request.php', $this->data);
			/*************************Access Verif************************/
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_POST) {
				$this->data = array(
					'Type_training_request' => 1,
					'Title_training_request' => $_POST['Title_training_request'],
					'Description_training_request' => $_POST['Description_training_request'],
					'Createdby_training_request' => $_POST['Createdby_training_request'],
					'ID_training_group_request' => $_POST['ID_training_group_request'],
					'Date_creation_training_request' => date('Y-m-d H:i:s'),
				);
				//echo $_POST['Title_training_request']; die();
				//echo print_r($this->data);
				//die();
				if ($_POST['ID_training_request']) {
					$ID_training_request = $_POST['ID_training_request'];

					$this->Mtraining_request->edit_training_request($this->data, $ID_training_request);
				} else {
					$this->Mtraining_request->add_training_request($this->data);
				}
			}
			if ($_POST['ID_training_group_request'] == 0) {
				return redirect(base_url() . 'Employee_Account/Training_request_employee');
			} else {
				return redirect(base_url() . 'Employee_Account/Training_request_qse');
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training_group_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//echo "here";
			//die();
			if ($_POST) {
				//$this->data['ID_skill'] = $_POST['ID_skill'];

				$this->data_training_group = array(
					'Name_training_group_request' => $_POST['Name_training_group_request'],
					//'Description_training_group' => $_POST['Description_training_group'],
				);

				$this->Mtraining_group_request->add_training_group_request($this->data_training_group);
				return redirect(base_url() . 'Employee_Account/Training_request_qse', $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_training_group_employee_request()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_training_group_request'] = $_GET['ID_training_group_request'];

			$this->data['employee_list'] = $this->Mtraining_group_request->get_employee_request($this->data['ID_training_group_request']);

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mtraining_group_request->get_training_group_employee_request_paging($this->data['ID_training_group_request'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['employees'] = $this->Mtraining_group_request->get_training_group_employee_request_paging($this->data['ID_training_group_request'], $page);
			}
			$this->data['nb'] = $this->Mtraining_group_request->get_training_group_employee_request_nb_page($this->data['ID_training_group_request']);

			//echo print_r($this->data['employees']);
			//die();
			/******************End Paging******************************/
			$this->load->view('Employee/training_requestMod/Add_training_group_employee_request.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training_group_employee_request()
	{

		//	echo "hiiii"; die();
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_training_group_request'] = $_POST['ID_training_group_request'];

			if ($_POST) {
				$this->data_training_group = array(
					'ID_employee' => $_POST['ID_employee'],
					'ID_training_group_request' => $_POST['ID_training_group_request'],

				);

				$this->Mtraining_group_request->add_training_group_employee_request($this->data_training_group);
				return redirect(base_url() . 'Employee_Account/Form_add_training_group_employee_request?ID_training_group_request=' . $this->data['ID_training_group_request'], $this->data);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_training_group_request()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_training_group_request'] = $_GET['ID_training_group_request'];
				//echo $this->data['ID_training_group_request'];
				//die();
				$this->Mtraining_group_request->delete_training_group_employee_request($this->data['ID_training_group_request']);
				$this->Mtraining_group_request->delete_training_group_request($this->data['ID_training_group_request']);
			}
			return redirect(base_url() . 'Employee_Account/Training_request_qse');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_training_group_request_ID()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['ID_training_group_request'] = $_GET['ID_training_group_request'];

				//echo $this->data['ID_training_group_request'];
				//die();
				$this->Mtraining_group_request->delete_training_group_employee_request_ID($this->data['ID_employee']);
			}
			return redirect(base_url() . 'Employee_Account/Form_add_training_group_employee_request?ID_training_group_request=' . $this->data['ID_training_group_request'], $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/*************************** End Training Requests ************************/
	/**************************************************************************/
	/**************************************************************************/

	/**************************************************************************/
	/**************************************************************************/
	/******************************** Recuitment ******************************/
	/**************************************************************************/
	/**************************************************************************/


	public function List_recuitment_eval()
	{

		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mrecuitment->get_recuitment_eval_emp_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mrecuitment->get_recuitment_eval_emp_nb_page();
			}
			$this->data['recuitments'] = $this->Mrecuitment->get_recuitment_eval_emp_paging($page);
			/*echo "<pre>";
					echo print_r($this->data['recuitments']);
					echo "<pre>";
					die();*/
			$this->data['doc_upload'] = $this->Mrecuitment->get_doc_upload(2);
			$this->data['URL_link_document_upload'] = $this->data['doc_upload'][0]['URL_link_document_upload'];
			$this->data['File_document_upload'] = $this->data['doc_upload'][0]['File_document_upload'];

			$this->load->view('Employee/RecuitmentMod/List_recuitment_eval.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_recuitment_programm()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/* $this->data['recuitment_programm'] = $this->Mrecuitment->get_recuitment_programm_by_ID_company($this->data['ID_company']);
			$this->data['ID_recuitment_programm'] = $this->data['recuitment_programm'][0]['ID_recuitment_programm'];
			$this->data['Name_Candidat'] = $this->data['recuitment_programm'][0]['Name_Candidat'];
			$this->data['ID_employee'] = $this->data['recuitment_programm'][0]['ID_employee'];
			$this->data['Date_recuitment_programm'] = $this->data['recuitment_programm'][0]['Date_recuitment_programm'];
			$this->data['File_recuitment_programm'] = $this->data['recuitment_programm'][0]['File_recuitment_programm'];
			*/
			$this->data['responsable'] = $this->Maudit->get_all_employees();

			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/RecuitmentMod/Add_recuitment_programm.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_recuitment_programm()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_recuitment_programm']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_recuitment_programm']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_recuitment_programm']['tmp_name'];
				$fileDestination = './uploads/Document_upload_rec/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company' => $this->data['ID_company'],
				'ID_employee' => $_POST['ID_employee'],
				'Name_Candidat' => $_POST['Name_Candidat'],
				'Date_recuitment_programm' => $_POST['Date_recuitment_programm'],
				'File_recuitment_programm' => $insertfile,

			);
			if (isset($_POST['ID_recuitment_programm'])) {
				//echo $_POST['ID_recuitment_programm'];
				//die();
				$this->Mrecuitment->edit_recuitment_programm($this->data1, $_POST['ID_recuitment_programm']);
			} else {
				/*************************Add******************************/
				$this->Mrecuitment->add_recuitment_programm($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_recuitment_eval');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_recuitment_programm()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['responsable'] = $this->Maudit->get_all_employees();

				//echo 'hi'; die();
				$this->data['ID_recuitment_programm'] = $_GET['ID_recuitment_programm'];
				$this->data['recuitment_programm'] = $this->Mrecuitment->get_recuitment_programm_by_ID($this->data['ID_recuitment_programm']);
				$this->data['Name_Candidat'] = $this->data['recuitment_programm'][0]['Name_Candidat'];
				$this->data['ID_employee'] = $this->data['recuitment_programm'][0]['ID_employee'];
				$this->data['Date_recuitment_programm'] = $this->data['recuitment_programm'][0]['Date_recuitment_programm'];
				$this->data['File_recuitment_programm'] = $this->data['recuitment_programm'][0]['File_recuitment_programm'];
			}
			$this->load->view('Employee/RecuitmentMod/Add_recuitment_programm.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_recuitment_programm()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_recuitment_programm'] = $_GET['ID_recuitment_programm'];
			}

			$this->Mrecuitment->delete_recuitment_programm($_GET['ID_recuitment_programm']);

			return redirect(base_url() . 'Employee_Account/List_recuitment_eval');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/**************************** End Recuitment ******************************/
	/**************************************************************************/
	/**************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/**************************** Employees _new *******************************/
	/***************************************************************************/
	/***************************************************************************/
	public function List_employee_new()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//$this->data['ID_department'] = $_GET['ID_department'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Memployee_new->get_employee_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Memployee_new->get_employee_nb_page();
			}
			$this->data['posts_management'] = $this->Memployee_new->get_employee_paging($page);
			//echo print_r($this->data['posts_management']);die();
			/******************End Paging******************************/



			$this->data['doc_upload'] = $this->Mrecuitment->get_doc_upload(3);
			$this->data['URL_link_document_upload'] = $this->data['doc_upload'][0]['URL_link_document_upload'];
			$this->data['File_document_upload'] = $this->data['doc_upload'][0]['File_document_upload'];



			$this->load->view('Employee/EmployeeMod/List_employee_new.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_add_employee_new()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			//if ($_GET['ID_department']) {
			//$this->data['ID_department'] = $_GET['ID_department'];
			$this->commonData();
			$this->data['post'] = $this->Memployee_new->get_posts();

			$this->data['department'] = $this->Memployee_new->get_departments();

			$this->data['accessgroup'] = $this->Memployee_new->get_accessgroup_by_department();


			$this->load->view('Employee/EmployeeMod/Add_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_employee_new()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*************************Upload File*********************************/
			//echo $_FILES['File_integration_employee']['name'];die();
			if ($_FILES['File_integration_employee']['name'] == "") {
				$insertfile = '';
				//	echo 'hhhhh';die();
			} else {
				//echo'else';die();
				$fileimg = $_FILES['File_integration_employee']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_integration_employee']['tmp_name'];
				$fileDestination = './uploads/Document_upload_rec/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			if (isset($_POST)) {

				//$this->data['department'] = $this->Memployee_new->get_department_by_ID($this->data['ID_department']);
				//$this->data['Name_department'] = $this->data['department'][0]['Name_department'];
				//$this->data['ID_access_group'] = $_POST['ID_access_group'];
				if (isset($ID_access_group)) {
					$this->data['access_group'] = $this->Memployee_new->get_access_group_by_ID($this->data['ID_access_group']);
					$this->data['Name_access_group'] = $this->data['access_group'][0]['Name_access_group'];
					//$this->data_post['position'] = $this->Memployee_new->get_positions_by_department($this->data['ID_department']);
				}
				$this->data_employee = array(
					'Name_employee' => $_POST['Name_employee'],
					'Lastname_employee' => $_POST['Lastname_employee'],
					'Phone_employee' => $_POST['Phone_employee'],
					'Email_employee' => $_POST['Email_employee'],
					'File_integration_employee' => $insertfile,
					'Login_employee' => $_POST['Login_employee'],
					'Password_employee' => md5($_POST['Password_employee']),
					'Num_pwd_employee' => strlen($_POST['Password_employee']),
					'ID_department_post' => '0',
					'ID_access_group' => $_POST['ID_access_group'],
				);
				//echo $this->data_employee['Num_pwd_employee'];
				//echo $_POST['Password_employee'];
				//die();
				$this->data['department_post'] = $this->Memployee_new->add_employee($this->data_employee);
			}
			return redirect(base_url() . 'Employee_Account/List_employee_new');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Add_department_position()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->commonData();
			$ID_company = $this->session->userdata('ID_company');
			$this->data['ID_employee'] = $_GET['ID_employee'];

			$this->data['department'] = $this->Memployee_new->Department_by_Company($this->data['ID_company']);
			//	$this->data['position'] = $this->Mcompany->Get_position_by_company($ID_company);
			//echo print_r($this->data['department']);
			//die();
			$this->load->view('Employee/EmployeeMod/Add_department_position.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Add_position_department()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->commonData();
			$ID_company = $this->data['ID_company'];
			$this->data['ID_employee'] = $_POST['ID_employee'];
			$this->data['ID_department'] = $_POST['ID_department'];

			$this->data['department'] = $this->Memployee_new->Department_by_Company($ID_company);
			$this->data['position'] = $this->Memployee_new->Get_position_by_department($this->data['ID_department']);
			//echo $this->data['ID_department'];
			//echo print_r($this->data['position']);
			//die();

			$this->load->view('Employee/EmployeeMod/Add_position_department', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	function submit_department_position()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$ID_department = $_POST['ID_department'];
			$ID_position = $_POST['ID_post'];
			$ID_employee = $_POST['ID_employee'];

			//echo 'welcome finally';
			//die();
			$this->data =
				array(
					"ID_department" => $ID_department,
					"ID_post" => $ID_position,
				);

			$newID_department_post = $this->Memployee_new->edit_department_position($this->data);
			$this->Memployee_new->edit_department_position_for_employee($newID_department_post, $ID_employee);


			return redirect(base_url() . 'Employee_Account/List_employee_new');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_edit_employee_new()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//$this->data['ID_department']= $_GET['ID_department'];
				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Memployee_new->get_department_by_employee($this->data['ID_employee']);
				//$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				//	$this->data['positiondepartment'] = $this->Memployee_new->get_positions_by_department($this->data['ID_department']);
				$this->data['employee'] = $this->Memployee_new->get_employees_by_ID($this->data['ID_employee']);
				$this->data['accessgroup'] = $this->Memployee_new->get_accessgroup_by_department(/*$this->data['ID_department']*/);

				//echo print_r($this->data['employee']);
				//die();
				$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
				$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
				$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
				$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
				$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
				$this->data['Num_pwd_employee'] = $this->data['employee'][0]['Num_pwd_employee'];
				//	$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
				//	$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
				$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
				$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			}
			//$this->data['post'] = $this->Memployee_new->get_posts($this->data['ID_department']);

			$this->load->view('Employee/EmployeeMod/Add_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_employee_new()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Memployee_new->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['employee'] = $this->Memployee_new->delete_employee($this->data['ID_employee']);
			}
			return redirect(base_url() . 'Employee_Account/List_employee_new?ID_department=' . $this->data['ID_department']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_employee_new()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_employee'] = $_GET['ID_employee'];
				//echo ($_GET['ID_employee']); die();
				$this->data['employee'] = $this->Memployee_new->get_employees_by_ID($this->data['ID_employee']);
				//echo print_r($this->data['employee']);
				//die();
				$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
				$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
				$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
				$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
				$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
				$this->data['Num_pwd_employee'] = $this->data['employee'][0]['Num_pwd_employee'];
				$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
				//$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
				$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
				$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			}
			$this->load->view('Employee/EmployeeMod/View_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************************* End Employees _new **********************/
	/***************************************************************************/
	/***************************************************************************/

	/**************************************************************************/
	/**************************************************************************/
	/******************************** Audit Report ****************************/
	/**************************************************************************/
	/**************************************************************************/



	public function List_audit_report()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['audit_plan'] = $this->Maudit_plan->get_audit_plan_by_responsable($this->session->userdata('ID_employee'));
			//echo $this->session->userdata('ID_employee');
			//die();
			/*echo "<pre>";
			echo print_r($this->data['audit_plan']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/audit_planMod/List_audit_report.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_survey()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_audit'] = $_GET['ID_audit'];
			$this->data['ID_responsable'] = $this->session->userdata('ID_employee');

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Maudit_plan->get_survey_list_by_survey_paging($this->data['ID_audit'], $this->data['ID_responsable'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['checksurvey'] = $this->Maudit_plan->get_survey_list_by_survey_paging($this->data['ID_audit'], $this->data['ID_responsable'], $page);
			}
			$this->data['nb'] = $this->Maudit_plan->get_survey_list_by_survey_nb_page($this->data['ID_audit'], $this->data['ID_responsable']);

			$this->data['mission'] = $this->Maudit->get_cheeklist_mission($_GET['ID_audit']);
			$this->data['mission1'] = $this->Maudit->get_cheeklist_mission_step2($_GET['ID_audit']);

			/******************End Paging******************************/
			$this->load->view('Employee/audit_planMod/List_survey.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_fill_survey()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_audit'] = $_GET['ID_audit'];
			$this->data['ID_survey'] = $_GET['ID_survey'];
			//$this->data['auditlist'] = $this->Maudit_plan->get_survey_by_audit($this->data['ID_audit']);

			//echo $this->data['ID_audit'];
			//die();
			$this->data['action_type'] = $this->Maudit_plan->get_action_type();

			$this->load->view('Employee/audit_planMod/Fill_survey.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_fill_survey()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit_report";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$ID_audit = $_POST['ID_audit'];
			$ID_survey = $_POST['ID_survey'];
			//echo $_POST['ID_audit'] ; die();
			if ($_POST) {
				$this->data = array(
					'Corrective_survey' => $_POST['Corrective_survey'],
					'ID_type' => $_POST['ID_type'],

					//	'Delay_survey' => date('Y-m-d H:i:s'),
				);
				$this->Maudit_plan->edit_survey($this->data, $ID_survey);
			}

			return redirect(base_url() . 'Employee_Account/List_survey?ID_audit=' . $ID_audit);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/**************************** End Audit Report ****************************/
	/**************************************************************************/
	/**************************************************************************/

	public function Contexte()
	{
	}
	public function Leadership()
	{
	}
	public function Planification()
	{
	}
	public function Support()
	{
	}
	public function Realisation()
	{
	}
	public function Evaluation()
	{
	}
	public function Amelioration()
	{
	}

	/**************************************************************************/
	/**************************************************************************/
	/********************************** Audit *********************************/
	/**************************************************************************/
	/**************************************************************************/


	public function List_audit()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['plan'] = $this->Maudit->get_audit_Plan();
			$this->load->view('Employee/auditMod/Plan_Audit.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/*******View Plan audit ******/
	public function Form_View_Plan()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {

				$this->data['ID_audit_plan'] = $_GET['ID_audit_plan'];
				//	echo $this->data['ID_audit_plan'];
				//	die();
			}
			$this->data['oneplan'] = $this->Maudit->get_plan_by_ID($this->data['ID_audit_plan']);
			$this->data['ID_audit_plan'] = $this->data['oneplan'][0]['ID_audit_plan'];
			$this->data['Create_date_audit_plan'] = $this->data['oneplan'][0]['Create_date_audit_plan'];
			$this->data['Year_audit_plan'] = $this->data['oneplan'][0]['Year_audit_plan'];
			/******liste des processus d'au audit interne *****/
			$this->data['processus_list'] = $this->Maudit->get_processus_audit_list($this->data['ID_audit_plan']);
			$this->data['processus'] = $this->Maudit->get_processus_audit($this->data['ID_audit_plan']);

			/*	echo "<pre>";
				echo print_r($this->data['processus']);
				echo "<pre>";
				die();*/
			$this->load->view('Employee/auditMod/View_Plan.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/********************************New*********************************************/
	public function View_Steps()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			/***********liste processus by departement *****/
			//	$this->data['processus'] = $this->Maudit->get_processus_departement($this->data['ID_departement'], $this->data['ID_audit']);
			/*******************************Info Audit**************************** */
			$this->data['infoaudit'] = $this->Maudit->get_audit_by_id($_GET['ID_audit']);
			//	echo print_r($this->data['infoaudit']);
			//	die();
			$this->data['ID_processus'] = $this->data['infoaudit'][0]['ID_processus'];
			$this->data['Title_processus'] = $this->data['infoaudit'][0]['Title_processus'];
			$this->data['ID_referencial'] = $this->data['infoaudit'][0]['ID_rerencial'];
			$this->data['Name_rerencial'] = $this->data['infoaudit'][0]['Name_rerencial'];
			$this->data['Version_rerencial'] = $this->data['infoaudit'][0]['Version_rerencial'];
			$this->data['Mission_audit'] = $this->data['infoaudit'][0]['Mission_audit'];
			$this->data['Membre_audit'] = $this->data['infoaudit'][0]['Membre_audit'];
			$this->data['Auditeur'] = $this->data['infoaudit'][0]['Auditeur'];
			$this->data['Name_employee'] = $this->data['infoaudit'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['infoaudit'][0]['Lastname_employee'];
			$this->data['planned_date_audit'] = $this->data['infoaudit'][0]['planned_date_audit'];
			$this->data['Result_audit'] = $this->data['infoaudit'][0]['Result_audit'];
			$this->data['Type_audit'] = $this->data['infoaudit'][0]['Type_audit'];
			$this->data['ID_audit'] = $this->data['infoaudit'][0]['ID_audit'];
			$this->data['Description_audit'] = $this->data['infoaudit'][0]['Description_audit'];
			$this->data['objectif'] = $this->data['infoaudit'][0]['objectif'];
			$this->data['domaine'] = $this->data['infoaudit'][0]['domaine'];
			$this->data['methodologie'] = $this->data['infoaudit'][0]['methodologie'];
			$this->data['evaluation'] = $this->data['infoaudit'][0]['evaluation'];
			$this->data['Lieu_audit'] = $this->data['infoaudit'][0]['Lieu_audit'];

			/*******************************End info Audiy **************************/
			/********liste Constat **********/
			$this->data['listeConstat'] = $this->Maudit->get_constat_by_id($_GET['ID_audit']);
			/*	echo "<pre>";
		echo print_r(($this->data['listeConstat']));
		echo "<pre>";
		die();*/
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Maudit->get_Ligne_Processus_paging($this->data['ID_audit'], $page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['listeProcessus'] = $this->Maudit->get_Ligne_Processus_paging($this->data['ID_audit'], $page);
				//	echo print_r($this->data['listeProcessus']);die();
			}
			$this->data['nb'] = $this->Maudit->get_Ligne_Processus_nb_page($this->data['ID_audit']);

			/******************End Paging******************************/
			$this->data['constat'] = $this->Maudit->get_constat();

			$this->load->view('Employee/auditMod/View_Steps.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Steps_imp()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			/***********liste processus by departement *****/
			//	$this->data['processus'] = $this->Maudit->get_processus_departement($this->data['ID_departement'], $this->data['ID_audit']);
			/*******************************Info Audit**************************** */
			$this->data['infoaudit'] = $this->Maudit->get_audit_by_id($_GET['ID_audit']);
			//	echo print_r($this->data['infoaudit']);
			//	die();
			$this->data['ID_processus'] = $this->data['infoaudit'][0]['ID_processus'];
			$this->data['Title_processus'] = $this->data['infoaudit'][0]['Title_processus'];
			$this->data['ID_referencial'] = $this->data['infoaudit'][0]['ID_rerencial'];
			$this->data['Name_rerencial'] = $this->data['infoaudit'][0]['Name_rerencial'];
			$this->data['Version_rerencial'] = $this->data['infoaudit'][0]['Version_rerencial'];
			$this->data['Mission_audit'] = $this->data['infoaudit'][0]['Mission_audit'];
			$this->data['Membre_audit'] = $this->data['infoaudit'][0]['Membre_audit'];
			$this->data['Auditeur'] = $this->data['infoaudit'][0]['Auditeur'];
			$this->data['Name_employee'] = $this->data['infoaudit'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['infoaudit'][0]['Lastname_employee'];
			$this->data['planned_date_audit'] = $this->data['infoaudit'][0]['planned_date_audit'];
			$this->data['Result_audit'] = $this->data['infoaudit'][0]['Result_audit'];
			$this->data['Type_audit'] = $this->data['infoaudit'][0]['Type_audit'];
			$this->data['ID_audit'] = $this->data['infoaudit'][0]['ID_audit'];
			$this->data['Description_audit'] = $this->data['infoaudit'][0]['Description_audit'];
			$this->data['objectif'] = $this->data['infoaudit'][0]['objectif'];
			$this->data['domaine'] = $this->data['infoaudit'][0]['domaine'];
			$this->data['methodologie'] = $this->data['infoaudit'][0]['methodologie'];
			$this->data['evaluation'] = $this->data['infoaudit'][0]['evaluation'];
			$this->data['Lieu_audit'] = $this->data['infoaudit'][0]['Lieu_audit'];

			/*******************************End info Audiy **************************/
			/********liste Constat **********/
			$this->data['listeConstat'] = $this->Maudit->get_constat_by_id($_GET['ID_audit']);
			//echo "<pre>";
			//echo print_r(($this->data['listeConstat']));
			//echo "<pre>";
			//die();


			/******************End Paging******************************/

			$this->load->view('Employee/auditMod/View_Steps_imp.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*****load view add audit ********/
	public function Form_add_audit()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_audit_plan'] = $_GET['ID_audit_plan'];
			}



			//echo $this->data['ID_audit_plan'];die();
			$this->data['referencial'] = $this->Maudit->get_all_referencial();
			//	$this->data['team'] = $this->Maudit->get_team();
			$this->data['processus'] = $this->Maudit->get_all_processus($this->session->userdata('ID_employee'));
			/**************liste employee ********/
			$this->data['employee'] = $this->Maudit->get_all_employees();

			$this->load->view('Employee/auditMod/Add_Audit.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/********insert audit intern ******/
	public function Submit_add_audit()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_POST) {

				$this->data = array(
					'Create_date_audit' => $_POST['Create_date_audit'],
					'Mission_audit' => $_POST['Mission_audit'],
					'ID_rerencial' => $_POST['ID_referencial'],
					'Lieu_audit' => $_POST['Lieu_audit'],
					'planned_date_audit' => $_POST['planned_date_audit'],
					'ID_audit_plan' => $_POST['ID_audit_plan'],
					'Type_audit' => $_POST['Type_audit'],
					'Auditeur' => $_POST['Auditeur'],
					'Membre_audit' => $_POST['Membre_audit'],
					'ID_processus' => $_POST['ID_processus']


				);

				$this->Maudit->add_audit($this->data);
			}
			//echo 	$this->data['ID_audit_new'];die();
			//	return redirect(base_url() . 'Employee_Account/Form_View_Plan?ID_audit_plan=' . $_POST['ID_audit_plan']);
			return redirect(base_url() . 'Employee_Account/Form_View_Plan?ID_audit_plan=' . $_POST['ID_audit_plan']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*********submit add les info audit description/objectif/domaine/methodologie/evaluation */
	public function submit_add_steps()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//

				if ($_GET['add'] == 1) {
					if ($_POST) {
						$this->data = array(
							'Description_audit' => $_POST['Description_audit']
						);
					}
				}
				if ($_GET['add'] == 2) {
					if ($_POST) {
						$this->data = array(
							'objectif' => $_POST['objectif']
						);
					}
				}
				if ($_GET['add'] == 3) {
					if ($_POST) {
						$this->data = array(
							'domaine' => $_POST['domaine']
						);
					}
				}
				if ($_GET['add'] == 4) {
					if ($_POST) {
						$this->data = array(
							'methodologie' => $_POST['methodologie']
						);
					}
				}
				if ($_GET['add'] == 5) {
					if ($_POST) {
						$this->data = array(
							'evaluation' => $_POST['evaluation']
						);
					}
				}
				if ($_GET['add'] == 6) {
					if ($_POST) {
						$this->data = array(
							'Result_audit' => $_POST['Result_audit']
						);
					}
				}
				$this->Maudit->update_audit($this->data, $_POST['ID_audit']);
			}
			return redirect(base_url() . 'Employee_Account/View_Steps?ID_audit=' . $_POST['ID_audit']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*********submit Edit les info audit description/objectif/domaine/methodologie/evaluation */
	public function submit_update_steps()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//add
				if ($_GET['update'] == 1) {
					if ($_POST) {
						$this->data = array(
							'Description_audit' => $_POST['Description_audit']
						);
					}
				}
				if ($_GET['update'] == 2) {
					if ($_POST) {
						$this->data = array(
							'objectif' => $_POST['objectif']
						);
					}
				}
				if ($_GET['update'] == 3) {
					if ($_POST) {
						$this->data = array(
							'domaine' => $_POST['domaine']
						);
					}
				}
				if ($_GET['update'] == 4) {
					if ($_POST) {
						$this->data = array(
							'methodologie' => $_POST['methodologie']
						);
					}
				}
				if ($_GET['update'] == 5) {
					if ($_POST) {
						$this->data = array(
							'evaluation' => $_POST['evaluation']
						);
					}
				}
				if ($_GET['update'] == 6) {
					if ($_POST) {
						$this->data = array(
							'Result_audit' => $_POST['Result_audit']
						);
					}
				}
				$this->Maudit->update_audit($this->data, $_POST['ID_audit']);
			}
			return redirect(base_url() . 'Employee_Account/View_Steps?ID_audit=' . $_POST['ID_audit']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*********submit delete les info audit description/objectif/domaine/methodologie/evaluation */
	public function submit_delete_steps()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {

				if ($_GET['delete'] == 1) {
					$this->data = array(
						'Description_audit' => ""
					);
				}
				if ($_GET['delete'] == 2) {
					$this->data = array(
						'objectif' => ""
					);
				}
				if ($_GET['delete'] == 3) {
					$this->data = array(
						'domaine' => ""
					);
				}
				if ($_GET['delete'] == 4) {

					$this->data = array(
						'methodologie' => ""
					);
				}
				if ($_GET['delete'] == 5) {

					$this->data = array(
						'evaluation' => ""
					);
				}
				if ($_GET['delete'] == 6) {

					$this->data = array(
						'Result_audit' => ""
					);
				}
				$this->Maudit->update_audit($this->data, $_GET['ID_audit']);
			}
			return redirect(base_url() . 'Employee_Account/View_Steps?ID_audit=' . $_GET['ID_audit']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/********submit add constat  *******/
	public function submit_constat()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {
				//add
				if ($_GET['submit'] == 1) {
					//echo "hiiii";die();
					if ($_POST) {
						$this->data = array(
							'Text_survey' => $_POST['Text_survey'],
							'ID_constat' => $_POST['ID_constat'],
							'Chaptre_Reference_survey' => $_POST['Chaptre_Reference_survey'],
							'ID_audit' => $_POST['ID_audit']
						);
					}
					$this->Maudit->insert_constat($this->data);
				}

				if ($_GET['submit'] == 2) {
					if ($_POST) {
						$this->data = array(
							'Text_survey' => $_POST['Text_survey'],
							'ID_constat' => $_POST['ID_constat'],
							'Chaptre_Reference_survey' => $_POST['Chaptre_Reference_survey'],
							'ID_audit' => $_POST['ID_audit']
						);
					}
					//	echo print_r($this->data);die();
					$this->Maudit->update_constat($this->data, $_POST['ID_survey']);
				}

				return redirect(base_url() . 'Employee_Account/View_Steps?ID_audit=' . $_POST['ID_audit']);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function submit_delete_constat()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			if ($_GET) {

				$this->Maudit->delete_constat($_GET['ID_survey']);
			}
			return redirect(base_url() . 'Employee_Account/View_Steps?ID_audit=' . $_GET['ID_audit']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/******load view update constat *******/
	public function Edit_constats()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			/*******************************get constat by id**************************** */
			$this->data['survey'] = $this->Maudit->get_constat_by_idSurvey($_GET['ID_survey']);
			/*echo print_r($this->data['survey']);
		die();*/
			$this->data['Title_constat'] = $this->data['survey'][0]['Title_constat'];
			$this->data['Chaptre_Reference_survey'] = $this->data['survey'][0]['Chaptre_Reference_survey'];
			$this->data['Text_survey'] = $this->data['survey'][0]['Text_survey'];
			$this->data['Metaphor_constat'] = $this->data['survey'][0]['Metaphor_constat'];
			$this->data['ID_constat'] = $this->data['survey'][0]['ID_constat'];
			$this->data['ID_audit'] = $this->data['survey'][0]['ID_audit'];
			$this->data['ID_survey'] = $this->data['survey'][0]['ID_survey'];

			$this->data['constat'] = $this->Maudit->get_constat();

			$this->load->view('Employee/auditMod/Edit_constats.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******load view add referencial ******/
	public function add_plan()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->load->view('Employee/auditMod/Add_Plan.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function add_planvalueYear()
	{
		$this->commonData();
		$this->data['valueYear'] = 1;
		$this->load->view('Employee/auditMod/Add_Plan.php', $this->data);
	}
	/**************add plan ********/
	public function submit_add_plan()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_audit";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {

				if ($_POST['Year_audit_plan'] < 3099) {
					$this->data = array(
						'Create_date_audit_plan' => date('Y-m-d H:i:s'),
						'Year_audit_plan' => $_POST['Year_audit_plan'],
					);
					$this->Maudit->insert_Plan($this->data);
				} else {
					$this->data['valueYear'] = 1;
					//$this->load->view('Employee/auditMod/Add_Plan.php', $this->data);

					return redirect(base_url() . 'Employee_Account/add_planvalueYear');
				}
				//	echo print_r($_POST['Year_audit_plan']);die();
			}
			return redirect(base_url() . 'Employee_Account/List_audit');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/******Crud processus ******/
	/******load view list process *******/
	public function List_Processus()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['management'] = $this->Mprocessus->get_processus_by_category(1);
			$this->data['realisation'] = $this->Mprocessus->get_processus_by_category(2);
			$this->data['support'] = $this->Mprocessus->get_processus_by_category(3);
			//echo print_r($this->data['management']);
			//die();
			$this->load->view('Employee/ProcessusMod/List_Processus_all.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_Processus_list()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			//$this->data['interest'] = $this->Mprocessus->get_interest();
			$this->data['process'] = $this->Mprocessus->get_processus();
			//$this->data['realisation'] = $this->Mprocessus->get_processus_by_category(2);
			//$this->data['support'] = $this->Mprocessus->get_processus_by_category(3);
			//	echo print_r($this->data['process']);
			//	die();
			$this->load->view('Employee/ProcessusMod/List_Processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Processus()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['process'] = $this->Mprocessus->get_processus_by_ID($this->data['ID_processus']);
			$this->data['Title_processus'] = $this->data['process'][0]['Title_processus'];
			$this->data['Photo_processus'] = $this->data['process'][0]['Photo_processus'];
			$this->data['Name_employee'] = $this->data['process'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['process'][0]['Lastname_employee'];
			$this->data['ID_department'] = $this->data['process'][0]['ID_department'];
			$this->data['processcategory'] = $this->data['process'][0]['processcategory'];
			$this->data['processinput'] = $this->data['process'][0]['processinput'];
			$this->data['processoutput'] = $this->data['process'][0]['processoutput'];
			$this->data['processtarget'] = $this->data['process'][0]['processtarget'];
			$this->data['processDomain'] = $this->data['process'][0]['processDomain'];
			$this->data['processtools'] = $this->data['process'][0]['processtools'];
			$this->data['processgenelements'] = $this->data['process'][0]['processgenelements'];
			$this->data['processkpi'] = $this->data['process'][0]['processkpi'];

			$this->data['activity'] = $this->Mprocessus->get_processusgroup_by_processus($this->data['ID_processus']);
			$this->data['item'] = $this->Mprocessus->get_processusgritem_by_processus($this->data['ID_processus']);

			//echo print_r($this->data['process']);
			//die();

			$this->load->view('Employee/ProcessusMod/View_processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Generate_Processus()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['process'] = $this->Mprocessus->get_processus_by_ID($this->data['ID_processus']);
			$this->data['Title_processus'] = $this->data['process'][0]['Title_processus'];
			/*****entête */
			$this->data['Prefix_processus'] = $this->data['process'][0]['Prefix_processus'];
			$this->data['ID_doc'] = $this->data['process'][0]['ID_doc'];
			$this->data['Order_doc_processus'] = $this->data['process'][0]['Order_doc_processus'];
			$this->data['Version_doc_processus'] = $this->data['process'][0]['Version_doc_processus'];
			/*****entête */
			$this->data['Photo_processus'] = $this->data['process'][0]['Photo_processus'];
			$this->data['Name_employee'] = $this->data['process'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['process'][0]['Lastname_employee'];
			$this->data['ID_department'] = $this->data['process'][0]['ID_department'];
			$this->data['processcategory'] = $this->data['process'][0]['processcategory'];
			$this->data['processinput'] = $this->data['process'][0]['processinput'];
			$this->data['processoutput'] = $this->data['process'][0]['processoutput'];
			$this->data['processtarget'] = $this->data['process'][0]['processtarget'];
			$this->data['processDomain'] = $this->data['process'][0]['processDomain'];
			$this->data['processtools'] = $this->data['process'][0]['processtools'];
			$this->data['processgenelements'] = $this->data['process'][0]['processgenelements'];
			$this->data['processkpi'] = $this->data['process'][0]['processkpi'];

			$this->data['activity'] = $this->Mprocessus->get_processusgroup_by_processus($this->data['ID_processus']);
			$this->data['item'] = $this->Mprocessus->get_processusgritem_by_processus($this->data['ID_processus']);

			//echo print_r($this->data['process']);
			//die();

			$this->load->view('Employee/ProcessusMod/Generate_processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*****load view add processus(pour chaque departement) *****/
	public function Form_add_processus()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//$this->data['departement'] = $this->Maudit->get_all_departement();
			$this->data['responsable'] = $this->Maudit->get_all_employees();
			$this->data['type_document'] = $this->Mprocessus->get_all_type_doc();

			$this->load->view('Employee/ProcessusMod/Add_processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function submit_processus()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				$fileimg = $_FILES['Photo_processus']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				//   echo $extimg; die();
				$fileName = time();


				$fileTmpName = $_FILES['Photo_processus']['tmp_name'];
				$fileDestination = './uploads/process/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);

				$testimg = $_FILES['Photo_processus']['name'];
				/**recupere du vue valeur de $_post */

				if ($testimg == null) {
					$Photo_processus = 'default.jpg';
				} else {
					$Photo_processus = $fileName . '.' . $extimg;
				}

				$this->data = array(
					'Photo_processus' => $Photo_processus,
					'Title_processus' => $_POST['Title_processus'],
					/*****entête */
					'Prefix_processus' => $_POST['Prefix_processus'],
					'ID_doc' => $_POST['ID_doc'],
					'Order_doc_processus' => $_POST['Order_doc_processus'],
					'Version_doc_processus' => $_POST['Version_doc_processus'],
					/*****entête */
					'ID_Responsable	' => $_POST['ID_employee'],
					'processcategory	' => $_POST['processcategory'],
					'processinput	' => $_POST['processinput'],
					'processoutput	' => $_POST['processoutput'],
					'processtarget	' => $_POST['processtarget'],
					'processDomain	' => $_POST['processDomain'],
					'processtools	' => $_POST['processtools'],
					'processgenelements	' => $_POST['processgenelements'],
					'processkpi	' => $_POST['processkpi'],
					'ID_company' => $this->data['ID_company']

					//	'ID_department	' => $_POST['ID_departement']
				);
				//echo print_r($this->data);
				//die();
				$this->Maudit->insert_processus($this->data);
			}
			return redirect(base_url() . 'Employee_Account/List_Processus');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*******delete processus *****/
	public function Delete_processus()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_processus'] = $_GET['ID_processus'];

				$this->Maudit->delete_processus($this->data['ID_processus']);
			}
			return redirect(base_url() . 'Employee_Account/List_Processus');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_processusgritem()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['GroupID'] = $_GET['GroupID'];

			//$this->data['departement'] = $this->Maudit->get_all_departement();

			$this->load->view('Employee/ProcessusMod/Add_processusgritem.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_processusgritem()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_processus'] = $_GET['ID_processus'];
				$this->data['ItemGrID'] = $_GET['ItemGrID'];

				$this->Mprocessus->delete_processusgritem($this->data['ItemGrID']);
			}
			return redirect(base_url() . 'Employee_Account/View_Processus?ID_processus=' . $this->data['ID_processus']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******insert processus ******/
	public function submit_add_processusgritem()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {

				$this->data = array(

					'ActivityItem' => $_POST['ActivityItem'],
					'Responsable' => $_POST['Responsable'],
					'Comment' => $_POST['Comment'],
					'Proof' => $_POST['Proof'],
					'GroupID' => $_POST['GroupID'],
					'ID_processus' => $_POST['ID_processus'],


				);
				$this->Mprocessus->add_processusgritem($this->data);
			}
			return redirect(base_url() . 'Employee_Account/View_Processus?ID_processus=' . $_POST['ID_processus']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function submit_add_processusgroup()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {

				$this->data = array(
					'ID_processus' => $_POST['ID_processus'],
					'GroupName' => $_POST['GroupName'],
				);
				$this->Mprocessus->add_processusgroup($this->data);
			}
			return redirect(base_url() . 'Employee_Account/View_Processus?ID_processus=' . $_POST['ID_processus']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_processusgroup()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_processus'] = $_GET['ID_processus'];
				$this->data['GroupID'] = $_GET['GroupID'];

				$this->Mprocessus->delete_processusgroup($this->data['GroupID']);
				$this->Mprocessus->delete_processusgritem_by_group($this->data['GroupID']);
			}
			return redirect(base_url() . 'Employee_Account/View_Processus?ID_processus=' . $this->data['ID_processus']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/****load view edit processus ******/
	public function Form_edit_processus()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_processus'] = $_GET['ID_processus'];

				$this->data['infoprocessus'] = $this->Maudit->get_info_processus($this->data['ID_processus']);
				$this->data['Photo_processus'] = $this->data['infoprocessus'][0]['Photo_processus'];
				$this->data['Title_processus'] = $this->data['infoprocessus'][0]['Title_processus'];
				$this->data['ID_employee'] = $this->data['infoprocessus'][0]['ID_Responsable'];
				//	$this->data['ID_departement'] = $this->data['infoprocessus'][0]['ID_department'];

				$this->data['ID_processus'] = $this->data['infoprocessus'][0]['ID_processus'];
			}
			//	$this->data['departement'] = $this->Maudit->get_all_departement();
			$this->data['responsable'] = $this->Maudit->get_all_employees();

			$this->load->view('Employee/ProcessusMod/Edit_processus.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*****submit process ******/
	public function Edit_processus()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//die();
			if ($_GET) {
				$this->data['ID_processus'] = $_GET['ID_processus'];
			}
			//echo print_r($this->data['ID_processus']);
			//	die();
			if ($_POST) {
				$fileimg = $_FILES['Photo_processus']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				//   echo $extimg; die();
				$fileName = time();


				$fileTmpName = $_FILES['Photo_processus']['tmp_name'];
				$fileDestination = './uploads/process/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);

				$testimg = $_FILES['Photo_processus']['name'];
				/**recupere du vue valeur de $_post */

				if ($testimg == null) {
					$Photo_processus = 'default.jpg';
				} else {
					$Photo_processus = $fileName . '.' . $extimg;
				}

				$this->data = array(
					'Photo_processus' => $Photo_processus,
					'Title_processus' => $_POST['Title_processus'],
					'ID_Responsable' => $_POST['ID_employee'],
					//	'ID_department	' => $_POST['ID_departement']

				);

				$this->Maudit->update_info_processus($this->data, $_GET['ID_processus']);

				return redirect(base_url() . 'Employee_Account/List_Processus');
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******End crud processus*****/

	/***************************** Processus Matrix ************************/

	public function List_Processus_matrix()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mprocessus->get_processus_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['processus'] = $this->Mprocessus->get_processus_paging($page);
				if (isset($_GET['ID_processus'])) {
					$this->data['current_processus'] = $_GET['ID_processus'];
				} else {
					$this->data['current_processus'] = $this->data['processus'][0]['ID_processus'];
				}
				$this->data['processus_ID'] = $this->Mprocessus->get_processus_by_ID($this->data['current_processus']);
				$this->data['Title_processus'] = $this->data['processus_ID'][0]['Title_processus'];
			}
			$this->data['current_processus_interaction'] = $this->Mprocessus->get_processus_interaction_by_ID($this->data['current_processus']);
			$this->data['nb'] = $this->Mprocessus->get_processus_interaction_nb_page($this->data['current_processus']);

			$this->data['processus_interaction'] = $this->Mprocessus->get_processus_interaction();
			//echo print_r($this->data['current_processus_interaction']);
			//die();
			//	$this->data['processus'] = $this->Mprocessus->get_processus();
			$this->load->view('Employee/ProcessusMod/List_Processus_matrix.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_interaction()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['ID_processus_interaction'] = $_GET['ID_processus_interaction'];

			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/ProcessusMod/Add_interaction.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_interaction()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_processus'	=> $_POST['ID_processus'],
				'ID_processus_interaction'	=> $_POST['ID_processus_interaction'],
				'Text_interaction'	=> $_POST['Text_interaction'],

			);
			if (isset($_POST['ID_interaction'])) {
				//echo $_POST['ID_interaction'];
				//die();
				$this->Mprocessus->edit_interaction($this->data1, $this->data['ID_interaction']);
			} else {
				/*************************Add******************************/
				$this->Mprocessus->add_interaction($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_Processus_matrix?ID_processus=' . $_POST['ID_processus']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_interaction()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_interaction'] = $_GET['ID_interaction'];
				$this->data['ID_processus'] = $_GET['ID_processus'];
			}

			$this->Mprocessus->delete_interaction($_GET['ID_interaction']);

			return redirect(base_url() . 'Employee_Account/List_Processus_matrix?ID_processus=' . $_GET['ID_processus']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function View_matrix()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			//	echo $this->data['ID_company'] ; die();
			$this->data['processus'] = $this->Mprocessus->get_processus($this->data['ID_company']);

			$this->data['processus_row'] = $this->Mprocessus->get_processus_row($this->data['ID_company']);

			$this->data['processus_col'] = $this->Mprocessus->get_processus_col($this->data['ID_company']);

			/*	echo "<pre>";
			echo print_r($this->data1['processus_row']);
			echo "<pre>";
			echo "*****************************";
			echo "<pre>";
			echo print_r($this->data2['processus_col']);
			echo "<pre>";
			die();*/

			$this->load->view('Employee/ProcessusMod/View_matrix.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/******************************* End Audit ********************************/
	/**************************************************************************/
	/**************************************************************************/



	/**************************************************************************/
	/**************************************************************************/
	/******************************* Context **********************************/
	/**************************************************************************/
	/**************************************************************************/


	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_context *****************************/
	/**************************************************************************/
	/**************************************************************************/
	/************************************************************/
	/*************************************************************/
	/***************************Contexte Enjeu Fatma********************************/
	/******************************************************************/
	/*****************************************************************/

	public function List_context()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['team'] = $this->MContexte->get_all_employee();
			//liste enjeu interne
			$this->data['interne'] = $this->MContexte->get_limit_enjeuInterne();
			//liste enjeu externe
			$this->data['externe'] = $this->MContexte->get_limit_enjeuExterne();

			$this->data['processus'] = $this->Mrisk->get_all_processus();

			$this->load->view('Employee/contextMod/List_context.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Add_Enjeu()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(
					'Text_enjeu' => $_POST['Text_enjeu'],
					'Description_enjeu' => $_POST['Description_enjeu'],
					'Corrective_enjeu	'	=>	$_POST['Corrective_enjeu'],
					'status'	=> $_POST['status'],
					'ID_swot'	=> $_POST['ID_swot'],
					'Politic_enjeu'	=> $_POST['Politic_enjeu'],
					'Economic_enjeu'	=> $_POST['Economic_enjeu'],
					'Social_enjeu'	=> $_POST['Social_enjeu'],
					'Techno_enjeu'	=> $_POST['Techno_enjeu'],
					'Env_enjeu'	=> $_POST['Env_enjeu'],
					'Legal_enjeu'	=> $_POST['Legal_enjeu'],
					'Priority_enjeu'	=>	$_POST['Priority_enjeu'],
					//	'ID_processus'	=> $_POST['ID_processus'],

				);
				$ID_enjeu =	$this->MContexte->insert_enjeu($this->data);
				/*	$this->data1 = array(
				'ID_enjeu' => $ID_enjeu,
				'ID_employee' => $_POST['Corrective_enjeu']
			);*/
				//	$this->MContexte->insert_Corrective_enjeu($this->data1);
			}
			return redirect(base_url() . 'Employee_Account/List_context');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Affect_Enjeu()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}	//$this->data['team'] = $this->MContexte->get_all_employee();

			//liste enjeu interne
			$this->data['interne'] = $this->MContexte->get_enjeu_ByID($_GET['ID_enjeu']);
			$this->data['Text_enjeu'] = $this->data['interne'][0]['Text_enjeu'];
			$this->data['Description_enjeu'] = $this->data['interne'][0]['Description_enjeu'];
			$this->data['Corrective_enjeu'] = $this->data['interne'][0]['Corrective_enjeu'];
			$this->data['Priority_enjeu'] = $this->data['interne'][0]['Priority_enjeu'];
			$this->data['status'] = $this->data['interne'][0]['status'];

			/*	echo "<pre>";
			echo print_r($this->data['interne']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/contextMod/Affect_Enjeu.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Enjeu_interne()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			$this->data['ID_swot'] = $_GET['ID_swot'];

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->MContexte->get_enjeuInterne_swot_paging($this->data['ID_swot'], $page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['interne'] = $this->MContexte->get_enjeuInterne_swot_paging($this->data['ID_swot'], $page);
			}
			$this->data['nb'] = $this->MContexte->get_enjeuInterne_swot_nb_page($this->data['ID_swot']);

			$this->load->view('Employee/contextMod/View_Enjeu_interne.php', $this->data);

			/******************End Paging******************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Enjeu_externe()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			$this->data['ID_swot'] = $_GET['ID_swot'];

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->MContexte->get_enjeuExterne_swot_paging($this->data['ID_swot'], $page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['externe'] = $this->MContexte->get_enjeuExterne_swot_paging($this->data['ID_swot'], $page);
			}
			$this->data['nb'] = $this->MContexte->get_enjeuExterne_swot_nb_page($this->data['ID_swot']);

			$this->load->view('Employee/contextMod/View_Enjeu_externe.php', $this->data);

			/******************End Paging******************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	//delete Enjeu
	public function Delete_EnjeuInterne()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_swot'] = $_GET['ID_swot'];
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
				$this->MContexte->delete_Enjeu($_GET['ID_enjeu']);
				//	$this->MContexte->delete_Corrective_enjeu($_GET['ID_enjeu']);
			}
			return redirect(base_url() . 'Employee_Account/View_Enjeu_interne?ID_swot=' . $_POST['ID_swot']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	//delete Enjeu
	public function Delete_EnjeuExterne()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
				$this->MContexte->delete_Enjeu($_GET['ID_enjeu']);
				//	$this->MContexte->delete_Corrective_enjeu($_GET['ID_enjeu']);
			}
			return redirect(base_url() . 'Employee_Account/View_Enjeu_externe?ID_swot=' . $_POST['ID_swot']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	//View Update interne
	public function Update_Enjeu_interne()
	{


		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}
			$this->data['team'] = $this->MContexte->get_all_employee();

			//liste enjeu interne
			$this->data['interne'] = $this->MContexte->get_all_enjeuInterne_ByID($_GET['ID_enjeu']);
			$this->data['Text_enjeu'] = $this->data['interne'][0]['Text_enjeu'];
			$this->data['Description_enjeu'] = $this->data['interne'][0]['Description_enjeu'];
			$this->data['Corrective_enjeu'] = $this->data['interne'][0]['Corrective_enjeu'];
			$this->data['Priority_enjeu'] = $this->data['interne'][0]['Priority_enjeu'];
			$this->data['Politic_enjeu'] = $this->data['interne'][0]['Politic_enjeu'];
			$this->data['Economic_enjeu'] = $this->data['interne'][0]['Economic_enjeu'];
			$this->data['Social_enjeu'] = $this->data['interne'][0]['Social_enjeu'];
			$this->data['Techno_enjeu'] = $this->data['interne'][0]['Techno_enjeu'];
			$this->data['Env_enjeu'] = $this->data['interne'][0]['Env_enjeu'];
			$this->data['Legal_enjeu'] = $this->data['interne'][0]['Legal_enjeu'];
			$this->data['ID_swot'] = $this->data['interne'][0]['ID_swot'];

			/*	echo "<pre>";
			echo print_r($this->data['interne']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/contextMod/Update_Enjeu_interne.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_Update_Enjeu_Interne()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}

			if (isset($_POST['ID_swot'])) {
				if ($_POST['ID_swot'] == 1) {
					$st = 0;
				}
				if ($_POST['ID_swot'] == 2) {
					$st = 0;
				}
				if ($_POST['ID_swot'] == 3) {
					$st = 1;
				}
				if ($_POST['ID_swot'] == 4) {
					$st = 1;
				}
			}
			if ($_POST) {
				$this->data = array(
					'Text_enjeu' => $_POST['Text_enjeu'],
					'Description_enjeu' => $_POST['Description_enjeu'],
					'Corrective_enjeu	'	=>	$_POST['Corrective_enjeu'],
					'Priority_enjeu'	=>	$_POST['Priority_enjeu'],
					'Politic_enjeu'	=>	$_POST['Politic_enjeu'],
					'Economic_enjeu'	=>	$_POST['Economic_enjeu'],
					'Social_enjeu'	=>	$_POST['Social_enjeu'],
					'Techno_enjeu'	=>	$_POST['Techno_enjeu'],
					'Env_enjeu'	=>	$_POST['Env_enjeu'],
					'Legal_enjeu'	=>	$_POST['Legal_enjeu'],
					'ID_swot'	=>	$_POST['ID_swot'],
					'Legal_enjeu'	=>	$_POST['Legal_enjeu'],
					'status'	=>	$st,


				);
				$ID_enjeu =	$this->MContexte->update_enjeu_interne($this->data, $_GET['ID_enjeu']);
				$this->data1 = array(
					'ID_employee' => $_POST['Corrective_enjeu']
				);
				//	$this->MContexte->update_Corrective_enjeu($this->data1, $_GET['ID_enjeu']);
			}
			if ($_POST['ID_swot'] == 1 || $_POST['ID_swot'] == 2) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_interne?ID_swot=' . $_POST['ID_swot']);
			}
			if ($_POST['ID_swot'] == 3 || $_POST['ID_swot'] == 4) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_externe?ID_swot=' . $_POST['ID_swot']);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Update_Enjeu_externe()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}
			$this->data['team'] = $this->MContexte->get_all_employee();

			//liste enjeu interne
			$this->data['externe'] = $this->MContexte->get_all_enjeuExterne_ByID($_GET['ID_enjeu']);
			$this->data['Text_enjeu'] = $this->data['externe'][0]['Text_enjeu'];
			$this->data['Description_enjeu'] = $this->data['externe'][0]['Description_enjeu'];
			$this->data['Corrective_enjeu'] = $this->data['externe'][0]['Corrective_enjeu'];
			$this->data['Priority_enjeu'] = $this->data['externe'][0]['Priority_enjeu'];
			$this->data['Politic_enjeu'] = $this->data['externe'][0]['Politic_enjeu'];
			$this->data['Economic_enjeu'] = $this->data['externe'][0]['Economic_enjeu'];
			$this->data['Social_enjeu'] = $this->data['externe'][0]['Social_enjeu'];
			$this->data['Techno_enjeu'] = $this->data['externe'][0]['Techno_enjeu'];
			$this->data['Env_enjeu'] = $this->data['externe'][0]['Env_enjeu'];
			$this->data['Legal_enjeu'] = $this->data['externe'][0]['Legal_enjeu'];
			$this->data['ID_swot'] = $this->data['externe'][0]['ID_swot'];

			/*	echo "<pre>";
			echo print_r($this->data['interne']);
			echo "<pre>";
			die();*/
			$this->load->view('Employee/contextMod/Update_Enjeu_externe.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Report_enjeu()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['enjeux'] = $this->MContexte->get_all_enjeu();

			$this->data['processus'] = $this->Mrisk->get_all_processus();

			$this->data['entete'] = $this->Mentete->get_entete_by_type(2);

			if ($this->data['entete'] != false) {
				$this->data['ID_entete'] = $this->data['entete'][0]['ID_entete'];
				$this->data['Title_entete'] = $this->data['entete'][0]['Title_entete'];
				$this->data['Prefix_processus'] = $this->data['entete'][0]['Prefix_processus'];
				$this->data['Code_doc_type'] = $this->data['entete'][0]['Code_doc_type'];
				$this->data['Order_doc_entete'] = $this->data['entete'][0]['Order_doc_entete'];
				$this->data['Version_doc_entete'] = $this->data['entete'][0]['Version_doc_entete'];
				$this->data['Type_entete'] = $this->data['entete'][0]['Type_entete'];
			}

			$this->load->view('Employee/contextMod/Report_enjeu.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_Update_Enjeu_Externe()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}
			if (isset($_POST['ID_swot'])) {
				if ($_POST['ID_swot'] == 1) {
					$st = 0;
				}
				if ($_POST['ID_swot'] == 2) {
					$st = 0;
				}
				if ($_POST['ID_swot'] == 3) {
					$st = 1;
				}
				if ($_POST['ID_swot'] == 4) {
					$st = 1;
				}
			}
			if ($_POST) {
				$this->data = array(
					'Text_enjeu' => $_POST['Text_enjeu'],
					'Description_enjeu' => $_POST['Description_enjeu'],
					'Corrective_enjeu	'	=>	$_POST['Corrective_enjeu'],
					'Priority_enjeu'	=>	$_POST['Priority_enjeu'],
					'Politic_enjeu'	=>	$_POST['Politic_enjeu'],
					'Economic_enjeu'	=>	$_POST['Economic_enjeu'],
					'Social_enjeu'	=>	$_POST['Social_enjeu'],
					'Techno_enjeu'	=>	$_POST['Techno_enjeu'],
					'Env_enjeu'	=>	$_POST['Env_enjeu'],
					'Legal_enjeu'	=>	$_POST['Legal_enjeu'],
					'ID_swot'	=>	$_POST['ID_swot'],
					'Legal_enjeu'	=>	$_POST['Legal_enjeu'],
					'status'	=>	$st,


				);
				$ID_enjeu =	$this->MContexte->update_enjeu_interne($this->data, $_GET['ID_enjeu']);
				$this->data1 = array(
					'ID_employee' => $_POST['Corrective_enjeu']
				);
				//	$this->MContexte->update_Corrective_enjeu($this->data1, $_GET['ID_enjeu']);
			}
			if ($_POST['ID_swot'] == 1 || $_POST['ID_swot'] == 2) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_interne?ID_swot=' . $_POST['ID_swot']);
			}
			if ($_POST['ID_swot'] == 3 || $_POST['ID_swot'] == 4) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_externe?ID_swot=' . $_POST['ID_swot']);
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_Update_Enjeu()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
			}
			if ($_POST) {
				$this->data = array(
					'ID_swot' => $_POST['ID_swot'],
					'ID_pestle' => $_POST['ID_pestle'],
				);
				//echo print_r($this->data);
				//die();
				$this->MContexte->update_enjeu_interne($this->data, $_GET['ID_enjeu']);
			}
			if ($_GET['status'] == 0) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_interne');
			} elseif ($_GET['status'] == 1) {
				return redirect(base_url() . 'Employee_Account/View_Enjeu_externe');
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Swot()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['enjeu'] = $this->MContexte->get_all_enjeuSwot();
			$this->data['allswot'] = $this->MContexte->get_all_swot();

			$this->load->view('Employee/contextMod/View_Swot.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Add_SWOT()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$ID_swot = "";
			if (isset($_POST['status'])) {


				if (($_POST['status']) == "Strenghts") {
					$ID_swot = 1;
				}
				if (($_POST['status']) == "Weaknesses") {
					$ID_swot = 2;
				}
				if (($_POST['status']) == "Opportunities") {
					$ID_swot = 3;
				}
				if (($_POST['status']) == "Threats") {
					$ID_swot = 4;
				}
			}
			if ($_POST) {
				$this->data = array(
					'ID_swot'	=> $ID_swot
				);
				//echo print_r($_POST['ID_enjeu']);die();
				$this->MContexte->updateEnjeu($this->data, $_POST['ID_enjeu']);
			}
			return redirect(base_url() . 'Employee_Account/View_Swot');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Detail_Swot()
	{


		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);




		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_swot'] = $_GET['ID_swot'];
			}	//liste enjeu externe
			$this->data['swot'] = $this->MContexte->get_all_enjeu_by_id_swot($this->data['ID_swot']);
			//$this->data['photo_swot'] = $this->data['swot'][0]['photo_swot'];
			$this->data['photo_swot'] = $this->MContexte->get_photo_swot($this->data['ID_swot']);

			//	echo print_r(	$this->data['swot'] );die();
			$this->load->view('Employee/contextMod/View_Detail_Swot.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');

		/*********************End Access Verif************************/
	}
	public function View_Pestel()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['enjeu'] = $this->MContexte->get_all_enjeuPestel();
			$this->data['allpestel'] = $this->MContexte->get_all_Pestel();

			$this->load->view('Employee/contextMod/View_Pestel.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Add_PESTEL()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$ID_pestle = "";
			if (isset($_POST['status'])) {


				if (($_POST['status']) == "Political") {
					$ID_pestle = 1;
				}
				if (($_POST['status']) == "Economical") {
					$ID_pestle = 2;
				}
				if (($_POST['status']) == "Social") {
					$ID_pestle = 3;
				}
				if (($_POST['status']) == "Technology") {
					$ID_pestle = 4;
				}
				if (($_POST['status']) == "Environmental") {
					$ID_pestle = 5;
				}
				if (($_POST['status']) == "Legal") {
					$ID_pestle = 6;
				}
			}
			if ($_POST) {
				$this->data = array(
					'ID_pestle'	=> $ID_pestle
				);
				//echo print_r($_POST['ID_enjeu']);die();
				$this->MContexte->updateEnjeu($this->data, $_POST['ID_enjeu']);
			}
			return redirect(base_url() . 'Employee_Account/View_Pestel');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function View_Detail_Pestel()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_pestle'] = $_GET['ID_pestle'];
			}	//liste enjeu externe
			$this->data['pestel'] = $this->MContexte->get_all_enjeu_by_id_pestel($this->data['ID_pestle']);
			//	$this->data['photo_pestel'] = $this->data['pestel'][0]['photo_pestel'];
			$this->data['photo_pestel'] = $this->MContexte->get_photo_pestel($this->data['ID_pestle']);

			//	echo print_r(	$this->data['swot'] );die();
			$this->load->view('Employee/contextMod/View_Detail_Pestel.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_enjeu_pestel()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//();
			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
				$this->data['ID_pestle'] = $_GET['ID_pestle'];
			}

			$this->data = array(
				'ID_pestle' => ''
			);
			$this->MContexte->update_photo($this->data, $_GET['ID_enjeu']);

			return redirect(base_url() . 'Employee_Account/View_Detail_Pestel?ID_pestle=' . $_GET['ID_pestle']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_enjeu_swot()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_context";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//();
			if ($_GET) {
				$this->data['ID_enjeu'] = $_GET['ID_enjeu'];
				$this->data['ID_swot'] = $_GET['ID_swot'];
			}

			$this->data = array(
				'ID_swot' => ''
			);
			$this->MContexte->update_photo($this->data, $_GET['ID_enjeu']);

			return redirect(base_url() . 'Employee_Account/View_Detail_Swot?ID_swot=' . $_GET['ID_swot']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_domain_process **********************/
	/**************************************************************************/
	/**************************************************************************/


	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_domainprocess ***********************/
	/**************************************************************************/
	/**************************************************************************/
	public function List_domain()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_domain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['Company'] = $this->MContexte->get_company_domain($this->data['ID_company']);
			$this->data['ID_domain'] = $this->data['Company'][0]['ID_domain'];
			$this->data['name_domain'] = $this->data['Company'][0]['name_domain'];
			$this->data['file_domain'] = $this->data['Company'][0]['file_domain'];
			$this->data['ID_company'] = $this->data['Company'][0]['ID_company'];

			//echo print_r($this->data['Company']) ; die();
			$this->load->view('Employee/domainMod/List_domain.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_domain()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_domain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*************************Upload File*********************************/
			//echo $_FILES['file_domain']['name'];die();
			if ($_FILES['file_domain']['name'] == "") {
				$insertfile = '';
				//	echo 'hhhhh';die();
			} else {
				//echo'else';die();
				$fileimg = $_FILES['file_domain']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['file_domain']['tmp_name'];
				$fileDestination = './uploads/Domain/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//echo $_POST['ID_domain'];
			//die();
			if ($_POST) {
				$this->data = array(
					'name_domain' => $_POST['name_domain'],
					'file_domain' => $insertfile,
					'ID_company' => $this->data['ID_company']
				);
				//echo print_r($insertfile);die();
				if (isset($_POST['ID_domain'])) {
					//echo 'update';die();
					$this->MContexte->update_domain($this->data, $_POST['ID_domain']);
				} else {
					//	echo 'insert';die();
					$this->MContexte->insert_domain($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_domain');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function delete_domaine()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_domain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['Company'] = $this->MContexte->get_company_domain($this->data['ID_company']);
			$this->data['ID_domain'] = $this->data['Company'][0]['ID_domain'];
			$this->data['name_domain'] = $this->data['Company'][0]['name_domain'];
			$this->data['file_domain'] = $this->data['Company'][0]['file_domain'];
			$this->data['ID_company'] = $this->data['Company'][0]['ID_company'];
			if ($_GET) {
				$this->data['ID_domain'] = $_GET['ID_domain'];
			}

			$this->MContexte->delete_domain($_GET['ID_domain']);

			return redirect(base_url() . 'Employee_Account/List_domain');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_interest ****************************/
	/**************************************************************************/
	/**************************************************************************/


	public function Form_add_interest_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->load->view('Employee/interestMod/Add_interest_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_interest_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$fileimg = $_FILES['Photo_interest_group']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				//   echo $extimg; die();
				$fileName = time();


				$fileTmpName = $_FILES['Photo_interest_group']['tmp_name'];
				$fileDestination = './uploads/interest_group/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);

				$testimg = $_FILES['Photo_interest_group']['name'];
				/**recupere du vue valeur de $_post */

				if ($testimg == null) {
					$Photo_interest_group = 'default.jpg';
				} else {
					$Photo_interest_group = $fileName . '.' . $extimg;
				}
				$this->data = array(

					'Name_interest_group' =>  $_POST['Name_interest_group'],
					'Photo_interest_group' =>  $Photo_interest_group,

				);
			}

			$this->Minterest->add_interest_group($this->data);

			return redirect(base_url() . 'Employee_Account/List_interest_group');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_interest_group()
	{
	}
	public function Delete_interest_group()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			return redirect(base_url() . 'Employee_Account/List_interest_group');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_interest()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Minterest->get_interest_by_group_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['interest'] = $this->Minterest->get_interest_by_group_paging($page);
			}
			$this->data['nb'] = $this->Minterest->get_interest_by_group_nb_page();
			//$this->data['cu_interest'] = $this->Minterest->get_interest_group_by_ID();
			//$this->data['ID_interest_group'] = $this->data['cu_interest'][0]['ID_interest_group'];
			//	$this->data['Name_interest_group'] = $this->data['cu_interest'][0]['Name_interest_group'];
			//	$this->data['Photo_interest_group'] = $this->data['cu_interest'][0]['Photo_interest_group'];


			//echo print_r($this->data['interest']); die();
			/******************End Paging******************************/

			$this->load->view('Employee/interestMod/List_interest.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_interest()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//$this->data['ID_interest_group'] = $_GET['ID_interest_group'];

			$this->load->view('Employee/interestMod/Add_interest.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_interest()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				//echo $_POST['ID_interest_group'];
				//die();

				$this->data = array(

					'Participant_interest' =>  $_POST['Participant_interest'],
					'Attente_interest' =>  $_POST['Attente_interest'],
					'Priority_interest' =>  $_POST['Priority_interest'],
					'Frequence_interest' =>  $_POST['Frequence_interest'],
					'Exigence_interest' =>  $_POST['Exigence_interest'],
					'Method_interest' =>  $_POST['Method_interest'],

					//	'ID_interest_group' =>  $_POST['ID_interest_group'],
				);
			}
			if (isset($_POST['ID_interest'])) {
				$this->Minterest->edit_interest($this->data, $_POST['ID_interest']);
			} else {
				$this->Minterest->add_interest($this->data);
			}
			return redirect(base_url() . 'Employee_Account/List_interest');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_interest()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_interest'] = $_GET['ID_interest'];
				$this->data['interest'] = $this->Minterest->get_interest_by_ID($this->data['ID_interest']);
				$this->data['Participant_interest'] = $this->data['interest'][0]['Participant_interest'];
				$this->data['Attente_interest'] = $this->data['interest'][0]['Attente_interest'];
				$this->data['Priority_interest'] = $this->data['interest'][0]['Priority_interest'];
				//	$this->data['ID_interest_group'] = $this->data['interest'][0]['ID_interest_group'];
			}
			$this->load->view('Employee/interestMod/Add_interest.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_interest()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			//echo 'hi';
			//die();
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_interest'] = $_GET['ID_interest'];
				$this->Minterest->delete_interest($this->data['ID_interest']);
			}
			return redirect(base_url() . 'Employee_Account/List_interest/');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Report_interest()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_interest";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['interest'] = $this->Minterest->get_interest_all();
			//echo print_r($this->data['interest']);
			//die();
			$this->data['processus'] = $this->Mrisk->get_all_processus();

			$this->data['entete'] = $this->Mentete->get_entete_by_type(1);
			if ($this->data['entete'] != false) {
				$this->data['ID_entete'] = $this->data['entete'][0]['ID_entete'];
				$this->data['Title_entete'] = $this->data['entete'][0]['Title_entete'];
				$this->data['Prefix_processus'] = $this->data['entete'][0]['Prefix_processus'];
				$this->data['Code_doc_type'] = $this->data['entete'][0]['Code_doc_type'];
				$this->data['Order_doc_entete'] = $this->data['entete'][0]['Order_doc_entete'];
				$this->data['Version_doc_entete'] = $this->data['entete'][0]['Version_doc_entete'];
				$this->data['Type_entete'] = $this->data['entete'][0]['Type_entete'];
			}
			//	echo print_r($this->data['entete']);
			//	die();
			$this->load->view('Employee/interestMod/Report_interest.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_doc_iso_all ***********************/
	/**************************************************************************/
	/**************************************************************************/
	public function List_doc_iso_all()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_doc_iso_all";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/doc_isoMod/List_doc_iso_all.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/**************************************************************************/
	/**************************************************************************/
	/******************************* List_doc_iso ***********************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_doc_iso()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_doc_iso_all";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['Type_doc_iso'] = $_GET['Type_doc_iso'];

			//$this->data['doc_iso'] = $this->Mdoc_iso->get_doc_iso_by_type($this->data['Type_doc_iso']);

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdoc_iso->get_doc_iso_by_type_paging($page, $this->data['Type_doc_iso']) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['doc_iso'] = $this->Mdoc_iso->get_doc_iso_by_type_paging($page, $this->data['Type_doc_iso']);
			}
			$this->data['nb'] = $this->Mdoc_iso->get_doc_iso_by_type_nb_page($this->data['Type_doc_iso']);

			/******************End Paging******************************/


			$this->load->view('Employee/doc_isoMod/List_doc_iso.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_add_doc_iso()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_doc_iso_all";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['Type_doc_iso'] = $_GET['Type_doc_iso'];

			//	$this->data['doc_iso'] = $this->Mdoc_iso->get_doc_iso_by_ID_company($this->data['ID_company']);
			//	$this->data['ID_doc_iso'] = $this->data['doc_iso'][0]['ID_doc_iso'];
			//	$this->data['File_doc_iso'] = $this->data['doc_iso'][0]['File_doc_iso'];

			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/doc_isoMod/Add_doc_iso.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_doc_iso()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_doc_iso_all";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_doc_iso']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_doc_iso']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_doc_iso']['tmp_name'];
				$fileDestination = './uploads/doc_iso/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_doc_iso'	=> $_POST['Title_doc_iso'],
				//'ID_company'	=> $_POST['ID_company'],
				'Type_doc_iso'	=> $_POST['Type_doc_iso'],

				'File_doc_iso'	=> $insertfile
			);
			if (isset($_POST['ID_doc_iso'])) {
				//echo $_POST['ID_doc_iso'];
				//die();
				$this->Mdoc_iso->edit_doc_iso($this->data1, $this->data['ID_doc_iso']);
			} else {
				/*************************Add******************************/
				$this->Mdoc_iso->add_doc_iso($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_doc_iso?Type_doc_iso=' . $_POST['Type_doc_iso']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_doc_iso()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_doc_iso_all";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['Type_doc_iso'] = $_GET['Type_doc_iso'];
				$this->data['ID_doc_iso'] = $_GET['ID_doc_iso'];
			}

			$this->Mdoc_iso->delete_doc_iso($_GET['ID_doc_iso']);

			return redirect(base_url() . 'Employee_Account/List_doc_iso?Type_doc_iso=' . $this->data['Type_doc_iso']);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/**************************************************************************/
	/**************************************************************************/
	/******************************* Engagement *******************************/
	/**************************************************************************/
	/**************************************************************************/
	public function List_organigramme()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['posts'] = $this->Mpost->get_posts();
			$this->data['post_parent'] = $this->Mpost->get_posts_first_parent();
			$this->data['Name_post'] = $this->data['post_parent'][0]['Name_post'];
			$this->data['ID_post'] = $this->data['post_parent'][0]['ID_post'];
			$this->data['employees'] = $this->Mpost->get_employees();
			/* "<pre>";
			echo print_r($this->data['employees']);
			echo "<pre>";
			//echo $this->data['ID_post'] ; 
			die();*/
			$this->load->view('Employee/leadershipMod/List_organigramme.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_engagement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['engagement'] = $this->MLeadership->get_engagement($this->data['ID_company']);
			$this->data['ID_engagement'] = $this->data['engagement'][0]['ID_engagement'];
			$this->data['Title_engagement'] = $this->data['engagement'][0]['Title_engagement'];
			$this->data['Content_engagement'] = $this->data['engagement'][0]['Content_engagement'];
			$this->data['File_engagement'] = $this->data['engagement'][0]['File_engagement'];
			//echo $this->data['Content_engagement'];
			//die();
			$this->load->view('Employee/leadershipMod/List_engagement.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_engagement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);


		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*********************Paging*******************************/
			/******************End Paging******************************/
			if (isset($_GET['ID_engagement'])) {
				$this->data['ID_engagement'] = $_GET['ID_engagement'];
			}
			$this->load->view('Employee/leadershipMod/Add_engagement.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_engagement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data = array(

				'Title_engagement'	=> $_POST['Title_engagement'],
				'Content_engagement'	=> $_POST['Content_engagement'],
				'ID_company' => $this->data['ID_company'],
			);
			if (isset($_POST['ID_engagement'])) {
				$this->MLeadership->edit_engagement($this->data, $_POST['ID_engagement']);
			} else {
				$this->MLeadership->add_engagement($this->data);
			}
			return redirect(base_url() . 'Employee_Account/List_engagement');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_engagement_file()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_engagement']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_engagement']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_engagement']['tmp_name'];
				$fileDestination = './uploads/Engagement/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			//echo $insertfile;
			//die();
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'File_engagement'	=> $insertfile
			);
			if (isset($_POST['ID_engagement'])) {
				//echo print_r($this->data1);
				//die();
				$this->MLeadership->edit_engagement($this->data1, $_POST['ID_engagement']);
				//die();
			} else {
				/*************************Add******************************/
				$this->MLeadership->add_engagement($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_engagement');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_engagement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_engagement";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_engagement'] = $_GET['ID_engagement'];
			}
			if (isset($_GET['title'])) {
				$this->data = array(
					'File_engagement'	=> ''
				);
				$this->MLeadership->edit_engagement($this->data, $_GET['ID_engagement']);
			} else if (isset($_GET['file'])) {
				$this->data = array(
					'Title_engagement'	=> '',
					'Content_engagement'	=> '',
				);
				$this->MLeadership->edit_engagement($this->data, $_GET['ID_engagement']);
			} else {
				$this->MLeadership->delete_engagement($_GET['ID_engagement']);
			}
			return redirect(base_url() . 'Employee_Account/List_engagement');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_add_policy()
	{
		//	echo "hi"; die();
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['policy'] = $this->Mpolicy->get_policy_by_ID_company($this->data['ID_company']);
			$this->data['ID_policy'] = $this->data['policy'][0]['ID_policy'];
			$this->data['File_policy'] = $this->data['policy'][0]['File_policy'];
			//$this->data['axe'] = $this->Mpolicy->get_policy_axe_by_ID_Policy($this->data['ID_policy']);
			$this->data['axe'] = $this->Mpolicy->get_policy_axe_by_company($this->data['ID_company']);

			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/leadershipMod/Add_policy.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_policy()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_policy']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_policy']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_policy']['tmp_name'];
				$fileDestination = './uploads/Policy/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'File_policy'	=> $insertfile
			);
			if (isset($_POST['ID_policy'])) {
				//echo $_POST['ID_policy'];
				//die();
				$this->Mpolicy->edit_policy($this->data1, $this->data['ID_policy']);
			} else {
				/*************************Add******************************/
				$this->Mpolicy->add_policy($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/Form_add_policy');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_policy_axe()
	{
		//	echo "hi";die();
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				//	'ID_policy'	=> $_POST['ID_policy'],
				'ID_company'	=> $this->data['ID_company'],
				'Name_policy_axe'	=> $_POST['Name_policy_axe'],

			);
			if (isset($_POST['ID_policy_axe'])) {
				//echo $_POST['ID_policy_axe'];
				//die();
				$this->Mpolicy->edit_policy_axe($this->data1, $this->data['ID_policy_axe']);
			} else {
				/*************************Add******************************/
				$this->Mpolicy->add_policy_axe($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/Form_add_policy');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function delete_policy_axe()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_policy_axe'] = $_GET['ID_policy_axe'];
			}
			$this->Mpolicy->delete_policy_axe($_GET['ID_policy_axe']);

			return redirect(base_url() . 'Employee_Account/Form_add_policy');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function delete_policy()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_policy'] = $_GET['ID_policy'];
			}

			$this->Mpolicy->delete_policy($_GET['ID_policy']);

			return redirect(base_url() . 'Employee_Account/Form_add_policy');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Read_policy()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "Form_add_policy";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->Mpolicy->edit_read_policy();
			//echo $this->data['ID_employee']; die();
			return redirect(base_url() . 'Employee_Account/Index');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_role()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);






		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*********************Paging*******************************/
			/******************End Paging******************************/
			$this->load->view('Employee/leadershipMod/List_role.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_revue()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_revue";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*********************Paging*******************************/
			/******************End Paging******************************/
			$this->data['revue'] = $this->Mrevue->get_revue_by_ID_company($this->data['ID_company']);
			//echo 'hi'; die();
			$this->load->view('Employee/leadershipMod/List_revue.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_revue()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_revue";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['revue'] = $this->Mrevue->get_revue_by_ID_company($this->data['ID_company']);
			$this->data['ID_revue'] = $this->data['revue'][0]['ID_revue'];
			$this->data['Title_revue'] = $this->data['revue'][0]['Title_revue'];
			$this->data['Date_revue'] = $this->data['revue'][0]['Date_revue'];
			$this->data['File_revue'] = $this->data['revue'][0]['File_revue'];
*/
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/leadershipMod/Add_revue.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_revue()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_revue";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_revue']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_revue']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_revue']['tmp_name'];
				$fileDestination = './uploads/revue/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_revue'	=> $_POST['Title_revue'],
				'Date_revue'	=> $_POST['Date_revue'],
				'File_revue'	=> $insertfile,

			);
			if (isset($_POST['ID_revue'])) {
				//echo $_POST['ID_revue'];
				//die();
				$this->Mrevue->edit_revue($this->data1, $_POST['ID_revue']);
			} else {
				/*************************Add******************************/
				$this->Mrevue->add_revue($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_revue');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_revue()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_revue";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_revue'] = $_GET['ID_revue'];
				$this->data['revue'] = $this->Mrevue->get_revue_by_ID($this->data['ID_revue']);
				$this->data['Title_revue'] = $this->data['revue'][0]['Title_revue'];
				$this->data['Date_revue'] = $this->data['revue'][0]['Date_revue'];
				$this->data['File_revue'] = $this->data['revue'][0]['File_revue'];
			}
			$this->load->view('Employee/leadershipMod/Add_revue.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_revue()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_revue";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_revue'] = $_GET['ID_revue'];
			}

			$this->Mrevue->delete_revue($_GET['ID_revue']);

			return redirect(base_url() . 'Employee_Account/List_revue');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/***************************ORG************************/
	public function Form_add_organigramme()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['organigramme'] = $this->Morganigramme->get_organigramme_by_ID_company($this->data['ID_company']);
			$this->data['ID_organigramme'] = $this->data['organigramme'][0]['ID_organigramme'];
			$this->data['File_organigramme'] = $this->data['organigramme'][0]['File_organigramme'];

			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/leadershipMod/Add_organigramme.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_organigramme()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_organigramme']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_organigramme']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_organigramme']['tmp_name'];
				$fileDestination = './uploads/organigramme/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'File_organigramme'	=> $insertfile
			);
			if (isset($_POST['ID_organigramme'])) {
				//echo $_POST['ID_organigramme'];
				//die();
				$this->Morganigramme->edit_organigramme($this->data1, $this->data['ID_organigramme']);
			} else {
				/*************************Add******************************/
				$this->Morganigramme->add_organigramme($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/Form_add_organigramme');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_organigramme()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_organigramme'] = $_GET['ID_organigramme'];
			}

			$this->Morganigramme->delete_organigramme($_GET['ID_organigramme']);

			return redirect(base_url() . 'Employee_Account/Form_add_organigramme');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/**************************************************************************/
	/**************************************************************************/
	/******************************* Support **********************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_res_humain()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/SupportMod/List_res_humain.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_recrutement()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['recrutement'] = $this->Mrecrutement->get_recrutement_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/RecuitmentMod/List_recrutement.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_recrutement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['recrutement'] = $this->Mrecrutement->get_recrutement_by_ID_company($this->data['ID_company']);
			$this->data['ID_recrutement'] = $this->data['recrutement'][0]['ID_recrutement'];
			$this->data['Title_recrutement'] = $this->data['recrutement'][0]['Title_recrutement'];
			$this->data['Date_recrutement'] = $this->data['recrutement'][0]['Date_recrutement'];
			$this->data['File_recrutement'] = $this->data['recrutement'][0]['File_recrutement'];
               */
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/SupportMod/Add_recrutement.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_recrutement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_recrutement']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_recrutement']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_recrutement']['tmp_name'];
				$fileDestination = './uploads/recrutement/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_recrutement'	=> $_POST['Title_recrutement'],
				'Date_recrutement'	=> $_POST['Date_recrutement'],
				'File_recrutement'	=> $insertfile,

			);
			if (isset($_POST['ID_recrutement'])) {
				//echo $_POST['ID_recrutement'];
				//die();
				$this->Mrecrutement->edit_recrutement($this->data1, $_POST['ID_recrutement']);
			} else {
				/*************************Add******************************/
				$this->Mrecrutement->add_recrutement($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_recrutement');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_recrutement()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_recrutement'] = $_GET['ID_recrutement'];
				$this->data['recrutement'] = $this->Mrecrutement->get_recrutement_by_ID($this->data['ID_recrutement']);
				$this->data['Title_recrutement'] = $this->data['recrutement'][0]['Title_recrutement'];
				$this->data['Date_recrutement'] = $this->data['recrutement'][0]['Date_recrutement'];
				$this->data['File_recrutement'] = $this->data['recrutement'][0]['File_recrutement'];
			}
			$this->load->view('Employee/SupportMod/Add_recrutement.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_recrutement()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_recrutement'] = $_GET['ID_recrutement'];
			}

			$this->Mrecrutement->delete_recrutement($_GET['ID_recrutement']);

			return redirect(base_url() . 'Employee_Account/List_recrutement');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_followup()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['followup'] = $this->Mfollowup->get_followup_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/SupportMod/List_followup.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_add_followup()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['followup'] = $this->Mfollowup->get_followup_by_ID_company($this->data['ID_company']);
			$this->data['ID_followup'] = $this->data['followup'][0]['ID_followup'];
			$this->data['Title_followup'] = $this->data['followup'][0]['Title_followup'];
			$this->data['Date_followup'] = $this->data['followup'][0]['Date_followup'];
			$this->data['File_followup'] = $this->data['followup'][0]['File_followup'];
*/
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/SupportMod/Add_followup.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_followup()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_followup']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_followup']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_followup']['tmp_name'];
				$fileDestination = './uploads/followup/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_followup'	=> $_POST['Title_followup'],
				'Date_followup'	=> $_POST['Date_followup'],
				'File_followup'	=> $insertfile,

			);
			if (isset($_POST['ID_followup'])) {
				//echo $_POST['ID_followup'];
				//die();
				$this->Mfollowup->edit_followup($this->data1, $_POST['ID_followup']);
			} else {
				/*************************Add******************************/
				$this->Mfollowup->add_followup($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_followup');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_followup()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_followup'] = $_GET['ID_followup'];
				$this->data['followup'] = $this->Mfollowup->get_followup_by_ID($this->data['ID_followup']);
				$this->data['Title_followup'] = $this->data['followup'][0]['Title_followup'];
				$this->data['Date_followup'] = $this->data['followup'][0]['Date_followup'];
				$this->data['File_followup'] = $this->data['followup'][0]['File_followup'];
			}
			$this->load->view('Employee/SupportMod/Add_followup.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_followup()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_followup'] = $_GET['ID_followup'];
			}

			$this->Mfollowup->delete_followup($_GET['ID_followup']);

			return redirect(base_url() . 'Employee_Account/List_followup');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*	public function List_suivi()
	{

		//$this->commonData();
		///*************************Access Verif************************
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
/			/*********************End Access Verif***********************

		//	$this->load->view('Employee/SupportMod/List_suivi.php', $this->data);
	/		/*************************Access Verif************************
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
	//	//*********************End Access Verif************************
	}*/


	/**************************************************************************/
	/**************************************************************************/
	/**************************** Ressources QSE ******************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_res_qse()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['res_qse'] = $this->Mres_qse->get_res_qse_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/SupportMod/List_res_qse.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_res_qse()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['res_qse'] = $this->Mres_qse->get_res_qse_by_ID_company($this->data['ID_company']);
			$this->data['ID_res_qse'] = $this->data['res_qse'][0]['ID_res_qse'];
			$this->data['Title_res_qse'] = $this->data['res_qse'][0]['Title_res_qse'];
			$this->data['Date_res_qse'] = $this->data['res_qse'][0]['Date_res_qse'];
			$this->data['File_res_qse'] = $this->data['res_qse'][0]['File_res_qse'];
               */
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/SupportMod/Add_res_qse.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_res_qse()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_res_qse']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_res_qse']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_res_qse']['tmp_name'];
				$fileDestination = './uploads/res_qse/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_res_qse'	=> $_POST['Title_res_qse'],
				'Date_res_qse'	=> $_POST['Date_res_qse'],
				'File_res_qse'	=> $insertfile,

			);
			if (isset($_POST['ID_res_qse'])) {
				//echo $_POST['ID_res_qse'];
				//die();
				$this->Mres_qse->edit_res_qse($this->data1, $_POST['ID_res_qse']);
			} else {
				/*************************Add******************************/
				$this->Mres_qse->add_res_qse($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_res_qse');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_res_qse()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_res_qse'] = $_GET['ID_res_qse'];
				$this->data['res_qse'] = $this->Mres_qse->get_res_qse_by_ID($this->data['ID_res_qse']);
				$this->data['Title_res_qse'] = $this->data['res_qse'][0]['Title_res_qse'];
				$this->data['Date_res_qse'] = $this->data['res_qse'][0]['Date_res_qse'];
				$this->data['File_res_qse'] = $this->data['res_qse'][0]['File_res_qse'];
			}
			$this->load->view('Employee/SupportMod/Add_res_qse.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_res_qse()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_res_qse'] = $_GET['ID_res_qse'];
			}

			$this->Mres_qse->delete_res_qse($_GET['ID_res_qse']);

			return redirect(base_url() . 'Employee_Account/List_res_qse');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/**************************************************************************/
	/**************************************************************************/
	/**************************** Ressources Tech *****************************/
	/**************************************************************************/
	/**************************************************************************/

	public function List_res_technic()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['res_technic'] = $this->Mres_technic->get_res_technic_by_ID_company($this->data['ID_company']);

			$this->load->view('Employee/SupportMod/List_res_technic.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_add_res_technic()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			/*	$this->data['res_technic'] = $this->Mres_technic->get_res_technic_by_ID_company($this->data['ID_company']);
			$this->data['ID_res_technic'] = $this->data['res_technic'][0]['ID_res_technic'];
			$this->data['Title_res_technic'] = $this->data['res_technic'][0]['Title_res_technic'];
			$this->data['Date_res_technic'] = $this->data['res_technic'][0]['Date_res_technic'];
			$this->data['File_res_technic'] = $this->data['res_technic'][0]['File_res_technic'];
               */
			/************************ Access Menu *******************************/
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/SupportMod/Add_res_technic.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_res_technic()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			/*************************Upload File*********************************/
			if ($_FILES['File_res_technic']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_res_technic']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_res_technic']['tmp_name'];
				$fileDestination = './uploads/res_technic/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

			//if ($_POST) {
			/************************Add - Update***************************************/
			$this->data1 = array(
				'ID_company'	=> $this->data['ID_company'],
				'Title_res_technic'	=> $_POST['Title_res_technic'],
				'Date_res_technic'	=> $_POST['Date_res_technic'],
				'File_res_technic'	=> $insertfile,

			);
			if (isset($_POST['ID_res_technic'])) {
				//echo $_POST['ID_res_technic'];
				//die();
				$this->Mres_technic->edit_res_technic($this->data1, $_POST['ID_res_technic']);
			} else {
				/*************************Add******************************/
				$this->Mres_technic->add_res_technic($this->data1);
			}
			//}
			//echo print_r($this->data1);
			//die();
			return redirect(base_url() . 'Employee_Account/List_res_technic');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_res_technic()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_res_technic'] = $_GET['ID_res_technic'];
				$this->data['res_technic'] = $this->Mres_technic->get_res_technic_by_ID($this->data['ID_res_technic']);
				$this->data['Title_res_technic'] = $this->data['res_technic'][0]['Title_res_technic'];
				$this->data['Date_res_technic'] = $this->data['res_technic'][0]['Date_res_technic'];
				$this->data['File_res_technic'] = $this->data['res_technic'][0]['File_res_technic'];
			}
			$this->load->view('Employee/SupportMod/Add_res_technic.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function delete_res_technic()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_res_technic'] = $_GET['ID_res_technic'];
			}

			$this->Mres_technic->delete_res_technic($_GET['ID_res_technic']);

			return redirect(base_url() . 'Employee_Account/List_res_technic');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** Extern_Audit ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	/****************************organization *****************************/
	public function organizations()
	{
		$this->auditquality = $this->Maudit_extern->select_organizations();
		//echo print_r($this->auditquality); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/organizations', $this->auditquality);
		$this->load->view('Employee/Footer');
	}
	public function add_organization()
	{
		$this->Maudit_extern = $this->Maudit_extern->select_audit_plan_list();
		//echo print_r($this->auditquality); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/add_organization', $this->Maudit_extern);
		$this->load->view('Employee/Footer');
	}



	public function add_organizations()
	{
		/*************************Upload File*********************************/
		//echo $_FILES['picture']['name'];die();
		if ($_FILES['Band_image_organization']['name'] == "") {
			$insertfile = '';
			//echo 'hhhhh';die();
		} else {
			//echo'else';die();
			$fileimg = $_FILES['Band_image_organization']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			$fileName = time();
			$fileTmpName = $_FILES['Band_image_organization']['tmp_name'];
			$fileDestination = './uploads/organization/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);
			$insertfile = $fileName . '.' . $extimg;
		}
		//	echo $insertfile ; die();
		/*********************End Upload File*********************************/
		$data = array(
			'Name_organization' => $_POST['Name_organization'],
			'Name_contact_organization' => $_POST['Name_contact_organization'],
			'Phone_organization' => $_POST['Phone_organization'],
			'Email_organization' => $_POST['Email_organization'],
			'Address_organization' => $_POST['Address_organization'],
			'Band_image_organization' => $insertfile,
		);
		$this->Maudit_extern->add_organizations($data);
		return redirect(base_url() . 'Employee_Account/organizations');
	}


	public function form_edit_organization()
	{

		$ID_organization = $_GET['ID_organization'];
		//die();
		//echo $_GET['id_emp']; die() ;
		//$this->Maudit_extern=$this->Maudit_extern->select_audit_plan_list();
		//	$this->$da=$this->Maudit_extern->select_audit_byID();
		$this->tab = $this->Maudit_extern->select_audit_byID();


		//die();
		$data['ID_organization'] = $this->tab[0]['ID_organization'];
		$data['Name_organization'] = $this->tab[0]['Name_organization'];
		$data['Name_contact_organization'] = $this->tab[0]['Name_contact_organization'];
		$data['Phone_organization'] = $this->tab[0]['Phone_organization'];
		$data['Email_organization'] = $this->tab[0]['Email_organization'];
		$data['Address_organization'] = $this->tab[0]['Address_organization'];
		$data['Band_image_organization'] = $this->tab[0]['Band_image_organization'];
		//echo print_r($this->Maudit_extern); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/edit_organization', $data);
		$this->load->view('Employee/Footer');
	}

	public function delete_organization($ID_audit_plan_extern)
	{
		//echo $ID_audit_plan_extern; die();

		$this->Maudit_extern->delete($ID_audit_plan_extern);
		return redirect(base_url() . 'Employee_Account/organizations');
	}
	/*********************************End organozation*******************************************/



	/******************************* Survey ****************************************************/
	public function add_survey()
	{
		$this->constat = $this->Maudit_extern->select_constat();
		$this->processus = $this->Maudit_extern->select_processus();

		$this->ID_audit_extern = $_POST['ID_audit_extern'];
		//$this->processus=$this->audit->select_employee();
		//$this->ID_audit_plan_extern=$_POST['ID_audit_plan_extern'];

		$this->auditquality = $this->Maudit_extern->select_survey_byID($this->ID_audit_extern);
		//echo print_r($this->auditquality); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/add_survey', $this->auditquality);
		$this->load->view('Employee/Footer');
	}
	public function survey()
	{
		$data = array(
			'ID_survey' => $_POST['ID_survey'],
			'Cheklist_survey_extern' => $_POST['Cheklist_survey_extern'],
			'ID_constat_extern' => $_POST['ID_constat'],
			'Chaptre_Reference_survey_extern' => $_POST['Chaptre_Reference_survey_extern'],
			'Text_survey_extern' => $_POST['Text_survey_extern'],
			'Corrective_survey_extern' => $_POST['Corrective_survey_extern'],
			'ID_audit_extern' => $_POST['ID_audit_extern'],
			'ID_processus' => $_POST['ID_processus'],

		);
		//$_POST ['ID_audit_plan_extern']
		//echo print_r($data);die();

		$this->Maudit_extern->add_survey($data);
		return redirect(base_url() . 'Employee_Account/form_Survey?ID_audit_extern=' . $_POST['ID_audit_extern']);
	}
	public function form_edit_survey()
	{
		$ID_survey = $_GET['ID_survey'];
		//echo $_GET['id_emp']; die() ;
		$this->constat = $this->Maudit_extern->select_constat();
		$this->processus = $this->Maudit_extern->select_processus();
		$this->Maudit_extern = $this->Maudit_extern->select_survey1_byID($ID_survey);
		$data['ID_audit_extern'] = $this->Maudit_extern[0]['ID_audit_extern'];
		$data['ID_constat_extern'] = $this->Maudit_extern[0]['ID_constat_extern'];
		$data['Cheklist_survey_extern'] = $this->Maudit_extern[0]['Cheklist_survey_extern'];
		$data['Chaptre_Reference_survey_extern'] = $this->Maudit_extern[0]['Chaptre_Reference_survey_extern'];
		$data['Text_survey_extern'] = $this->Maudit_extern[0]['Text_survey_extern'];
		$data['Corrective_survey_extern'] = $this->Maudit_extern[0]['Corrective_survey_extern'];
		$data['Title_constat'] = $this->Maudit_extern[0]['Title_constat'];
		$data['Title_processus'] = $this->Maudit_extern[0]['Title_processus'];

		//echo print_r($this->Maudit_extern); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/edit_survey', $data, $this->constat, $this->processus);
		$this->load->view('Employee/Footer');
	}
	public function edit_survey($ID_survey)

	{
		// echo $id_emp; die();
		$data = array(
			'Cheklist_survey_extern' => $_POST['Cheklist_survey_extern'],
			'Chaptre_Reference_survey_extern' => $_POST['Chaptre_Reference_survey_extern'],
			'Text_survey_extern' => $_POST['Text_survey_extern'],
			'Corrective_survey_extern' => $_POST['Corrective_survey_extern'],
			'ID_audit_extern' => $_POST['ID_audit_extern'],
			'ID_constat_extern' => $_POST['ID_constat'],
			'ID_processus' => $_POST['ID_processus'],
		);
		//echo print_r($data); die();
		$this->Maudit_extern->edit_survey($data, $ID_survey);

		return redirect('Employee_Account/form_Survey?ID_audit_extern=' . $_POST['ID_audit_extern']);
	}
	public function delete_Survey()
	{
		//echo $ID_audit_plan_extern; die();

		$this->Maudit_extern->delete_survey($_GET['ID_survey']);

		return redirect(base_url() . 'Employee_Account/form_Survey?ID_audit_extern=' . $_GET['ID_audit_extern']);
	}
	public function form_Survey()
	{
		$this->ID_audit_extern = $_GET['ID_audit_extern'];
		//$this->ID_audit_plan_extern=$_GET['ID_audit_plan_extern'];

		//	echo $ID_audit_extern; die() ;	
		$this->survey = $this->Maudit_extern->select_survey_byID($this->ID_audit_extern);

		$this->Maudit_extern = $this->Maudit_extern->select_admin_byID($this->ID_audit_extern);

		//echo print_r($this->survey); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/Survey', $this);
		$this->load->view('Employee/Footer');
	}
	public function view_Survey()
	{
		$this->ID_audit_extern = $_GET['ID_audit_extern'];
		$this->ID_audit_plan_extern = $_GET['ID_audit_plan_extern'];

		//echo $this->ID_audit_extern; die();
		$this->auditquality = $this->Maudit_extern->select_adminSurvey($this->ID_audit_plan_extern);
		//echo print_r($this->auditquality); die();
		$this->load->view('Employee/audit_extern/Survey', $this->auditquality);
	}
	/******************************* End Survey ****************************************************/

	/******************************* Extern Audit ****************************************************/

	public function edit_audit($ID_organization)

	{

		/*************************Upload File*********************************/
		//echo $_FILES['picture']['name'];die();
		if ($_FILES['Band_image_organization']['name'] == "") {
			$insertfile = '';
			//echo 'hhhhh';die();
		} else {
			//echo'else';die();
			$fileimg = $_FILES['Band_image_organization']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			$fileName = time();
			$fileTmpName = $_FILES['Band_image_organization']['tmp_name'];
			$fileDestination = './uploads/organization/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);
			$insertfile = $fileName . '.' . $extimg;
		}
		//	echo $insertfile ; die();
		/*********************End Upload File*********************************/
		// echo $id_emp; die();
		$data = array(
			'Name_organization' => $_POST['Name_organization'],
			'Name_contact_organization' => $_POST['Name_contact_organization'],
			'Phone_organization' => $_POST['Phone_organization'],
			'Email_organization' => $_POST['Email_organization'],
			'Address_organization' => $_POST['Address_organization'],
			'Band_image_organization' => $insertfile
		);
		$this->Maudit_extern->edit_audit($data, $ID_organization);

		return redirect(base_url() . 'Employee_Account/organizations');
	}
	public function extern_audit()
	{

		//$this->ID_audit_plan_extern=$_GET['ID_audit_plan_extern'];
		$this->organization = $this->Maudit_extern->select_organizations();
		$this->auditquality = $this->Maudit_extern->select_audit_extern();
		//echo print_r($this->auditquality); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/extern_audit', $this->auditquality);
		$this->load->view('Employee/Footer');
	}
	public function add_extern_audit()
	{
		$this->organization = $this->Maudit_extern->select_organizations();
		//	$this->ID_audit_plan_extern=$_POST['ID_audit_plan_extern'];
		$this->auditquality = $this->Maudit_extern->select_audit_extern();
		//echo print_r($this->auditquality); die();
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_res_technic";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		$this->load->view('Employee/audit_extern/add_extern_audit', $this->auditquality);
		$this->load->view('Employee/Footer');
	}

	public function add_audit_extern()
	{
		$data = array(
			'Membre_audit_extern' => $_POST['Membre_audit_extern'],
			'Mission_audit_extern' => $_POST['Mission_audit_extern'],
			'planned_date_audit_extern' => $_POST['planned_date_audit_extern'],
			'Result_audit_extern' => $_POST['Result_audit_extern'],
			'Synthesis_audit_extern' => $_POST['Synthesis_audit_extern'],
			'Description_audit_extern' => $_POST['Description_audit_extern'],
			'Create_date_audit_extern' => $_POST['Create_date_audit_extern'],
			'real_date_audit_extern' => $_POST['real_date_audit_extern'],
			'objectif_extern' => $_POST['objectif_extern'],
			'domaine_extern' => $_POST['domaine_extern'],
			'methodologie_extern' => $_POST['methodologie_extern'],
			'evaluation_extern' => $_POST['evaluation_extern'],
			'Lieu_audit_extern' => $_POST['Lieu_audit_extern'],
			'Type_audit_extern' => $_POST['Type_audit_extern'],
			'Auditeur_extern' => $_POST['Auditeur_extern'],
			//'ID_audit_plan_extern'=> $_POST ['ID_audit_plan_extern'],
			'ID_organization' => $_POST['ID_organization'],
		);
		//echo print_r($data);die();

		$this->Maudit_extern->add_audit_extern($data);
		return redirect(base_url() . 'Employee_Account/extern_audit');
	}
	public function delete_audit($ID_audit_plan_extern)
	{
		//echo $ID_audit_plan_extern; die();

		$this->Maudit_extern->delete($ID_audit_plan_extern);
		return redirect(base_url() . 'Employee_Account/organizations');
	}
	/******************************* End Extern Audit  ****************************************************/


	function insert_post($ID_audit_plan_extern)
	{
		$this->db->insert('auditquality_audit_plan_extern', $ID_audit_plan_extern);
		return $this->db->insert_id();
	}
	function insert_in_second_table($ID_audit_plan_extern)
	{
		$foreign_key = $this->insert_post($ID_audit_plan_extern);
		$data = array(
			'ID_audit_plan_extern' => $foreign_key,
		);
		$this->db->insert('auditquality_extern_audit', $data);
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************** End Extern_Audit ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/******************************** Entete ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	public function submit_add_Entete()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_Processus";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				if ($_POST['Type_entete'] == 1) {
					$link = "/Report_interest";
				}
				if ($_POST['Type_entete'] == 2) {
					$link = "/Report_enjeu";
				}
				$this->data = array(
					/*****entête */
					'Title_entete' => $_POST['Title_entete'],
					'ID_processus' => $_POST['ID_processus'],
					'ID_doc' => $_POST['ID_doc'],
					'Order_doc_entete' => $_POST['Order_doc_entete'],
					'Version_doc_entete' => $_POST['Version_doc_entete'],
					'Type_entete' => $_POST['Type_entete'],
					'ID_function' => 69,
					'Title_link_doc_entete' => $link,
					/*****entête */
					'ID_company' => $this->data['ID_company']

				);

				$this->Mentete->add_entete_doc($this->data);
			}
			if ($_POST['Type_entete'] == 1) {
				return redirect(base_url() . 'Employee_Account/Report_interest');
			}
			if ($_POST['Type_entete'] == 2) {
				return redirect(base_url() . 'Employee_Account/Report_enjeu');
			}
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function delete_Entete()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_domain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);

		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_entete'] = $_GET['ID_entete'];
			}

			$this->Mentete->delete_entete_doc($_GET['ID_entete']);

			if ($_GET['Type_entete'] == 1) {
				return redirect(base_url() . 'Employee_Account/Report_interest');
			} else {
				return redirect(base_url() . 'Employee_Account/Report_enjeu');
			}

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/***************************************************************************/
	/***************************************************************************/
	/******************************** Entete ***********************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/****************************** SKILLS *************************************/
	/***************************************************************************/
	/***************************************************************************/


	public function Form_add_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_POST) {
				$this->data_skill = array(
					'Name_skill' => $_POST['Name_skill'],
					'Description_skill' => $_POST['Description_skill'],
				);
				if (isset($_POST['ID_skill'])) {
					$this->data['skill_cu'] = $this->Mskill->get_skill_by_ID($_POST['ID_skill']);
					$this->data['current_skill'] = $this->data['skill_cu'][0]['Name_skill'];
					//echo $this->data['current_skill']; die();
					if ($this->data['current_skill'] != $_POST['Name_skill']) {
						if ($this->Mskill->get_skill_by_Name($_POST['Name_skill']) != False) {
							$this->data['exist'] = 1;
							$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);
						}
					} else {
						$ID_skill = $_POST['ID_skill'];
						$this->Mskill->edit_skill($this->data_skill, $ID_skill);
						return redirect(base_url() . 'Technical_Account/List_Skills', $this->data);
					}
				} else {
					if ($this->Mskill->get_skill_by_Name($_POST['Name_skill']) != False) {
						$this->data['exist'] = 1;
						$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);
					} else {
						$this->Mskill->add_skill($this->data_skill);
					}
				}
			}
			return redirect(base_url() . 'Technical_Account/List_Skills', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_skills()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		// die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskill->get_skills_paging($page) == False) {
				$this->data['empty'] = 1;
				//echo $this->data['empty']; die();
			} else {

				$this->data['skills'] = $this->Mskill->get_skills_paging($page);
			}
			$this->data['nb'] = $this->Mskill->get_skills_nb_page();

			/******************End Paging******************************/


			// $this->data['skills'] = $this->Mskill->get_skills();
			$this->load->view('Employee/SkillMod/List_Skills.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/*************************************************************************/
	/*************************************************************************/
	/****************************Employee by Skill****************************/
	/*************************************************************************/
	/*************************************************************************/

	public function List_employees_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['ID_skill'] = $_GET['ID_skill'];
			$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
			$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];

			//die();
			//echo $_POST['Grade_tri'];
			//die();
			if (isset($_POST['Grade_tri'])) {
				$this->data['Grade_tri'] = $_POST['Grade_tri'];
				$tri = $_POST['Grade_tri'];
			} else {
				$tri = 100;
			}
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskill->get_employee_by_skill_paging($page, $this->data['ID_skill'], $tri) == False) {
				$this->data['empty'] = 1;
				//echo $this->data['empty']; die();
			} else {

				$this->data['employees'] = $this->Mskill->get_employee_by_skill_paging($page, $this->data['ID_skill'], $tri);
			}
			$this->data['nb'] = $this->Mskill->get_employee_by_skill_nb_page($this->data['ID_skill'], $tri);
			/*echo "
<pre>";
		echo print_r($this->data['employees']);
		echo "<pre>";
		die();*/
			/******************End Paging******************************/
			$this->data['group'] = $this->Mskill->get_group_training_by_skill($this->data['ID_skill']);

			//$this->data['group_employee'] = $this->Mskill->get_group_training();

			$this->load->view('Employee/SkillMod/List_employees_skill.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/******************************Training Group*****************************/

	public function Form_add_training_group()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training_group()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		/*echo "here";
		die();*/
			if ($_POST) {
				$this->data['ID_skill'] = $_POST['ID_skill'];

				$this->data_training_group = array(
					'Name_training_group' => $_POST['Name_training_group'],
					'ID_skill' => $_POST['ID_skill'],
				);

				$this->Mtraining_group->add_training_group($this->data_training_group);
				return redirect(base_url() . 'Technical_Account/List_employees_skill?ID_skill=' . $this->data['ID_skill'], $this->data);
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Add_training_group_employee()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['ID_skill'] = $_GET['ID_skill'];
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];

			//$this->data['group_employee'] = $this->Mskill->get_group_training_filtred($this->data['ID_skill_employee']);
			$this->data['group_employee'] = $this->Mskill->get_group_training_by_skill($this->data['ID_skill']);

			$this->data['group_employee_exist'] = $this->Mskill->get_group_training_by_employee($this->data['ID_skill_employee']);
			//	echo "<pre>";
			//	echo print_r($this->data['group_employee']);
			//	echo "<pre>";
			//	die();

			//	echo $this->data['ID_skill_employee'];
			//	die();
			$this->load->view('Employee/SkillMod/Add_training_group_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_training_group_employee()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		//echo "here";
			//die();
			if ($_POST) {
				$this->data['ID_skill'] = $_POST['ID_skill'];

				$this->data_training_group = array(
					'ID_training_group' => $_POST['ID_training_group'],
					'ID_skill_employee' => $_POST['ID_skill_employee'],

					//'Description_training_group' => $_POST['Description_training_group'],
				);
				/*echo $_POST['ID_training_group'];
			echo "--";
			echo $_POST['ID_skill_employee'];
			die();*/
				$this->Mtraining_group->add_training_group_employee($this->data_training_group);
				return redirect(base_url() . 'Technical_Account/List_employees_skill?ID_skill=' . $this->data['ID_skill'], $this->data);
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_training_group()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_skill'] = $_GET['ID_skill'];

				$this->data['ID_training_group'] = $_GET['ID_training_group'];
				$this->data['training_group'] = $this->Mtraining_group->delete_training_group($this->data['ID_training_group']);
			}
			return redirect(base_url() . 'Technical_Account/List_employees_skill?ID_skill=' . $this->data['ID_skill'], $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	/*************************************************************************/
	/*************************************************************************/
	/************************End Employee by Skill****************************/
	/*************************************************************************/
	/*************************************************************************/

	public function Form_edit_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_skill'] = $_GET['ID_skill'];
				$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
				$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];
				$this->data['Description_skill'] = $this->data['skill'][0]['Description_skill'];
			}
			$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_skill'] = $_GET['ID_skill'];
				$this->data['skill'] = $this->Mskill->delete_skill($this->data['ID_skill']);
			}
			return redirect(base_url() . 'Technical_Account/List_Skills');
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_skill()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		if ($_GET) {
				$this->data['ID_skill'] = $_GET['ID_skill'];
				$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
				$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];
				$this->data['Description_skill'] = $this->data['skill'][0]['Description_skill'];
			}
			$this->load->view('Employee/SkillMod/View_skill.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END SKILLS *************************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/****************************** POSTS *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			/*echo print_r($this->data['position']);
		die();*/
			$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data_post = array(
					'Name_post' => $_POST['Name_post'],
					'Do_post' => $_POST['Do_post'],
					'Plan_post' => $_POST['Plan_post'],
					'Check_post' => $_POST['Check_post'],
					'Act_post' => $_POST['Act_post'],
					'Formation_post' => $_POST['Formation_post'],
					'Experience_post' => $_POST['Experience_post'],
					'Moyen_post' => $_POST['Moyen_post'],
					'Contraint_post' => $_POST['Contraint_post'],
					'Indicateur_post' => $_POST['Indicateur_post'],
					'ID_parent' => $_POST['ID_parent'],
					'ID_company' => $this->data['ID_company'],
				);

				//echo print_r($this->data_post);
				//die();
				if (isset($_POST['ID_post'])) {
					/***************** */
					$this->data['post_cu'] = $this->Mpost->get_post_by_ID($_POST['ID_post']);
					$this->data['current_post'] = $this->data['post_cu'][0]['Name_post'];
					//echo $this->data['current_post']; die();
					if ($this->data['current_post'] != $_POST['Name_post']) {

						/*************** */
						if ($this->Mpost->get_post_by_Name($_POST['Name_post']) != False) {
							$this->data['exist'] = 1;
							$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
						}
					} else {
						$ID_post = $_POST['ID_post'];
						$this->Mpost->edit_post($this->data_post, $ID_post);
						return redirect(base_url() . 'Technical_Account/List_posts');
					}
				} else {
					if ($this->Mpost->get_post_by_Name($_POST['Name_post']) != False) {
						$this->data['exist'] = 1;
						$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
					} else {
						$this->Mpost->add_post($this->data_post);
						return redirect(base_url() . 'Technical_Account/List_posts');
					}
				}
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_posts()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		//echo $_GET['ID_post'] ; die();

			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mpost->get_posts_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['posts'] = $this->Mpost->get_posts_paging($page);
			}
			$this->data['nb'] = $this->Mpost->get_posts_nb_page();

			/******************End Paging******************************/


			//	$this->data['posts'] = $this->Mpost->get_posts();
			$this->load->view('Employee/PositionMod/List_posts.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				$this->data['position'] = $this->Mpost->get_posts();

				//echo 'hi'; die();
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
				$this->data['Name_post'] = $this->data['post'][0]['Name_post'];
				//	$this->data['Description_post'] = $this->data['post'][0]['Description_post'];

				$this->data['Do_post'] = $this->data['post'][0]['Do_post'];
				$this->data['Plan_post'] = $this->data['post'][0]['Plan_post'];
				$this->data['Check_post'] = $this->data['post'][0]['Check_post'];
				$this->data['Act_post'] = $this->data['post'][0]['Act_post'];
				$this->data['Formation_post'] = $this->data['post'][0]['Formation_post'];
				$this->data['Experience_post'] = $this->data['post'][0]['Experience_post'];
				$this->data['Moyen_post'] = $this->data['post'][0]['Moyen_post'];
				$this->data['Contraint_post'] = $this->data['post'][0]['Contraint_post'];
				$this->data['Indicateur_post'] = $this->data['post'][0]['Indicateur_post'];
				$this->data['ID_parent'] = $this->data['post'][0]['ID_parent'];
				$this->data['ID_company'] = $this->data['post'][0]['ID_company'];
			}
			$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->delete_post($this->data['ID_post']);
			}
			return redirect(base_url() . 'Technical_Account/List_posts');
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_post()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
				$this->data['Name_post'] = $this->data['post'][0]['Name_post'];
				//	$this->data['Description_post'] = $this->data['post'][0]['Description_post'];
				$this->data['Do_post'] = $this->data['post'][0]['Do_post'];
				$this->data['Plan_post'] = $this->data['post'][0]['Plan_post'];
				$this->data['Check_post'] = $this->data['post'][0]['Check_post'];
				$this->data['Act_post'] = $this->data['post'][0]['Act_post'];
				$this->data['Formation_post'] = $this->data['post'][0]['Formation_post'];
				$this->data['Experience_post'] = $this->data['post'][0]['Experience_post'];
				$this->data['Moyen_post'] = $this->data['post'][0]['Moyen_post'];
				$this->data['Contraint_post'] = $this->data['post'][0]['Contraint_post'];
				$this->data['Indicateur_post'] = $this->data['post'][0]['Indicateur_post'];
				$this->data['ID_parent'] = $this->data['post'][0]['ID_parent'];
				$this->data['ID_company'] = $this->data['post'][0]['ID_company'];
			}
			$this->load->view('Employee/PositionMod/View_post.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END POSTS *************************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/************************** SKILLS Management ******************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_skill_management()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_GET['ID_post']) {
				$this->data['ID_post'] = $_GET['ID_post'];


				$this->data['skill'] = $this->Mskillmanagement->get_skills_for_position($this->data['ID_post']);
				//$this->data['post'] = $this->Mskillmanagement->get_posts();
			}

			//echo $_GET['ID_post'] ; die();
			if (($this->Mskillmanagement->get_skills_for_position($this->data['ID_post'])) == False) {
				return redirect(base_url() . 'Technical_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
			} else {
				$this->load->view('Employee/SkillmanagementMod/Add_skill_management.php', $this->data);
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill_management()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data = array(
					'ID_post' => $_POST['ID_post'],
					'ID_skill' => $_POST['ID_skill'],
					'Weight_skill' => $_POST['Weight_skill'],

				);
				//echo print_r($this->data); die();
				if ($_POST['ID_management']) {
					//echo 'heey'; die();
					$ID_management = $_POST['ID_management'];

					$this->Mskillmanagement->edit_skill_management($this->data, $ID_management);
					$this->data['skill'] = $this->Mskillmanagement->get_skills();
				} else {
					$this->Mskillmanagement->add_skill_management($this->data);
				}
			}
			//echo 'haa !! '; die();
			return redirect(base_url() . 'Technical_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_skills_management()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		$this->data['ID_post'] = $_GET['ID_post'];
			if (($this->Mskillmanagement->get_skills_for_position($this->data['ID_post'])) == False) {
				$this->data['noadd'] = 1;
			}

			$this->data['position'] = $this->Mskillmanagement->get_post_by_ID($this->data['ID_post']);
			$this->data['Name_post'] = $this->data['position'][0]['Name_post'];
			//$this->data['Description_post'] = $this->data['position'][0]['Description_post'];



			//echo $this->data['ID_post'] ; die();
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskillmanagement->get_skills_by_post_management_paging($page, $this->data['ID_post']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['skills_management'] = $this->Mskillmanagement->get_skills_by_post_management_paging($page, $this->data['ID_post']);
			}
			$this->data['nb'] = $this->Mskillmanagement->get_skills_management_by_post_nb_page($this->data['ID_post']);

			//echo print_r($this->data['skills_management']);die();
			/******************End Paging******************************/



			//	$this->data['skills_management'] = $this->Mskillmanagement->get_skills_management();
			$this->load->view('Employee/SkillmanagementMod/List_skills_management.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_skill_management()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_management'] = $_GET['ID_management'];
				//echo $this->data['ID_management'];
				//die();

				$this->data['skill'] = $this->Mskillmanagement->get_skills();

				//$this->data['post'] = $this->Mskillmanagement->get_posts();
				$this->data['skill_management'] = $this->Mskillmanagement->get_skill_management_by_ID($this->data['ID_management']);
				//$this->data['Name_post'] = $this->data['skill_management'][0]['Name_post'];
				$this->data['Name_skill'] = $this->data['skill_management'][0]['Name_skill'];
				$this->data['ID_skill'] = $this->data['skill_management'][0]['ID_skill'];
				$this->data['ID_post'] = $this->data['skill_management'][0]['ID_post'];
				$this->data['Weight_skill'] = $this->data['skill_management'][0]['Weight_skill'];
				$this->data['skill'] = $this->Mskillmanagement->get_skills_for_position_edit($this->data['ID_post'], $this->data['ID_skill']);

				//$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				//$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
				//echo print_r($this->data['skill']); die();
			}
			$this->load->view('Employee/SkillmanagementMod/Add_skill_management.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_skill_management()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {

				$this->data['ID_management'] = $_GET['ID_management'];
				$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
				$this->data['skill_management'] = $this->Mskillmanagement->delete_skill_management($this->data['ID_management']);
			}
			//echo $this->data['ID_post'] ; die();
			return redirect(base_url() . 'Technical_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_skill_management()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		if ($_GET) {

				$this->data['ID_management'] = $_GET['ID_management'];
				$this->data['skill_management'] = $this->Mskillmanagement->get_skill_management_by_ID($this->data['ID_management']);
				$this->data['Name_post'] = $this->data['skill_management'][0]['Name_post'];
				$this->data['Name_skill'] = $this->data['skill_management'][0]['Name_skill'];
				$this->data['Weight_skill'] = $this->data['skill_management'][0]['Weight_skill'];

				$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
			}
			$this->load->view('Employee/SkillmanagementMod/View_skill_management.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************** END SKILLS Management ******************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** Department *********************************/
	/***************************************************************************/
	/***************************************************************************/
	public function Form_add_department()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			$this->data['parent'] = $this->Mdepartment->get_departments();
			$this->data['director'] = $this->Mdepartment->get_employees();
			$this->data['director_qse'] = $this->Mdepartment->get_employees();

			$this->data['company'] = $this->Mdepartment->get_companies();

			$this->load->view('Employee/DepartmentMod/Add_department.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Submit_add_department()
	{
		//echo $_POST['Parent_department'] ; die();

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				//echo ($_POST['old_logo']);
				//die();
				if ($_FILES['Logo_department']['name'] == "") {
					$insertphoto = 'default_department.jpg';
				} else {


					$fileimg = $_FILES['Logo_department']['name'];
					$extimg = substr(strrchr($fileimg, '.'), 1);
					$fileName = time();
					$fileTmpName = $_FILES['Logo_department']['tmp_name'];
					$fileDestination = './uploads/Department/' . $fileName . '.' . $extimg;
					move_uploaded_file($fileTmpName, $fileDestination);
					$insertphoto = $fileName . '.' . $extimg;
				}
				$this->data = array(
					'Name_department' => $_POST['Name_department'],
					'Phone_department' => $_POST['Phone_department'],
					'Logo_department' => $insertphoto,
					'Alias_department' => $_POST['Alias_department'],
					'Email_department' => $_POST['Email_department'],
					'Parent_department' => $_POST['Parent_department'],
					'Director_department' => $_POST['Director_department'],
					'Quality_Director_department' => $_POST['Quality_Director_department'],

					'ID_company' => $this->session->userdata('ID_company'),

				);

				//$this->Mdepartment->add_department($this->data);
				//echo print_r($this->data['Logo_department']);
				//die();

				if ($_POST['ID_department']) {
					$insertphoto2 = $_POST['old_logo'];
					if ($_FILES['Logo_department']['name'] == "") {
						$this->data['Logo_department'] = $insertphoto2;
					}
					$ID_department = $_POST['ID_department'];
					$this->Mdepartment->edit_department($this->data, $ID_department);
				} else {

					//echo print_r($this->data);
					//die();
					/*************************Add Department****************************/
					$ID_department = $this->Mdepartment->add_department($this->data);
					/*********************End Add Department****************************/

					/*********************Insert department Post***********************/

					$this->datadirector = array('ID_department' => $ID_department, 'ID_post' => 1);
					$this->data['DirectorID'] = $this->Mdepartment->add_department_post($this->datadirector);
					$this->dataqse = array('ID_department' => $ID_department, 'ID_post' => 2);
					$this->data['QseID'] = $this->Mdepartment->add_department_post($this->dataqse);
					/*****************End Insert department Post***********************/

					/*************************Update employee****************************/
					//echo 'id department post : ' . $this->data['DirectorID'];
					//"<pre>";
					//echo 'id director : ' . $_POST['Director_department'];
					//die();
					$this->Mdepartment->edit_employee_post($this->data['DirectorID'], $_POST['Director_department']);

					$this->Mdepartment->edit_employee_post($this->data['QseID'], $_POST['Quality_Director_department']);

					/*********************End Update employee****************************/
				}
			}
			return redirect(base_url() . 'Technical_Account/List_departments');
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_departments()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdepartment->get_departments_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {

				$this->data['departments'] = $this->Mdepartment->get_departments_paging($page);
				//echo "<pre>"; echo print_r($this->data['departments']);echo "<pre>"; die();
			}

			$this->data['nb'] = $this->Mdepartment->get_departments_nb_page();

			/******************End Paging******************************/



			//	$this->data['departments'] = $this->Mdepartment->get_departments();
			$this->load->view('Employee/DepartmentMod/List_departments.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_department()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {

				//echo 'hi'; die();
				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['department'] = $this->Mdepartment->get_department_by_ID($this->data['ID_department']);
				//echo print_r($this->data['department']);die();
				$this->data['Name_department'] = $this->data['department'][0]['Name_department'];
				$this->data['Phone_department'] = $this->data['department'][0]['Phone_department'];
				$this->data['Logo_department'] = $this->data['department'][0]['Logo_department'];
				$this->data['Alias_department'] = $this->data['department'][0]['Alias_department'];
				$this->data['Email_department'] = $this->data['department'][0]['Email_department'];
				$this->data['Parent_department'] = $this->data['department'][0]['Parent_department'];
			}
			//$this->data['ID_parent'] = $this->data['department'][0]['Parent_department'];

			//echo ($this->data['Logo_department']) ; die();
			//$this->data['ID_department'] = $this->data['department'][0]['Parent_department'];
			$this->data['Quality_Director_department'] = $this->data['department'][0]['Quality_Director_department'];

			$this->data['ID_Director'] = $this->data['department'][0]['ID_employee'];

			$this->data['Director_department'] = $this->data['department'][0]['Name_employee'] . ' ' . $this->data['department'][0]['Lastname_employee'];
			$this->data['Quality_Director_department'] = $this->data['department'][0]['ID_employee'];
			$this->data['ID_company'] = $this->data['department'][0]['ID_company'];
			$this->data['Name_company'] = $this->data['department'][0]['Name_company'];
			/**********parent */
			$this->data['departmentparent'] = $this->Mdepartment->get_department_by_ID($this->data['Parent_department']);
			$this->data['Name_department'] = $this->data['department'][0]['Name_department'];

			$this->data['parent'] = $this->Mdepartment->get_departments();
			$this->data['director'] = $this->Mdepartment->get_employees();
			//echo print_r($this->data['director'][0]['ID_employee']); 
			//echo $this->data['Director_department'] ; die();
			$this->data['director_qse'] = $this->Mdepartment->get_employees();
			//echo print_r($this->data['Quality_Director_department']);
			//echo print_r($this->data['director_qse']); die();

			$this->data['company'] = $this->Mdepartment->get_companies();
			//echo ($this->data['ID_company']);
			//echo print_r($this->data['company']); die();
			$this->load->view('Employee/DepartmentMod/Add_department.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function View_Delete_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_department'] = $_GET['ID_department'];


				$this->load->view('Employee/DepartmentMod/Delete_department.php', $this->data);
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_department()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['department'] = $this->Mdepartment->delete_department($this->data['ID_department']);
			}
			return redirect(base_url() . 'Technical_Account/view_department');
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_department'] = $_GET['ID_department'];

				if (($this->Mdepartmentpost->get_posts_for_department($this->data['ID_department'])) == False) {

					$this->data['noadd'] = 1;
				}
				/**************************Employees***************************************/

				$this->data['nb'] = 1;
				/*********************Paging*******************************/
				$page = 1;
				if (!isset($_GET['page'])) {
					$p = 1;
				} else {
					$p = $_GET['page'];
				}
				$page = ($p - 1) * 9;
				if ($this->Mdepartment->get_employee_paging_by_department($page, $this->data['ID_department']) == False) {
					$this->data['empty_emp'] = 1;
				} else {
					$this->data['nb'] = $this->Mdepartment->get_employee_nb_page_by_department($this->data['ID_department']);
				}
				$this->data['employees_department'] = $this->Mdepartment->get_employee_paging_by_department($page, $this->data['ID_department']);
				/*echo "<pre>";
			echo print_r($this->data['employees_department']);
			echo "<pre>";
			die();*/

				/**********************End Employees***************************************/

				/**************************Positions***************************************/
				$this->data['nb'] = 1;
				/*********************Paging*******************************/
				$page = 1;
				if (!isset($_GET['page'])) {
					$p = 1;
				} else {
					$p = $_GET['page'];
				}
				$page = ($p - 1) * 9;
				if ($this->Mdepartmentpost->get_departments_post_paging($page, $this->data['ID_department']) == False) {
					$this->data['empty'] = 1;
				} else {
					$this->data['nb'] = $this->Mdepartmentpost->get_departments_post_nb_page($this->data['ID_department']);
				}
				$this->data['posts_management'] = $this->Mdepartmentpost->get_departments_post_paging($page, $this->data['ID_department']);
				/**********************End Positions***************************************/


				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['department'] = $this->Mdepartment->get_department_by_ID($this->data['ID_department']);
				//echo print_r($this->data['department']);die();
				$this->data['Name_department'] = $this->data['department'][0]['Name_department'];
				$this->data['Phone_department'] = $this->data['department'][0]['Phone_department'];
				$this->data['Logo_department'] = $this->data['department'][0]['Logo_department'];
				$this->data['Alias_department'] = $this->data['department'][0]['Alias_department'];
				$this->data['Email_department'] = $this->data['department'][0]['Email_department'];
				$this->data['Parent_department'] = $this->data['department'][0]['Parent_department'];
				$this->data['Director_department'] = $this->data['department'][0]['Director_department'];
				$this->data['Quality_Director_department'] = $this->data['department'][0]['Director_department'];
				$this->data['ID_company'] = $this->data['department'][0]['Name_company'];

				/********************** Name Lastname Employees ************************/

				if ($this->data['Director_department'] != 0) {
					$this->data['Director'] = $this->Mdepartment->get_employee_by_ID($this->data['Director_department']);
					$this->data['Director_department'] =  $this->data['Director'][0]['Name_employee'] . ' ' . $this->data['Director'][0]['Lastname_employee'];
				} else {
					$this->data['Director_department'] = '</br> ';
				}
				if ($this->data['Quality_Director_department'] != 0) {

					$this->data['Quality_Director'] = $this->Mdepartment->get_employee_by_ID($this->data['Quality_Director_department']);
					$this->data['Quality_Director_department'] =  $this->data['Quality_Director'][0]['Name_employee'] . ' ' . $this->data['Quality_Director'][0]['Lastname_employee'];
				} else {
					$this->data['Director_department'] = '</br> ';
				}
				//echo $this->data['Director_department'];
				//echo $this->data['Quality_Director_department'];
				//die();
				/**********parent */
				$this->data['departmentparent'] = $this->Mdepartment->get_department_by_ID($this->data['Parent_department']);
				$this->data['Parent_department'] = $this->data['department'][0]['Name_department'];
			}
			$this->load->view('Employee/DepartmentMod/View_department.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/************************** END Department *********************************/
	/***************************************************************************/
	/***************************************************************************/



	/***************************************************************************/
	/***************************************************************************/
	/********************** Positions for Department ***************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_department_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET['ID_department']) {
				$this->data['ID_department'] = $_GET['ID_department'];

				$this->data['post'] = $this->Mdepartmentpost->get_posts_for_department($this->data['ID_department']);
				//$this->data['employee'] = $this->Mdepartmentpost->get_employees();
				//echo print_r($this->data['post']); die();

				if (($this->Mdepartmentpost->get_posts_for_department($this->data['ID_department'])) == False) {
					return redirect(base_url() . 'Technical_Account/view_department?ID_department=' . $this->data['ID_department']);
				} else {
					$this->load->view('Employee/DepartmentMod/Add_department_post.php', $this->data);
				}
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_department_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data = array(
					'ID_department' => $_POST['ID_department'],
					'ID_post' => $_POST['ID_post'],

				);
				//echo print_r($this->data); die();
				if ($_POST['ID_department_post']) {
					//echo 'heey'; die();
					$ID_department_post = $_POST['ID_department_post'];

					//$this->data['post'] = $this->Mdepartmentpost->get_posts();

					$this->Mdepartmentpost->edit_department_post($this->data, $ID_department_post);
				} else {
					$this->Mdepartmentpost->add_department_post($this->data);
				}
			}
			return redirect(base_url() . 'Technical_Account/view_department?ID_department=' . $_POST['ID_department']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function Form_edit_department_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//$this->data['ID_department']= $_GET['ID_department'];
				$this->data['ID_department_post'] = $_GET['ID_department_post'];

				//echo 'hi'; die();
				$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);

				//echo (print_r($this->data['ID_department_post'])); die();
				//echo (print_r($this->data['department_post'])); die();
				$this->data['ID_department'] = $this->data['department_post'][0]['ID_department'];
				$this->data['ID_post'] = $this->data['department_post'][0]['ID_post'];
				$this->data['Name_post'] = $this->data['department_post'][0]['Name_post'];
				$this->data['Name_department'] = $this->data['department_post'][0]['Name_department'];
			}
			$this->data['post'] = $this->Mdepartmentpost->get_posts_for_department_edit($this->data['ID_department'], $this->data['ID_post']);
			/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/
			$this->load->view('Employee/DepartmentMod/Add_department_post.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_department_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_department_post'] = $_GET['ID_department_post'];
				$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);
				$this->data['ID_department'] = $this->data['department_post'][0]['ID_department'];

				$this->data['department_post'] = $this->Mdepartmentpost->delete_department_post($this->data['ID_department_post']);
			}
			return redirect(base_url() . 'Technical_Account/List_departments_post?ID_department=' . $this->data['ID_department']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_department_post()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_department_post'] = $_GET['ID_department_post'];
				$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);

				//echo (print_r($this->data['ID_department_post'])); die();
				//echo (print_r($this->data['department_post'])); die();
				$this->data['Name_post'] = $this->data['department_post'][0]['Name_post'];
				$this->data['Name_department'] = $this->data['department_post'][0]['Name_department'];
			}
			$this->load->view('Employee/DepartmentMod/View_department_post.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/****************** End Positions for Department ***************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/********************** Employees for Department ***************************/
	/***************************************************************************/
	/***************************************************************************/
	public function Form_add_department_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET['ID_department_post']) {
				$this->data['ID_department_post'] = $_GET['ID_department_post'];
				$this->commonData();
				//$this->data['post'] = $this->Mdepartmentemployee->get_posts($this->data['ID_department']);

				//$this->data['positiondepartment'] = $this->Mdepartmentemployee->get_positions_by_department($this->data['ID_department']);

				$this->data['accessgroup'] = $this->Mdepartmentemployee->get_accessgroup();
			}
			$this->load->view('Employee/DepartmentMod/Add_department_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Submit_add_department_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data = array(
					'Name_employee' => $_POST['Name_employee'],
					'Lastname_employee' => $_POST['Lastname_employee'],
					'Phone_employee' => $_POST['Phone_employee'],
					'Email_employee' => $_POST['Email_employee'],
					'Login_employee' => $_POST['Login_employee'],
					'Password_employee' => Md5($_POST['Password_employee']),
					'ID_department_post' => $_POST['ID_department_post'],
					'ID_access_group' => $_POST['ID_access_group'],


				);
				//echo print_r($this->data); die();
				if ($_POST['ID_employee']) {
					//echo 'heey'; die();
					$ID_employee = $_POST['ID_employee'];

					//$this->data['post'] = $this->Mdepartmentemployee->get_posts();

					$this->Mdepartmentemployee->edit_department_employee($this->data, $ID_employee);
				} else {
					$this->Mdepartmentemployee->add_department_employee($this->data);
				}
			}
			return redirect(base_url() . 'Technical_Account/List_departments_employee?ID_department_post=' . $_POST['ID_department_post']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_departments_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_department_post'] = $_GET['ID_department_post'];

			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdepartmentemployee->get_departments_employee_paging($page, $this->data['ID_department_post']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdepartmentemployee->get_departments_employee_nb_page($this->data['ID_department_post']);
			}
			$this->data['posts_management'] = $this->Mdepartmentemployee->get_departments_employee_paging($page, $this->data['ID_department_post']);
			//echo print_r($this->data['posts_management']);die();
			/******************End Paging******************************/



			$this->load->view('Employee/DepartmentMod/List_departments_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function Form_edit_department_employee()
	{
		if ($_GET) {
			$this->commonData();
			/*************************Access Verif************************/
			$this->function_type = "edit";
			$current_function = "List_res_humain";
			$this->commonAccess($current_function);
			$this->load->view('Employee/Header');
			$this->load->view('Employee/Menu', $this->data);





			if ($this->test_verif_edit == 1) {
				/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

				//$this->data['ID_department']= $_GET['ID_department'];
				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Mdepartmentemployee->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['positiondepartment'] = $this->Mdepartmentemployee->get_positions_by_department($this->data['ID_department']);
				$this->data['department_employee'] = $this->Mdepartmentemployee->get_employees_by_departmentemployee($this->data['ID_employee']);
				$this->data['accessgroup'] = $this->Mdepartmentemployee->get_accessgroup_by_department($this->data['ID_department']);

				//echo print_r($this->data['department_employee']);
				//die();
				$this->data['Name_employee'] = $this->data['department_employee'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['department_employee'][0]['Lastname_employee'];
				$this->data['Phone_employee'] = $this->data['department_employee'][0]['Phone_employee'];
				$this->data['Email_employee'] = $this->data['department_employee'][0]['Email_employee'];
				$this->data['Login_employee'] = $this->data['department_employee'][0]['Login_employee'];
				$this->data['Password_employee'] = $this->data['department_employee'][0]['Password_employee'];
				$this->data['ID_department_post'] = $this->data['department_employee'][0]['ID_department_post'];
				$this->data['Name_post'] = $this->data['department_employee'][0]['Name_post'];
				$this->data['ID_access_group'] = $this->data['department_employee'][0]['ID_access_group'];
				$this->data['Name_access_group'] = $this->data['department_employee'][0]['Name_access_group'];
			}
			//$this->data['post'] = $this->Mdepartmentemployee->get_posts($this->data['ID_department']);
			/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/

			$this->load->view('Employee/DepartmentMod/Add_department_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}





	public function Delete_department_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			$this->data['position'] = $this->Mpost->get_posts();
			/*************************Access Verif************************/



			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Mdepartmentemployee->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['department_employee'] = $this->Mdepartmentemployee->delete_department_employee($this->data['ID_employee']);
			}
			return redirect(base_url() . 'Technical_Account/List_departments_employee?ID_department_post=' . $_POST['ID_department_post']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function view_department_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_employee'] = $_GET['ID_employee'];

			if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
				$this->data['noadd'] = 1;
			}

			//echo ($this->data['ID_employee']); die();
			$this->data['employee'] = $this->Mskillemployee->get_employees_by_ID($this->data['ID_employee']);
			//echo print_r($this->data['employee']);die();
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mskillemployee->get_skills_employee_by_ID_nb_page($this->data['ID_employee']);
			}
			$this->data['skills_management'] = $this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']);
			/******************End Paging******************************/
			/**********************************************************/

			$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
			$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
			$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
			$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
			$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
			$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
			$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
			$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
			$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			/**********************************************************/


			$this->load->view('Employee/DepartmentMod/View_department_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/****************** End Employees for Department ***************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/******************************** Employees  *******************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			//if ($_GET['ID_department']) {
			//$this->data['ID_department'] = $_GET['ID_department'];

			$this->data['post'] = $this->Memployee->get_posts();

			$this->data['positiondepartment'] = $this->Memployee->get_positions_by_department($this->data['ID_department']);

			$this->data['accessgroup'] = $this->Memployee->get_accessgroup_by_department($this->data['ID_department']);

			//$this->data['employee'] = $this->Memployee->get_employees();
			//echo "<pre>";
			//echo print_r($this->data['access']);
			//echo "<pre>";
			//die();
			//}
			$this->load->view('Employee/EmployeeskillMod/Add_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function Submit_add_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data = array(
					'Name_employee' => $_POST['Name_employee'],
					'Lastname_employee' => $_POST['Lastname_employee'],
					'Phone_employee' => $_POST['Phone_employee'],
					'Email_employee' => $_POST['Email_employee'],
					'Login_employee' => $_POST['Login_employee'],
					'Password_employee' => Md5($_POST['Password_employee']),
					'ID_department_post' => $_POST['ID_department_post'],
					'ID_access_group' => $_POST['ID_access_group'],


				);
				//echo print_r($this->data); die();
				if ($_POST['ID_employee']) {
					//echo 'heey'; die();
					$ID_employee = $_POST['ID_employee'];

					//$this->data['post'] = $this->Memployee->get_posts();

					$this->Memployee->edit_employee($this->data, $ID_employee);
				} else {
					$this->Memployee->add_employee($this->data);
				}
			}
			return redirect(base_url() . 'Technical_Account/List_employee?ID_department=' . $_POST['ID_department']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function List_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/		//$this->data['ID_department'] = $_GET['ID_department'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Memployee->get_employee_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Memployee->get_employee_nb_page();
			}
			$this->data['posts_management'] = $this->Memployee->get_employee_paging($page);
			/*echo "<pre>";
		echo print_r($this->data['posts_management']);
		echo "<pre>";
		die();*/
			/******************End Paging******************************/



			$this->load->view('Employee/EmployeeskillMod/List_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//$this->data['ID_department']= $_GET['ID_department'];
				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Memployee->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['positiondepartment'] = $this->Memployee->get_positions_by_department($this->data['ID_department']);
				$this->data['employee'] = $this->Memployee->get_employees_by_ID($this->data['ID_employee']);
				$this->data['accessgroup'] = $this->Memployee->get_accessgroup_by_department($this->data['ID_department']);

				//echo print_r($this->data['employee']);
				//die();
				$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
				$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
				$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
				$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
				$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
				$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
				$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
				$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
				$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			}
			//$this->data['post'] = $this->Memployee->get_posts($this->data['ID_department']);
			/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/
			$this->load->view('Employee/EmployeeskillMod/Add_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Memployee->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['employee'] = $this->Memployee->delete_employee($this->data['ID_employee']);
			}
			return redirect(base_url() . 'Technical_Account/List_employee?ID_department=' . $this->data['ID_department']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function view_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {
				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['employee'] = $this->Memployee->get_employees_by_ID($this->data['ID_employee']);
				//echo print_r($this->data['employee']);
				//die();
				$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
				$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
				$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
				$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
				$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
				$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
				$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
				$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
				$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
				$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			}
			$this->load->view('Employee/EmployeeskillMod/View_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/***************************************************************************/
	/***************************************************************************/
	/********************************* End Employees ***************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/************************** SKILLS Employee ********************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_skill_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET['ID_employee']) {
				$this->data['ID_employee'] = $_GET['ID_employee'];

				$this->data['skill'] = $this->Mskillemployee->get_skills_for_employee($this->data['ID_employee']);
				$this->data['employee'] = $this->Mskillemployee->get_employees();

				if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
					return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $this->data['ID_employee']);
				} else {
					$this->load->view('Employee/EmployeeskillMod/Add_skill_employee.php', $this->data);
				}
			}
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function Submit_add_skill_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();
			if ($_POST) {
				$this->data = array(
					'ID_employee' => $_POST['ID_employee'],
					'ID_skill' => $_POST['ID_skill'],
					'Grade_skill_employee' => $_POST['Grade_skill_employee'],

				);
				//echo print_r($this->data); die();
				if ($_POST['ID_skill_employee']) {
					//echo 'heey'; die();
					$ID_skill_employee = $_POST['ID_skill_employee'];
					$this->Mskillemployee->edit_skill_employee($this->data, $ID_skill_employee);
					$this->data['skill'] = $this->Mskillemployee->get_skills();
				} else {
					$this->Mskillemployee->add_skill_employee($this->data);
				}
			}
			return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $_POST['ID_employee']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function List_skills_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_employee'] = $_GET['ID_employee'];

			if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
				$this->data['noadd'] = 1;
			}

			//echo ($this->data['ID_employee']); die();
			$this->data['employee'] = $this->Mskillemployee->get_employees_by_ID($this->data['ID_employee']);
			//echo print_r($this->data['employee']);die();
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mskillemployee->get_skills_employee_by_ID_nb_page($this->data['ID_employee']);
			}
			$this->data['skills_management'] = $this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']);
			/*echo "<pre>";
		echo print_r($this->data['skills_management']);
		echo "<pre>";
		die();*/
			/******************End Paging******************************/
			/**********************************************************/

			$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
			$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
			$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
			$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
			$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
			$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
			$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
			$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
			$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			/**********************************************************/



			$this->load->view('Employee/EmployeeskillMod/List_skills_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}



	public function View_employee_details()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_employee'] = $_GET['ID_employee'];

			if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
				$this->data['noadd'] = 1;
			}

			//echo ($this->data['ID_employee']); die();
			$this->data['employee'] = $this->Mskillemployee->get_employees_by_ID($this->data['ID_employee']);
			//echo print_r($this->data['employee']);die();
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mskillemployee->get_skills_employee_by_ID_nb_page($this->data['ID_employee']);
			}
			$this->data['skills_management'] = $this->Mskillemployee->get_skills_employee_by_ID($page, $this->data['ID_employee']);
			/*echo "<pre>";
		echo print_r($this->data['skills_management']);
		echo "<pre>";
		die();*/
			/******************End Paging******************************/
			/**********************************************************/

			$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
			$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
			$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
			$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
			$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
			$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
			$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
			$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
			$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];

			$this->data['Formation_employee'] = $this->data['employee'][0]['Formation_employee'];
			$this->data['Experience_employee'] = $this->data['employee'][0]['Experience_employee'];
			$this->data['Formation_post'] = $this->data['employee'][0]['Formation_post'];
			$this->data['Experience_post'] = $this->data['employee'][0]['Experience_post'];

			/**********************************************************/



			$this->load->view('Employee/EmployeeskillMod/View_employee_details.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	/*************************View Employee without skill*************************/
	public function List_skills_employee_view()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_employee'] = $_GET['ID_employee'];

			if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
				$this->data['noadd'] = 1;
			}

			//echo ($this->data['ID_employee']); die();
			$this->data['employee'] = $this->Mskillemployee->get_employees_by_ID($this->data['ID_employee']);
			//echo print_r($this->data['employee']);die();
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mskillemployee->get_skills_employee_by_ID_nb_page($this->data['ID_employee']);
			}
			$this->data['skills_management'] = $this->Mskillemployee->get_skills_employee_by_ID_paging($page, $this->data['ID_employee']);
			/******************End Paging******************************/
			/**********************************************************/

			$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];
			$this->data['Lastname_employee'] = $this->data['employee'][0]['Lastname_employee'];
			$this->data['Phone_employee'] = $this->data['employee'][0]['Phone_employee'];
			$this->data['Email_employee'] = $this->data['employee'][0]['Email_employee'];
			$this->data['Login_employee'] = $this->data['employee'][0]['Login_employee'];
			$this->data['Password_employee'] = $this->data['employee'][0]['Password_employee'];
			$this->data['ID_department_post'] = $this->data['employee'][0]['ID_department_post'];
			$this->data['Name_post'] = $this->data['employee'][0]['Name_post'];
			$this->data['ID_access_group'] = $this->data['employee'][0]['ID_access_group'];
			$this->data['Name_access_group'] = $this->data['employee'][0]['Name_access_group'];
			/**********************************************************/


			$this->load->view('Employee/DepartmentMod/View_department_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Form_edit_skill_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			//$this->data['ID_employee']=$_GET['ID_employee'];

			//if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];

			$this->data['employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			//echo print_r($this->data['employee']);
			//die();
			$this->data['ID_employee'] = $this->data['employee'][0]['ID_employee'];
			$this->data['ID_skill'] = $this->data['employee'][0]['ID_skill'];
			$this->data['Name_skill'] = $this->data['employee'][0]['Name_skill'];
			$this->data['Grade_skill_employee'] = $this->data['employee'][0]['Grade_skill_employee'];



			$this->data['skill'] = $this->Mskillemployee->get_skills_for_employee_edit($this->data['ID_employee'], $this->data['ID_skill']);

			//echo print_r($this->data['skill']); 
			//echo $this->data['ID_skill'];
			//die();
			//$this->data['employee'] = $this->Mskillemployee->get_employees();
			//$this->data['skill_employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			///$this->data['Name_employee'] = $this->data['skill_employee'][0]['Name_employee'];
			//$this->data['Name_skill'] = $this->data['skill_employee'][0]['Name_skill'];
			//	}
			$this->load->view('Employee/EmployeeskillMod/Add_skill_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function Delete_skill_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/		$this->data['position'] = $this->Mpost->get_posts();

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
				$this->data['employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);

				$this->data['ID_employee'] = $this->data['employee'][0]['ID_employee'];
				$this->data['skill_employee'] = $this->Mskillemployee->delete_skill_employee($this->data['ID_skill_employee']);
			}
			return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $this->data['ID_employee']);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	public function view_skill_employee()
	{

		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_res_humain";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];

			$this->data['employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			//echo print_r($this->data['employee']);
			//die();
			$this->data['ID_employee'] = $this->data['employee'][0]['ID_employee'];
			$this->data['ID_skill'] = $this->data['employee'][0]['ID_skill'];
			$this->data['Name_employee'] = $this->data['employee'][0]['Name_employee'];

			$this->data['Name_skill'] = $this->data['employee'][0]['Name_skill'];
			$this->data['Grade_skill_employee'] = $this->data['employee'][0]['Grade_skill_employee'];

			$this->load->view('Employee/EmployeeskillMod/View_skill_employee.php', $this->data);
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}


	/***************************************************************************/
	/***************************************************************************/
	/********************** END SKILLS Employee ********************************/
	/***************************************************************************/
	/***************************************************************************/
}
