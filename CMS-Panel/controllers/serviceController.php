<?php
include "head.inc.php";

$serviceMgr = new ServiceManager();

$action = $_REQUEST['action'];

switch ($action) {

    case "edit":
        if ($_POST['text'] != "" && $_POST['title'] != "") {
            $service = new ServiceBean($_POST);
            $service->setNum($_GET['id']);
            if (Functions::uploadPic($_FILES['pic']) != "") {
                $service->setPic(Functions::uploadPic($_FILES['pic']));
            } else {
                $temp = $serviceMgr->getServiceByNum($_GET['id']);
                $service->setPic($temp->getPic());
            }
            $serviceMgr->editService($service);
            header("location: ../views/serviceList.php");
        } else {
            $_SESSION['msg'] = "Fill all fields!";
            header("location: ../views/service.php");
        }
        break;
}