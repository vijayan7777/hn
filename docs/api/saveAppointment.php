<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];
if ($http_origin == "http://localhost:4200" || $http_origin == "http://www.hnengg.com" || $http_origin == "http://hnengg.com") {
    header("Access-Control-Allow-Origin: $http_origin");
} else {
  return;
}

$name = $_POST['name'];
$mobileNo  = $_POST['mobileNo'];
$services = $_POST['services'];
//print_r($services);
	 //$mailKey = base64_encode($user->id."fxamregister".$user->username);
     $to = "vijayan7777@gmail.com"; //projects@hnengg.com
     $subject = "H & N AirCon Service Appointment Request";
     $message = "Dear Sir, <br><br> You have recevied the appointment request from the below contact,";
    //$message .= "<a href='http://fxamtrade.com/#/registrationConfirmation?id=".$mailKey."'>http://fxamtrade.com/#/registrationConfirmation?id=".$mailKey."<a>";
     $message .= "<br><b>Name:</b> ".$name;
     $message .= "<br><b>Mobile No:</b> ".$mobileNo;
     $message .= "<br><br><b>We Need Services for below: </b>";
     
    $service = explode(",", $services); 

    for ($i=0; $i<count($service); $i++) {
    	if ($service[$i] === 'normalService') {
           $message .= '<br>Normal servicing';
        } elseif ($service[$i] === 'chemicalWash') {
           $message .= '<br>Chemical Wash & Overhaul';
        } elseif ($service[$i] === 'gasTopup') {
           $message .= '<br>Gas Topup';
        } elseif ($service[$i] === 'yearlyMaintenance') {
           $message .= '<br>Yearly Maintenance';
        } elseif ($service[$i] === 'newInstall') {
           $message .= '<br>New Installation';
        } elseif ($service[$i] === 'others') {
           $message .= '<br>Others';
        }
    }
    
    $message .= "<br><br> <b> Note: This is auto generated mail. Do not reply this mail, for further please contact above Mail Id.";
     $header = "From:H & N Aircon Appointment Request<noreply@hnengg.com> \r\n";
     $header .= "Cc:H & N Aircon Appointment Request<noreply1@hnengg.com> \r\n";
     $header .= "MIME-Version: 1.0\r\n";
     $header .= "Content-type: text/html\r\n";

     $retval = mail ($to,$subject,$message,$header);

     if( $retval == true ) {
        //echo "Message sent successfully...";
		$user_arr=array(
        "status" => true,
        "message" => "mail send successfully!"
    );
     }else {
        //echo "Message could not be sent...";
		$user_arr=array(
        "status" => false,
        "message" => "mail not send!"
    );
     }
	  
	print_r(json_encode($user_arr));
?>
