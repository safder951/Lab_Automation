<?php

include('include/constring.php');
//$myid = "";
if($_GET['id']){
    $myid=$_GET['id'];
    // $q="SELECT testing.*,test_type.test_type,users.user_name,product.pro_name
    // FROM testing
    // LEFT JOIN test_type
    // ON testing.testing_type_Fk = test_type.test_type_id
    // LEFT JOIN users
    // ON testing.user_id_Fk = users.user_id
    // LEFT JOIN product
    // ON testing.pro_id_Fk = product.pro_id WHERE test_id = '$myid'";
    $q = "SELECT * FROM `testing` WHERE test_id = $myid"; 
    $check=mysqli_query($conn,$q);
    $data =mysqli_fetch_array($check);
    // echo"<script>alert($data);</script>";

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


            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 mt-4">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Test</h4>
                            <!--<p class="text-muted m-b-30 font-14">Here are examples of <code
                                        class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                            class="highlighter-rouge">type</code>.</p>-->
                            <form action="include/testupdate.php" method="POST">
                                <input type="hidden" name="tid" value="<?php echo $data['test_id']; ?>">
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Select Test</label>
                                    <div class="col-sm-10">
                                        <select name="testtype" class="custom-select">
                                        <option>Select Test Type</option>
            
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
                                            placeholder="Enter Test Revision"
                                            value="<?php echo $data['test_revision']; ?>" type="number" id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">User Name</label>
                                    <div class="col-sm-10">
                                        <select class="form-control" name="uname">
                                            <option value="" >Select User</option>
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
                                            <option value="">Select Product</option>
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
                                            class="form-control" rows="3"><?php echo $data['test_descp']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" name="testedit" type="submit"
                                            id="example-text-input">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
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