<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>Lab Automation - Login </title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="ThemeDesign" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="assets/logo.png">

    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    <!--- Toaster CSS File  
    <link rel="stylesheet" href="temp/toastr.min.css" > -->

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

                                    <h4 class="text-muted text-center font-18"><b>Sign In</b></h4>

                                    <div class="p-2">
                                        <form class="form-horizontal m-t-20" method="POST"
                                            action="include/handlelogin.php">

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="email" name="mail" required=""
                                                        placeholder="Email">
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <input class="form-control" type="password" name="pass" required=""
                                                        placeholder="Password">
                                                </div>
                                            </div>

                

                                            <div class="form-group text-center row m-t-20">
                                                <div class="col-12">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light"
                                                        name="btn" type="submit">Log In</button>
                                                </div>
                                            </div>
                                            </div>
                                            <div class="form-group m-t-10 mb-0 row">
                                                <div class="col-12 m-t-20 text-center">
                                                    <a href="signup.php" class="text-muted">SignUp For New User?</a>
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

    <!-- Toaster JS File
    <script src="temp/jquery-3.5.1.min.js"></script>
    <script src="temp/toastr.min.js"></script> -->
   

</body>

</html>