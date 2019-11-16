<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('m_auth');
    }

    public function index()
    {
        if ($this->session->has_userdata('username')) {
            $this->_islogin();
        } else {
            $data['title'] = 'SISPENGMA Login';
            $this->form_validation->set_rules('username', 'Username', 'trim|required');
            $this->form_validation->set_rules('password', 'Password', 'trim|required');
            if ($this->form_validation->run()) {
                $this->_login();
            } else {
                $this->load->view("templates/auth_header", $data);
                $this->load->view("templates/login");
                $this->load->view("templates/auth_footer");
            }
        }
    }

    private function _islogin()
    {
        $data['user'] = $this->m_auth->login_checker();
        if ($data['user']) {
            if ($data['user']['id_level'] == 1337) {
                redirect('admin');
            } else if ($data['user']['id_level'] == 999) {
                redirect('musahil');
            } else if ($data['user']['id_level'] == 100) {
                redirect('user');
            }
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->m_auth->get_login_data($username, $password);
        if ($user) {
            $data = [
                'username' => $user['username'],
                'password' => $user['password'],
                'id_level' => $user['id_level']
            ];
            $this->session->set_userdata($data);
            if ($data['id_level'] == 1337) {
                redirect('admin');
            } else if ($data['id_level'] == 100) {
                redirect('user');
            } else if ($data['id_level'] == 999) {
                redirect('musahil');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username or Password not matches. Please enter valid Login.</div>');
            redirect('.');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_level');
        $this->session->destroy;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
        redirect('.');
    }
}
