<?php
$visualisarUsuario = $this->viewPerfilAcaoModel->verificaPermissao('social/usuario/index', 1);
$visualisarFormacao = $this->viewPerfilAcaoModel->verificaPermissao('social/formacao/index', 1);
$visualisarPerfil = $this->viewPerfilAcaoModel->verificaPermissao('social/perfil/index', 1);
$visualisarAdmSistema = $this->viewPerfilAcaoModel->verificaPermissao('social/sistema/index', 1);
$visualisarLogs = $this->viewPerfilAcaoModel->verificaPermissao('social/log/index', 1);
$visualisarInstituicaoEnsino = $this->viewPerfilAcaoModel->verificaPermissao('social/instituicaoEnsino/index', 1);
$visualisarInstituicaoFinanciadora = $this->viewPerfilAcaoModel->verificaPermissao('social/instituicaoFinanciadora/index', 1);
?>

<!-- INICIO DA BARRA DE MENU LATERAL -->
<div class="page-container row-fluid"> 
    <!-- INICIO DO TOPO DE SAUDAÇÃO -->
    <div class="page-sidebar mini" id="main-menu">
        <div class="user-info-wrapper">
            <div class="profile-wrapper">
                <img src="<?= $url_base . $this->session->userdata('usuario')->foto ?>" width="69" height="69" /> </div>
            <div class="user-info">
                <div class="greeting">Bem-Vindo</div>
                <div class="username">
                    <?= ((!empty($nomeUsuarioLogado[0])) ? $nomeUsuarioLogado[0] : '') ?>
                    <span class="semi-bold">
                        <?= ((!empty($nomeUsuarioLogado[1])) ? $nomeUsuarioLogado[1] : '') ?>
                    </span>
                </div>
                <div class="status" style="height: 30px;">
                    <!--                    Status
                                        <a href="#">
                                            <div class="status-icon green"></div>
                                            Online
                                        </a>-->
                </div>
            </div>
        </div>
        <!-- FIM DO TOPO DE SAUDAÇÃO -->
        <!-- INICIO DO MENU LATERAL -->
        <ul>
            <li class="start active ">
                <a href="<?= base_url('social/home/index') ?>">
                    <i class="icon-comments-alt"></i>
                    <span class="title">Feed de Notícias</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <li class="start active ">
                <a href="<?= base_url('social/laboratorio/index') ?>">
                    <i class="icon-beaker"></i>
                    <span class="title">Laboratórios</span>
                    <span class="arrow"></span>
                </a>
            </li>
            <?php if ($visualisarUsuario || $visualisarFormacao || $visualisarPerfil || $visualisarAdmSistema) : ?>
                <li class="">
                    <a href="javascript:;">
                        <i class="icon-group"></i>
                        <span class="title">Gerência de Usuários</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if ($visualisarUsuario) : ?>
                            <li><a href="<?= base_url('social/usuario/index') ?>"><i class="icon-group"></i>Membros</a></li>
                        <?php endif; ?>
                        <?php if ($visualisarFormacao) : ?>
                            <li><a href="<?= base_url('social/formacao/index') ?>"><i class="icon-bookmark"></i>Formações Acadêmicas</a></li>
                        <?php endif; ?>
                        <?php if ($visualisarPerfil) : ?>
                            <li><a href="<?= base_url('social/perfil/index') ?>"><i class="icon-globe"></i>Perfis e Permissões</a></li>
                        <?php endif; ?>
                        <?php if ($visualisarAdmSistema) : ?>
                            <li><a href="<?= base_url('social/sistema/index') ?>"><i class="icon-briefcase"></i>Administradores do Sistema</a></li>
                        <?php endif; ?>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($visualisarLogs || $visualisarInstituicaoEnsino || $visualisarInstituicaoFinanciadora) : ?>
                <li class="">
                    <a href="javascript:;">
                        <i class="icon-wrench"></i>
                        <span class="title">Ferramentas</span>
                        <span class="arrow"></span>
                    </a>
                    <ul class="sub-menu">
                        <?php if ($visualisarLogs) : ?>
                            <li><a href="<?= base_url('social/log/index') ?>"><i class="icon-legal"></i>Log</a></li>
                        <?php endif; ?>
                        <?php if ($visualisarInstituicaoEnsino) : ?>
                            <li><a href="<?= base_url('social/instituicaoEnsino/index') ?>"><i class="icon-book"></i>Instituições de Ensino</a></li>
                        <?php endif; ?>
                        <?php if ($visualisarInstituicaoFinanciadora) : ?>
                            <li><a href="<?= base_url('social/instituicaoFinanciadora/index') ?>"><i class="icon-dollar"></i>Instituições Financiadoras</a></li>
                        <?php endif; ?>
                        <!--<li><a href="#"><i class="icon-folder-open-alt"></i>Tipos de Grupo</a></li>-->
                    </ul>
                </li>
            <?php endif; ?>
<!--            <li class="hidden-desktop hidden-phone visible-tablet" id="more-widgets" style="display:" >
                <a href="javascript:;"><i class="icon-ellipsis-horizontal"></i></a>
                <ul class="sub-menu">
                    <div class="side-bar-widgets">
                        <p class="menu-title">
                            FOLDER 
                            <span class="pull-right">
                                <a href="#" class="create-folder">
                                    <i class="icon-plus"></i>
                                </a>
                            </span>
                        </p>
                        <ul class="folders" id="folders">
                            <li>
                                <a href="#"><div class="status-icon green"></div>My quick tasks</a>
                            </li>
                            <li>
                                <a href="#"><div class="status-icon red"></div>To do list</a>
                            </li>
                            <li>
                                <a href="#"><div class="status-icon blue"></div>Projects</a>
                            </li>
                        </ul>
                    </div>
                </ul>
            </li>-->
        </ul>
        <!-- FIM DO DO MENU LATERAL -->
        <!-- INICIO BUTTON PARA IR PARA O TOPO -->
        <a href="#" class="scrollup to-edge">Scroll</a>
        <div class="clearfix"></div>
        <!-- FIM BUTTON PARA IR PARA O TOPO -->
        <!-- FIM DO DO MENU LATERAL -->
    </div>
    <!-- FIM DO TOPO DE SAUDAÇÃO -->

    <!-- INICIO DO CONTEÚDO DA PÁGINA -->
    <div class="page-content condensed"> 
        <div class="clearfix"></div>
        <div class="content">