<?php

//local db configuration
$dsn = 'mysql:dbname=registration;host=www.wifiednetworks.co.ke;'; //database name
$user = 'wifiedne_admin'; // your mysql user
$password = '@I1JREAe?}Py'; // your mysql password


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

$input = getInput();

// As Edwin I want to dial a shortcode then enter the KPLC staff ID and find out if he is valid

//Dial a code


//Enter staff id
if ( $input['text'] == "" ) {
    // This is the first request. Note how we start the response with CON
    $response  = "Please enter Staff ID";
    sendOutput($response,1);
}else{
    //receive what Edwin has sent in as text
    $id = $input['text'];


    $leo = array('name'=>'Leo', 'staff_id' => 1234);

    $macharia = array('name'=>'Macharia', 'staff_id' => 12345);

    $kevin = array('name'=>'Kevin', 'staff_id' => 231);

    $staff = array('1234'=>$leo,'12345'=>$macharia,'231'=>$kevin);

    if(!empty($staff[$id])){
        $message= "ID is valid and it belongs to ".$staff[$id]['name'];

    }else{
        $message =  "No Staff with that id";
    }


    sendOutput($message,2);


}
//verify if the id belongs to one of the staff members
function getInput(){
    $input = array();
    $input['sessionId']   = $_REQUEST["sessionId"];
    $input['serviceCode'] = $_REQUEST["serviceCode"];
    $input['phoneNumber'] = $_REQUEST["phoneNumber"];
    $input['text']        = $_REQUEST["text"];

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

?>
