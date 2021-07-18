<?php
include('constring.php');
    session_start();
    $_SESSION["editmsg"]="";
    if(isset($_POST['testedit'])){
    $myid = $_POST['tid'];
    $testtype = $_POST['testtype'];
    $testrev = $_POST['testrevision'];
    $user = $_POST['uname'];
    $product = $_POST['product'];
    $testdescrip = $_POST['descrip'];
    $sql = "UPDATE `testing` SET `testing_type_Fk`= '$testtype',`test_revision`='$testrev',`user_id_Fk`='$user',`test_descp` = '$testdescrip',`pro_id_Fk`='$product' WHERE test_id = '$myid'";
    $result = mysqli_query($conn,$sql);
   //  var_dump($sql);
   //  exit();
    if($result){
      $_SESSION['editmsg']='<div class="alert alert-info alert-dismissible fade show mt-4" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <strong>Well done!</strong>
      </div>';
        echo "<script>window.location.href='../test.php'</script>";
       // $alert = true;
    }
    else{
      $_SESSION['editmsg']='<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
      </button>
      <strong>Something went wrong!</strong>
      </div>';
    }
}
?>