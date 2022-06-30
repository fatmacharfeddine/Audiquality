<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Technical_Account extends CI_Controller
{
	var $ID_company = 0;
	public $dept = 0;
	public function __construct()
	{
		parent::__construct();

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

		$this->load->model('Mfunctions_access');

		$this->load->model('Memployee_new');

		$this->load->model('Mtraining_group');

		$this->load->model('Mdocument');

		$this->load->model('Mprocessus');

		$this->load->model('Mdocument_upload');

		$this->load->model('MContexte');
		$this->load->model('Mrisk');
		$this->load->model('Mentete');
		$this->load->model('Minterest');

		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->ID_company = 0;
		$this->load->library('grocery_CRUD');
	}
	public function commonData()
	{
		/********************* Technical Information **************************/
		if ($this->session->userdata('ID_technical') != null) {
			$this->data['technical'] = $this->Mtechnical->get_technical_by_ID($this->session->userdata('ID_technical'));
			$this->data['Name_technical'] = $this->data['technical'][0]['Name_technical'];
			$this->data['ID_company'] = $this->data['technical'][0]['ID_company'];
			$this->data['Logo_company'] = $this->data['technical'][0]['Logo_company'];
		}
		/********************End Technical Information ************************/

		/********************** Session Control ***************************/
		if ($this->session->userdata('logged_in') !== TRUE) {
			redirect(base_url() . 'LoginAccount/Account');
		}

		if (($this->session->userdata('logged_in') == TRUE) &&  ($this->session->userdata('type') != "Technical")) {

			redirect(base_url() . 'LoginAccount/Account');
		}
		/********************* End Session Control ************************/
	}
	public function index()
	{
		$this->commonData();
		$this->data['technical'] = $this->Mtechnical->get_technical_by_ID($this->session->userdata('ID_technical'));

		$this->data['Name_technical'] = $this->data['technical'][0]['Name_technical'];
		$this->data['Email_technical'] = $this->data['technical'][0]['Email_technical'];
		$this->data['Name_access_group'] = $this->data['technical'][0]['Name_access_group'];
		$this->data['Name_company'] = $this->data['technical'][0]['Name_company'];
		$this->data['Address_company'] = $this->data['technical'][0]['Address_company'];
		$this->data['Logo_company'] = $this->data['technical'][0]['Logo_company'];


		/*echo "<pre>";
		echo print_r($this->data['technical']);
		echo "<pre>";
		die();*/
		$this->load->view('Technical/Index.php', $this->data);
	}
	/***************************************************************************/
	/***************************************************************************/
	/****************************** SKILLS *************************************/
	/***************************************************************************/
	/***************************************************************************/

	public function Form_add_skill()
	{
		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/Add_skill.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_skill()
	{
		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);

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
						$this->load->view('Technical/SkillMod/Add_skill.php', $this->data);
					}
				} else {
					$ID_skill = $_POST['ID_skill'];
					$this->Mskill->edit_skill($this->data_skill, $ID_skill);
					return redirect(base_url() . 'Technical_Account/List_Skills', $this->data);
				}
			} else {
				if ($this->Mskill->get_skill_by_Name($_POST['Name_skill']) != False) {
					$this->data['exist'] = 1;
					$this->load->view('Technical/SkillMod/Add_skill.php', $this->data);
				} else {
					$this->Mskill->add_skill($this->data_skill);
					return redirect(base_url() . 'Technical_Account/List_Skills', $this->data);
				}
			}
		}
		$this->load->view('Technical/Footer');
	}

	public function List_skills()
	{

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


		$this->commonData();
		//	$this->data['skills'] = $this->Mskill->get_skills();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/List_Skills.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	public function view_fiche()
	{
		$this->commonData();


		if ($_GET) {
			$this->data['ID_post'] = $_GET['ID_post'];
			$this->data['post'] = $this->Mpost->get_post_by_ID($this->data['ID_post']);
			/*echo print_r($this->data['post']);
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/PositionMod/View_fiche.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	/*************************************************************************/
	/*************************************************************************/
	/****************************Employee by Skill****************************/
	/*************************************************************************/
	/*************************************************************************/

	public function List_employees_skill()
	{
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
		/*echo "<pre>";
		echo print_r($this->data['employees']);
		echo "<pre>";
		die();*/
		/******************End Paging******************************/
		$this->data['group'] = $this->Mskill->get_group_training_by_skill($this->data['ID_skill']);

		//$this->data['group_employee'] = $this->Mskill->get_group_training();

		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/List_employees_skill.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	/******************************Training Group*****************************/

	public function Form_add_training_group()
	{
		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/Add_skill.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_training_group()
	{
		$this->commonData();
		/*echo "here";
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
	}
	public function Add_training_group_employee()
	{

		$this->commonData();
		$this->data['ID_skill'] = $_GET['ID_skill'];
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/Add_training_group_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_training_group_employee()
	{

		$this->commonData();
		//echo "here";
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
	}
	public function Delete_training_group()
	{
		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_skill'] = $_GET['ID_skill'];

			$this->data['ID_training_group'] = $_GET['ID_training_group'];
			$this->data['training_group'] = $this->Mtraining_group->delete_training_group($this->data['ID_training_group']);
		}
		return redirect(base_url() . 'Technical_Account/List_employees_skill?ID_skill=' . $this->data['ID_skill'], $this->data);
	}
	/*************************************************************************/
	/*************************************************************************/
	/************************End Employee by Skill****************************/
	/*************************************************************************/
	/*************************************************************************/

	public function Form_edit_skill()
	{
		$this->commonData();

		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_skill'] = $_GET['ID_skill'];
			$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
			$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];
			$this->data['Description_skill'] = $this->data['skill'][0]['Description_skill'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/Add_skill.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_skill()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_skill'] = $_GET['ID_skill'];
			$this->data['skill'] = $this->Mskill->delete_skill($this->data['ID_skill']);
		}
		return redirect(base_url() . 'Technical_Account/List_Skills');
	}

	public function view_skill()
	{
		$this->commonData();

		if ($_GET) {
			$this->data['ID_skill'] = $_GET['ID_skill'];
			$this->data['skill'] = $this->Mskill->get_skill_by_ID($this->data['ID_skill']);
			$this->data['Name_skill'] = $this->data['skill'][0]['Name_skill'];
			$this->data['Description_skill'] = $this->data['skill'][0]['Description_skill'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillMod/View_skill.php', $this->data);

		$this->load->view('Technical/Footer');
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
		$this->data['position'] = $this->Mpost->get_posts();
		/*echo print_r($this->data['position']);
		die();*/
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/PositionMod/Add_post.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_post()
	{
		$this->commonData();
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
						$this->load->view('Technical/Header');
						$this->load->view('Technical/Menu', $this->data);
						$this->load->view('Technical/PositionMod/Add_post.php', $this->data);

						$this->load->view('Technical/Footer');
					}
				} else {
					$ID_post = $_POST['ID_post'];
					$this->Mpost->edit_post($this->data_post, $ID_post);
					return redirect(base_url() . 'Technical_Account/List_posts');
				}
			} else {
				if ($this->Mpost->get_post_by_Name($_POST['Name_post']) != False) {
					$this->data['exist'] = 1;
					$this->load->view('Technical/Header');
					$this->load->view('Technical/Menu', $this->data);
					$this->load->view('Technical/PositionMod/Add_post.php', $this->data);

					$this->load->view('Technical/Footer');
				} else {
					$this->Mpost->add_post($this->data_post);
					return redirect(base_url() . 'Technical_Account/List_posts');
				}
			}
		}
	}

	public function List_posts()
	{
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/PositionMod/List_posts.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_post()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/PositionMod/Add_post.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_post()
	{
		$this->commonData();

		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_post'] = $_GET['ID_post'];
			$this->data['post'] = $this->Mpost->delete_post($this->data['ID_post']);
		}

		return redirect(base_url() . 'Technical_Account/List_posts');
	}

	public function view_post()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/PositionMod/View_post.php', $this->data);

		$this->load->view('Technical/Footer');
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
		if ($_GET['ID_post']) {
			$this->data['ID_post'] = $_GET['ID_post'];


			$this->data['skill'] = $this->Mskillmanagement->get_skills_for_position($this->data['ID_post']);
			//$this->data['post'] = $this->Mskillmanagement->get_posts();
		}

		//echo $_GET['ID_post'] ; die();
		if (($this->Mskillmanagement->get_skills_for_position($this->data['ID_post'])) == False) {
			return redirect(base_url() . 'Technical_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
		} else {
			$this->load->view('Technical/Header');
			$this->load->view('Technical/Menu', $this->data);
			$this->load->view('Technical/SkillmanagementMod/Add_skill_management.php', $this->data);

			$this->load->view('Technical/Footer');
		}
	}
	public function Submit_add_skill_management()
	{
		$this->commonData();
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
	}

	public function List_skills_management()
	{
		$this->data['ID_post'] = $_GET['ID_post'];
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


		$this->commonData();
		//	$this->data['skills_management'] = $this->Mskillmanagement->get_skills_management();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillmanagementMod/List_skills_management.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_skill_management()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillmanagementMod/Add_skill_management.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_skill_management()
	{
		if ($_GET) {

			$this->data['ID_management'] = $_GET['ID_management'];
			$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
			$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
			$this->data['skill_management'] = $this->Mskillmanagement->delete_skill_management($this->data['ID_management']);
		}
		//echo $this->data['ID_post'] ; die();
		return redirect(base_url() . 'Technical_Account/List_skills_management?ID_post=' . $this->data['ID_post']);
	}

	public function view_skill_management()
	{
		if ($_GET) {

			$this->data['ID_management'] = $_GET['ID_management'];
			$this->data['skill_management'] = $this->Mskillmanagement->get_skill_management_by_ID($this->data['ID_management']);
			$this->data['Name_post'] = $this->data['skill_management'][0]['Name_post'];
			$this->data['Name_skill'] = $this->data['skill_management'][0]['Name_skill'];
			$this->data['Weight_skill'] = $this->data['skill_management'][0]['Weight_skill'];

			$this->data['post'] = $this->Mskillmanagement->get_post_by_post_management($this->data['ID_management']);
			$this->data['ID_post'] = $this->data['post'][0]['ID_post'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/SkillmanagementMod/View_skill_management.php', $this->data);

		$this->load->view('Technical/Footer');
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

		$this->load->view('Technical/Add_skill_employee.php', $this->data);
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
		return redirect(base_url() . 'Technical_Account/List_skills_employee');
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
		$this->load->view('Technical/List_skills_employee.php', $this->data);
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
		$this->load->view('Technical/Add_skill_employee.php', $this->data);
	}
	public function Delete_skill_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['skill_employee'] = $this->Mskillemployee->delete_skill_employee($this->data['ID_skill_employee']);
		}
		return redirect(base_url() . 'Technical_Account/List_skills_employee');
	}

	public function view_skill_employee()
	{
		if ($_GET) {
			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['skill_employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);
			$this->data['Name_employee'] = $this->data['skill_employee'][0]['Name_employee'];
			$this->data['Name_skill'] = $this->data['skill_employee'][0]['Name_skill'];
		}
		$this->load->view('Technical/View_skill_employee.php', $this->data);
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

		$this->commonData();
		$this->data['parent'] = $this->Mdepartment->get_departments();
		$this->data['director'] = $this->Mdepartment->get_employees();
		$this->data['director_qse'] = $this->Mdepartment->get_employees();

		$this->data['company'] = $this->Mdepartment->get_companies();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/Add_department.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_department()
	{
		//echo $_POST['Parent_department'] ; die();

		$this->commonData();
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
	}

	public function List_departments()
	{
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


		$this->commonData();
		//	$this->data['departments'] = $this->Mdepartment->get_departments();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/List_departments.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_department()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/Add_department.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function View_Delete_department()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_department'] = $_GET['ID_department'];
			$this->commonData();
			$this->load->view('Technical/Header');
			$this->load->view('Technical/Menu', $this->data);
			$this->load->view('Technical/DepartmentMod/Delete_department.php', $this->data);

			$this->load->view('Technical/Footer');
		}
	}

	public function Delete_department()
	{
		$this->commonData();

		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_department'] = $_GET['ID_department'];
			$this->data['department'] = $this->Mdepartment->delete_department($this->data['ID_department']);
		}
		return redirect(base_url() . 'Technical_Account/view_department');
	}
	public function view_department()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/View_department.php', $this->data);

		$this->load->view('Technical/Footer');
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
		if ($_GET['ID_department']) {
			$this->data['ID_department'] = $_GET['ID_department'];
			$this->commonData();
			$this->data['post'] = $this->Mdepartmentpost->get_posts_for_department($this->data['ID_department']);
			//$this->data['employee'] = $this->Mdepartmentpost->get_employees();
			//echo print_r($this->data['post']); die();

			if (($this->Mdepartmentpost->get_posts_for_department($this->data['ID_department'])) == False) {
				return redirect(base_url() . 'Technical_Account/view_department?ID_department=' . $this->data['ID_department']);
			} else {
				$this->load->view('Technical/Header');
				$this->load->view('Technical/Menu', $this->data);
				$this->load->view('Technical/DepartmentMod/Add_department_post.php', $this->data);

				$this->load->view('Technical/Footer');
			}
		}
	}
	public function Submit_add_department_post()
	{
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
		return redirect(base_url() . 'Technical_Account/view_department?ID_department=' . $_POST['ID_department']);
	}

	/*public function List_departments_post()
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
		

		$this->commonData();
		$this->load->view('Technical/DepartmentMod/List_departments_post.php', $this->data);
	}*/
	public function Form_edit_department_post()
	{
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
		$this->data['post'] = $this->Mdepartmentpost->get_posts_for_department_edit($this->data['ID_department'], $this->data['ID_post']);
		/*echo ($this->data['ID_post']);
		echo "///";
		echo print_r($this->data['post']);
		die();*/
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/Add_department_post.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_department_post()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_department_post'] = $_GET['ID_department_post'];
			$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);
			$this->data['ID_department'] = $this->data['department_post'][0]['ID_department'];

			$this->data['department_post'] = $this->Mdepartmentpost->delete_department_post($this->data['ID_department_post']);
		}
		return redirect(base_url() . 'Technical_Account/List_departments_post?ID_department=' . $this->data['ID_department']);
	}

	public function view_department_post()
	{
		if ($_GET) {
			$this->data['ID_department_post'] = $_GET['ID_department_post'];
			$this->data['department_post'] = $this->Mdepartmentpost->get_posts_by_departmentpost($this->data['ID_department_post']);

			//echo (print_r($this->data['ID_department_post'])); die();
			//echo (print_r($this->data['department_post'])); die();
			$this->data['Name_post'] = $this->data['department_post'][0]['Name_post'];
			$this->data['Name_department'] = $this->data['department_post'][0]['Name_department'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/View_department_post.php', $this->data);

		$this->load->view('Technical/Footer');
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

		if ($_GET['ID_department_post']) {
			$this->data['ID_department_post'] = $_GET['ID_department_post'];
			$this->commonData();
			//$this->data['post'] = $this->Mdepartmentemployee->get_posts($this->data['ID_department']);

			//$this->data['positiondepartment'] = $this->Mdepartmentemployee->get_positions_by_department($this->data['ID_department']);

			$this->data['accessgroup'] = $this->Mdepartmentemployee->get_accessgroup();
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/Add_department_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	/*public function Form_add_department_employee()
	{
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
		$this->load->view('Technical/DepartmentMod/Add_department_employee.php', $this->data);
	}*/
	public function Submit_add_department_employee()
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

				//$this->data['post'] = $this->Mdepartmentemployee->get_posts();

				$this->Mdepartmentemployee->edit_department_employee($this->data, $ID_employee);
			} else {
				$this->Mdepartmentemployee->add_department_employee($this->data);
			}
		}
		return redirect(base_url() . 'Technical_Account/List_departments_employee?ID_department_post=' . $_POST['ID_department_post']);
	}

	public function List_departments_employee()
	{
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


		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/List_departments_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_department_employee()
	{
		if ($_GET) {
			$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/Add_department_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_department_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->data['department_employee'] = $this->Mdepartmentemployee->get_department_by_employee($this->data['ID_employee']);
			$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

			$this->data['department_employee'] = $this->Mdepartmentemployee->delete_department_employee($this->data['ID_employee']);
		}
		return redirect(base_url() . 'Technical_Account/List_departments_employee?ID_department_post=' . $_POST['ID_department_post']);
	}

	public function view_department_employee()
	{
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

		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/View_department_employee.php', $this->data);

		$this->load->view('Technical/Footer');
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/Add_employee.php', $this->data);

		$this->load->view('Technical/Footer');
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
		return redirect(base_url() . 'Technical_Account/List_employee?ID_department=' . $_POST['ID_department']);
	}

	public function List_employee()
	{
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


		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/List_employee.php', $this->data);

		$this->load->view('Technical/Footer');
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
		die();*/
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/Add_employee.php', $this->data);

		$this->load->view('Technical/Footer');
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
		return redirect(base_url() . 'Technical_Account/List_employee?ID_department=' . $this->data['ID_department']);
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/View_employee.php', $this->data);

		$this->load->view('Technical/Footer');
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
		if ($_GET['ID_employee']) {
			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->commonData();
			$this->data['skill'] = $this->Mskillemployee->get_skills_for_employee($this->data['ID_employee']);
			$this->data['employee'] = $this->Mskillemployee->get_employees();

			if (($this->Mskillemployee->get_skills_for_employee($this->data['ID_employee'])) == False) {
				return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $this->data['ID_employee']);
			} else {
				$this->load->view('Technical/Header');
				$this->load->view('Technical/Menu', $this->data);
				$this->load->view('Technical/EmployeeskillMod/Add_skill_employee.php', $this->data);

				$this->load->view('Technical/Footer');
			}
		}
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
				$this->Mskillemployee->edit_skill_employee($this->data, $ID_skill_employee);
				$this->data['skill'] = $this->Mskillemployee->get_skills();
			} else {
				$this->Mskillemployee->add_skill_employee($this->data);
			}
		}
		return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $_POST['ID_employee']);
	}

	public function List_skills_employee()
	{
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


		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/List_skills_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function View_employee_details()
	{
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


		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/View_employee_details.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	/*************************View Employee without skill*************************/
	public function List_skills_employee_view()
	{
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


		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/DepartmentMod/View_department_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_skill_employee()
	{
		$this->commonData();

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/Add_skill_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_skill_employee()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_skill_employee'] = $_GET['ID_skill_employee'];
			$this->data['employee'] = $this->Mskillemployee->get_skill_employee_by_ID($this->data['ID_skill_employee']);

			$this->data['ID_employee'] = $this->data['employee'][0]['ID_employee'];
			$this->data['skill_employee'] = $this->Mskillemployee->delete_skill_employee($this->data['ID_skill_employee']);
		}
		return redirect(base_url() . 'Technical_Account/List_skills_employee?ID_employee=' . $this->data['ID_employee']);
	}

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

		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeskillMod/View_skill_employee.php', $this->data);

		$this->load->view('Technical/Footer');
	}

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
		$this->data['company'] = $this->Maccess_group->get_companies();
		$this->commonData();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/Add_access_group.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_access_group()
	{
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
		return redirect(base_url() . 'Technical_Account/List_access_group');
	}

	public function List_access_group()
	{

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
			if (isset($_GET['ID_access_group'])) {
				$this->data['current_access_group'] = $_GET['ID_access_group'];
			} else {
				$this->data['current_access_group'] = $this->data['access_group'][0]['ID_access_group'];
			}
		}
		$this->data['current_function_access'] = $this->Mfunctions_access->get_access_function_by_ID($this->data['current_access_group']);
		/*echo "<pre>";
		echo print_r($this->data['current_function_access']);
		echo "<pre>";
		die();*/

		$this->data['nb'] = $this->Maccess_group->get_access_group_nb_page();

		/******************End Paging******************************/
		/*************************** List Functions ***************************/
		$this->data['functions_access'] = $this->Mfunctions_access->get_functions_access();
		/*********************** End List Functions ***************************/


		$this->commonData();
		//	$this->data['access_group'] = $this->Maccess_group->get_access_group();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/List_access_group.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_access_group()
	{
		if ($_GET) {
			$this->data['company'] = $this->Maccess_group->get_companies();

			//echo 'hi'; die();
			$this->data['ID_access_group'] = $_GET['ID_access_group'];
			$this->data['access_group'] = $this->Maccess_group->get_access_group_by_ID($this->data['ID_access_group']);
			$this->data['ID_company'] = $this->data['access_group'][0]['ID_company'];
			$this->data['Name_access_group'] = $this->data['access_group'][0]['Name_access_group'];
			$this->data['Name_company'] = $this->data['access_group'][0]['Name_company'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/Add_access_group.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_access_group()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_access_group'] = $_GET['ID_access_group'];
			$this->data['access_group'] = $this->Maccess_group->delete_access_group($this->data['ID_access_group']);
		}
		return redirect(base_url() . 'Technical_Account/List_access_group');
	}

	public function view_access_group()
	{
		if ($_GET) {
			$this->data['ID_access_group'] = $_GET['ID_access_group'];
			$this->data['access_group'] = $this->Maccess_group->get_access_group_by_ID($this->data['ID_access_group']);
			$this->data['Name_access_group'] = $this->data['access_group'][0]['Name_access_group'];
			$this->data['Name_company'] = $this->data['access_group'][0]['Name_company'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/View_access_group.php', $this->data);

		$this->load->view('Technical/Footer');
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
		$this->data['parent_list'] = $this->Mfunction->get_functions_main();
		/*echo "<pre>";
		echo (print_r($this->data['parent']));
		echo "<pre>";

		die();*/
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/FunctionsMod/Add_function.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_function()
	{
		$this->commonData();
		if (($_POST['radio'] == "main")) {
			$ismain = 1;
			$parent = 0;
			//echo "main";
		}
		if (($_POST['radio'] == "parent")) {
			$ismain = 0;
			$parent = $_POST['ID_department'];
			//echo $_POST['ID_department'] ;
			//echo "parent";
		}
		//die();
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
		return redirect(base_url() . 'Technical_Account/List_function');
	}

	public function List_function()
	{
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
			/*echo "<pre>";
			echo print_r($this->data['function']);
			echo "<pre>";
			die();*/
		}
		$this->data['nb'] = $this->Mfunction->get_function_nb_page();

		/******************End Paging******************************/

		$this->commonData();
		//	$this->data['function'] = $this->Mfunction->get_function();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/FunctionsMod/List_function.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_function()
	{
		$this->commonData();

		if ($_GET) {

			//echo 'hi'; die();
			$this->data['ID_function'] = $_GET['ID_function'];
			$this->data['function'] = $this->Mfunction->get_function_by_ID($this->data['ID_function']);
			$this->data['parent'] = $this->data['function'][0]['parent'];
			$this->data['URL_function'] = $this->data['function'][0]['URL_function'];
			$this->data['Name_function'] = $this->data['function'][0]['Name_function'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/FunctionsMod/Add_function.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_function()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_function'] = $_GET['ID_function'];
			$this->data['function'] = $this->Mfunction->delete_function($this->data['ID_function']);
		}
		return redirect(base_url() . 'Technical_Account/List_function');
	}

	public function view_function()
	{
		if ($_GET) {
			$this->data['ID_function'] = $_GET['ID_function'];
			$this->data['function'] = $this->Mfunction->get_function_by_ID($this->data['ID_function']);
			$this->data['Name_function'] = $this->data['function'][0]['Name_function'];
			$this->data['URL_function'] = $this->data['function'][0]['URL_function'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/FunctionsMod/View_function.php', $this->data);

		$this->load->view('Technical/Footer');
	}

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/Add_function_access.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	/*public function Submit_add_functions_access()
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
		return redirect(base_url() . 'Technical_Account/List_functions_access?ID_access_group=' . $this->data['ID_access_group']);
	}*/
	public function Submit_edit_function_access()
	{
		if ($_GET) {
			echo $_GET['action'];
			if ($_GET['action'] == 0) {
				$this->data['View_functions_access'] = 0;
				$this->data['Edit_functions_access'] = 0;
			} else if ($_GET['action'] == 1) {
				$this->data['View_functions_access'] = 1;
				$this->data['Edit_functions_access'] = 0;
			} else if ($_GET['action'] == 2) {
				$this->data['View_functions_access'] = 0;
				$this->data['Edit_functions_access'] = 1;
			}

			$this->commonData();

			$this->data = array(
				'ID_function' => $_GET['ID_function'],
				'ID_access_group' => $_GET['ID_access_group'],
				'View_functions_access' => $this->data['View_functions_access'],
				'Edit_functions_access' => $this->data['Edit_functions_access'],
			);
		}
		$this->Mfunctions_access->delete_functions_access_by_access_group($_GET['ID_access_group'], $_GET['ID_function']);
		$this->Mfunctions_access->add_functions_access($this->data);
		return redirect(base_url() . 'Technical_Account/List_access_group?ID_access_group=' . $_GET['ID_access_group']);
	}
	public function List_functions_access()
	{
		$this->data['ID_access_group'] = $_GET['ID_access_group'];
		$this->data['accessgroup'] = $this->Mfunctions_access->get_access_group_by_ID($this->data['ID_access_group']);
		$this->data['Name_access_group'] = $this->data['accessgroup'][0]['Name_access_group'];

		//echo $this->data['ID_access_group'] ; die();
		$this->data['nb'] = 1;
		/*********************Paging*******************************/
		$page = 1;
		if (!isset($_GET['page'])) {
			$p = 1;
		} else {
			$p = $_GET['page'];
		}
		$page = ($p - 1) * 9;
		if ($this->Mfunctions_access->get_skills_by_post_management_paging($page, $this->data['ID_access_group']) == False) {
			$this->data['empty'] = 1;
			//echo $this->data['empty'] ; die();
		} else {
			$this->data['function_access'] = $this->Mfunctions_access->get_skills_by_post_management_paging($page, $this->data['ID_access_group']);
			//echo print_r($this->data['function_access']) ; die();
		}
		$this->data['nb'] = $this->Mfunctions_access->get_functions_access_by_post_nb_page($this->data['ID_access_group']);

		//echo print_r($this->data['function_access']);
		//die();

		/******************End Paging******************************/


		$this->commonData();
		//	$this->data['function_access'] = $this->Mfunctions_access->get_functions_access();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/List_function_access.php', $this->data);

		$this->load->view('Technical/Footer');
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/Add_function_access.php', $this->data);

		$this->load->view('Technical/Footer');
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
		return redirect(base_url() . 'Technical_Account/List_functions_access?ID_access_group=' . $this->data['ID_access_group']);
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/AccessMod/View_function_access.php', $this->data);

		$this->load->view('Technical/Footer');
	}

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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/Add_employee_new.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	public function Submit_add_employee_new()
	{

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
		return redirect(base_url() . 'Technical_Account/List_employee_new');
	}
	public function Add_department_position()
	{
		$this->commonData();
		$ID_company = $this->session->userdata('ID_company');
		$this->data['ID_employee'] = $_GET['ID_employee'];

		$this->data['department'] = $this->Memployee_new->Department_by_Company($ID_company);
		//	$this->data['position'] = $this->Mcompany->Get_position_by_company($ID_company);

		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/Add_department_position.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	public function Add_position_department()
	{
		$this->commonData();
		$ID_company = $this->session->userdata('ID_company');
		$this->data['ID_employee'] = $_POST['ID_employee'];
		$this->data['ID_department'] = $_POST['ID_department'];

		$this->data['department'] = $this->Memployee_new->Department_by_Company($ID_company);
		$this->data['position'] = $this->Memployee_new->Get_position_by_department($this->data['ID_department']);
		//echo $this->data['ID_department'];
		//echo print_r($this->data['position']);
		//die();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/Add_position_department', $this->data);

		$this->load->view('Technical/Footer');
	}


	function submit_department_position()
	{

		$ID_department = $_POST['ID_department'];
		$ID_position = $_POST['ID_post'];
		$ID_employee = $_POST['ID_employee'];
		$Formation_post = $_POST['Formation_post'];
		$Experience_post = $_POST['Experience_post'];
		$Conforme_formation_employee = $_POST['Conforme_formation_employee'];
		$Conforme_experience_employee = $_POST['Conforme_experience_employee'];
		$Action_formation_employee = $_POST['Action_formation_employee'];
		$Action_experience_employee = $_POST['Action_experience_employee'];


		//echo 'welcome finally';
		//die();
		$this->data =
			array(
				"ID_department" => $ID_department,
				"ID_post" => $ID_position,
			);

		$newID_department_post = $this->Memployee_new->edit_department_position($this->data);
		$this->data1 = array(
			'ID_department_post' => $newID_department_post,
			'Formation_employee' => $_POST['Formation_employee'],
			'Experience_employee' => $_POST['Experience_employee'],
			'Conforme_formation_employee' => $_POST['Conforme_formation_employee'],
			'Conforme_experience_employee' => $_POST['Conforme_experience_employee'],
			'Action_formation_employee' => $_POST['Action_formation_employee'],
			'Action_experience_employee' => $_POST['Action_experience_employee'],


		);
		$this->Memployee_new->edit_department_position_for_employee2($this->data1, $ID_employee);


		return redirect(base_url() . 'Technical_Account/List_employee_new');
	}

	public function List_employee_new()
	{
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/List_employee_new.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Form_edit_employee_new()
	{
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/Add_employee_new.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Delete_employee_new()
	{
		if ($_GET) {
			//echo 'hi'; die();

			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->data['department_employee'] = $this->Memployee_new->get_department_by_employee($this->data['ID_employee']);
			$this->data['ID_department'] = $this->data['department_employee'][0]['ID_department'];

			$this->data['employee'] = $this->Memployee_new->delete_employee($this->data['ID_employee']);
		}
		return redirect(base_url() . 'Technical_Account/List_employee_new?ID_department=' . $this->data['ID_department']);
	}

	public function view_employee_new()
	{
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/EmployeeMod/View_employee_new.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	/***************************************************************************/
	/***************************************************************************/
	/********************************* End Employees _new **********************/
	/***************************************************************************/
	/***************************************************************************/




	public function Uploaded_documents()
	{

		$this->commonData();

		$this->data['management'] = $this->Mprocessus->get_processus_by_category(1);
		$this->data['realisation'] = $this->Mprocessus->get_processus_by_category(2);
		$this->data['support'] = $this->Mprocessus->get_processus_by_category(3);
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/Uploaded_documents.php', $this->data);
		$this->load->view('Technical/Footer');
	}


	public function List_document_by_type()
	{

		$this->commonData();

		$this->data['processcategory'] = $_GET['processcategory'];

		//	$this->data['document_upload'] = $this->Mdocument->get_document_upload_by_ID_company($this->data['ID_company']);
		$this->data['processus'] = $this->Mprocessus->get_processus_by_category($this->data['processcategory']);
		if (isset($_GET['ID_processus'])) {
			$this->data['current_processus'] = $_GET['ID_processus'];
		} else {
			$this->data['current_processus'] = $this->data['processus'][0]['ID_processus'];
		}
		$this->data['processus_ID'] = $this->Mprocessus->get_processus_by_ID($this->data['current_processus']);
		$this->data['Title_processus'] = $this->data['processus_ID'][0]['Title_processus'];

		$this->data['document_upload'] = $this->Mdocument->get_document_upload_by_processus($this->data['current_processus']);

		$this->data['document_entete'] = $this->Mdocument_upload->get_document_entete_by_processus($this->data['current_processus']);
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/List_document_upload_by_type.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	/*public function Submit_Uploaded_documents()
	{

	
			/*************************Upload File*********************************/
	/*		if ($_FILES['File_document_upload']['name'] == "") {
				$insertfile = '';
			} else {


				$fileimg = $_FILES['File_document_upload']['name'];
				$extimg = substr(strrchr($fileimg, '.'), 1);
				$fileName = time();
				$fileTmpName = $_FILES['File_document_upload']['tmp_name'];
				$fileDestination = './uploads/Document_upload/' . $fileName . '.' . $extimg;
				move_uploaded_file($fileTmpName, $fileDestination);
				$insertfile = $fileName . '.' . $extimg;
			}
			/*********************End Upload File*********************************/

	/*		$this->data = array(
				'Name_document_upload' => $_POST['Name_document_upload'],
				'File_document_upload' => $insertfile,
				'code_document_upload' => 1,

			);


			$this->Mdocument->insert_document_upload($this->data);
		}
		return redirect(base_url() . 'Technical_Account/Uploaded_documents');
	}*/

	public function Form_add_document_upload()
	{
		$this->commonData();

		$this->data['ID_processus'] = $_GET['ID_processus'];
		$this->data['processcategory'] = $_GET['processcategory'];
		/********************Lists *****************/
		$this->data['type'] = $this->Mdocument_upload->get_doc_type();
		$this->data['chapter'] = $this->Mdocument_upload->get_function();
		$this->data['link'] = $this->Mdocument_upload->get_link_document_upload();

		/********************Lists *****************/

		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/Add_document_upload.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function Submit_add_document_upload()
	{

		//if ($_POST) {
		$this->data['ID_processus'] = $_POST['ID_processus'];
		$this->data['processcategory'] = $_POST['processcategory'];

		/************************Add - Update***************************************/


		/*************************Upload File*********************************/
		if ($_FILES['File_document_upload']['name'] == "") {
			$insertfile = '';
		} else {


			$fileimg = $_FILES['File_document_upload']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			$fileName = time();
			$fileTmpName = $_FILES['File_document_upload']['tmp_name'];
			$fileDestination = './uploads/Document_upload/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);
			$insertfile = $fileName . '.' . $extimg;
		}
		/*********************End Upload File*********************************/


		$this->data1 = array(

			'Name_document_upload' => $_POST['Name_document_upload'],
			'ID_doc' => $_POST['ID_doc'],
			'ID_processus' => $_POST['ID_processus'],
			'ID_function' => $_POST['ID_function'],
			'nbrpage_document_upload' => $_POST['nbrpage_document_upload'],
			'ID_link_document_upload' => $_POST['ID_link_document_upload'],
			'File_document_upload' => $insertfile,
			'code_document_upload' => $_POST['code_document_upload'],

		);
		if (isset($_POST['ID_document_upload'])) {
			$this->Mdocument_upload->edit_document_upload($this->data1, $_POST['ID_document_upload']);
		} else {
			/*************************Add******************************/
			$this->Mdocument_upload->add_document_upload($this->data1);
		}
		//}
		//echo print_r($this->data1);
		//die();
		return redirect(base_url() . 'Technical_Account/List_document_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);
	}
	public function Form_edit_document_upload()
	{
		$this->commonData();

		/********************Lists *****************/
		$this->data['type'] = $this->Mdocument_upload->get_doc_type();
		$this->data['chapter'] = $this->Mdocument_upload->get_function();
		$this->data['link'] = $this->Mdocument_upload->get_link_document_upload();

		/********************Lists *****************/

		if ($_GET) {
			//echo 'hi'; die();
			$this->data['ID_processus'] = $_GET['ID_processus'];
			$this->data['processcategory'] = $_GET['processcategory'];
			$this->data['ID_document_upload'] = $_GET['ID_document_upload'];
			$this->data['document_upload'] = $this->Mdocument_upload->get_document_upload_by_ID($this->data['ID_document_upload']);
			$this->data['Name_document_upload'] = $this->data['document_upload'][0]['Name_document_upload'];
			$this->data['ID_doc'] = $this->data['document_upload'][0]['ID_doc'];
			$this->data['ID_processus'] = $this->data['document_upload'][0]['ID_processus'];
			$this->data['ID_function'] = $this->data['document_upload'][0]['ID_function'];
			$this->data['nbrpage_document_upload'] = $this->data['document_upload'][0]['nbrpage_document_upload'];
			$this->data['ID_link_document_upload'] = $this->data['document_upload'][0]['ID_link_document_upload'];
			$this->data['File_document_upload'] = $this->data['document_upload'][0]['File_document_upload'];
			$this->data['code_document_upload'] = $this->data['document_upload'][0]['code_document_upload'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/Add_document_upload.php', $this->data);

		$this->load->view('Technical/Footer');
	}
	public function delete_document_upload()
	{

		$this->data['ID_processus'] = $_GET['ID_processus'];
		$this->data['processcategory'] = $_GET['processcategory'];
		$this->data['ID_document_upload'] = $_GET['ID_document_upload'];

		$this->Mdocument_upload->delete_document_upload($_GET['ID_document_upload']);

		return redirect(base_url() . 'Technical_Account/List_document_by_type?ID_processus=' . $this->data['ID_processus'] . '&processcategory=' . $this->data['processcategory']);
	}

	public function view_document_upload()
	{
		$this->commonData();

		if ($_GET) {
			$this->data['document_upload'] = $this->Mdocument_upload->get_document_upload_by_ID($_GET['ID_document_upload']);
			$this->data['document_version'] = $this->Mdocument_upload->get_document_upload_by_ID_version($_GET['ID_document_upload']);

			/*	echo "<pre>";
			echo print_r($this->data['document_upload']);
			echo "</pre>";
			die();*/
			$this->data['ID_document_upload'] = $this->data['document_upload'][0]['ID_document_upload'];
			$this->data['Name_document_upload'] = $this->data['document_upload'][0]['Name_document_upload'];
			$this->data['Code_doc_type'] = $this->data['document_upload'][0]['Code_doc_type'];
			$this->data['Type_doc'] = $this->data['document_upload'][0]['Type_doc'];
			$this->data['ID_processus'] = $this->data['document_upload'][0]['ID_processus'];
			$this->data['Prefix_processus'] = $this->data['document_upload'][0]['Prefix_processus'];
			$this->data['Title_processus'] = $this->data['document_upload'][0]['Title_processus'];
			$this->data['Name_function'] = $this->data['document_upload'][0]['Name_function'];
			$this->data['nbrpage_document_upload'] = $this->data['document_upload'][0]['nbrpage_document_upload'];
			$this->data['ID_link_document_upload'] = $this->data['document_upload'][0]['ID_link_document_upload'];
			$this->data['Title_link_document_upload'] = $this->data['document_upload'][0]['Title_link_document_upload'];
			$this->data['URL_link_document_upload'] = $this->data['document_upload'][0]['URL_link_document_upload'];
			$this->data['File_document_upload'] = $this->data['document_upload'][0]['File_document_upload'];
			$this->data['code_document_upload'] = $this->data['document_upload'][0]['code_document_upload'];
		}
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/view_document_upload.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	public function view_document_entete()
	{
		$this->commonData();

		if ($_GET) {

			$this->data['document_entete'] = $this->Mdocument_upload->get_document_entete_by_ID($_GET['ID_entete']);
		}
		$this->data['ID_entete'] = $this->data['document_entete'][0]['ID_entete'];
		$this->data['Title_entete'] = $this->data['document_entete'][0]['Title_entete'];
		$this->data['ID_processus'] = $this->data['document_entete'][0]['ID_processus'];
		$this->data['ID_doc'] = $this->data['document_entete'][0]['ID_doc'];
		$this->data['Order_doc_entete'] = $this->data['document_entete'][0]['Order_doc_entete'];
		$this->data['Version_doc_entete'] = $this->data['document_entete'][0]['Version_doc_entete'];
		$this->data['Type_entete'] = $this->data['document_entete'][0]['Type_entete'];
		$this->data['ID_function'] = $this->data['document_entete'][0]['ID_function'];
		$this->data['Title_link_doc_entete'] = $this->data['document_entete'][0]['Title_link_doc_entete'];
		$this->data['Type_doc'] = $this->data['document_entete'][0]['Type_doc'];
		$this->data['Code_doc_type'] = $this->data['document_entete'][0]['Code_doc_type'];
		$this->data['Name_function'] = $this->data['document_entete'][0]['Name_function'];
		$this->data['URL_function'] = $this->data['document_entete'][0]['URL_function'];
		$this->data['Title_processus'] = $this->data['document_entete'][0]['Title_processus'];
		$this->data['Prefix_processus'] = $this->data['document_entete'][0]['Prefix_processus'];
		$this->data['Order_doc_processus'] = $this->data['document_entete'][0]['Order_doc_processus'];
		$this->data['Version_doc_processus'] = $this->data['document_entete'][0]['Version_doc_processus'];


		//echo print_r($this->data['document_entete']);
		//die();
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/view_document_entete.php', $this->data);

		$this->load->view('Technical/Footer');
	}

	/*************************** Entet Document *************************/
	/********************************************************************/
	public function Report_enjeu()
	{

		$this->commonData();
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/Report_enjeu.php', $this->data);

		$this->load->view('Technical/Footer');
	}


	public function Report_interest()
	{

		$this->commonData();
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
		$this->load->view('Technical/Header');
		$this->load->view('Technical/Menu', $this->data);
		$this->load->view('Technical/Document_upload/Report_interest.php', $this->data);

		$this->load->view('Technical/Footer');
		/*************************Access Verif************************/
	}
}
