<div class="login-box">
  <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <span class="h1"><?=APPLICATION_NAME?></span>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Login</p>

      <form action="<?=$view->getUrl(\Controllers\LoginController::class,"logar")?>" method="post">
        <div class="input-group mb-3">
          <input type="email" class="form-control" placeholder="Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" placeholder="Senha">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Lembre-me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Entrar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

    

      <p class="mb-1">
        <a href="<?=$view->getUrl(\Controllers\LoginController::class,"redefinirSenha")?>">Esqueci minha senha</a>
      </p>
      <p class="mb-0">
        <a href="<?=$view->getUrl(\Controllers\LoginController::class,"cadastro")?>" class="text-center">Quero me cadastrar</a>
      </p>
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->
