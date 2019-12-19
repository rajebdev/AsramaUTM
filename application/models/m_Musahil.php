<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_Musahil extends CI_Model
{
    public function get_data()
    {
        return $result = $this->db->query('SELECT * FROM tbl_login l, tbl_musahil m, tbl_level v WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=m.username AND l.id_level=v.id_level GROUP BY l.username')->row_array();
    }

    public function set_password($password, $password1)
    {
        $this->db->query("UPDATE tbl_login SET password='" . $password1 . "' WHERE username='" . $this->session->userdata('username') . "' AND password='" . $password . "'");
        return $this->db->affected_rows();
    }

    public function get_data_token()
    {
        return $this->db->query("SELECT p.nim, l.password FROM tbl_login l , tbl_pendaftaran p WHERE l.id_level=100 AND l.username=p.username")->result();
    }

    public function add_token($nim, $password)
    {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d H:i:s");
        $this->db->query("INSERT INTO `tbl_login` (`username`, `password`, `id_level`, `photo`, `user_created`) VALUES ('U" . $nim . "', '" . $password . "', '100', 'default.jpg', '" . $date . "');");
        $this->db->query("INSERT INTO tbl_pendaftaran VALUES ('" . $nim . "', '', '000', '0', '', '', '0', '', '', '', '', '" . $date . "', 'U" . $nim . "')");
        $this->db->query("INSERT INTO tbl_orangtua VALUES ('" . $nim . "', '', '', '', '', '', '')");
        $this->db->query("INSERT INTO `tbl_berkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES ('" . $nim . "', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg')");
        $this->db->query("INSERT INTO `tbl_validasiberkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES ('" . $nim . "', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
        return $this->db->affected_rows();
    }

    public function updateToken($nim, $nimbaru, $password)
    {
        $username = $this->db->query("SELECT p.username FROM tbl_pendaftaran p WHERE p.nim='" . $nim . "'")->row_array()['username'];
        $this->db->query("UPDATE tbl_login SET password='" . $password . "' WHERE username='" . $username . "'");
        return $this->db->affected_rows();
    }

    public function delete_token($nim)
    {
        $username = $this->db->query("SELECT p.username FROM tbl_pendaftaran p WHERE p.nim='" . $nim . "'")->row_array()['username'];
        $this->db->query("DELETE FROM tbl_berkas WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_hobi WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_orangtua WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_organisasi WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_prestasi WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_riwayatpendidikan WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_riwayatsakit WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_validasiberkas WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_pendaftaran WHERE nim='" . $nim . "'");
        $this->db->query("DELETE FROM tbl_login WHERE username='" . $username . "'");
        return $this->db->affected_rows() > 0;
    }

    public function get_username($nim)
    {
        $username = $this->db->query("SELECT p.username FROM tbl_pendaftaran p WHERE p.nim='" . $nim . "'")->row_array()['username'];
        return $username;
    }

    public function get_data_validasi()
    {
        return $this->db->query("SELECT nim, nama, validasi FROM tbl_pendaftaran")->result();
    }

    public function validasi_data_pendaftar($nim)
    {
        $this->db->query("DELETE FROM `tbl_validasiberkas` WHERE nim='" . $nim . "'");
        $this->db->query("INSERT INTO `tbl_validasiberkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES ('" . $nim . "', '1', '1', '1', '1', '1', '1', '1', '1', '1')");
        $this->db->query("UPDATE tbl_pendaftaran SET validasi='1' WHERE nim='" . $nim . "'");
        return $this->db->affected_rows();
    }

    public function unvalidasi_data_pendaftar($nim)
    {
        $this->db->query("DELETE FROM `tbl_validasiberkas` WHERE nim='" . $nim . "'");
        $this->db->query("INSERT INTO `tbl_validasiberkas` (`nim`, `pass_foto`, `surat_pernyataan`, `ktp_penghuni`, `ktp_ayah`, `ktp_ibu`, `kartu_keluarga`, `kwitansi_daftar`, `kwitansi_karakter`, `surat_dokter`) VALUES ('" . $nim . "', '0', '0', '0', '0', '0', '0', '0', '0', '0')");
        $this->db->query("UPDATE tbl_pendaftaran SET validasi='0' WHERE nim='" . $nim . "'");
        return $this->db->affected_rows();
    }
}
