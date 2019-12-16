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

    public function addHobi($nim, $ket_hobi)
    {
        $this->db->query("INSERT INTO tbl_hobi VALUES('', '" . $nim . "', '" . $ket_hobi . "')");
        return $this->db->affected_rows();
    }

    public function readHobi($nim)
    {
        return $this->db->query("SELECT id, ket_hobi FROM tbl_hobi WHERE nim='" . $nim . "'")->result();
    }

    public function readHobiWhere($nim, $id, $ket)
    {
        return $this->db->query("SELECT id, ket_hobi FROM tbl_hobi WHERE nim='" . $nim . "' AND id=" . $id . " AND ket_hobi='" . $ket . "'")->row_array();
    }

    public  function updateHobiWhere($nim, $id, $ket, $ket_baru)
    {
        $this->db->query("UPDATE tbl_hobi SET ket_hobi='" . $ket_baru . "' WHERE nim='" . $nim . "' AND id=" . $id . " AND ket_hobi='" . $ket . "'");
        return $this->db->affected_rows();
    }

    public function deleteHobiWhere($nim, $id, $ket)
    {
        $this->db->query("DELETE FROM tbl_hobi WHERE nim='" . $nim . "' AND id=" . $id . " AND ket_hobi='" . $ket . "'");
        return $this->db->affected_rows();
    }

    public function readOrangtua($nim)
    {
        return $this->db->query("SELECT nama_ayah, pekerjaan_ayah, telp_ayah,nama_ibu, pekerjaan_ibu, telp_ibu FROM tbl_orangtua WHERE nim='" . $nim . "'")->row_array();
    }

    public function updateOrangtua($nim, $nama_ayah, $pekerjaan_ayah, $telp_ayah, $nama_ibu, $pekerjaan_ibu, $telp_ibu)
    {
        $this->db->query("UPDATE tbl_orangtua SET nama_ayah='" . $nama_ayah . "', pekerjaan_ayah='" . $pekerjaan_ayah . "', telp_ayah='" . $telp_ayah . "', nama_ibu='" . $nama_ibu . "', pekerjaan_ibu='" . $pekerjaan_ibu . "', telp_ibu='" . $telp_ibu . "' WHERE nim='" . $nim . "'");
        return $this->db->affected_rows();
    }

    public function readOrganisasi($nim)
    {
        return $this->db->query("SELECT id, nama_organisasi, tahun_masuk, tahun_selesai FROM tbl_organisasi WHERE nim='" . $nim . "'")->result();
    }

    public function addOrganisasi($nim, $name, $tahun_masuk, $tahun_selesai)
    {
        $this->db->query("INSERT INTO tbl_organisasi VALUES('', '" . $nim . "', '" . $name . "', '" . $tahun_masuk . "', '" . $tahun_selesai . "')");
        return $this->db->affected_rows();
    }

    public function readOrganisasiWhere($nim, $id, $name)
    {
        return $this->db->query("SELECT id, nama_organisasi, tahun_masuk, tahun_selesai FROM tbl_organisasi WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_organisasi='" . $name . "'")->row_array();
    }

    public  function updateOrganisasiWhere($nim, $id, $name, $nama_organisasi, $tahun_masuk, $tahun_selesai)
    {
        $this->db->query("UPDATE tbl_organisasi SET nama_organisasi='" . $nama_organisasi . "', tahun_masuk='" . $tahun_masuk . "', tahun_selesai='" . $tahun_selesai . "' WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_organisasi='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function deleteOrganisasiWhere($nim, $id, $name)
    {
        $this->db->query("DELETE FROM tbl_organisasi WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_organisasi='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function readPrestasi($nim)
    {
        return $this->db->query("SELECT id, nama_prestasi, tahun_prestasi, berkas_prestasi FROM tbl_prestasi WHERE nim='" . $nim . "'")->result();
    }

    public function addPrestasi($nim, $name, $tahun, $berkas)
    {
        $this->db->query("INSERT INTO tbl_prestasi VALUES('', '" . $nim . "', '" . $name . "', '" . $tahun . "', '" . $berkas . "')");
        return $this->db->affected_rows();
    }

    public function readPrestasiWhere($nim, $id, $name)
    {
        return $this->db->query("SELECT id, nama_prestasi, tahun_prestasi, berkas_prestasi FROM tbl_prestasi WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_prestasi='" . $name . "'")->row_array();
    }

    public function updatePrestasiWhere($nim, $id, $name, $name_baru, $tahun, $berkas)
    {
        return $this->db->query("UPDATE tbl_prestasi SET nama_prestasi='" . $name_baru . "', tahun_prestasi='" . $tahun . "', berkas_prestasi='" . $berkas . "' WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_prestasi='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function deletePrestasiWhere($nim, $id, $name)
    {
        $this->db->query("DELETE FROM tbl_prestasi WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_prestasi='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function readRiwayatPendidikan($nim)
    {
        return $this->db->query("SELECT id, r.id_pendidikan, p.ket_pendidikan, r.nama_sekolah, r.tahun_lulus FROM tbl_riwayatpendidikan r, tbl_pendidikan p WHERE nim='" . $nim . "' AND r.id_pendidikan=p.id_pendidikan GROUP BY r.id")->result();
    }

    public function addRiwayatPendidikan($nim, $id_pendidikan, $nama_sekolah, $tahun_lulus)
    {
        $this->db->query("INSERT INTO tbl_riwayatpendidikan VALUES('', '" . $nim . "', '" . $id_pendidikan . "', '" . $nama_sekolah . "', '" . $tahun_lulus . "')");
        return $this->db->affected_rows();
    }

    public function readRiwayatPendidikanWhere($nim, $id, $name)
    {
        return $this->db->query("SELECT r.id, r.id_pendidikan, p.ket_pendidikan, r.nama_sekolah, r.tahun_lulus FROM tbl_riwayatpendidikan r, tbl_pendidikan p WHERE r.nim='" . $nim . "' AND r.id=" . $id . " AND r.nama_sekolah='" . $name . "' AND r.id_pendidikan=p.id_pendidikan GROUP BY r.id")->row_array();
    }

    public function updateRiwayatPendidikan($nim, $id, $name, $jenjangpendidikan, $nama_sekolah, $tahun_lulus)
    {
        $this->db->query("UPDATE tbl_riwayatpendidikan SET id_pendidikan='" . $jenjangpendidikan . "', nama_sekolah='" . $nama_sekolah . "', tahun_lulus='" . $tahun_lulus . "' WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_sekolah='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function deleteRiwayatPendidikan($nim, $id, $name)
    {
        $this->db->query("DELETE FROM tbl_riwayatpendidikan  WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_sekolah='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function readRiwayatSakit($nim)
    {
        return $this->db->query("SELECT id, nama_penyakit, ket_penyakit FROM tbl_riwayatsakit WHERE nim='" . $nim . "'")->result();
    }

    public function readRiwayatSakitWhere($nim, $id, $name)
    {
        return $this->db->query("SELECT id, nama_penyakit, ket_penyakit FROM tbl_riwayatsakit WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_penyakit='" . $name . "'")->row_array();
    }

    public function addRiwayatSakit($nim, $nama_penyakit, $ket_penyakit)
    {
        $this->db->query("INSERT INTO tbl_riwayatsakit VALUES('', '" . $nim . "', '" . $nama_penyakit . "', '" . $ket_penyakit . "')");
        return $this->db->affected_rows();
    }

    public function updateRiwayatSakit($nim, $id, $name, $nama_penyakit, $ket_penyakit)
    {
        $this->db->query("UPDATE tbl_riwayatsakit SET nama_penyakit='" . $nama_penyakit . "', ket_penyakit='" . $ket_penyakit . "' WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_penyakit='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function deleteRiwayatSakitWhere($nim, $id, $name)
    {
        $this->db->query("DELETE FROM tbl_riwayatsakit WHERE nim='" . $nim . "' AND id=" . $id . " AND nama_penyakit='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function readBerkas($nim)
    {
        return $this->db->query("SELECT pass_foto, surat_pernyataan, ktp_penghuni, ktp_ayah, ktp_ibu, kartu_keluarga, kwitansi_daftar, kwitansi_karakter, surat_dokter FROM tbl_berkas WHERE nim='" . $nim . "'")->row_array();
    }

    public function updateBerkas($nim, $kolom, $name, $nama_berkas)
    {
        $this->db->query("UPDATE tbl_berkas SET " . $kolom . "='" . $nama_berkas . "' WHERE nim='" . $nim . "' AND " . $kolom . "='" . $name . "'");
        return $this->db->affected_rows();
    }

    public function readPendidikan()
    {
        return $this->db->query("SELECT id_pendidikan, ket_pendidikan FROM tbl_pendidikan")->result();
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
