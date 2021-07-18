<?php
session_start();
$_SESSION["msg"] = "";
//error_reporting(0);
include ('include/constring.php');
if (isset($_POST['submit']))
{
    $pro_name = $_POST['name'];
    $pro_detail = $_POST['detail'];
    # file Name;
    # File Tyoe ;
    # File Tem Name;
    # $_FILES
    $pro_image = $_FILES['img']['name'];
    $img_type = $_FILES['img']['type'];
    $temp_name = $_FILES['img']['tmp_name'];
    $folder = "images/";
    $allowed_types = array(
        'jpg',
        'jpeg',
        'png',
        'jfif'
    );
    $typecheck = pathinfo($pro_image, PATHINFO_EXTENSION);
    if (in_array($typecheck, $allowed_types))
    {

        $upload = move_uploaded_file($_FILES['img']['tmp_name'], "images/" . $pro_image);

        if ($upload)
        {
            $sql = "INSERT INTO product(pro_name, pro_image, pro_detail) VALUES ('$pro_name','$pro_image','$pro_detail')";
            $result = mysqli_query($conn, $sql);
            if ($result)
            {
                $_SESSION['msg'] = '<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Well done!</strong>
            </div>';

                //    echo "<script>window.location.href='addpro.php'</script>";
                
            }
            else
            {
                $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <strong>Something went wrong!</strong>
            </div>';
            }
        }
    }
    else
    {
        $_SESSION['msg'] = '<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Please choose jpeg,jpg or png files only!</strong>
    </div>';
    }

}
if (isset($_POST['delete_btn_set']))
{
    $del_id = $_POST['delete_id'];
    $delete = true;
    $sql = "DELETE FROM `product` WHERE `pro_id` = '$del_id'";
    $result = mysqli_query($conn, $sql);
}

//$alert = false;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Lab Automation - Add Product</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/logo.png">
    <?php 
         include('include/styles.php') ?>


</head>


<body>

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Navigation Bar-->
    <?php include('include/header.php') ?>
    <!-- End Navigation Bar-->

    <div class="wrapper">
        <div class="container-fluid">

            <?php
            if($_SESSION['msg']){
                echo $_SESSION['msg'];

               unset($_SESSION['msg']);
               
            }
            
            ?>

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 mt-4">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Add Product</h4>
                            <!--<p class="text-muted m-b-30 font-14">Here are examples of <code
                                        class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                            class="highlighter-rouge">type</code>.</p>-->
                            <form action="addpro.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="name" placeholder=" Enter Product Name"
                                            type="text" id="proname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Image</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="img" placeholder=" Enter Product Detail"
                                            type="file" id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product
                                        Detail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="detail" placeholder=" Enter Product Detail"
                                            type="text" id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" name="submit" type="submit"
                                            id="example-text-input">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
            </div>
            <!---Start Data table of product-->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Product Table</h4>
                            <p class="text-muted m-b-30 font-14">
                            </p>
                            <table id="datatable" class="table table-bordered dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>Product ID</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Product Detail</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php 
          $sql = "SELECT * FROM `product`";
          $result = mysqli_query($conn, $sql);
          $sno = 0;
          while($row = mysqli_fetch_assoc($result)){
            $sno = $sno + 1;
            echo '<tr>
            <td>'.$sno .'</td>
            <td>'. $row['pro_name'] . '</td>
            <td><img class="d-flex align-self-center rounded mr-3" src="images/'. $row['pro_image'].'" width="100" height="100"></td>
             <td>'. $row['pro_detail'] . '</td>
            <td><a href="editpro.php?id='.$row['pro_id'].'"><input type="submit" name="edit" class="btn btn-sm btn-success" value="Edit"></a> <input type="hidden" class="delete_id_value" value="' .$row['pro_id']. '"> <button class="delete btn btn-sm btn-danger">Delete</button> </td>
          </tr>';
        } 
          ?>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <!-- Footer -->
        <?php 
         include('include/footer.php');
        ?>
        <!-- End Footer -->


        <?php 
         include('include/scripts.php');
        ?>

        <!-- <script>
        //Warning Message
        $(document).ready(function() {

            $('.delete').click(function(e) {
                e.preventDefault();
                var deleteid = $(this).closest("tr").find('.delete_id_value').val();
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonClass: 'btn btn-success',
                    cancelButtonClass: 'btn btn-danger m-l-10',
                    confirmButtonText: 'Yes, delete it!'
                }).then((willDelete) => {
                    if (willDelete) {
                       $.ajax({
                           type: "post",
                           url: "addpro.php",
                           data: {
                               "delete_btn_set":1,
                               "delete_id": deleteid,
                           },
                           success: function (response) {
                               swal("Data Delete Successfully.!",{
                                   icon: "success",
                               }).then((result)=> {
                                    location.reload();
                               });
                           }
                       });
                    } 
                    });
            });
        })
        </script> -->



        <script>
            $(document).ready(function (){ 

               
      $('.delete').click(function (e) { 
          e.preventDefault();
          
          //console.log("hello safdar");
          var deleteid = $(this).closest("tr").find('.delete_id_value').val();
          //console.log(deleteid);
         swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this Record!",
            icon: "warning",
            buttons: true,
            showCancelButton: true,
            confirmButtonClass: 'btn btn-success',
            cancelButtonClass: 'btn btn-danger m-l-10',
            confirmButtonText: 'Yes, delete it!',
            dangerMode: true
            })
            .then((willDelete) => {
                    if (willDelete) {
                       $.ajax({
                           type: "post",
                           url: "addpro.php",
                           data: {
                               "delete_btn_set":1,
                               "delete_id": deleteid,
                           },
                           success: function (response) {
                               swal("Data Delete Successfully.!",{
                                   icon: "success",
                               }).then((result)=> {
                                    location.reload();
                               });
                           }
                       });
                    } 
                    });
             });



        })
        </script>




        <!-- <script>
        deletes = document.getElementsByClassName('delete');
        Array.from(deletes).forEach((element) => {
            element.addEventListener("click", (e) => {
                console.log("edit ");
                sno = e.target.id.substr(1);

                if (confirm("Are you sure you want to delete this Product !")) {
                    console.log("yes");
                    window.location = `/lab/addpro.php?delete=${sno}`;

                } else {
                    console.log("no");
                }
            })
        })
        </script> -->
</body>

</html>