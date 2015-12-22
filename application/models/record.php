<?php

class Record extends CI_Model
{
    public function get_last_created_record()
    {
        $query =   "SELECT * FROM records
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query);
    }
    public function create($record, $user_id)
    {
        $query =   "INSERT INTO records
                    (
                        distance, record_time, record_date, boat_type, 
                        state, city, user_id, created_at, updated_at
                    )
                    VALUES
                    (
                        ?, ?, ?, ?, 
                        ?, ?, ?, NOW(), NOW() 
                    );  ";

        // Convert everything into seconds, then save it as seconds.
        $hours = 3600 * $record['hours'];
        $minutes = 60 * $record['mins'];
        $seconds = $record['seconds'];
        $mil_seconds = 0.01 * $record['mili'];
        $record_time = $hours + $minutes + $seconds + $mil_seconds;

        $values = array(
            $record['distance'], $record_time, $record['record_date'], 
            $record['boat_type'], $record['state'], $record['city'], $user_id
            );
        $this->db->query($query, $values);
        if (!$this->db->affected_rows()) {
            die("Database Error - Record Not Created");
        } else {
            return $this->get_last_created_record();
        }
    }
}