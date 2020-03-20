<?php

class Form extends CI_Controller {

    public function index() {
        $this->load->helper('url');
        $this->load->helper('security');
        $this->load->database();
        $this->load->library('form_validation');

        $data['title'] = "Form";


        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('surname', 'Surname', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');
        $this->form_validation->set_rules(
                'email', 'Email', 'required|min_length[5]|max_length[12]|is_unique[user.email]', array(
            'required' => 'You have not provided %s.',
            'is_unique' => 'This %s already exists.'
                )
        );


        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/sign_up');
            $this->load->view('templates/footer', $data);
        } else {
            $this->load->model('insert_model');
            $this->insert_model->insert_entry();
            $this->load->view('templates/header', $data);
            $this->load->view('pages/success');
            $this->load->view('templates/footer', $data);
        }
    }

}
