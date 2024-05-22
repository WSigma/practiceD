<?php
$sql = '';
if(count($foundTitle) > 1){
    if(is_int(intval($foundTitle[1]))){
        $sql = "SELECT * FROM `databasename` WHERE did=" . $foundTitle[1];
    }else{
        http_response_code(404);
        echo 'Nem létező ügyfel';
    }
}else{
    $sql = "SELECT * FROM `databasename` WHERE 1";
}
require_once "./databaseconnection.php";
$result = $conn->query($sql);
if($result->num_rows > 0){
    $d = array();
    while($row = $result->fetch_assoc()){
        $d[] = $row;
    }
    http_response_code(200);
    echo json_encode($d);
}else{
    http_response_code(404);
    echo 'Nincs egy ügyfel sem';
}