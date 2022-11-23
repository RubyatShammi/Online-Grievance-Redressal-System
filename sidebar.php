<?php

    if($role == 'Dept'){
        include 'includes/sidebar/dept.php'; 
    }
    else if($role == 'Proctor'){
        include 'includes/sidebar/proctor.php'; 
    }   
    else if($role == 'GRC'){
        include 'includes/sidebar/grc.php'; 
    }               
    else if($role == 'Student'){
        include 'includes/sidebar/student.php'; 
    }  


?>