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

                
            <div class="container-fluid">
                        <div class="page-content-wrapper">          
                            
                        
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body  pt-0">
                                            <ul class="nav nav-tabs nav-tabs-custom mb-4">
                                                <li class="nav-item">
                                                    <a class="nav-link fw-bold p-3 active" href="#">Activity Report</a>
                                                </li>
                                            </ul>
                                                


                                            <div class="table-responsive">


                                                <?php					
                                                    if($role == 'Proctor' || $role == 'GRC'){
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Activity ID</th>
                                                            <th>Email/Student ID</th>
                                                            <th>Activity</th>	
                                                            <th>Date & Time</th>												
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM report_activity");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){													
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->activity_id ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->details ."</td>"
                                                            ."<td><pre>". $row->created_at ."</pre></td>"; 									
                                                        }									
                                                        echo "</tbody></table>"; 				
                                                    }	
                                                    else if($role == 'Student'){
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>Activity ID</th>
                                                            <th>Email</th>
                                                            <th>Activity</th>	
                                                            <th>Date & Time</th>												
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM report_activity WHERE email = '$student_id'");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){													
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->activity_id ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->details ."</td>"
                                                            ."<td><pre>". $row->created_at ."</pre></td>"; 									
                                                        }									
                                                        echo "</tbody></table>"; 				
                                                    }					
                                                    			
                                                ?>	

                                        

                                            </div>
                                        </div>
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
