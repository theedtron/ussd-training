<?php
$text = $_REQUEST['text'];
$myLevel =  getLevel($text);
$levelUserAt=$myLevel['level'];
$message = $myLevel['latest_message'];

switch ($levelUserAt) {
    case 0:
        $response = getMenu1();
        break;
    case 1:
        $response = getMenu2($message);
        break;
    case 2:
        $response = getMenu3($message);
        break;
    default:
        $response = getMenu1();
        break;
}
sendOutput($response,1);
exit;

function getLevel($text){
    if($text == ""){
        $response['level'] = 0;
    }else{
        $exploded_text = explode('*',$text);
        $response['level'] = count($exploded_text);
        $response['latest_message'] = end($exploded_text);
    }
    return $response;
}

function getMenu1(){
    $response ="Select 1 or 2".PHP_EOL;
    $response .="1. Check gender".PHP_EOL;
    $response .="2. About";
    sendOutput($response,1);
}

function getMenu2($text){
    switch ($text){
        case 1:
            $response="Select 1 or 2".PHP_EOL;
            $response .="1. Cars".PHP_EOL;
            $response .="2. Shoes";
            sendOutput($response,1);
            break;
        case 2:
            $response ="This is an app for selecting gender";
            sendOutput($response,2);
            break;
    }
}

function getMenu3($text){
    switch ($text){
        case 1:
            $response = "You are a man".PHP_EOL;
            sendOutput($response,2);
            break;

        case 2:
            $response="You are a woman";
            sendOutput($response,2);
            break;

    }
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
?>