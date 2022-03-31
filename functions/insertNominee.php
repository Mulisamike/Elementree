<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_POST['addNomineeBtn'])){


    $nominee_id      = $_POST["nominee_id"];
	$client_id       = $_POST["client_id"];
	$name            = $_POST["name"];
	$sex             = $_POST["sex"];
	$birth_date      = $_POST["birth_date"];
	$nid             = $_POST["nid"];
	$relationship    = $_POST["relationship"];
	$priority        = $_POST["priority"];
	$phone           = $_POST["phone"];

    $insert_nominee = "INSERT INTO nominee (nominee_id, client_id, name, sex, birth_date, nid, relationship, priority, phone) 
                       VALUES('$nominee_id', '$client_id', '$name', '$sex', '$birth_date', '$nid', '$relationship', '$priority', '$phone')";
    $run_insert = mysqli_query($conn, $insert_nominee);

    if ($run_insert) {
        echo "New Nominee ADDED";
        header("location: ../nominee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>