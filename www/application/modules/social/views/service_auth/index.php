<!DOCTYPE html>
<html>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <!-- INICIO DA HEAD -->
    <head>
        <title>Social Linc</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />

        <!-- INICIO FAVICO LINC -->
        <link href="/assets/img/icon_logo_linc.ico" rel="shortcut icon">
        <!-- FIM FAVICO LINC -->

        <!-- INICIO DOS PLUGIN'S CSS -->
        <link href="/assets/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="/assets/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <!-- FIM DOS PLUGIN'S CSS -->

        <!-- INICIO DOS CSS'S -->
        <link href="/assets/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="/assets/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
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
                <div class="col-md-1" style="margin-left: 25%;">
                    <img src="/assets/img/logo_social.png" class="logo" width="440"/>
                </div>
            </div>

            <!-- INICIO DO BLOCO DE MENSAGENS -->
            <?php if ($sucesso) : ?>
                <div class="alert alert-success">
                    <button class="close" data-dismiss="alert"></button>
                    <?= $sucesso ?>
                </div>
            <?php endif; ?>
            <?php if ($noticia) : ?>
                <div class="alert">
                    <button class="close" data-dismiss="alert"></button>
                    <?= $noticia ?>
                </div>
            <?php endif; ?>
            <?php if ($validacao) : ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <?= $validacao ?>
                </div>
            <?php endif; ?>
            <?php if ($erro) : ?>
                <div class="alert alert-error">
                    <button class="close" data-dismiss="alert"></button>
                    <?= $erro ?>
                </div>
            <?php endif; ?>
            <!-- FIM DO BLOCO DE MENSAGENS -->

            <!-- INICIO DA DIV DE LOGIN -->
            <div class="row login-container column-seperation">
                <!-- INICIO DA COLUNA DA DIREITA -->
                <div class="col-md-4 col-md-offset-1">
                    <h2>LINC Social</h2>
                    <p><strong>Faz parte do LINC? Entre em nossa rede social!</strong></p>
                    <p>
                        Se você faz parte do LINC ou de um dos laboratórios 
                        parceiros ou gostaria de saber novidades sobre nossos
                        projetos, faça seu cadastro agora e comece a participar
                        de nossas atividades.<br><br>
                        Divulgue suas contribuições científicas através do nosso
                        site e rede social.
                    </p>
                    <p>
                        Se você ainda não faz parte da nossa rede social?
                        <a href="#" data-toggle="modal" data-target="#modalCadastrarUsuario">Cadastre-se Já!</a>
                    </p>
                </div>
                <!-- FIM DA COLUNA DA DIREITA -->
                <!-- INICIO DA COLUNA DA ESQUERDA -->
                <div class="col-md-6">
                    <br>
                    <form class="login-form" method="post">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label class="form-label">E-mail</label>
                                <div class="controls">
                                    <div class="input-with-icon right">                                       
                                        <i class=""></i>
                                        <input type="text" name="email" id="txtusername" class="form-control">                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label class="form-label">Senha</label>
                                <span class="help"></span>
                                <div class="controls">
                                    <div class="input-with-icon right">                                       
                                        <i class=""></i>
                                        <input type="password" name="senha" id="txtpassword" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-10">
                                <button id="login-form" type="button" class="btn btn-success btn-cons">Login</button>
                                <button id="cadastrar" type="button" data-toggle="modal" data-target="#modalCadastrarUsuario" class="btn btn-info btn-cons">Cadastre-se</button>
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

        <div class="modal fade" id="modalCadastrarUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Cadastre-se Já!</h4>
                    </div>
                    <div id="modalCadastrarUsuarioContent" class="modal-body">
                        <div class="row">
                            <div class="form-group col-md-12">
                                <label class="form-label">Campos Obrigatórios *</label>
                            </div>
                        </div>
                        <form id="formCadastrarUsuario" method="post">
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Nome do Usuário: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <input class="form-control" type="text" name="nome">                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">E-mail: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <input class="form-control" type="text" name="email">                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Formação: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">
                                            <select name="id_formacao" style="width:100%">
                                                <?php if (count($formacoes) > 0) : ?>
                                                    <option value="0">Selecione</option>
                                                    <?php foreach ($formacoes as $formacao) : ?>
                                                        <option value="<?= $formacao->id ?>"><?= $formacao->formacao ?></option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="0">Não Existe Nenhuma Formação Disponível</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Instituição: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">
                                            <select name="id_instituicao" style="width:100%">
                                                <?php if (count($instituicoes) > 0) : ?>
                                                    <option value="0">Selecione</option>
                                                    <?php foreach ($instituicoes as $instituicao) : ?>
                                                        <option value="<?= $instituicao->id ?>"><?= $instituicao->nome ?></option>
                                                    <?php endforeach; ?>
                                                <?php else : ?>
                                                    <option value="0">Não Existe Nenhuma Instituição Disponível</option>
                                                <?php endif; ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label class="form-label">Senha: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <input class="form-control" type="password" name="senha">                                 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <label class="form-label">Repertir Senha: *</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <input class="form-control" type="password" name="repetirSenha">                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Selecione a foto: <small style="font-size: 10px;">Tamanho Ideal - 180 x 100</small></label>
                                    <div class="controls">
                                        <div class="input-with-icon right">
                                            <div class="form-control" >
                                                <input id="imagem" class="col-md-12" type="file" name="foto" id="foto" style="opacity: 0; position: relative;" />
                                                <label id="nomeimagem" class="form-label" style="font-size: 15px; position: absolute; margin-top: -35px;"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <label class="form-label">Lattes:</label>
                                    <div class="controls">
                                        <div class="input-with-icon right">                                       
                                            <i class=""></i>
                                            <input class="form-control" type="text" name="lattes" placeholder="http://...">                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="foto_fundo" value="/assets/img/usuarios/default_foto_fundo.png">    
                            <input type="hidden" name="aprovado" value="1">    
                            <input type="hidden" name="excluido" value="0">    
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <button id="btnSalvarUsuario" type="button" class="btn btn-success" hidden>Salvar</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- INICIO DOS FRAMEWORKS DE JAVASCRIPT -->
        <script src="/assets/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="/assets/plugins/pace/pace.min.js" type="text/javascript"></script>
        <!-- FIM DOS FRAMEWORKS DE JAVASCRIPT -->

        <script>
            //Submete o formulário de login
            $("#login-form").click(function () {
                $(".login-form").attr('action', '/social/serviceauth/logar');
                $(".login-form").submit();
            });
            $("#btnSalvarUsuario").click(function () {
                $("#formCadastrarUsuario").attr('action', '/social/usuario/inserir');
                $("#formCadastrarUsuario").submit();
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