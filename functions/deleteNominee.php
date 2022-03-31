<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_GET['deleteNomineeBtn'])){


    $nominee_id = $_GET["deleteNomineeBtn"];
	

    $delete_nominee = "DELETE FROM nominee WHERE nominee_id = '$nominee_id'";
    $run_delete = mysqli_query($conn, $delete_nominee);

    if ($run_delete) {
        echo "New Nominee ADDED";
        header("location: ../nominee.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>