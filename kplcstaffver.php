<?php

require_once('connect.php');

$firstname= "Edwin";
$lastname = "ipsum";

createstaff($firstname, $lastname);

//create staff
function createstaff($firstname, $lastname){
    $query = mysql_query("INSERT INTO staff (first_name, last_name) VALUES ('$firstname','$lastname')");

    return($query);
}

