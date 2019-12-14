<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_User extends CI_Model
{
    public function get_data()
    {
        $result = $this->db->query('SELECT * FROM tbl_login l, tbl_pendaftaran p, tbl_level v, tbl_fakultas f, tbl_jurusan j, tbl_kelamin k, tbl_jalurmasuk s WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=p.username AND l.id_level=v.id_level AND p.id_jurusan=j.id_jurusan AND j.id_fakultas=f.id_fakultas AND p.id_kelamin=k.id_kelamin AND p.id_jalurmasuk=s.id_jalurmasuk GROUP BY l.username')->row_array();
        return $result;
    }

    public function get_data_edit()
    {
        $result = $this->db->query('SELECT p.nama, p.nim, p.id_jurusan,  p.id_jalurmasuk, p.tempat_lahir, p.tanggal_lahir, p.id_kelamin, p.no_telp, p.alamat FROM tbl_login l, tbl_pendaftaran p WHERE l.username="' . $this->session->userdata('username') . '" AND l.password="' . $this->session->userdata('password') . '" AND l.id_level="' . $this->session->userdata('id_level') . '" AND l.username=p.username GROUP BY l.username')->row_array();
        return $result;
    }

    public function readHobi($nim)
    {
        return $this->db->query("SELECT id, ket_hobi FROM tbl_hobi WHERE nim='" . $nim . "'")->result();
    }

    public function readOrangtua($nim)
    {
        return $this->db->query("SELECT nama_ayah, pekerjaan_ayah, telp_ayah,nama_ibu, pekerjaan_ibu, telp_ibu FROM tbl_orangtua WHERE nim='" . $nim . "'")->row_array();
    }

    public function readOrganisasi($nim)
    {
        return $this->db->query("SELECT id, nama_organisasi, tahun_masuk, tahun_selesai FROM tbl_organisasi WHERE nim='" . $nim . "'")->result();
    }

    public function readPrestasi($nim)
    {
        return $this->db->query("SELECT id, nama_prestasi, tahun_prestasi, berkas_prestasi FROM tbl_prestasi WHERE nim='" . $nim . "'")->result();
    }

    public function readRiwayatPendidikan($nim)
    {
        return $this->db->query("SELECT id, r.id_pendidikan, p.ket_pendidikan, r.nama_sekolah, r.tahun_lulus FROM tbl_riwayatpendidikan r, tbl_pendidikan p WHERE nim='" . $nim . "' AND r.id_pendidikan=p.id_pendidikan GROUP BY r.id")->result();
    }

    public function readRiwayatSakit($nim)
    {
        return $this->db->query("SELECT id, nama_penyakit, ket_penyakit FROM tbl_riwayatsakit WHERE nim='" . $nim . "'")->result();
    }

    public function readBerkas($nim)
    {
        return $this->db->query("SELECT pass_foto, surat_pernyataan, ktp_penghuni, ktp_ayah, ktp_ibu, kartu_keluarga, kwitansi_daftar, kwitansi_karakter, surat_dokter, FROM tbl_berkas WHERE nim='" . $nim . "'")->result();
    }

    public function readfakultas($nim)
    {
        return $this->db->query("SELECT pass_foto, surat_pernyataan, ktp_penghuni, ktp_ayah, ktp_ibu, kartu_keluarga, kwitansi_daftar, kwitansi_karakter, surat_dokter, FROM tbl_berkas WHERE nim='" . $nim . "'")->result();
    }

    public function set_password($password, $password1)
    {
        $this->db->query("UPDATE tbl_login SET password='" . $password1 . "' WHERE username='" . $this->session->userdata('username') . "' AND password='" . $password . "'");
        return $this->db->affected_rows();
    }

    public function updateProfile($nama, $nim, $jurusan, $jalurmasuk, $tempat_lahir, $tanggal_lahir, $sex, $notelp, $alamat)
    {
        $this->db->query('UPDATE tbl_pendaftaran SET nama="' . $nama . '", nim="' . $nim . '", id_jurusan="' . $jurusan . '", id_jalurmasuk="' . $jalurmasuk . '", tempat_lahir="' . $tempat_lahir . '", tanggal_lahir="' . $tanggal_lahir . '", id_kelamin="' . $sex . '", no_telp="' . $notelp . '", alamat="' . $alamat . '" WHERE username="' . $this->session->userdata('username') . '"');
        return $this->db->affected_rows();
    }
}
