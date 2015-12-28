<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Records extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Record');
    }
    public function index()
    {
        $request = $this->input->get();
        $records = $this->Record->get_all_records($request);
        for ($i=0; $i < count($records); $i++) { 
            $records[$i]['record_time'] = $this->Record->expand_seconds($records[$i]['record_time']);
        }
        $pageTitle='records';
        $this->load->view('records_all', array('records'=>$records, 'pageTitle'=>$pageTitle));
    }   
    

    public function create()
    {
        $rules = array(
            "distance" => array("Distance", "required"),
            "hours" => array("Hours", "numeric|required"),  
            "mins" => array("Minutes", "numeric|required"),
            "seconds" => array("Seconds", "numeric|required"),
            "mili" => array("Mili", "numeric|required"),
            "record_date" => array("Date", "required"),
            "boat_type" => array("Boat Type", "required"),
            "state" => array("State", "required"),
            "city" => array("City", "required"),
            );
        foreach ($rules as $key => $value) {
            $this->form_validation->set_rules($key, $value[0], $value[1]);
        }
        if ($this->form_validation->run()) {
            // Saved to record if we want to use this data to log in the record
            $record = $this->Record->create($this->input->post(), $this->session->userdata('user_id'));
            $this->session->set_flashdata('message', 'Record Successfully Created');
        } else {
            foreach ($rules as $key => $value) {  // So we can place each error exactly where we want to in the view
                $this->session->set_flashdata($key . '-error', form_error($key));  // Example $this->session->flashdata('name_first-error');
                $this->session->set_flashdata($key . '-old', $this->input->post($key));  // Example $this->session->flashdata('name_first-old');
            }
        }
        redirect(base_url());
    }


}
