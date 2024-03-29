<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');
        $this->load->model('m_db');
        $this->load->model("Asrama_model", "am");

        if ($this->session->userdata['id_level'] != 100) {
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

    public function index()
    {
        $data['title'] = 'Dashboard user';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        $data['user'] = $this->m_user->get_data();
        $data['gedung'] = substr($this->m_user->get_kamar($data['user']['nim']), 0, 1);
        $data['kamar'] = substr($this->m_user->get_kamar($data['user']['nim']), 1);
        if ($data['user']) {
            $data['level'] = $this->session->userdata('id_level');
            $this->load->view('templates/dash_header', $data);
            $this->load->view('templates/user');
            $this->load->view('templates/dash_footer');
        } else {
            $this->_not_found_user();
        }
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
                redirect($this->cek_level() . "/profile/view");
            }
        } else {
            $this->session->set_flashdata('message', "
            <script>alert('Data Terlalu Besar Maksimal 700kb')</script>
            <div class='alert alert-danger'>Data Terlalu Besar Maksimal 700kb</div>
            ");
            redirect($this->cek_level() . "/profile/view");
        }
    }


    public function password()
    {
        $data['title'] = 'Change Password';
        $data['main'] = [
            'menu' => 'Password'
        ];
        $data['user'] = $this->m_user->get_data();
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

        if ($this->m_user->set_password($password, $password1)) {
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Password Berhasil Diganti. Silahkan login Ulang.</div>');
            $this->session->unset_userdata('username');
            $this->session->unset_userdata('password');
            $this->session->unset_userdata('id_level');
            $this->session->destroy;
            redirect('.');
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Password Lama Tidak Sama</div>');
            redirect('user/password');
        }
    }

    public function profile($action = 'view')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Pendaftaran';
            $data['main']['menu'] = 'View Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $nim = substr($this->session->userdata('username'), 1);
            $data['data'] = $this->am->get_profile($nim);
            $data['jur'] = $this->db->get("tbl_jurusan")->result();
            $data['nim'] = $nim;
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/pendaftaran_view');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['user_edit'] = $this->m_user->get_data_edit();
            $data['fakultas'] = $this->m_db->readFakultas();
            $data['jurusan'] = $this->m_db->readJurusan();
            $data['sex'] = $this->m_db->readJenisKelamin();
            $data['jalurmasuk'] = $this->m_db->readJalurMasuk();
            $nim = substr($this->session->userdata('username'), 1);
            $data['data'] = $this->am->get_profile($nim);
            $data['jur'] = $this->db->get("tbl_jurusan")->result();
            $data['nim'] = $nim;
            if ($data['user']) {
                $this->form_validation->set_rules('nama', 'Nama', 'trim|required');
                $this->form_validation->set_rules('nim', 'NIM', 'trim|required|exact_length[12]');
                $this->form_validation->set_rules('jurusan', 'Jurusan', 'trim|required');
                $this->form_validation->set_rules('jalurmasuk', 'Jalur Masuk', 'trim|required');
                $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'trim|required');
                $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'trim|required');
                $this->form_validation->set_rules('sex', 'Jenis Kelamin', 'trim|required');
                $this->form_validation->set_rules('notelp', 'Nomor Telp', 'trim|required|min_length[6]');
                $this->form_validation->set_rules('alamat', 'Alamat', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama          = $this->input->post('nama');
                    $nim           = $this->input->post('nim');
                    $jurusan       = $this->input->post('jurusan');
                    $jalurmasuk    = $this->input->post('jalurmasuk');
                    $tempat_lahir  = $this->input->post('tempat_lahir');
                    $tanggal_lahir = $this->input->post('tanggal_lahir');
                    $sex           = $this->input->post('sex');
                    $notelp        = $this->input->post('notelp');
                    $alamat        = $this->input->post('alamat');
                    if ($this->m_user->updateProfile($nama, $nim, $jurusan, $jalurmasuk, $tempat_lahir, $tanggal_lahir, $sex, $notelp, $alamat)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Data Gagal</div>');
                    }
                    redirect('user/profile/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/pendaftaran_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function hobi($action = 'view', $id = 0, $ket = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Hobi';
            $data['main']['menu'] = 'hobi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readHobi($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTableHobi');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Hobi';
            $data['main']['menu'] = 'hobi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                $this->form_validation->set_rules('ket_hobi', 'Hobi', 'trim|required');
                if ($this->form_validation->run()) {
                    $ket_hobi = $this->input->post('ket_hobi');
                    if ($this->m_user->addHobi($data['user']['nim'], $ket_hobi)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/hobi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/hobi_add');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Hobi';
            $data['main']['menu'] = 'hobi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['hobi'] = $this->m_user->readHobiWhere($data['user']['nim'], $id, base64_decode($ket));
            if ($data['user']) {
                $this->form_validation->set_rules('ket_hobi', 'Hobi', 'trim|required');
                if ($this->form_validation->run()) {
                    $ket_hobi = $this->input->post('ket_hobi');
                    if ($this->m_user->updateHobiWhere($data['user']['nim'], $id, base64_decode($ket), $ket_hobi)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Data Gagal</div>');
                    }
                    redirect('user/hobi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/hobi_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->m_user->deleteHobiWhere($data['user']['nim'], $id, base64_decode($ket))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('user/hobi/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function orangtua($action = 'view')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Orang Tua';
            $data['main']['menu'] = 'orangtua';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readOrangtua($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/orangtua_view');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readOrangtua($data['user']['nim']);
            if ($data['user']) {
                $this->form_validation->set_rules('nama_ayah', 'Nama Ayah', 'trim|required');
                $this->form_validation->set_rules('pekerjaan_ayah', 'Pekerjaan Ayah', 'trim|required');
                $this->form_validation->set_rules('nama_ibu', 'Nama Ibu', 'trim|required');
                $this->form_validation->set_rules('pekerjaan_ibu', 'Pekerjaan Ibu', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_ayah = $this->input->post('nama_ayah');
                    $pekerjaan_ayah = $this->input->post('pekerjaan_ayah');
                    $telp_ayah = $this->input->post('telp_ayah');
                    $nama_ibu = $this->input->post('nama_ibu');
                    $pekerjaan_ibu = $this->input->post('pekerjaan_ibu');
                    $telp_ibu = $this->input->post('telp_ibu');
                    if ($this->m_user->updateOrangtua($data['user']['nim'], $nama_ayah, $pekerjaan_ayah, $telp_ayah, $nama_ibu, $pekerjaan_ibu, $telp_ibu)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Data Gagal</div>');
                    }
                    redirect('user/orangtua/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/orangtua_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function organisasi($action = 'view', $id = 0, $name = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Organisasi';
            $data['main']['menu'] = 'organisasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readOrganisasi($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTableOrganisasi');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Organisasi';
            $data['main']['menu'] = 'organisasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                $this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'trim|required');
                $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'trim|required');
                $this->form_validation->set_rules('tahun_selesai', 'Tahun Selesai', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_organisasi = $this->input->post('nama_organisasi');
                    $tahun_masuk = $this->input->post('tahun_masuk');
                    $tahun_selesai = $this->input->post('tahun_selesai');
                    if ($this->m_user->addOrganisasi($data['user']['nim'], $nama_organisasi, $tahun_masuk, $tahun_selesai)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/organisasi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/organisasi_add');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Data Organisasi';
            $data['main']['menu'] = 'organisasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readOrganisasiWhere($data['user']['nim'], $id, base64_decode($name));
            if ($data['user']) {
                $this->form_validation->set_rules('nama_organisasi', 'Nama Organisasi', 'trim|required');
                $this->form_validation->set_rules('tahun_masuk', 'Tahun Masuk', 'trim|required');
                $this->form_validation->set_rules('tahun_selesai', 'Tahun Selesai', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_organisasi = $this->input->post('nama_organisasi');
                    $tahun_masuk = $this->input->post('tahun_masuk');
                    $tahun_selesai = $this->input->post('tahun_selesai');
                    if ($this->m_user->updateOrganisasiWhere($data['user']['nim'], $id, base64_decode($name), $nama_organisasi, $tahun_masuk, $tahun_selesai)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Data Gagal</div>');
                    }
                    redirect('user/organisasi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/organisasi_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->m_user->deleteOrganisasiWhere($data['user']['nim'], $id, base64_decode($name))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('user/organisasi/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function prestasi($action = 'view', $id = 0, $name = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Prestasi';
            $data['main']['menu'] = 'prestasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readPrestasi($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTablePrestasi');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Prestasi';
            $data['main']['menu'] = 'prestasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                $this->form_validation->set_rules('nama_prestasi', 'Nama Prestasi', 'trim|required');
                $this->form_validation->set_rules('tahun_prestasi', 'Tahun Prestasi', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_prestasi = $this->input->post('nama_prestasi');
                    $tahun_prestasi = $this->input->post('tahun_prestasi');
                    $berkas_prestasi = $this->_uploadImagePrestasi($data['user']['nim'] . "_" . $nama_prestasi);
                    if ($this->m_user->addPrestasi($data['user']['nim'], $nama_prestasi, $tahun_prestasi, $berkas_prestasi)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/prestasi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/prestasi_add');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Data Prestasi';
            $data['main']['menu'] = 'prestasi';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readPrestasiWhere($data['user']['nim'], $id, base64_decode($name));
            if ($data['user']) {
                $this->form_validation->set_rules('nama_prestasi', 'Nama Prestasi', 'trim|required');
                $this->form_validation->set_rules('tahun_prestasi', 'Tahun Prestasi', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_prestasi = $this->input->post('nama_prestasi');
                    $tahun_prestasi = $this->input->post('tahun_prestasi');
                    if (!empty($_FILES['berkas_prestasi']['name'])) {
                        $berkas_prestasi = $this->_uploadImagePrestasi($data['user']['nim'] . "_" . $nama_prestasi);
                    } else {
                        $berkas_prestasi = $data['table']['berkas_prestasi'];
                    }
                    if ($this->m_user->updatePrestasiWhere($data['user']['nim'], $id, base64_decode($name), $nama_prestasi, $tahun_prestasi, $berkas_prestasi)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Update Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Update Data Gagal</div>');
                    }
                    redirect('user/prestasi/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/prestasi_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->m_user->deletePrestasiWhere($data['user']['nim'], $id, base64_decode($name))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('user/prestasi/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function pendidikan($action = 'view', $id = 0, $name = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Prestasi';
            $data['main']['menu'] = 'pendidikan';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readRiwayatPendidikan($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTableRiwayatPendidikan');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Riwayat Pendidikan';
            $data['main']['menu'] = 'pendidikan';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['jenjangpendidikan'] = $this->m_user->readPendidikan();
            if ($data['user']) {
                $this->form_validation->set_rules('jenjangpendidikan', 'Jenjang Pendidikan', 'trim|required');
                $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required');
                $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');
                if ($this->form_validation->run()) {
                    $jenjangpendidikan = $this->input->post('jenjangpendidikan');
                    $nama_sekolah = $this->input->post('nama_sekolah');
                    $tahun_lulus = $this->input->post('tahun_lulus');
                    if ($this->m_user->addRiwayatPendidikan($data['user']['nim'], $jenjangpendidikan, $nama_sekolah, $tahun_lulus)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/pendidikan/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/pendidikan_add');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Data Riwayat Pendidikan';
            $data['main']['menu'] = 'pendidikan';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['jenjangpendidikan'] = $this->m_user->readPendidikan();
            $data['table'] = $this->m_user->readRiwayatPendidikanWhere($data['user']['nim'], $id, base64_decode($name));
            if ($data['user']) {
                $this->form_validation->set_rules('jenjangpendidikan', 'Jenjang Pendidikan', 'trim|required');
                $this->form_validation->set_rules('nama_sekolah', 'Nama Sekolah', 'trim|required');
                $this->form_validation->set_rules('tahun_lulus', 'Tahun Lulus', 'trim|required');
                if ($this->form_validation->run()) {
                    $jenjangpendidikan = $this->input->post('jenjangpendidikan');
                    $nama_sekolah = $this->input->post('nama_sekolah');
                    $tahun_lulus = $this->input->post('tahun_lulus');
                    if ($this->m_user->updateRiwayatPendidikan($data['user']['nim'], $id, base64_decode($name), $jenjangpendidikan, $nama_sekolah, $tahun_lulus)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/pendidikan/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/pendidikan_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->m_user->deleteRiwayatPendidikan($data['user']['nim'], $id, base64_decode($name))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('user/pendidikan/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function riwayatsakit($action = 'view', $id = 0, $name = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Riwayat Sakit';
            $data['main']['menu'] = 'riwayatsakit';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readRiwayatSakit($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTableRiwayatSakit');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Organisasi';
            $data['main']['menu'] = 'riwayatsakit';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'trim|required');
                $this->form_validation->set_rules('ket_penyakit', 'Keterangan Tambahan', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_penyakit = $this->input->post('nama_penyakit');
                    $ket_penyakit = $this->input->post('ket_penyakit');
                    if ($this->m_user->addRiwayatSakit($data['user']['nim'], $nama_penyakit, $ket_penyakit)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/riwayatsakit/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/riwayatsakit_add');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Data Riwayat Sakit';
            $data['main']['menu'] = 'riwayatsakit';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readRiwayatSakitWhere($data['user']['nim'], $id, base64_decode($name));
            if ($data['user']) {
                $this->form_validation->set_rules('nama_penyakit', 'Nama Penyakit', 'trim|required');
                $this->form_validation->set_rules('ket_penyakit', 'Keterangan Tambahan', 'trim|required');
                if ($this->form_validation->run()) {
                    $nama_penyakit = $this->input->post('nama_penyakit');
                    $ket_penyakit = $this->input->post('ket_penyakit');
                    if ($this->m_user->updateRiwayatSakit($data['user']['nim'], $id, base64_decode($name), $nama_penyakit, $ket_penyakit)) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Tambah Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Tambah Data Gagal</div>');
                    }
                    redirect('user/riwayatsakit/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/riwayatsakit_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'delete') {
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->m_user->deleteRiwayatSakitWhere($data['user']['nim'], $id, base64_decode($name))) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('user/riwayatsakit/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function berkas($action = 'view', $kolom = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Berkas';
            $data['main']['menu'] = 'berkas';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readBerkas($data['user']['nim']);
            $data['table_validasi'] = $this->m_user->readValidasiBerkas($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/berkas_view');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Data Berkas';
            $data['main']['menu'] = 'riwayatsakit';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['kolom'] = $kolom;
            $data['table'] = $this->m_user->readBerkas($data['user']['nim']);
            if ($data['user']) {
                if (isset($_POST['submit'])) {
                    if (!empty($_FILES[$kolom]['name'])) {
                        $berkas_name = $this->_uploadImage($kolom, $data['user']['nim']);
                    } else {
                        $berkas_name = $data['table'][$kolom];
                    }
                    if ($this->m_user->updateBerkas($data['user']['nim'], $kolom, $berkas_name) || !empty($_FILES[$kolom]['name'])) {
                        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Operasi Data Berhasil.</div>');
                    } else {
                        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Operasi Data Gagal</div>');
                    }
                    redirect('user/berkas/view');
                } else {
                    $this->load->view('templates/dash_header', $data);
                    $this->load->view('templates/user/berkas_edit');
                    $this->load->view('templates/dash_footer');
                }
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    private function _uploadImagePrestasi($namafile)
    {
        $config['upload_path']          = './upload/prestasi/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $namafile;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('berkas_prestasi')) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _uploadImage($folder, $namafile)
    {
        $config['upload_path']          = './upload/' . $folder . '/';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['file_name']            = $namafile;
        $config['overwrite']            = true;
        $config['max_size']             = 1024; // 1MB

        $this->load->library('upload', $config);

        if ($this->upload->do_upload($folder)) {
            return $this->upload->data("file_name");
        }

        return "default.jpg";
    }

    private function _not_found_user()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_level');
        $this->session->destroy;
        $this->session->set_flashdata('message', '<div class="alert alert-warning" role="alert">Silahkan login ulang, pastikan data anda sudah benar. Kalau masih error, hubungi panitia useran.</div>');
        redirect('.');
    }
}
