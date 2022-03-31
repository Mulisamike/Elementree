<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_GET['deletePaymentBtn'])){


    $recipt_no = $_GET["deletePaymentBtn"];
	

    $delete_payment = "DELETE FROM payment WHERE recipt_no = '$recipt_no'";
    $run_delete = mysqli_query($conn, $delete_payment);

    if ($run_delete) {
        echo "New Nominee ADDED";
        header("location: ../payments.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>