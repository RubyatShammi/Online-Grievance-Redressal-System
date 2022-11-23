<?php
    include 'header.php';
    include 'process/edit/edit-proctor.php';

    if($role == 'Student'){
        header("location: home.php");
    }

    $id = "";
    if(isset($_GET['id']) && $_GET['id']!=''){
        $id = $_GET['id'];
        $id = strip_tags($id);
        $id = htmlspecialchars($id);

        $get_user_info = mysqli_query($con,"SELECT * FROM proctors WHERE id='$id'");
        $data = mysqli_fetch_assoc($get_user_info);

        $dbfirst_name= $data['first_name'];
        $dblast_name= $data['last_name'];
        $dbemail= $data['email'];
        $dbphone = $data['phone'];
        $dbrole = $data['role'];
        $dbaddress= $data['address'];
    }
    else{
        header("Location: all-staff.php");
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
                                                <a class="nav-link fw-bold p-3 active" href="#">Edit Staff Member</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">First name</label>
                                                        <input value="<?php echo $dbfirst_name ?>" name="first_name" type="text" class="form-control" placeholder="First name">  
                                                        <small style="color:red"><?php echo $first_nameError; ?></small>                                                          
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Last name</label>
                                                        <input value="<?php echo $dblast_name ?>" name="last_name" type="text" class="form-control" placeholder="Last name">      
                                                        <small style="color:red"><?php echo $last_nameError; ?></small>                                                           
                                                    </div>
                                                </div>                                                    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Email</label>
                                                        <input value="<?php echo $dbemail ?>" name="email" type="text" class="form-control" placeholder="Email Address">  
                                                        <small style="color:red"><?php echo $emailError; ?></small>                                                               
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Phone</label>
                                                        <input value="<?php echo $dbphone ?>" name="phone" type="text" class="form-control" placeholder="Phone Number">
                                                        <small style="color:red"><?php echo $phoneError; ?></small>                                                                 
                                                    </div>
                                                </div>    
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Address</label>
                                                        <input value="<?php echo $dbaddress ?>" name="address" type="text" class="form-control" placeholder="Address"> 
                                                        <small style="color:red"><?php echo $addressError; ?></small>                                                                
                                                    </div>
                                                </div>                                                                                    
                                            </div>                                             
                                            
                                            <button name="edit-staff" class="btn btn-primary mt-2" type="submit">Update Proctor</button>
                                            
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

