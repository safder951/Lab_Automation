<?php
    include('include/constring.php');
    if($_GET['id']){
         $id = $_GET['id'];
            $sql = "UPDATE `testing` SET `test_status`='Approve' WHERE test_id = $id";
            $result = mysqli_query($conn,$sql);
            if($result){
                echo "<script>window.location.href='test.php'</script>";
            }
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


    <div class="wrapper mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 justify-content-center">
                    <div class="card m-b-30 card-body">
                        <h3 class="card-title font-20 mt-0">Approve Test</h3>
                        <p class="card-text">Do Your Want to Approve This Test?</p>
                        <form action=""><input type="hidden" name="id"><input type="submit" name="btn" class="btn btn-sm btn-info" value="Approve"></form><br><a href="test.php" class="btn btn-danger waves-effect waves-light">Canncel</a>
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


</body>

</html>