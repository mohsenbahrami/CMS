<?php
include "head.inc.php";
$userMgr = new UserManager();
$action = $_REQUEST['action'];
switch ($action) {

    case "register":
        $newUser = new UserBean($_POST);
        if ($userMgr->verify_existence("username", $_POST['username']) && $userMgr->verify_existence("email", $_POST['email'])) {
            $userMgr->addUser($newUser);
            header("Location: ../views/users.php");
        } else {
            $_SESSION['msg1'] = "Username and/or Email already exist!";
            header("location: ../views/register.php");
        }
        break;

    case "login":
        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $user = $userMgr->verify_login($_POST);
            if ($user != null) {
                $_SESSION['user'] = $user;
                $_SESSION['id'] = $user->getId();
                $_SESSION['name'] = $user->getName();
                $_SESSION['email'] = $user->getEmail();
                $_SESSION['username'] = $user->getUsername();
                $_SESSION['password'] = $user->getPassword();
                $_SESSION['status'] = $user->getStatus();
                header("Location: ../views/index.php");
            } else {
                $_SESSION['msg'] = "Invalid Username and/or Password!";
                header("Location: ../views/login.php");
            }
        } else {
            $_SESSION['msg'] = "Please fill empty fields!";
            header("Location: ../views/login.php");
        }
        break;

    case "admin":
        $userMgr->adminUser($_GET['id']);
        header("Location: ../views/users.php");
        break;

    case "moderator":
        $userMgr->moderatUser($_GET['id']);
        header("Location: ../views/users.php");
        break;

    case "delete":
        $userMgr->deleteUser($_GET['id']);
        header("Location: ../views/users.php");
        break;

    case "logout":
        session_unset();
        session_destroy();
        header("location: ../views/login.php");
        break;

    case "edit":
        $user = $userMgr->getUserByUsername($_SESSION['username']);
        $user->setName($_POST['name']);
        $user->setUsername($_POST['username']);
        $user->setEmail($_POST['email']);
        if ($user != null) {
            $_SESSION['user'] = $user;
            $_SESSION['id'] = $user->getId();
            $_SESSION['name'] = $user->getName();
            $_SESSION['email'] = $user->getEmail();
            $_SESSION['username'] = $user->getUsername();
            $_SESSION['password'] = $user->getPassword();
            $_SESSION['status'] = $user->getStatus();
        }
        if ($userMgr->editUser($user)) {
            header("location: ../views/profile.php");
            $_SESSION['msg3'] = "Changes Saved!";
        } else {
            $_SESSION['msg3'] = "Something is wrong!";
            header("location: ../views/profile.php");
        }
        break;

    case "password":
        $userMgr->editUserPassword($_POST['newPassword'], $_SESSION['username']);
        session_unset();
        session_destroy();
        header("location: ../views/profile.php");
        break;

}
?>