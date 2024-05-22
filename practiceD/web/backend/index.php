<?php 
    header('Content-Type: application/json; charset=utf-8');
    header('Access-Control-Allow-Origin: *'); 
    header('Access-Control-Allow-Methods: GET, POST');

    //var_dump($_SERVER['REQUEST_METHOD']);
    //var_dump($_SERVER['QUERY_STRING']);
    $foundTitle = explode('/',$_SERVER['QUERY_STRING']);
    if ($foundTitle[0] ==='databasename') {
        require_once 'd/index.php';
    }    
    else
    {
        http_response_code(405);
        $JSONerror = array("message" => "Not found this API");
        return json_encode($JSONerror); 
    }

