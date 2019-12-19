<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Asrama extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model("Asrama_model", "am");
    }

    public function index()
    {
        $data['title'] = "Home - Sispengma";
        $data['menu'] = "Home - Sispengma";
        $data['main']['menu'] = 'Asrama';
        if ($this->session->userdata("username") !== null) {
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        } else {
            $data['level'] = "null";
            $data['user'] = "null";
        }
        $data['berita'] = $this->am->get_berita();
        $this->load->view('dash_header', $data);
        $this->load->view("home", $data);
        $this->load->view('dash_footer');
    }

    public function about()
    {
        $data['title'] = "Tentang Kami";
        $data['menu'] = "Tentang Kami";
        $data['main']['menu'] = 'Asrama';
        if ($this->session->userdata("username") !== null) {
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        } else {
            $data['level'] = "null";
            $data['user'] = "null";
        }
        $data['berita'] = $this->am->get_berita();
        $this->load->view('dash_header', $data);
        $this->load->view("about", $data);
        $this->load->view('dash_footer');
    }

    public function detail_berita($id_berita)
    {
        $data['title'] = "Berita Sispengma";
        $data['menu'] = "Berita Sispengma";
        $data['main']['menu'] = 'Asrama';
        if ($this->session->userdata("username") !== null) {
            $data['level'] = $this->session->userdata('id_level');
            $data['user'] = $this->am->get_data_login($this->session->userdata('username'));
        } else {
            $data['level'] = "null";
            $data['user'] = "null";
        }
        $data['berita'] = $this->am->get_berita_detail($id_berita);
        $data['next'] = $this->am->get_next_berita($id_berita);
        $data['prev'] = $this->am->get_prev_berita($id_berita);
        $this->load->view('dash_header', $data);
        $this->load->view("berita", $data);
        $this->load->view('dash_footer', $data);
    }

    public function login()
    {
        $data['title'] = 'SISPENGMA Login';
        $this->load->view("templates/auth_header", $data);
        $this->load->view("templates/login");
        $this->load->view("templates/auth_footer");
    }

    public function login_proses()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));

        $user = $this->db->get_where('tbl_login', ['username' => $username, 'password' => $password])->row_array();
        if ($user) {
            $data = [
                'username' => $user['username'],
                'password' => $user['password'],
                'id_level' => $user['id_level']
            ];
            $this->session->set_userdata($data);
            if ($data['id_level'] == 1337) {
                redirect('Admin');
            } else if ($data['id_level'] == 999) {
                redirect('Musahil');
            } else if ($data['id_level'] == 100) {
                redirect('User');
            }
        } else {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Username or Password not matches. Please enter valid Login.</div>');
            redirect('Asrama/login');
        }
    }
    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('password');
        $this->session->unset_userdata('id_level');
        $this->session->destroy;
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">You have been logout.</div>');
        redirect('Asrama/login');
    }
}
