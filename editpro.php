<?php

include('include/constring.php');

if($_GET['id']){
    $myid=$_GET['id'];
    $q="select * from product where pro_id ='$myid'";
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
    <title>Edit Product - Lab Automation</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="shortcut icon" href="assets/logo.png">

    <?php 
         include('include/styles.php') ?>


</head>


<body>

    <!-- Loader  -->
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

            <!-- Page-Title -->
            <!-- Page-Title 
               <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <div class="btn-group float-right">
                                <ol class="breadcrumb hide-phone p-0 m-0">
                                    <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                                    <li class="breadcrumb-item"><a href="#">Components</a></li>
                                    <li class="breadcrumb-item"><a href="#">Forms</a></li>
                                    <li class="breadcrumb-item active">Form Elements</li>
                                </ol>
                            </div>
                            <h4 class="page-title">Form Elements</h4>
                        </div>
                    </div>
                </div>-->
            <!-- end page title end breadcrumb -->

            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30 mt-4">
                        <div class="card-body">

                            <h4 class="mt-0 header-title">Add Product</h4>
                            <!--<p class="text-muted m-b-30 font-14">Here are examples of <code
                                        class="highlighter-rouge">.form-control</code> applied to each
                                    textual HTML5 <code class="highlighter-rouge">&lt;input&gt;</code> <code
                                            class="highlighter-rouge">type</code>.</p>-->
                            <?php 
                            
                            ?>
                            <form action="include/handleedit.php" method="POST" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                    <div class="col-sm-10">
                                    <input  value="<?php echo $data['pro_id']; ?>" name="pid"
                                             type="hidden">
                                        <input class="form-control" value="<?php echo $data['pro_name']; ?>" name="pname"
                                            placeholder=" Enter Product Name" type="text" id="proname">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product
                                        Image</label>
                                    <div class="col-sm-10">
                                        <img class="d-flex align-self-center rounded mr-3"
                                            src="images/<?php echo $data['pro_image']; ?>" width="100" height="100">
                                        <input class="form-control" name="pimg"
                                            placeholder=" Enter Product Detail" type="file" id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Product
                                        Detail</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="<?php echo $data['pro_detail']; ?>"
                                            name="pdetail" placeholder=" Enter Product Detail" type="text"
                                            id="prodetail">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <input class="btn btn-primary" name="btnEdit" type="submit"
                                            >
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


            <?php 
         include('include/scripts.php');
        ?>
</body>

</html>