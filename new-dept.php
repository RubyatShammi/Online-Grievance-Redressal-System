<?php
    include 'header.php';
    include 'process/new/new-dept.php';

    if($role == 'Student'){
        header("location: home.php");
    }
    
?>

<body data-sidebar="dark">

<div id="layout-wrapper">

        <?php include 'nav.php'; ?>

        <div class="vertical-menu">
            <div data-simplebar class="h-100">

            <?php include 'sidebar.php'; ?>     

            </div>
        </div>
        <div class="main-content">
            <div class="page-content" style="margin-top:115px">

                
                <div class="container-fluid">
                    <div class="page-content-wrapper">          
                        
                    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body  pt-0">
                                        <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold p-3 active" href="#">Add New Department</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">First name</label>
                                                        <input name="first_name" type="text" class="form-control" placeholder="First name">  
                                                        <small style="color:red"><?php echo $bbfirst_nameError; ?></small>                                                          
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Last name</label>
                                                        <input name="last_name" type="text" class="form-control" placeholder="Last name">      
                                                        <small style="color:red"><?php echo $bblast_nameError; ?></small>                                                           
                                                    </div>
                                                </div>                                                    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input name="email" type="text" class="form-control" placeholder="Email Address">  
                                                        <small style="color:red"><?php echo $bbemailError; ?></small>                                                               
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input name="phone" type="text" class="form-control" placeholder="Phone Number">
                                                        <small style="color:red"><?php echo $bbphoneError; ?></small>                                                                 
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input name="address" type="text" class="form-control" placeholder="Address"> 
                                                        <small style="color:red"><?php echo $bbaddressError; ?></small>                                                                
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Password</label>
                                                        <input name="password" type="text" class="form-control" placeholder="Password">  
                                                        <small style="color:red"><?php echo $bbpasswordError; ?></small>                                                               
                                                    </div>
                                                </div>         
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Proctor</label>
                                                        <select name="proctor" id="inputState" class="form-control" tabindex="-98">
                                                            <?php
                                                                $query = "SELECT * FROM proctors";
                                                                $result = mysqli_query($con,$query);
                                                                while($row = mysqli_fetch_array($result)){ 		
                                                                    echo "<option value='".$row['email']."'>".$row['first_name']." ".$row['last_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>                                                        
                                                        <small style="color:red"><?php echo $bbproctorError; ?></small>                                                               
                                                    </div>
                                                </div>         
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Select Department</label>
                                                        <select name="department" id="inputState" class="form-control" tabindex="-98">
                                                            <?php
                                                                $query = "SELECT * FROM departments";
                                                                $result = mysqli_query($con,$query);
                                                                while($row = mysqli_fetch_array($result)){ 		
                                                                    echo "<option value='".$row['department_name']."'>".$row['department_name']."</option>";
                                                                }
                                                            ?>
                                                        </select>                                                        
                                                        <small style="color:red"><?php echo $bbdepartmentError; ?></small>                                                               
                                                    </div>
                                                </div>                                  
                                                <div class="col-md-12">
                                                    <div class="mb-3 mt-3">
                                                        <label class="form-label">Profile Picture</label>
                                                        <img style="height:50px;width:50px;border-radius:100%;margin-right:20px" id="image_preview" src="assets/images/logo-sm.png" alt="Profile Image" />         
                                                        <input name="profile_image" accept="image/*" type='file' id="imgInp"/>                                                       
                                                        <small style="color:red"><?php echo $profile_imageError; ?></small>                                                                 
                                                    </div>
                                                </div>      
                                            </div>                                             
                                            
                                            <button name="new-staff" class="btn btn-primary mt-2" type="submit">Add New Dept Admin</button>
                                            
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>        

            <?php include 'credit.php'; ?>
            
        </div>
    </div>
<?php include 'footer.php'; ?>

    <!-- Prevent Form Resubmission  -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
    </script>

