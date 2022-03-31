<?php
    session_start();
    include '../connection/dbConfig.php';

    if(isset($_POST['addClientBtn'])){

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
    
    
    
        $nominee_id              = $_POST["nominee_id"];
        $nominee_name            = $_POST["nominee_name"];
        $nominee_sex             = $_POST["nominee_sex"];
        $nominee_birth_date      = $_POST["nominee_birth_date"];
        $nominee_nid             = $_POST["nominee_nid"];
        $nominee_relationship    = $_POST["nominee_relationship"];
        $priority                = $_POST["priority"];
        $nominee_phone           = $_POST["nominee_phone"];
    
    
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
    
        $sql = "INSERT INTO client "."VALUES('$client_id', '$client_password', '$name', '$sex', '$birth_date', '$maritial_status', '$nid', '$phone', '$address', '$policy_id', '$agent_id','$profileImage')";
    
        if ($conn->query($sql) === true) {
            echo "New Client ADDED";  echo '</br>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
        }
    
    
    
        /// NOMINEE BEING ADDED
        $sql = "INSERT INTO nominee "."VALUES('$nominee_id', '$client_id', '$nominee_name', '$nominee_sex', '$nominee_birth_date', '$nominee_nid', '$nominee_relationship','$priority', '$nominee_phone')";
    
        if ($conn->query($sql) === true) {
            echo "New Nominee ADDED";  echo '</br>';
            header("location: ../client.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;  echo '</br>';
        }







    }

    

?>