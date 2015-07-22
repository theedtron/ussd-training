<?php
/**
 * Created by PhpStorm.
 * User: ed
 * Date: 7/17/15
 * Time: 6:07 PM
 */
$input = getInput();
$text = $_REQUEST["text"];
$level = 0;

$ussd_string_exploded = explode ("*",$input['text']);

// Get menu level from ussd_string reply
$level = count($ussd_string_exploded);
if($level == 1 or $level == 0){

    displaymenu(); // show the home/first menu
}

if ($level > 1) {
    switch (strtolower($input['text'])) {
        case 1:
            $response  = "1. Blue".PHP_EOL;
            $response  .= "2. Pink";
            break;
        case 2:
            $response = "1. Football".PHP_EOL;
            $response = "2. Manicure";
            break;

}

    function getInput()
    {
        $input = array();
        $input['sessionId'] = $_REQUEST["sessionId"];
        $input['serviceCode'] = $_REQUEST["serviceCode"];
        $input['phoneNumber'] = $_REQUEST["phoneNumber"];
        $input['text']        = $_REQUEST["text"];
        //$details = $_REQUEST["text"];

        return $input;
    }

function checkgender()
{

}

function displaymenu(){
    $response =    "1. Check gender \n 2. About \n"; // add \n so that the menu has new lines
    ussd_proceed($response);
}

function about($response)
{
    $response =    "This is a simple app for telling your gender";
    ussd_stop($response);
}

function ussd_proceed($response){
    echo "CON $$response";
}

function ussd_stop($response){
    echo "END $response";
}

?>