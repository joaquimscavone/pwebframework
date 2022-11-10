<div class="register-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span class="h1"><?= APPLICATION_NAME ?></span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Registre-se</p>
      <?php \Components\AlertComponent::flushMessage();?>
      <form action="<?= $view->getUrl(\Controllers\LoginController::class, "cadastrar") ?>" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Nome completo" name="nome" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name="email" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Repita a Senha" name="confirmacao" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="termo" value="agree" required>
              <label for="agreeTerms">
                Eu aceito os <a href="<?= $view->getUrl(\Controllers\TermosController::class) ?>" target="_blank">termos do serviço terms</a>
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>


      <a href="<?= $view->getUrl(\Controllers\LoginController::class) ?>" class="text-center">Já possuo cadastro</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>