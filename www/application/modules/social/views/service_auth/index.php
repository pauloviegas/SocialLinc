<!DOCTYPE html>
<html>
<meta http-equiv="content-type"
      content="text/html;charset=UTF-8"/>
<!-- INICIO DA HEAD -->
<head>
    <title><?= $nomeProjeto ?></title>
    <meta charset="utf-8"/>
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <!-- INICIO FAVICO LINC -->
    <link
        href="<?= $url_base . 'assets/img/icon_logo_linc.ico' ?>"
        rel="shortcut icon">
    <!-- FIM FAVICO LINC -->

    <!-- INICIO DOS PLUGIN'S CSS -->
    <link
        href="<?= $url_base . 'assets/plugins/pace/pace-theme-flash.css' ?>"
        rel="stylesheet" type="text/css"
        media="screen"/>
    <link
        href="<?= $url_base . 'assets/plugins/boostrapv3/css/bootstrap.min.css' ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?= $url_base . 'assets/plugins/boostrapv3/css/bootstrap-theme.min.css' ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?= $url_base . 'assets/plugins/font-awesome/css/font-awesome.css' ?>"
        rel="stylesheet" type="text/css"/>
    <!-- FIM DOS PLUGIN'S CSS -->

    <!-- INICIO DOS CSS'S -->
    <link
        href="<?= $url_base . 'assets/css/animate.min.css' ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?= $url_base . 'assets/css/style.css' ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?= $url_base . 'assets/css/responsive.css' ?>"
        rel="stylesheet" type="text/css"/>
    <link
        href="<?= $url_base . 'assets/css/custom-icon-set.css' ?>"
        rel="stylesheet" type="text/css"/>
    <!-- FIM DOS CSS'S -->
</head>
<!-- FIM DA HEAD -->
<!-- INICIO DO BODY -->
<body class="error-body no-top">

<!--<script>
    // This is called with the results from from FB.getLoginStatus().
    function statusChangeCallback(response) {
        // The response object is returned with a status field that lets the
        // app know the current login status of the person.
        // Full docs on the response object can be found in the documentation
        // for FB.getLoginStatus().
        if (response.status === 'connected') {
            // Logged into your app and Facebook.
            testAPI();
        } else if (response.status === 'not_authorized') {
            // The person is logged into Facebook, but not your app.
            document.getElementById('status').innerHTML = 'Please log ' +
                    'into this app.';
        } else {
            // The person is not logged into Facebook, so we're not sure if
            // they are logged into this app or not.
            document.getElementById('status').innerHTML = 'Please log ' +
                    'into Facebook.';
        }
    }

    // This function is called when someone finishes with the Login
    // Button.  See the onlogin handler attached to it in the sample
    // code below.
    function checkLoginState() {
        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });
    }

    window.fbAsyncInit = function () {
        FB.init({
            appId: '1431935880433013',
            cookie: true, // enable cookies to allow the server to access
            // the session
            xfbml: true, // parse social plugins on this page
            version: 'v2.2' // use version 2.2
        });

        // Now that we've initialized the JavaScript SDK, we call
        // FB.getLoginStatus().  This function gets the state of the
        // person visiting this page and can return one of three states to
        // the callback you provide.  They can be:
        //
        // 1. Logged into your app ('connected')
        // 2. Logged into Facebook, but not your app ('not_authorized')
        // 3. Not logged into Facebook and can't tell if they are logged into
        //    your app or not.
        //
        // These three cases are handled in the callback function.

        FB.getLoginStatus(function (response) {
            statusChangeCallback(response);
        });

    };

    // Load the SDK asynchronously
    (function (d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id))
            return;
        js = d.createElement(s);
        js.id = id;
        js.src = "//connect.facebook.net/en_US/sdk.js";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));

    // Here we run a very simple test of the Graph API after login is
    // successful.  See statusChangeCallback() for when this call is made.
    function testAPI() {
        FB.api('/me', function (response) {
            //location.href = '/social/home/home';
            console.log(response);
        });
    }
</script>-->

