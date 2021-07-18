<?php
$alert = false;
//error_reporting(0);
include('constring.php');
if(isset($_POST['submit'])){
$pro_name=$_POST['name'];
$pro_detail=$_POST['detail'];
# file Name;
# File Tyoe ;
# File Tem Name;
# $_FILES
$pro_image=$_FILES['img']['name'];
$img_type=$_FILES['img']['type'];
$temp_name=$_FILES['img']['tmp_name'];
$folder="../images/";
}
if ($img_type="img/jpg" || $img_type="img/jpeg"  || $img_type="img/png") {
  
  if (move_uploaded_file($temp_name,$folder.$pro_image)) {
    
    $sql = "INSERT INTO product(pro_name, pro_image, pro_detail) VALUES ('$pro_name','$pro_image','$pro_detail')";
    $result = mysqli_query($conn,$sql);
    $alert = true;
        if ($alert) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Success!</strong> Your Product has been added! Please wait for community to respond.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
        }
    else{

        }
    }

}
?>