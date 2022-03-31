<?php
session_start();
include '../connection/dbConfig.php';

if(isset($_POST['updateClientBtn'])){


    $client_id       = $_POST["client_id"];
    $client_password = $_POST["client_password"];
    $name            = $_POST["name"];
    $sex             = $_POST["sex"];
    $birth_date      = $_POST["birth_date"];
    $maritial_status = $_POST["maritial_status"];
    $nid             = $_POST["nid"];
    $phone           = $_POST["phone"];
    $address         = $_POST["address"];
    $policy_id       = $_POST["policy_id"];
    $agent_id        = $_POST["agent_id"];


    $profileImage = basename($_FILES["fileToUpload"]["name"]);
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
        // Check if image file is a act
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "Cliensts profile picture uploaded- " . $check["mime"] . "."; echo '</br>';
                $uploadOk = 1;
            } else {
                echo "File is not an image."; echo '</br>';
                $uploadOk = 0;
            }
    
        // Check file size
        $uploadOk == 1;
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";  echo '</br>';
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //	echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";   echo '</br>';
            }
        }

        $update_client = "UPDATE client 
                          SET client_id = '$client_id', client_password = '$client_password', name='$name', sex='$sex', birth_datw='$birth_date', marital_status='$maritial_status', nid='$nid', phone='$phone', address='$address', policy='$policy_id', agent_id='$agent_id', image='$profileImage')
                          WHERE client_id = '$client_id'";
        $run_update = mysqli_query($conn, $update_client);

        if ($run_update) {
            echo "New Agent ADDED";
            header("location: ../clients.php");
            } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
            
        }


}else{
        header("location: ../clients.php");
}

    

?>