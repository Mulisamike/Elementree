<?php
session_start();
include '../connection/dbConfig.php';


if(isset($_POST['addAgentBtn'])){
    $agent_id       = $_POST["agent_id"];
    $agent_password = $_POST["agent_password"];
    $reagent_password = $_POST['re_agent_password'];
    $name           = $_POST["name"];
    $branch         = $_POST["branch"];
    $phone          = $_POST["phone"];

    if($agent_password == $reagent_password){

        $insert_agent = "INSERT INTO agent (agent_id, agent_password, name, branch, phone) 
        VALUES('$agent_id','$agent_password','$name', '$branch', '$phone')";
        $run_insert = mysqli_query($conn, $insert_agent);

        if ($run_insert) {
        echo "New Agent ADDED";
        header("location: ../agents.php");
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        
        }
    }else{
        header("location: ../addAgent.php");
    }
}
    
    
?>