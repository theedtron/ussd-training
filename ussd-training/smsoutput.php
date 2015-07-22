<?php

$payload = array('task'=>'send','secret'=>'');
$reply = array();

$message1 = array('to'=>1234,'message'=>'hi');

array_push($reply,$message1);
array_push($payload,$reply);
print_r($payload);
exit;

$sms_sync_json='{
    "payload": {
    "success": "true",
        "task": "send",
        "messages": [
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "042b3515-ef6b-f424-c4qd"
            },
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "026b3515-ef6b-f424-c4qd"
            },
            {
                "to": "+000-000-0000",
                "message": "the message goes here",
                "uuid": "096b3515-ef6b-f424-c4qd"
            }
        ]
    }
}';

$leo= array('name'=>'leo','staff'=>1);

$macharia = array('name'=>'macha','staff'=>2);


print_r($leo);
exit;

?>