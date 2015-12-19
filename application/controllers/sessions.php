<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller 
{
	public function new_session()
	{
		// something that loads $this->load->view('partials/login')  not entirely necessary if we have this in navbar
	}
	public function create()  // Login Function
	{
		$this->load->model('User');
		$user = $this->User->login_user($this->input->post());
		if (!$user) {
			$this->session->set_flashdata('login-error', 'Your email or password were incorrect.');
		} else {
			foreach ($user as $key => $value) {
				$this->session->set_userdata($key, $value);  // name_first => 'George'
			}
		}
		redirect(base_url());  // Where should we redirect?
	}
}
