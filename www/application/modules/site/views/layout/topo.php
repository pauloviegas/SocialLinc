<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="pt"> <!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content ="text/html; charset=utf-8" />
        <link async rel="shortcut icon" href="<?= $url_base . 'assets/img/icon_linc.ico' ?>"/>
        <title><?= $alliasNomeProjeto ?></title>

        <link async href="<?= $url_base . 'assets/css/bootstrap.min.css' ?>" type="text/css" rel="stylesheet"/>
        <link async href="<?= $url_base . 'assets/css/sitestyle.css' ?>" type="text/css" rel="stylesheet"/>
        <link async href="<?= $url_base . 'assets/css/prettyPhoto.css' ?>" type="text/css" rel="stylesheet"/>
        <link href="<?= $url_base . 'assets/css/bs-preview.css' ?>" type="text/css" rel="stylesheet"/>

        <link href="<?= $url_base . 'assets/plugins/font-awesome/css/font-awesome.css' ?>" rel="stylesheet" type="text/css"/>

        <!--[if IE 7]>
        <link rel="stylesheet" href="assets/./public/css/font-awesome-ie7.css"/>
        <![endif]-->
        <!--[if lt IE 9]>
        <script type="text/javascript" src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <?php $controller = $this->uri->segment(2); ?>
        <!--top menu-->
        <section id="top-menu">
            <div class="container">
                <div class="row" style="text-align: center;">
                    <?= $alliasNomeProjeto ?>
                </div>
            </div>
        </section>
        <!--header-->
        <header id="header">
            <div class="container">
                <div class="row header-top">
                    <div class="span5 logo">
                        <a class="logo-img" href="<?= base_url('site/home/index') ?>" controller="index" title="responsive template">
                            <img src="<?= $url_base . 'assets/img/logo_linc.png' ?>" width="150" alt="Tabulate" style="margin-left: 50px;">
                        </a>
                        <p class="tagline" style="margin-top: 35px;">Laboratório de Inteligência Computacional e Pesquisa Operacional.</p>
                    </div>
                    <div class="span7 social-container" >
                        <p class="phone hidden-phone">
                            linc@ufpa.br
                        </p>
                        <p class="phone hidden-phone"> +55 (91) 3201-7870</p>
                        <div class="top-social">
                            <a data-original-title="Facebook" target="_blank" rel="tooltip" data-placement="top" class="facebook" href="http://www.facebook.com/linc.ufpa"></a>
                        </div>
                    </div>
                </div>
                <div class="row header-nav" style="margin-top: -20px;">
                    <div class="span12">
                        <nav id="menu" class="clearfix">
                            <ul>
                                <li class="<?= ($controller == 'home') ? 'current' : '' ?>">
                                    <a href="<?= base_url('site/home/index') ?>">
                                        <span class="name">Home</span>
                                    </a>
                                </li>
                                <li id="menuPesquisa" class="<?= ($controller == 'pesquisa') ? 'current' : '' ?>">
                                    <a href="<?= base_url('site/pesquisa/pesquisa') ?>"><span class="name">Pesquisa</span></a>
<!--                                    <ul id="subMenuPerquisa" style="display: none;">
                                        <li><a href="<?= base_url('site/pesquisa/linhas') ?>">Linhas de Pesquisa</a></li>
                                        <li><a href="<?= base_url('site/pesquisa/projetos') ?>">Projetos</a></li>
                                        <li><a href="<?= base_url('site/pesquisa/publicacoes') ?>">Publicações</a></li>
                                    </ul>-->
                                </li>
                                <!--                                <li id="menuMidia">
                                                                    <a href="#"><span class="name">Mídia</span></a>
                                                                    <ul id="subMenuMidia" style="display: none;">
                                                                        <li><a href="#">Códigos/Apps</a></li>
                                                                        <li><a href="#">Apresentações/MISC</a></li> 
                                                                    </ul>
                                                                </li>-->
                                <li class="<?= ($controller == 'noticia') ? 'current' : '' ?>">
                                    <a href="<?= base_url('site/noticia/index') ?>"><span class="name">Notícias</span></a>
                                </li>
<!--                                <li class="<?= ($controller == 'equipe') ? 'current' : '' ?>">
                                    <a href="<?= base_url('site/equipe/index') ?>"><span class="name" >Equipe</span></a>
                                </li>-->
                                <li class="<?= ($controller == 'contato') ? 'current' : '' ?>">
                                    <a href="<?= base_url('site/contato/index') ?>"><span class="name">Contato</span></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>
        <div id="main" style="min-height: 200px">
            <div class="container">