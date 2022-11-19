  <div class="content">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col">
            <ol class="breadcrumb float-right">
              <li class="breadcrumb-item"><?php 
                                          use Controllers\HomeController;
                                          use Core\Action;
              Action::getActionByController(HomeController::class)->rederLink(APPLICATION_NAME);?>
              </li>
              <li class="breadcrumb-item active">Erro 500 - Erro no sistema</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="error-page">
        <h2 class="headline text-danger">500</h2>

        <div class="error-content m-4">
          <h3><i class="fas fa-exclamation-triangle text-danger"></i> Oops! Algo deu errado.</h3>

          <p class="text-justify">
          Vamos trabalhar para corrigir isso imediatamente.
            Enquanto isso, você pode  <?php Action::getActionByController(HomeController::class)->rederLink('voltar a tela inicial');?>.
          </p>

       
        </div>
        <!-- /.error-content -->
      </div>
      <!-- /.error-page -->
    </section>
    <!-- /.content -->
  </div>

  
