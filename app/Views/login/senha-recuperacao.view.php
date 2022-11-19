<div class="login-box">
  <div class="card card-outline card-danger">
    <div class="card-header text-center">
    <span class="h1"><?=APPLICATION_NAME?></span>
    </div>
    <div class="card-body">
    <?php \Components\AlertComponent::flushMessage();?>
      <p class="login-box-msg">Você está a apenas um passo de sua nova senha, recupere sua senha agora.</p>
      <form action="<?=$view->getUrl(
                        \Controllers\Login\SenhaController::class,
                        'actionRedefinirSenha',
                        ['hash1'=>$view->hash1,'hash2'=>$view->hash2]
                        )?>" method="post">
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha" name="senha" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Confirmar Senha" name="confirmar" required>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-danger btn-block">Alterar Senha</button>
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

