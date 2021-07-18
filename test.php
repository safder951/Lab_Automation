<?php
    include('include/constring.php');
    session_start();
    $_SESSION["testmsg"]="";
    $_SESSION["editmsg"]="";
    if(isset($_POST['testbtn'])){
    $testtype = $_POST['testtype'];
    $testrev = $_POST['testrevision'];
    $user = $_POST['uname'];
    $product = $_POST['product'];
    $testdescrip = $_POST['descrip'];

    $sql = "INSERT INTO `testing`(`testing_type_Fk`, `test_revision`, `user_id_Fk`, `test_descp`, `pro_id_Fk`, `test_status`) VALUES ('$testtype','$testrev','$user','$testdescrip','$product','Pending')";
    $result = mysqli_query($conn,$sql);
    if($result){
        $_SESSION['testmsg']='<div class="alert alert-success alert-dismissible fade show mt-4" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>Well done!</strong>
        </div>';
        
    }
    else{
        $_SESSION['testmsg']='<div class="alert alert-danger alert-dismissible fade show mt-4" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    <strong>Something went wrong!</strong>
    </div>';
    }
}

if(isset($_POST['delete_btn_set'])){
                    $del_id = $_POST['delete_id'];
                    //$delete = true;
                    $sql = "DELETE FROM `testing` WHERE `test_id` = '$del_id'";
                    $result = mysqli_query($conn, $sql);
                }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Lab Automation- Testing</title>
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
            if($_SESSION['testmsg']){
                echo $_SESSION['testmsg'];

               unset($_SESSION['testmsg']);
               
            }
            
            ?>
 <?php
            if($_SESSION['editmsg']){
                echo $_SESSION['editmsg'];

               unset($_SESSION['editmsg']);
               
            }
            
            ?>
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 mt-4">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Test</h4>
                            <!--<p class="text-muted m-b-30 font-14">Here are examples of <code
                                        class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                            class="highlighter-rouge">type</code>.</p>-->
                            <form action="test.php" method="POST">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Test</label>
                                    <div class="col-sm-10">
                                        <select name="testtype" class="custom-select">
                                            <option selected>Select this Test Type</option>
                                            <?php
                                                $sql = "SELECT * FROM `test_type`";
                                                $result = mysqli_query($conn,$sql);
                                                while ($row = mysqli_fetch_array($result)) {
?>
                                            <option value="<?php echo $row['test_type_id']; ?>">
                                                <?php echo $row['test_type']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Test
                                        Revision</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" name="testrevision"
                                            placeholder="Enter Test Revision" type="text" id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="uname">
                                            <option>Select</option>
                                            <?php
                                                $sql = "SELECT * FROM `users`";
                                                $result = mysqli_query($conn,$sql);
                                                while ($row = mysqli_fetch_array($result)) {
?>
                                            <option value="<?php echo $row['user_id']; ?>">
                                                <?php echo $row['user_name']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Product</label>
                                    <div class="col-sm-10">
                                        <select name="product" class="form-control">
                                            <option>Select</option>
                                            <?php
                                                $sql = "SELECT * FROM `product`";
                                                $result = mysqli_query($conn,$sql);
                                                while ($row = mysqli_fetch_array($result)) {
?>
                                            <option value="<?php echo $row['pro_id']; ?>">
                                                <?php echo $row['pro_name']; ?></option>
                                            <?php
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-password-input" class="col-sm-2 col-form-label">Test
                                        Description</label>
                                    <div class="col-sm-10">
                                        <textarea name="descrip" placeholder="Enter Test Description Here" required
                                            class="form-control" rows="3"></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" name="testbtn" type="submit"
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

                            <h4 class="mt-0 header-title">Test Record</h4>
                            <p class="text-muted m-b-30 font-14">
                            </p>
                            <table id="datatable" class="table table-bordered dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>Test ID</th>
                                        <th>Test Type</th>
                                        <th>Test Revision</th>
                                        <th>User Name</th>
                                        <th>Product Name</th>
                                        <th>Test Description</th>
                                        <th>Test Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    <?php 
                            $sql = "SELECT test_id,test_type,test_revision,user_name,pro_name,test_descp,test_descp,test_status FROM testing INNER JOIN test_type ON testing.testing_type_Fk = test_type.test_type_id
                            INNER JOIN users ON testing.user_id_Fk = users.user_id
                            INNER JOIN product ON testing.pro_id_Fk = product.pro_id";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;     
          ?>
                                    <tr>
                                        <td><?php echo $row['test_id'];?></td>
                                        <td><?php echo $row['test_type'];?></td>
                                        <td><?php echo $row['test_revision'];?></td>
                                        <td><?php echo $row['user_name'];?></td>
                                        <td><?php echo $row['pro_name'];?></td>
                                        <td><?php echo $row['test_descp'];?></td>
                                        <td><?php echo $row['test_status'];?></td>
                                        <td><a href="testedit.php?id=<?php echo $row['test_id']; ?>"><input type="submit" name="edit" class="btn btn-sm btn-info" value="Edit"></a>|<input type="hidden" class="delete_id_value" value="<?php echo $row['test_id']; ?>"> <input type="button" value="Delete" class="delete btn btn-sm btn-danger"></td>
                                    </tr>
                                    <?php
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


        <!-- jQuery  -->
        <?php 
         include('include/scripts.php');
        ?>
        <script>
        $(document).ready(function() {

            $('.delete').click(function(e) {
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
                                url: "test.php",
                                data: {
                                    "delete_btn_set": 1,
                                    "delete_id": deleteid,
                                },
                                success: function(response) {
                                    swal("Data Delete Successfully.!", {
                                        icon: "success",
                                    }).then((result) => {
                                        location.reload();
                                    });
                                }
                            });
                        }
                    });
            });



        })
        </script>


</body>

</html>