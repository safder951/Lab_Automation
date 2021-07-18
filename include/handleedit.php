<?php

//error_reporting(0);
include('constring.php');
if(isset($_POST['btnEdit'])){
    $id = $_POST['pid'];
    $pro_name=$_POST['pname'];
    $pro_detail=$_POST['pdetail'];
    # file Name;
    # File Tyoe ;
    # File Tem Name;
    # $_FILES
    $pro_image= $_FILES['pimg']['name'];
    $img_type= $_FILES['pimg']['type'];
    $temp_name= $_FILES['pimg']['tmp_name'];
    $folder="images/";
    
    if ($img_type="pimg/jpg" || $img_type="pimg/jpeg"  || $img_type="pimg/png") {
    
        $upload = move_uploaded_file($_FILES['pimg']['tmp_name'],"../images/".$pro_image);
      if ($upload) {
        $sql = "UPDATE `product` SET `pro_name` = '$pro_name', `pro_image` = '$pro_image', `pro_detail` = '$pro_detail' where `pro_id` = '$id'";
        $result = mysqli_query($conn,$sql);
        if($result){
           echo "<script>window.location.href='../addpro.php'</script>";
        }
        else{
        }
      }
    }
    }

?>