<?php
class Mprocessus extends CI_Model
{
    function get_processus_by_ID($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->where('auditquality_processus.ID_processus =', $ID_processus);
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');

        $query = $this->db->get();
        return $query->result_array();
    }


    function get_processus_interaction_by_ID($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus_interaction');
        $this->db->where('auditquality_processus_interaction.ID_processus', $ID_processus);
        // $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus_interaction_nb_page($ID_processus)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_processus_interaction');
        $this->db->where('auditquality_processus_interaction.ID_processus', $ID_processus);

        //  $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }
    function get_processus_interaction()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus()
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus_Id_name()
    {
        $this->db->select('ID_processus,Title_processus');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_processus_nb()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_processus.ID_company =', $this->session->userdata('ID_company'));

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb']);
    }


    function get_interact_Id_name($ID_processus, $ID_processus_interaction)
    {
        $this->db->select('ID_processus,Title_processus');
        $this->db->from('auditquality_processus_interaction');
     //   $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
     //   $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
     $this->db->where('auditquality_processus.ID_processus =', $ID_processus);
     $this->db->where('auditquality_processus.ID_processus_interaction =', $ID_processus_interaction);
  //   $this->db->where('auditquality_processus.ID_company =', $this->session->userdata('ID_company'));

        $query = $this->db->get();
        return $query->result_array();
    }




    function get_processus_risk($ID_risk)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);
        $this->db->where('auditquality_processus.ID_processus not in (select ID_processus from auditquality_risk where ID_risk = ' . $ID_risk . ')');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processus_paging($page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        // $this->db->limit(9, $page);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }

    /*  function get_processus_nb_page()
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }*/


    function get_processus_by_category($processcategory)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processus.ID_Responsable');
        $this->db->join('auditquality_category', 'auditquality_category.processcategory = auditquality_processus.processcategory');
        $this->db->where('auditquality_category.processcategory =', $processcategory);
        $this->db->where('auditquality_processus.ID_company =', $this->data['ID_company']);

        $query = $this->db->get();
        return $query->result_array();
    }
    /**************************** Group Activité ****************************/
    function add_processusgroup($data)
    {
        $this->db->insert('auditquality_processusgroup', $data);
        return $this->db->insert_id();
    }

    function get_processusgroup_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processusgroup');
        $this->db->where('auditquality_processusgroup.ID_processus =', $ID_processus);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_processusgritem_by_processus($ID_processus)
    {
        $this->db->select('*');
        $this->db->from('auditquality_processusgritem');
        $this->db->where('auditquality_processusgritem.ID_processus =', $ID_processus);
        //  $this->db->join('auditquality_employee', 'auditquality_employee.ID_employee = auditquality_processusgritem.ID_Responsable');

        $query = $this->db->get();
        return $query->result_array();
    }
    function add_processusgritem($data)
    {
        $this->db->insert('auditquality_processusgritem', $data);
        return $this->db->insert_id();
    }
    function delete_processusgroup($GroupID)
    {
        $this->db->where('GroupID', $GroupID);
        $this->db->delete('auditquality_processusgroup');
    }
    function delete_processusgritem_by_group($GroupID)
    {
        $this->db->where('GroupID', $GroupID);
        $this->db->delete('auditquality_processusgritem');
    }
    function delete_processusgritem($ItemGrID)
    {
        $this->db->where('ItemGrID', $ItemGrID);
        $this->db->delete('auditquality_processusgritem');
    }

    /************************Interest************************/
    function get_interest()
    {
        $this->db->select('*');
        $this->db->from('auditquality_interest');

        $query = $this->db->get();
        return $query->result_array();
    }
    function add_interaction($data)
    {
        $this->db->insert('auditquality_processus_interaction', $data);
        return $this->db->insert_id();
    }
    function edit_interaction($data, $ID_interaction)
    {
        $this->db->where('auditquality_processus_interaction.ID_interaction', $ID_interaction);
        if ($this->db->update('auditquality_processus_interaction', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function delete_interaction($ID_interaction)
    {
        $this->db->where('ID_interaction', $ID_interaction);
        $this->db->delete('auditquality_processus_interaction');
    }


    function get_processus_row($ID_company)
    {
        $this->db->select('auditquality_processus.*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_processus_interaction', 'auditquality_processus_interaction.ID_processus = auditquality_processus.ID_processus', 'left');
        //  $this->db->where('auditquality_processus.ID_company', $ID_company);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function get_processus_col($ID_company)
    {
        $this->db->select('auditquality_processus.*');
        $this->db->from('auditquality_processus');
        $this->db->join('auditquality_processus_interaction', 'auditquality_processus_interaction.ID_processus_interaction = auditquality_processus.ID_processus', 'left');
        //  $this->db->where('auditquality_processus.ID_company', $ID_company);

        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }


    /**************************Documents **************************/

    function get_all_type_doc()
    {
        $this->db->select('*');
        $this->db->from('auditquality_doc_type');

        $query = $this->db->get();
        return $query->result_array();
    }
}
