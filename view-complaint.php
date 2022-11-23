<?php
    include 'header.php';
    include 'process/complaint-details.php';

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
                                                    <a class="nav-link fw-bold p-3 active" href="#">Complaint Details #<?php echo $complaint_id ?></a>
                                                </li>
                                            </ul>        
                                            <div class="complaint_details">
                                                    <h3 style="margin-bottom:20px"><?php echo $title ?></h3>
                                                    <p><?php echo $descriptions ?></p>  
                                                    <p><?php echo $created_at ?></p> 
                                            </div>
                                            <div class="uploaded_files">
                                            <p><b>Attachment File :</b></p> 
                                                    <?php 
                                                        $file_dw = "assets/images/uploads/$upload_file"; 
                                                        // echo $upload_file;
                                                    ?>
                                                    <img style="width:200px" src="assets/images/uploads/<?php echo $upload_file ?>" alt="">
                                                    <?php if(!empty($upload_file)){
                                                        echo "<a id='someID' style='margin-left:25px' name='update-complaint' class='btn-sm btn-primary mt-2' type='submit'>Download Attachment</a>";
                                                    }?>
                                            </div>
                                        </div>
                                    </div>


                                    <?php
                                        $members = $conn->query("SELECT * FROM complaint_lists WHERE complaint_id ='$id'");
                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){	
                                            $reply_email =  $row->email;
                                            $reply_role = $row->role;     
                                            $reply_email = $row->email;
                                            if($reply_role == 'GRC'){
                                                $get_user_info = mysqli_query($con,"SELECT * FROM grc WHERE email='$reply_email'");
                                                $data = mysqli_fetch_assoc($get_user_info);
                                                $dbfirst_name= $data['first_name'];
                                                $dblast_name= $data['last_name'];
                                                $dbimage = $data['profile_image'];
                                                $reply_full_name = "$dbfirst_name $dblast_name";
                                                echo 
                                                "
                                                <div class='card'>
                                                    <div class='card-body  pt-0'>                                              
                                                        <div class='complaint_details mt-4'>
                                                                <div class='user_reply mb-3' style='display:block;overflow:hidden'><img style='height:50px !important;width:50px !important' src='assets/images/profile/$dbimage' class='rounded-circle header-profile-user' style='float:left'><p style='width:200px'>$reply_full_name</p></div>
                                                                <p>$row->reply</p>   
                                                                <p>$row->created_at</p> 
                                                        </div>                                            
                                                    </div>
                                                </div>
                                            "; 
                                            }
                                            else if($reply_role == 'Proctor'){
                                                $get_user_info = mysqli_query($con,"SELECT * FROM proctors WHERE email='$reply_email'");
                                                $data = mysqli_fetch_assoc($get_user_info);
                                                $dbfirst_name= $data['first_name'];
                                                $dblast_name= $data['last_name'];
                                                $dbimage = $data['profile_image'];
                                                $reply_full_name = "$dbfirst_name $dblast_name";
                                                echo 
                                                "
                                                <div class='card'>
                                                    <div class='card-body  pt-0'>                                              
                                                        <div class='complaint_details mt-4'>
                                                                <div class='user_reply mb-3' style='display:block;overflow:hidden'><img style='height:50px !important;width:50px !important' src='assets/images/profile/$dbimage' class='rounded-circle header-profile-user' style='float:left'><p style='width:200px'>$reply_full_name</p></div>
                                                                <p>$row->reply</p>   
                                                                <p>$row->created_at</p> 
                                                        </div>                                            
                                                    </div>
                                                </div>
                                            "; 
                                            }                 
                                            else if($reply_role == 'Dept'){
                                                $get_user_info = mysqli_query($con,"SELECT * FROM department WHERE email='$reply_email'");
                                                $data = mysqli_fetch_assoc($get_user_info);
                                                $dbfirst_name= $data['first_name'];
                                                $dblast_name= $data['last_name'];
                                                $dbimage = $data['profile_image'];
                                                $reply_full_name = "$dbfirst_name $dblast_name";
                                                echo 
                                                "
                                                <div class='card'>
                                                    <div class='card-body  pt-0'>                                              
                                                        <div class='complaint_details mt-4'>
                                                                <div class='user_reply mb-3' style='display:block;overflow:hidden'><img style='height:50px !important;width:50px !important' src='assets/images/profile/$dbimage' class='rounded-circle header-profile-user' style='float:left'><p style='width:200px'>$reply_full_name</p></div>
                                                                <p>$row->reply</p>   
                                                                <p>$row->created_at</p> 
                                                        </div>                                            
                                                    </div>
                                                </div>
                                            "; 
                                            }        
                                            else if($reply_role == 'Student'){
                                                $get_user_info = mysqli_query($con,"SELECT * FROM students WHERE email='$reply_email'");
                                                $data = mysqli_fetch_assoc($get_user_info);
                                                $dbfirst_name= $data['first_name'];
                                                $dblast_name= $data['last_name'];
                                                $dbimage = $data['profile_image'];
                                                $reply_full_name = "$dbfirst_name $dblast_name";
                                                echo 
                                                "
                                                <div class='card'>
                                                    <div class='card-body  pt-0'>                                              
                                                        <div class='complaint_details mt-4'>
                                                                <div class='user_reply mb-3' style='display:block;overflow:hidden'><img style='height:50px !important;width:50px !important' src='assets/images/profile/$dbimage' class='rounded-circle header-profile-user' style='float:left'><p style='width:200px'>$reply_full_name</p></div>
                                                                <p>$row->reply</p>   
                                                                <p>$row->created_at</p> 
                                                        </div>                                            
                                                    </div>
                                                </div>
                                            "; 
                                            }     
                                                     
                                                                     
                                           				
                                        }						
                                    ?>
                                    




                                    <div class="card">
                                        <div class="card-body  pt-0">
                                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold p-3 active" href="#">Reply</a>
                                                </li>
                                            </ul>                                                

                                            <div class="complaint_box">
                                                <form method="post" action="">
                                                    <textarea name="reply_text" style="width:100%" name="" id="" cols="30" rows="10"></textarea>
                                                    <button name="reply-complaint" class="btn btn-primary mt-2" type="submit">Reply Complaint</button> 
                                                    <small style="color:red"><?php echo $reply_textError; ?></small>                       
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <?php
                                        if($role == 'Dept' || $role == 'GRC' || $role == 'Proctor'){ ?>
                                            <div class="card">
                                                <div class="card-body  pt-0">
                                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                                        <li class="nav-item">
                                                            <a class="nav-link fw-bold p-3 active" href="#">Student Details</a>
                                                        </li>
                                                    </ul>                                                

                                                    <div class="complaint_details">
                                                        <img style="width:180px;margin-bottom:20px;border:1px solid #000" src="assets/images/profile/<?php echo $profile_image_student ?>" alt="">
                                                        <h6>First Name : <?php echo $first_name_student ?></h6>
                                                        <h6>Last Name : <?php echo $last_name_student ?></h6>
                                                        <h6>Email : <?php echo $email_student ?></h6>
                                                        <h6>Phone : <?php echo $phone_student ?></h6>   
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body  pt-0">
                                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                                        <li class="nav-item">
                                                            <a class="nav-link fw-bold p-3 active" href="#">Update Status</a>
                                                        </li>
                                                        <div style="margin-top:15px" class="update_data_status">
                                                            <?php echo $status_comp ?>
                                                        </div>
                                                    </ul>             
                                                    
                                                    <form method="post" action="" enctype="multipart/form-data">
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Transfer To</label>
                                                                <select name="transfer_to" class="form-control">
                                                                    <option <?php if(isset($author) && $author == "Dept"): echo "selected"; endif; ?> value="Dept">Dept</option>
                                                                    <option <?php if(isset($author) && $author == "Proctor"): echo "selected"; endif; ?> value="Proctor">Proctor</option>
                                                                    <option <?php if(isset($author) && $author == "GRC"): echo "selected"; endif; ?> value="GRC">GRC</option>
                                                                </select>     
                                                                <small style="color:red"><?php echo $transfer_toError; ?></small>                                                               
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-3">
                                                                <label class="form-label">Status</label>
                                                                <select name="status" class="form-control">
                                                                    <option <?php if(isset($status_comp) && $status_comp == "Processing"): echo "selected"; endif; ?> value="Processing">Processing</option>
                                                                    <option <?php if(isset($status_comp) && $status_comp == "Pending"): echo "selected"; endif; ?> value="Pending">Pending</option>
                                                                    <option <?php if(isset($status_comp) && $status_comp == "Closed"): echo "selected"; endif; ?> value="Closed">Closed</option>
                                                                </select>     
                                                                <small style="color:red"><?php echo $statusError; ?></small>                                               
                                                            </div>
                                                        </div>
                                                        <button name="update-complaint" class="btn btn-primary mt-2" type="submit">Update Complaint</button>
                                                    </form>


                                                </div>
                                            </div>
                                        <?php }
                                        else if($role == 'Student'){ ?>

                                            <div class="card">
                                                <div class="card-body  pt-0">
                                                    <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                                        <li class="nav-item">
                                                            <a class="nav-link fw-bold p-3 active" href="#">Status Information</a>
                                                        </li>
                                                    </ul>             
                                                    
                                                    
                                                    <div class="complaint_details">
                                                        <h6>Status : <?php echo $status_comp ?></h6>
                                                    </div>



                                                </div>
                                            </div>

                                        <?php }
                                    ?>
                                    
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

    <!-- Prevent Form Resubmission  -->
    <script>
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }
        $('#someID').attr({target: '_blank', 
        href  : '<?php echo $file_dw ?>'});
    </script>