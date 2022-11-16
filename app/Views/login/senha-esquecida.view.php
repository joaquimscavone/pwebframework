<div class="login-box">
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span class="h1"><?= APPLICATION_NAME ?></span>
    </div>
    <div class="card-body">
      <?php \Components\AlertComponent::flushMessage(); ?>
      <p class="login-box-msg">Você esqueceu sua senha? Aqui você pode facilmente recuperar uma nova senha.</p>
      <form action="<?=$view->getUrl(\Controllers\Login\SenhaController::class,'criarRegistroEsqueciMinhaSenha');?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email" name='email' required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Criar nova Senha</button>
          </div>
          <!-- /.col -->
        </div>
      </form>
      <p class="mt-3 mb-1">
        <a href="<?=$view->getUrl(\Controllers\Login\LoginController::class);?>">Login</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>