<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_Auth extends CI_Model
{
    public function get_data_login($chap)
    {
        $result = False;
        if ($chap == 'user') {
            $result = $this->db->query('SELECT * FROM tbl_login l, tbl_pendaftaran p, tbl_level v, tbl_fakultas f, tbl_jurusan j, tbl_kelamin k, tbl_jalurmasuk s WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=p.username AND l.id_level=v.id_level AND p.id_jurusan=j.id_jurusan AND j.id_fakultas=f.id_fakultas AND p.id_kelamin=k.id_kelamin AND p.id_jalurmasuk=s.id_jalurmasuk GROUP BY l.username')->row_array();
        } else if ($chap == 'musahil') {
            $result = $this->db->query('SELECT * FROM tbl_login l, tbl_musahil m, tbl_level v WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=m.username AND l.id_level=v.id_level GROUP BY l.username')->row_array();
        } else if ($chap == 'admin') {
            $result = $this->db->query('SELECT * FROM tbl_login l, tbl_level v WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.id_level=v.id_level GROUP BY l.username')->row_array();
        }
        return $result;
    }

    public function get_login_data($username, $password)
    {
        $result = $this->db->get_where('tbl_login', ['username' => $username, 'password' => $password])->row_array();
        return $result;
    }

    public function login_checker()
    {
        $result = $this->db->get_where('tbl_login', ['username' => $this->session->userdata('username'), 'password' => $this->session->userdata('password'), 'id_level' => $this->session->userdata('id_level')])->row_array();
        return $result;
    }
}
