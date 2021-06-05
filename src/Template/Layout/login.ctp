<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?= $this->Html->charset() ?>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <!-- Theme style -->
    <!-- Bootstrap 3.3.6 -->
    <?= $this->Html->css(['bootstrap.min.css', 'AdminLTE.min.css']); ?>

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome 4.5.0-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Font Awesome -->
    <?= $this->Html->css('/plugins/fontawesome-free/css/all.min') ?>
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body class="hold-transition login-page">
<?= $this->fetch('content') ?>
<!-- jQuery 2.2.3 -->
<?= $this->Html->script('/plugins/jQuery/jquery-2.2.3.min') ?>
<!-- Bootstrap 3.3.6 -->
<?= $this->Html->script('/bootstrap/js/bootstrap.min') ?>
<!-- SlimScroll -->
<?= $this->Html->script('/plugins/slimScroll/jquery.slimscroll.min') ?>
<!-- FastClick -->
<?= $this->Html->script('/plugins/fastclick/fastclick') ?>
<!-- AdminLTE App -->
<?= $this->Html->script('/dist/js/app.min') ?>
</body>
</html>