<!-- INICIO DO CONTAINER -->
<div class="container" style="margin-top: 20px;">

    <div class="row">
        <div class="col-md-1"
             style="margin-left: 25%;">
            <img
                src="<?= $url_base . 'assets/img/logo_social.png' ?>"
                class="logo" width="440"/>
        </div>
    </div>

    <!-- INICIO DO BLOCO DE MENSAGENS -->
    <?php if ($sucesso) : ?>
        <div class="alert alert-success">
            <button class="close"
                    data-dismiss="alert"></button>
            <?= $sucesso ?>
        </div>
    <?php endif; ?>
    <?php if ($noticia) : ?>
        <div class="alert">
            <button class="close"
                    data-dismiss="alert"></button>
            <?= $noticia ?>
        </div>
    <?php endif; ?>
    <?php if ($validacao) : ?>
        <div class="alert alert-error">
            <button class="close"
                    data-dismiss="alert"></button>
            <?= $validacao ?>
        </div>
    <?php endif; ?>
    <?php if ($erro) : ?>
        <div class="alert alert-error">
            <button class="close"
                    data-dismiss="alert"></button>
            <?= $erro ?>
        </div>
    <?php endif; ?>
    <!-- FIM DO BLOCO DE MENSAGENS -->

    <!-- INICIO DA DIV DE LOGIN -->
    <div
        class="row login-container column-seperation">
        <!-- INICIO DA COLUNA DA DIREITA -->
        <div class="col-md-4 col-md-offset-1">
            <h2>LINC Social</h2>

            <p><strong>Faz parte do LINC? Entre em
                    nossa rede social!</strong>
            </p>

            <p>
                Se você faz parte do LINC ou de um
                dos laboratórios
                parceiros e gostaria de saber
                novidades sobre nossos
                projetos, faça seu cadastro agora
                e comece a acompanhar
                as nossas atividades.
            </p>

            <p>
                O objetivo do Social LINC é
                proporcionar um ambiente
                amigável para compartilhamento das
                atividades
                científicas do Laboratório.
            </p>
        </div>
        <!-- FIM DA COLUNA DA DIREITA -->
        <!-- INICIO DA COLUNA DA ESQUERDA -->
        <div class="col-md-6">
            <br>

            <form id="formlogin"
                  class="login-form" method="post"
                  action="<?= base_url('social/serviceauth/logar') ?>">
                <div class="row">
                    <div
                        class="form-group col-md-10">
                        <label class="form-label">E-mail</label>

                        <div class="controls">
                            <div
                                class="input-with-icon right">
                                <i class=""></i>
                                <input
                                    id="txtusername"
                                    class="form-control"
                                    type="email"
                                    name="email"
                                    required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div
                        class="form-group col-md-10">
                        <label class="form-label">Senha</label>
                        <span class="help"></span>

                        <div class="controls">
                            <div
                                class="input-with-icon right">
                                <i class=""></i>
                                <input
                                    id="txtpassword"
                                    class="form-control"
                                    type="password"
                                    name="senha"
                                    required/>
                            </div>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-10">
                        <button id="login-form"
                                type="button"
                                class="btn btn-success btn-cons">
                            Login
                        </button>
                        <?php if (!$this->uri->segment(4)) : ?>
                            <button id="cadastrar"
                                    type="button"
                                    data-toggle="modal"
                                    data-target="#modalCadastrarUsuario"
                                    class="btn btn-info btn-cons">
                                Cadastre-se
                            </button>
                        <?php else : ?>
                            <button
                                id="completarCadastro"
                                type="button"
                                data-toggle="modal"
                                data-target="#modalCompletarCadastro"
                                class="btn btn-info btn-cons">
                                Completar Cadastro
                            </button>
                        <?php endif; ?>
                        <!--<fb:login-button scope="public_profile,email" onlogin="checkLoginState();"></fb:login-button>-->
                    </div>
                </div>
            </form>
        </div>
        <!-- FIM DA COLUNA DA ESQUERDA -->
    </div>
    <!-- FIM DA DIV DE LOGIN -->
</div>
<!-- FIM DO CONTAINER -->

