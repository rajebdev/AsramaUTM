<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Asrama_model extends CI_Model{
    public function get_data_login($username){
        $data = $this->db->query("select * from tbl_login, tbl_level WHERE tbl_login.id_level = tbl_level.id_level and tbl_login.username = '".$username."'")->row_array();
        return $data;
    }

    // for gedung kamar
    public function get_gedung(){
        $sql = "select tbl_gedung.*, (SELECT COUNT(tbl_kamar.id_kamar)
        FROM tbl_kamar
        WHERE tbl_kamar.id_gedung = tbl_gedung.id_gedung
        ) as 'Penghuni'
        FROM tbl_gedung";
        $data = $this->db->query($sql);
        return $data->result();
    }

    public function get_detail_gedung($id_gedung){
        $sql = "select tbl_gedung.*, (SELECT COUNT(tbl_kamar.id_kamar)
        FROM tbl_kamar
        WHERE tbl_kamar.id_gedung = tbl_gedung.id_gedung
        ) as 'Penghuni'
        FROM tbl_gedung
        where tbl_gedung.id_gedung = '$id_gedung'";
        $data = $this->db->query($sql)->row_array();
        return $data;
    }

    public function add_gedung(){
        $data['id_gedung'] = $this->input->post('kode_gedung');
        $data['jenis_kelamin'] = $this->input->post('sex_gedung');
        if ($data['jenis_kelamin'] == "1"){
            $data['keterangan'] = "Gedung Laki - laki";
        }else{
            $data['keterangan'] = "Gedung Perempuan";
        }
        $this->db->insert("tbl_gedung", $data);
    }

    public function update_gedung($id_gedung){
        $data['id_gedung'] = $this->input->post('kode_gedung');
        $data['jenis_kelamin'] = $this->input->post('sex_gedung');
        if ($data['jenis_kelamin'] == "1"){
            $data['keterangan'] = "Gedung Laki - laki";
        }else{
            $data['keterangan'] = "Gedung Perempuan";
        }
        $this->db->where("id_gedung", $id_gedung);
        $udate = $this->db->update("tbl_gedung", $data);
        return $update;
    }

    public function get_kamar($id_gedung){
        $sql = "select tbl_kamar.*, (SELECT count(tbl_penghuni_tetap.nim)
                FROM tbl_penghuni_tetap 
                WHERE tbl_penghuni_tetap.kamar = tbl_kamar.id_kamar) as 'penghuni'
                FROM tbl_kamar
                where tbl_kamar.id_gedung = '$id_gedung'";

        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function get_kondisi(){
        return $this->db->get("tbl_kondisi_kamar")->result();
    }

    public function update_kondisi($id_kamar){
        $this->db->where("id_kamar", $id_kamar);
        $update = $this->db->update("tbl_kamar",array("kondisi"=>$this->input->post("kondisi")));
        return $update;
    }

    public function get_penghuni_kamar($kamar){
        $sql = "select * 
        FROM tbl_penghuni_tetap,tbl_pendaftaran, tbl_jurusan
        WHERE tbl_penghuni_tetap.nim = tbl_pendaftaran.nim and tbl_pendaftaran.id_jurusan = tbl_jurusan.id_jurusan 
        and tbl_penghuni_tetap.kamar = '$kamar' ";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function add_kamar($gedung){
        $old_kamar = $this->db->query("select * FROM tbl_kamar 
        WHERE tbl_kamar.id_kamar LIKE '".$gedung.$this->input->post("lantai")."%'
        order by tbl_kamar.id_kamar DESC limit 1")->row_array();
        $old_kamar_id = $old_kamar['id_kamar'];
        $new_urutan = substr($old_kamar_id,2)+1;
        if (strlen($new_urutan)==1){
            $new_urutan = "0".$new_urutan;
        }
        $data['id_kamar'] = $gedung.$this->input->post("lantai").$new_urutan;
        $data['id_gedung'] = $gedung;
        $data['kondisi'] = $this->input->post("kondisi");
        $add = $this->db->insert("tbl_kamar", $data);
        return $add;

    }

    // ===========================================================================


    //penghuni==============================================
    public function get_penghuni(){
        $sql = "select * FROM tbl_penghuni_tetap, tbl_pendaftaran, tbl_jurusan 
                WHERE tbl_penghuni_tetap.nim = tbl_pendaftaran.nim and tbl_pendaftaran.id_jurusan = tbl_jurusan.id_jurusan";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function get_penghuni_detail($nim){
        $sql = "select * FROM tbl_penghuni_tetap, tbl_pendaftaran, tbl_jurusan 
        WHERE tbl_penghuni_tetap.nim = tbl_pendaftaran.nim and tbl_pendaftaran.id_jurusan = tbl_jurusan.id_jurusan and tbl_penghuni_tetap.nim = '".$nim."'";
        $data = $this->db->query($sql)->row_array();
        return $data;
    }

    public function get_kamar_layak(){
        $sql = "select tbl_kamar.*, tbl_kondisi_kamar.keterangan, tbl_kelamin.ket_kelamin,(SELECT count(tbl_penghuni_tetap.nim)
        FROM tbl_penghuni_tetap 
        WHERE tbl_penghuni_tetap.kamar = tbl_kamar.id_kamar) as 'penghuni'
        FROM tbl_kamar, tbl_gedung, tbl_kelamin, tbl_kondisi_kamar
        where (SELECT count(tbl_penghuni_tetap.nim)
        FROM tbl_penghuni_tetap 
        WHERE tbl_penghuni_tetap.kamar = tbl_kamar.id_kamar) < 6 and tbl_kamar.kondisi <> 3 
        and tbl_kamar.id_gedung = tbl_gedung.id_gedung 
        and tbl_gedung.jenis_kelamin = tbl_kelamin.id_kelamin 
        and tbl_kondisi_kamar.id_kondisi = tbl_kamar.kondisi";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function get_pendaftar(){
        $sql = "select * FROM tbl_pendaftaran, tbl_jurusan
                WHERE tbl_jurusan.id_jurusan = tbl_pendaftaran.id_jurusan and tbl_pendaftaran.nim not IN (SELECT tbl_penghuni_tetap.nim FROM tbl_penghuni_tetap)";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function get_pendaftar_full(){
        $sql = "SELECT *, IF(tbl_pendaftaran.nim IN (SELECT tbl_penghuni_tetap.nim FROM tbl_penghuni_tetap), 'IN', 'NOT') as 'masuk' FROM tbl_pendaftaran, tbl_jurusan 
        where tbl_jurusan.id_jurusan = tbl_pendaftaran.id_jurusan
        ORDER BY `masuk`  DESC";
        $data = $this->db->query($sql)->result();
        return $data;
    }



    public function insert_penghuni(){
        $data['nim'] = $this->input->post("nim");
        $data['kamar'] = $this->input->post("kamar");
        return $this->db->insert("tbl_penghuni_tetap",$data);
    }

    public function get_musahil(){
        $sql = "select * from tbl_musahil, tbl_pendaftaran, tbl_jurusan where tbl_musahil.nim_musahil = tbl_pendaftaran.nim and tbl_jurusan.id_jurusan = tbl_pendaftaran.id_jurusan";
        $data = $this->db->query($sql)->result();
        return $data;
    }

    public function cek_NIM_musahil($nim){
        $sql = "select * from tbl_musahil where nim_musahil = '$nim'";
        $cek = $this->db->query($sql)->num_rows();
        return $cek;

    }

    public function get_musahil_detail($nim){
        $sql = "SELECT *, tbl_musahil.username as 'uname' FROM tbl_musahil, tbl_login, tbl_pendaftaran, tbl_jurusan
        WHERE tbl_login.id_level = '999' AND tbl_musahil.nim_musahil = tbl_pendaftaran.nim AND tbl_pendaftaran.id_jurusan = tbl_jurusan.id_jurusan AND tbl_musahil.nim_musahil = '$nim'";
        $data = $this->db->query($sql)->row_array();
        return $data;
    }

    public function delete_musahil($nim, $uname){
        $this->db->where("nim_musahil", $nim);
        $this->db->delete("tbl_musahil");
        $this->db->where("username", $uname);
        $this->db->delete("tbl_login");
        return true;
    }

    //profile======================================================
    public function reset_password($uname){
        $this->db->where("username", $uname);
        $update = $this->db->update("tbl_login", array("password"=>md5($this->input->post("new_pwd"))));
        return $update;
    }

    public function get_profile($nim){
        $data = $this->db->query("SELECT * FROM tbl_pendaftaran, tbl_login WHERE tbl_pendaftaran.username = tbl_login.username and nim = '$nim'")->row_array();
        return $data;
    }


    //profile======================================================


    // ===========================model berita================================/
    public function get_berita(){
        $data = $this->db->query("select * from berita order by post_date DESC")->result();
        return $data;
    }

    public function add_berita(){
        $data['id_berita'] = '';
        $data['judul_berita'] = $this->input->post("judul");
        $data['post_date'] = date(" d-m-Y");
        $data['isi'] = $this->input->post("isi");
        $insert = $this->db->insert("berita", $data);
        return $insert;
    }

    public function get_berita_detail($id_berita){
        $data = $this->db->get_where("berita", array("id_berita"=>$id_berita))->row_array();
        return $data;
    }

    public function update_berita($id_berita){
        $data['judul_berita'] = $this->input->post("judul");
        $data['isi'] = $this->input->post("isi");
        $data['post_date'] = date(" d-m-Y");
        $this->db->where("id_berita", $id_berita);
        $update = $this->db->update("berita", $data);
        return true;
    }

    public function delete_berita($id_berita){
        $this->db->where("id_berita", $id_berita);
        $delete = $this->db->delete("berita");
    }

    public function get_next_berita($id_berita){
        $sql = "select * from berita where id_berita > '$id_berita'";
        $cek = $this->db->query($sql)->num_rows();
        if($cek == 0){
            return "null";
        }else{
            return $this->db->query($sql)->row_array();
        }
    }

    public function get_prev_berita($id_berita){
        $sql = "select * from berita where id_berita < '$id_berita'";
        $cek = $this->db->query($sql)->num_rows();
        if($cek == 0){
            return "null";
        }else{
            return $this->db->query($sql)->row_array();
        }
    }

    // ===========================model berita================================/




    
  
}