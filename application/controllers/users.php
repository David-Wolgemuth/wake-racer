<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');  // Automatically load User, so we don't need to in every method
    }
    public function new_user()
    {
        $this->load->view('sign-up-page');
    }
    public function create()
    {
        $validation_rules = array(
            "name_first" => array("Name", "trim|required|alpha"),
            "name_last" => array("Name", "trim|required|alpha"),
            "email" => array("Email", "trim|required|strtolower|valid_email|is_unique[users.email]"),
            "password" => array("Password", "required"),  // Assuming we don't need a minimum length
            "confirm_password" => array("Password", "required|matches[password]")
        );
        foreach ($rules as $key => $value) {
            $this->form_validation->set_rules($key, $value[0], $value[1]);
        }
        if ($this->form_validation->run()) {
            // Saved to user if we want to use this data to log in the user
            $user = $this->User->create($this->input->post());
            $this->session->set_flashdata('message', 'User Successfully Created');
        } else {
            foreach ($rules as $key => $value) {  // So we can place each error exactly where we want to in the view
                $this->session->set_flashdata($key . '-error', form_error($key));  // Example $this->session->flashdata('name_first-error');
                $this->session->set_flashdata($key . '-old', $this->input->post($key));  // Example $this->session->flashdata('name_first-old');
            }
        }
        redirect(base_url());  // Where should we go after registration ??
    }
}
