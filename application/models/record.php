<?php

class Record extends CI_Model
{
    public function get_last_created_record()
    {
        $query =   "SELECT * FROM records
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query);
    }
    public function create($record)
    {
        $query =   "INSERT INTO records
                    (
                        distance, record_time, record_date, boat_type, 
                        state, city, created_at, updated_at
                    )
                    VALUES
                    (
                        ?, ?, ?, ?, 
                        ?, ?, NOW(), NOW() 
                    );  ";
        $values = array(
            $record['distance'], $record['record_time'], $record['record_date'], 
            $record['boat_type'], $record['state'], $record['city']
            );
        $this->db->query($query, $values);
        if (!$this->db->affected_rows()) {
            die("Database Error - Record Not Created");
        } else {
            return $this->get_last_created_record();
        }
    }
}