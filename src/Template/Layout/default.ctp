<?php

use Cake\Core\Configure;
use Cake\Core\Configure\Engine\PhpConfig;
use Cake\I18n\Time;
use Cake\I18n\Date;

?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
    <meta http-equiv="pragma" content="no-cache" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo isset($title) ? $title : $this->fetch('title') ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?= $this->Html->css(['bootstrap.min.css','select2.min.css', 'AdminLTE.min.css','datepicker3.css']); ?>
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
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
            </a>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs">
                                <?php
                                $date = new Date();
                                echo $date->i18nFormat([\IntlDateFormatter::FULL, \IntlDateFormatter::SHORT]);
                                ?>
                            </span>
                        </a>
                    </li>
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <span class="hidden-xs"><?= $name ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <p>
                                    Bem vindo, <?= $name ?>
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
                    <li class="dropdown tasks-menu">
                    <li><?= $this->Html->link($this->Html->tag('i', '',
                            ['class' => 'fa fa-sign-out']),
                            ['controller' => 'Users', 'action' => 'logout'],
                            ['title' => "Sair", 'escape' => false]) ?>
                    </li>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu" data-widget="tree">
                <li class="header">MENU PRINCIPAL</li>
                <!-- Optionally, you can add icons to the links -->

                <li class="treeview">
                    <a href="#"><i class="fa fa-bar-chart"></i> <span>Resumos</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><?= $this->Html->link($this->Html->tag('i', '',
                                    ['class' => 'fa fa-circle-o']) . " Listar",
                                ['controller' => 'Resumos', 'action' => 'index'],
                                ['title' => "Resumos", 'escape' => false]) ?>
                        </li>

                    </ul>
                </li>
                <?php if ($tipo == 'Admin'): ?>
                    <li class="treeview">
                        <a href="#"><i class="fa fa-cubes"></i> <span>Praças</span>
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
                        <a href="#"><i class="fa fa-user"></i> <span>Usuários</span>
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
            <div class="box">
                <div class="box-header with-border">
                    <?= $this->Flash->render() ?>
                    <h3 class="box-title"><?= $this->request->getParam('controller'); ?></h3>
                </div>
                <!--------------------------
                | Your Page Content Here |
                -------------------------->
                <div class="box-body">
                    <?= $this->fetch('content') ?>
                </div><!-- /.box-body -->
            </div>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            SRT Resumos
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; <?= date('Y')?> <a href="#">Nawi Informática</a>.</strong> All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<!-- Bootstrap 3.3.7 -->
<!-- AdminLTE App -->
<?= $this->Html->script(['jQuery.min.js', 'bootstrap.min.js', 'app.min.js','bootstrap-datepicker.js','bootstrap-datepicker.pt-BR.js','select2.min.js']); ?>
<script>
    $(document).ready(function() {
        $('.data-etapa').datepicker({
            format: "yyyymmdd",
            language: "pt-BR"
        });
    });

</script>
<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
<?= $this->fetch('scriptBottom')?>
</body>
</html>
