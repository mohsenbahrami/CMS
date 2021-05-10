<?php
include "head.inc.php";
$portMgr = new PortfolioManager();
$action = $_REQUEST['action'];
switch ($action) {
    case "add":
//        var_dump(Functions::uploadPic($_FILES['pic1']));die();
        if ($_POST['title'] != "" && isset($_FILES['pic2']) && isset($_FILES['pic1'])) {
            $port = new PortfolioBean($_POST);
            $port->setPic1(Functions::uploadPic($_FILES['pic1']));
            $port->setPic2(Functions::uploadPic($_FILES['pic2']));
            $portMgr->addPort($port);
            header("location: ../views/porfolioList.php");
        } else {
            $_SESSION['msg'] = "Fill all fields!";
            header("location: ../views/portfolio.php");
        }
        break;

    case "delete":
        $portMgr->deletePort($_GET['id']);
        header("Location: ../views/porfolioList.php");
        break;

    case "edit":
//        var_dump($_POST);die();
        if ($_POST['title'] != "" ) {
            $port = new PortfolioBean($_POST);
            $port->setId($_GET['id']);
            if(Functions::uploadPic($_FILES['pic1']) != "") {
                $port->setPic1(Functions::uploadPic($_FILES['pic1']));
            } else{
                $temp = $portMgr->getPortById($_GET['id']);
                $port->setPic1($temp->getPic1());
            }
            if(Functions::uploadPic($_FILES['pic2']) != "") {
                $port->setPic2(Functions::uploadPic($_FILES['pic2']));
            } else {
                $temp = $portMgr->getPortById($_GET['id']);
                $port->setPic2($temp->getPic2());
            }
            $portMgr->editPort($port);
            header("location: ../views/porfolioList.php");
        }else {
            $_SESSION['msg'] = "Fill all fields!";
            header("location: ../views/portEdit.php");
        }
        break;

}
?>