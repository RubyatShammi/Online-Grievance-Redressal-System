<?php
    include 'header.php';
    
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
                                                    <a class="nav-link fw-bold p-3 active" href="#">All Students</a>
                                                </li>
                                            </ul>
                                                


                                            <div class="table-responsive">


                                                <?php		
                                                    if($role == 'Dept'){
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Student ID</th>
                                                            <th>Email</th>											
                                                            <th>Phone</th>                                                        
                                                            <th>Action</th>
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM students WHERE department = '$dept_dept' ORDER BY id DESC");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){													
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->first_name ."</td>"
                                                            ."<td>". $row->last_name ."</td>"
                                                            ."<td>". $row->student_id ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->phone ."</td>"													
                                                            ."<td>
                                                                <a href='edit-student.php?id=". $row->id."' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>											
                                                                <a data-id=".$row->id." class='btn btn-sm btn-danger delete_student'><i class='fas fa-window-close'></i></a>
                                                            </td>"; 									
                                                        }						
                                                    }	
                                                    else{
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Student ID</th>
                                                            <th>Email</th>											
                                                            <th>Phone</th>                                                        
                                                            <th>Action</th>
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM students ORDER BY id DESC");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){													
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->first_name ."</td>"
                                                            ."<td>". $row->last_name ."</td>"
                                                            ."<td>". $row->student_id ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->phone ."</td>"													
                                                            ."<td>
                                                                <a href='edit-student.php?id=". $row->id."' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>											
                                                                <a data-id=".$row->id." class='btn btn-sm btn-danger delete_student'><i class='fas fa-window-close'></i></a>
                                                            </td>"; 									
                                                        }						
                                                    }								
                                                    			
                                                    echo "</tbody></table>"; 							
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

    <script>

        $(document).ready(function(){
            $('#datatable tbody').on('click', '.delete_student', function () {
                _conf("Are you sure to delete this Student ?","delete_student",[$(this).attr('data-id')])
            });
        })	
        // Delete Modal Function
        function delete_student($id){
            $.ajax({
                url:"process/action.php?action=delete_student",
                method:'POST',
                data:{id:$id},
                success:function(resp){
                    if(resp==1){
                        setTimeout(function(){
                            location.reload()
                        },100)

                    }
                }
            })
        }	
    </script>