<?php
session_start();

spl_autoload_register(function ($class_name) {
    include "../models/" . $class_name . '.class.php';
});

?>