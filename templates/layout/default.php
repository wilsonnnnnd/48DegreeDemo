<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 * @var \App\View\AppView $this
 */

$cakeDescription = 'CakePHP: the rapid development php framework';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>48 Degrees Back-end</title>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('vendor/fontawesome-free/css/all.min.css')?>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

    <!-- Custom styles for this template-->
    <?= $this->Html->css('css/sb-admin-2.min.css')?>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <link href="https://fonts.googleapis.com/css?family=Raleway:400,700" rel="stylesheet">



    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>

    <?= $this->Html->script('/js/vendor/jquery/jquery.min.js') ?>

</head>
<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <?php
        switch (($this->request->getSession()->read('Auth.User.role'))){
            case ('Staff'):
                echo $this->Html->link(' <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hard-hat"></i>
            </div> <div class="sidebar-brand-text mx-3">48 Degrees Staff Management<sup></sup></div>', ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'sidebar-brand d-flex align-items-center justify-content-center', 'escape' => false]);
                break;
            case ('Inspector'):
                echo $this->Html->link(' <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hard-hat"></i>
            </div> <div class="sidebar-brand-text mx-3">48 Degrees Inspector Management<sup></sup></div>', ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'sidebar-brand d-flex align-items-center justify-content-center', 'escape' => false]);
                break;
            case ('Client'):
                echo $this->Html->link(' <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hard-hat"></i>
                </div> <div class="sidebar-brand-text mx-3">48 Degrees Client Management<sup></sup></div>', ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'sidebar-brand d-flex align-items-center justify-content-center', 'escape' => false]);
                break;
            case ('Subcontractor'):
                echo $this->Html->link(' <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-hard-hat"></i>
                </div> <div class="sidebar-brand-text mx-3">48 Degrees Subcontractors Management<sup></sup></div>', ['controller' => 'users', 'action' => 'dashboard'], ['class' => 'sidebar-brand d-flex align-items-center justify-content-center', 'escape' => false]);
                break;
            default:
                break;
        }
        ?>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <?php echo $this->Html->link(' <i class="fas fa-fw fa-home"></i>
             <span>Front Home Page</span></a>', ['controller'=>'pages','action'=>'home'],['class'=>'nav-link','escape'=>false]);
            ?>
            <?php echo $this->Html->link(' <i class="fas fa-fw fa-tachometer-alt"></i>
             <span>Management Dashboard</span></a>', ['controller'=>'users','action'=>'dashboard'],['class'=>'nav-link','escape'=>false]);
            ?>
        </li>



        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <li class="sidebar-heading nav-item nav-category">

            Interface
        </li>

            <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <?php
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
                echo '<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                   aria-expanded="true" aria-controls="collapseTwo">';
                echo '<i class="fas fa-user"></i>';

                echo '<span>User Management</span>';

                echo '</a>';
            }
            ?>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <?php
                    if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
                        echo $this->Html->link('View Users', ['controller'=>'users','action'=>'index'],['class'=>'collapse-item']);
                        echo "<h6 class='collapse-header'>Roles:</h6>";
                        echo $this->Html->link('Inspectors', ['controller'=>'Inspectors','action'=>'index'],['class'=>'collapse-item']);
                        echo $this->Html->link('Subcontractors', ['controller'=>'Subcontractors','action'=>'index'],['class'=>'collapse-item']);
                        echo $this->Html->link('Clients', ['controller'=>'ServiceClients','action'=>'index'],['class'=>'collapse-item']);
                    }
                    ?>

                    <!-- <a class="collapse-item" href="cards.html">Cards</a>-->

                </div>
            </div>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->



        <li class="nav-item">
            <?php
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff'){
                echo $this->Html->link('<i class="fas fa-laptop-house"></i><span>Property Management</span>', ['controller'=>'Properties','action'=>'index'],['class'=>'nav-link collapsed','escape'=>false]);
            } ?>

        </li>

        <!-- Nav Item - Utilities Collapse Menu -->

        <li class="nav-item">
            <?php
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff'||$this->request->getSession()->read('Auth.User.role') == 'Inspector'){
                echo $this->Html->link('<i class="fas fa-file"></i><span>&nbsp;Inspector Reports</span>', ['controller'=>'Reports','action'=>'index'],['class'=>'nav-link collapsed','escape'=>false]);
            }?>
        </li>

        <!-- Nav Item - Utilities Collapse Menu -->

        <li class="nav-item">
            <?php
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff' ||$this->request->getSession()->read('Auth.User.role') == 'Inspector'||$this->request->getSession()->read('Auth.User.role') == 'Client'){
                echo $this->Html->link('<i class="fas fa-pencil-ruler"></i><span>&nbsp;Inspector Jobs</span>', ['controller'=>'Jobs','action'=>'index'],['class'=>'nav-link collapsed','escape'=>false]);
            }?>
        </li>


        <!-- Nav Item - Utilities Collapse Menu -->

        <li class="nav-item">
            <?php
            if ($this->request->getSession()->read('Auth.User.role') == 'Staff' ||$this->request->getSession()->read('Auth.User.role') == 'Subcontractor') {
                echo $this->Html->link('<i class="fas fa-tools"></i><span>&nbsp;Subcontractor Project</span>', ['controller' => 'Projects', 'action' => 'index'], ['class' => 'nav-link collapsed', 'escape' => false]);
            }?>
        </li>

         <!-- Nav Item - Utilities Collapse Menu for Enquiries -->
         <!-- <li class="nav-item">
        //     <?php
        //     if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
        //         echo $this->Html->link('<i class="fas fa-fw fa-calendar-check"></i><span>Enquiries Management</span>', ['controller' => 'Enquiries', 'action' => 'index'], ['class'=>'nav-link collapsed','escape'=>false]);
        //     } ?>
        // </li> -->






        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- Topbar Welcome -->
                <ul class="navbar-nav ml-auto" >
                    <li class="nav-item font-weight-semibold d-none d-lg-block"><b>Welcome, <?php echo $this->request->getSession()->read('Auth.User.email'); ?>.&#160</b></li>
                    <?php
                    switch (($this->request->getSession()->read('Auth.User.role'))) {
                        case ('Staff'):
                            echo '<b>' . "You are logged in as (Staff)." . '</b>';
                            break;
                        case ('Inspector'):
                            echo '<b>' ." You are logged in as an (Inspector)." . '</b>';
                            break;
                        case ('Client'):
                            echo '<b>' . " You are logged in as a (Client)." . '</b>';
                            break;
                        case ('Subcontractor'):
                            echo '<b>' . " You are logged in as a (Subcontractor)." . '</b><';
                            break;
                        default:
                            break;
                    } ?>
                </ul>



                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none" >
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>


                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow ">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->request->getSession()->read('Auth.User.email');?></span>
                            <?=$this->Html->image("undraw_profile.svg",["class"=>"img-profile rounded-circle"])?>

                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <?= $this->Html->link('  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile',['controller'=>'users','action'=>'view',$this->request->getSession()->read('Auth.User.id')],['class'=>'dropdown-item','escape'=>false]); ?>
                            <div class="dropdown-divider"></div>
                            <?= $this->Html->link('  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                           Logout',['controller'=>'users','action'=>'logout'],['class'=>'dropdown-item','escape'=>false]); ?>

                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <div class="container-fluid">
                <?= $this->Flash->render() //error message ?>
                <?= $this->fetch('content') ?>
            </div>

        </div>


        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    &copy; Copyright <strong><span>48 Degrees</span></strong>. All Rights Reserved
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

        <!-- Bootstrap core JavaScript-->
        <?php echo $this->Html->script("vendor/jquery/jquery.min.js");?>
        <?php echo $this->Html->script("vendor/bootstrap/js/bootstrap.bundle.min.js");?>

        <!-- Core plugin JavaScript-->
        <?php echo $this->Html->script("vendor/jquery-easing/jquery.easing.min.js");?>

        <!-- Custom scripts for all pages-->
        <?php echo $this->Html->script("js/sb-admin-2.min.js");?>

        <!-- Page level plugins -->
        <?php echo $this->Html->script("vendor/chart.js/Chart.min.js");?>

        <!-- Page level custom scripts -->
        <?php echo $this->Html->script("js/demo/chart-area-demo.js");?>
        <?php echo $this->Html->script("js/demo/chart-pie-demo.js");?>


        <?= $this->fetch('script') ?>
</body>
</html>
