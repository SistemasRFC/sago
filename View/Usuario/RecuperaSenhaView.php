<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8; IBM850; ISO-8859-1">
        <script src="View/Usuario/js/RecuperaSenhaView.js?rdm=<?php echo time(); ?>"></script>
    </head>
    <body>
        <div id="RecuperaSenha" class="modal">
            <div class="card" style="margin-top: 0px; padding: 20px 20px; max-width: 400px;">
                <span id="fechaModalSenha" class="close">&times;</span>
                <h4 style="margin-top: 10px;">Informe o CPF cadastrado e enviaremos uma nova senha para o seu E-mail</h4>

                <label for="nroCpfSenha" class="titulo">CPF</label>
                <input required type="text" id="nroCpfSenha" name="nroCpfSenha" class="persist input">
                
                <div class="titulo">
                    <input type="button" id="btnEnviar" value="Enviar" class="button">
                </div>
            </div>
        </div>
    </body>
</html>