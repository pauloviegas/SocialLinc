<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Programa de Coleta de Dados Anônimos para Analise de Mercado</title>

        <!-- Bootstrap Core CSS -->
        <link href="<?= base_url('application/views/') ?>/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="<?= base_url('application/views/') ?>/css/stylish-portfolio.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="<?= base_url('application/views/') ?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script>
            // This is called with the results from from FB.getLoginStatus().
            function statusChangeCallback(response) {
                console.log('statusChangeCallback');
                console.log(response);
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
                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
            }

            window.fbAsyncInit = function() {
                FB.init({
                    appId: '316011358589429',
                    cookie: true, // enable cookies to allow the server to access 
                    // the session
                    xfbml: true, // parse social plugins on this page
                    version: 'v2.1' // use version 2.1
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

                FB.getLoginStatus(function(response) {
                    statusChangeCallback(response);
                });
                FB.login(function(response) {
                    console.log("Login");
                }, {scope: 'email,user_likes,public_profile, user_friends,user_about_me,user_actions.books,user_actions.fitness,user_actions.music,user_actions.news,user_actions.video,user_activities,user_birthday,user_education_history,user_events,user_groups,user_games_activity,user_hometown,user_interests,user_likes,user_location,user_religion_politics,,user_status,user_tagged_places,user_website,user_work_history,read_friendlists,read_insights,read_mailbox,read_page_mailboxes,read_stream'});

            };

            // Load the SDK asynchronously
            (function(d, s, id) {
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
                console.log('Welcome!  Fetching your information.... ');
                FB.api('/me', function(response) {
                    console.log('Successful login for: ' + response.name);
                    console.log(response);
                    document.getElementById('status').innerHTML =     'Thanks for logging in, ' + response.name + '!';
                });
            }
        </script>

    </head>

    <body>

        <!-- Navigation -->
        <a id="menu-toggle" href="#" class="btn btn-dark btn-lg toggle"><i class="fa fa-bars"></i></a>
        <nav id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <a id="menu-close" href="#" class="btn btn-light btn-lg pull-right toggle"><i class="fa fa-times"></i></a>
                <li class="sidebar-brand">
                    <a href="#top">Menu</a>
                </li>
                <li>
                    <a href="#top">Início</a>
                </li>
                <li>
                    <a href="#about">Quem Somos?</a>
                </li>
                <li>
                    <a href="#services">Como meus dados serão utilizados?</a>
                </li>
                <li>
                    <a href="#portfolio">Porque Participar?</a>
                </li>
                <li>
                    <a href="#participar">Participar !</a>
                </li>
                <li>
                    <a href="#contact">Contato</a>
                </li>
            </ul>
        </nav>

        <!-- Header -->
        <header id="top" class="header">
            <div class="text-vertical-center">
                <h1>Coleta de Dados Anônimos para Análise de Mercado</h1>
                <h3>Laboratório de Inteligência Computacional e Pesquisa Operacional - LINC</h3>
                <br>
                <a href="#about" class="btn btn-dark btn-lg">Vou Pensar</a>
                <a href="#participar" class="btn btn-dark btn-lg">Desejo Participar !</a>
            </div>
        </header>

        <!-- About -->
        <section id="about" class="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2>Quem Somos?</h2>
                        <p class="lead">Esta equipe é composta de membros do <a target="_blank" href="http://linc.ufpa.br">LINC</a>, Laboratório de Pesquisa e Desenvolvimento focado principalmente na área de Inteligência Computacional, que possui interesses especificos no Domínio da Análise de Mercado baseada em Redes Sociais. </br> Atualmente Coordenado pelo <a target="_blank" href="http://lattes.cnpq.br/4073088744952858">Prof.Dr. Ádamo Lima de Santana</a></p>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- Services -->
        <!-- The circle icons use Font Awesome's stacked icon classes. For more information, visit http://fontawesome.io/examples/ -->
        <section id="services" class="services bg-primary">
            <div class="container">
                <div class="row text-center ">
                    <div class="col-lg-10 col-lg-offset-1">
                        <h2>Como Meus Dados Serão Utilizados?</h2>
                        <hr class="small">
                        <div class="row" onshow="$('.row').fadeIn(1000)">
                            <div class="col-md-3 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-cloud fa-stack-1x text-primary"></i>
                                    </span>
                                    <h4>
                                        <strong>Facebook API</strong>
                                    </h4>
                                    <p>Usando as informações Públicas e Privadas </p>
                                    <a href="#" class="btn btn-light">Ler Mais</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-shield fa-stack-1x text-primary"></i>
                                    </span>
                                    <h4>
                                        <strong>Anonimização</strong>
                                    </h4>
                                    <p>Os dados obtidos passam por um processo de anonimização removendo dados que liguem a pessoa ao dado.</p>
                                    <a href="#" class="btn btn-light">Ler Mais</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-flask fa-stack-1x text-primary"></i>
                                    </span>
                                    <h4>
                                        <strong>Descoberta de Conhecimento</strong>
                                    </h4>
                                    <p>Processo responsável por reconhecer padrões e extrair conhecimento dos dados anônimos.</p>
                                    <a href="#" class="btn btn-light">Ler Mais</a>
                                </div>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <div class="service-item">
                                    <span class="fa-stack fa-4x">
                                        <i class="fa fa-circle fa-stack-2x"></i>
                                        <i class="fa fa-area-chart fa-stack-1x text-primary"></i>
                                    </span>
                                    <h4>
                                        <strong>Produção Científica e Disponibilização dos Resultados</strong>
                                    </h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                    <a href="#" class="btn btn-light">Ler Mais</a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.col-lg-10 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- Callout -->
        <aside class="callout">
            <div class="text-vertical-center">
                <h1>Planejamento do Projeto</h1>
                <div class="table-responsive">
                    <table class="table" >
                        <thead >
                        <th style="text-align: center"><h3>Atividade</h3></th>
                        <th style="text-align: center"><h3>Janeiro</h3></th>
                        <th style="text-align: center"><h3>Fevereiro</h3></th>
                        <th style="text-align: center"><h3>Março</h3></th>
                        <th style="text-align: center"><h3>Abril</h3></th>
                        <th style="text-align: center"><h3>Maio</h3></th>
                        <th style="text-align: center"><h3>Junho</h3></th>
                        <th style="text-align: center"><h3>Julho</h3></th>
                        <th style="text-align: center"><h3>Agosto</h3></th>
                        <th style="text-align: center"><h3>Setembro</h3></th>
                        <th style="text-align: center"><h3>Outubro</h3></th>
                        <th style="text-align: center"><h3>Novembro</h3></th>
                        <th style="text-align: center"><h3>Dezembro</h3></th>
                        <th style="text-align: center"><h1>&infin;</h1></th>
                        </thead>
                        <tbody>
                            <tr>
                                <td><h4>Desenvolvimento da Aplicação WEB</h4></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td><h4>Coleta de Dados e Anonimização</h4></td>
                                <td><b></b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td><h4>Descoberta de Conhecimento</h4></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                            </tr>
                            <tr>
                                <td><h4>Produção Científica</h4></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b></td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                            </tr>
                            <tr>
                                <td><h4>Disponibilização Gratuita dos Dados Anônimos</h4></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b></td>
                                <td><b></b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                                <td><b>X</b> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </aside>

        <!-- Portfolio -->
        <section id="portfolio" class="portfolio">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center">
                        <h2>Our Work</h2>
                        <hr class="small">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="portfolio-item">
                                    <a href="#">
                                        <img class="img-portfolio img-responsive" src="<?= base_url('application/views/') ?>/img/portfolio-1.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio-item">
                                    <a href="#">
                                        <img class="img-portfolio img-responsive" src="<?= base_url('application/views/') ?>/img/portfolio-2.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio-item">
                                    <a href="#">
                                        <img class="img-portfolio img-responsive" src="<?= base_url('application/views/') ?>/img/portfolio-3.jpg">
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="portfolio-item">
                                    <a href="#">
                                        <img class="img-portfolio img-responsive" src="<?= base_url('application/views/') ?>/img/portfolio-4.jpg">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <!-- /.row (nested) -->
                        <a href="#" class="btn btn-dark">View More Items</a>
                    </div>
                    <!-- /.col-lg-10 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container -->
        </section>

        <!-- Call to Action -->
        <section id="participar" class="participar">
            <aside class="call-to-action bg-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <h3>Eu Quero Participar!</h3>
                            <div class="span2">
                                <a href="#" class="btn btn-lg btn-dark"  data-toggle="modal" data-target="#myModal">Participar</a>
                                <br>

                            </div>
                            <div id="status">
                            </div>
                            <!--                            <div
                                                            class="fb-like"
                                                            data-share="true"
                                                            data-width="450"
                                                            data-show-faces="true">
                                                        </div>-->

                            <!--<a href="#" class="btn btn-lg btn-dark">Look at Me!</a>-->
                        </div>
                    </div>
                </div>
            </aside>
        </section>
        <!-- Map -->
        <section id="contact" class="map">
            <iframe width="100%" height="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1994.2488610594876!2d-48.45204202580031!3d-1.4742067804184402!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x92a48d9629a0965f%3A0xaa010782d48cb566!2sUFPA-Campus+Profissional!5e0!3m2!1spt-BR!2sbr!4v1421048137355" width="600" height="450" frameborder="0" style="border:0"></iframe>
            <br />
            <small>
                <a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=LINC,+Inc.,+Market+Street,+San+Francisco,+CA&amp;aq=0&amp;oq=LINC&amp;sll=28.659344,-81.187888&amp;sspn=0.128789,0.264187&amp;ie=UTF8&amp;hq=LINC,+Inc.,+Market+Street,+San+Francisco,+CA&amp;t=m&amp;z=15&amp;iwloc=A"></a>
            </small>
            </iframe>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 col-lg-offset-1 text-center">
                        <h4><strong>Contato</strong>
                        </h4>
                        <p>UFPA - Campus Profissional<br>Predio de Engenharia Elétrica, Sala 9</p>
                        <ul class="list-unstyled">
                            <li><i class="fa fa-phone fa-fw"></i> (91) 3201-7870</li>
                            <li><i class="fa fa-envelope-o fa-fw"></i>  <a href="mailto:name@example.com">luizcf14@gmail.com</a>
                            </li>
                        </ul>
                        <br>
                        <ul class="list-inline">
                            <li>
                                <a href="#"><i class="fa fa-facebook fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-twitter fa-fw fa-3x"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-dribbble fa-fw fa-3x"></i></a>
                            </li>
                        </ul>
                        <hr class="small">
                        <p class="text-muted"> LINC - 2015</p>
                    </div>
                </div>
            </div>
        </footer>

        <!-- jQuery -->
        <script src="<?= base_url('application/views/') ?>/js/jquery.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="<?= base_url('application/views/') ?>/js/bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script>
            // Closes the sidebar menu
            $("#menu-close").click(function(e) {
                e.preventDefault();
                $("#sidebar-wrapper").toggleClass("active");
            });

            // Opens the sidebar menu
            $("#menu-toggle").click(function(e) {
                e.preventDefault();
                $("#sidebar-wrapper").toggleClass("active");
            });

            // Scrolls to the selected menu item on the page
            $(function() {
                $('a[href*=#]:not([href=#])').click(function() {
                    if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                        var target = $(this.hash);
                        target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                        if (target.length) {
                            $('html,body').animate({
                                scrollTop: target.offset().top
                            }, 1000);
                            return false;
                        }
                    }
                });
            });
        </script>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Termo de Privacidade</h4>
                    </div>
                    <div class="modal-body">
                        <h2>Informações que coletamos</h2>
                        Coletamos informações para fornecer serviços melhores a todos os nossos usuários, desde descobrir coisas básicas, como o idioma que eles falam, até coisas mais complexas, como anúncios que o usuário pode considerar mais úteis, as pessoas on-line que são mais importantes para o usuário ou os vídeos do YouTube dos quais o usuário poderá gostar.
                        <br>
                        Coletamos informações de duas maneiras:<br>
                        Informações fornecidas pelo usuário. Por exemplo, muitos de nossos serviços exigem a inscrição em uma Conta do Google. Quando o usuário abre essa conta, pedimos informações pessoais, como nome, endereço de e-mail, número de telefone ou cartão de crédito. Se o usuário quiser aproveitar ao máximo os recursos de compartilhamento que oferecemos, podemos também pedir-lhe para criar um Perfil do Google publicamente visível, que pode incluir nome e foto.
                        <br>
                        Coletamos informações específicas de dispositivos (por exemplo, modelo de hardware, versão do sistema operacional, identificadores exclusivos de produtos e informações de rede móvel, inclusive número de telefone). A Google pode associar identificadores de dispositivo ou número de telefone à Conta do Google do usuário.
                        <br>
                        Informações de registro
                        <br>
                        Quando o usuário concorda em ser colaborador, nós coletamos e armazenamos automaticamente algumas informações em registros do servidor. Isso inclui:
                        <br>
                        Detalhes de como o usuário utilizou nosso serviço, como suas consultas de pesquisas, compartilhamentos, lista de amigos, comunidades e comentarios.
                        <br>
                        Endereço de protocolo de Internet (IP)<br>
                        informações de evento de dispositivo como problemas, atividade de sistema, configurações de hardware, tipo de navegador, idioma do navegador, data e horário de sua solicitação e URL de referência.
                        <br>
                        Informações do local:
                        Quando o usuário concorda em ser colaborador, podemos coletar e processar informações sobre a localização real. Além disso, usamos várias tecnologias para determinar o local, como endereço IP, GPS e outros sensores que podem, por exemplo, fornecer informações sobre dispositivos.
                        <br>
                        Nós, usamos várias tecnologias para coletar e armazenar informações quando o usuário se torna um colaborador. Tais informações podem incluir o envio de um ou mais cookies ou identificadores anônimos para o dispositivo do usuário. .
                        <br>
                        Como usamos as informações que coletamos:
                        <br>
                        Usamos as informações que coletamos de forma anonima objetivando a busca e extração de conhecimentos relevantes à pesquisas de cunho cientifico,tendo como foco principal a Analise de Mercado por meio de Social Media.
                        <br>
                        Após data especifica todos os dados serão disponibilizados gratuitamente atravez do site, conforme conta no cronograma deste projeto.
                        <br>
                        Podemos usar o nome que o usuário fornece em seu Perfil do Google em todos os serviços que oferecemos e que exijam uma Conta do Google. Além disso, podemos substituir seus nomes antigos associados com sua Conta do Google de modo que o usuário esteja representado de maneira consistente em todos nossos serviços. Se outras pessoas já tiverem o e-mail ou outras informações que identifiquem o usuário, nós podemos mostrar-lhes estas informações do Perfil do Google que são publicamente visíveis (como nome e foto).

                        Se o usuário tem uma Conta do Google, o nome e a foto do perfil, bem como as ações realizadas em aplicativos do Google ou de terceiros que estejam conectados a essa Conta do Google (como marcações +1, avaliações e comentários postados), podem aparecer nos nossos serviços, inclusive para exibição em anúncios e em outros contextos comerciais. Respeitamos as opções de compartilhamento limitado ou configurações de visibilidade que o usuário faz para a Conta do Google.

                        Quando o usuário entra em contato com a Google, mantemos um registro da comunicação para ajudar a resolver qualquer problema que ele possa estar enfrentando. Podemos usar o endereço de e-mail do usuário para informar a ele sobre nossos serviços, por exemplo, as próximas mudanças ou melhorias.

                        Usamos as informações coletadas de cookies e de outras tecnologias, como etiquetas de pixel, para melhorar a experiência do usuário e a qualidade geral dos nossos serviços. Um dos produtos que usamos para fazer isso com nossos próprios serviços é o Google Analytics. Por exemplo, quando o usuário salva suas preferências de idioma, nossos serviços aparecem no idioma que o usuário escolhe. Quando exibimos anúncios personalizados, não associamos cookies de navegador ou identificadores anônimos a categorias de questões sensíveis, como aquelas baseadas em raça, religião, orientação sexual ou saúde.

                        Nossos sistemas automatizados analisam o conteúdo do usuário (incluindo e-mails) para fornecer recursos de produtos relevantes ao usuário, como, por exemplo, resultados de pesquisa e propaganda personalizados e detecção de spam e malware.

                        Podemos combinar informações pessoais de um serviço com informações, inclusive informações pessoais, de outros serviços da Googlepara facilitar o compartilhamento de informações com pessoas que o usuário conhece, por exemplo. Não combinaremos informações do cookie da "DoubleClick" com informações de identificação pessoal, exceto se tivermos autorização do usuário (“opt-in”) para tanto.

                        Solicitaremos sua autorização antes de usar informações para outros fins que não os definidos nesta Política de Privacidade.

                        A Google processa informações pessoais em nossos servidores de muitos países do mundo. Podemos processar as informações pessoais do usuário em um servidor localizado fora do país em que este vive.
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                        <fb:login-button  class="btn btn-default"  scope="public_profile,email" onlogin="checkLoginState();">
                            <a href="#">Eu Concordo</a>
                        </fb:login-button>
                    </div>
                </div>
            </div>
        </div>

    </body>

</html>
