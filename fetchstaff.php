<?php
require_once('connect.php');

$id = $_REQUEST['id'];

$result = getstaff($id);

print_r($result);



function getstaff($id){
    $query = mysql_query("SELECT * FROM staff WHERE staff_id='$id'");

    if (mysql_num_rows($query) > 0){
        $row = mysql_fetch_row($query);
    }else
    {
        $row['staff_id'] =0;
    }
    return $row;
}


