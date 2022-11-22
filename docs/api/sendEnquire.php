<?php
$http_origin = $_SERVER['HTTP_ORIGIN'];
if ($http_origin == "http://localhost:4200" || $http_origin == "http://www.hnengg.com" || $http_origin == "http://hnengg.com") {
    header("Access-Control-Allow-Origin: $http_origin");
} else {
  return;
}

$name = $_POST['name'];
$mobileNo  = $_POST['mobileNo'];
$subject = $_POST['subject'];
$email  = $_POST['email'];
$message = $_POST['message'];
//print_r($services);
	 //$mailKey = base64_encode($user->id."fxamregister".$user->username);
     $to = "vijayan7777@gmail.com"; //projects@hnengg.com
     $subject = "H & N AirCon Service Contact Enquiry ".$subject;
     $message = "Dear Sir, <br><br> You have recevied the Enquiry request from the below contact <br><br>".$message;
    //$message .= "<a href='http://fxamtrade.com/#/registrationConfirmation?id=".$mailKey."'>http://fxamtrade.com/#/registrationConfirmation?id=".$mailKey."<a>";
     $message .= "<br><br>Name: ".$name;
     $message .= "<br>Mobile No: ".$mobileNo;
     $message .= "<br>Email: ".$email;
     
     $message .= "<br><br> <b> Note: This is auto generated mail. Do not reply this mail, for further please contact above Mail ID.";
     
     $header = "From:H & N Aircon Enquiry Request<noreply@hnengg.com> \r\n";
     $header .= "Cc:H & N Aircon Enquiry Request<noreply1@hnengg.com> \r\n";
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
