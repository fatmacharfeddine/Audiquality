<?php
/**************************** Risk Management ***************************/

public function Form_add_risk()
{
    $this->commonData();

    $this->data['type_risk'] = $this->Mrisk->get_type_risk();
    $this->data['ID_type'] = $this->data['type_risk'][0]['ID_type'];
    $this->data['Title_type'] = $this->data['type_risk'][0]['Title_type'];
    //echo print_r($this->data['type_risk']);
    //die();
    /************************ Access Menu *******************************/
    $this->data['ID_connected_employee'] = $this->session->userdata('ID_employee');
    $this->data['access_account'] = $this->Memployeeaccount->get_access_by_employee($this->data['ID_connected_employee']);
    /******************** End Access Menu *******************************/

    $this->load->view('Employee/risksMod/Add_risk.php', $this->data);
}
public function Submit_add_risk()
{
    $this->commonData();
    if ($_POST) {
        $this->data = array(
            'Title_risk' => $_POST['Title_risk'],
            'Description_risk' => $_POST['Description_risk'],
            'ID_department' => $this->data['current_department'],
            'ID_type' => $_POST['ID_type'],

        );
        if ($_POST['ID_risk']) {
            //echo 'heey'; die();
            $ID_risk = $_POST['ID_risk'];
            $this->Mrisk->edit_risk($this->data, $ID_risk);
        } else {
            $this->Mrisk->add_risk($this->data);
        }
    }
    return redirect(base_url() . 'Employee_Account/List_risk');
}

public function List_risk()
{
    $this->commonData();

    $this->data['nb'] = 1;

    /*********************Paging*******************************/
    $page = 1;
    if (!isset($_GET['page'])) {
        $p = 1;
    } else {
        $p = $_GET['page'];
    }
    $page = ($p - 1) * 9;
    if ($this->Mrisk->get_risk_paging($page, $this->data['current_department']) == False) {
        $this->data['empty'] = 1;
    } else {
        $this->data['nb'] = $this->Mrisk->get_risk_nb_page($this->data['current_department']);
    }
    $this->data['risk'] = $this->Mrisk->get_risk_paging($page, $this->data['current_department']);
    /******************End Paging******************************/
    /*echo "<pre>";
echo print_r($this->data['risk']);
echo "<pre>";
die();*/
    $this->load->view('Employee/risksMod/List_risk.php', $this->data);
}
public function Form_edit_risk()
{
    $this->commonData();
    $this->data['type_risk'] = $this->Mrisk->get_type_risk();
    $this->data['ID_type'] = $this->data['type_risk'][0]['ID_type'];
    $this->data['Title_type'] = $this->data['type_risk'][0]['Title_type'];
    if ($_GET) {
        //echo 'hi'; die();
        $this->data['ID_risk'] = $_GET['ID_risk'];
        $this->data['risk'] = $this->Mrisk->get_risk_by_ID($this->data['ID_risk']);
        $this->data['Title_risk'] = $this->data['risk'][0]['Title_risk'];
        $this->data['Description_risk'] = $this->data['risk'][0]['Description_risk'];
    }
    $this->load->view('Employee/risksMod/Add_risk.php', $this->data);
}
public function Delete_risk()
{
    if ($_GET) {
        //echo 'hi'; die();

        $this->data['ID_risk'] = $_GET['ID_risk'];
        $this->data['risk'] = $this->Mrisk->delete_risk($this->data['ID_risk']);
    }
    return redirect(base_url() . 'Employee_Account/List_risk');
}


/**************************** Risk Management ***************************/

/**************************** action Management ***************************/

public function Form_add_action()
{
    $this->commonData();

    $this->data['type_action'] = $this->Maction->get_type_action();
    $this->data['ID_type'] = $this->data['type_action'][0]['ID_type'];
    $this->data['Title_type'] = $this->data['type_action'][0]['Title_type'];
    //echo print_r($this->data['type_action']);
    //die();
    /************************ Access Menu *******************************/
    $this->data['ID_connected_employee'] = $this->session->userdata('ID_employee');
    $this->data['access_account'] = $this->Memployeeaccount->get_access_by_employee($this->data['ID_connected_employee']);
    /******************** End Access Menu *******************************/

    $this->load->view('Employee/actionsMod/Add_action.php', $this->data);
}
public function Submit_add_action()
{
    $this->data['ID_risk'] = $_GET['ID_risk'];

    $this->commonData();
    if ($_POST) {

        $this->data = array(
            'Title_action' => $_POST['Title_action'],
            'Description_action' => $_POST['Description_action'],
            'ID_risk' => $this->data['ID_risk'],
            'ID_type' => $_POST['ID_type'],

        );
        if ($_POST['ID_action']) {
            //echo 'heey'; die();
            $ID_action = $_POST['ID_action'];
            $this->Maction->edit_action($this->data, $ID_action);
        } else {
            $this->Maction->add_action($this->data);
        }
    }
    return redirect(base_url() . 'Employee_Account/List_action');
}

public function List_action()
{
    $this->data['ID_risk'] = $_GET['ID_risk'];

    $this->commonData();

    $this->data['nb'] = 1;

    /*********************Paging*******************************/
    $page = 1;
    if (!isset($_GET['page'])) {
        $p = 1;
    } else {
        $p = $_GET['page'];
    }
    $page = ($p - 1) * 9;
    if ($this->Maction->get_action_paging($page,$this->data['ID_risk']) == False) {
        $this->data['empty'] = 1;
    } else {
        $this->data['nb'] = $this->Maction->get_action_nb_page($this->data['ID_risk']);
    }
    $this->data['action'] = $this->Maction->get_action_paging($page,$this->data['ID_risk']);
    /******************End Paging******************************/
    /*echo "<pre>";
echo print_r($this->data['action']);
echo "<pre>";
die();*/
    $this->load->view('Employee/actionsMod/List_action.php', $this->data);
}
public function Form_edit_action()
{
    $this->commonData();
    $this->data['type_action'] = $this->Maction->get_type_action();
    $this->data['ID_type'] = $this->data['type_action'][0]['ID_type'];
    $this->data['Title_type'] = $this->data['type_action'][0]['Title_type'];
    if ($_GET) {
        //echo 'hi'; die();
        $this->data['ID_action'] = $_GET['ID_action'];
        $this->data['action'] = $this->Maction->get_action_by_ID($this->data['ID_action']);
        $this->data['Title_action'] = $this->data['action'][0]['Title_action'];
        $this->data['Date_action'] = $this->data['action'][0]['Date_action'];
        $this->data['Result_action'] = $this->data['action'][0]['Result_action'];
        //$this->data[''] = $this->data['action'][0][''];
        //$this->data[''] = $this->data['action'][0][''];


        $this->data['Description_action'] = $this->data['action'][0]['Description_action'];
    }
    $this->load->view('Employee/actionsMod/Add_action.php', $this->data);
}
public function Delete_action()
{
    if ($_GET) {
        //echo 'hi'; die();

        $this->data['ID_action'] = $_GET['ID_action'];
        $this->data['action'] = $this->Maction->delete_action($this->data['ID_action']);
    }
    return redirect(base_url() . 'Employee_Account/List_action');
}


/**************************** action Management ***************************/
?>