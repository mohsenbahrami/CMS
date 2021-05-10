<?php
include "head.inc.php";

$teamMgr = new TeamManager();

$action = $_REQUEST['action'];

switch ($action) {

    case "add":
        if ($_POST['name'] != "" && $_POST['title'] != "" && $_POST['bio'] != "" && isset($_FILES['pic'])) {
            $newTeam = new TeamBean($_POST);
            $newTeam->setTeamPic(Functions::uploadPic($_FILES['pic']));
            $teamMgr->addTeam($newTeam);
            header("location: ../views/team.php");
        } else {
            $_SESSION['msg'] = "Fill all fields!";
            header("location: ../views/teamMember.php");
        }
        break;

    case "delete":
        $teamMgr->deleteTeam($_GET['id']);
        header("Location: ../views/team.php");
        break;

    case "edit":
        if ($_POST['name'] != "" && $_POST['title'] != "" && $_POST['bio'] != "") {
            $newTeam = new TeamBean($_POST);
            $newTeam->setTeamId($_GET['id']);
            if(Functions::uploadPic($_FILES['pic']) != ""){
                $newTeam->setTeamPic(Functions::uploadPic($_FILES['pic']));
            } else{
                $temp = $teamMgr->getTeamById($_GET['id']);
                $newTeam->setTeamPic($temp->getTeamPic());
            }
            $teamMgr->editUser($newTeam);
            header("location: ../views/team.php");
        }else {
            $_SESSION['msg'] = "Fill all fields!";
            header("location: ../views/teamEdit.php");
        }
        break;

}