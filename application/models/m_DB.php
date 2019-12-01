<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_DB extends CI_Model
{
    public function readFakultas()
    {
        return $this->db->query("SELECT id_fakultas, nama_fakultas FROM tbl_fakultas")->result();
    }

    public function readJurusan()
    {
        return $this->db->query("SELECT id_jurusan, ket_jurusan FROM tbl_jurusan ORDER BY ket_jurusan ASC")->result();
    }

    public function readJenisKelamin()
    {
        return $this->db->query("SELECT id_kelamin, ket_kelamin FROM tbl_kelamin")->result();
    }

    public function readJalurMasuk()
    {
        return $this->db->query("SELECT id_jalurmasuk, ket_jalurmasuk FROM tbl_jalurmasuk")->result();
    }

    public function readPendidikan()
    {
        return $this->db->query("SELECT id_jalurmasuk, ket_jalurmasuk FROM tbl_jalurmasuk")->result();
    }
}
