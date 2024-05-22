<?php
switch($_SERVER['REQUEST_METHOD']){
    case "GET":
        require_once 'd/getd.php';
        break;
    case "POST":
        require_once 'd/postd.php';
        break;
    default:
        break;
}