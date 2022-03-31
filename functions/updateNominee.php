<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_POST['updateNomineeBtn'])){


    $nominee_id      = $_POST["nominee_id"];
	$client_id       = $_POST["client_id"];
	$name            = $_POST["name"];
	$sex             = $_POST["sex"];
	$birth_date      = $_POST["birth_date"];
	$nid             = $_POST["nid"];
	$relationship    = $_POST["relationship"];
	$priority        = $_POST["priority"];
	$phone           = $_POST["phone"];

    $update_nominee = "UPDATE nominee
                       SET name='$name', sex='$sex', birth_date='$birth_date ', nid='$nid  ', relationship='$relationship', priority='$priority ', phone='$phone'
                       WHERE nominee_id = '$nominee_id'";
    $run_update = mysqli_query($conn, $update_nominee);

    if ($run_update) {
        echo "New Nominee ADDED";
        header("location: ../nominee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>