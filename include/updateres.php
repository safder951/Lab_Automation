<?php
    include('constring.php');
    if(isset($_POST['resbtn'])){
    $id = $_POST['id'];
    $result = $_POST['resname'];
    $resultremark = $_POST['resremark'];
    $user = $_POST['user'];
    $test = $_POST['test'];
    $product = $_POST['product'];

    $sql = "UPDATE `result` SET `res_name`='$result',`res_remark`='$resultremark',`user_id_Fk`='$user',`testing_id_Fk`=$test,`pro_id_Fk`='$product' WHERE 'res_id' '$id'";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo "<script>window.location.href='../result.php'</script>";
        
    }
    else{
       
    }
}

?>