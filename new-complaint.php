<?php
    include 'header.php';
    include 'process/new/new-complaint.php';
?>

<body data-sidebar="dark">

<style>
    input[type=file] {
        cursor: pointer;
        width: 180px;
        height: 34px;
        overflow: hidden;
    }
    input[type=file]:before {
        width: 158px;
        height: 32px;
        font-size: 16px;
        line-height: 32px;
        content: 'Select Image';
        display: inline-block;
        background: #f8f9fa;
        border: 1px solid #eaeaea;
        padding: 0 10px;
        text-align: center;
        font-family: Helvetica, Arial, sans-serif;
        color: #454545;
        border-radius: 30px !important;
    }
    input[type=file]::-webkit-file-upload-button {
        visibility: hidden;
    }
</style>

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
                                                <a class="nav-link fw-bold p-3 active" href="#">Add New Complaint</a>
                                            </li>
                                        </ul>                                              


                                        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                                            <div class="row">                                                
                                                <?php
                                                    if($role == 'Dept'){?>
                                                        <div class="col-md-6">
                                                            <div class="mb-3">
                                                                <label class="form-label">Student ID</label>
                                                                <input name="student_id" type="text" class="form-control" placeholder="Student ID">  
                                                                <small style="color:red"><?php echo $student_idError; ?></small>                                                          
                                                            </div>
                                                        </div>                                                          
                                                    <?php }
                                                ?>
                                                <div class="col-md-6">
                                                    <div class="mb-3">
                                                        <label class="form-label">Type</label>
                                                        <select name="type" class="form-control">
                                                            <option selected value="Complaint">Complaint</option>
                                                            <option value="Grivance">Grivance</option>    
                                                            <option value="Redrassal Idea">Redrassal Idea</option>    
                                                        </select>     
                                                        <small style="color:red"><?php echo $departmentError; ?></small>                                               
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
                                                        <small style="color:red"><?php echo $typeError; ?></small>                                                               
                                                    </div>
                                                </div>                                                                                  
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Title</label>
                                                        <input name="title" type="text" class="form-control" placeholder="Complaint Title">  
                                                        <small style="color:red"><?php echo $titleError; ?></small>                                                               
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3">
                                                        <label class="form-label">Complaint Details</label>
                                                        <textarea maxlength="1000" class="form-control" name="details" id="" cols="30" rows="10"></textarea>                                                        
                                                        <small style="color:red"><?php echo $detailsError; ?></small>                                                                 
                                                    </div>
                                                </div>    
                                                <div class="col-md-12">
                                                    <div class="mb-3 mt-3">
                                                        <label class="form-label">Document Files</label>
                                                        <img style="height:50px;width:50px;border-radius:100%;margin-right:20px" id="image_preview" src="assets/images/logo-sm.png" alt="Profile Image" />         
                                                        <input name="profile_image" accept="*" type='file' id="imgInp"/>                                                       
                                                        <small style="color:red"><?php echo $profile_imageError; ?></small>                                                                 
                                                    </div>
                                                </div>      
                                            </div>                                             
                                            
                                            <button name="new-complaint" class="btn btn-primary mt-2" type="submit">Add New Complaint</button>
                                            
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

    <script>

        // Image Show for Profile Image
        imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            image_preview.src = URL.createObjectURL(file)
        }}   

        // Prevent Form Resubmission
        if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
        }

    </script>