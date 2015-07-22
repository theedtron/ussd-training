<?php
require_once('connect.php');

$input = getInput();

//Enter staff id
if ( $input['text'] == "" ) {
    // This is the first request. Note how we start the response with CON
    $response  = "Please enter Staff ID";
    sendOutput($response,1);
}else {
    //receive what Edwin has sent in as text
    $id = $input['text'];
}

$staff = getStaff($id);
if($staff['id'] != 0){
    $message= "ID is valid and it belongs to ".$staff['first_name']." ".$staff['last_name'];
}else{
    $message =  "No Staff with that id";
}
sendOutput($message,2);

//verify if the id belongs to one of the staff members
function getInput()
{
    $input = array();
    $input['sessionId'] = $_REQUEST["sessionId"];
    $input['serviceCode'] = $_REQUEST["serviceCode"];
    $input['phoneNumber'] = $_REQUEST["phoneNumber"];
    $input['text'] = $_REQUEST["text"];
    return $input;
}

function sendOutput($message,$type=2){
    //Type 1 is a continuation, type 2 output is an end
    if($type==1){
        echo "CON ".$message;
    }elseif($type==2){
        echo "END ".$message;
    }else{
        echo "END We faced an error";
    }
    exit;
}

function getStaff($id){
    $query = mysql_query("SELECT * FROM staff WHERE id='$id'");
    if (mysql_num_rows($query) > 0) {
        $row = mysql_fetch_assoc($query);
    } else {
        $row['id'] = 0;
    }
    return $row;
}
