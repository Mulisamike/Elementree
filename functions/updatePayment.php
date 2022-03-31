<?php
session_start();
include '../connection/dbConfig.php';


if(isset($_POST['editPaymentBtn'])){

    $recipt_no      = $_POST["recipt_no"];
	$client_id      = $_POST["client_id"];
	$month          = $_POST["month"];
	$amount         = $_POST["amount"];
	$fine           = $_POST["fine"];
	$due            = $_POST["due"];
	$agent_id       = $_POST["agent_id"];


    $update_payment = "UPDATE payment
                       SET recipt_no='$recipt_no', client_id='$client_id', month='$month', amount='$amount', fine='$fine', due='$due', agent_id='$agent_id'
                       WHERE recipt_no = '$recipt_no'";
    $run_update = mysqli_query($conn, $update_payment);
	
	if ($run_update) {
			echo "New Payment ADDED";
            header("location: ../payments.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
    

?>