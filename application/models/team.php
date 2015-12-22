<?php

class Record extends CI_Model
{
    public function get_last_created_team()
    {
        $query =   "SELECT * FROM teams
                    WHERE id=LAST_INSERT_ID();  ";
        return $this->db->query($query);
    }
    public function create_team($team)
    {
        $query =   "INSERT INTO teams
                    (team_name, city, state, created_at, updated_at)
                    VALUES
                    (?, ?, ?, NOW(), NOW() );  ";
        $values = array($team['team_name'], $team['city'], $team['states'] );
        $this->db->query($query, $values);
        if (!$this->db->affected_rows()) {
            die("Database Error");
        } else {
            return $this->get_last_created_team();
        }
    }
    public function create_with_admin($team, $admin_id)
    {
        $team = $this->create_team($team);
        $query =   "INSERT INTO members
                    (team_id, user_id, member_level)
                    VALUES
                    (?, ?, 1);  ";  // level 1 means admin (coach)
        $values = array($team['id'], $admin_id);
        $this->db->query($query, $values);
    }
}