<?php
session_start();

spl_autoload_register(function ($class_name) {
    include "../models/" . $class_name . '.class.php';
});

//Home, About, Contact
$pageMgr = new PageManager();

$home = $pageMgr->getPageByTitle("home");
$homeData = json_decode($home->getContent(), true);

$about = $pageMgr->getPageByTitle("about");
$aboutData = json_decode($about->getContent(), true);

$contact= $pageMgr->getPageByTitle("contact");
$contactData = json_decode($contact->getContent(), true);

//Services
$serviceMgr = new ServiceManager();

$service1 = $serviceMgr->getServiceByNum(1);
$service2 = $serviceMgr->getServiceByNum(2);
$service3 = $serviceMgr->getServiceByNum(3);

//Portfolio
$portMgr = new PortfolioManager();
$ports = $portMgr->getAllPort();

//Teams
$teamMgr = new TeamManager();
$teams = $teamMgr->getAllTeams();
?>