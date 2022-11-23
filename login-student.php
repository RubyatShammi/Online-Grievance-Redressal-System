<?php
    ob_start();
    session_start();
    require_once 'db.php';

    $callback_text = "";
    
    $callback = "";
    if(isset($_GET['callback']) && $_GET['callback']!=''){
        $callback = $_GET['callback'];
        $callback = strip_tags($callback);
        $callback = htmlspecialchars($callback);  
        
        if($callback == "registration_success"){
            $callback_text = "<strong>Registration Successful !</strong> Please Log into your Account."
        ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
        <?php
        }
        else if($callback == "verification_success"){
             $callback_text = "Email Verification Success. Please Login";
         ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
         <?php
        }
        
        else if($callback == "registration_success_verified"){
             $callback_text = "Registration Success. Please Login";
         ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
         <?php
        }
        else if($callback == "no_session"){
             $callback_text = "Session Expired. Please Login Again!";
         ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
         <?php
        }
        else if($callback == "reset_success"){
             $callback_text = "Account Reset Success. Login Now";
         ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
         <?php
        }
        else{
            $callback_text = "Something Went Wrong !";
         ?>
            <style type="text/css">
                #alert_login{display:block !important;}
            </style>
            
         <?php
        }
    }
    else{
        // header("Location: login.php");
    }

    //Generate Random String 
    function generateRandomNumber($length = 6) {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    $username = "";
    $password = "";
    $error = false;
    $errorMSG = "";

    // it will never let you open index(login) page if session is set
    if ( isset($_SESSION['logged_in']) != "" ){
        header("Location: home.php");
        exit;
    }

    //Get Settings Data
    $res_settings = mysqli_query($con,"SELECT * FROM settings");
    $setting_data= mysqli_fetch_array($res_settings); 
    $site_name =  $setting_data['site_name'];	
    $site_status =  $setting_data['site_status'];

    if($site_status == "Disabled"){
        unset($_SESSION["logged_in"]);
        header("Location: disabled.php");
    }
 
    if( isset($_POST['login']) ) {    
        
        $student_id = htmlspecialchars(strip_tags(trim($_POST['student_id'])));
        $password = htmlspecialchars(strip_tags(trim($_POST['password'])));

        if (empty($student_id) || empty($password)) {
            $error = true;
            $errorMSG = "Incorrect Credentials";
        } 

        // Collect Data for Activity Report
        $activity_id = generateRandomNumber(10);
        $activity = "New Login";
        $details = "New Login. Student ID : ".$student_id;       

        if (!$error) {     

            $stmt = $conn->prepare("SELECT * FROM students WHERE student_id=? AND status='Active'");
            $stmt->execute([$student_id]);
    
            if ($stmt->rowCount() === 1) {
                $data = $stmt->fetch();
    
                $dbstudent_id = $data['student_id'];
                $dbpassword = $data['password'];
    
                if ($dbstudent_id === $student_id) {

                    if (password_verify($password, $dbpassword)) {                       

                        //Get Settings Data
                        $get_student_email = $conn->query("SELECT * FROM students WHERE student_id = '$student_id'");
                        $get_student_email->execute(); 
                        $row1 = $get_student_email->fetch(PDO::FETCH_OBJ);
                        $student_email = $row1->email;

                        $_SESSION['logged_in'] = $student_email;
                        $_SESSION['role'] = "Student";

                        header("Location: home.php");

                        // Update Login History 
                        $query = $conn->prepare("INSERT INTO report_activity (activity_id , email , activity , details , created_at) 
                        VALUES (:activity_id , :email , :activity , :details , :created_at)");
                        $data = [
                            "activity_id" =>$activity_id,
                            "email" =>$student_id,
                            "activity" =>$activity,
                            "details" =>$details,
                            "created_at" =>$date_time               
                        ];        
                        $query->execute($data);
    
                    }else {
                        $error = true;
                        $errorMSG = "Incorrect Credentials 1";
                    }
                }else {
                    $error = true;
                    $errorMSG = "Incorrect Credentials 2";
                }
            }else {
                $error = true;
                $errorMSG = "Incorrect Credentials 3";
            }
        }
        else{
            $errorMSG = "Incorrect Credentials 4";
        }
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

                                        <h5 class="text-primary mb-2 mt-4">Student Account Login</h5>
                                    </div>

                                    <div style="margin-top:30px" class="alert alert-success d-none solid" id="alert_login"><b><?php echo $callback_text  ?></b></div>

                                    <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" class="form-horizontal mt-4 pt-2">

                                        <div class="mb-3">
                                            <label for="student_id">Student ID</label>
                                            <input name="student_id" type="text" class="form-control" id="student_id"
                                                placeholder="Enter Student ID">
                                        </div>

                                        <div class="mb-3">
                                            <label for="userpassword">Password</label>
                                            <input name="password" type="password" class="form-control" id="userpassword"
                                                placeholder="Enter password">
                                        </div>

                                        <div class="mb-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input"
                                                    id="customControlInline">
                                                <label class="form-label"
                                                    for="customControlInline">Remember me</label>
                                            </div>
                                        </div>
                                        <small style="color:red;margin-bottom:20px;display:block;font-size:12px"><?php echo $errorMSG; ?></small>
                                        <div>
                                            <button name="login" class="btn btn-primary w-100 waves-effect waves-light"
                                                type="submit">Log In</button>
                                        </div>

                                        <div class="mt-4 text-center">
                                            <a href="index.php" class="text-muted"><i class="mdi mdi-lock me-1"></i> Go back to Homepage</a>
                                        </div>
    

                                    </form>

                                  
                                </div>
                            </div>
                        </div>

                        <div class="mt-5 text-center text-white">
                            <p>Don't have an account ?<a href="register.php" class="fw-bold text-white"> Register</a> </p>
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

    <!-- Prevent Form Resubmission  -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

</body>

</html>