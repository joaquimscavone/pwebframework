<?php
    $ano_lancamento = APPLICATION_RELEASE_YEAR;
    $ano_atual = (new \Core\Date())->format('Y');
    $ano_lancamento .= ($ano_lancamento!=$ano_atual)?"-$ano_atual":"";
?>
<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        <b>Versão</b> <?=APPLICATION_VERSION?>
    </div>
    <strong>Corporação &copy; <?=$ano_lancamento?> <?=\Core\Action::
    getActionByController(\Controllers\HomeController::class)->rederLink(APPLICATION_NAME)?>.</strong> Todos os direitos reservados.
</footer>