<?php if (!$this->uri->segment(4)) : ?>
    <div class="modal fade"
         id="modalCadastrarUsuario" tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Cadastre-se Já!</h4>
                </div>
                <div
                    id="modalCadastrarUsuarioContent"
                    class="modal-body">
                    <div class="row">
                    </div>
                    <form
                        id="formCadastrarUsuario"
                        method="post"
                        enctype="multipart/form-data"
                        action="<?= base_url('social/serviceauth/inserir') ?>">
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Nome
                                    Completo:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="nome"
                                            class="form-control"
                                            type="text"
                                            name="nome">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">E-mail:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="email"
                                            class="form-control"
                                            type="text"
                                            name="email">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Formação
                                    Acadêmica:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <select
                                            id="formacao"
                                            name="id_formacao"
                                            style="width:100%">
                                            <?php if (count($formacoes) > 0) : ?>
                                                <option
                                                    value="">
                                                    Selecione
                                                </option>
                                                <?php foreach ($formacoes as $formacao) : ?>
                                                    <option
                                                        value="<?= $formacao->id ?>"><?= $formacao->formacao ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option
                                                    value="0">
                                                    Não
                                                    Existe
                                                    Nenhuma
                                                    Formação
                                                    Disponível
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Instituição:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <select
                                            id="instituicao"
                                            name="id_instituicao"
                                            style="width:100%">
                                            <?php if (count($instituicoes) > 0) : ?>
                                                <option
                                                    value="">
                                                    Selecione
                                                </option>
                                                <?php foreach ($instituicoes as $instituicao) : ?>
                                                    <option
                                                        value="<?= $instituicao->id ?>"><?= $instituicao->nome ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option
                                                    value="0">
                                                    Não
                                                    Existe
                                                    Nenhuma
                                                    Instituição
                                                    Disponível
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Senha:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="senha"
                                            class="form-control"
                                            type="password"
                                            name="senha">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Repertir
                                    Senha:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="repetirSenha"
                                            class="form-control"
                                            type="password"
                                            name="repetirSenha">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-12">
                                <label
                                    class="form-label">Selecione
                                    uma foto:
                                    <small
                                        style="font-size: 10px;">
                                        Tamanho
                                        Ideal -
                                        180 x 100
                                    </small>
                                </label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <div
                                            class="form-control">
                                            <input
                                                id="imagem"
                                                class="col-md-12"
                                                type="file"
                                                name="foto"
                                                id="foto"
                                                style="opacity: 0; position: relative;"/>
                                            <label
                                                id="nomeimagem"
                                                class="form-label"
                                                style="font-size: 15px; position: absolute; margin-top: -35px;"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-12">
                                <label
                                    class="form-label">Currículo
                                    Lattes:</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="lattes"
                                            placeholder="http://...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden"
                               name="foto_fundo"
                               value="assets/img/usuarios/default_foto_fundo.png">
                        <input type="hidden"
                               name="aprovado"
                               value="1">
                        <input type="hidden"
                               name="excluido"
                               value="0">
                    </form>
                </div>
                <div class="modal-footer">
                    <div
                        class="form-group col-md-12">
                        <label class="form-label">Campos
                            Obrigatórios *</label>
                    </div>
                    <button id="btnSalvarUsuario"
                            type="button"
                            class="btn btn-success"
                            hidden>Salvar
                    </button>
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php else : ?>
    <div class="modal fade"
         id="modalCompletarCadastro" tabindex="-1"
         role="dialog"
         aria-labelledby="myModalLabel"
         aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button"
                            class="close"
                            data-dismiss="modal"
                            aria-label="Close">
                        <span
                            aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        Cadastre-se Já!</h4>
                </div>
                <div
                    id="modalCadastrarUsuarioContent"
                    class="modal-body">
                    <div class="row">
                    </div>
                    <form
                        id="formSalvarUsuarioConvidado"
                        method="post"
                        action="<?= base_url('social/serviceauth/inserirUsuario/' . $base64Usuario) ?>"
                        enctype="multipart/form-data">
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Nome
                                    Completo:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="nome"
                                            class="form-control"
                                            type="text"
                                            name="nome"
                                            value="<?= $usuario[0]->nome ?>">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">E-mail:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="email"
                                            class="form-control"
                                            type="text"
                                            name="email"
                                            disabled="true"
                                            value="<?= $usuario[0]->email ?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Formação
                                    Acadêmica:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <select
                                            id="formacao"
                                            name="id_formacao"
                                            style="width:100%">
                                            <?php if (count($formacoes) > 0) : ?>
                                                <option
                                                    value="">
                                                    Selecione
                                                </option>
                                                <?php foreach ($formacoes as $formacao) : ?>
                                                    <option
                                                        value="<?= $formacao->id ?>"><?= $formacao->formacao ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option
                                                    value="0">
                                                    Não
                                                    Existe
                                                    Nenhuma
                                                    Formação
                                                    Disponível
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Instituição:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <select
                                            id="instituicao"
                                            name="id_instituicao"
                                            style="width:100%">
                                            <?php if (count($instituicoes) > 0) : ?>
                                                <option
                                                    value="">
                                                    Selecione
                                                </option>
                                                <?php foreach ($instituicoes as $instituicao) : ?>
                                                    <option
                                                        value="<?= $instituicao->id ?>"><?= $instituicao->nome ?></option>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <option
                                                    value="0">
                                                    Não
                                                    Existe
                                                    Nenhuma
                                                    Instituição
                                                    Disponível
                                                </option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Senha:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="senha"
                                            class="form-control"
                                            type="password"
                                            name="senha">
                                    </div>
                                </div>
                            </div>
                            <div
                                class="form-group col-md-6">
                                <label
                                    class="form-label">Repertir
                                    Senha:
                                    *</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            id="repetirSenha"
                                            class="form-control"
                                            type="password"
                                            name="repetirSenha">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-12">
                                <label
                                    class="form-label">Selecione
                                    uma foto:
                                    <small
                                        style="font-size: 10px;">
                                        Tamanho
                                        Ideal -
                                        180 x 100
                                    </small>
                                </label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <div
                                            class="form-control">
                                            <input
                                                id="imagem"
                                                class="col-md-12"
                                                type="file"
                                                name="foto"
                                                id="foto"
                                                style="opacity: 0; position: relative;"/>
                                            <label
                                                id="nomeimagem"
                                                class="form-label"
                                                style="font-size: 15px; position: absolute; margin-top: -35px;"></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div
                                class="form-group col-md-12">
                                <label
                                    class="form-label">Currículo
                                    Lattes:</label>

                                <div
                                    class="controls">
                                    <div
                                        class="input-with-icon right">
                                        <i class=""></i>
                                        <input
                                            class="form-control"
                                            type="text"
                                            name="lattes"
                                            placeholder="http://...">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="hidden"
                               name="foto_fundo"
                               value="/assets/img/usuarios/default_foto_fundo.png">
                        <input type="hidden"
                               name="email"
                               value="<?= $usuario[0]->email ?>">
                        <input type="hidden"
                               name="aprovado"
                               value="1">
                        <input type="hidden"
                               name="excluido"
                               value="0">
                    </form>
                </div>
                <div class="modal-footer">
                    <div
                        class="form-group col-md-12">
                        <label class="form-label">Campos
                            Obrigatórios *</label>
                    </div>
                    <button
                        id="btnSalvarUsuarioConvidado"
                        type="button"
                        class="btn btn-success"
                        hidden>Salvar
                    </button>
                    <button type="button"
                            class="btn btn-default"
                            data-dismiss="modal">
                        Cancelar
                    </button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>


