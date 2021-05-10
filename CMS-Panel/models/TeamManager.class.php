<?php


class TeamManager extends DBManager
{
    /**
     * @param TeamBean $team
     * @return bool
     */
    public function addTeam(TeamBean $team)
    {
        $query = $this->db->prepare("INSERT INTO `team` (`name`, `title`, `bio`, `pic`) VALUES (:name, :title, :bio, :pic);");
        return $query->execute(array(
            "name" => $team->getTeamMember(),
            "title" => $team->getTeamTitle(),
            "bio" => $team->getTeamBio(),
            "pic" => $team->getTeamPic(),
        ));
    }

    /**
     * @param $id
     */
    public function deleteTeam($id){
        $query = $this->db->prepare( "DELETE FROM `team` WHERE `id` = ?;" );
        $query->execute( array( $id ) );
    }

    /**
     * @param TeamBean $team
     * @return bool
     */
    public function editUser(TeamBean $team)
    {
        $query = $this->db->prepare("UPDATE `team` SET `name`= :name, `title`= :title, `bio` = :bio, `pic` = :pic  WHERE `id` = :id;");
        return $query->execute(array(
            "name" => $team->getTeamMember(),
            "title" => $team->getTeamTitle(),
            "bio" => $team->getTeamBio(),
            "pic" => $team->getTeamPic(),
            "id" => $team->getTeamId(),
        ));
    }

    /**
     * @param $id
     * @return TeamBean
     */
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

    /**
     * @return array
     */
    public function getAllTeams()
    {
        $query = $this->db->query("SELECT * FROM `team` ORDER BY `id` DESC");
        $teams = $query->fetchAll(PDO::FETCH_ASSOC);

        return $teams;
    }


}