<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 7/17/15
 * Time: 5:09 PM
 */
$input = getInput();

if ( $input['text'] == "" ) {
    // This is the first request. Note how we start the response with CON
    $response  = "1. Cars".PHP_EOL;
    $response  .= "2. Shoes";
    sendOutput($response,1);
}else{

    switch (strtolower($input['text'])) {
        case 1:
            $response  = "1. Blue".PHP_EOL;
            $response  .= "2. Pink";
            break;
        case 2:
            $response = "1. Football".PHP_EOL;
            $response = "2. Manicure";
            break;
        case 3;
            $result = (explode($input['text']));
            if ($result==1){
                $response = "You are a man".PHP_EOL;
            }
            else{
                $response="You are a woman";
            }
            sendOutput($response,2);

        default:
            $response = "We could not understand your response";
            break;
    }
    sendOutput($response,1);
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

function getInput(){
    $input = array();
    $input['sessionId']   = $_REQUEST["sessionId"];
    $input['serviceCode'] = $_REQUEST["serviceCode"];
    $input['phoneNumber'] = $_REQUEST["phoneNumber"];
    $input['text']        = $_REQUEST["text"];

    return $input;

?>