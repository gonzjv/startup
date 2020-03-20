<?php

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->library('form_validation');
        $this->load->helper('html');
        $this->load->helper('security');
        $this->load->database();

        $data['title'] = "Form";

        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home');
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->model('insert_model');
            $email = $this->input->post('email');
            $password = $this->input->post('password');
            echo $password;
            $data['user_info'] = $this->insert_model->get_user_info($email);
            if (password_verify($password, $data['user_info']['password'])) {
                $this->session->name = $data['user_info']['name'];
                $this->session->surname = $data['user_info']['surname'];
                $this->session->email = $data['user_info']['email'];
                echo $this->session->name . ' from session';
            }
            $this->load->view('templates/header', $data);
            $this->load->view('pages/home');
            $this->load->view('templates/footer', $data);
        }
    }

    public function session_unset() {
        $this->session->unset_userdata('name');
        $this->session->unset_userdata('surname');
        $this->session->unset_userdata('email');
        redirect('/');
//        $data['title'] = "Home";
//        $this->load->view('templates/header', $data);
//        $this->load->view('pages/home');
//        $this->load->view('templates/footer', $data);
    }

}
