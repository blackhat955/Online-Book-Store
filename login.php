<?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $con = mysqli_connect('localhost','root','','book store');

        $sql = "SELECT * from user WHERE email='$email' and password = '$password'";
        $result = $con->query($sql);

        if ($result->num_rows > 0)
        {
				$message = "logged in successfully.Welcome Online Bookstore";
				echo "<script type='text/javascript'>alert('$message');</script>";
                echo '<script>
                window.location="welcomebook.html";
                </script>';
            
        }
        else
        {
            $message = "Wrong credentials.Email Or Password Is Worng";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo '<script>
            window.location="login.html";
            </script>';
        }
    }

 ?>
