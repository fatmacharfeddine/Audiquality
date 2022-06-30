
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Employee_Account extends CI_Controller
{
	var $ID_company = 0;
	public $dept = 0;
	public function __construct()
	{
		parent::__construct();

		$this->load->model('Mcommon');

		$this->load->model('Memployeeaccount');

		$this->load->model('Mcompany');

		$this->load->model('Mtechnical');

		$this->load->model('Mskill');

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

		$this->load->model('Maction');

		$this->load->model('Mrisk_identification');

		$this->load->model('Mrisk_evaluation');

		$this->load->model('Mrisk_analysis');

		$this->load->model('Mrisk_assessment');

		$this->load->model('Mrisk_action');

		$this->load->model('Mprocess');

		$this->load->model('Mfield');


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

		/************************ Access Menu *******************************/
		$this->data['ID_connected_employee'] = $this->session->userdata('ID_employee');
		$this->data['access_account'] = $this->Memployeeaccount->get_access_by_employee($this->data['ID_connected_employee']);
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


		/*echo "<pre>";
		echo print_r($this->data['employee']);
		echo "<pre>";
		die();*/
		$this->load->view('Employee/Index.php', $this->data);
	}
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
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			/************************ Access Menu *******************************/
			$this->data['ID_connected_employee'] = $this->session->userdata('ID_employee');
			$this->data['access_account'] = $this->Memployeeaccount->get_access_by_employee($this->data['ID_connected_employee']);
			/******************** End Access Menu *******************************/
			$this->load->view('Employee/SkillMod/Add_skill.php', $this->data);

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/



			if ($_POST) {
				$this->data = array(
					'Name_skill' => $_POST['Name_skill'],
					'Description_skill' => $_POST['Description_skill'],
				);
				if ($_POST['ID_skill']) {
					//echo 'heey'; die();
					$ID_skill = $_POST['ID_skill'];
					$this->Mskill->edit_skill($this->data, $ID_skill);
				} else {
					$this->Mskill->add_skill($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_Skills');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function List_skills()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		//echo $this->test_verif_view;
		//	die();
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
			} else {

				$this->data['skills'] = $this->Mskill->get_skills_paging($page);
			}
			$this->data['nb'] = $this->Mskill->get_skills_nb_page();

			/******************End Paging******************************/
			$this->commonData();
			//	$this->data['skills'] = $this->Mskill->get_skills();
			$this->load->view('Employee/SkillMod/List_Skills.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_skill()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
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
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function Delete_skill()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_skill'] = $_GET['ID_skill'];
				$this->data['skill'] = $this->Mskill->delete_skill($this->data['ID_skill']);
			}
			return redirect(base_url() . 'Employee_Account/List_Skills');

			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function view_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {

				$this->data['ID_skill'] = $_GET['ID_skill'];
				$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
				$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];
				$this->data['Description_skill'] = $this->data['skill'][0]['Description_skill'];
			}
			$this->load->view('Employee/SkillMod/View_skill.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
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
		$current_function = "List_posts";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_post()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_posts";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_POST) {
				$this->data = array(
					'Name_post' => $_POST['Name_post'],
					'Description_post' => $_POST['Description_post'],
				);
				if ($_POST['ID_post']) {
					//echo 'heey'; die();
					$ID_post = $_POST['ID_post'];

					$this->Mpost->edit_post($this->data, $ID_post);
				} else {
					$this->Mpost->add_post($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_posts');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function List_posts()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_posts";
		$this->commonAccess($current_function);
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


			$this->commonData();
			//	$this->data['posts'] = $this->Mpost->get_posts();
			$this->load->view('Employee/PositionMod/List_posts.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_posts";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
				$this->data['Name_post'] = $this->data['post'][0]['Name_post'];
				$this->data['Description_post'] = $this->data['post'][0]['Description_post'];
			}
			$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_posts";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->delete_post($this->data['ID_post']);
			}
			return redirect(base_url() . 'Employee_Account/List_posts');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function view_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_posts";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
				$this->data['Name_post'] = $this->data['post'][0]['Name_post'];
				$this->data['Description_post'] = $this->data['post'][0]['Description_post'];
			}
			$this->load->view('Employee/PositionMod/View_post.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
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
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET['ID_post']) {
				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['skill'] = $this->Mskillmanagement->get_skills();
				//$this->data['post'] = $this->Mskillmanagement->get_posts();
			}

			//echo $_GET['ID_post'] ; die();

			$this->load->view('Employee/SkillmanagementMod/Add_skill_management.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill_management()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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
			return redirect(base_url() . 'Employee_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function List_skills_management()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_post'] = $_GET['ID_post'];
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


			$this->commonData();
			//	$this->data['skills_management'] = $this->Mskillmanagement->get_skills_management();
			$this->load->view('Employee/SkillmanagementMod/List_skills_management.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_skill_management()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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

				//$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				//$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
				//echo print_r($this->data['skill']); die();
			}
			$this->load->view('Employee/SkillmanagementMod/Add_skill_management.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_skill_management()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
			if ($_GET) {

				$this->data['ID_management'] = $_GET['ID_management'];
				$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
				$this->data['skill_management'] = $this->Mskillmanagement->delete_skill_management($this->data['ID_management']);
			}
			//echo $this->data['ID_post'] ; die();
			return redirect(base_url() . 'Employee_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function view_skill_management()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/
			if ($_GET) {

				$this->data['ID_management'] = $_GET['ID_management'];
				$this->data['skill_management'] = $this->Mskillmanagement->get_skill_management_by_ID($this->data['ID_management']);
				$this->data['Name_post'] = $this->data['skill_management'][0]['Name_post'];
				$this->data['Name_skill'] = $this->data['skill_management'][0]['Name_skill'];
				$this->data['Weight_skill'] = $this->data['skill_management'][0]['Weight_skill'];

				$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
				$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
			}
			$this->load->view('Employee/SkillmanagementMod/View_skill_management.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************** END SKILLS Management ******************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/************************** SKILLS Employee ********************************/
	/***************************************************************************/
	/***************************************************************************/

	/*public function Form_add_skill_employee()
	{
		$this->commonData();
		$this->data['skill'] = $this->Mskillemployee->get_skills();
		$this->data['employee'] = $this->Mskillemployee->get_employees();

		$this->load->view('Employee/Add_skill_employee.php', $this->data);
	}
	public function Submit_add_skill_employee()
	{
		$this->commonData();
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

				$this->data['skill'] = $this->Mskillemployee->get_skills();

				$this->Mskillemployee->edit_skill_employee($this->data, $ID_skill_employee);
			} else {
				$this->Mskillemployee->add_skill_employee($this->data);
			}
		}
		return redirect(base_url() . 'Employee_Account/List_skills_employee');
	}

	public function List_skills_employee()
	{
		$this->data['nb'] = 1;
		$page = 1;
		if (!isset($_GET['page'])) {
			$p = 1;
		} else {
			$p = $_GET['page'];
		}
		$page = ($p - 1) * 9;
		if ($this->Mskillemployee->get_skills_employee_paging($page) == False) {
			$this->data['empty'] = 1;
		} else {
			$this->data['nb'] = $this->Mskillemployee->get_skills_employee_nb_page();
		}
		$this->data['skills_management'] = $this->Mskillemployee->get_skills_employee_paging($page);
		//echo print_r($this->data['skills_management']);die();


		$this->commonData();
		$this->load->view('Employee/List_skills_employee.php', $this->data);
	}
	public function Form_edit_skill_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['skill'] = $this->Mskillemployee->get_skills();
			$this->data['employee'] = $this->Mskillemployee->get_employees();
			$this->data['skill_employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			$this->data['Name_employee'] = $this->data['skill_employee'][0]['Name_employee'];
			$this->data['Name_skill'] = $this->data['skill_employee'][0]['Name_skill'];
		}
		$this->load->view('Employee/Add_skill_employee.php', $this->data);
	}
	public function Delete_skill_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['skill_employee'] = $this->Mskillemployee->delete_skill_employee($this->data['ID_skill_employee']);
		}
		return redirect(base_url() . 'Employee_Account/List_skills_employee');
	}

	public function view_skill_employee()
	{
		if ($_GET) {
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['skill_employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			$this->data['Name_employee'] = $this->data['skill_employee'][0]['Name_employee'];
			$this->data['Name_skill'] = $this->data['skill_employee'][0]['Name_skill'];
		}
		$this->load->view('Employee/View_skill_employee.php', $this->data);
	}*/

	/***************************************************************************/
	/***************************************************************************/
	/********************** END SKILLS Employee ********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** Department *********************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
			$this->data['parent'] = $this->Mdepartment->get_departments();
			$this->data['director'] = $this->Mdepartment->get_employees();
			$this->data['director_qse'] = $this->Mdepartment->get_employees();

			$this->data['company'] = $this->Mdepartment->get_companies();

			$this->load->view('Employee/DepartmentMod/Add_department.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//echo $_POST['Parent_department'] ; die();

			$this->commonData();
			if ($_POST) {
				//echo ($_POST['old_logo']);
				//die();
				if ($_FILES['Logo_department']['name'] == "") {
					$insertphoto = 'Default.jpg';
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

					'ID_company' => $_POST['ID_company'],

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
					$this->Mdepartment->add_department($this->data);
				}
			}
			return redirect(base_url() . 'Employee_Account/List_departments');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function List_departments()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
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
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['department'] = $this->Mdepartment->delete_department($this->data['ID_department']);
			}
			return redirect(base_url() . 'Employee_Account/List_departments');
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function view_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['department'] = $this->Mdepartment->get_department_by_ID($this->data['ID_department']);
				//echo print_r($this->data['department']);die();
				$this->data['Name_department'] = $this->data['department'][0]['Name_department'];
				$this->data['Phone_department'] = $this->data['department'][0]['Phone_department'];
				$this->data['Logo_department'] = $this->data['department'][0]['Logo_department'];
				$this->data['Alias_department'] = $this->data['department'][0]['Alias_department'];
				$this->data['Email_department'] = $this->data['department'][0]['Email_department'];
				$this->data['Parent_department'] = $this->data['department'][0]['Parent_department'];
				$this->data['Director_department'] = $this->data['department'][0]['Name_employee'] . ' ' . $this->data['department'][0]['Lastname_employee'];
				$this->data['Quality_Director_department'] = $this->data['department'][0]['Name_employee'] . ' ' . $this->data['department'][0]['Lastname_employee'];

				$this->data['ID_company'] = $this->data['department'][0]['Name_company'];
				/**********parent */
				$this->data['departmentparent'] = $this->Mdepartment->get_department_by_ID($this->data['Parent_department']);
				$this->data['Parent_department'] = $this->data['department'][0]['Name_department'];
			}
			$this->load->view('Employee/DepartmentMod/View_department.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
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

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET['ID_department']) {
				$this->data['ID_department'] = $_GET['ID_department'];
				$this->commonData();
				$this->data['post'] = $this->Mdepartmentpost->get_posts();
				//$this->data['employee'] = $this->Mdepartmentpost->get_employees();
				//echo print_r($this->data['post']); die();
			}
			$this->load->view('Employee/DepartmentMod/Add_department_post.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_department_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
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
			return redirect(base_url() . 'Employee_Account/List_departments_post?ID_department=' . $_POST['ID_department']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	/****************** Unused

	public function List_departments_post()
	{
		$this->data['ID_department'] = $_GET['ID_department'];
		$this->data['nb'] = 1;
		$page = 1;
		if (!isset($_GET['page'])) {
			$p = 1;
		} else {
			$p = $_GET['page'];
		}
		$page = ($p - 1) * 9;
		if ($this->Mdepartmentpost->get_departments_post_paging($page) == False) {
			$this->data['empty'] = 1;
		} else {
			$this->data['nb'] = $this->Mdepartmentpost->get_departments_post_nb_page();
		}
		$this->data['posts_management'] = $this->Mdepartmentpost->get_departments_post_paging($page);
		//echo print_r($this->data['posts_management']);die();


		$this->commonData();
		$this->load->view('Employee/DepartmentMod/List_departments_post.php', $this->data);
	}*/
	public function Form_edit_department_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();

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
			$this->data['post'] = $this->Mdepartmentpost->get_posts();
			/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/
			$this->load->view('Employee/DepartmentMod/Add_department_post.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_department_post()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_department_post'] = $_GET['ID_department_post'];
				$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);
				$this->data['ID_department'] = $this->data['department_post'][0]['ID_department'];

				$this->data['department_post'] = $this->Mdepartmentpost->delete_department_post($this->data['ID_department_post']);
			}
			return redirect(base_url() . 'Employee_Account/List_departments_post?ID_department=' . $this->data['ID_department']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	/****************** Unused
	public function view_department_post()
	{
		if ($_GET) {
			$this->data['ID_department_post'] = $_GET['ID_department_post'];
			$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);
			$this->data['Name_post'] = $this->data['department_post'][0]['Name_post'];
			$this->data['Name_department'] = $this->data['department_post'][0]['Name_department'];
		}
		$this->load->view('Employee/DepartmentMod/View_department_post.php', $this->data);
	} */

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
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET['ID_department']) {
				$this->data['ID_department'] = $_GET['ID_department'];
				$this->commonData();
				$this->data['post'] = $this->Mdepartmentemployee->get_posts($this->data['ID_department']);

				$this->data['positiondepartment'] = $this->Mdepartmentemployee->get_positions_by_department($this->data['ID_department']);

				$this->data['accessgroup'] = $this->Mdepartmentemployee->get_accessgroup_by_department($this->data['ID_department']);

				//$this->data['employee'] = $this->Mdepartmentemployee->get_employees();
				//echo "<pre>";
				//echo print_r($this->data['access']);
				//echo "<pre>";
				//die();
			}
			$this->load->view('Employee/DepartmentMod/Add_department_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_department_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
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
			return redirect(base_url() . 'Employee_Account/List_departments_employee?ID_department=' . $_POST['ID_department']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function List_departments_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_department'] = $_GET['ID_department'];
			$this->data['nb'] = 1;
			/*********************Paging*******************************/
			$page = 1;
			if (!isset($_GET['page'])) {
				$p = 1;
			} else {
				$p = $_GET['page'];
			}
			$page = ($p - 1) * 9;
			if ($this->Mdepartmentemployee->get_departments_employee_paging($page) == False) {
				$this->data['empty'] = 1;
			} else {
				$this->data['nb'] = $this->Mdepartmentemployee->get_departments_employee_nb_page();
			}
			$this->data['posts_management'] = $this->Mdepartmentemployee->get_departments_employee_paging($page);
			//echo print_r($this->data['posts_management']);die();
			/******************End Paging******************************/


			$this->commonData();
			$this->load->view('Employee/DepartmentMod/List_departments_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_department_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
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
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_department_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Mdepartmentemployee->get_department_by_employee($this->data['ID_employee']);
				$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

				$this->data['department_employee'] = $this->Mdepartmentemployee->delete_department_employee($this->data['ID_employee']);
			}
			return redirect(base_url() . 'Employee_Account/List_departments_employee?ID_department=' . $this->data['ID_department']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function view_department_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			if ($_GET) {
				$this->data['ID_employee'] = $_GET['ID_employee'];
				$this->data['department_employee'] = $this->Mdepartmentemployee->get_employees_by_departmentemployee($this->data['ID_employee']);
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
			$this->load->view('Employee/DepartmentMod/View_department_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
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
	/*********** Unused 
	public function Form_add_employee()
	{
						
		//if ($_GET['ID_department']) {
		//$this->data['ID_department'] = $_GET['ID_department'];
		$this->commonData();
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
	}
	public function Submit_add_employee()
	{
		$this->commonData();
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
		return redirect(base_url() . 'Employee_Account/List_employee?ID_department=' . $_POST['ID_department']);
	}

	public function List_employee()
	{
		//$this->data['ID_department'] = $_GET['ID_department'];
		$this->data['nb'] = 1;
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
		//echo print_r($this->data['posts_management']);die();


		$this->commonData();
		$this->load->view('Employee/EmployeeskillMod/List_employee.php', $this->data);
	}
	public function Form_edit_employee()
	{
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
		die();*
		$this->load->view('Employee/EmployeeskillMod/Add_employee.php', $this->data);
	}
	public function Delete_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->data['department_employee'] = $this->Memployee->get_department_by_employee($this->data['ID_employee']);
			$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

			$this->data['employee'] = $this->Memployee->delete_employee($this->data['ID_employee']);
		}
		return redirect(base_url() . 'Employee_Account/List_employee?ID_department=' . $this->data['ID_department']);
	}

	public function view_employee()
	{
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
	}
	 */
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
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->commonData();
			$this->data['skill'] = $this->Mskillemployee->get_skills();
			$this->data['employee'] = $this->Mskillemployee->get_employees();

			$this->load->view('Employee/EmployeeskillMod/Add_skill_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill_employee()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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
			return redirect(base_url() . 'Employee_Account/List_skills_employee?ID_employee=' . $_POST['ID_employee']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function List_skills_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
			/*********************End Access Verif************************/

			$this->data['ID_employee'] = $_GET['ID_employee'];
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
			//echo print_r($this->data['skills_management']);die();
			/******************End Paging******************************/


			$this->commonData();
			$this->load->view('Employee/EmployeeskillMod/List_skills_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_skill_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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



			$this->data['skill'] = $this->Mskillemployee->get_skills();

			//echo print_r($this->data['skill']); 
			//echo $this->data['ID_skill'];
			//die();
			//$this->data['employee'] = $this->Mskillemployee->get_employees();
			//$this->data['skill_employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			///$this->data['Name_employee'] = $this->data['skill_employee'][0]['Name_employee'];
			//$this->data['Name_skill'] = $this->data['skill_employee'][0]['Name_skill'];
			//	}
			$this->load->view('Employee/EmployeeskillMod/Add_skill_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_skill_employee()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET) {
				//echo 'hi'; die();

				$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
				$this->data['employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);

				$this->data['ID_employee'] = $this->data['employee'][0]['ID_employee'];
				$this->data['skill_employee'] = $this->Mskillemployee->delete_skill_employee($this->data['ID_skill_employee']);
			}
			return redirect(base_url() . 'Employee_Account/List_skills_employee?ID_employee=' . $this->data['ID_employee']);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	/*******Unused 
	public function view_skill_employee()
	{

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
	}*/

	/***************************************************************************/
	/***************************************************************************/
	/********************** END SKILLS Employee ********************************/
	/***************************************************************************/
	/***************************************************************************/

	/***************************************************************************/
	/***************************************************************************/
	/****************************** access_group *******************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['company'] = $this->Maccess_group->get_companies();
			$this->commonData();
			$this->load->view('Employee/AccessMod/Add_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Submit_add_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
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
		/*********************End Access Verif************************/
	}

	public function List_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);

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


			$this->commonData();
			//	$this->data['access_group'] = $this->Maccess_group->get_access_group();
			$this->load->view('Employee/AccessMod/List_access_group.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}
	public function Delete_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}

	public function view_access_group()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_access_group";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}
	public function Submit_add_function()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
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
		/*********************End Access Verif************************/
	}

	public function List_function()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
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


			$this->commonData();
			//	$this->data['function'] = $this->Mfunction->get_function();
			$this->load->view('Employee/FunctionsMod/List_function.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_function()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}
	public function Delete_function()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_function";
		$this->commonAccess($current_function);
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
	/**************************** Employees _new *******************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			//if ($_GET['ID_department']) {
			//$this->data['ID_department'] = $_GET['ID_department'];
			$this->commonData();
			$this->data['post'] = $this->Memployee_new->get_posts();

			$this->data['department'] = $this->Memployee_new->get_departments();

			$this->data['accessgroup'] = $this->Memployee_new->get_accessgroup_by_department();

			//$this->data['employee'] = $this->Memployee_new->get_employees();
			//echo "<pre>";
			//echo print_r($this->data['access']);
			//echo "<pre>";
			//die();
			//}
			$this->load->view('Employee/EmployeeMod/Add_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function Submit_add_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->commonData();
			$this->commonData();
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
		/*********************End Access Verif************************/
	}
	public function Add_department_position()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
			$ID_company = $this->session->userdata('ID_company');
			$this->data['ID_employee'] = $_GET['ID_employee'];

			$this->data['department'] = $this->Memployee_new->Department_by_Company($ID_company);
			//	$this->data['position'] = $this->Mcompany->Get_position_by_company($ID_company);


			$this->load->view('Employee/EmployeeMod/Add_department_position.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}

	public function Add_position_department()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
			$ID_company = $this->session->userdata('ID_company');
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
		/*********************End Access Verif************************/
	}


	function submit_department_position()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}

	public function List_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
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


			$this->commonData();
			$this->load->view('Employee/EmployeeMod/List_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
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
			/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/
			$this->load->view('Employee/EmployeeMod/Add_employee_new.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Delete_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}

	public function view_employee_new()
	{
		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_employee_new";
		$this->commonAccess($current_function);
		if (($this->test_verif_view == 1) || ($this->test_verif_edit == 1)) {
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
		/*********************End Access Verif************************/
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************************* End Employees _new **********************/
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
		/*********************End Access Verif************************/
	}
	public function Submit_add_chapter()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
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
		/*********************End Access Verif************************/
	}

	public function List_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);

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
			$this->load->view('Employee/ChaptersMod/List_chapter.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		/*********************End Access Verif************************/
	}
	public function Form_edit_chapter()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/


			$this->commonData();

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
		/*********************End Access Verif************************/
	}
	public function Delete_chapter()
	{
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->commonData();
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
		/*********************End Access Verif************************/
	}

	public function view_chapter()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_chapter";
		$this->commonAccess($current_function);
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

	/************************ STOP STOP STOP ******************************/
	public function Form_add_subject()
	{
			/*************************Access Verif************************/
			$this->function_type = "edit";
			$current_function = "List_chapter";
			$this->commonAccess($current_function);
			if ($this->test_verif_edit == 1) {
				/*********************End Access Verif************************/
	
		$this->data['ID_chapter'] = $_GET['ID_chapter'];

		$this->commonData();

		$this->load->view('Employee/SubjectsMod/Add_subject.php', $this->data);
				/*************************Access Verif************************/
			} else {
				$this->load->view('Employee/No_access.php', $this->data);
			}
			/*********************End Access Verif************************/
	}
	public function Submit_add_subject()
	{
		$this->commonData();
		$this->data['ID_chapter'] = $_POST['ID_chapter'];
		//$this->data['subject'] = $this->Mchapter->get_subjects_by_chapter($this->data['ID_chapter']);
		//echo print_r($this->data['ID_chapter']);
		//die();
		/*$this->data['chapter'] = $this->Mchapter->get_chapter_by_ID($this->data['ID_chapter']);
		$this->data['Title_chapter'] = $this->data['chapter'][0]['Title_chapter'];
		$this->data['Name_chapter'] = $this->data['chapter'][0]['Name_chapter'];
*/

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
	}
	public function Delete_subject()
	{
		$this->commonData();

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

	/***************************************************************************/
	/***************************************************************************/
	/************************** END subjects ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** doc_requests ***********************************/
	/***************************************************************************/
	/***************************************************************************/


	/**************************** Create Request *******************************/
	public function Form_add_doc_request()
	{
		$this->commonData();

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
	}
	public function Submit_add_doc_request()
	{
		$this->commonData();
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
	}
	/************************ End Create Request *******************************/

	public function Form_edit_doc_request()
	{
		$this->commonData();

		if ($_GET) {

			//echo 'hi'; die();
			$this->data['ID_requests'] = $_GET['ID_requests'];
			$this->data['doc_request'] = $this->Mdoc_request->get_doc_request_by_ID($this->data['ID_requests']);
			//$this->data['parent'] = $this->data['doc_request'][0]['parent'];
			$this->data['Description_requests'] = $this->data['doc_request'][0]['Description_requests'];
			$this->data['Type_requests'] = $this->data['doc_request'][0]['Type_requests'];
		}
		$this->load->view('Employee/doc_requestsMod/Add_doc_request.php', $this->data);
	}
	public function Delete_doc_request()
	{
		$this->commonData();
		//echo 'hi';
		//die();
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_requests'] = $_GET['ID_requests'];
			$this->data['doc_request'] = $this->Mdoc_request->delete_doc_request($this->data['ID_requests']);
		}
		return redirect(base_url() . 'Employee_Account/List_doc_request');
	}

	public function view_doc_request()
	{
		$this->commonData();

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
	}

	public function List_request()
	{

		$this->commonData();
		//$this->data['update_doc'] = $_GET['update_doc'];
		$this->load->view('Employee/doc_requestsMod/List_request.php', $this->data);
	}
	public function List_document_view()
	{

		$this->commonData();



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
	}
	public function List_doc_request()
	{

		$this->commonData();

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


	/**************************** Create Request *******************************/
	public function Form_add_document()
	{
		//	if (isset($_GET['Type_requests'])) {
		//	$this->data['Type_requests'] = $_GET['Type_requests'];
		//	if ($this->data['Type_requests'] == 0) {
		$this->commonData();

		//	$this->data['document'] = $this->Mdocument->get_document();
		//$this->data['ID_document'] = $this->data['document'][0]['ID_document'];
		//	$this->data['Title_document'] = $this->data['document'][0]['Title_document'];
		//	$this->data['Title_document'] = $this->data['document'][0]['Title_document'];

		$this->data['ID_requests'] = $_GET['ID_requests'];
		$this->data['type'] = $this->Mdocument->get_type();

		//echo print_r($this->data['type']); die();

		$this->load->view('Employee/documentsMod/Add_document.php', $this->data);
		//	}
	}
	public function Submit_add_document()
	{
		$this->commonData();
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
	}
	/************************ End Create Request *******************************/

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

		/*echo "<pre>";
		echo print_r($this->data['document']);
		echo "<pre>";
		die();*/
		//$this->data['parent'] = $this->data['document'][0]['parent'];
		//$this->data['Description_requests'] = $this->data['document'][0]['Description_requests'];
		//$this->data['Type_requests'] = $this->data['document'][0]['Type_requests'];
		//		}
		$this->load->view('Employee/documentsMod/Add_document.php', $this->data);
	}

	/***************************************************************************/
	/******************************Account Auditor******************************/
	/***************************************************************************/


	public function Revision_requests()
	{

		$this->commonData();
		$this->load->view('Employee/doc_requestsMod/List_request_Revision.php', $this->data);
	}

	public function List_doc_request_Revision()
	{

		$this->commonData();

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
	}

	public function List_doc_Revision()
	{
		$this->commonData();
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
		$this->load->view('Employee/doc_requestsMod/List_request_validation.php', $this->data);
	}

	public function List_doc_request_validation()
	{

		$this->commonData();

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
	}

	public function List_doc_validation()
	{

		$this->commonData();
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
	}

	public function Detail_document()
	{
		$this->data['validation_form'] = 1;

		$this->commonData();

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
	}


	public function view_version()
	{
		$this->commonData();
		$this->data['session_cu'] = $this->session->userdata('ID_access_group');
		if ($this->session->userdata('ID_access_group') == 3) {

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
				$this->data['document_version'] =	$this->Mdocument->get_document_by_version($_GET['ID_version']);
				$this->data['ID_document'] = $this->data['document_version'][0]['ID_document'];
			}

			/****************** Revision ************************/
		} else if ($this->session->userdata('ID_access_group') == 4) {

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
			/************************** Validation ******************************/
		} //else {
		//}


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
		//die();
		$this->load->view('Employee/documentsMod/View_version.php', $this->data);
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
	}

	public function Detail_document_validation()
	{
		$this->data['validation_form'] = 1;

		$this->commonData();

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
	}

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



			/*echo "<pre>";
			echo print_r($this->data['version']);
			echo "<pre>";
			echo "**" . ($this->data['Revisedby_version']) . "**";
			echo "//" . ($this->data['Validatedby_version']) . "//";
			die();*/
		}
		$this->load->view('Employee/documentsMod/View_version_validation.php', $this->data);
	}

	/***************************************************************************/
	/*************************End Account Director******************************/
	/***************************************************************************/


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

		//$this->data['ID_risk'] = $_GET['ID_risk'];
		//$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['process'] = $this->Mrisk->get_all_process();
		$this->data['field'] = $this->Mrisk->get_all_field();
		$this->data['responsable'] = $this->Mrisk->get_all_employees();
		$this->data['department'] = $this->Mrisk->get_all_department();

		//$this->data['type'] = $this->Mdocument->get_type();

		$this->load->view('Employee/risksMod/Add_risk.php', $this->data);
	}
	public function Form_edit_risk()
	{
		if ($_GET) {
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->commonData();

			//$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['process'] = $this->Mrisk->get_all_process();
			$this->data['field'] = $this->Mrisk->get_all_field();
			$this->data['responsable'] = $this->Mrisk->get_all_employees();
			$this->data['department'] = $this->Mrisk->get_all_department();
			$this->data['risk'] = $this->Mrisk->get_risk_by_ID($this->data['ID_risk']);
			$this->data['ID_risk'] = $this->data['risk'][0]['ID_risk'];
			$this->data['ID_process'] = $this->data['risk'][0]['ID_process'];
			$this->data['ID_field'] = $this->data['risk'][0]['ID_field'];
			$this->data['ID_responsable'] = $this->data['risk'][0]['ID_responsable'];
			$this->data['Business_unit_risk'] = $this->data['risk'][0]['Business_unit_risk'];
			$this->data['ID_department'] = $this->data['risk'][0]['ID_department'];
			$this->data['Goal_risk'] = $this->data['risk'][0]['Goal_risk'];
			$this->data['Date_risk'] = $this->data['risk'][0]['Date_risk'];
			$this->data['Next_date_risk'] = $this->data['risk'][0]['Next_date_risk'];
			$this->data['Description_risk'] = $this->data['risk'][0]['Description_risk'];


			//$this->data['type'] = $this->Mdocument->get_type();

			$this->load->view('Employee/risksMod/Add_risk.php', $this->data);
		}
	}
	public function Submit_add_risk()
	{

		$this->commonData();
		if ($_POST) {
			$this->data = array(

				//'ID_evaluation'	=>$_POST['ID_evaluation'],
				'ID_process'	=> $_POST['ID_process'],
				'ID_field' => $_POST['ID_field'],
				'ID_responsable' => $_POST['ID_responsable'],
				'Business_unit_risk' => $_POST['Business_unit_risk'],
				'ID_department' => $_POST['ID_department'],
				'Goal_risk' => $_POST['Goal_risk'],
				'Date_risk' => $_POST['Date_risk'],
				'Next_date_risk' => $_POST['Next_date_risk'],
				'Description_risk' => $_POST['Description_risk'],

			);

			if (isset($_POST['ID_risk'])) {
				//echo 'heey'; die();
				$ID_risk = $_POST['ID_risk'];
				$this->Mrisk->edit_risk($this->data, $ID_risk);
			} else {
				$this->Mrisk->add_risk($this->data);
			}
		}

		return redirect(base_url() . 'Employee_Account/List_risk');
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
		$this->data['eval'] = $this->Mrisk->get_risk();

		/*echo "<pre>";
		echo print_r($this->data['eval']);
		echo "<pre>";
		die();*/

		$this->load->view('Employee/risksMod/List_risk.php', $this->data);
	}
	public function Delete_risk()
	{
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
		return redirect(base_url() . 'Employee_Account/List_risk');
	}
	public function View_risk()
	{
		$this->commonData();
		if ($_GET) {
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['eval'] = $this->Mrisk->get_eval_by_ID($this->data['ID_risk']);
			/*echo "<pre>";
			echo print_r($this->data['eval']);
			echo "<pre>";
			die();*/
			//$this->data['ID_risk'] = $this->data['eval'][0]['ID_risk'];
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
			//echo $this->data['ID_risk'];
			//echo print_r($this->data['eval_sector']);
			//die();


			$this->load->view('Employee/risksMod/View_risk.php', $this->data);
		}
	}
	public function Form_add_sector()
	{
		$this->commonData();
		$this->data['ID_risk'] = $_GET['ID_risk'];

		$this->load->view('Employee/risksMod/Add_sector.php', $this->data);
	}
	public function Form_edit_sector()
	{
		if ($_GET) {
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];

			$this->commonData();

			$this->data['sector'] = $this->Mrisk->get_sector_by_ID($this->data['ID_sector']);
			$this->data['Title_sector'] = $this->data['sector'][0]['Title_sector'];


			$this->load->view('Employee/risksMod/Add_sector.php', $this->data);
		}
	}
	public function Submit_add_sector()
	{

		$this->commonData();
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
	}

	public function Delete_sector()
	{
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
	}

	public function View_sector()
	{
		$this->commonData();
		if ($_GET) {


			$this->data['evaluation'] = $this->Mrisk_evaluation->get_all_evaluation();
			$this->data['analysis'] = $this->Mrisk_analysis->get_all_analysis();
			$this->data['assessment'] = $this->Mrisk_assessment->get_all_assessment();
			$this->data['action'] = $this->Mrisk_action->get_all_action();



			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];

			$this->data['risk_identif'] = $this->Mrisk_identification->get_risk_identif_by_ID($this->data['ID_risk'], $this->data['ID_sector']);
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


			$this->load->view('Employee/risksMod/View_sector.php', $this->data);
		}
	}
	/**********************************Risk Identification********************************/


	public function Form_edit_risk_identify()
	{

		$this->commonData();

		if ($_GET) {
			//$this->data['ID_risk'] = $_GET['ID_risk'];
			//$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['method'] = $this->Mrisk_identification->get_identification_method();
			$this->data['responsable'] = $this->Mrisk_identification->get_all_employees();

			$this->data['risk_identify'] = $this->Mrisk_identification->get_risk_identify_by_ID($this->data['ID_identification']);
			$this->data['ID_sector'] = $this->data['risk_identify'][0]['ID_sector'];
			$this->data['ID_responsable_identification'] = $this->data['risk_identify'][0]['ID_responsable_identification'];
			$this->data['Description_identification'] = $this->data['risk_identify'][0]['Description_identification'];
			$this->data['Activity_identification'] = $this->data['risk_identify'][0]['Activity_identification'];
			$this->data['File_identification'] = $this->data['risk_identify'][0]['File_identification'];
			$this->data['ID_identification_method'] = $this->data['risk_identify'][0]['ID_identification_method'];
			$this->data['ID_risk'] = $this->data['risk_identify'][0]['ID_risk'];
		}
		$this->load->view('Employee/risksMod/Add_risk_identify.php', $this->data);
	}


	public function Form_add_risk_identify()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['method'] = $this->Mrisk_identification->get_identification_method();
		$this->data['responsable'] = $this->Mrisk_identification->get_all_employees();

		//$this->data['type'] = $this->Mdocument->get_type();

		$this->load->view('Employee/risksMod/Add_risk_identify.php', $this->data);
	}

	public function Submit_add_risk_identify()
	{
		$this->commonData();
		$ID_risk = $_POST['ID_risk'];

		if (isset($_POST['update_doc'])) {
			$this->data['update_doc'] = $_POST['update_doc'];
		}
		/*************************Upload File*********************************/
		if ($_FILES['File_identification']['name'] == "") {
			$insertfile = '';
		} else {


			$fileimg = $_FILES['File_identification']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			$fileName = time();
			$fileTmpName = $_FILES['File_identification']['tmp_name'];
			$fileDestination = './uploads/Document/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);
			$insertfile = $fileName . '.' . $extimg;
		}
		/*********************End Upload File*********************************/

		/*****************************Update***************************************/


		if ($_POST) {
			/*****************************Update***************************************/
			if (isset($_POST['ID_identification'])) {
				$ID_identification = $_POST['ID_identification'];

				$this->data = array(
					'ID_identification'	=> $_POST['ID_identification'],
					'ID_sector'	=> $_POST['ID_sector'],
					'ID_responsable_identification'	=> $_POST['ID_responsable_identification'],
					'Description_identification'	=> $_POST['Description_identification'],
					'Activity_identification'	=> $_POST['Activity_identification'],
					'File_identification'	=> $insertfile,
					'ID_identification_method'	=> $_POST['ID_identification_method'],
					'ID_risk'	=> $_POST['ID_risk']
				);
				$this->data['new_ID_identification'] = $this->Mrisk_identification->update_risk_identification($this->data, $ID_identification);
				return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
			} else {
				/*************************Add******************************/


				$this->data = array(
					//'ID_identification'	=> $_POST['ID_identification'],
					'ID_sector'	=> $_POST['ID_sector'],
					'ID_responsable_identification'	=> $_POST['ID_responsable_identification'],
					'Description_identification'	=> $_POST['Description_identification'],
					'Activity_identification'	=> $_POST['Activity_identification'],
					'File_identification'	=> $insertfile,
					'ID_identification_method'	=> $_POST['ID_identification_method'],
					'ID_risk'	=> $_POST['ID_risk']
				);

				$this->data['new_ID_identification'] = $this->Mrisk_identification->add_risk_identification($this->data);
				return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector']);
			}
		}
	}

	public function Delete_risk_identification()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];

			$this->data['ID_identification'] = $_GET['ID_identification'];
			$this->data['identify'] = $this->Mrisk_identification->delete_identification($this->data['ID_risk']);
			$this->Mrisk_evaluation->delete_evaluation($this->data['ID_risk']);
			$this->Mrisk_analysis->delete_analysis($this->data['ID_risk']);
			$this->Mrisk_assessment->delete_assessment($this->data['ID_risk']);
			$this->Mrisk_action->delete_action($this->data['ID_risk']);
			$this->Mrisk_action->delete_action_list($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector']);
	}

	public function View_risk_identif()
	{

		$this->commonData();

		if ($_GET) {

			$this->data['ID_identification'] = $_GET['ID_identification'];

			/************************ Identification *********************/

			$this->data['identification'] = $this->Mrisk_identification->get_risk_identify_by_ID($this->data['ID_identification']);

			//$this->data['ID_identification'] = $this->data['identification'][0]['ID_identification'];
			$this->data['ID_sector'] = $this->data['identification'][0]['ID_sector'];
			$this->data['ID_responsable_identification'] = $this->data['identification'][0]['ID_responsable_identification'];
			$this->data['Description_identification'] = $this->data['identification'][0]['Description_identification'];
			$this->data['Activity_identification'] = $this->data['identification'][0]['Activity_identification'];
			$this->data['File_identification'] = $this->data['identification'][0]['File_identification'];
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
			$this->data['Next_date_evaluation'] = $this->data['evaluation'][0]['Next_date_evaluation'];
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
	}

	/******************End Risk Identification*******************************/


	/****************** Risk Evaluation *******************************/
	public function Form_edit_risk_evaluation()
	{

		$this->commonData();

		if ($_GET) {
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
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
			$this->data['Next_date_evaluation'] = $this->data['risk_eval'][0]['Next_date_evaluation'];
			$this->data['ID_risk'] = $this->data['risk_eval'][0]['ID_risk'];
			$this->data['ID_identification'] = $this->data['risk_eval'][0]['ID_identification'];
			/*echo "<pre>";
			echo print_r($this->data['risk_eval']);
			echo "<pre>";
			die();*/
		}
		$this->load->view('Employee/risksMod/Add_risk_evaluation.php', $this->data);
	}
	public function Form_add_risk_evaluation()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['ID_identification'] = $_GET['ID_identification'];

		$this->data['gravity'] = $this->Mrisk_evaluation->get_all_gravity();
		$this->data['probability'] = $this->Mrisk_evaluation->get_all_probability();
		$this->data['detectability'] = $this->Mrisk_evaluation->get_all_detectability();



		//$this->data['type'] = $this->Mdocument->get_type();

		$this->load->view('Employee/risksMod/Add_risk_evaluation.php', $this->data);
	}


	public function Submit_add_risk_evaluation()
	{

		$this->commonData();
		if ($_POST) {
			$this->data = array(

				//'ID_evaluation'	=>$_POST['ID_evaluation'],
				'Gavity_evaluation'	=> $_POST['Gavity_evaluation'],
				'Probability_evaluation' => $_POST['Probability_evaluation'],
				'Detectability_evaluation' => $_POST['Detectability_evaluation'],
				'Priority_evaluation' => $_POST['Priority_evaluation'],
				'Criticality_evaluation' => ($_POST['Gavity_evaluation'] * $_POST['Probability_evaluation'] * $_POST['Detectability_evaluation']),
				'Next_date_evaluation' => $_POST['Next_date_evaluation'],
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

		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
	}
	public function Delete_risk_evaluation()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->Mrisk_evaluation->delete_evaluation($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector'] . '&ID_identification=' . $this->data['ID_identification']);
	}

	/************** End Risk Evaluation *******************************/

	/****************** Risk analysis *******************************/


	public function Form_edit_risk_analysis()
	{

		$this->commonData();

		if ($_GET) {
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];

			$this->data['method'] = $this->Mrisk_analysis->get_all_method_analysis();

			$this->data['risk_analys'] = $this->Mrisk_analysis->get_risk_analysis_by_ID($this->data['ID_identification']);

			$this->data['ID_analysis'] = $this->data['risk_analys'][0]['ID_analysis'];
			$this->data['ID_analysis_method'] = $this->data['risk_analys'][0]['ID_analysis_method'];
			$this->data['Cause_analysis'] = $this->data['risk_analys'][0]['Cause_analysis'];
			$this->data['Consequence_analysis'] = $this->data['risk_analys'][0]['ID_analysis'];
			$this->data['ID_analysis'] = $this->data['risk_analys'][0]['Consequence_analysis'];
			$this->data['File_analysis'] = $this->data['risk_analys'][0]['File_analysis'];
			$this->data['ID_risk'] = $this->data['risk_analys'][0]['ID_risk'];
			$this->data['ID_identification'] = $this->data['risk_analys'][0]['ID_identification'];


			/*echo "<pre>";
			echo print_r($this->data['risk_analys']);
			echo "<pre>";
			die();*/
		}
		$this->load->view('Employee/risksMod/Add_risk_analysis.php', $this->data);
	}
	public function Form_add_risk_analysis()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['ID_identification'] = $_GET['ID_identification'];

		$this->data['method'] = $this->Mrisk_analysis->get_all_method_analysis();

		$this->load->view('Employee/risksMod/Add_risk_analysis.php', $this->data);
	}


	public function Submit_add_risk_analysis()
	{

		$this->commonData();


		if (isset($_POST['update_doc'])) {
			$this->data['update_doc'] = $_POST['update_doc'];
		}
		/*************************Upload File*********************************/
		if ($_FILES['File_analysis']['name'] == "") {
			$insertfile = '';
		} else {


			$fileimg = $_FILES['File_analysis']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			$fileName = time();
			$fileTmpName = $_FILES['File_analysis']['tmp_name'];
			$fileDestination = './uploads/Document/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);
			$insertfile = $fileName . '.' . $extimg;
		}
		/*********************End Upload File*********************************/




		if ($_POST) {
			$this->data = array(

				//'ID_analysis'	=>$_POST['ID_analysis'],
				'ID_analysis_method'	=> $_POST['ID_analysis_method'],
				'Cause_analysis' => $_POST['Cause_analysis'],
				'Consequence_analysis' => $_POST['Consequence_analysis'],
				'File_analysis' => $insertfile,
				'ID_risk' => $_POST['ID_risk'],
				'ID_identification' => $_POST['ID_identification'],

			);

			if (isset($_POST['ID_analysis'])) {
				//echo 'heey'; die();
				$ID_analysis = $_POST['ID_analysis'];
				$this->Mrisk_analysis->edit_analysis($this->data, $ID_analysis);
			} else {
				$this->Mrisk_analysis->add_analysis($this->data);
			}
		}

		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
	}
	public function Delete_risk_analysis()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->Mrisk_analysis->delete_analysis($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector'] . '&ID_identification=' . $this->data['ID_identification']);
	}
	/************** End Risk analysis *******************************/


	/****************** Risk assessment *******************************/

	public function Form_add_risk_assessment()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['ID_identification'] = $_GET['ID_identification'];

		$this->data['assessment'] = $this->Mrisk_assessment->get_all_probability_severity();
		$this->data['unit'] = $this->Mrisk_assessment->get_all_unit();

		$this->load->view('Employee/risksMod/Add_risk_assessment.php', $this->data);
	}


	public function Submit_add_risk_assessment()
	{

		$this->commonData();

		if ($_POST) {
			$this->data = array(

				//'ID_assessment'	=>$_POST['ID_assessment'],
				'Unit_assessment'	=> $_POST['Unit_assessment'],
				'Value_assessment' => $_POST['Value_assessment'],
				'Probability_assessment' => $_POST['Probability_assessment'],
				'Severity_assessment' => $_POST['Severity_assessment'],
				'Result_assessment' => ($_POST['Probability_assessment'] * $_POST['Severity_assessment']),
				'ID_risk' => $_POST['ID_risk'],
				'ID_identification' => $_POST['ID_identification'],


			);

			if (isset($_POST['ID_assessment'])) {
				//echo 'heey'; die();
				$ID_assessment = $_POST['ID_assessment'];
				$this->Mrisk_assessment->edit_assessment($this->data, $ID_assessment);
			} else {
				$this->Mrisk_assessment->add_assessment($this->data);
			}
		}

		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&update_doc=' . $this->data['update_doc'] . '&ID_sector=' . $_POST['ID_sector'] . '&ID_identification=' . $_POST['ID_identification']);
	}
	public function Delete_risk_assessment()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->Mrisk_assessment->delete_assessment($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector'] . '&ID_identification=' . $this->data['ID_identification']);
	}
	/************** End Risk assessment *******************************/


	/****************** Risk action *******************************/
	public function Form_edit_risk_action()
	{

		$this->commonData();

		if ($_GET) {
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
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
	}
	public function Form_add_risk_action()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['ID_identification'] = $_GET['ID_identification'];

		//$this->data['action'] = $this->Mrisk_action->get_all_probability_severity();
		//$this->data['unit'] = $this->Mrisk_action->get_all_unit();
		$this->data['response'] = $this->Mrisk_action->get_all_response();


		$this->load->view('Employee/risksMod/Add_risk_action.php', $this->data);
	}


	public function Submit_add_risk_action()
	{

		$this->commonData();

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
	}
	public function Delete_risk_action()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			$this->Mrisk_action->delete_action($this->data['ID_risk']);
			$this->Mrisk_action->delete_action_list($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/View_sector?ID_risk=' . $this->data['ID_risk'] . '&ID_sector=' . $this->data['ID_sector'] . '&ID_identification=' . $this->data['ID_identification']);
	}
	/************** End Risk action *******************************/

	/****************** Risk action List *******************************/

	public function Form_add_risk_action_list()
	{
		$this->commonData();

		$this->data['ID_risk'] = $_GET['ID_risk'];
		$this->data['ID_sector'] = $_GET['ID_sector'];
		$this->data['ID_identification'] = $_GET['ID_identification'];
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

		/******************End Paging******************************/
		//$this->data['actionlist'] = $this->Mrisk_action->get_action_list_by_action($this->data['ID_action']);
		$this->data['execute'] = $this->Mrisk_action->get_all_execute();
		$this->data['cost'] = $this->Mrisk_action->get_all_cost();
		$this->data['type'] = $this->Mrisk_action->get_all_action_type();




		$this->load->view('Employee/risksMod/Add_risk_action_list.php', $this->data);
	}


	public function Submit_add_risk_action_list()
	{

		$this->commonData();

		$ID_risk = $_POST['ID_risk'];
		$ID_sector = $_POST['ID_sector'];
		$ID_identification = $_POST['ID_identification'];
		$ID_action = $_POST['ID_action'];

		if ($_POST) {
			$this->data = array(

				'Inticipation_action_list' => $_POST['Inticipation_action_list'],
				'Correction_action_list' => $_POST['Correction_action_list'],
				//'ID_execute' => $_POST['ID_execute'],
				//'ID_cost' => $_POST['ID_cost'],
				//'Priority_action' => $_POST['Priority_action'],
				//'ID_type' => $_POST['ID_type'],
				//'Measure_action' => $_POST['Measure_action'],
				'ID_action' => $_POST['ID_action'],
			);

			if (isset($_POST['ID_action_list'])) {
				//echo 'heey'; die();
				$ID_action_list = $_POST['ID_action_list'];
				$this->Mrisk_action->edit_action_list($this->data, $ID_action_list);
			} else {
				$ID_action_list = $this->Mrisk_action->add_action_list($this->data);
			}
		}

		return redirect(base_url() . 'Employee_Account/Form_add_risk_action_list?ID_action=' . $ID_action . '&ID_risk=' . $ID_risk . '&ID_identification=' . $ID_identification . '&ID_sector=' . $ID_sector);
	}

	public function Form_fill_risk_action_list()
	{
		$this->commonData();

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
	}


	public function Submit_fill_risk_action_list()
	{

		$this->commonData();

		$this->commonData();
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

				//'Inticipation_action_list' => $_POST['Inticipation_action_list'],
				//'Correction_action_list' => $_POST['Correction_action_list'],
				'ID_execute' => $_POST['ID_execute'],
				'ID_cost' => $_POST['ID_cost'],
				'Priority_action' => $_POST['Priority_action'],
				'ID_type' => $_POST['ID_type'],
				'Measure_action' => $_POST['Measure_action'],
				'Date_action_list' => $_POST['Date_action_list'],
				'Description_action_list' => $_POST['Description_action_list'],
				'Value_cost_action_list' => $_POST['Value_cost_action_list'],
				'Actor_action_list' => $_POST['Actor_action_list'],
				'ID_status' => $ID_status,
				'Cause_action_list' => $_POST['Cause_action_list'],
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
	}
	public function Delete_risk_action_list()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_action'] = $_GET['ID_action'];
			$this->data['ID_risk'] = $_GET['ID_risk'];
			$this->data['ID_sector'] = $_GET['ID_sector'];
			$this->data['ID_identification'] = $_GET['ID_identification'];

			//$this->Mrisk_action->delete_action($this->data['ID_risk']);
			$this->Mrisk_action->delete_action_list($this->data['ID_risk']);
		}
		return redirect(base_url() . 'Employee_Account/Form_add_risk_action_list?ID_action=' . $ID_action . '&ID_risk=' . $ID_risk . '&ID_identification=' . $ID_identification . '&ID_sector=' . $ID_sector);
	}

	/******************************** Action Report ************************/

	public function List_action_report()
	{

		$this->commonData();

		$this->data['action'] = $this->Mrisk_action->get_action_by_responsable($this->session->userdata('ID_employee'));

		$this->load->view('Employee/risksMod/List_action_report.php', $this->data);
	}

	public function List_action()
	{

		$this->commonData();
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
	}
	/***************************************************************************/
	/***************************************************************************/
	/************************** RISK Management ********************************/
	/***************************************************************************/
	/***************************************************************************/


	/***************************************************************************/
	/***************************************************************************/
	/****************************** process *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_process()
	{
		$this->commonData();

		$this->load->view('Employee/processMod/Add_process.php', $this->data);
	}
	public function Submit_add_process()
	{
		$this->commonData();

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
	}

	public function List_process()
	{
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


		$this->commonData();
		//	$this->data['process'] = $this->Mprocess->get_process();
		$this->load->view('Employee/processMod/List_process.php', $this->data);
	}
	public function Form_edit_process()
	{
		$this->commonData();

		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_process'] = $_GET['ID_process'];
			$this->data['process'] = $this->Mprocess->get_process_by_ID($this->data['ID_process']);
			$this->data['Name_process'] = $this->data['process'][0]['Name_process'];
			$this->data['Picture_process'] = $this->data['process'][0]['Picture_process'];
		}
		$this->load->view('Employee/processMod/Add_process.php', $this->data);
	}
	public function Delete_process()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_process'] = $_GET['ID_process'];
			$this->data['process'] = $this->Mprocess->delete_process($this->data['ID_process']);
		}
		return redirect(base_url() . 'Employee_Account/List_process');
	}
	/***************************************************************************/
	/***************************************************************************/
	/****************************** field *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_field()
	{
		$this->commonData();

		$this->load->view('Employee/fieldMod/Add_field.php', $this->data);
	}
	public function Submit_add_field()
	{
		$this->commonData();



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
	}

	public function List_field()
	{
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


		$this->commonData();
		//	$this->data['field'] = $this->Mfield->get_field();
		$this->load->view('Employee/fieldMod/List_field.php', $this->data);
	}
	public function Form_edit_field()
	{
		$this->commonData();

		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_field'] = $_GET['ID_field'];
			$this->data['field'] = $this->Mfield->get_field_by_ID($this->data['ID_field']);
			$this->data['Title_field'] = $this->data['field'][0]['Title_field'];
		}
		$this->load->view('Employee/fieldMod/Add_field.php', $this->data);
	}
	public function Delete_field()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_field'] = $_GET['ID_field'];
			$this->data['field'] = $this->Mfield->delete_field($this->data['ID_field']);
		}
		return redirect(base_url() . 'Employee_Account/List_field');
	}
}
