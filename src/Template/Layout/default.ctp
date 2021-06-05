<?php

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?= $this->fetch('title') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= $this->Html->css(['bootstrap.min.css', 'AdminLTE.min.css']); ?>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <!-- AdminLTE Skins. -->
    <?= $this->Html->css('skins/skin-blue.min.css'); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">

        <!-- Logo -->
        <a href="index2.html" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>SRT</b>Resumos</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?= $name ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <p>
                                    <?= $name ?>
                                    <small><?= $tipo ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <?= $this->Html->link('Perfil', ['controller' => 'users', 'action' => 'edit', $user_id], ['class' => 'btn btn-default btn-flat']); ?>
                                </div>
                                <div class="pull-right">
                                    <?= $this->Html->link('sair', ['controller' => 'users', 'action' => 'logout'], ['class' => 'btn btn-default btn-flat']); ?>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel bg-gray-active">
                    <p><i class="fa fa-user"></i> Bem vindo, <?= $name ?></p>
            </div>
            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU PRINCIPAL</li>
                <!-- Optionally, you can add icons to the links -->
                <li><?= $this->Html->link($this->Html->tag('i', '',
                            ['class' => 'fa fa-line-chart']) . " Resumos",
                        ['controller' => 'Users', 'action' => 'index'],
                        ['title' => "Resumos", 'escape' => false]) ?>
                </li>
                <?php if ($tipo == 'Admin'): ?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cubes"></i> <span>Praça</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><?= $this->Html->link($this->Html->tag('i', '',
                                        ['class' => 'fa fa-circle-o']) . " Adicionar",
                                    ['controller' => 'Pracas', 'action' => 'add'],
                                    ['title' => "Adicionar Praça", 'escape' => false]) ?>
                            </li>
                            <li><?= $this->Html->link($this->Html->tag('i', '',
                                        ['class' => 'fa fa-circle-o']) . " Listar",
                                    ['controller' => 'Pracas', 'action' => 'index'],
                                    ['title' => "Listar Praças", 'escape' => false]) ?>
                            </li>
                        </ul>
                    </li>
                    <!-- menu de usuários-->
                    <li class="treeview">
                        <a href="#"><i class="fa fa-user"></i> <span>Usuário</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><?= $this->Html->link($this->Html->tag('i', '',
                                        ['class' => 'fa fa-circle-o']) . " Adicionar",
                                    ['controller' => 'Users', 'action' => 'add'],
                                    ['title' => "Adicionar Usuário", 'escape' => false]) ?>
                            </li>
                            <li><?= $this->Html->link($this->Html->tag('i', '',
                                        ['class' => 'fa fa-circle-o']) . " Listar",
                                    ['controller' => 'Users', 'action' => 'show'],
                                    ['title' => "Listar usuários", 'escape' => false]) ?>
                            </li>
                            <li><?= $this->Html->link($this->Html->tag('i', '',
                                        ['class' => 'fa fa-circle-o']) . " Resetar Senha",
                                    ['controller' => 'Users', 'action' => 'show'],
                                    ['title' => "Resetar Senha usuário", 'escape' => false]) ?>
                            </li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
        </section>

        <!-- Main content -->
        <section class="content container-fluid">
            <?= $this->Flash->render() ?>
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title"><?= $this->request->controller; ?></h3>
                </div>
                <div class="box-body">
                    <?= $this->fetch('content') ?>
                </div><!-- /.box-body -->
            </div>
            <!--------------------------
              | Your Page Content Here |
              -------------------------->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a>
            </li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript:;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="pull-right-container">
                    <span class="label label-danger pull-right">70%</span>
                  </span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<?= $this->Html->script('plugins/jquery/jQuery-2.1.4.min.js') ?>
<!-- Bootstrap 3.3.7 -->
<!-- AdminLTE App -->
<?= $this->Html->script(['bootstrap.min.js', 'app.min.js']); ?>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
</body>
</html>
