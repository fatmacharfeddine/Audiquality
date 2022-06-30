<?php
class MloginAccount extends CI_Model
{

    public function __construct()
    {
        $this->load->database();
    }
    /*****************Login Auditor************************/

    public function login_Auditor($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('Email_employee', $email);
        $this->db->where('Password_employee', MD5($password));
        $this->db->where('ID_access_group', 3);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_employee'       => $row->ID_employee,
                'Name_employee'     => $row->Name_employee,
                'Lastname_employee'    => $row->Lastname_employee,
                'Phone_employee'      => $row->Phone_employee,
                'Email_employee'     => $row->Email_employee,
                'Login_employee'  => $row->Login_employee,
                'Password_employee'           => $row->Password_employee,
                'ID_department_post'           => $row->ID_department_post,
                //'ID_post'           => $row->ID_post,
                'ID_access_group'           => $row->ID_access_group,
                'type'                 => "Employee",
                'logged_in'            => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_employee'       => '',
                'Name_employee'     => '',
                'Lastname_employee'    => '',
                'Phone_employee'      => '',
                'Email_employee'     => '',
                'Login_employee'  => '',
                'Password_employee'           => '',
                'ID_department_post'           => '',
                'ID_post'           => '',
                'ID_access_group'           => '',
                'type'                 => "Employee",
                'logged_in'            => False

            );
            $this->session->set_userdata($data_user);
        }
    }
    /*****************Login Director************************/
    public function login_Director($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('Email_employee', $email);
        $this->db->where('Password_employee', MD5($password));
        $this->db->where('ID_access_group', 4);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_employee'       => $row->ID_employee,
                'Name_employee'     => $row->Name_employee,
                'Lastname_employee'    => $row->Lastname_employee,
                'Phone_employee'      => $row->Phone_employee,
                'Email_employee'     => $row->Email_employee,
                'Login_employee'  => $row->Login_employee,
                'Password_employee'           => $row->Password_employee,
                'ID_department_post'           => $row->ID_department_post,
                'ID_post'           => $row->ID_post,
                'ID_access_group'           => $row->ID_access_group,
                'type'                 => "Employee",
                'logged_in'            => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_employee'       => '',
                'Name_employee'     => '',
                'Lastname_employee'    => '',
                'Phone_employee'      => '',
                'Email_employee'     => '',
                'Login_employee'  => '',
                'Password_employee'           => '',
                'ID_department_post'           => '',
                'ID_post'           => '',
                'ID_access_group'           => '',
                'type'                 => "Employee",
                'logged_in'            => False

            );
            $this->session->set_userdata($data_user);
        }
    }



    /*****************Login Technical************************/

     public function login_Technical($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_technical');
        $this->db->where('Email_technical', $email);
        $this->db->where('Password_technical', MD5($password));
        $this->db->where('ID_access_group', 1);



        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_technical'       => $row->ID_technical,
                'Name_technical'     => $row->Name_technical,
                'Email_technical'  => $row->Email_technical,
                'Password_technical'    => $row->Password_technical,
                'ID_company'     => $row->ID_company,
                'type'             => "Technical",
                'logged_in'        => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_technical'       => '',
                'Name_technical'     => '',
                'Email_technical'  => '',
                'Password_technical'    => '',
                'ID_company'     => '',
                'type'             => "Technical",
                'logged_in'        => FALSE

            );
            $this->session->set_userdata($data_user);
        }
    }
   /* public function login_Technical($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_technical');
        $this->db->where('Email_technical', $email);
        $this->db->where('Password_technical', MD5($password));
        $this->db->where('ID_access_group', 1);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_technical'       => $row->ID_technical,
                'Name_technical'     => $row->Name_technical,
                'Lastname_technical'    => $row->Lastname_technical,
                'Phone_technical'      => $row->Phone_technical,
                'Email_technical'     => $row->Email_technical,
                'Login_technical'  => $row->Login_technical,
                'Password_technical'           => $row->Password_technical,
                'ID_department_post'           => $row->ID_department_post,
                'ID_post'           => $row->ID_post,
                'ID_access_group'           => $row->ID_access_group,
                'type'                 => "technical",
                'logged_in'            => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_technical'       => '',
                'Name_technical'     => '',
                'Lastname_technical'    => '',
                'Phone_technical'      => '',
                'Email_technical'     => '',
                'Login_technical'  => '',
                'Password_technical'           => '',
                'ID_department_post'           => '',
                'ID_post'           => '',
                'ID_access_group'           => '',
                'type'                 => "Technical",
                'logged_in'            => False

            );
            $this->session->set_userdata($data_user);
        }
    }*/
    /*****************Login Employee************************/




    public function login_Employee($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('Email_employee', $email);
        $this->db->where('Password_employee', MD5($password));
        $this->db->where('ID_access_group', 2);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_employee'       => $row->ID_employee,
                'Name_employee'     => $row->Name_employee,
                'Lastname_employee'    => $row->Lastname_employee,
                'Phone_employee'      => $row->Phone_employee,
                'Email_employee'     => $row->Email_employee,
                'Login_employee'  => $row->Login_employee,
                'Password_employee'           => $row->Password_employee,
                'ID_department_post'           => $row->ID_department_post,
                'ID_post'           => $row->ID_post,
                'ID_access_group'           => $row->ID_access_group,
                'type'                 => "Employee",
                'logged_in'            => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_employee'       => '',
                'Name_employee'     => '',
                'Lastname_employee'    => '',
                'Phone_employee'      => '',
                'Email_employee'     => '',
                'Login_employee'  => '',
                'Password_employee'           => '',
                'ID_department_post'           => '',
                'ID_post'           => '',
                'ID_access_group'           => '',
                'type'                 => "Employee",
                'logged_in'            => False

            );
            $this->session->set_userdata($data_user);
        }
    }


    public function login_grh($email, $password)
    {
        $this->load->database();

        $this->db->select('*');
        $this->db->from('auditquality_employee');
        $this->db->where('Email_employee', $email);
        $this->db->where('Password_employee', MD5($password));
        $this->db->where('ID_access_group', 5);

        $query = $this->db->get();
        if ($query->num_rows() == 1) {
            $row = $query->row();

            $data_user = array(
                'ID_employee'       => $row->ID_employee,
                'Name_employee'     => $row->Name_employee,
                'Lastname_employee'    => $row->Lastname_employee,
                'Phone_employee'      => $row->Phone_employee,
                'Email_employee'     => $row->Email_employee,
                'Login_employee'  => $row->Login_employee,
                'Password_employee'           => $row->Password_employee,
                'ID_department_post'           => $row->ID_department_post,
                'ID_post'           => $row->ID_post,
                'ID_access_group'           => $row->ID_access_group,
                'type'                 => "Employee",
                'logged_in'            => TRUE
            );
            $this->session->set_userdata($data_user);
        } else {
            $data_user = array(
                'ID_employee'       => '',
                'Name_employee'     => '',
                'Lastname_employee'    => '',
                'Phone_employee'      => '',
                'Email_employee'     => '',
                'Login_employee'  => '',
                'Password_employee'           => '',
                'ID_department_post'           => '',
                'ID_post'           => '',
                'ID_access_group'           => '',
                'type'                 => "Employee",
                'logged_in'            => False

            );
            $this->session->set_userdata($data_user);
        }
    }
}
