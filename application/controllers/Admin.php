<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_admin');
        $this->load->model('m_musahil');
        $this->load->model('m_user');
        $this->load->model("Asrama_model", "am");
    }

    public function cek_session()
    {
        if ($this->session->userdata("username") !== null) {
            return true;
        } else {
            redirect("Asrama/");
            return false;
        }
    }

    public function cek_level()
    {
        if ($this->session->userdata("id_level") == 100) {
            $mylevel = "User";
        }
        if ($this->session->userdata("id_level") == 999) {
            $mylevel = "Musahil";
        }
        if ($this->session->userdata("id_level") == 1337) {
            $mylevel = "Admin";
        }

        return $mylevel;
    }

    public function index2()
    {
        $data['title'] = 'Dashboard Admin';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        $data['user'] = $this->m_admin->get_data();
        if ($data['user']) {
            $data['level'] = $this->session->userdata('id_level');
            $this->load->view('templates/dash_header', $data);
            $this->load->view('templates/admin');
            $this->load->view('templates/dash_footer');
        } else {
            $this->_not_found_user();
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Admin';
        $data['menu'] = 'Dashboard Admin';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        if ($this->session->userdata['id_level'] == 1337) {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $data['level'] = $this->session->userdata('id_level');
                $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
                $this->load->view('dash_header', $data);
                $this->load->view('Admin/dashboard_admin', $data);
                $this->load->view('dash_footer');
            } else {
                redirect('Asrama/');
            }
        } else {
            redirect('Asrama/');
        }
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        $data['main'] = [
            'menu' => 'Password'
        ];
        $data['user'] = $this->m_admin->get_data();
        if ($data['user']) {
            $data['level'] = $this->session->userdata('id_level');
            $this->form_validation->set_rules('password', 'Password Lama', 'trim|required');
            $this->form_validation->set_rules('password1', 'Password Baru', 'trim|required');
            $this->form_validation->set_rules('password2', 'Password Baru Lagi', 'trim|required|matches[password1]');
            if ($this->form_validation->run()) {
                $this->_change_password();
            } else {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/password');
                $this->load->view('templates/dash_footer');
            }
        } else {
            $this->_not_found_user();
        }
    }

    private function _change_password()
    {
        $password = md5($this->input->post('password'));
        $password1 = md5($this->input->post('password1'));

        if ($this->m_admin->set_password($password, $password1)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diganti. Silahkan login Ulang.</div>');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            $this->session->unset_userdata('id_level');
            $this->session->destroy;
            redirect('.');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Tidak Sama</div>');
            redirect('admin/password');
        }
    }

    private function _not_found_user()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_level');
        $this->session->destroy;
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Silahkan login ulang, pastikan data anda sudah benar. Kalau masih error, hubungi panitia pendaftaran.</div>');
        redirect('.');
    }

    public function fakultas($action, $id_fakultas = 0, $name = '')
    {
        $data['title'] = 'Dashboard';
        $data['main']['menu'] = 'Dashboard';
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Fakultas';
            $data['main']['menu'] = 'fakultas';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_admin->get_data();
            $data['table'] = $this->m_admin->fakultas($data['user']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/admin/fakultas');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit fakultas';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) {
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/admin/editfakultas');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }


    public function t_fakultas()
    {
        $data['title'] = 'Dashboard User - View Data Fakultas';
        $data['main']['menu'] = 'fakultas';
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->m_admin->get_data();
        $data['table'] = $this->m_admin->fakultas($data['user']);
        $post = $this->input->post();
        $proses = 0;
        if (isset($post['id_fakultas']) && isset($post['nama_fakultas'])) {
            if ($post['id_fakultas'] != '' && $post['nama_fakultas'] != '') {
                $data['id_fakultas'] = $post['id_fakultas'];
                $data['nama_fakultas'] = $post['nama_fakultas'];
                $this->m_admin->tambah_fakultas($data);
                $proses = 1;
            }
        }
        $data['table'] = $this->m_admin->fakultas($data['user']);
        $this->load->view('templates/dash_header', $data);
        if ($proses == 1) {
            $this->load->view('templates/admin/fakultas');
        } else {
            $this->load->view('templates/admin/tambah_fakultas');
        }
        $this->load->view('templates/dash_footer');
    }

    public function e_fakultas($id_fakultas)
    {
        $data['title'] = 'Dashboard User - View Data Fakultas';
        $data['main']['menu'] = 'fakultas';
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->m_admin->get_data();
        $data['id'] = $id_fakultas;
        $post = $this->input->post();
        $proses = 0;
        if (isset($post['id_fakultas']) && isset($post['nama_fakultas'])) {
            if ($post['id_fakultas'] != '' && $post['nama_fakultas'] != '') {
                $data['id_fakultas'] = $post['id_fakultas'];
                $data['nama_fakultas'] = $post['nama_fakultas'];
                $this->m_admin->edit_fakultas($data);
                $proses = 1;
            }
        }
        $data['table'] = $this->m_admin->fakultas($data['user']);
        $this->load->view('templates/dash_header', $data);
        if ($proses == 1) {
            $this->load->view('templates/admin/fakultas');
        } else {
            $this->load->view('templates/admin/edit_fakultas', $data);
        }
        $this->load->view('templates/dash_footer');
    }

    public function d_fakultas($id_fakultas)
    {
        $data['title'] = 'Dashboard User - View Data Fakultas';
        $data['main']['menu'] = 'fakultas';
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->m_admin->get_data();
        $data['id'] = $id_fakultas;
        $post = $this->input->post();
        $proses = 0;
        $data['id_fakultas'] = $id_fakultas;
        $this->m_admin->hapus_fakultas($data);
        $proses = 1;

        $data['table'] = $this->m_admin->fakultas($data['user']);
        $this->load->view('templates/dash_header', $data);
        $this->load->view('templates/admin/fakultas');
        $this->load->view('templates/dash_footer');
    }

    // gedung & kama4==========================================

    public function data_gedung()
    {
        $this->cek_session();
        $data['menu'] = "Data Gedung";
        $data['title'] = "Data Gedung";
        $data['main']['menu'] = "Data Gedung";
        $data['gedung'] = $this->am->get_gedung();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['list_ged'] = array();
        foreach ($data['gedung'] as $ged) {
            array_push($data['list_ged'], $ged->id_gedung);
        }
        $this->load->view('dash_header', $data);
        $this->load->view("admin/dataGedung", $data);
        $this->load->view('dash_footer', $data);
    }

    public function add_gedung()
    {
        $this->cek_session();
        $this->am->add_gedung();
        $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Gedung')</script>");
        redirect($this->cek_level() . "/data_gedung");
    }

    public function manage_gedung($id_gedung)
    {
        $this->cek_session();
        $data['menu'] = "Manage Gedung";
        $data['title'] = "Manage Gedung";
        $data['main']['menu'] = "Manage Gedung";
        $data['gedung'] = $this->am->get_detail_gedung($id_gedung);
        $data['gedung_all'] = $this->am->get_gedung();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['list_ged'] = array();
        foreach ($data['gedung_all'] as $ged) {
            array_push($data['list_ged'], $ged->id_gedung);
        }
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_gedung", $data);
        $this->load->view('dash_footer', $data);
    }

    public function update_gedung($id_gedung)
    {
        $this->cek_session();
        $update = $this->am->update_gedung($id_gedung);
        $this->session->set_flashdata('message', "<script>alert('Update Berhasil')</script>");
        redirect($this->cek_level() . "/data_gedung");
    }

    public function delete_gedung($id_gedung)
    {
        $this->cek_session();
        $this->db->where("id_Gedung", $id_gedung);
        $this->db->delete("tbl_gedung");
        $this->session->set_flashdata('message', "<script>alert('Data Berhasil Dihapus')</script>");
        redirect($this->cek_level() . "/data_gedung");
    }

    public function daftar_kamar($id_gedung)
    {
        $this->cek_session();
        $data['gedung'] = $id_gedung;
        $data['menu'] = "Data Kamar";
        $data['title'] = "Data Kamar";
        $data['main']['menu'] = "Data Kamar";
        $data['kamar'] = $this->am->get_kamar($id_gedung);
        $data['kondisi'] = $this->am->get_kondisi();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_kamar", $data);
        $this->load->view('dash_footer', $data);
    }

    public function update_kondisi($id_gedung, $id_kamar)
    {
        $this->cek_session();
        $update = $this->am->update_kondisi($id_kamar);
        if ($update) {
            $this->session->set_flashdata('message', "<script>alert('Berhasil Update Kondisi Kamar')</script>");
        } else {
            $this->session->set_flashdata('message', "<script>alert('something wrong')</script>");
        }
        redirect($this->cek_level() . "/daftar_kamar/" . $id_gedung);
    }

    public function daftar_penghuni_kamar($gedung, $id_kamar)
    {
        $this->cek_session();
        $data['id_kamar'] = $id_kamar;
        $data['menu'] = "Data Penghuni Kamar";
        $data['title'] = "Data Penghuni Kamar";
        $data['main']['menu'] = "Data Penghuni Kamar";
        $data['penghuni'] = $this->am->get_penghuni_kamar($id_kamar);
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_penghuni_kamar", $data);
        $this->load->view('dash_footer', $data);
    }

    public function add_kamar($gedung)
    {
        $add = $this->am->add_kamar($gedung);
        if ($add) {
            $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Kamar')</script>");
        } else {
            $this->session->set_flashdata('message', "<script>alert('Berhasil Tambah Kamar')</script>");
        }
        redirect($this->cek_level() . "/daftar_kamar/" . $gedung);
    }

    public function delete_kamar($gedung, $id_kamar)
    {
        $this->db->where("id_kamar", $id_kamar);
        $delete = $this->db->delete("tbl_kamar");
        if ($delete) {
            $this->session->set_flashdata('message', "<script>alert('Berhasil Hapus Kamar')</script>");
        } else {
            $this->session->set_flashdata('message', "<script>alert('Berhasil Hapus Kamar')</script>");
        }
        redirect($this->cek_level() . "/daftar_kamar/" . $gedung);
    }

    // ================================================================

    public function edit_profile()
    {
        $this->cek_session();
        $data['menu'] = "Edit Profile";
        $data['title'] = "Edit Profile";
        $data['main']['menu'] = "Edit Profile";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/editProfile", $data);
        $this->load->view('dash_footer');
    }

    public function data_penghuni()
    {
        $this->cek_session();
        $data['menu'] = "Data Penghuni";
        $data['title'] = "Data Penghuni";
        $data['main']['menu'] = "Data Penghuni";
        $data['penghuni'] = $this->am->get_penghuni();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_penghuni", $data);
        $this->load->view('dash_footer');
    }


    public function data_musahil()
    {
        $this->cek_session();
        $data['menu'] = "Data Musahil";
        $data['title'] = "Data Musahil";
        $data['main']['menu'] = "Data Musahil";
        $data['musahil'] = $this->am->get_musahil();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_musahil", $data);
        $this->load->view('dash_footer');
    }

    public function insert_musahil()
    {
        $this->cek_session();
        $data['menu'] = "Input Musahil Baru";
        $data['title'] = "Input Musahil Baru";
        $data['main']['menu'] = "Input Musahil Baru";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/insert_musahil", $data);
        $this->load->view('dash_footer', $data);
    }

    public function up_image($form_name, $file_name)
    {
        $config['upload_path']   = './uploaded/photoProfile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 700;
        $config['file_name'] = $file_name;
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($form_name)) {
            return false;
        } else {
            $array = explode('.', $_FILES[$form_name]['name']);
            $extension = end($array);
            return $config['file_name'] . '.' . $extension;
        }
    }

    public function add_musahil()
    {
        $password1 = $this->input->post("password1");
        $password2 = $this->input->post("password2");
        if ($password1 != $password2) {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Password didnt Match</div>");
            redirect($this->cek_level() . "/insert_musahil");
        } else {
            $data['nim_musahil'] = $this->input->post("nimMus");
            $cekNim = $this->am->cek_NIM_musahil($this->input->post("nimMus"));
            if ($cekNim == 0) {
                $data['nim_musahil'] = $this->input->post("nimMus");
                echo "1";
                $data['username'] = "M" . $this->input->post("nimMus");
                $dataMusahil = $this->db->get_where("tbl_pendaftaran", array("nim" => $data['nim_musahil']))->row_array();
                $data['nama'] = $dataMusahil['nama'];
                $data2['username'] =  $data['username'];
                $data2['password'] = md5($password1);
                $data2['id_level'] = "999";
                $data2['user_created'] = date("Y-m-d h:i:s");
                $data2['photo'] = $this->up_image("file", $data['username']);
                $this->db->insert("tbl_login", $data2);
                $this->db->insert("tbl_musahil", $data);
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Tambah Musahil</div>");
                redirect($this->cek_level() . "/data_musahil");
            } else {
                $this->session->set_flashdata('message', "<div class='alert alert-danger'>Nim Sudah ada</div>");
                redirect($this->cek_level() . "/insert_musahil");
            }
        }
    }

    public function manage_musahil($nim)
    {
        $this->cek_session();
        $data['menu'] = "Manage Musahil";
        $data['title'] = "Manage Musahil";
        $data['main']['menu'] = "Manage Musahil";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['musahil'] = $this->am->get_musahil_detail($nim);
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_musahil", $data);
        $this->load->view('dash_footer', $data);
    }

    public function delete_musahil($nim, $uname)
    {
        $this->cek_session();
        $delete = $this->am->delete_musahil($nim, $uname);
        if ($delete) {
            $this->session->set_flashdata('message', "<div class='alert alert-warning'>Berhasil Hapus Musahil $nim</div>");
            redirect($this->cek_level() . "/data_musahil");
        }
    }

    public function reset_password_mus($nim, $uname)
    {
        $this->cek_session();
        $new = $this->input->post("new_pwd");
        $old = $this->input->post("old_pwd");
        $cek = $this->db->get_where('tbl_login', ['username' => $uname, 'password' => md5($old)])->row_array();
        var_dump($cek);
        if ($cek) {
            $update = $this->am->reset_password($uname);
            if ($update) {
                $this->session->set_flashdata('message', "<div class='alert alert-success'>Password updated</div>");
                redirect($this->cek_level() . "/manage_musahil/" . $nim);
            }
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Old Password Is Wrong</div>");
            redirect($this->cek_level() . "/manage_musahil/" . $nim);
        }
    }

    public function insert_penghuni()
    {
        $this->cek_session();
        $data['menu'] = "Input Penghuni Baru";
        $data['title'] = "Input Penghuni Baru";
        $data['main']['menu'] = "Input Penghuni Baru";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['kamar'] = $this->am->get_kamar_layak();
        $data['mahasiswa'] = $this->am->get_pendaftar();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/insert_penghuni", $data);
        $this->load->view('dash_footer', $data);
    }

    public function manage_penghuni($nim)
    {
        $this->cek_session();
        $data['menu'] = "Data Penghuni";
        $data['title'] = "Data Penghuni";
        $data['main']['menu'] = "Data Penghuni";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['penghuni'] = $this->am->get_penghuni_detail($nim);
        $data['kamar'] = $this->am->get_kamar_layak();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/manage_penghuni", $data);
        $this->load->view('dash_footer', $data);
    }

    public function update_kamar_penghuni($nim)
    {
        $this->cek_session();
        $this->db->where("nim", $nim);
        $this->db->update("tbl_penghuni_tetap", array("kamar" => $this->input->post("kamar")));
        $this->session->set_flashdata('message', "<div class='alert alert-success'>Berhasil Update Kamar Pemghuni'</div>");
        redirect($this->cek_level() . "/manage_penghuni/" . $nim);
    }

    public function delete_penghuni($nim)
    {
        $this->cek_session();
        $this->db->where("nim", $nim);
        $delete = $this->db->delete("tbl_penghuni_tetap");
        redirect($this->cek_level() . "/data_penghuni");
    }

    public function get_pendaftar()
    {
        $data = $this->am->get_pendaftar();
        $output = array();
        foreach ($data as $d) {
            array_push($output, array('value' => $d->nim,));
        }
        if (!empty($output)) {
            // Encode ke format JSON.
            echo json_encode($output);
        }
    }

    public function get_penghuni_json()
    {
        $data = $this->am->get_penghuni();
        $output = array();
        foreach ($data as $d) {
            array_push($output, array('value' => $d->nim,));
        }
        if (!empty($output)) {
            // Encode ke format JSON.
            echo json_encode($output);
        }
    }

    public function add_penghuni()
    {
        $this->cek_session();
        $insert = $this->am->insert_penghuni();
        $nim = $this->input->post("nim");
        $mylevel = $this->cek_level();
        if ($insert) {
            $this->session->set_flashdata('message', "<div class='alert alert-success'>Data Berhasil Ditambah Cetak <a href='" . base_url("$mylevel/cetak_bukti/$nim") . "' target='_blank'>disini</a></div>");
        } else {
            $this->session->set_flashdata('message', "<div class='alert alert-danger'>Something Wrong</div>");
        }
        redirect($this->cek_level() . "/insert_penghuni");
    }

    public function cetak_bukti($nim)
    {
        $this->cek_session();
        $data['menu'] = "Bukti Pendaftaran";
        $data['title'] = "Bukti Pendaftaran";
        $data['main']['menu'] = "Bukti Pendaftaran";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['nim'] = $nim;
        $data['bukti'] = $this->am->get_penghuni_detail($nim);
        $this->load->view("Admin/bukti", $data);
    }

    public function data_pendaftaran()
    {
        $data['title'] = 'Dashboard Pendaftaran';
        $data['main']['menu'] = 'Dashboard Pendaftaran';
        $this->cek_session();
        $data['menu'] = "Data Pendaftaran";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['pendaftar'] = $this->am->get_pendaftar_full();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_pendaftaran", $data);
        $this->load->view('dash_footer', $data);
    }

    public function post_data()
    {
        $this->cek_session();
        $data['menu'] = "Data Berita";
        $data['title'] = "Data Berita";
        $data['main']['menu'] = "Data Berita";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['berita'] = $this->am->get_berita();
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_berita", $data);
        $this->load->view('dash_footer');
    }

    public function post_detail($id_berita)
    {
        $this->cek_session();
        $data['menu'] = "Update Berita";
        $data['title'] = "Update Berita";
        $data['main']['menu'] = "Update Berita";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['berita'] = $this->am->get_berita_detail(($id_berita));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/update_post", $data);
        $this->load->view('dash_footer');
    }

    public function update_post($id_berita)
    {
        $this->cek_session();
        $update = $this->am->update_berita($id_berita);
        if ($update) {
            $this->session->set_flashdata('message', "
            <script>alert('Berita Berhasil Update')</script>
            <div class='alert alert-success'>Berita berhasil diupdate</div>
            ");
            redirect("Admin/post_data");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Berita gagal diupdate')</script>
            <div class='alert alert-danger'>Berita gagal diupdate</div>
            ");
            redirect("Admin/post_data");
        }
    }

    public function delete_berita($id_berita)
    {
        $this->cek_session();
        $delete = $this->am->delete_berita($id_berita);
        if ($delete) {
            $this->session->set_flashdata('message', "
            <script>alert('Berita Berhasil Dihapus')</script>
            <div class='alert alert-success'>Berita berhasil dihapus</div>
            ");
            redirect("Admin/post_data");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Berita Berhasil Dihapus')</script>
            <div class='alert alert-warning'>Berita Berhasil dihapus</div>
            ");
            redirect("Admin/post_data");
        }
    }

    public function tambah_berita()
    {
        $this->cek_session();
        $data['menu'] = "Tambah Berita Berita";
        $data['title'] = "Tambah Berita Berita";
        $data['main']['menu'] = "Tambah Berita Berita";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/add_post", $data);
        $this->load->view('dash_footer');
    }

    public function add_post()
    {
        $this->cek_session();
        $add = $this->am->add_berita();
        if ($add) {
            $this->session->set_flashdata('message', "
            <script>alert('Berita Berhasil Ditambah')</script>
            <div class='alert alert-success'>Berita berhasil ditambah</div>
            ");
            redirect("Admin/post_data");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Berita Gagal Ditambah')</script>
            <div class='alert alert-danger'>Berita gagal ditambah</div>
            ");
            redirect("Admin/post_data");
        }
    }

    public function view_file()
    {
        $this->cek_session();
        $dir = './uploaded/news_image/';
        $data['file'] = array_diff(scandir($dir), array('.', '..', 'index.html'));
        $data['menu'] = "Manage File";
        $data['title'] = "Manage File";
        $data['main']['menu'] = "Manage File";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_file", $data);
        $this->load->view('dash_footer');
    }


    public function upload_file($name, $form_name)
    {
        $config['upload_path']   = './uploaded/news_image/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg|pdf|doc|txt';
        $config['max_size'] = 2000;
        $config['file_name'] = $name . "_f_" . uniqid();
        $config['overwrite'] = true;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($form_name)) {
            return false;
        } else {
            $array = explode('.', $_FILES[$form_name]['name']);
            $extension = end($array);
            return $config['file_name'] . '.' . $extension;
        }
    }

    public function up_file()
    {
        $this->cek_session();
        $name = $this->input->post("file_name");
        $upload = $this->upload_file($name, "file");
        if ($upload != false) {
            $this->session->set_flashdata('message', "
            <script>alert('Berhasil Upload File')</script>
            <div class='alert alert-success'>File berhasil diupload</div>
            ");
            redirect("Admin/view_file");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Gagal Upload File')</script>
            <div class='alert alert-danger'>Gagal Upload File</div>
            ");
            redirect("Admin/view_file");
        }
    }

    public function delete_file($file)
    {
        $this->cek_session();
        $file_name = './uploaded/news_image/' . $file;
        if (unlink($file_name)) {
            $this->session->set_flashdata('message', "
            <script>alert('Berhasil Hapus File')</script>
            <div class='alert alert-success'>File berhasil dihapus</div>
            ");
            redirect("Admin/view_file");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Gagal Hapus File')</script>
            <div class='alert alert-danger'>Gagal Hapus File</div>
            ");
            redirect("Admin/view_file");
        }
    }

    public function update_info()
    {
        $this->cek_session();
        $data['menu'] = "Update Berita";
        $data['title'] = "Update Berita";
        $data['main']['menu'] = "Update Berita";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['berita'] = $this->am->get_berita_detail(("999"));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/update_post", $data);
        $this->load->view('dash_footer');
    }
}
