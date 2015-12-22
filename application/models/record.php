<?php

class Record extends CI_Model
{
    public function get_last_created_record()
    {
        $query =   "SELECT * FROM records
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query);
    }
    public function create($record_post)
    {
        $query =   "INSERT INTO records
                    (
                        distance, time, record_date, boat_type, 
                        state, city, user_id, created_at, updated_at
                    )
                    VALUES
                    (
                        ?, ?, ?, ?, 
                        ?, ?, ?, NOW(), NOW() 
                    );  ";
        $values = array(
            $record_post['distance'], $record_post['record_time'], $record_post['date'], 
            $record_post['boat_type'], $record_post['state'], $record_post['city'], $this->session->userdata['user_id']
            );
        var_dump($this->db->query($query, $values));
        die();
        if (!$this->db->affected_rows()) {
            die("Database Error - Record Not Created");
        } else {
            return $this->get_last_created_record();
        }
    }
}