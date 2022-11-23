<?php
    include 'header.php';
    include 'process/password.php';
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
                                                <a class="nav-link fw-bold p-3 active" href="#">Change Password</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Old Password</label>
                                                        <input name="old_password" type="text" class="form-control" placeholder="Old Password">     
                                                        <small style="color:#7356f1"><?php echo $old_passwordError; ?></small>                                                       
                                                    </div>
                                                </div>                              
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">New Password</label>
                                                        <input name="new_password" type="text" class="form-control" placeholder="New Password">   
                                                        <small style="color:#7356f1"><?php echo $new_passwordError; ?></small>                                                         
                                                    </div>
                                                </div>   
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Confirm Password</label>
                                                        <input name="confirm_password" type="text" class="form-control" placeholder="Confirm Password"> 
                                                        <small style="color:#7356f1"><?php echo $confirm_passwordError; ?></small>                                                           
                                                    </div>
                                                </div>                   
                                            </div>                                             
                                            
                                            <button name="update-password" class="btn btn-primary mt-2" type="submit">Update Password</button>
                                            
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

    <!-- Required datatable js -->
    <script src="assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
    
    <!-- Responsive examples -->
    <script src="assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js"></script>

    <script src="assets/js/pages/datatables.init.js"></script>

    <script src="assets/js/app.js"></script>  
