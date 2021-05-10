<?php


class TeamManager extends DBManager
{

    public function getTeamById($id)
    {
        $query = $this->db->prepare("SELECT * FROM `team` WHERE `id`=:id");
        $query->execute(array(
            'id' => $id
        ));
        $result = $query->fetch(PDO::FETCH_ASSOC);
        $teamMember = new TeamBean($result);
        return $teamMember;
    }

    public function getAllTeams()
    {
        $query = $this->db->query("SELECT * FROM `team` ORDER BY `id` ASC");
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);

        return $teams;
    }


}