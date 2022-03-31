<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_GET['client_id'])){


    $client_id = $_GET["client_id"];
	

    $delete_client = "DELETE FROM client WHERE client_id = '$client_id'";
    $run_delete = mysqli_query($conn, $delete_client);

    if ($run_delete) {
        echo "New Nominee ADDED";
        header("location: ../client.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>