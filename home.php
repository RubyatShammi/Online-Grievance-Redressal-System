<?php
    include 'header.php';
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

                <?php 
                    if($role == 'Dept'){
                        include 'includes/dashboard/dept.php'; 
                    }
                    else if($role == 'Proctor'){
                        include 'includes/dashboard/proctor.php'; 
                    }   
                    else if($role == 'GRC'){
                        include 'includes/dashboard/grc.php'; 
                    }               
                    else if($role == 'Student'){
                        include 'includes/dashboard/student.php'; 
                    }  
                
                ?>   

            </div>
            
                <?php include 'credit.php'; ?>
        </div>
    </div>

<?php include 'footer.php'; ?>