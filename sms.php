<?php

//receive sms, phone, message,

$sms = getsmsinput();

print_r($sms);
exit;

function getsmsinput (){
    $sms['from'] = $_REQUEST['from'];
    $sms['message'] = $_REQUEST['message'];
    return $sms;
}

?>