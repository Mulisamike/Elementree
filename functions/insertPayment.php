<?php
session_start();
include '../connection/dbConfig.php';


if(isset($_POST['addPaymentBtn'])){

    $recipt_no      = $_POST["recipt_no"];
	$client_id      = $_POST["client_id"];
	$month          = $_POST["month"];
	$amount         = $_POST["amount"];
	$fine           = $_POST["fine"];
	$due            = $_POST["due"];
	$agent_id       = $_POST["agent_id"];


    $insert_payment = "INSERT INTO payment(recipt_no, client_id, month, amount, fine, due, agent_id) 
                       VALUES('$recipt_no', '$client_id', '$month', '$amount', '$fine', '$due','$agent_id')";
    $run_insert = mysqli_query($conn, $insert_payment);
	
	if ($run_insert) {
			echo "New Payment ADDED";
            header("location: ../payments.php");
		} else {
			echo "Error: " . $sql . "<br>" . $conn->error;
		}
}
    

?>