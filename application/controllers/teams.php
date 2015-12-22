<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sessions extends CI_Controller 
{
	public function new_team()
	{
		
	}
	public function create()  // Login Function
	{
		$this->load->model('Team');
		$rules = array(
			"team_name" => array("Team Name", "trim|required|is_unique[teams.team_name]"),
			"city" => array("City", "required"),
			"state" => array("State", "required")
			);
		foreach ($rules as $key => $value) {
			$this->form_validation->set_rules($key, $value[0], $value[1]);
		}
		if ($this->form_validation->run()) {
			$this->Team->create($this->input->post(), $this->session->userdata('user-id'));
			$this->session->set_flashdata('message', 'Team Successfully Created');
		} else {
			foreach ($user as $key => $value) {
				$this->session->set_userdata($key, $value);  // name_first => 'George'
				$this->session->set_flashdata($key . '-old', $this->input->post($key));  // Example $this->session->flashdata('name_first-old');
			}
		}
		redirect(base_url());  // Where should we redirect?
	}
}
