<?php

class Record extends CI_Model
{
    public function get_all_records()
    {
        $query =   "SELECT records.*, name_first, name_last, gender, TIMESTAMPDIFF(YEAR, birthdate, '2015-01-01') AS age FROM records
                    JOIN users ON users.id=user_id
                    ORDER BY records.created_at DESC;  ";
        return $this->db->query($query)->result_array();
    }
    public function get_all_records_with_request($request)
    {
        $query =   "SELECT records.*, name_first, name_last, gender, TIMESTAMPDIFF(YEAR, birthdate, '2015-01-01') AS age FROM records
                    JOIN users ON users.id=user_id
                    WHERE (distance=? OR ?='')
                    AND ? LIKE CONCAT('%', boat_type, '%')
                    AND ? LIKE CONCAT('%', gender, '%')
                    AND CONCAT(name_first, ' ', name_last) LIKE CONCAT('%', ?, '%')
                    ORDER BY records.created_at DESC;";
        $request = $this->set_empty($request);
        $distance = $request['distance'];
        $boat_type= implode('', $request['boat_type']);
        $gender = implode('', $request['gender']);
        $name = $request['name'];
        $values = array($distance, $distance, $boat_type, $gender, $name);
        return $this->db->query($query, $values)->result_array();
    }
    public function set_empty($request)
    {
        if (!isset($request['distance'])) {
            $request['distance'] = "";
        }
        if (!isset($request['boat_type'])) {
            $request['boat_type'] = array();
        }
        if (!isset($request['gender'])) {
            $request['gender'] = array();
        }
        if (!isset($request['name'])) {
            $request['name'] = "";
        }
        return $request;
    }
    public function get_user_records()
    {
        $query = "SELECT * FROM records
                    WHERE user_id = ?
                    ORDER BY record_date DESC";
                   
        $values = array($this->session->userdata('user_id'));

        return $this->db->query($query,$values)->result_array();
        
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
            $dec = $seconds_const - floor($seconds_const);
            $time['formatted'] .= substr($dec, 1, 3);
        } elseif ($time['minutes']) {
            $time['formatted'] = gmdate("i:s", $seconds_const);
            $dec = $seconds_const - floor($seconds_const);
            $time['formatted'] .= substr($dec, 1, 3);
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