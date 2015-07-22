<?php
//receive the sms, phone, Message
$sms = getSmsInput();
$reply = "Thank you for your SMS";
sendSmsOutput($sms['from'],$reply);
exit;
//send back a message to the phone number_format
function sendSmsOutput($number,$msg){
    //lets add the variables to the records array
    if(is_array($msg)){
        $records[0]= array( 'message' => $msg[0], 'to' => $number[0]);
        $records[1]= array( 'message' => $msg[1], 'to' => $number[1]);
    }else{
        $records[]= array( 'message' => $msg, 'to' => $number);
    }
    $sms_array= array();
    $sms_array[] = array('success'=>"true",'secret'=>"",'task'=>"send",'messages'=>$records);
    $payload= array('payload'=>$sms_array[0]);
    header('content-type: application/json; charset=utf-8');
    echo json_encode($payload);
    //mysql_close($connect);
}
function getSmsInput(){
    $sms['from'] = $_REQUEST['from'];
    $sms['message'] = $_REQUEST['message'];
    return $sms;
}

?>