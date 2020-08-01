<?php
$Name=filter_input(INPUT_POST,'Name');
$Email=filter_input(INPUT_POST,'Email');
$Password=filter_input(INPUT_POST,'Password');

if(!empty($Email)){
	if(!empty($Password)){
		$host="localhost";
		$dbusername="root";
		$dbpassword="";
		$dbname="book store";
		
		//connection databae
		$conn=new mysqli($host,$dbusername,$dbpassword,$dbname);
		
		if(mysqli_connect_error()){
			die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());

		}
		else{
			$dup=mysqli_query($conn,"select*from user where email='$Email' ");
			if(mysqli_num_rows($dup)>0){
				$message = "This Email is already taken.Please try with different One";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo '<script>
            window.location="register.html";
            </script>';
				die();
			}

			$sql="INSERT INTO user(name,email,password) values('$Name','$Email','$Password')";
			if($conn->query($sql)){
				$message = "Your registrion is sucessfully.Now you can login";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo '<script>
            window.location="login.html";
            </script>';
			}else{
				$message = "Registraion is fail.You May be enter worng credintial";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo '<script>
            window.location="register.html";
            </script>';
			}
			$conn->close();
		}
	}else{
		echo"password should not empty";
		die();
	    }
}else{
	echo"username should not empty";
	die();
     }



?>