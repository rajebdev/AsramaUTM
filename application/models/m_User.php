<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_User extends CI_Model
{
    public function get_data()
    {
        $result = $this->db->query('SELECT * FROM tbl_login l, tbl_pendaftaran p, tbl_level v, tbl_fakultas f, tbl_jurusan j, tbl_kelamin k, tbl_jalurmasuk s WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=p.username AND l.id_level=v.id_level AND p.id_jurusan=j.id_jurusan AND j.id_fakultas=f.id_fakultas AND p.id_kelamin=k.id_kelamin AND p.id_jalurmasuk=s.id_jalurmasuk GROUP BY l.username')->row_array();
        return $result;
    }

    public function get_data_hobi($nim)
    {
        return $this->db->query("SELECT ket_hobi FROM tbl_hobi WHERE nim='" . $nim . "'")->row_array();
    }

    public function get_data_riwayat_pendidikan($nim)
    {
        return $this->db->query("SELECT * FROM tbl_pendidikan p, tbk_riwayatpendidikan r WHERE r.nim='" . $nim . "' AND p.id_pendidikan=r.id_pendidikan GROUP BY r.id_pendidikan")->row_array();
    }

    public function set_password($password, $password1)
    {
        $this->db->query("UPDATE tbl_login SET password='" . $password1 . "' WHERE username='" . $this->session->userdata('username') . "' AND password='" . $password . "'");
        return $this->db->affected_rows();
    }
}
