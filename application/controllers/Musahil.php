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

        if ($this->session->userdata['id_level'] != 999) {
            redirect('.');
        }
    }

    public function index()
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
            $data['user'] = $this->m_musahil->get_data();
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
            $data['user'] = $this->m_musahil->get_data();
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
                    echo "NIM = " . $nim;
                    echo "<br>PASSWORD = " . $this->input->post('token');
                    // redirect('musahil/manage_token/view');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Update Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_musahil->get_data();
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

                    echo "NIM = " . $nim;
                    echo "<br>PASSWORD = " . $this->input->post('token');
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
            $data['user'] = $this->m_musahil->get_data();
            if ($data['user']) {
                if ($this->m_musahil->delete_token(base64_decode($nim)) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('musahil/manage_token/view');
            } else {
                $this->_not_found_user();
            }
        } else {
            redirect('.');
        }
    }

    public function validasi_berkas($action = 'view', $nim = '')
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard Musahil - View Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_musahil->get_data();
            $data['table'] = $this->m_musahil->get_data_token();
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/dataTableValidasi');
                $this->load->view('templates/dash_footer');
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'add') {
            $data['title'] = 'Dashboard User - Tambah Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_musahil->get_data();
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
                    echo "NIM = " . $nim;
                    echo "<br>PASSWORD = " . $this->input->post('token');
                    // redirect('musahil/manage_token/view');
                }
            } else {
                $this->_not_found_user();
            }
        } else if ($action == 'edit') {
            $data['title'] = 'Dashboard User - Update Data Token';
            $data['main']['menu'] = 'Token';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_musahil->get_data();
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

                    echo "NIM = " . $nim;
                    echo "<br>PASSWORD = " . $this->input->post('token');
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
            $data['user'] = $this->m_musahil->get_data();
            if ($data['user']) {
                if ($this->m_musahil->delete_token(base64_decode($nim)) > 0) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Delete Data Berhasil.</div>');
                } else {
                    $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Delete Data Gagal</div>');
                }
                redirect('musahil/manage_token/view');
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

    public function delete($chapter, $id)
    {
        if ($chapter == 'token') {
            $this->m_musahil->delete_token($id);
            redirect(base_url(($this->session->userdata('id_level') == 1337 ? 'admin' : 'musahil') . '/manage/token'));
        }
        redirect('.');
    }
}
