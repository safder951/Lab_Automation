<?php
$showError = false;
if (isset($_POST['btn'])){
    include 'constring.php';
    $sname = $_POST['username'];
    $semail = $_POST['mail'];
    $spass = $_POST['pass'];
    $scpass = $_POST['cpass'];

    //check whether this email exists trough query
    $sql = "select * from `users` where user_email = '$semail'";
    $result = mysqli_query($conn, $sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows>0) {
        $showError = "This Email Already in use";
    }
    else{
        if ($spass == $scpass) {
          $hash = password_hash($spass,PASSWORD_DEFAULT);
          $q = "INSERT INTO `users`(`user_name`, `user_email`, `user_password`) VALUES ('$sname','$semail','$hash')";
          $result = mysqli_query($conn,$q);
          if ($result) {
              $showAlert = true;
              header("location: /horizontal/dashboard.php");
              exit();
          } 
        }
        else{
            $showError = "Password Do Not Match";
            //$_SESSION["error"] = $showError;
        }
    }
   //header("location: /horizontal/signup.php?signupsuccess=false");

}



?>