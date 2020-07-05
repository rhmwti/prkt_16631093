<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        //load Login_model
        $this->load->model('login_model');
    }

    function index()
    {
        if ($this->login_model->is_logged_in()) {
            //jika memang session sudah terdaftar, maka redirect berdasarkan level user
            if ($this->session->userdata("level") == "admin") {
                redirect('admin/dashboard');
            } else {
                redirect('pelanggan/dashboard');
            }
        } else {

            //jika session belum terdaftar
            //set form validation
            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            //set message form validation
            $this->form_validation->set_message('required', '<div class="alert alert-danger" style="margin-top: 3px">
                    <div class="header"><b><i class="fa fa-exclamation-circle"></i> {field}</b> harus diisi</div></div>');

            //cek validasi
            if ($this->form_validation->run() == TRUE) {

                //get data dari FORM
                $username = $this->input->post("username", TRUE);
                $password = MD5($this->input->post('password', TRUE));

                //checking data via model
                $checking = $this->login_model->check_login('user', array('username' => $username), array('password' => $password));

                //jika ditemukan, maka create session
                if ($checking != FALSE) {
                    foreach ($checking as $apps) {

                        $session_data = array(
                            'username'  => $apps->username,
                            'nama'      => $apps->nama,
                            'level'     => $apps->level
                        );
                        //set session userdata
                        $this->session->set_userdata($session_data);

                        //redirect berdasarkan level user
                        if ($this->session->userdata("level") == "admin") {
                            redirect('admin/dashboard');
                        } else {
                            redirect('pelanggan/dashboard');
                        }
                    }
                } else {

                    $data['error'] = '<div class="alert alert-danger" style="margin-top: 3px">
                        <div class="header"><b><i class="fa fa-exclamation-circle"></i> ERROR</b> username atau password salah!</div></div>';
                    $this->load->view('login', $data);
                }
            } else {

                $this->load->view('login');
            }
        }
    }

    function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('level');
        $this->session->sess_destroy();
        redirect('login');
    }
}
