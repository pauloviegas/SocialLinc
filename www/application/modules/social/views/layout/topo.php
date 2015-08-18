<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<!-- INICIO DA HEAD -->
<head>
    <!-- INICIO DAS CONFIGURAÇÕES -->
    <meta charset="utf-8" />
    <title><?= $nomeProjeto ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- FIM DAS CONFIGURAÇÕES -->

    <!-- INICIO FAVICO LINC -->
    <link href="<?= $url_base . 'assets/img/icon_logo_linc.ico' ?>" rel="shortcut icon">
    <!-- FIM FAVICO LINC -->

    <!-- INICIO DOS FRAMEWORKS DE CSS -->
    <link href="<?= $url_base . 'assets/plugins/jquery-slider/css/jquery.sidr.light.css' ?>" rel="stylesheet" type="text/css" media="screen"/>
    <link href="<?= $url_base . 'assets/plugins/boostrapv3/css/bootstrap.min.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/plugins/boostrapv3/css/bootstrap-theme.min.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/plugins/font-awesome/css/font-awesome.css' ?>" rel="stylesheet" type="text/css"/>
    <!-- FIM DOS FRAMEWORKS DE CSS -->

    <!-- INICIO DOS CSS DE PAGINAS -->
    <link href="<?= $url_base . 'assets/css/estilo_datepicker.css' ?>" rel="Stylesheet" type="text/css" />
    <!-- FIM DOS CSS DE PAGINAS -->

    <!-- INICIO DOS CSS -->
    <link href="<?= $url_base . 'assets/css/animate.min.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/css/style.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/css/responsive.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/css/custom-icon-set.css' ?>" rel="stylesheet" type="text/css"/>
    <link href="<?= $url_base . 'assets/css/estiloLinc.css' ?>" rel="stylesheet" type="text/css"/>
    <!-- FIM DOS CSS -->
</head>
<!-- FIM DA HEAD -->

