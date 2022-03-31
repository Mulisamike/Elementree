<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_GET['agent_id'])){


    $agent_id = $_GET["agent_id"];
	

    $delete_agent = "DELETE FROM agent WHERE agent_id = '$agent_id'";
    $run_delete = mysqli_query($conn, $delete_agent);

    if ($run_delete) {
        echo "New Nominee ADDED";
        header("location: ../agents.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>