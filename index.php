<?php
$input = getInput();


if ( $input['text'] == "" ) {
     // This is the first request. Note how we start the response with CON
     $response  = "Safaricom+".PHP_EOL;
     $response .= "MPESA";
	 sendOutput($response,1);
}else{
	 $response  = "Send money".PHP_EOL;
	 $response  .= "Withdraw Cash".PHP_EOL;
	 $response  .= "Buy Airtime".PHP_EOL;
	 $response  .= "M-Shwari".PHP_EOL;
	 $response  .= "Lipa na M-PESA".PHP_EOL;
	 $response  .= "My account".PHP_EOL;
	 sendOutput($response,2);
}



$message = "Your Phone number is: ".$input['phoneNumber'].". Session is: ".$input['sessionId']." You have sent text as: ".$input['text'];

sendOutput($message,1);



////



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
}//
// *222*4*5*7#
// Structure of a USSD Code
// *222*Leo*Secondname*34234*Nairobi#



// return "hello world";
$leo = ['name'=>'Leo', 'staff_id' => 1234];

$macharia = ['name'=>'Macharia', 'staff_id' => 12345];

$kevin = ['name'=>'Kevin', 'staff_id' => 231];
