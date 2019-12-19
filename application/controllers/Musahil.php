<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Musahil extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_musahil');
        $this->load->model('m_user');
        $this->load->model("Asrama_model", "am");
    }

    public function index2()
    {
        $data['title'] = 'Dashboard Musahil';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        $data['user'] = $this->m_musahil->get_data();
        if ($data['user']) {
            $data['level'] = $this->session->userdata('id_level');
            $this->load->view('templates/dash_header', $data);
            $this->load->view('templates/musahil');
            $this->load->view('templates/dash_footer');
        } else {
            $this->_not_found_user();
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard Musahil';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        if ($this->session->userdata['id_level'] == 999) {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $data['level'] = $this->session->userdata('id_level');
                $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
                $this->load->view('dash_header', $data);
                $this->load->view('Musahil/dashboard_musahil', $data);
                $this->load->view('dash_footer');
            } else {
                redirect('.');
            }
        } else {
            redirect('.');
        }
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

    public function daftar_kamar($id_gedung)
    {
        $this->cek_session();
        $data['gedung'] = $id_gedung;
        $data['title'] = "Data Kamar";
        $data['menu'] = "Data Kamar";
        $data['kamar'] = $this->am->get_kamar($id_gedung);
        $data['kondisi'] = $this->am->get_kondisi();
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_kamar", $data);
        $this->load->view('dash_footer', $data);
    }

    public function daftar_penghuni_kamar($gedung, $id_kamar)
    {
        $this->cek_session();
        $data['id_kamar'] = $id_kamar;
        $data['title'] = "Data Penghuni Kamar";
        $data['menu'] = "Data Penghuni Kamar";
        $data['penghuni'] = $this->am->get_penghuni_kamar($id_kamar);
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $this->load->view('dash_header', $data);
        $this->load->view("admin/data_penghuni_kamar", $data);
        $this->load->view('dash_footer', $data);
    }

    public function edit_profile()
    {
        $this->cek_session();
        $data['title'] = "Edit Profile";
        $data['menu'] = "Edit Profile";
        $data['main']['menu'] = 'Edit Profile';
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $nim = substr($this->session->userdata('username'), 1);
        $data['data'] = $this->am->get_profile($nim);
        $data['jur'] = $this->db->get("tbl_jurusan")->result();
        $data['nim'] = $nim;
        $this->load->view('dash_header', $data);
        $this->load->view("Musahil/edit_profile", $data);
        $this->load->view('dash_footer', $data);
    }

    public function update_profile()
    {
        $this->cek_session();
        $data["nama"] = $this->input->post("nama");
        $data["tanggal_lahir"] = $this->input->post("tgl");
        $data["tempat_lahir"] = $this->input->post("lahir");
        $data["alamat"] = $this->input->post("alamat");
        $data["id_jurusan"] = $this->input->post("jurusan");
        $nim = substr($this->session->userdata('username'), 1);
        $this->db->where("nim", $nim);
        $update = $this->db->update("tbl_pendaftaran", $data);
        if ($update) {
            $this->session->set_flashdata('message', "
            <script>alert('Data Berhasil Diupdate')</script>
            <div class='alert alert-success'>Data Berhasil Diupdate</div>
            ");
            redirect($this->cek_level() . "/edit_profile");
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Data Gagal Diupdate')</script>
            <div class='alert alert-danger'>Data gagal Diupdate</div>
            ");
            redirect($this->cek_level() . "/edit_profile");
        }
    }

    public function up_image($form_name, $file_name)
    {
        $config['upload_path']   = './uploaded/photoProfile/';
        $config['allowed_types'] = 'gif|jpg|png|jpeg';
        $config['max_size'] = 700;
        $config['file_name'] = $file_name . uniqid();
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

    public function update_pp()
    {
        $this->cek_session();
        $data = $this->up_image("file", $this->session->userdata("username"));
        if ($data != false) {
            $nim = substr($this->session->userdata('username'), 1);
            $update = $this->db->query("update tbl_login set photo = '$data' where username like '%" . $nim . "'");
            if ($update) {
                $this->session->set_flashdata('message', "
            <script>alert('Data Berhasil Diupdate')</script>
            <div class='alert alert-success'>Data Berhasil Diupdate</div>
            ");
                redirect($this->cek_level() . "/edit_profile");
            }
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Data Terlalu Besar Maksimal 700kb')</script>
            <div class='alert alert-danger'>Data Terlalu Besar Maksimal 700kb</div>
            ");
            redirect($this->cek_level() . "/edit_profile");
        }
    }

    public function cetak_bukti($nim)
    {
        $this->cek_session();
        $data['title'] = "Bukti Pendaftaran";
        $data['menu'] = "Bukti Pendaftaran";
        $data['level'] = $this->session->userdata('id_level');
        $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        $data['nim'] = $nim;
        $data['bukti'] = $this->am->get_penghuni_detail($nim);
        $this->load->view("Admin/bukti", $data);
    }

    public function password()
    {
        $data['title'] = 'Change Password';
        $data['main'] = [
            'menu' => 'Password'
        ];
        $data['user'] = $this->m_musahil->get_data();
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

        if ($this->m_musahil->set_password($password, $password1)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diganti. Silahkan login Ulang.</div>');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            $this->session->unset_userdata('id_level');
            $this->session->destroy;
            redirect('.');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Tidak Sama</div>');
            redirect('musahil/password');
        }
    }


    public function manage_token($action = 'view', $nim = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard Musahil - View Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            $data['table'] = $this->m_musahil->get_data_token();
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/dataTableToken');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
                $this->form_validation->set_rules('token', 'TOKEN', 'trim|required');
                if ($this->form_validation->run()) {
                    $nim = $this->input->post('nim');
                    $password = md5($this->input->post('token'));
                    if ($this->m_musahil->add_token($nim, $password)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }

                    $username = $this->m_musahil->get_username($nim);
                    echo "USERNAME\t\t= " . $username;
                    echo "<br>PASSWORD\t= " . $this->input->post('token');
                    // redirect('musahil/manage_token/view');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Update Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            $data['nim'] = base64_decode($nim);
            if ($data['user']) {
                $this->form_validation->set_rules('nim', 'NIM', 'trim|required');
                $this->form_validation->set_rules('token', 'TOKEN', 'trim|required');
                if ($this->form_validation->run()) {
                    $nimbaru = $this->input->post('nim');
                    $password = md5($this->input->post('token'));
                    if ($this->m_musahil->updateToken(base64_decode($nim), $nimbaru, $password) > 0) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Ubah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Ubah Data Gagal</div>');
                    }

                    $username = $this->m_musahil->get_username(base64_decode($nim));
                    echo "USERNAME\t\t= " . $username;
                    echo "<br>PASSWORD\t= " . $this->input->post('token');
                    // redirect('musahil/manage_token/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/musahil/token_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                if ($this->m_musahil->delete_token(base64_decode($nim)) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect($this->cek_level() . '/manage_token/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function validasi_berkas($action = 'view', $nim = '')
    {
        if ($action == 'view' && $nim == '') {
            $data['title'] = 'Dashboard Musahil - View Data Validasi';
            $data['main']['menu'] = 'Validasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            $data['table'] = $this->m_musahil->get_data_validasi();
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/musahil/dataTableValidasi');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'view') {
            $nim = base64_decode($nim);
            $data['title'] = 'Dashboard Musahil - View Data Validasi';
            $data['main']['menu'] = 'Validasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            $data['pendaftar'] = $this->m_musahil->get_data_pendaftar($nim);
            $data['orangtua']  = $this->m_user->readOrangtua($nim);
            $data['hobi']  = $this->m_user->readHobi($nim);
            $data['organisasi']  = $this->m_user->readOrganisasi($nim);
            $data['prestasi']  = $this->m_user->readPrestasi($nim);
            $data['pendidikan']  = $this->m_user->readRiwayatPendidikan($nim);
            $data['riwayatsakit']  = $this->m_user->readRiwayatSakit($nim);
            $data['berkas']  = $this->m_user->readBerkas($nim);

            $data['nim'] = $nim;
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/musahil/validasi_view');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'validasi') {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                if ($this->m_musahil->validasi_data_pendaftar(base64_decode($nim)) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Validasi Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Validasi Data Gagal</div>');
                }
                redirect($this->cek_level() . '/validasi_berkas/view');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'unvalidasi') {
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
            if ($data['user']) {
                if ($this->m_musahil->unvalidasi_data_pendaftar(base64_decode($nim)) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">unValidasi Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">unValidasi Data Gagal</div>');
                }
                redirect($this->cek_level() . '/validasi_berkas/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
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
}
