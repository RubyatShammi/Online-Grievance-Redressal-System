<?php
    include 'header.php';
    include 'process/profile.php';
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
                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-body  pt-0">
                                        <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold p-3 active" href="#">Update My Profile</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">First name</label>
                                                        <input value="<?php echo $first_name ?>" name="first_name" type="text" class="form-control" placeholder="First name">  
                                                        <small style="color:red"><?php echo $dbfirst_nameError; ?></small>                                                          
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Last name</label>
                                                        <input value="<?php echo $last_name ?>" name="last_name" type="text" class="form-control" placeholder="Last name">      
                                                        <small style="color:red"><?php echo $dblast_nameError; ?></small>                                                           
                                                    </div>
                                                </div>                                                    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input readonly value="<?php echo $email ?>" name="email" type="text" class="form-control" placeholder="Email Address">  
                                                        <small style="color:red"><?php echo $dbemailError; ?></small>                                                               
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input value="<?php echo $phone ?>" name="phone" type="text" class="form-control" placeholder="Phone Number">
                                                        <small style="color:red"><?php echo $dbphoneError; ?></small>                                                                 
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input value="<?php echo $address ?>" name="address" type="text" class="form-control" placeholder="Address"> 
                                                        <small style="color:red"><?php echo $dbaddressError; ?></small>                                                                
                                                    </div>
                                                </div>                                                                                                                                    
                                            </div>                                             
                                            
                                            <button name="update-profile" class="btn btn-primary mt-2" type="submit">Update Profile</button>
                                            
                                        </form>

                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body  pt-0">
                                        <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                            <li class="nav-item">
                                                <a class="nav-link fw-bold p-3 active" href="#">Profile Image</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="mb-3 mt-3">
                                                    <label class="form-label">Profile Picture</label>
                                                    <img style="height:50px;width:50px;border-radius:100%;margin-right:20px" id="image_preview" src="assets/images/profile/<?php echo $profile_image ?>" alt="Profile Image" />         
                                                    <input name="profile_image" accept="image/*" type='file' id="imgInp"/>                                                       
                                                    <small style="color:red"><?php echo $profile_imageError; ?></small>                                                                 
                                                </div>  
                                            </div>    
                                            <button name="update-profile-image" class="btn btn-primary mt-2" type="submit">Update Profile</button>                                            
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