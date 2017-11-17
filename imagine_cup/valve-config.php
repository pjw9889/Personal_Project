<?php
$db = mysqli_connect('localhost', '[id]', '[password]', 'mysite');

if($db->connect_error){
    die('Connection error');
}
$db->set_charset('utf8');

function sqli_filter($db, $str){

    if(get_magic_quotes_gpc()){
        $str = stripslashes($str);
    }
    if(!is_numeric($str)){
        $str = "'".mysqli_real_escape_string($db, $str)."'";
    }

    return $str;
}
function isNum($str){
    if(!ctype_digit($str)){
        return 1;
    }

    return $str;
}
?>
