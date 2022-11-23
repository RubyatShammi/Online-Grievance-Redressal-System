<?php 
    require_once 'db.php'; 
    include 'process/new/register.php';

     //Get Settings Data
    $res_settings = mysqli_query($con,"SELECT * FROM settings");
    $setting_data= mysqli_fetch_array($res_settings); 
    $site_name =  $setting_data['site_name'];	
    $site_status =  $setting_data['site_status'];

    if($site_status == "Disabled"){
        unset($_SESSION["logged_in"]);
        header("Location: disabled.php");
    }
    
?>

<!doctype html>
<html lang="en">

<head>

    
    <meta charset="utf-8" />
    <title><?php echo $site_name ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />


</head>


<body class="authentication-bg bg-primary">
    <div class="home-center">
        <div class="home-desc-center">

            <div class="container">
               
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">
                            <div class="card-body">
                                <div class="px-2 py-3">


                                    <div class="text-center">
                                        <a href="#">
                                            <img src="assets/images/logo-dark.png" height="22" alt="logo">
                                        </a>

                                        <h5 class="text-primary mb-2 mt-4">Create a new account</h5>
                                    </div>                                  

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off">	  
                                    
                                        <div class="mb-3">
                                            <label><strong>First Name *</strong></label>
                                            <input name="first_name" type="text" class="form-control" placeholder="First Name">
                                            <small style="color:#7356f1"><?php echo $first_nameError; ?></small>
                                        </div>
                                        <div class="mb-3">
                                            <label><strong>Last Name *</strong></label>
                                            <input name="last_name" type="text" class="form-control" placeholder="Last Name">
                                            <small style="color:#7356f1"><?php echo $last_nameError; ?></small>
                                        </div>            
                                        <div class="mb-3">
                                            <label><strong>Email *</strong></label>
                                            <input name="email" type="email" class="form-control" placeholder="hello@example.com">
                                            <small style="color:#7356f1"><?php echo $emailError; ?></small>
                                        </div>    
                                        <div class="mb-3">
                                            <label><strong>Phone *</strong></label>
                                            <input name="phone" type="text" class="form-control" placeholder="Phone">
                                            <small style="color:#7356f1"><?php echo $phoneError; ?></small>
                                        </div>   
                                        <div class="mb-3">
                                            <label><strong>Student ID *</strong></label>
                                            <input name="student_id" type="text" class="form-control" placeholder="Student ID">
                                            <small style="color:#7356f1"><?php echo $student_idError; ?></small>
                                        </div>    
                                        <div class="mb-3">
                                            <label><strong>Password *</strong></label>
                                            <input placeholder="Enter Your Password" name="password" type="password" class="form-control" value="">
                                            <small style="color:#7356f1"><?php echo $passwordError; ?></small>
                                        </div>
                    
                                        <div class="mt-4">
                                            <button name="register" style="height:45px" type="submit" class="btn btn-primary w-100 waves-effect waves-light">Sign Up</button>
                                        </div>                
                                        
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Already have an account ? <a href="index.php" class="fw-bold text-white"> Login  Here</a> </p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
        <!-- End Log In page -->
    </div>

    <!-- JAVASCRIPT -->
    <script src="assets/libs/jquery/jquery.min.js"></script>
    <script src="assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="assets/libs/simplebar/simplebar.min.js"></script>
    <script src="assets/libs/node-waves/waves.min.js"></script>

    <script src="assets/js/app.js"></script>

</body>

</html>