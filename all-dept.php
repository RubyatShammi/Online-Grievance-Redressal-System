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
                                                    <a class="nav-link fw-bold p-3 active" href="#">All Department Admin</a>
                                                </li>
                                            </ul>                    
                                            <div class="table-responsive">
                                                <?php		
                                                    if($role == 'GRC'){
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>											
                                                            <th>Phone</th>
                                                            <th>Department</th>
                                                            <th>Proctor</th>
                                                            <th>Action</th>
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM department ORDER BY id DESC");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){		
                                                            $department = $row->department;
                                                            $id = $row->id;

                                                            if($row->proctor){
                                                                $proctor_email = $row->proctor;
                                                                $proctor = $conn->prepare("SELECT * FROM proctors WHERE email = :email");
                                                                $proctor->execute(['email' => $proctor_email]); 
                                                                $rows = $proctor->fetch(PDO::FETCH_OBJ);
                                                                $first_name = $rows->first_name;
                                                                $last_name = $rows->last_name;
                                                                $full_name = $first_name ." ". $last_name;
                                                            }
                                                            else{
                                                                $full_name = "";
                                                            } 
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->first_name ."</td>"
                                                            ."<td>". $row->last_name ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->phone ."</td>"
                                                            ."<td>". $department ."</td>"
                                                            ."<td>". $full_name ."</td>"
                                                            ."<td>
                                                                <a href='edit-dept.php?id=". $id ."' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>											
                                                                <a data-id=". $id ." class='btn btn-sm btn-danger delete_staff'><i class='fas fa-window-close'></i></a>
                                                            </td>"; 									
                                                        }									
                                                        echo "</tbody></table>"; 
                                                    }
                                                    else if($role == 'Proctor'){
                                                        echo "<table id='datatable' class='table table-centered nowrap table-striped table-bordered'>																				
                                                        <thead>										
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>First Name</th>
                                                            <th>Last Name</th>
                                                            <th>Email</th>											
                                                            <th>Phone</th>
                                                            <th>Department</th>
                                                            <th>Proctor</th>
                                                            <th>Action</th>
                                                        </tr>									
                                                        </thead class='thead-light'><tbody>"; 
                                                        $members = $conn->query("SELECT * FROM department WHERE proctor = '$email' ORDER BY id DESC");
                                                        while ($row = $members->fetch(PDO::FETCH_OBJ)){		
                                                            $department = $row->department;
                                                            $id = $row->id;
    
                                                            if($row->proctor){
                                                                $proctor_email = $row->proctor;
                                                                $proctor = $conn->prepare("SELECT * FROM proctors WHERE email = :email");
                                                                $proctor->execute(['email' => $proctor_email]); 
                                                                $rows = $proctor->fetch(PDO::FETCH_OBJ);
                                                                $first_name = $rows->first_name;
                                                                $last_name = $rows->last_name;
                                                                $full_name = $first_name ." ". $last_name;
                                                            }
                                                            else{
                                                                $full_name = "";
                                                            } 
                                                            echo 
                                                            "<tr><td><strong>". $row->id ."</strong></td>"
                                                            ."<td>". $row->first_name ."</td>"
                                                            ."<td>". $row->last_name ."</td>"
                                                            ."<td>". $row->email ."</td>"
                                                            ."<td>". $row->phone ."</td>"
                                                            ."<td>". $row->department ."</td>"
                                                            ."<td>". $full_name ."</td>"
                                                            ."<td>
                                                                <a href='edit-dept.php?id=". $id ."' class='btn btn-sm btn-primary'><i class='fas fa-edit'></i></a>											
                                                                <a data-id=". $id ." class='btn btn-sm btn-danger delete_staff'><i class='fas fa-window-close'></i></a>
                                                            </td>"; 									
                                                        }									
                                                        echo "</tbody></table>"; 
                                                    }
                                                    else if($role == 'Dept'){

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

    <script>

        $(document).ready(function(){
            $('#datatable tbody').on('click', '.delete_staff', function () {
                _conf("Are you sure to delete this Staff ?","delete_staff",[$(this).attr('data-id')])
            });
        })	
        // Delete Modal Function
        function delete_staff($id){
            $.ajax({
                url:"process/action.php?action=delete_dept",
                method:'POST',
                data:{id:$id},
                success:function(resp){
                    if(resp==1){
                        // setTimeout(function(){
                        //     location.reload()
                        // },100)

                    }
                }
            })
        }	
    </script>