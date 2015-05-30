<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url('/social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('/social/laboratorio/index') ?>">Laboratórios</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>   
            <a href="<?= base_url('/social/projeto/index') . '/' . $projeto[0]->id_laboratorio ?>">Projetos do <?= $projeto[0]->sigla_laboratorio ?></a>
        </li>     
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Descrição do <?= $projeto[0]->sigla ?></a>
        </li>                    
    </ul>
</div>

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

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4><?= $projeto[0]->nome ?> <b>(<?= $projeto[0]->sigla ?>)</b></h4>
                <div style="float: right;">
                    <?php if ($permissaoEditar) : ?>
                        <button id="editarProj" type="button" class="btn btn-default btn-xs btn-mini">
                            <i class="icon-wrench"></i>
                            &nbsp;&nbsp;Editar
                        </button>
                    <?php endif; ?>
                    <?php if ($permissaoExcluir) : ?>
                        <button id="excluirProj" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger btn-xs btn-mini">
                            <i class="icon-trash"></i>
                            &nbsp;&nbsp;Excluir
                        </button>
                    <?php endif; ?>
                </div>
            </div>
            <div class="grid-body ">
                <div class="row" style="margin-bottom: 20px;">
                    <div id="divLogo" class="form-group col-md-12" style="text-align: center;">
                        <?php if ($projeto[0]->logo != '/assets/img/grupo/projeto.jpg' && $permissaoEditar) : ?>
                            <div id="excluirLogo" class="excluirLogo">
                                <a href="#" data-toggle="modal" data-target="#modalExcluirFoto">
                                    <i class="icon-custom-cross botaoExcluirImagem"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                        <img id="logoAntiga" class="logoGrupo" src="<?= $projeto[0]->logo ?>">
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <div class="form-group col-md-12">
                        <h3><b>Laboratório:</b> <?= $projeto[0]->nome_laboratorio ?></h3>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <div class="form-group col-md-12">
                        <label class="form-label"><b>Descrição:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right" style="text-align: justify;">
                                <?= $projeto[0]->resumo ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <div class="form-group col-md-3">
                        <label class="form-label"><b>Processo:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= ($projeto[0]->processo) ? $projeto[0]->processo : '-' ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label"><b>Edital:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= ($projeto[0]->edital) ? $projeto[0]->edital : '-' ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label"><b>Data de Inicio:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= date('d/m/Y', strtotime($projeto[0]->inicio)) ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-3">
                        <label class="form-label"><b>Previsão de Termino:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= date('d/m/Y', strtotime($projeto[0]->termino)) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <div class="form-group col-md-4">
                        <label class="form-label"><b>Coordenador do Projeto:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= $projeto[0]->nome_coordenador ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label"><b>Responsável do Projeto:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= $projeto[0]->nome_responsavel ?>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label class="form-label"><b>Instituição Financiadora:</b></label>
                        <div class="controls">
                            <div class="input-with-icon right">
                                <?= $projeto[0]->nome_financiador ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <label class="form-label tituloFormularios"><b>Social:</b></label>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Url:</b>
                            <a href="<?= $projeto[0]->url ?>" target="_blanc"><?= ($projeto[0]->url) ? 'Site do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Facebook:</b>
                            <a href="<?= $projeto[0]->facebook ?>" target="_blanc"><?= ($projeto[0]->facebook) ? 'Facebook do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Google +:</b>
                            <a href="<?= $projeto[0]->googleplus ?>" target="_blanc"><?= ($projeto[0]->googleplus) ? 'Google+ do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Instagram:</b>
                            <a href="<?= $projeto[0]->instagram ?>" target="_blanc"><?= ($projeto[0]->instagram) ? 'Instagram do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Twitter:</b> 
                            <a href="<?= $projeto[0]->twitter ?>" target="_blanc"><?= ($projeto[0]->twitter) ? 'Twitter do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Liked-in:</b>
                            <a href="<?= $projeto[0]->likedin ?>" target="_blanc"><?= ($projeto[0]->likedin) ? 'Liked-in do ' . $projeto[0]->sigla : '-' ?></a>
                        </label>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <label class="form-label tituloFormularios"><b>Contatos:</b></label>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>E-mail:</b>
                            <a href="#"><?= ($projeto[0]->email) ? $projeto[0]->email : ' - ' ?></a>
                        </label>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label">
                            <b>Telefone:</b>
                            <?= ($projeto[0]->telefone) ? $projeto[0]->telefone : ' - ' ?>
                        </label>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <div class="form-group col-md-12">
                        <label class="form-label">
                            <b>Projeto Público:</b>
                            <?= ($projeto[0]->publico) ? 'Sim' : 'Não' ?>
                        </label>
                    </div>
                </div>
                <div class="row linhaInformacao">
                    <label class="form-label tituloFormularios"><b>Anexos:</b></label>
                    <?php if ($permissaoVisualizarAnexo) : ?>
                        <?php if (count($anexos) > 0) : ?>
                            <?php foreach ($anexos as $anexo) : ?>
                                <div class="form-group col-md-4">
                                    <div class="well well-small itemAnexo addtarefa" style="text-align: center;">
                                        <span>
                                            <a download href="<?= $anexo->localizacao ?>">
                                                <i class="icon-cloud-download"></i>&nbsp;&nbsp;
                                                <?= substr($anexo->nome, 0, 45) . ((strlen($anexo->nome) > 45) ? '...' : '') ?>
                                            </a>
                                            <?php if ($permissaoExcluirAnexo) : ?>
                                                <a class="excluirAnexo" href="#" data-toggle="modal" data-target="#modalExcluirAnexo">
                                                    <input class="nome" type="hidden" value="<?= substr($anexo->nome, 0, 45) ?>">
                                                    <input class="id" type="hidden" value="<?= $anexo->id ?>">
                                                    &nbsp;&nbsp;<i class="icon-custom-cross botaoExcluir"></i>
                                                </a>
                                            <?php endif; ?>
                                        </span>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    <?php else : ?>
                        <p class="paragrafoAviso">Desculpe, mas você não tem permissão para visualizar os anexos deste projeto!</p>
                    <?php endif; ?>
                    <?php if ($permissaoAdicionarAnexo) : ?>
                        <div id="inserirAnexo" class="form-group col-md-4" data-toggle="modal" data-target="#modalAnexo" style="margin-bottom: 1px; opacity: 0.5;">
                            <div class="well well-small" style="text-align: center;">
                                <span><i class="icon-plus"></i>&nbsp;&nbsp;Novo Anexo</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row vinculos">
    <div class="col-md-12">
        <div class="grid simple transparent">
            <div class="grid-title">
                <h4>Usuários Vinculados ao <span class="semi-bold"><?= $projeto[0]->sigla ?></span></h4>
            </div>
            <div class="grid-body">
                <?php if (count($usuariosProj) > 0) : ?>
                    <?php foreach ($usuariosProj as $usuarioProj) : ?>
                        <div class="col-sm-10 col-md-3">
                            <div class="thumbnail divVinculo">
                                <?php if ($permissaoDesvincularUsuario) : ?>
                                    <div class="botaoExcluirVinculo">
                                        <a class="botaoAtivarInativarVinculo" href="#" data-toggle="modal" data-target="#modalAtivarInativarVinculo">
                                            <input type="hidden" class="idVinculo" value="<?= $usuarioProj->id ?>">
                                            <input type="hidden" class="ativo" value="<?= $usuarioProj->ativo ?>">
                                            <input type="hidden" class="nomeUsuario" value="<?= $usuarioProj->nome_usuario ?>">
                                            &nbsp;&nbsp;<i class="<?= ($usuarioProj->ativo == 1) ? 'icon-eye-close' : 'icon-eye-open' ?>"></i>
                                        </a>
                                        <a class="desvincularUsuario" href="#" data-toggle="modal" data-target="#modalDesvincularUsuario">
                                            <input class="nome" type="hidden" value="<?= $usuarioProj->nome_usuario ?>">
                                            <input class="id" type="hidden" value="<?= $usuarioProj->id ?>">
                                            &nbsp;&nbsp;<i class="icon-custom-cross"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="fotoVinculo">
                                    <!-- Imagem de 180x150 -->
                                    <img src="<?= $usuarioProj->foto_usuario ?>">
                                </div>
                                <div class="caption nomeVinculo">
                                    <h3><?= $usuarioProj->nome_usuario ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($permissaoVincularUsuario) : ?>
                    <?php if (count($usuarios) > 0) : ?>
                        <div id="vincularUsuario" class="col-sm-10 col-md-3" data-toggle="modal" data-target="#modalusuario">
                            <div class="thumbnail vincular" id="vincularUsuarioContent">
                                <div class="fotoAddVinculo">
                                    <!-- Imagem de 180x150 -->
                                    <img src="/assets/img/usuarios/default_user.jpg">
                                </div>
                                <div class="caption nomeAddVinculo">
                                    <h3><i class="icon-plus"></i>&nbsp;&nbsp;Novo Usuário</h3>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="row vinculos">
    <div class="col-md-12">
        <div class="grid simple transparent">
            <div class="grid-title">
                <h4>Linhas de Pesquisa do <span class="semi-bold"><?= $projeto[0]->sigla ?></span></h4>
            </div>
            <div class="grid-body">
                <?php if (count($linhasPesquisaProjeto) > 0) : ?>
                    <?php foreach ($linhasPesquisaProjeto as $linhaPesquisaProjeto) : ?>
                        <div class="col-sm-10 col-md-3">
                            <div class="thumbnail" divVinculo>
                                <?php if (count($linhasPesquisaProjeto) != 1 && $permissaoDesvincularLinhaPesquisa) : ?>
                                    <div class="botaoExcluirVinculo">
                                        <a class="desvincularLinhaPesquisa" href="#" data-toggle="modal" data-target="#modalDesvincularLinhaPesquisa">
                                            <input class="linha" type="hidden" value="<?= $linhaPesquisaProjeto->linha ?>">
                                            <input class="id" type="hidden" value="<?= $linhaPesquisaProjeto->id ?>">
                                            &nbsp;&nbsp;<i class="icon-custom-cross"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="fotoVinculo">
                                    <i class="<?= $linhaPesquisaProjeto->icone ?>"></i>
                                </div>
                                <div class="caption nomeVinculo">
                                    <h3><?= $linhaPesquisaProjeto->linha ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($permissaoVincularLinhaPesquisa && count($linhasPesquisa) > 0) : ?>
                    <div id="VincularLinhaPesquisa" class="col-sm-10 col-md-3"data-toggle="modal" data-target="#modalVincularLinhaPesquisa">
                        <div id="VincularLinhaPesquisaContent" class="thumbnail vincular">
                            <div class="fotoAddVinculo">
                                <i class="icon-tags"></i>
                            </div>
                            <div class="caption nomeAddVinculo">
                                <h3><i class="icon-plus"></i>&nbsp;&nbsp;Linha de Pesquisa</h3>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>










<div class="modal fade" id="modalExcluirFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Logo</h4>
            </div>
            <div id="modalExcluirFotoContent" class="modal-body">
                Você tem certeza que deseja excluir a logo do projeto: <?= $projeto[0]->sigla ?>?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="excluirFoto" data="" type="button" class="btn btn-primary">Excluir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAnexo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Adicionar um Anexo</h4>
            </div>
            <div class="modal-body">
                <form id="formAnexo" action="/social/anexo/inserirAnexo" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Nome do Anexo:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="nome" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Selecione o Anexo:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <div class="form-control divImagem">
                                        <input id="imagem" class="col-md-12 inputImagem" type="file" name="anexo"/>
                                        <label id="nomeimagem" class="form-label labelImagem"></label>
                                    </div>
                                </div>
                            </div>
                            <label class="form-label">
                                <small>Extensoes Suportadas:</small>
                                <br>
                                <small>
                                    csv - bin - exe - psd - pdf - xls - zip -
                                    mpga - mp3 - gif - jpeg - jpg - jpe - png -
                                    txt - xsl - mpeg - mpg - avi - doc - docx
                                </small>
                            </label>
                        </div>
                    </div>
                    <input type="hidden" name="id_grupo" value="<?= $projeto[0]->id ?>">
                    <input type="hidden" name="excluido" value="0">
                    <input type="hidden" name="controller" value="projeto">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnAdicionarAnexo" type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalExcluirAnexo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Anexo</h4>
            </div>
            <div id="myModalExcluirAnexo" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formExcluirAnexo">
                    <input type="hidden" name="controller" value="projeto">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnExcluirAnexo" data="" type="button" class="btn btn-primary">Excluir</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalusuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Selecione um usuário para fazer parte do <?= $projeto[0]->sigla ?></h4>
            </div>
            <div class="modal-body">
                <form id="formUsuario" action="/social/usuario/vincularUsuario" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Usuários:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_usuario" style="width:100%">
                                        <?php if (count($usuarios) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <option value="<?= $usuario->id ?>"><?= $usuario->nome ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não existe nenhum usuário disponível!</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Perfil de Vínculo:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_perfil" style="width:100%">
                                        <?php if (count($perfis) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($perfis as $perfil) : ?>
                                                <option value="<?= $perfil->id ?>"><?= $perfil->perfil ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não existe nenhum tipo de vínculo disponível!</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_instituicao" value="<?= $projeto[0]->id ?>">
                    <input type="hidden" name="controller" value="projeto">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnVincularUsuario" type="button" class="btn btn-primary">Adicionar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDesvincularUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Desvincular Usuário</h4>
            </div>
            <div id="myModalDesvincularUsuarioContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formDesvincularUsuario">
                    <input type="hidden" name="controller" value="projeto">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnDesvincularUsuario" type="button" class="btn btn-primary" hidden>Desvincular</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalAtivarInativarVinculo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 id="ativarInativarVinculoTitulo" class="modal-title"></h4>
            </div>
            <div id="ativarInativarVinculoContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formAtivarInativarVinculo" action="/social/usuario/ativarInativarVinculo" method="post">
                    <input id="idVinculo" type="hidden" name="idVinculo">
                    <input id="ativo" type="hidden" name="ativo">
                    <input id="nomeUsuario" type="hidden" name="nomeUsuario">
                    <input type="hidden" name="idGrupo" value="<?= $projeto[0]->id ?>">
                    <input type="hidden" name="nomeGrupo" value="<?= $projeto[0]->nome ?>">
                    <input type="hidden" name="controller" value="projeto">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnAtivarInativarVinculo" type="button" class="btn btn-primary"></button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVincularLinhaPesquisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vincular Linha de Pesquisa</h4>
            </div>
            <div id="myModalVincularLinhaPesquisa" class="modal-body">
                <form id="formVincularLinhaPesquisa" action="/social/projeto/vincularLinhaPesquisaProjeto" method="post">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Linhas de Pesquisa:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select id="selectVinculoLinha" name="id_linha" style="width:100%">
                                        <option value="0">Selecione</option>
                                        <?php foreach ($linhasPesquisa as $linhaPesquisa) : ?>
                                            <option value="<?= $linhaPesquisa->id ?>"><?= $linhaPesquisa->linha ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_grupo" value="<?= $projeto[0]->id ?>">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnVincularLinhaPesquisa" type="button" class="btn btn-primary" hidden>Vincular</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalDesvincularLinhaPesquisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Desvincular Linha de Pesquisa</h4>
            </div>
            <div id="myModalDesvincularLinhaPesquisContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formDesvincularLinhaPesquisa" action="/social/projeto/desvincularLinhaPesquisaProjeto" method="post">
                    <input id="modalIdLinha" type="hidden" name="idVinculoLinha" value="">
                    <input id="modalLinha" type="hidden" name="linha" value="">
                    <input type="hidden" name="idGrupo" value="<?= $projeto[0]->id ?>">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnDesvincularLinhaPesquisa" type="button" class="btn btn-primary" hidden>Desvincular</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>

<script type="text/javascript">
    //Projeto
    //Redireciona o usuário para a página de edição
    $("#editarProj").click(function () {
        $(window.document.location).attr('href', '/social/projeto/editar/<?= $projeto[0]->id ?>');
    });
    //Popula o Modal de confirmação de exclusão
    $("#excluirProj").click(function () {
        $.ajax({
            url: "/social/projeto/verificaVinculadosDoProjeto",
            dataType: "json",
            data: {
                'idProj': <?= $projeto[0]->id ?>
            },
            success: function (mensagem) {
                $("#myModalTitulo").html("Excluir");
                $("#myModalTexto").html(mensagem.msg);
            }
        });
    });
    //Executa a função de exclusão
    $("#btnexcluir").click(function () {
        $(window.document.location).attr('href', '/social/projeto/excluir/<?= $projeto[0]->id ?>');
    });
    //Exclui a logo do projeto 
    $("#excluirFoto").click(function () {
        $.ajax({
            url: '/social/projeto/excluirfoto',
            dataType: 'json',
            data: {
                'idProj': <?= $projeto[0]->id ?>
            },
            success: function (sucesso) {
                if (sucesso.excluido == 1)
                {
                    $("#excluirLogo").remove();
                    $("#logoAntiga").remove();
                    $('#modalExcluirFoto').modal('hide');
                    $("#divLogo").html("<img src='/assets/img/grupo/projeto.jpg' style='max-width: 180px; max-height: 150px;'>");
                }
            }
        });
    });





    //Anexo
    //Efeito ao colocar o mouse em cima
    $("#inserirAnexo").mouseover(function () {
        $(this).css('opacity', '0.25');
    });
    //Efeito ao tirar o mouse de cima
    $("#inserirAnexo").mouseout(function () {
        $(this).css('opacity', '0.5');
    });
    //Executa a função de insersão
    $("#btnAdicionarAnexo").click(function () {
        $("#formAnexo").submit();
    });
    //Popula o modal de confirmação de exclusão
    $(".excluirAnexo").click(function () {
        var nomeAnexo = $(this).find(".nome").attr('value');
        idAnexo = $(this).find(".id").attr('value');
        $("#myModalExcluirAnexo").html("Você tem certeza que deseja excluir o "
                + " anexo: " + nomeAnexo + "?");
    });
    //Executa a função de exclusão
    $("#btnExcluirAnexo").click(function () {
        $("#formExcluirAnexo").attr('action', '/social/anexo/excluirAnexo/' + idAnexo);
        $("#formExcluirAnexo").submit();
    });





    //Usuário
    //Efeito ao colocar o mouse em cima
    $("#vincularUsuario").mouseover(function () {
        $("#vincularUsuarioContent").css('opacity', '0.25');
    });
    //Efeito ao tirar o mouse de cima
    $("#vincularUsuario").mouseout(function () {
        $("#vincularUsuarioContent").css('opacity', '0.5');
    });
    //Executa a função de vincular
    $("#btnVincularUsuario").click(function () {
        $("#formUsuario").submit();
    });
    $(".botaoAtivarInativarVinculo").click(function () {
        var ativo = $(this).find(".ativo").attr('value');
        var usuario = $(this).find(".nomeUsuario").attr('value');
        var idVinculo = $(this).find(".idVinculo").attr('value')
        $("#ativo").attr('value', ativo);
        $("#nomeUsuario").attr('value', usuario);
        $("#idVinculo").attr('value', idVinculo);
        $.ajax({
            url: '/social/usuario/verificaVinculoCoordOuResp',
            dataType: 'json',
            data: {
                'idProj': <?= $projeto[0]->id ?>,
                'idVinculo': idVinculo
            },
            success: function (resposta) {
                if (resposta.desvincular)
                {
                    $("#btnAtivarInativarVinculo").css('display', '');
                    if (ativo == 1)
                    {
                        $("#ativarInativarVinculoTitulo").html("Inativar Usuário");
                        $("#ativarInativarVinculoContent").html("Você tem certeza que deseja "
                                + " transformar o usuário " + usuario + " em um Alumni?");
                        $("#btnAtivarInativarVinculo").html("Inativar");
                    }
                    else
                    {
                        $("#ativarInativarVinculoTitulo").html("Ativar Usuário");
                        $("#ativarInativarVinculoContent").html("Você tem certeza que deseja "
                                + " reativar o usuario " + usuario + "?");
                        $("#btnAtivarInativarVinculo").html("Ativar");
                    }
                }
                else
                {
                    $("#ativarInativarVinculoTitulo").html("Inativar Usuário");
                    $("#btnAtivarInativarVinculo").css('display', 'none');
                    $("#ativarInativarVinculoContent").html(resposta.msg);
                }
            }
        });
    });
    $("#btnAtivarInativarVinculo").click(function () {
        $("#formAtivarInativarVinculo").submit();
    });
    //Popula o modal para desvincular
    $(".desvincularUsuario").click(function () {
        var nomeUsuario = $(this).find(".nome").attr('value');
        idVinculo = $(this).find(".id").attr('value');
        $.ajax({
            url: '/social/usuario/verificaVinculoCoordOuResp',
            dataType: 'json',
            data: {
                'idProj': <?= $projeto[0]->id ?>,
                'idVinculo': idVinculo
            },
            success: function (resposta) {
                if (resposta.desvincular)
                {
                    $("#btnDesvincularUsuario").css('display', '');
                    $("#myModalDesvincularUsuarioContent").html("Você tem certeza que deseja desvincular"
                            + " o usuário: " + nomeUsuario + "?");
                }
                else
                {
                    $("#btnDesvincularUsuario").css('display', 'none');
                    $("#myModalDesvincularUsuarioContent").html(resposta.msg);
                }
            }
        });
    });
    //Executa a função de desvincular
    $("#btnDesvincularUsuario").click(function () {
        $("#formDesvincularUsuario").attr('action', '/social/usuario/desvincularUsuario/' + idVinculo);
        $("#formDesvincularUsuario").submit();
    });





    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });





    //Linha de Pesquisa
    //Efeito ao colocar o mouse em cima
    $("#VincularLinhaPesquisa").mouseover(function () {
        $("#VincularLinhaPesquisaContent").css('opacity', '0.25');
    });
    //Efeito ao tirar o mouse de cima
    $("#VincularLinhaPesquisa").mouseout(function () {
        $("#VincularLinhaPesquisaContent").css('opacity', '0.5');
    });
    //Executa a função de vincular
    $("#btnVincularLinhaPesquisa").click(function () {
        $("#formVincularLinhaPesquisa").submit();
    });
    //Popula o modal para desvincular
    $(".desvincularLinhaPesquisa").click(function () {
        linhaPesquisa = $(this).find(".linha").attr('value');
        idLinhaPesquisa = $(this).find(".id").attr('value');
        $("#myModalDesvincularLinhaPesquisContent").html("Você tem certeza que deseja desvincular a "
                + " Linha de Pesquisa: " + linhaPesquisa + "?");
    });
    //Executa a função de desvincular
    $("#btnDesvincularLinhaPesquisa").click(function () {
        $("#modalIdLinha").attr('value', idLinhaPesquisa);
        $("#modalLinha").attr('value', linhaPesquisa);
        $("#formDesvincularLinhaPesquisa").submit();
    });
</script>