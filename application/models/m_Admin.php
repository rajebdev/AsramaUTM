<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_Admin extends CI_Model
{
    public function get_data()
    {
        $result = $this->db->query('SELECT * FROM tbl_login l, tbl_level v WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.id_level=v.id_level GROUP BY l.username')->row_array();
        return $result;
    }

    public function get_alldata()
    {
        $result = $this->db->query("SELECT * FROM tbl_login WHERE id_level=1337")->result();
        return $result;
    }

    public function delete_data($username)
    {
        $result = False;
        $this->db->query("DELETE FROM tbl_login WHERE username='$username'");
        if ($this->db->affected_rows() != 0)
            $result = True;
        return $result;
    }

    public function set_password($password, $password1)
    {
        $this->db->query("UPDATE tbl_login SET password='" . $password1 . "' WHERE username='" . $this->session->userdata('username') . "' AND password='" . $password . "'");
        return $this->db->affected_rows();
    }
}
