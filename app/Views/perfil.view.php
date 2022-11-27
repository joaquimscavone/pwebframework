<div class="container-">
    <div class="row">
        <!-- left column -->
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Alterar Dados</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perfil-nome">Nome</label>
                            <input type="text" class="form-control" value="<?=$user->nome?>" id="perfil-nome" placeholder="Digite seu nome" name="nome" requided>
                        </div>
                        <div class="form-group">
                            <label for="perfil-email">Email</label>
                            <input type="email" class="form-control" value="<?=$user->email?>" id="perfil-email" placeholder="Digite seu email" name="email" required>
                        </div>    
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Alterar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
        <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Alterar Senha</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perfil-senha-atual">Senha Atual</label>
                            <input type="password" class="form-control" id="perfil-senha-atual" placeholder="Digite sua senha atual" name="senha" requided>
                        </div>
                        <div class="form-group">
                            <label for="perfil-senha-nova">Nova Senha</label>
                            <input type="password" class="form-control" id="perfil-senha-nova" placeholder="Digite sua nova senha" name="novasenha" requided>
                        </div>
                        <div class="form-group">
                            <label for="perfil-senha-confirmacao">Digite a confirmação da sua senha</label>
                            <input type="password" class="form-control" id="perfil-senha-confirmacao" placeholder="Repita sua senha" name="confirmacao" requided>
                        </div>
                       
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary float-right">Alterar</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
       </div>
</div>