<!-- INICIO BODY -->
<body class="">
    <!-- INICIO DO CABECAÇALHO DO BODY -->
    <div class="header navbar navbar-inverse "> 
        <!-- INICIO DA BARRA DE NAVEGAÇÃO SUPERIOR -->
        <div class="navbar-inner">
            <!-- INICIO DO MENU DE NAVEGAÇÃO SUPERIOR RESPONSIVO -->
            <div class="header-seperation" style="display:none"> 
                <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">	
                    <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" > <div class="iconset top-menu-toggle-white"></div> </a> </li>		 
                </ul>
                <a href="<?= base_url('social/home/index') ?>" style="text-align: center;">
                    <img src="<?= $url_base . 'assets/img/logo_linc.png' ?>" class="logo" width="50" height="30"/>
                </a>
                <ul class="nav pull-right notifcation-center">	
                    <li class="dropdown" id="header_task_bar">
                        <a href="<?= base_url('social/home/index') ?>" class="dropdown-toggle active" data-toggle="">
                            <div class="iconset top-home"></div>
                        </a>
                    </li>
                    <!--                    <li class="dropdown" id="header_inbox_bar" > 
                                            <a href="email.html" class="dropdown-toggle" > 
                                                <div class="iconset top-messages"></div>  
                                                <span class="badge" id="msgs-badge">2</span> 
                                            </a>
                                        </li>-->
                    <li class="dropdown" id="portrait-chat-toggler" style="display:none"> 
                        <a href="#sidr" class="chat-menu-toggle"> 
                            <div class="iconset top-chat-white "></div> 
                        </a> 
                    </li>        
                </ul>
            </div>
            <!-- FIM DO MENU DE NAVEGAÇÃO SUPERIOR RESPONSIVO -->
            <!-- INICIO DO MENU DE NAVEGAÇÃO SUPERIOR --> 
            <div class="header-quick-nav" > 
                <!-- INICIO DA BARRA DE NAVEGAÇÃO SUPERIOR ESQUERDO -->
                <div class="pull-left"> 
                    <ul class="nav quick-section">
                        <li class="quicklinks">
                            <a href="#" class="" id="layout-condensed-toggle" >
                                <div class="iconset top-menu-toggle-dark"></div>
                            </a>
                        </li>        
                    </ul>
                    <!--                    <ul class="nav quick-section">
                                            <li class="quicklinks">
                                                <a href="#" class="" >
                                                    <div class="iconset top-reload"></div>
                                                </a>
                                            </li> 
                                            <li class="quicklinks">
                                                <span class="h-seperate"></span>
                                            </li>
                                            <li class="quicklinks">
                                                <a href="#" class="" >
                                                    <div class="iconset top-tiles"></div>
                                                </a> 
                                            </li>
                                            <div class="input-prepend inside search-form no-boarder">
                                                <span class="add-on">
                                                    <a href="#" class="" >
                                                        <div class="iconset top-search">
                                                        </div>
                                                    </a></span>
                                                <input name="" type="text"  class="no-boarder " placeholder="Digite aqui sua pesquisa" style="width:250px;">
                                            </div>
                                        </ul>-->
                </div>
                <!-- FIM DA BARRA DE NAVEGAÇÃO SUPERIOR ESQUERDO -->
                <!-- INICIO DA BARRA DE NAVEGAÇÃO SUPERIOR DIREITO -->
                <div class="pull-right"> 
                    <div class="chat-toggler">
                        <!--                        <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom" 
                                                   data-content='
                                                   <div style="width:300px" class="scroller" data-height="100px">
                                                   <div class="notification-messages info">
                                                   <div class="user-profile">
                                                   <img src="/assets/img/profiles/d.jpg" data-src="/assets/img/profiles/d.jpg" data-src-retina="/assets/img/profiles/d2x.jpg" width="35" height="35">
                                                   </div>
                                                   <div class="message-wrapper">
                                                   <div class="heading">
                                                   David Nester - Commented on your wall
                                                   </div>
                                                   <div class="description">
                                                   Meeting postponed to tomorrow
                                                   </div>
                                                   <div class="date pull-left">
                                                   A min ago
                                                   </div>										
                                                   </div>
                                                   <div class="clearfix"></div>	
                                                   ' data-toggle="dropdown" data-original-title="Notificações">-->
                        <div class="user-details" style="margin-right: 10px;"> 
                            <div class="username">
                                <!--<span class="badge badge-important">1</span>-->
                                <?= ((!empty($nomeUsuarioLogado[0])) ? $nomeUsuarioLogado[0] : '') ?>
                                <span class="bold">
                                    <?= ((!empty($nomeUsuarioLogado[1])) ? $nomeUsuarioLogado[1] : '') ?>
                                </span>
                            </div>						
                        </div> 
                        <!--<div class="iconset top-down-arrow"></div>-->
                        <div class="profile-pic">
                            <img alt="" src="<?= $url_base . $this->session->userdata('usuario')->foto ?>" width="35" height="35" /> 
                        </div>
                    </div>
                    <ul class="nav quick-section ">
                        <li class="quicklinks"> 
                            <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                                <div class="iconset top-settings-dark "></div> 	
                            </a>
                            <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="dropdownMenu">
                                <li>
                                    <a href="<?= base_url('social/usuario/perfil') ?>"><i class="icon-user"></i>&nbsp;&nbsp;Perfil</a>
                                </li>
                                <!--                                <li>
                                                                    <a href="#"><i class="icon-calendar"></i>&nbsp;&nbsp;Agenda</a>
                                                                </li>-->
                                <li class="divider"></li>                
                                <li>
                                    <a href="<?= base_url('social/serviceauth/logout') ?>"><i class="icon-off"></i>&nbsp;&nbsp;Sair</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- FIM DA BARRA DE NAVEGAÇÃO SUPERIOR DIREITO -->
            </div> 
            <!-- FIM DO MENU DE NAVEGAÇÃO SUPERIOR --> 
        </div>
        <!-- FIM DA BARRA DE NAVEGAÇÃO SUPERIOR --> 
    </div>
    <!-- FIM DO CABECAÇALHO DO BODY --> 
