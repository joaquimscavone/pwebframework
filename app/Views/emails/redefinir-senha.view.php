    <span class="preheader"><?=APPLICATION_NAME?> - Redefinir senha</span>
    <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="body">
      <tr>
        <td>&nbsp;</td>
        <td class="container">
          <div class="content">

            <!-- START CENTERED WHITE CONTAINER -->
            <table role="presentation" class="main">

              <!-- START MAIN CONTENT AREA -->
              <tr>
                <td class="wrapper">
                  <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td>
                        <p>Olá <?=$view->usuario?>!</p>
                        <p>Alguém solicitou recentemente uma alteração na senha da sua conta do <?=APPLICATION_NAME?>. Se foi você, então defina sua nova senha aqui: </p>
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" class="btn btn-primary">
                          <tbody>
                            <tr>
                              <td align="left">
                                <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                                  <tbody>
                                    <tr>
                                      <td> <a href="<?=$view->getUrl(\Controllers\Login\SenhaController::class,
                                      'telaRedefinirSenha'
                                      ,[])?>" target="_blank">Redefinir Senha</a> </td>
                                    </tr>
                                  </tbody>
                                </table>
                              </td>
                            </tr>
                          </tbody>
                        </table>
                        <p>Se não quiser alterar a senha ou não tiver feito essa solicitação, basta ignorar e excluir esta mensagem.</p>
                        <p>Para manter sua conta segura, não encaminhe este e-mail para ninguém.</p>
                        <p>Atenciosamente, Equipe <?=APPLICATION_NAME?>.</p>
                      </td>
                    </tr>
                  </table>
                </td>
              </tr>

              <!-- END MAIN CONTENT AREA -->
            </table>
            <!-- END CENTERED WHITE CONTAINER -->

            <!-- START FOOTER -->
            <div class="footer">
              <table role="presentation" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td class="content-block">
                    <span class="apple-link"><?=APPLICATION_NAME?></span>
                  </td>
                </tr>
                <tr>
                  <td class="content-block powered-by">
                    Enviado por: <a href="<?=$view->getUrl(\Controllers\HomeController::class);?>"><?=APPLICATION_NAME?></a>.
                  </td>
                </tr>
              </table>
            </div>
            <!-- END FOOTER -->

          </div>
        </td>
        <td>&nbsp;</td>
      </tr>
    </table>