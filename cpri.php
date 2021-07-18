<?php 
         include('include/constring.php');
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
    <title>Lab Automation- Results</title>
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
            if($_SESSION['resmsg']){
                echo $_SESSION['resmsg'];

               unset($_SESSION['resmsg']);
               
            }
            
            ?>

           
            <!---Start Data table of product-->
            <div class="row mt-5">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Result Record</h4>
                            <p class="text-muted m-b-30 font-14">
                            </p>
                            <table id="datatable" class="table table-bordered dt-responsive ">
                                <thead>
                                    <tr>
                                        <th>Test ID</th>
                                        <th>Test Name</th>
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
                            $sql = "SELECT test_id,test_type,test_revision,user_name,test_descp,pro_name,test_status,test_add_datetime FROM testing 
                            LEFT JOIN users ON testing.user_id_Fk = users.user_id
                            LEFT JOIN product ON testing.pro_id_Fk = product.pro_id
                            LEFT JOIN test_type ON testing.testing_type_Fk = test_type.test_type_id
                            WHERE testing.test_status = 'pending'";
                            $result = mysqli_query($conn, $sql);
                            $sno = 0;
                            while($row = mysqli_fetch_assoc($result)){
                                $sno = $sno + 1;     
                                // $date = $row['res_add_datetime'];
          ?>
                                    <tr>
                                        <td><?php echo $sno; ?></td>
                                        <!-- <td><?php echo $row['test_id'];?></td> -->
                                        <td><?php echo $row['test_type'];?></td>
                                        <td><?php echo $row['test_revision'];?></td>
                                        <td><?php echo $row['user_name'];?></td>
                                        <td><?php echo $row['pro_name']; ?></td>
                                        <td><?php echo $row['test_descp'];?></td>
                                        <td><a href="testapprove.php?id=<?php echo $row['test_id'];?>"><?php echo $row['test_status']; ?></a></td>
                                        <td><a href="cpriedit.php?id=<?php echo $row['test_id'];?>"><input type="submit" name="edit" class="btn btn-sm btn-success" value="Edit"></a>|<input type="hidden" class="delete_id_value" value="<?php echo $row['test_id']; ?>"><button class="delete btn btn-sm btn-danger">Delete</button></td>
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