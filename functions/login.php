<?php
	session_start();
	include '../connection/dbConfig.php';
	
	
	if(isset($_POST['loginBtn'])){
		$username = $_POST["username"];
		$password = $_POST["password"];


		$select_query = "SELECT * FROM agent WHERE agent_id = '$username'";
		$run_query = mysqli_query($conn, $select_query);
		$rows = mysqli_fetch_assoc($run_query);
		$count = mysqli_num_rows($run_query);


		if($count==1){
			$_SESSION['username'] = $username;
			$_SESSION['name'] = $rows['name'];
			header("location: ../index.php");	

		}else{

			header("location: login.php");

		}
	} 
	
	
?>