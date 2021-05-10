<?php
include "head.inc.php";
$pageMgr = new PageManager();
$action = $_REQUEST['action'];

switch ($action) {
    case "edit":
        $page = $pageMgr->getPageByTitle($_GET['id']);
        $temp = array_slice($_POST, 1, -1);
//        if (Functions::uploadPic($_FILES['pic']) != "") {
         if(isset($_FILES['pic'])){
            $temp['pic'] = Functions::uploadPic($_FILES['pic']);
        }
        $arrayTemp = json_encode($temp);
        $page->setContent($arrayTemp);
        $pageMgr->editPage($page);
        header("location: ../views/{$_GET['id']}.php");
        break;
    case "add":
        $temp = array_slice($_POST, 1, -1);
        if (isset($_FILES['pic']))
            $temp['pic'] = Functions::uploadPic($_FILES['pic']);
        $arrayTemp = json_encode($temp);
        $newPage = new PageBean();
        $newPage->setContent($arrayTemp);
        $newPage->setTitle($_GET['id']);
        $pageMgr->addPage($newPage);
        header("location: ../views/{$_GET['id']}.php");
        break;
}
?>