<?php
    include_once("configuration/valve-config.php");
    $method = $_SERVER["REQUEST_METHOD"];


    switch($method){
        case "GET":
            //$rows = array();

            $sql = "select temperature, time from iot_data_log order by idx desc limit 0, 1";
            $result = $db->query($sql);

            $r = $result->fetch_assoc();
            echo json_encode($r);
            break;
        case "POST":
            if($_POST["temp"] != ""){
                $var = array('Result'=>'Fail');
                $v = $_POST["temp"];

                $sql = "INSERT INTO `iot_valve`.`user_request`(`req_temp`,`is_done`,`time`,`id`)".
                    "VALUES($v, false, NOW(), 'test');";
                $db->query($sql);

                if($db->affected_rows > 0){
                    $var["Result"] = "Success";
                }
                echo json_encode($var);
            }
            break;
        default:
            break;
    }

?>