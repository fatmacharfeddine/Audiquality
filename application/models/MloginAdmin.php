<?php
class MloginAdmin extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    /*****************Login Client************************/
    public function login_user($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_users');
        $this->db->where('email', $email);
        $this->db->where('password', MD5($password));

        // echo "<pre>";print_r($e);echo"</pre>";
        //  echo "<pre>";print_r($p);echo"</pre>";
        //  die();

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'email'     => $row->email,
                'logged_in' => TRUE,

            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'email'     => '',
                'logged_in' => FALSE,

            );
            $this->session->set_userdata($data_user);
        }
    }
}
