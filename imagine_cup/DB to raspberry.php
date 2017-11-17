<?php
    include_once("configuration/valve-config.php");
    $method = $_SERVER["REQUEST_METHOD"];


    switch($method){
        case "GET":
            $sql = "select is_done from user_request order by idx desc limit 0, 1";
            $result = $db->query($sql);
            $r = $result->fetch_assoc();
            echo json_encode($r);
            break;
        default:
            break;
    }


?>