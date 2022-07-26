<?php
class Mcompany extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }
    function get_chapters($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        $this->db->where('auditquality_chapters.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_chapters_all()
    {
        $this->db->select('*');
        $this->db->from('auditquality_chapters');
        //  $this->db->where('auditquality_chapters.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function getcountchapters()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_chapters');
        $query = $this->db->get();
        return $query->result_array()[0]['nb'];
    }

    function get_subjects($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_subjects');
        $this->db->order_by('Number_subject','desc');
        $this->db->where('auditquality_subjects.ID_chapter=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_questions($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_questions');
        $this->db->order_by('ID_question','desc');
        $this->db->where('auditquality_questions.ID_chapter=' . $id);
        $query = $this->db->get();
        // echo print_r($query->result_array()) ;die();
        return $query->result_array();
    }
    function add_answer($data)
    {
        $this->db->insert('auditquality_responses', $data);
        return    $this->db->insert_id();
    }
    function get_audityear_by_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_year');
        $this->db->join('auditquality_company', 'auditquality_company.ID_company = auditquality_year.ID_company');
        $this->db->where('auditquality_year.Status_year = 1');
        $this->db->where('auditquality_year.ID_company=' . $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_audityear($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_year');
        $this->db->where('auditquality_year.ID_company=' . $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }

    function edit_year_activate($ID_company, $ID_year)
    {
        $this->db->set('auditquality_year.Status_year', '1');
        $this->db->where('ID_company', $ID_company);
        $this->db->where('ID_year', $ID_year);

        if ($this->db->update('auditquality_year')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_year_inactivate($ID_company, $ID_year)
    {
        $this->db->set('auditquality_year.Status_year', '0');
        $this->db->where('ID_company', $ID_company);
        $this->db->where('ID_year !=' . $ID_year);

        if ($this->db->update('auditquality_year')) {

            return true;
        } else {

            return false;
        }
    }
    function edit_year_company($ID_company, $ID_year)
    {
        $this->db->set('auditquality_company.ID_year', $ID_year);
        $this->db->where('ID_company', $ID_company);
        if ($this->db->update('auditquality_company')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_company($ID_company, $ID_department)
    {
        $this->db->set('auditquality_department.ID_company', $ID_company);
        $this->db->where('ID_department', $ID_department);
        if ($this->db->update('auditquality_department')) {

            return true;
        } else {

            return false;
        }
    }

    function AddAccess($data)
    {
        $this->db->insert('auditquality_access', $data);
        return    $this->db->insert_id();
    }

    function get_access_bydepartment($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access');
        $this->db->where('auditquality_access.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_department_by_ID($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function Department_by_Company($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_company=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_status_all()
    {
        $this->db->select('*');
        $this->db->from('auditquality_status');
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_chapters_with_status($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_access');
        $this->db->join('auditquality_chapters', 'auditquality_chapters.ID_chapter = auditquality_access.ID_chapter');
        $this->db->where('auditquality_access.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_access_status($ID_access, $ID_status)
    {
        $this->db->set('auditquality_access.ID_status', $ID_status);
        $this->db->where('ID_access', $ID_access);
        if ($this->db->update('auditquality_access')) {

            return true;
        } else {

            return false;
        }
    }

    function get_password_department($id)
    {
        $this->db->select('Password_department');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_password_employee($id)
    {
        $this->db->select('Password_employee');
        $this->db->from('auditquality_employee');
        $this->db->where('auditquality_employee.ID_employee=' . $id);
        $query = $this->db->get();
        return $query->result_array();
    }


    function edit_password_encrypt($newpwd, $ID_department)
    {
        $this->db->set('auditquality_department.Password_department', $newpwd);
        $this->db->where('ID_department', $ID_department);
        if ($this->db->update('auditquality_department')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_password_encrypt_employee($newpwd, $ID_employee)
    {
        $this->db->set('auditquality_employee.Password_employee', $newpwd);
        $this->db->where('ID_employee', $ID_employee);
        if ($this->db->update('auditquality_employee')) {

            return true;
        } else {

            return false;
        }
    }


    function edit_risk_ID($ID_risk, $ID_action)
    {
        $this->db->set('auditquality_action.ID_risk', $ID_risk);
        $this->db->where('ID_action', $ID_action);
        if ($this->db->update('auditquality_action')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_Skill_for_post($ID_management, $ID_post)
    {
        $this->db->set('auditquality_skills_management.ID_post', $ID_post);
        $this->db->where('ID_management', $ID_management);
        if ($this->db->update('auditquality_skills_management')) {

            return true;
        } else {

            return false;
        }
    }

    function Get_department_by_document($ID_document)
    {
        $this->db->select('Alias_department');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.ID_department=(SELECT ID_department FROM auditquality_document WHERE ID_document=' . $ID_document . ')');
        $query = $this->db->get();
        return $query->result_array()[0]['Alias_department'];
    }
    function Get_version_by_document($ID_document)
    {
        $this->db->select('Number_version');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_version', 'auditquality_document.ID_document = auditquality_doc_version.ID_document');
        $this->db->where('auditquality_document.ID_document=' . $ID_document);
        $this->db->order_by('ID_version', 'DESC');
        $query = $this->db->get();
        return $query->result_array()[0]['Number_version'];
    }

    function edit_code_document($ID_document, $Code_document)
    {
        $this->db->set('auditquality_document.Code_document', $Code_document);
        $this->db->where('ID_document', $ID_document);
        if ($this->db->update('auditquality_document')) {

            return true;
        } else {

            return false;
        }
    }


    function Send_delete_request($data)
    {
        $this->db->insert('auditquality_doc_requests', $data);
        return    $this->db->insert_id();
    }

    function Send_update_request($Type_requests, $Date_requests, $Status_requests, $ID_document, $ID_employee, $ID_requests)
    {


        $this->db->set('auditquality_doc_requests.Type_requests', $Type_requests);
        $this->db->set('auditquality_doc_requests.Date_requests', $Date_requests);
        $this->db->set('auditquality_doc_requests.Status_requests', $Status_requests);
        $this->db->set('auditquality_doc_requests.ID_document', $ID_document);
        $this->db->set('auditquality_doc_requests.ID_employee', $ID_employee);


        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);
        $this->db->update('auditquality_doc_requests');
    }
    function Send_update_for_date($ID_audit, $ID_date)
    {
        $this->db->set('auditquality_date.ID_audit', $ID_audit);
        $this->db->where('ID_date', $ID_date);
        if ($this->db->update('auditquality_date')) {

            return true;
        } else {

            return false;
        }
    }

    function Send_update_for_actor($ID_audit, $ID_non_conformity)
    {
        $this->db->set('auditquality_non_conformity.ID_audit', $ID_audit);
        $this->db->where('ID_non_conformity', $ID_non_conformity);
        if ($this->db->update('auditquality_non_conformity')) {

            return true;
        } else {

            return false;
        }
    }





    function Send_accept_request($Validatedby_requests, $ID_requests)
    {


        $this->db->set('auditquality_doc_requests.Validatedby_requests', $Validatedby_requests);
        $this->db->where('auditquality_doc_requests.ID_requests', $ID_requests);
        $this->db->update('auditquality_doc_requests');
    }


    function get_request_by_ID($ID_request)
    {
        $this->db->select('ID_document');
        $this->db->from('auditquality_doc_requests');
        $this->db->where('auditquality_doc_requests.ID_requests=' . $ID_request);
        $query = $this->db->get();
        return $query->result_array()[0]['ID_document'];
    }


    function get_request_by_ID_all($ID_request)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_requests');
        $this->db->where('auditquality_doc_requests.ID_requests=' . $ID_request);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_document_by_ID($ID_document)
    {
        $this->db->select('*');
        $this->db->from('auditquality_document');
        $this->db->join('auditquality_doc_type', 'auditquality_doc_type.ID_doc = auditquality_document.ID_doc');
        $this->db->where('auditquality_document.ID_document=' . $ID_document);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_type_doc()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_type');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_document_last_Version($ID_document)
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_version');
        $this->db->where('Validatedby_version!=' . 0);
        $this->db->where('Validatedby_version!=' . -1);
        $this->db->order_by('ID_version', 'DESC');

        $query = $this->db->get();
        return $query->result_array();
    }


    function add_document_version($data)
    {
        $this->db->insert('auditquality_doc_version', $data);
        return    $this->db->insert_id();
    }

    function add_document_new($data)
    {
        $this->db->insert('auditquality_document', $data);
        return    $this->db->insert_id();
    }


    /*  function get_last_code_doc()
    {
        $this->db->select('Code_document');
        $this->db->from('auditquality_document');
        $this->db->order_by('Code_document', 'DESC');

        $query = $this->db->get();
        return $query->result_array()[0]['Code_document'];
    }
*/






    function Send_accept_document($Validatedby_document, $ID_version)
    {


        $this->db->set('auditquality_doc_version.Validatedby_version', $Validatedby_document);
        $this->db->where('auditquality_doc_version.ID_version', $ID_version);
        $this->db->update('auditquality_doc_version');
    }

    function edit_Department_for_position($ID_department_post, $ID_Post_for_position_dep)
    {

        $this->db->set('auditquality_department_post.ID_department', $ID_Post_for_position_dep);
        $this->db->where('auditquality_department_post.ID_department_post', $ID_department_post);
        $this->db->update('auditquality_department_post');
    }


    function Get_position_by_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_posts.ID_department');
        $this->db->where('auditquality_department.ID_company', $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }

    function Get_position_by_department($ID_department)
    {
        $this->db->select('*');
        $this->db->from('auditquality_posts');
        //$this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_posts.ID_department');
        $this->db->where('auditquality_posts.ID_department', $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }


    function get_employee_by_company($ID_company)
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->join('auditquality_department_post', 'auditquality_department_post.ID_department_post = auditquality_employee.ID_department_post');
        $this->db->join('auditquality_department', 'auditquality_department.ID_department = auditquality_department_post.ID_department');
        $this->db->where('auditquality_department.ID_company', $ID_company);
        $query = $this->db->get();
        return $query->result_array();
    }


    function Edit_director_to_department($ID_department, $Director_department)
    {
        $this->db->set('auditquality_department.Director_department', $Director_department);
        $this->db->where('ID_department', $ID_department);

        if ($this->db->update('auditquality_department')) {

            return true;
        } else {

            return false;
        }
    }

    function edit_department_position($data)
    { {
            $this->db->insert('auditquality_department_post', $data);
            return    $this->db->insert_id();
        }
    }


    function edit_department_position_for_employee($newID_department_post, $ID_employee)
    {

        $this->db->set('auditquality_employee.ID_department_post', $newID_department_post);
        $this->db->where('ID_employee', $ID_employee);

        if ($this->db->update('auditquality_employee')) {

            return true;
        } else {

            return false;
        }
    }




    function Get_group_access()
    {
        $this->db->select('*');
        $this->db->from('auditquality_access_group');
        $query = $this->db->get();
        return $query->result_array();
    }



    function Get_functions()
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions');
        $query = $this->db->get();
        return $query->result_array();
    }


    function add_new_access($data)
    {
        $this->db->insert('auditquality_functions_access', $data);
        return    $this->db->insert_id();
    }



    function get_function_by_group($ID_access_group)
    {
        $this->db->select('*');
        $this->db->from('auditquality_functions_access');
        $this->db->join('auditquality_functions', 'auditquality_functions.ID_function = auditquality_functions_access.ID_function');
        $this->db->where('auditquality_functions_access.ID_access_group=' . $ID_access_group);
        $query = $this->db->get();
        return $query->result_array();
    }



    /*****************************************************Technical */
    /****************************************************************/
    /* function edit_department_for_employee($this->ID_department_for_employee, $ID_employee){

    $this->db->set('auditquality_employee.ID_department_post',$newID_department_post);
    $this->db->where('ID_employee', $ID_employee);

    if ($this->db->update('auditquality_employee')) {

        return true;
    } else {

        return false;
    }   
   }*/

    function Get_department_post_by_department($ID_department)
    {

        $this->db->select('ID_department_post');
        $this->db->from('auditquality_department_post');
        $this->db->where('auditquality_department_post.ID_department=' . $ID_department);
        $query = $this->db->get();
        return $query->result_array();
    }
    /*******************************************************************************************/
    /*******************************************************************************************/
    /***********************************Employee ***********************************************/
    /*******************************************************************************************/
    /*******************************************************************************************/
    function get_deartment_by_director($ID_director)
    {

        $this->db->select('ID_department');
        $this->db->from('auditquality_department');
        $this->db->where('auditquality_department.Director_department=' . $ID_director);
        $query = $this->db->get();
        return $query->result_array();
    }

    function get_deartment_by_employee($ID_employee)
    {

        $this->db->select('auditquality_department_post.ID_department');
        $this->db->from('auditquality_department_post');
        $this->db->where('auditquality_department_post.ID_department_post = (select ID_department_post from auditquality_employee where ID_employee = ' . $ID_employee . ')');
        $query = $this->db->get();
        return $query->result_array()[0]['ID_department'];
    }
}
