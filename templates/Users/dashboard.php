<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Star Admin Premium Bootstrap Admin Dashboard Template</title>
    <!-- plugins:css -->
    <?= $this->Html->meta('/vendors/iconfonts/mdi/css/materialdesignicons.min.css') ?>
    <?= $this->Html->meta('/vendors/iconfonts/ionicons/dist/css/ionicons.css') ?>
    <?= $this->Html->meta('/vendors/iconfonts/flag-icon-css/css/flag-icon.min.css') ?>

    <!-- endinject -->
    <!-- plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="../../assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="../../assets/css/demo_1/style.css">
    <!-- End Layout styles -->
    <link rel="shortcut icon" href="../../assets/images/favicon.ico"/>
</head>
<body>
<h3><?= __('Management Dashboard') ?></h3>


<?php
if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
    ?>
    <div class="row">
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <td><?= $this->Html->link(__('Client'), ['action' => 'Index', 'controller' => 'ServiceClients']) ?></td>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                <td><?= $this->Html->link(__('Report'), ['action' => 'Index', 'controller' => 'Reports']) ?></td>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                                <!--                            --><?php //echo $this->h($this->_number, ['controller'=>'Users']);?>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-flag fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                <td><?= $this->Html->link(__('Properties'), ['action' => 'Index', 'controller' => 'Properties']) ?></td>
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">

                                    </div>
                                </div>
                                <!--                            <div class="col">-->
                                <!--                                <div class="progress progress-sm mr-2">-->
                                <!--                                    <div class="progress-bar bg-info" role="progressbar"-->
                                <!--                                         style="width: 50%" aria-valuenow="50" aria-valuemin="0"-->
                                <!--                                         aria-valuemax="100"></div>-->
                                <!--                                </div>-->
                                <!--                            </div>-->
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-building fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                <td><?= $this->Html->link(__('Pending Jobs'), ['action' => 'Index', 'controller' => 'Jobs']) ?></td>
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php } ?>


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Inspector')) {
                            ?>
                            <h3 class="card-description" ><?= __('  Upcoming Job Deadlines (within 7 Days)') ?></h3>
                            <table class="table" id="jobs-table" style="text-align: center">
                                <thead>
                                <tr>
                                    <th><?= h('Expected Date') ?></th>
                                    <th><?= h('Property') ?></th>
                                    <th><?= h('Inspector') ?></th>
                                    <th><?= h('Description') ?></th>
                                    <th><?= h('Status') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($jobduedate as $job): ?>
                                    <tr>
                                        <td><?= ($job->expected_completion_date->i18nFormat('dd-MM-yyyy')) ?></td>
                                        <td><?= $job->has('property') ? $this->Html->link($job->property->full_addr, ['controller' => 'Properties', 'action' => 'view', $job->property->id]) : '' ?></td>
                                        <td><?= $job->has('inspector') ? $this->Html->link($job->inspector->full_name, ['controller' => 'Inspectors', 'action' => 'view', $job->inspector->id]) : '' ?></td>
                                        <td><?= $this->Html->link(__('View'), ['action' => 'view', 'controller' => 'Jobs', $job->id]) ?></td>
                                        <td>
                                            <?php
                                            if ($job->status == 0) {
                                                echo '<label class="badge badge-danger">' . "Pending" . '</label>';
                                            } else if ($job->status == 1) {
                                                echo '<label class="badge badge-warning">' . "Ongoing" . '</label>';
                                            } else if ($job->status == 2) {
                                                echo '<label class="badge badge-success">' . "Complete" . '</label>';
                                            } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>
                    </div>
                </div>
            </div>


            <div class="col-lg-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <?php
                        if (($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Subcontractor')) {
                            ?>
                            <h3 class="card-description" ><?= __('Upcoming Project Deadlines (within 7 Days)') ?></h3>
                            <table class="table" id="projects-table" style="text-align: center">
                                <thead>
                                <tr>
                                    <th><?= h('Expected Date') ?></th>
                                    <th><?= h('Property') ?></th>
                                    <th><?= h('Subcontractor') ?></th>
                                    <th><?= h('Description') ?></th>
                                    <th><?= h('Status') ?></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($projectduedate as $project): ?>
                                    <tr>
                                        <td><?= ($project->expected_completion_date->i18nFormat('dd-MM-yyyy')) ?></td>

                                        <td><?= $project->has('property') ? $this->Html->link($project->property->full_addr, ['controller' => 'Properties', 'action' => 'view', $project->property->id]) : '' ?></td>
                                        <td><?= $project->has('subcontractor') ? $this->Html->link($project->subcontractor->full_name, ['controller' => 'Inspectors', 'action' => 'view', $project->subcontractor->id]) : '' ?></td>
                                        <td><?= $this->Html->link(__('View'), ['action' => 'view    ', 'controller' => 'Projects', $project->id]) ?></td>
                                        <td>
                                            <?php
                                            if ($job->status == 0) {
                                                echo '<label class="badge badge-danger">' . "Pending" . '</label>';
                                            } else if ($job->status == 1) {
                                                echo '<label class="badge badge-warning">' . "Ongoing" . '</label>';
                                            } else if ($job->status == 2) {
                                                echo '<label class="badge badge-success">' . "Complete" . '</label>';
                                            } ?>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php }
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- main-panel ends -->
    </div>
</div>


<!-- container-scroller -->
<!-- plugins:js -->
<script src="../../assets/vendors/js/vendor.bundle.base.js"></script>
<script src="../../assets/vendors/js/vendor.bundle.addons.js"></script>
<!-- endinject -->
<!-- Plugin js for this page-->
<!-- End plugin js for this page-->
<!-- inject:js -->
<script src="../../assets/js/shared/off-canvas.js"></script>
<script src="../../assets/js/shared/misc.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="../../assets/js/shared/jquery.cookie.js" type="text/javascript"></script>
<!-- End custom js for this page-->
</body>
</html>
<br>
<br>
<br>
<br>
<br>
<br>
<!---->
<!--<div class="row">-->
<!---->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Client Management', ['controller' => 'serviceClients', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        echo '</div>';
//        echo '<div style="text-align: Center">';
//        echo $this->Html->link('Add New Client', ['controller' => 'users', 'action' => 'addClient'], ['class' => 'collapse-item']);
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!---->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Inspector Management', ['controller' => 'inspectors', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        echo '</div>';
//        echo '<div style="text-align: Center">';
//        echo $this->Html->link('Add New Inspector', ['controller' => 'users', 'action' => 'addInspector'], ['class' => 'collapse-item']);
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!---->
<!--</div>-->
<!---->
<!--<div class="row">-->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Subcontractor Management', ['controller' => 'subcontractors', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//            echo '<div style="text-align: Center">';
//            echo $this->Html->link('Add New Subcontractor', ['controller' => 'users', 'action' => 'addSubcontractor'], ['class' => 'collapse-item']);
//            echo '</div>';
//        }
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!---->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Property Management', ['controller' => 'properties', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        echo '</div>';
//        echo '<div style="text-align: Center">';
//        echo $this->Html->link('Add New Property', ['controller' => 'properties', 'action' => 'add'], ['class' => 'collapse-item']);
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!--</div>-->
<!---->
<!--<div class="row">-->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Inspector') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Inspector Reports Management', ['controller' => 'reports', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        echo '</div>';
//        echo '<div style="text-align: Center">';
//        echo $this->Html->link('Add New Reports', ['controller' => 'reports', 'action' => 'add'], ['class' => 'collapse-item']);
//        echo '</div>';
//
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Inspector' || $this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Client') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Inspector Job Management', ['controller' => 'jobs', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//            echo '<div style="text-align: Center">';
//            echo $this->Html->link('Add New Job', ['controller' => 'jobs', 'action' => 'add'], ['class' => 'collapse-item']);
//            echo '</div>';
//        }
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!--</div>-->
<!---->
<!--<div class="row">-->
<!--    --><?php
//    if ($this->request->getSession()->read('Auth.User.role') == 'Staff' || $this->request->getSession()->read('Auth.User.role') == 'Subcontractor') {
//        echo '<div class="col-6">';
//        echo '<div class="card h-100" >';
//        echo '<div class="card-body">';
//        echo '<div style="text-align: Center">';
//        echo "<h2>" . $this->Html->link('Subcontractor Project Management', ['controller' => 'projects', 'action' => 'index'], ['class' => 'collapse-item']) . "</h2>";
//        echo '</div>';
//
//        if ($this->request->getSession()->read('Auth.User.role') == 'Staff') {
//            echo '<div style="text-align: Center">';
//            echo $this->Html->link('Add New Project', ['controller' => 'projects', 'action' => 'add'], ['class' => 'collapse-item']);
//            echo '</div>';
//        }
//
//        echo '</div>';
//        echo '</div>';
//        echo '</div>';
//    } ?>
<!--</div>-->
