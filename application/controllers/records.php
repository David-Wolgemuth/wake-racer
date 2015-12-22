<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Records extends CI_Controller 
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Record');
    }
    public function new_record()
    {
        // do we need this anymore?
        $this->load->view('make-new-record');
    }
    public function create()
    {
        $record_post = $this->input->post();
        $record_distance = $record_post['distance'];
        $record_time = $record_post['hours'].$record_post['mins'].$record_post['seconds'].$record_post['mili'];
        $record_boat = $record_post['boat_type'];

        $record_state = $record_post['state'];
        $record_city = $record_post['city'];
        $record_date = $record_post['date'];
        $record_post = array('distance'=>$record_distance,
                           'record_time'=>$record_time,
                           'date'=>$record_date,
                           'boat_type'=>$record_boat,
                           'state'=>$record_state,
                           'city'=>$record_city
                            );

        $validation_rules = array(
            "distance" => array("Distance", "required"),
            "record_time" => array("Time", "required"),
            "date" => array("Date", "required"),
            "boat_type" => array("Boat Type", "required"),
            "state" => array("State", "required"),
            "city" => array("City", "required"),
            );
        foreach ($validation_rules as $key => $value) {
            $this->form_validation->set_rules($key, $value[0], $value[1]);
        }
        if ($this->form_validation->run()) {
            // Saved to record if we want to use this data to log in the record
            $record = $this->Record->create($record_post);
            $this->session->set_flashdata('message', 'Record Successfully Created');
        } else {
            foreach ($validation_rules as $key => $value) {  // So we can place each error exactly where we want to in the view
                $this->session->set_flashdata($key . '-error', form_error($key));  // Example $this->session->flashdata('name_first-error');
                $this->session->set_flashdata($key . '-old', $this->input->post($key));  // Example $this->session->flashdata('name_first-old');
            }
        }
        redirect(base_url());
    }
}
