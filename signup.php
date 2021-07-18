<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Lab Automation - SignUp</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/logo.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">

</head>


<body class="pb-0">

    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner"></div>
        </div>
    </div>

    <!-- Begin page -->
    <div class="accountbg">

        <div class="content-center">
            <div class="content-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8">
                            <div class="card">
                                <div class="card-body">

                                <h3 class="text-center mt-0 m-b-15">
                                            <a href="index.php" class="logo logo-admin"><img src="assets/logo.png" height="100" width="200" alt="logo"></a>
                                        </h3>

                                    <h4 class="text-muted text-center font-18"><b>Register</b></h4>

                                    <div class="p-3">

                                        <form class="form-horizontal m-t-20" method="POST" action="partial/handlesignup.php">

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="mail" type="email" required=""
                                                        placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="username" type="text" required=""
                                                        placeholder="Username">
                                                </div>
                                            </div>

                                            <!-- <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="phone" type="number" required=""
                                                        placeholder="Phone No.">
                                                </div>
                                            </div>

                                           <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="image" type="file" required=""
                                                        placeholder="Image">
                                                </div>
                                            </div>-->

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="pass" type="password" required=""
                                                        placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" name="cpass" type="password" required=""
                                                        placeholder="Confirm Password">
                                                </div>
                                            </div>


                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light"
                                                        type="submit" name="btn">Register</button>
                                                </div>
                                            </div>

                                            <div class="form-group m-t-10 mb-0 row">
                                                <div class="col-12 m-t-20 text-center">
                                                    <a href="index.php" class="text-muted">Already have
                                                        account?</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
        </div>
    </div>


    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/modernizr.min.js"></script>
    <script src="assets/js/detect.js"></script>
    <script src="assets/js/fastclick.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/jquery.blockUI.js"></script>
    <script src="assets/js/waves.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>

</body>

</html>