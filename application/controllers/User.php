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

        if ($this->session->userdata['id_level'] != 100) {
            redirect('.');
        }
    }

    public function index()
    {
        $data['title'] = 'Dashboard user';
        $data['main'] = [
            'menu' => 'Dashboard'
        ];
        $data['user'] = $this->m_user->get_data();
        if ($data['user']) {
            $data['level'] = $this->session->userdata('id_level');
            $this->load->view('templates/dash_header', $data);
            $this->load->view('templates/user');
            $this->load->view('templates/dash_footer');
        } else {
            $this->_not_found_user();
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

    public function profile($action)
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Pendaftaran';
            $data['main']['menu'] = 'View Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
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

    public function hobi($action, $id = 0, $name = '')
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
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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

    public function orangtua($action, $id = 0, $name = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Data Orang Tua';
            $data['main']['menu'] = 'orangtua';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['table'] = $this->m_user->readOrangtua($data['user']['nim']);
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/user/dataTableOrangtua');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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

    public function organisasi($action, $id = 0, $name = '')
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
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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

    public function prestasi($action, $id = 0, $name = '')
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
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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

    public function pendidikan($action, $id = 0, $name = '')
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
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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

    public function riwayatsakit($action, $id = 0, $name = '')
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
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Edit Pendaftaran';
            $data['main']['menu'] = 'Edit Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            if ($data['user']) {
                if ($this->form_validation->run()) { } else {
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
