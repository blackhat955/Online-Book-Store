<?php
session_start();
session_unset();
session_destroy();
ob_start();
$message = "You Logout sucessfully Thank You. Please Visit Again !!!!";
				echo "<script type='text/javascript'>alert('$message');</script>";
                echo '<script>
                window.location="login.html";
                </script>';
ob_end_flush();
exit();

?>