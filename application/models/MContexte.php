<?php
class MContexte extends CI_Model
{
    public function __construct()
    {
        $this->load->database();
    }

    function get_all_employee()
    {
        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $query = $this->db->get();
        return $query->result_array();
    }
    /****update enjeu *****/
    function update_enjeu_interne($data, $id)
    {
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);

        if ($this->db->update('auditquality_enjeu', $data)) {

            return true;
        } else {

            return false;
        }
    }

    function insert_enjeu($data)
    {
        $this->db->insert('auditquality_enjeu', $data);
        return $this->db->insert_id();
    }

    //enjeu limit interne
    function get_limit_enjeuInterne()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('status =', 0);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        //   $this->db->limit(10, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    //enjeu externe limit
    function get_limit_enjeuExterne()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('status =', 1);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        //   $this->db->limit(10, 0);
        $query = $this->db->get();
        return $query->result_array();
    }
    //enjeu interne
    function get_all_enjeuInterne()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 0);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_enjeuInterne_swot($ID_swot)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 0);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_enjeuInterne_swot_paging($ID_swot, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 0);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');
        $this->db->limit(9, $page);

        $query = $this->db->get();
        return $query->result_array();
    }


    function get_enjeuInterne_swot_nb_page($ID_swot)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 0);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }


    function get_enjeuExterne_swot_paging($ID_swot, $page)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 1);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');
        $this->db->limit(9, $page);

        $query = $this->db->get();
        return $query->result_array();
    }


    function get_enjeuExterne_swot_nb_page($ID_swot)
    {
        $this->db->select('count(*) nb');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 1);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return ceil($query->result_array()[0]['nb'] / 9);
    }







    //enjeu Externe
    function get_all_enjeuExterne()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 1);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }

    function get_enjeuExterne_swot($ID_swot)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');

        $this->db->where('status =', 1);
        $this->db->where('ID_swot =', $ID_swot);

        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeu()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');


        $query = $this->db->get();
        return $query->result_array();
    }

    function delete_Enjeu($id)
    {
        $this->db->where('ID_enjeu', $id);
        $this->db->delete('auditquality_enjeu');
    }

    function get_all_enjeuInterne_ByID($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);
        $this->db->where('status =', 0);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_enjeu_ByID($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeuExterne_ByID($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);
        $this->db->where('status =', 1);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeu_by_id_swot($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->join('auditquality_swot', 'auditquality_swot.ID_swot = auditquality_enjeu.ID_swot', 'left');
        $this->db->where('auditquality_enjeu.ID_swot =', $id);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeu_by_id_pestel($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->join('auditquality_pestle', 'auditquality_pestle.ID_pestle = auditquality_enjeu.ID_pestle', 'left');
        $this->db->where('auditquality_enjeu.ID_pestle =', $id);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');

        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeuSwot()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->join('auditquality_swot', 'auditquality_swot.ID_swot = auditquality_enjeu.ID_swot', 'left');
        $this->db->where('auditquality_enjeu.ID_swot =', NULL);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');


        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_enjeuPestel()
    {
        $this->db->select('*');
        $this->db->from('auditquality_enjeu');
        $this->db->join('auditquality_pestle', 'auditquality_pestle.ID_pestle = auditquality_enjeu.ID_pestle', 'left');
        $this->db->where('auditquality_enjeu.ID_pestle =', NULL);
        $this->db->order_by('auditquality_enjeu.Priority_enjeu');


        $query = $this->db->get();
        return $query->result_array();
    }
    function updateEnjeu($data, $id)
    {
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);

        if ($this->db->update('auditquality_enjeu', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function get_all_swot()
    {
        $this->db->select('*');
        $this->db->from('auditquality_swot');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_photo_swot($id)
    {
        $this->db->select('photo_swot');
        $this->db->from('auditquality_swot');
        $this->db->where('auditquality_swot.ID_swot =', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_all_Pestel()
    {
        $this->db->select('*');
        $this->db->from('auditquality_pestle');
        $query = $this->db->get();
        return $query->result_array();
    }
    function get_photo_pestel($id)
    {
        $this->db->select('photo_pestel');
        $this->db->from('auditquality_pestle');
        $this->db->where('auditquality_pestle.ID_pestle =', $id);
        $query = $this->db->get();
        return $query->result_array();
    }
    function update_photo($data, $id)
    {
        $this->db->where('auditquality_enjeu.ID_enjeu', $id);

        if ($this->db->update('auditquality_enjeu', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function insert_domain($data)
    {
        $this->db->insert('auditquality_domain', $data);
        return $this->db->insert_id();
    }
    function get_company_domain($id)
    {
        $this->db->select('*');
        $this->db->from('auditquality_domain');
        $this->db->where('auditquality_domain.ID_company =', $id);
        $query = $this->db->get();
        if ($query->num_rows() == 0) {
            return False;
        } else {
            return $query->result_array();
        }
    }
    function update_domain($data, $id)
    {
        $this->db->where('auditquality_domain.ID_domain', $id);

        if ($this->db->update('auditquality_domain', $data)) {

            return true;
        } else {

            return false;
        }
    }
    function delete_domain($id)
    {
        $this->db->where('ID_domain', $id);
        $this->db->delete('auditquality_domain');
    }
}