<!-- INICIO DOS FRAMEWORKS DE JAVASCRIPT -->
<script
    src="<?= $url_base . 'assets/plugins/jquery-1.8.3.min.js' ?>"
    type="text/javascript"></script>
<script
    src="<?= $url_base . 'assets/plugins/bootstrap/js/bootstrap.min.js' ?>"
    type="text/javascript"></script>
<script
    src="<?= $url_base . 'assets/plugins/pace/pace.min.js' ?>"
    type="text/javascript"></script>
<script
    src="<?= $url_base . 'assets/plugins/jquery-validation-1.13.1/dist/jquery.validate.min.js' ?>"
    type="text/javascript"></script>
<script
    src="<?= $url_base . 'assets/plugins/jquery-validation-1.13.1/dist/localization/messages_pt_BR.min.js' ?>"
    type="text/javascript"></script>
<!-- FIM DOS FRAMEWORKS DE JAVASCRIPT -->

<?php if ($this->uri->segment(4)) : ?>
    <script>
        $('#modalCompletarCadastro').modal('show');
    </script>
<?php endif; ?>

<script>
    $("#formlogin").validate({
        rules: {
            txtusername: {
                required: true,
                email: true
            },
            txtpassword: "required"
        }
    });
    $("#formCadastrarUsuario").validate({
        rules: {
            nome: "required",
            senha: "required",
            repetirSenha: "required",
            email: {
                required: true,
                email: true
            },
            id_formacao: "required",
            id_instituicao: "required"
        }
    });
    //Submete o formulário de login
    $("#login-form").click(function () {
        $(".login-form").submit();
    });
    $("#btnSalvarUsuario").click(function () {
        $("#formCadastrarUsuario").submit();
    });
    $("#btnSalvarUsuarioConvidado").click(function () {
        $("#formSalvarUsuarioConvidado").submit();
    });
    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });
</script>
</body>
<!-- FIM DO BODY -->
</html>