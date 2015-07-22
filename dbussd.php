<?php
// Print the response as plain text so that the gateway can read it
header('Content-type: text/plain');
//local db configuration
$dsn = 'mysql:dbname=registration;host=localhost;'; //database name
$user = 'wifiedne_admin';
$password = '@I1JREAe?}Py';

//  Create a PDO instance that will allow you to access your database
try {
    $dbh = new PDO($dsn, $user, $password);
}
catch(PDOException $e) {
    //var_dump($e);
    echo("PDO error occurred");
}
catch(Exception $e) {
    //var_dump($e);
    echo("Error occurred");
}

// Get the parameters provided by Africa's Talking USSD gateway
$phone = $_GET['phoneNumber'];
$session_id = $_GET['sessionId'];
$service_code = $_GET['serviceCode'];

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

global $exploded_text;

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
    $response ="Registration Check".PHP_EOL;
    $response .="1. Register".PHP_EOL;
    $response .="2. Check Registration";
    sendOutput($response,1);
}

function getMenu2($text){
    switch ($text){
        case 1:
            $response="Enter name and ID number seperated by a comma";
            register($exploded_text,);
            sendOutput($response,1);
            break;
        case 2:
            $response ="This is an app for selecting gender";
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

function register(){
// Function that handles Registration menu
    function register($details,$phone, $dbh){
        if(count($details) == 2)
        {

            $response = "Please enter your Full Name and Email, each seperated by commas:";
            sendOutput($response,1); // ask user to enter registration details
        }
        if(count($details)== 3)
        {
            if (empty($details[1])){
                $response = "Sorry we do not accept blank values";
                sendOutput($response,1);
            } else {
                $input = explode(",",$details[1]);//store input values in an array
                $full_name = $input[0];//store full name
                $idno = $input[1];//store email
                $phone_number =$phone;//store phone number
                // build sql statement
                $sth = $dbh->prepare("INSERT INTO registration (full_name, id_no, phone_no) VALUES('$full_name','$idno','$phone_number')");
                //execute insert query
                $sth->execute();
                if($sth->errorCode() == 0) {
                    $response = $full_name." your registration was successful. Your ID number is ".$idno." and phone number is ".$phone_number;
                    sendOutput($response,1);
                } else {
                    $errors = $sth->errorInfo();
                }
            }
        }
    }
# close the pdo connection
    $dbh = null;
}

?>