<?php
     include('include/constring.php');
     if($_GET['id']){
        $myid=$_GET['id'];
        $q="select * from `result` where res_id ='$myid'";
        $check=mysqli_query($conn,$q);
        $data = mysqli_fetch_array($check);
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

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 mt-4">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Result</h4>
                            <form action="include/updateres.php" method="POST">
                            <input type="hidden" name="id" value="<?php echo $data['res_id']; ?>">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Result Name</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="<?php echo $data['res_name']; ?>" name="resname" placeholder="Enter Result Name"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Result
                                        Remark</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="<?php echo $data['res_remark']; ?>" name="resremark" placeholder="Enter Result Remak"
                                            type="text">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <select name="user" class="custom-select">
                                            <option selected>Select The User</option>
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
                                    <label class="col-sm-2 col-form-label">Testing</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="test">
                                            <option>Select Test Type</option>
                                            <?php
                                                $sql = "SELECT test_id,test_type FROM testing INNER JOIN test_type ON testing.testing_type_Fk = test_type.test_type_id";
                                                $result = mysqli_query($conn,$sql);
                                                while ($row = mysqli_fetch_array($result)) {
?>
                                            <option value="<?php echo $row['test_id']; ?>">
                                                <?php echo $row['test_type']; ?></option>
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
                                            <option>Select The Product</option>
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
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" name="resbtn" type="submit"
                                            id="example-text-input">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
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