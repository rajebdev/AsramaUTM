<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_user');

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

    public function pendaftaran($action)
    {
        if ($action == 'view') {
            $data['title'] = 'Dashboard User - View Pendaftaran';
            $data['main']['menu'] = 'View Pendaftaran';
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->m_user->get_data();
            $data['hobi'] = $this->m_user->get_data_hobi($data['user']['nim']);
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
            if ($data['user']) {
                $this->load->view('templates/dash_header', $data);
                $this->load->view('templates/pendaftaran_edit');
                $this->load->view('templates/dash_footer');
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
