<div class="card card-solid">
    <div class="card-body pb-0">
        <div class="row">
            <?php foreach ($view->usuarios as $usuario) : ?>
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                    <div class="card bg-light d-flex flex-fill">
                        <div class="card-header text-muted border-bottom-0">
                        </div>
                        <div class="card-body pt-0">
                            <div class="row">
                                <div class="col-8">
                                    <h2 class="lead"><b><?= $usuario->nome ?></b></h2>
                                    <ul class="ml-4 mb-0 fa-ul text-muted">
                                        <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Email: 
                                        <a href="mailto:<?= $usuario->email?>">
                                        <?= $usuario->email ?></a></li>

                                    </ul>
                                </div>
                                <div class="col-4 text-center">
                                    <i class="fas fa-3x fa-user"></i>
                                    <?php if ($usuario->admin === 1) : ?>
                                        <br>
                                        <span class="badge badge-info">Admin</span>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="text-right">
                                <a href="<?=$view->getUrl(\Controllers\UsersController::class,'user',['cod_usuario'=>$usuario->cod_usuario])?>" class="btn btn-sm btn-primary">
                                    <i class="fas fa-edit"></i> Editar
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- /.card-body -->
    <div class="card-footer">
        <nav aria-label="Contacts Page Navigation">
            <ul class="pagination justify-content-center m-0">
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item"><a class="page-link" href="#">4</a></li>
                <li class="page-item"><a class="page-link" href="#">5</a></li>
                <li class="page-item"><a class="page-link" href="#">6</a></li>
                <li class="page-item"><a class="page-link" href="#">7</a></li>
                <li class="page-item"><a class="page-link" href="#">8</a></li>
            </ul>
        </nav>
    </div>
    <!-- /.card-footer -->
</div>