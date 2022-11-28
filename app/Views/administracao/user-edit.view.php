<div class="container-">
    <div class="row">
        <!-- left column -->
        <div class="col-sm-8 mx-auto">
            <!-- general form elements -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Alterar Dados</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="<?= $view->getUrl(\Controllers\UsersController::class, 'edit', ['cod_usuario' => $view->usuario->cod_usuario]); ?>" method="post">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="perfil-nome">Nome</label>
                            <input type="text" class="form-control" value="<?= $view->usuario->nome ?>" id="perfil-nome" placeholder="Digite seu nome" name="nome" requided>
                        </div>
                        <div class="form-group">
                            <label for="perfil-email">Email</label>
                            <input type="email" class="form-control" value="<?= $view->usuario->email ?>" id="perfil-email" placeholder="Digite seu email" name="email" required>
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input" id="isadmin" name="admin" <?= ($view->usuario->admin === 1) ? 'checked' : '' ?>>
                                <label class="custom-control-label" for="isadmin">Administrador</label>
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a href="<?= $view->getUrl(\Controllers\UsersController::class) ?>" class="btn btn-warning"><i class="fas fa-arrow-left mr-1"></i> Voltar</a>
                        <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save mr-1"></i> Salvar</button>
                        <button type="button" data-toggle="modal" data-target="#modal-default" class="btn btn-danger float-right mr-3">
                            <i class="fas fa-trash mr-1"></i> Excluir
                        </button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

        </div>
    </div>
</div>


<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-danger">
                <h4 class="modal-title">Confirmação de exclusão</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Confirma a exclusão do registro de <?= $view->usuario->nome ?>?</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <form action="<?= $view->getUrl(
                                    \Controllers\UsersController::class,
                                    'remove',
                                    ['cod_usuario' => $view->usuario->cod_usuario]
                                );
                                ?>" " method="post">
                    <input type="hidden" name="cod_usuario" value="<?= $view->usuario->cod_usuario ?>">
                    <button type="submit" class="btn btn-danger float-right mr-3">
                        <i class="fas fa-trash mr-1"></i> Excluir
                    </button>
                </form>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>