<?php
session_start();
include '../connection/dbConfig.php';


if(isset($_POST['editAgentBtn'])){
    $agent_id       = $_POST["agent_id"];
    $agent_password = $_POST["agent_password"];
    $reagent_password = $_POST['re_agent_password'];
    $name           = $_POST["name"];
    $branch         = $_POST["branch"];
    $phone          = $_POST["phone"];

    if($agent_password == $reagent_password){

        $update_agent = "UPDATE agent 
                         SET agent_id='$agent_id', agent_password='$agent_password', name='$name', branch='$branch', phone='$phone' 
                         WHERE agent_id = '$agent_id'";
        $run_update = mysqli_query($conn, $update_agent);

        if ($run_update) {
        echo "New Agent ADDED";
        header("location: ../agents.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
        }
    }else{
        header("location: ../agents.php");
    }
}
    
    
?>