  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><?php 
                                          use Controllers\HomeController;
                                          use Core\Action;
              Action::getActionByController(HomeController::class)->rederLink(APPLICATION_NAME);?>
              </li>
              <li class="breadcrumb-item active">Erro 404 - Página não encontrada</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-warning">404</h2>

        <div class="error-content">
          <h3><i class="fas fa-exclamation-triangle text-warning"></i> Oops! Página não encontrada.</h3>

          <p>
          Não foi possível encontrar a página que você estava procurando.
            Porém, você pode  <?php Action::getActionByController(HomeController::class)->rederLink('voltar a tela inicial');?>.
          </p>

       
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>

  
