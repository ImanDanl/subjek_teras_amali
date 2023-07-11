<?php 
session_start(); 
include "db.php";

if (isset($_POST['ic']) && isset($_POST['nama'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['ic']);
	$pass = validate($_POST['nama']);

	if (empty($ic)) {
		header("Location: index.php?error=User Name is required");
	    exit();
	}else if(empty($nama)){
        header("Location: index.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE ic='$ic' AND nama='$nama'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['ic'] === $ic && $row['nama'] === $nama) {
            	$_SESSION['ic'] = $row['ic'];
            	$_SESSION['ic'] = $row['ic'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: index.php");
		        exit();
            }else{
				header("Location: index.php?error=Incorect nama or ic");
		        exit();
			}
		}else{
			header("Location: index.php?error=Incorect nama or ic");
	        exit();
		}
	}
	
}else{
	header("Location: index.php");
	exit();
}