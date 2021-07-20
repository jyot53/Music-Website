<?php

session_start();

header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");

// following files need to be included
require_once("./lib/config_paytm.php");
require_once("./lib/encdec_paytm.php");

$databaseHost     = 'localhost';
$databaseName     = 'practice_music';
$databaseUsername = 'root';
$databasePassword = 'root';

$conn = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);
// include_once("../getemail.php");

// $getemail = "select * from registration where username = '" . $_SESSION['username'] . "' ";
//     $result = $con->query($getemail);
//     if ($result->num_rows > 0) {
//         // output data of each row
//         while ($row = $result->fetch_assoc()) {
//             $email = $row["email"];
//         }
//     }


$paytmChecksum = "";
$paramList = array();
$isValidChecksum = "FALSE";

$paramList = $_POST;
$paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg

//Verify all parameters received from Paytm pg to your application. Like MID received from paytm pg is same as your application�s MID, TXN_AMOUNT and ORDER_ID are same as what was sent by you to Paytm PG for initiating transaction etc.
$isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.


if($isValidChecksum == "TRUE") {
	// echo "<b>Checksum matched and following are the transaction details:</b>" . "<br/>";
	if ($_POST["STATUS"] == "TXN_SUCCESS") {
		echo "<b>Transaction status is success</b>" . "<br/>";
		//Process your transaction here as success transaction.
		//Verify amount & order id received from Payment gateway with your application's order id and amount.


			// echo $_SESSION['username'];
			$order_id = $_POST['ORDERID'];
			$username = $_SESSION['username'];
			$status = $_POST['STATUS'];
			$amount = $_POST['TXNAMOUNT'];
			$date = $_POST['TXNDATE'];

			if($amount == 129){
				$course_name = "Basic";
			}elseif($amount == 299){
				$course_name = "Standard";
			}else{
				$course_name = "Advanced";
			}

			$insertcourse = "insert into orders(order_id,username,course_name,status,amount,order_date) values ('$order_id','$username','$course_name','$status','$amount','$date')";
			echo $insertcourse;

			if(mysqli_query($conn,$insertcourse)){
				echo "Redirecting To Home Page...";
				echo "<script> setTimeout(()=>{
					window.location.href='../index1.php';	
				},1500); </script>";
			}else{

				mysqli_error($conn);
			}
			
	}
	else {
		echo "<b>Transaction status is failure</b>" . "<br/>";
	}

	// if (isset($_POST) && count($_POST)>0 )
	// { 
	// 	foreach($_POST as $paramName => $paramValue) {
	// 			echo "<br/>" . $paramName . " = " . $paramValue;
	// 	}
	// }
	

}
else {
	echo "<b>Checksum mismatched.</b>";
	//Process transaction as suspicious.
}

?>