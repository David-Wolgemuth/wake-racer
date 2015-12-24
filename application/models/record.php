<?php

class Record extends CI_Model
{
    public function get_all_records()
    {
        $query =   "SELECT records.*, name_first, name_last, gender, birthdate FROM records
                    JOIN users ON users.id=user_id
                    ORDER BY records.created_at DESC;  ";
        return $this->db->query($query)->result_array();
    }
    
    public function get_last_created_record()
    {
        $query =   "SELECT * FROM records
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query)->row_array();
    }
    public function expand_seconds($seconds)
    {
        $seconds_const = $seconds;
        $time = array('hours' => 0, 'minutes' => 0, 'seconds' => 0);
        while ($seconds - 3600 >= 0) {
            $seconds -= 3600;
            $time['hours']++;
        }
        while ($seconds - 60 >= 0) {
            $seconds -= 60;
            $time['minutes']++;
        }
        $time['seconds'] = $seconds;
        if ($time['hours']) {
            $time['formatted'] = gmdate("H:i:s", $seconds_const);
        } elseif ($time['minutes']) {
            $time['formatted'] = gmdate("i:s", $seconds_const);
        } else {
            $time['formatted'] = $seconds_const;
        }
        return $time;
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