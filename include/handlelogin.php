<?php
        include('header.php');
        include('constring.php') ?>
<?php
$showError = false;
if (isset($_POST['btn'])){
    
    $email =$_POST['mail'];
    $pass =$_POST['pass'];
    
    $sql= "SELECT * FROM `users` WHERE user_email = '$email'";
    $result = mysqli_query($conn,$sql);
    $numRows = mysqli_num_rows($result);
    if ($numRows==1) {
        
        $row = mysqli_fetch_assoc($result);
        
            if($email == $row['user_email'] && $pass == $row['user_password'])
            {
                // $_SESSION['loggedin'] = true;
                $_SESSION['user_name'] = $row['user_name'];
                $_SESSION['user_id'] = $row['user_id'];
                echo '<script>window.location.href="http://localhost/lab/dashboard.php";</script>';
                // exit();
            }
            else{
                echo '<script>window.location.href="http://localhost/lab/index.php";</script>';
            }
    }
        

       // header("location: /horizontal/dashboard.php");

}
  
?>