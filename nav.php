<header id="page-topbar">
            <div class="navbar-header">
                <div class="d-flex">

                 <div class="navbar-brand-box">
                    <a href="home.php" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-dark.png" alt="" height="20">
                        </span>
                    </a>

                    <a href="home.php" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="assets/images/logo-sm.png" alt="" height="22">
                        </span>
                        <span class="logo-lg">
                            <img src="assets/images/logo-light.png" alt="" height="20">
                        </span>
                    </a>
                </div>

                    <button type="button" class="btn btn-sm px-3 font-size-24 header-item waves-effect" id="vertical-menu-btn">
                        <i class="mdi mdi-menu"></i>
                    </button>


                    <div class="topbar-social-icon me-3 d-none d-md-block">
                        <ul class="list-inline title-tooltip m-0">
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Email">
                                 <i class="mdi mdi-email-outline"></i>
                                </a>
                            </li>
                        
                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Chat">
                                 <i class="mdi mdi-tooltip-outline"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#" data-bs-toggle="tooltip" data-placement="top" title="Calendar">
                                 <i class="mdi mdi-calendar"></i>
                                </a>
                            </li>

                            <li class="list-inline-item">
                                <a href="#"  data-bs-toggle="tooltip" data-placement="top" title="Printer">
                                 <i class="mdi mdi-printer"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
            
                </div>

                <div class="d-flex">                

                    <div class="dropdown d-none d-lg-inline-block ms-1">
                        <button type="button" class="btn header-item noti-icon waves-effect" data-toggle="fullscreen">
                            <i class="mdi mdi-fullscreen"></i>
                        </button>
                    </div>                

                    <div class="dropdown d-inline-block">
                        <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php 
                                if($profile_image == ""){
                                    $profile_image = "default.png";
                                }
                            ?>
                            <img src="assets/images/profile/<?php echo $profile_image ?>" class="rounded-circle header-profile-user">
                            <span class="d-none d-xl-inline-block ms-1"><?php echo ucfirst($first_name) ?></span>
                            <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>

                        </button>
                        <div class="dropdown-menu dropdown-menu-end">
                            <!-- item-->
                            <a class="dropdown-item" href="profile.php"><i class="mdi mdi-account-circle-outline font-size-16 align-middle me-1"></i> Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="logout.php"><i class="mdi mdi-power font-size-16 align-middle me-1 text-danger"></i> Logout</a>
                        </div>
                    </div>

                
            
                </div>
            </div>
        </header>