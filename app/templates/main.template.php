<!DOCTYPE html>
<html lang="<?= $template->lang; ?>">

<head>
  <meta charset="<?= APPLICATION_CHARSET ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $template->title ?></title>
  <link rel="shortcut icon" href="<?=$template->icon?>" type="image/png">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= APPLICATION_URL ?>/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= APPLICATION_URL ?>/assets/styles/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <?php (new \Core\Components('main-header'))->show(['user' => $user]) ?>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?php (new \Core\Components('side-bar'))->show(['template'=>$template]) ?>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header   mb-2 border-bottom">
        <div class="container-fluid">
          <div class="row">
            <div class="col">
              <h1><?= $template->sample_title ?></h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        \Components\AlertComponent::flushMessage();
        require $view; 
        ?>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php (new \Core\Components('main-footer'))->show() ?>
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?= APPLICATION_URL ?>/assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?= APPLICATION_URL ?>/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?= APPLICATION_URL ?>/assets/scripts/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
</body>

</html>