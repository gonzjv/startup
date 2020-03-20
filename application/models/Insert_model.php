<?php

class Insert_model extends CI_Model {

    public $name;
    public $surname;

    public function get_user_info($email) {
        $query = $this->db->get_where('user', array('email' => $email));
        return $query->row_array();
    }

    public function insert_entry() {
        $data_input = array(
            'name' => $this->input->post('name'),
            'surname' => $this->input->post('surname'),
            'email' => $this->input->post('email'),
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT)
        );
        $this->db->insert('user', $data_input);
    }
}

?>