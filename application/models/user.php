<?php

class User extends CI_Model
{
    public function get_last_created_user()
    {
        $query =   "SELECT * FROM users
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query)->row_array();
    }
    public function login_user($user)
    {
        $query =   "SELECT id AS user_id, name_first, name_last, CONCAT(name_first, ' ', name_last) AS name_full
                        FROM users
                    WHERE email=?
                    AND password=MD5(CONCAT(?, salt));  ";

        $values = array(strtolower($user['email']), $user['password']);
        return $this->db->query($query, $values)->row_array();
    }
    public function create($user)
    {
        $query =   "INSERT INTO users
                    (name_first, name_last, email, gender, birthdate, password,  
                        salt, created_at, updated_at)
                    VALUES
                    (?, ?, ?, ?, ?, MD5(CONCAT(?, ?)), ?, NOW(), NOW());  ";
        $salt = bin2hex(openssl_random_pseudo_bytes(22));

        $values = array($user['name_first'], $user['name_last'], $user['email'],
            $user['gender'], $user['birthdate'], $user['password'], $salt, $salt);
        
        $this->db->query($query, $values);
        if (!$this->db->affected_rows()) {
            die("User Not Created - Database Error");
        } else {
            // This way we can easily get the info from the user we created.
            return $this->get_last_created_user();
        }
    }
}
