<?php


class TeamBean
{
    private $teamId;
    private $teamMember;
    private $teamTitle;
    private $teamBio;
    private $teamPic;

    /**
     * TeamBean constructor.
     * @param $id
     * @param $tName
     * @param $tTitle
     * @param $tBio
     * @param $tPic
     */
    public function __construct($teamArray)
    {
        $this->teamId = isset($teamArray['id']) ? $teamArray['id'] : null;
        $this->teamMember = $teamArray['name'];
        $this->teamTitle = $teamArray['title'];
        $this->teamBio = $teamArray['bio'];
        $this->teamPic = isset($teamArray['pic']) ? $teamArray['pic'] : null;
    }

    /**
     * @return mixed|null
     */
    public function getTeamId()
    {
        return $this->teamId;
    }

    /**
     * @param mixed|null $teamId
     */
    public function setTeamId($teamId)
    {
        $this->teamId = $teamId;
    }

    /**
     * @return mixed
     */
    public function getTeamMember()
    {
        return $this->teamMember;
    }

    /**
     * @param mixed $teamMember
     */
    public function setTeamMember($teamMember)
    {
        $this->teamMember = $teamMember;
    }

    /**
     * @return mixed
     */
    public function getTeamTitle()
    {
        return $this->teamTitle;
    }

    /**
     * @param mixed $teamTitle
     */
    public function setTeamTitle($teamTitle)
    {
        $this->teamTitle = $teamTitle;
    }

    /**
     * @return mixed
     */
    public function getTeamBio()
    {
        return $this->teamBio;
    }

    /**
     * @param mixed $teamBio
     */
    public function setTeamBio($teamBio)
    {
        $this->teamBio = $teamBio;
    }

    /**
     * @return mixed
     */
    public function getTeamPic()
    {
        return $this->teamPic;
    }

    /**
     * @param mixed $teamPic
     */
    public function setTeamPic($teamPic)
    {
        $this->teamPic = $teamPic;
    }




}