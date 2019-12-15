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

        if ($this->session->userdata['id_level'] != 1337) {
            redirect('.');
        }
    }

    public function index()
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
                if ($this->form_validation->run()) { } else {
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
        $post=$this->input->post();
        $proses=0;
        if(isset($post['id_fakultas'])&& isset( $post['nama_fakultas'])){
        if  ($post['id_fakultas']!=''&& $post['nama_fakultas']!=''){
            $data['id_fakultas']=$post['id_fakultas'];
            $data['nama_fakultas']=$post['nama_fakultas'];
            $this->m_admin->tambah_fakultas($data);
            $proses=1;
        }
    }
    $data['table'] = $this->m_admin->fakultas($data['user']);
         $this->load->view('templates/dash_header', $data);
        if($proses==1){
         $this->load->view('templates/admin/fakultas');
        }
        else {
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
        $post=$this->input->post();
        $proses=0;
        if(isset($post['id_fakultas'])&& isset( $post['nama_fakultas'])){
        if  ($post['id_fakultas']!=''&& $post['nama_fakultas']!=''){
            $data['id_fakultas']=$post['id_fakultas'];
            $data['nama_fakultas']=$post['nama_fakultas'];
            $this->m_admin->edit_fakultas($data);
            $proses=1;
        }
    }
    $data['table'] = $this->m_admin->fakultas($data['user']);
         $this->load->view('templates/dash_header', $data);
        if($proses==1){
         $this->load->view('templates/admin/fakultas');
        }
        else {
         $this->load->view('templates/admin/edit_fakultas' , $data);
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
        $post=$this->input->post();
        $proses=0;
            $data['id_fakultas']=$id_fakultas;
            $this->m_admin->hapus_fakultas($data);
            $proses=1;
    
     $data['table'] = $this->m_admin->fakultas($data['user']);
          $this->load->view('templates/dash_header', $data);
          $this->load->view('templates/admin/fakultas');
          $this->load->view('templates/dash_footer');
        }
    }
