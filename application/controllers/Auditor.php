<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Auditor extends CI_Controller
{
	var $ID_company = 0;
	public $dept = 0;
	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mcompany');
		$this->load->database();
		$this->load->helper('url');
		$this->load->library(array('form_validation', 'session'));
		$this->load->helper(array('url', 'html', 'form'));
		$this->ID_company = 0;
		$this->load->library('grocery_CRUD');
	}
	public function commonData()
	{
		/********************** Session Control ***************************/
				if ($this->session->userdata('logged_in') !== TRUE) {
			redirect(base_url() . 'LoginAccount/login');
		}

		if (($this->session->userdata('logged_in') == TRUE) &&  ($this->session->userdata('type') != "Auditor")) {

			redirect(base_url() . 'LoginAccount/login');
		}
		/********************* End Session Control ************************/
	}
	public function _example_output($output = null)
	{
		$this->commonData();

		$this->load->view('Auditor/Index.php', (array) $output);
	}



	public function index()
	{
		$this->commonData();

		$this->_example_output((object) array('output' => '', 'js_files' => array(), 'css_files' => array()));
	}


	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************         Diagnostics       ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	public function Chapters()
	{
		$this->commonData();

		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_chapters');
		//$crud->required_fields('Titre');
		$crud->columns('Title_chapter', 'Name_chapter');
		$crud->display_as('Title_chapter', 'Chapter Number')->display_as('Name_chapter', 'Chapter Title');
		$crud->set_subject('auditquality_chapters');
		$crud->unset_clone();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Responses()
	{
		$this->commonData();

		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_responses');
		//$crud->required_fields('Titre');
		$crud->columns('ID_chapter', 'Date_response', 'year_response', 'ID_client');
		$crud->set_relation('ID_chapter', 'auditquality_chapters', '{Title_chapter} {Name_chapter}');
		$crud->set_relation('ID_question', 'auditquality_questions', '{Text_question}');

		$crud->display_as('Date_response', 'Response Date')->display_as('year_response', 'Response Year')->display_as('ID_chapter', 'Chapter Title');

		$crud->set_subject('auditquality_chapters');
		$crud->unset_clone();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}


	public function Subjects()
	{
		$this->commonData();

		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_subjects');
		//$crud->required_fields('Titre');
		$crud->columns('ID_chapter', 'Number_subject', 'Title_subject');
		$crud->set_relation('ID_chapter', 'auditquality_chapters', '{Title_chapter} {Name_chapter}');

		$crud->display_as('Title_subject', 'Subject Title')->display_as('Number_subject', 'Subject Number')->display_as('ID_chapter', 'Chapter Title');

		$crud->set_subject('auditquality_subjects');
		$crud->unset_clone();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Questions()
	{
		$this->commonData();

		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_questions');
		//$crud->required_fields('Titre');
		$crud->columns('Number_Question', 'ID_chapter', 'Text_question');
		$crud->set_relation('ID_chapter', 'auditquality_chapters', '{Title_chapter} {Name_chapter}');
		//	$crud->set_relation('ID_chapter', 'auditquality_subjects', '{Number_subject} {Title_subject}');
		$crud->set_relation('ID_subject', 'auditquality_subjects', '{Number_subject} {Title_subject}');
		$crud->display_as('Number_Question', 'Question Number')->display_as('Text_question', 'Question Text')->display_as('Name_chapter', 'Chapter Title')->display_as('Title_chapter', 'Chapter Number');
		$crud->set_subject('auditquality_questions');
		$crud->unset_clone();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}


	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************          Documents        ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	public function Documents_Types()
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_type');
		$crud->columns('Type_doc');
		$crud->display_as('Type_doc', 'Type of document');
		$crud->set_subject('auditquality_doc_type');
		$crud->unset_clone();
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();
		$this->_example_output($output);
	}


	public function Document()
	{


		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_version');
		$crud->columns('ID_document', 'Date_version', 'Number_version', 'ID_doc', 'Createdby_version', 'Revisedby_version', 'Validatedby_document_version');

		$crud->set_relation('ID_document', 'auditquality_document', '{Title_document}');
		$crud->set_relation('ID_doc', 'auditquality_doc_type', '{Type_doc}');
		//$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}');
		$crud->set_relation('Createdby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Revisedby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Validatedby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');


		$crud->display_as('ID_document', 'Document Title')
			->display_as('Date_version', 'Date')
			->display_as('Number_version', 'Version')
			->display_as('ID_doc', 'Type')
			->display_as('Createdby_version', 'Created by')
			->display_as('Revisedby_version', 'Revised by')
			->display_as('Validatedby_version', 'Validated by');
		$crud->set_subject('auditquality_doc_version');
		/********************** Code Document */
		//$crud->unset_fields('Code_document');


		//$crud->unset_fields('Version_document');
		//$this->var_alias= $Alias_department;
		$crud->callback_after_insert(array($this, 'Generate_code_document'));
		/****************** End Code Document */

	
		//$crud->add_action('All Request', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/clone.png', 'Auditor/All_request/', '');

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();

		$output = $crud->render();
		$this->_example_output($output);
	}

	function doc_by_department()
	{
		$this->commonData();
		$ID_company = 1;
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_department');
		$crud->columns('Name_department');
		$crud->add_action('Show documents', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Show_documents', '');
		$crud->display_as('Name_department', 'Department Name');
		$crud->set_subject('auditquality_department');
		$crud->unset_fields('ID_company');
		$this->ID_company = $ID_company;
		$crud->where('ID_company', $ID_company);
		$crud->unset_clone(); 		
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$crud->callback_after_insert(array($this, 'Combined_function'));
		$output = $crud->render();
		$this->_example_output($output);
	}
	public function Show_documents($ID_department)
	{


		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_version');
		$crud->columns('ID_document', 'Date_version', 'Number_version', 'ID_doc', 'Createdby_version', 'Revisedby_version', 'Validatedby_document_version');
		$crud->set_relation('ID_document', 'auditquality_document', '{Title_document}');
		$crud->set_relation('ID_doc', 'auditquality_doc_type', '{Type_doc}');
		$crud->set_relation('Createdby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Revisedby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Validatedby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->display_as('ID_document', 'Document Title')
			->display_as('Date_version', 'Date')
			->display_as('Number_version', 'Version')
			->display_as('ID_doc', 'Type')
			->display_as('Createdby_version', 'Created by')
			->display_as('Revisedby_version', 'Revised by')
			->display_as('Validatedby_version', 'Validated by');
		$crud->set_subject('auditquality_doc_version');
		$crud->where('ID_department', $ID_department);

		/********************** Code Document */

		$crud->callback_after_insert(array($this, 'Generate_code_document'));
		/****************** End Code Document */

		$crud->unset_clone();
		
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();

		$output = $crud->render();
		$this->_example_output($output);
	}
	function create_request_from_document()
	{
		$this->commonData();
		$create = 0;
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('Description_requests');
		//	$crud->set_relation('Createdby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		//	$crud->set_relation('Validatedby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		//	$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('Description_requests', 'Request Description');
		$crud->set_subject('auditquality_doc_requests');
		/********************** Code Document */
		$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee', 'Createdby_requests', 'Validatedby_requests');
		$crud->where('Type_requests', $create);
		//	$crud->where('ID_document', $ID_document);

		$crud->callback_after_insert(array($this, 'Create_request_values'));
		/****************** End Code Document */

		$crud->unset_clone();
		
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_add();

		$output = $crud->render();
		$this->_example_output($output);
	}

	function Generate_code_document($post_array, $ID_document)
	{
		//echo $ID_document;
		//die();
		$this->commonData();

		$var_alia = $this->Mcompany->Get_department_by_document($ID_document);
		$var_version = $this->Mcompany->Get_version_by_document($ID_document);

		//echo print_r($var_version);
		$year =  date('Y');
		$code = '';
		$ID = $ID_document;
		$code = $var_alia . $year . $var_version . '-' . $ID;
		$this->Mcompany->edit_code_document($ID_document, $code);

		//echo $code;
		//die();
	}

	function Delete_request($ID_document)
	{
		$this->commonData();
		$ID_employee = 0;
		$data = array(

			'Type_requests' => 2,
			'Description_requests' => 'delete request',
			'Date_requests' => date('Y-m-d H:i:s'),
			'Status_requests' => 0,
			'ID_document' => $ID_document,
			'ID_employee' => $ID_employee,
		);
		$this->Mcompany->Send_delete_request($data);
		$this->load->view('Auditor/Delete_request.php');
	}

	function Update_request($ID_document)
	{
		$this->commonData();
		$updated = 1;
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('Description_requests');
		//	$crud->set_relation('Createdby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		//	$crud->set_relation('Validatedby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('Description_requests', 'Request Description');
		$crud->set_subject('auditquality_doc_requests');
		/********************** Code Document */
		$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee', 'Createdby_requests', 'Validatedby_requests');
		$crud->where('Type_requests', $updated);
		$crud->where('ID_document', $ID_document);

		$crud->callback_after_insert(array($this, 'Update_request_values'));
		/****************** End Code Document */

		$crud->unset_clone();
		
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);

		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//redirect(base_url() . 'Auditor/Update_request/'.$ID_document.'/add');
	}

	function Create_request($ID_document)
	{
		$this->commonData();
		$created = 0;
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('Description_requests');
		$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('Description_requests', 'Request Description');
		$crud->set_subject('auditquality_doc_requests');
		/********************** Code Document */
		$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee');
		$crud->where('Type_requests', $created);
		$crud->where('ID_document', $ID_document);

		$crud->callback_after_insert(array($this, 'Update_request_values'));
		/****************** End Code Document */

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);

		//!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
		//redirect(base_url() . 'Auditor/Update_request/'.$ID_document.'/add');
	}



	function Update_request_values($post_array, $ID_requests)
	{
		$this->commonData();
		$ID_employee = 0;
		$Type_requests = 1;
		$Date_requests = date('Y-m-d H:i:s');
		$Status_requests = 0;
		$ID_document = $this->ID_document_for_update_request;
		$ID_employee = $ID_employee;

		$this->Mcompany->Send_update_request($Type_requests, $Date_requests, $Status_requests, $ID_document, $ID_employee, $ID_requests);
		$this->load->view('Auditor/Delete_request.php');
	}

	function Create_request_values($post_array, $ID_requests)
	{
		$this->commonData();
		$ID_employee = 0;
		$Type_requests = 0;
		$Date_requests = date('Y-m-d H:i:s');
		$Status_requests = 0;
		$ID_document = 0;
		$ID_employee = $ID_employee;

		$this->Mcompany->Send_update_request($Type_requests, $Date_requests, $Status_requests, $ID_document, $ID_employee, $ID_requests);
		$this->load->view('Auditor/Delete_request.php');
	}

	function All_request($ID_document)
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('Description_requests');
		$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('Description_requests', 'Request Description');
		$crud->set_subject('auditquality_doc_requests');
		/********************** Code Document */
		$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee');
		$crud->where('ID_document', $ID_document);

		$crud->callback_after_insert(array($this, 'Update_request_values'));
		/****************** End Code Document */

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);

		//redirect(base_url() . 'Auditor/Update_request/'.$ID_document.'/add');
	}


	/************************************************************************************************ */
	function List_Requests()
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('Description_requests');
		$crud->where('Validatedby_requests =' . 0);
		//$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('Description_requests', 'Request Description');
		$crud->set_subject('auditquality_doc_requests');
		$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee');

		$crud->callback_after_insert(array($this, 'Update_request_values'));



		/*********************** if accepted, if refused  ***************/
		/*********************** .......................  ***************/




		$crud->add_action('Accept', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/accept.png', 'Auditor/Accept_request/', '');
		$crud->add_action('Refuse', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/refuse.png', 'Auditor/Refuse_request/', '');

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);

		//redirect(base_url() . 'Auditor/Update_request/'.$ID_document.'/add');
	}




	/************************Accept Request ***********************************/


	function Accept_request($ID_requests)
	{
		$this->commonData();

		$Validatedby_requests = 1;
		//	echo $ID_requests;
		//	die();

		/******* INSERT INTO TABLE DOCUMENT !!!!!!!!!!!!!!!!!!!!!!! */

		$this->Mcompany->Send_accept_request($Validatedby_requests, $ID_requests);
		redirect(base_url() . 'Auditor/List_Requests');
	}

	/************************Refuse Request ***********************************/

	function Refuse_request($ID_requests)
	{
		$this->commonData();

		$Validatedby_requests = -1;

		$this->Mcompany->Send_accept_request($Validatedby_requests, $ID_requests);
		redirect(base_url() . 'Auditor/List_Requests');
	}

	/*************************************Documents after requests *******************************/

	public function Document_Status()
	{

		$this->load->view('Auditor/Requests_status');
	}
	public function Document_Status_update()
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_requests');
		$crud->columns('ID_document', 'ID_document', 'Createdby_document', 'Validatedby_document', 'Description_requests');
		$crud->set_relation('ID_document', 'auditquality_document', '{Title_document}{Code_document}');
		$crud->set_relation('Createdby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Validatedby_requests', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		if (isset($_POST['create'])) {
			$crud->where('Type_requests', 0);
			$crud->where('Validatedby_requests!=' . 0);
			$crud->where('Validatedby_requests!=' . -1);
			$crud->add_action('Update', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/edit.png', 'Auditor/Add_Document', '');
			//$crud->add_action('Update', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/edit.png', '', '', array($this, 'Add_Document_action'));
			$crud->set_subject('auditquality_doc_requests');
		}
		if (isset($_POST['update'])) {
			$crud->where('Type_requests', 1);
			$crud->where('Validatedby_requests!=' . 0);
			$crud->where('Validatedby_requests!=' . -1);
			$crud->add_action('Update', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/edit.png', 'Auditor/Update_Document', '');
			$crud->set_subject('auditquality_doc_requests');
		}
		if (isset($_POST['delete'])) {
			$crud->where('Type_requests', 2);
			$crud->where('Validatedby_requests!=' . 0);
			$crud->where('Validatedby_requests!=' . -1);
			$crud->add_action('Update', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/edit.png', 'Auditor/Deleted_Document', '');
			$crud->set_subject('auditquality_doc_requests');
		}

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();



		$output = $crud->render();
		$this->_example_output($output);
	}

	function Update_Document($ID_request)
	{
		$ID_document = $this->Mcompany->get_request_by_ID($ID_request);

		$this->data['doc_info'] = $this->Mcompany->get_document_last_Version($ID_document);
		$data['ID_document'] = $this->data['doc_info'][0]['ID_document'];
		//$data['Title_document'] = $this->data['doc_info'][0]['Title_document'];
		$data['File_version'] = $this->data['doc_info'][0]['File_version'];
		$data['ID_doc'] = $this->data['doc_info'][0]['ID_doc'];
		$data['type'] = $this->Mcompany->get_type_doc();

		//echo $Title_document.$File_document.$Type_doc;
		//echo print_r($this->data['type']);

		//die();
		$this->load->view('Auditor/Update_Document', $data);
	}

	function Add_Document($ID_request)
	{
		$data['type'] = $this->Mcompany->get_type_doc();

		$this->load->view('Auditor/Add_Document', $data);
	}


	function Add_Document_action($ID_request)
	{

		//$crud->where('Validatedby_requests!=' . 0);
		//$crud->where('Validatedby_requests!=' . -1);


		$data['type'] = $this->Mcompany->get_type_doc();
		$data['req'] = $this->Mcompany->get_request_by_ID_all($ID_request);
		$Validatedby_requests = $data['req'][0]['Validatedby_requests'];
		$Validatedby_requests = $data['req'][0]['Validatedby_requests'];

		if (($Validatedby_requests != 0) || ($Validatedby_requests != -1)) {
			return site_url('Auditor/Add_Document', $data);
		} else {
			return site_url('');
		}
	}



	function submit_update_doc()
	{
		if ($_POST) {
			$this->data['doc_info'] = $this->Mcompany->get_document_last_Version($_POST['ID_document']);


			$fileimg = $_FILES['File_version']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			//   echo $extimg; die();
			$fileName = time();
			$fileTmpName = $_FILES['File_version']['tmp_name'];
			$fileDestination = './uploads/file/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);

			$testimg = $_FILES['File_version']['name'];

			if ($testimg == null) {
				$File_version = $this->data['doc_info'][0]['File_version'];;
			} else {
				$File_version = $fileName . '.' . $extimg;
			}


			$this->Mcompany->add_document_version(
				array(

					"File_version"	=> $File_version,
					"Date_version"	=> date('Y-m-d h:i:s'),
					"Number_version"  => $this->data['doc_info'][0]['Number_version'] + 1,
					"Createdby_version"	=> 1,
					"Revisedby_version"	=> 0,
					"Validatedby_version"	=> 0,
					"ID_doc" => $_POST['ID_doc'],
					"ID_document" => $this->data['doc_info'][0]['ID_document'],
				)
			);
		}
		return redirect(base_url() . 'Auditor/Document_Status');
	}

	function submit_add_doc()
	{
		if ($_POST) {
			//$this->data['doc_info'] = $this->Mcompany->get_document_last_Version($_POST['ID_document']);


			$fileimg = $_FILES['File_version']['name'];
			$extimg = substr(strrchr($fileimg, '.'), 1);
			//   echo $extimg; die();
			$fileName = time();
			$fileTmpName = $_FILES['File_version']['tmp_name'];
			$fileDestination = './uploads/file/' . $fileName . '.' . $extimg;
			move_uploaded_file($fileTmpName, $fileDestination);

			$testimg = $_FILES['File_version']['name'];

			if ($testimg == null) {
				$File_version = 'default.jpg';
			} else {
				$File_version = $fileName . '.' . $extimg;
			}


			//$last_code=$this->Mcompany->get_last_code_doc();


			$IDnew_doc = $this->Mcompany->add_document_new(
				array(

					"Title_document"	=> $_POST['Title_document'],
					"ID_department"  => 1,

				)
			);

			$this->Mcompany->add_document_version(
				array(

					"File_version"	=> $File_version,
					"Date_version"	=> date('Y-m-d h:i:s'),
					"Number_version"  => 0,
					"Createdby_version"	=> 1,
					"Revisedby_version"	=> 0,
					"Validatedby_version"	=> 0,
					"ID_doc" => $_POST['ID_doc'],
					"ID_document" => $IDnew_doc,
				)
			);
		}

		/*********************code doc */
		$var_alia = $this->Mcompany->Get_department_by_document($IDnew_doc);
		$var_version = $this->Mcompany->Get_version_by_document($IDnew_doc);

		//echo print_r($var_version);
		$year =  date('Y');
		$code = '';
		$ID = $IDnew_doc;
		$code = $var_alia . $year . $var_version . '-' . $ID;
		$this->Mcompany->edit_code_document($IDnew_doc, $code);
		/***************** end code doc */



		return redirect(base_url() . 'Auditor/Document_Status');
	}


	function Document_validation()
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_doc_version');
		$crud->set_relation('ID_document', 'auditquality_document', '{Title_document}{Code_document}');
		$crud->set_relation('Createdby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('Validatedby_version', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		$crud->columns('File_version', 'Number_version', 'ID_document');
		$crud->where('Validatedby_version =' . 0);
		//$this->ID_document_for_update_request = $ID_document;
		$crud->display_as('File_version', 'File')
			->display_as('ID_document', 'Document')
			->display_as('Number_version', 'Number');

		$crud->set_subject('auditquality_doc_version');
		//$crud->unset_fields('ID_requests', 'Type_requests', 'Date_requests', 'Status_requests', 'ID_document', 'ID_employee');
		$crud->set_field_upload('File_version', 'uploads/file');

		$crud->callback_after_insert(array($this, 'Update_document_validation_values'));

		$crud->add_action('Accept', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/accept.png', 'Auditor/Accept_document/', '');
		$crud->add_action('Refuse', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/refuse.png', 'Auditor/Refuse_document/', '');

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);

		//redirect(base_url() . 'Auditor/Update_request/'.$ID_document.'/add');
	}



	/************************Accept doc ***********************************/


	function Accept_document($ID_version)
	{
		$this->commonData();

		$Validatedby_document = 1;
		//	echo $ID_document;
		//	die();

		/******* INSERT INTO TABLE DOCUMENT !!!!!!!!!!!!!!!!!!!!!!! */

		$this->Mcompany->Send_accept_document($Validatedby_document, $ID_version);
		redirect(base_url() . 'Auditor/Document_validation');
	}

	/************************Refuse document ***********************************/

	function Refuse_document($ID_version)
	{
		$this->commonData();

		$Validatedby_document = -1;

		$this->Mcompany->Send_accept_document($Validatedby_document, $ID_version);
		redirect(base_url() . 'Auditor/Document_validation');
	}


	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************          Requests         ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/



	function Requests()
	{
		$this->load->view('Auditor/Requests');
	}




	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************      Internal Audit       ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function Intern_audit()
	{
		$this->commonData();
		$ID_company = 1;
		//$this->session->userdata('ID_company')=$ID_company;
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_intern_audit');
		$crud->columns('Responsable_audit', 'Mission_audit', 'Date_audit', 'Result_audit', 'ID_department');
		$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}');
		$crud->set_relation('Responsable_audit', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		//$crud->add_action('Audit Date', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Audit_date', '');
		$crud->add_action('Audit Actors', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Audit_actor', '');
		$crud->add_action('Non conformities', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Audit_non_conformities', '');

		$crud->display_as('Responsable_audit', 'Audit Responsable')
			->display_as('Mission_audit', 'Audit Mission')
			->display_as('Date_audit', 'Audit Date')
			->display_as('Result_audit', 'Audit Result')
			->display_as('ID_department', 'Department');
		$crud->set_subject('auditquality_intern_audit');
		//$crud->unset_fields('ID_company');
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();

		$output = $crud->render();

		$this->_example_output($output);
	}


	/*function Audit_date($ID_audit)
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_date');
		$crud->columns('Audit_date');
		$crud->display_as('Audit_date', 'Audit Date');
		$crud->set_subject('auditquality_date');
		$crud->unset_fields('ID_audit');
		$crud->where('ID_audit', $ID_audit);
		$crud->callback_after_insert(array($this, 'Update_audit_for_date'));
		$this->id_audit_for_date = $ID_audit;
		$crud->unset_clone();
		$output = $crud->render();
		$this->_example_output($output);
	}*/


	function Update_audit_for_date($post_array, $ID_date)
	{
		$this->commonData();
		$ID_audit = $this->id_audit_for_date;


		$this->Mcompany->Send_update_for_date($ID_audit, $ID_date);
		$this->load->view('Auditor/Delete_request.php');
	}


	function Audit_actorlll($ID_audit)
	{

		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_actor');
		$crud->columns('ID_employee');
		$crud->set_relation('ID_employee', 'auditquality_employee', '{Name_employee}{Lastname_employee}');

		$crud->display_as('ID_employee', 'Audit Participants');
		$crud->set_subject('auditquality_actor');
		$crud->unset_fields('ID_audit');
		//	$crud->where('ID_audit', $ID_audit);
		//		$crud->callback_after_insert(array($this, 'Update_audit_for_actor'));
		//	$this->id_audit_for_actor = $ID_audit;

		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		//$crud->unset_view();

		$output = $crud->render();
		$this->_example_output($output);
	}


	function Audit_actor($ID_audit)
	{

		$this->commonData();

		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_actor');
		$crud->columns('ID_actor', 'ID_employee', 'ID_audit');
		$crud->display_as('ID_employee', 'Audit Participants');
		$crud->set_subject('auditquality_actor');

		$crud->unset_clone();

		//$crud->unset_view();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();
		$this->_example_output($output);
	}


	function Audit_non_conformities($ID_audit)
	{
		/*	$data = array(

			'Audit_date' => date('Y-m-d H:i:s'),
			'ID_audit' => $ID_audit,
		);
		$this->Mcompany->edit_date_audit($data);*/
		$this->commonData();
		$crud = new grocery_CRUD();
		$crud->set_table('auditquality_non_conformity');
		$crud->columns('Title_non_conformity', 'Description_non_conformity', 'Degree_non_conformity', 'ID_audit');
		//$crud->display_as();
		$crud->set_subject('auditquality_non_conformity');
		$crud->unset_fields('ID_audit');
		$crud->where('ID_audit', $ID_audit);
		$crud->callback_after_insert(array($this, 'Update_audit_for_non_conformity'));
		$this->id_audit_for_non_conformity = $ID_audit;
		/****************** End Code Document */

		$crud->unset_clone();

		//$crud->unset_view();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();
		$this->_example_output($output);
	}


	function Update_audit_for_non_conformity($post_array, $ID_non_conformity)
	{
		$this->commonData();
		$ID_audit = $this->id_audit_for_non_conformity;


		$this->Mcompany->Send_update_for_actor($ID_audit, $ID_non_conformity);
		$this->load->view('Auditor/Delete_request.php');
	}



	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************     Posts & Skills        ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/
	public function IDCompany_skill($post_array)
	{
		$post_array['ID_department'] = $this->dept;
		return $post_array;
	}

	public function Skills()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_skills');
		$crud->columns('Name_skill');
		$crud->display_as('Name_skill', 'Skill');
		$crud->set_subject('auditquality_skills');
		$crud->unset_fields('ID_skill');
		$crud->unset_clone();

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Posts()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_posts');
		$crud->columns('Name_post', 'Description_post');
		//	$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}', 'ID_company=' . $this->session->userdata('ID_company'));
		//	$crud->where('ID_company', $this->session->userdata('ID_company'));
		//	$crud->add_action('Add Skill', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/add_Skill', '');
		//	$crud->display_as('Name_post', 'Post')->display_as('ID_department', 'Department Name');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_posts');
		$crud->unset_fields('ID_post');
		$crud->unset_clone();
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();

		$output = $crud->render();

		$this->_example_output($output);
	}

	/*	function add_Skill($ID_post)
	{
		$this->commonData();
		$this->$ID_post = $ID_post;
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_skills_management');
		$crud->columns('ID_skill');
		$crud->set_relation('ID_skill', 'auditquality_skills', '{Name_skill}');
		//$crud->where('auditquality_skills.ID_post', $ID_post);
		$crud->display_as('ID_skill', 'Skill');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_skills_management');
		//$this->ID_post_for_skill = $ID_management ;
		$crud->unset_fields('ID_post');
		$crud->unset_clone();
		$crud->callback_after_insert(array($this, 'Skill_for_post'));


		$output = $crud->render();

		$this->_example_output($output);
	}*/

	function add_Position()
	{
		$this->commonData();
		//$this->$ID_post = $ID_post;
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_skills_management');
		$crud->columns('ID_post', 'ID_skill', 'Weight_skill');
		$crud->set_relation('ID_skill', 'auditquality_skills', '{Name_skill}');
		$crud->set_relation('ID_post', 'auditquality_posts', '{Name_post}');
		$crud->display_as('ID_skill', 'Skill');
		$crud->set_subject('auditquality_skills_management');
		$crud->unset_clone();
		$crud->callback_after_insert(array($this, 'Skill_for_post'));
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}
	public function Skill_for_post($post_array)
	{
		$this->commonData();
		//echo $this->ID_post_for_skill;

		//$ID_skill_new = $ID_skill;
		echo $post_array['ID_management'];
		//$ID_skill_new = implode("','", $ID_skill);
		//echo $ID_skill_new;
		//echo print_r($this->ID_skill) ;
		//die();

		//$this->Mcompany->edit_Skill_for_post($this->ID_post_for_skill,$ID_skill_new);

		//	echo print_r($data); die();
		//return redirect(base_url() . 'Auditor/Access/' . $ID_department);
	}

	/**************************************************************newwwwwwwww *******************/
	function add_Position_to_department($ID_department)
	{

		$this->commonData();
		//$this->$ID_post = $ID_post;
		//echo $ID_Post ; die(); 
		$crud = new grocery_CRUD();
		$this->ID_Post_for_position_dep = $ID_department;
		$crud->set_table('auditquality_department_post');
		$crud->columns('ID_post');
		$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}');
		$crud->set_relation('ID_post', 'auditquality_posts', '{Name_post}');
		//echo $ID_department; die();
		$crud->where('auditquality_department_post.ID_department', $ID_department);
		//$crud->display_as('ID_department', 'Department');
		$crud->display_as('ID_post', 'Position');
		$crud->set_subject('auditquality_department_post');
		$crud->unset_clone();
		$crud->unset_add_fields('ID_department');
		$crud->callback_after_insert(array($this, 'Department_for_position'));
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Department_for_position($post_array, $ID_department_post)
	{
		$this->commonData();

		$this->Mcompany->edit_Department_for_position($ID_department_post, $this->ID_Post_for_position_dep);
	}


	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************   Organizational Chart    ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/

	function department(/*$ID_company*/)
	{
		$this->commonData();
		$ID_company = 1;
		//$this->session->userdata('ID_company')=$ID_company;
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_department');
		//$crud->required_fields('Titre');
		$crud->columns('Name_department');
		$crud->add_action('Access Management', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Access', '');
		$crud->add_action('New Position', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/add_Position_to_department', '');
		$crud->add_action('Employees', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/Employees', '');
		$crud->add_action('Director', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/director.png', 'Auditor/Director', '');

		//$crud->set_relation('', 'auditquality_company', '{} {}');
		$crud->display_as('Name_department', 'Department Name');
		$crud->set_subject('auditquality_department');
		$crud->unset_fields('ID_company');
		$this->ID_company = $ID_company;
		//$this->ID_department = $ID_department;

		$crud->where('ID_company', $ID_company);
		$crud->unset_clone();
		$crud->callback_after_insert(array($this, 'Combined_function'));

		/*$crud->callback_after_insert(array($this, 'AddAccess'));
			$crud->callback_after_insert(array($this, 'encrypt_password_department'));
			$crud->callback_after_insert(array($this, 'selected_company'));*/
			$crud->unset_delete();
			$crud->unset_edit();
			$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}


	/****************************** Action Director === Department *********************/
	/***********************************************************************************/
	function Director($ID_department)
	{
		$ID_company = 1;
		$data['ID_department'] = $ID_department;
		$data['employee'] = $this->Mcompany->get_employee_by_company($ID_company);
		$this->load->view('Auditor/Affect_director', $data);
	}

	function submit_affect_director()
	{
		if ($_POST) {

			$ID_department = $_POST['ID_department'];
			$Director_department = $_POST['ID_employee'];
			//echo $ID_department;
			//echo $Director_department;
			//die();
			$this->Mcompany->Edit_director_to_department($ID_department, $Director_department);

			return redirect(base_url() . 'Auditor/Department/');
		}
	}

	/****************************** Action Director === Department *********************/
	/***********************************************************************************/



	/**************************  Employee to department ********************************/
	/***********************************************************************************/

	function Employees($ID_department)
	{
		$this->commonData();
		$ID_company = 1;
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_employee');
		$crud->columns('Name_employee', 'Lastname_employee', 'Phone_employee', 'Email_employee', 'ID_department_post');
		$crud->set_relation('ID_post', 'auditquality_posts', '{Name_post}', 'auditquality_posts.ID_department=' . $ID_department);

		//$crud->set_relation('ID_department_post', 'auditquality_department_post', '{ID_post}');

		//$crud->set_relation_n_n('Name_post','auditquality_department_post', 'auditquality_posts', 'ID_post','ID_post','Name_post', 'auditquality_department_post.ID_department=' . $ID_department);

		$crud->add_action('Skills', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Skill_employee', '');
		$crud->display_as('Name_employee', 'Employee Name')
			->display_as('Lastname_employee', 'Lastname')
			->display_as('Phone_employee', 'Phone')
			->display_as('Email_employee', 'Email');

		$crud->set_subject('auditquality_employee');
		$crud->unset_fields('ID_department_post');
		//$this->ID_company = $ID_company;
		$crud->where('auditquality_employee.ID_department_post', $ID_department);
		$crud->unset_clone();
		//$crud->callback_after_insert(array($this, 'Combined_function'));

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}



	/***********************************************************************************/
	/***********************************************************************************/



	/********************************  Employee  ***************************************/
	/***********************************************************************************/

	function Employee()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_employee');
		$crud->columns('Name_employee', 'Lastname_employee', 'Phone_employee', 'Email_employee', 'ID_department_post');
		//$crud->set_relation('ID_post', 'auditquality_posts', '{Name_post}');

		$crud->add_action('Department & Position', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/Access.png', 'Auditor/Department_position', '');

		$crud->display_as('Name_employee', 'Employee Name')
			->display_as('Lastname_employee', 'Lastname')
			->display_as('Phone_employee', 'Phone')
			->display_as('Email_employee', 'Email');

		$crud->set_subject('auditquality_employee');
		$crud->unset_fields('ID_department_post');
		$crud->unset_clone();
		$crud->unset_fields('ID_post', 'ID_department_post');
		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}


	public function Department_position($ID_employee)
	{
		$this->commonData();
		$ID_company = 1;
		$data['ID_employee'] = $ID_employee;
		$data['department'] = $this->Mcompany->Department_by_Company($ID_company);
		$data['position'] = $this->Mcompany->Get_position_by_company($ID_company);
		/*if ($_POST) {
			if ($_POST['ID_department']) {
				$data['department_is_selected'] = 1;
				$data['newID_department'] = $_POST['ID_department'];
				//echo $data['newID_department']  ; die();
				$this->load->view('Auditor/Department_position', $data);
			} else {
				if ($_POST['newID_department']) {
					//echo 'hii';
					$data['post_is_selected'] = 1;
					$data['newID_post'] = $_POST['ID_post'];
					$data['newID_department'] = $_POST['newID_department'];
					return redirect(base_url() . 'Auditor/submit_department_position/?ID_department=' . $data['newID_department'] . '&ID_post=' . $data['newID_post'] . '$ID_director=' . $data['ID_employee']);
				}
			}
		} else {
			$this->load->view('Auditor/Department_position', $data);
		}*/
		//echo "<pre>" ; echo print_r($data['position']) ; echo "<pre>"; die();

		$this->load->view('Auditor/Department_position', $data);
	}

	public function Position_department()
	{
		$this->commonData();
		$ID_company = 1;
		$data['ID_employee'] = $_POST['ID_employee'];
		$data['ID_department'] = $_POST['ID_department'];

		$data['department'] = $this->Mcompany->Department_by_Company($ID_company);
		$data['position'] = $this->Mcompany->Get_position_by_department($ID_company, $data['ID_department']);


		$this->load->view('Auditor/Position_department', $data);
	}


	function submit_department_position()
	{

		$ID_department = $_POST['ID_department'];
		$ID_position = $_POST['ID_post'];
		$ID_employee = $_POST['ID_employee'];

		//echo 'welcome finally';
		//die();
		$data =
			array(
				"ID_department" => $ID_department,
				"ID_post" => $ID_position,
			);

		$newID_department_post = $this->Mcompany->edit_department_position($data);
		$this->Mcompany->edit_department_position_for_employee($newID_department_post, $ID_employee);


		return redirect(base_url() . 'Auditor/Employee');
	}
	/***********************************************************************************/
	/***********************************************************************************/



	public function Combined_function($post_array, $ID_department)
	{
		$this->commonData();
		/*********************************1 */

		$this->data['pwd'] = $this->Mcompany->get_password_department($ID_department);
		$Password_department = $this->data['pwd'][0]['Password_department'];
		$newpwd = md5($Password_department);
		//echo $newpwd ; die();
		$this->Mcompany->edit_password_encrypt($newpwd, $ID_department);

		/*********************************2 */

		$this->commonData();

		//echo "hiiiii";die();

		$this->Mcompany->edit_company($this->ID_company, $ID_department);

		/*********************************3 */



		$data['chapterlist'] = $this->Mcompany->get_chapters_all();
		$countchapters = $this->Mcompany->getcountchapters();
		//   echo $countchapters;
		//  die();
		$n = $countchapters - 1;
		for ($i = 0; $i < $n + 1; $i++) {
			$data['chapterlist'] = $this->Mcompany->get_chapters_all();
			$newIDchapter = $data['chapterlist'][$i]['ID_chapter'];
			//     echo $newIDchapter;
			//    die();                     /*	
			$this->Mcompany->AddAccess(array(
				"ID_company" => $this->ID_company,
				"ID_department" => $ID_department,
				"ID_chapter" => $newIDchapter,
				"ID_status" => 0

			));
		}
	}

	public function Access($ID_department)
	{
		$this->commonData();

		$data['department'] = $this->Mcompany->get_department_by_ID($ID_department);
		$data['Name_department'] = $data['department'][0]['Name_department'];

		$data['chap'] = $this->Mcompany->get_chapters_with_status($ID_department);
		//echo "<pre>";print_r($data['chap']);"<pre>"; die();

		$data['status'] = $this->Mcompany->get_status_all();
		//echo print_r($data['status']); die();

		$data['quest'] = $this->Mcompany->get_access_bydepartment($ID_department);

		$this->load->view('Accessform', $data);
	}

	public function edit_access()
	{
		$this->commonData();

		if (isset($_POST)) {

			$ID_status = $_POST['ID_status'];
			$ID_access = $_POST['ID_access'];
			$ID_department = $_POST['ID_department'];

			//echo $ID_status.'//'.$ID_access;
			//die();
			$this->Mcompany->edit_access_status($ID_access, $ID_status);
		}
		//	echo print_r($data); die();
		return redirect(base_url() . 'Auditor/Access/' . $ID_department);
	}

	public function AddAccess($post_array, $primary_key)
	{
		$this->commonData();

		$data['chapterlist'] = $this->Mcompany->get_chapters_all();
		$countchapters = $this->Mcompany->getcountchapters();
		//   echo $countchapters;
		//  die();
		$n = $countchapters - 1;
		for ($i = 0; $i < $n + 1; $i++) {
			$data['chapterlist'] = $this->Mcompany->get_chapters_all();
			$newIDchapter = $data['chapterlist'][$i]['ID_chapter'];
			//     echo $newIDchapter;
			//    die();                     /*	
			$this->Mcompany->AddAccess(array(
				"ID_company" => $this->ID_company,
				"ID_department" => $primary_key,
				"ID_chapter" => $newIDchapter,
				"ID_status" => 0

			));
		}
	}

	/****************************************************************************************************/
	/****************************************************************************************************/
	/**********************************     Risks & Actions       ***************************************/
	/****************************************************************************************************/
	/****************************************************************************************************/


	public function type_action()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_type');
		$crud->columns('Title_type');
		//$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}', 'ID_company=' . $this->session->userdata('ID_company'));
		//$crud->where('ID_company', $this->session->userdata('ID_company'));
		//$crud->add_action('Add Skill', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/add_Skill', '');
		$crud->display_as('Title_type', 'Action Type');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_type');
		//$crud->unset_fields('ID_type');
		$crud->unset_clone();

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Action()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_action');
		$crud->columns('Title_action', 'Date_action', 'Result_action', 'ID_employee', 'ID_type');
		$crud->set_relation('ID_employee', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('ID_type', 'auditquality_type', '{Title_type}');
		//$crud->add_action('Add Skill', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/add_Skill', '');
		$crud->display_as('ID_employee', 'Responsable')->display_as('ID_type', 'Risk Type');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_action');
		//$crud->unset_fields('ID_action');
		$crud->unset_clone();

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	public function Risk()
	{
		$this->commonData();
		$crud = new grocery_CRUD();

		$crud->set_table('auditquality_risk');
		$crud->columns('ID_risk', 'Title_risk', 'Description_risk', 'ID_department', 'ID_type');
		$crud->set_relation('ID_department', 'auditquality_department', '{Name_department}');
		$crud->set_relation('ID_type', 'auditquality_type', '{Title_type}');
		$crud->add_action('Actions for Risk', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/form.png', 'Auditor/Action_risk', '');
		$crud->display_as('ID_department', 'Department')->display_as('ID_type', 'Action to do');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_risk');
		//$crud->unset_fields('ID_risk');
		$crud->unset_clone();

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}


	public function Action_risk($ID_risk)
	{
		$this->commonData();
		$crud = new grocery_CRUD();
		//echo 'ID_risk=' . $ID_risk;
		//die();
		$crud->set_table('auditquality_action');
		$crud->columns('Title_action', 'Date_action', 'Result_action', 'ID_employee', 'ID_type', 'ID_risk');
		$crud->set_relation('ID_risk', 'auditquality_risk', '{Title_risk}');
		$crud->set_relation('ID_employee', 'auditquality_employee', '{Name_employee}{Lastname_employee}');
		$crud->set_relation('ID_type', 'auditquality_type', '{Title_type}');
		$crud->where('auditquality_action.ID_risk', $ID_risk);


		//$crud->add_action('Add Skill', base_url() . '/assets/grocery_crud/themes/flexigrid/css/images/skill.png', 'Auditor/add_Skill', '');
		//$crud->display_as('ID_employee', 'Responsable')->display_as('ID_type', 'Risk Type');
		//echo $this->session->userdata('ID_company'); die();
		$crud->set_subject('auditquality_action');
		$crud->unset_fields('ID_risk');
		$crud->callback_after_insert(array($this, 'action_for_risk'));
		$this->newID = $ID_risk;
		$crud->unset_clone();

		$crud->unset_delete();
		$crud->unset_edit();
		$crud->unset_add();
		$output = $crud->render();

		$this->_example_output($output);
	}

	function action_for_risk($post_array, $ID_action)
	{
		//echo $this->newID;
		//echo $ID_action;
		//die();
		$this->commonData();

		//$this->data['pwd'] = $this->Mcompany->get_password_department($ID_risk);
		//$Password_department = $this->data['pwd'][0]['Password_department'];
		//$newpwd = md5($Password_department);
		//echo $newpwd ; die();
		$this->Mcompany->edit_risk_ID($this->newID, $ID_action);
	}
}
