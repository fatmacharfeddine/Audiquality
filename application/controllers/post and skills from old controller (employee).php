
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
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill()
	{
		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
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
			} else {

				$this->data['skills'] = $this->Mskill->get_skills_paging($page);
			}
			$this->data['nb'] = $this->Mskill->get_skills_nb_page();

			/******************End Paging******************************/
			//	$this->data['skills'] = $this->Mskill->get_skills();
			$this->load->view('Employee/SkillMod/List_Skills.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_skill()
	{
		$this->commonData();

		/*************************Access Verif************************/
		//$this->function_type = "edit";
		$current_function = "List_skills";
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
			/*************************Access Verif************************/
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
		$current_function = "List_skills";
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
			return redirect(base_url() . 'Employee_Account/List_Skills');

			/*************************Access Verif************************/
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
		$current_function = "List_skills";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->load->view('Employee/PositionMod/Add_post.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_posts()
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
			$this->load->view('Employee/PositionMod/List_posts.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_post()
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
				//echo 'hi'; die();

				$this->data['ID_post'] = $_GET['ID_post'];
				$this->data['post'] = $this->Mpost->delete_post($this->data['ID_post']);
			}
			return redirect(base_url() . 'Employee_Account/List_posts');
			/*************************Access Verif************************/
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
		$current_function = "List_role";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_skill_management()
	{

		$this->commonData();
		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_skills_management()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
			//	$this->data['skills_management'] = $this->Mskillmanagement->get_skills_management();
			$this->load->view('Employee/SkillmanagementMod/List_skills_management.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_skill_management()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_skill_management()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_skills_management";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['parent'] = $this->Mdepartment->get_departments();
			$this->data['director'] = $this->Mdepartment->get_employees();
			$this->data['director_qse'] = $this->Mdepartment->get_employees();

			$this->data['company'] = $this->Mdepartment->get_companies();

			$this->load->view('Employee/DepartmentMod/Add_department.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			//echo $_POST['Parent_department'] ; die();

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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_departments()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_department()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {

			/*********************End Access Verif************************/

			if ($_GET['ID_department']) {
				$this->data['ID_department'] = $_GET['ID_department'];
				$this->data['post'] = $this->Mdepartmentpost->get_posts();
				//$this->data['employee'] = $this->Mdepartmentpost->get_employees();
				//echo print_r($this->data['post']); die();
			}
			$this->load->view('Employee/DepartmentMod/Add_department_post.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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
		$this->load->view('Employee/Footer');
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
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/
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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_department_post()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
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
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			if ($_GET['ID_department']) {
				$this->data['ID_department'] = $_GET['ID_department'];
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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Submit_add_department_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function List_departments_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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


			$this->load->view('Employee/DepartmentMod/List_departments_employee.php', $this->data);
			/*************************Access Verif************************/
		} else {
			$this->load->view('Employee/No_access.php', $this->data);
		}
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Form_edit_department_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_department_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}

	public function view_department_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





		if ($this->test_verif_edit == 1) {
			/*********************End Access Verif************************/

			$this->data['ID_employee'] = $_GET['ID_employee'];
			$this->data['skill'] = $this->Mskillemployee->get_skills();
			$this->data['employee'] = $this->Mskillemployee->get_employees();

			$this->load->view('Employee/EmployeeskillMod/Add_skill_employee.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function List_skills_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "view";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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


			$this->load->view('Employee/EmployeeskillMod/List_skills_employee.php', $this->data);
			/*************************Access Verif************************/
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
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
		/*********************End Access Verif************************/
	}
	public function Delete_skill_employee()
	{
		$this->commonData();

		/*************************Access Verif************************/
		$this->function_type = "edit";
		$current_function = "List_departments";
		$this->commonAccess($current_function);
		$this->load->view('Employee/Header');
		$this->load->view('Employee/Menu', $this->data);





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
		$this->load->view('Employee/Footer');
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
