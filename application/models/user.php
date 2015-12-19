<?php

class User extends CI_Model
{
    public function select_last_created_user()
    {
        $query =   "SELECT * FROM users
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query)->row_array();
    }
    public function create($post)
    {
        $query =   "INSERT INTO users
                    (name_first, name_last, email, password,
                        salt, created_at, updated_at)
                    VALUES
                    (?, ?, ?, MD5(CONCAT(?, ?)), ?, NOW(), NOW());  ";
        $values = array($post['name_first'], $post['name_last'], $post['email'],
            $post['password'], $salt, $salt);
        $this->db->query($query, $values);
        if (!$this->db->affected_rows()) {
            die("User Not Created - Database Error");
        } else {
            // This way we can easily get the info from the user we created.
            return $this->select_last_created_user();
        }
    }
}
