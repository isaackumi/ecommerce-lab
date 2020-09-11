<?php
//connect to the login class
require("../classes/loginclass.php");

//function to get login information - takes email
function login_user($email){
    $login_array = array();
    $login_object = new login_class();
    $login_record = $login_object->login_user($email);
    if ($login_record) {
        $one_record = $login_object->db_fetch();
        $login_array[] = $one_record;
    }
    return $login_array;
}



function login_admin($email){
    $login_array = array();
    $login_object = new login_class();
    $login_record = $login_object->login_admin($email);
    if ($login_record) {
        $one_record = $login_object->db_fetch();
        $login_array[] = $one_record;
    }
    return $login_array;
}

function register_user($a, $b, $c,$d,$e,$f,$g){
    $new_object = new login_class();
    //run the add product method
    $insertlearner = $new_object->register_user($a, $b, $c,$d,$e,$f,$g);
    //check if method worked
    if ($insertlearner) {
        //return query result (boolean)
        return $insertlearner;
    }else{

        return false;
    }
}

?>