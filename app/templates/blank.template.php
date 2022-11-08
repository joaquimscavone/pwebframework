<?php /** @var $template \Core\ViewElement */ ?>
<!DOCTYPE html>
<html lang="<?= $template->lang;?>">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$template->title?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?=APPLICATION_URL?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="<?=APPLICATION_URL?>/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=APPLICATION_URL?>/assets/styles/adminlte.min.css">
</head>
<body class="hold-transition login-page">
    <?php require $view?>
<!-- jQuery -->
<script src="<?=APPLICATION_URL?>/assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?=APPLICATION_URL?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=APPLICATION_URL?>/assets/scripts/adminlte.min.js"></script>
</body>
</html>
