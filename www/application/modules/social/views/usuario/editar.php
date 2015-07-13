<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  
        <li>   
            <a href="<?= base_url('social/usuario/index') ?>">Membros</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Editar</a>
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
                <h4>Editar informações - <?= $usuario[0]->nome ?></h4>
            </div>
            <div class="grid-body ">
                <form id="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Nome do Usuário: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="nome" value="<?= ($usuario[0]->nome) ? $usuario[0]->nome : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Formação: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_formacao" style="width:100%">
                                        <?php if (count($formacoes) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($formacoes as $formacao) : ?>
                                                <option value="<?= $formacao->id ?>" <?= ($usuario[0]->id_formacao == $formacao->id) ? 'selected' : '' ?>><?= $formacao->formacao ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não Existe Nenhum Título Disponível</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Instituição: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_instituicao" style="width:100%">
                                        <?php if (count($instituicoes) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($instituicoes as $instituicao) : ?>
                                                <option value="<?= $instituicao->id ?>" <?= ($usuario[0]->id_instituicao == $instituicao->id) ? 'selected' : '' ?>><?= $instituicao->nome ?></option>
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
                        <div class="form-group col-md-9">
                            <label class="form-label">E-mail para Contato: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="email" value="<?= ($usuario[0]->email) ? $usuario[0]->email : '' ?>" placeholder="exemplo@exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3" style="margin-top: 25px; text-align: center;">
                            <label class="form-label">Membro Aprovado ?</label>
                            <div class="radio radio-success">
                                <input id="yes" type="radio" name="aprovado" value="1" <?= ($usuario[0]->aprovado) ? 'checked' : '' ?>>
                                <label for="yes">Sim</label>
                                <input id="no" type="radio" name="aprovado" value="0" <?= ($usuario[0]->aprovado) ? '' : 'checked' ?>>
                                <label for="no">Não</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Selecione a foto: <small style="font-size: 10px;">Tamanho Ideal - 180 x 100</small></label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <div class="form-control divImagem" >
                                        <input id="imagem" class="col-md-12 inputImagem" type="file" name="foto"/>
                                        <label id="nomeimagem" class="form-label labelImagem"></label>
                                    </div>
                                </div>
                                <?php if ($usuario[0]->foto != '/assets/img/usuarios/default_user.jpg') : ?>
                                    <div id="foto" class="imagemEdicao">
                                        <img src="<?= $url_base . $usuario[0]->foto ?>" width="50">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Lattes:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="lattes" value="<?= ($usuario[0]->lattes) ? $usuario[0]->lattes : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ($permissaoAlterarSenhautrosUsuarios && $usuario[0]->id != $this->session->userdata('usuario')->id) : ?>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label class="form-label">Nova Senha:</label>
                                <div class="controls">
                                    <div class="input-with-icon right">                                       
                                        <i class=""></i>
                                        <input class="form-control" type="password" name="novaSenha" placeholder="*****">                                 
                                    </div>
                                </div>
                            </div>
                            <div class="form-group col-md-4">
                                <label class="form-label">Repetir Nova Senha:</label>
                                <div class="controls">
                                    <div class="input-with-icon right">                                       
                                        <i class=""></i>
                                        <input class="form-control" type="password" name="repetirNovaSenha" placeholder="*****">                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?= $usuario[0]->id ?>">
                                    <button id="btnsalvar" type="button" class="btn btn-primary btn-cons">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row vinculos">
    <div class="col-md-12">
        <div class="grid simple transparent">
            <div class="grid-title">
                <h4>Linhas de Pesquisa do <span class="semi-bold"><?= $usuario[0]->nome ?></span></h4>
            </div>
            <div class="grid-body">
                <?php if (count($linhasPesquisaUsuario) > 0) : ?>
                    <?php foreach ($linhasPesquisaUsuario as $linhaPesquisaUsuario) : ?>
                        <div class="col-sm-10 col-md-3">
                            <div class="thumbnail divVinculo">
                                <?php if (count($linhasPesquisaUsuario) != 1 && $permissaoDesvincularLinhaPesquisa) : ?>
                                <div class="botaoExcluirVinculo">
                                        <a class="desvincularLinhaPesquisa" href="#" data-toggle="modal" data-target="#modalDesvincularLinhaPesquisa">
                                            <input class="linha" type="hidden" value="<?= $linhaPesquisaUsuario->linha ?>">
                                            <input class="id" type="hidden" value="<?= $linhaPesquisaUsuario->id ?>">
                                            &nbsp;&nbsp;<i class="icon-custom-cross"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="fotoVinculo">
                                    <i class="<?= $linhaPesquisaUsuario->icone ?>"></i>
                                </div>
                                <div class="caption nomeVinculo">
                                    <h3><?= $linhaPesquisaUsuario->linha ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($permissaoVincularLinhaPesquisa && count($linhasPesquisa) > 0) : ?>
                    <div id="VincularLinhaPesquisa" class="col-sm-10 col-md-3" data-toggle="modal" data-target="#modalVincularLinhaPesquisa">
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

<div class="modal fade" id="modalVincularLinhaPesquisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Vincular Usuário</h4>
            </div>
            <div id="myModalVincularLinhaPesquisa" class="modal-body">
                <form id="formVincularLinhaPesquisa">
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
                    <input type="hidden" name="id_usuario" value="<?= $usuario[0]->id ?>">
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
                <h4 class="modal-title">Desvincular Usuário</h4>
            </div>
            <div id="myModalDesvincularLinhaPesquisContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formDesvincularLinhaPesquisa">
                    <input id="modalIdLinha" type="hidden" name="idVinculoLinha" value="">
                    <input id="modalLinha" type="hidden" name="linha" value="">
                    <input type="hidden" name="idUsuario" value="<?= $usuario[0]->id ?>">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnDesvincularLinhaPesquisa" type="button" class="btn btn-primary" hidden>Desvincular</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>

<script type="text/javascript">
    $("#btnsalvar").click(function () {
        $("#form").attr('action', '<?= base_url('social/usuario/alterarPerfil') ?>');
        $("#form").submit();
    });
    $("#excluirFoto").click(function () {
        $.ajax({
            url: '<?= base_url('social/usuario/excluirFoto') ?>',
            dataType: 'json',
            data: {
                'idUsuario': <?= $usuario[0]->id ?>
            },
            success: function (sucesso) {
                if (sucesso.excluido == 1)
                {
                    $("#foto").remove();
                }
            }
        });
    });
    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });






    $("#VincularLinhaPesquisa").mouseover(function () {
        $("#VincularLinhaPesquisaContent").css('opacity', '0.25');
    });
    $("#VincularLinhaPesquisa").mouseout(function () {
        $("#VincularLinhaPesquisaContent").css('opacity', '0.5');
    });
    $(".desvincularLinhaPesquisa").click(function () {
        linhaPesquisa = $(this).find(".linha").attr('value');
        idLinhaPesquisa = $(this).find(".id").attr('value');
        $("#myModalDesvincularLinhaPesquisContent").html("Você tem certeza que deseja desvincular a "
                + " Linha de Pesquisa: " + linhaPesquisa + "?");
    });
    $("#btnDesvincularLinhaPesquisa").click(function () {
        $("#modalIdLinha").attr('value', idLinhaPesquisa);
        $("#modalLinha").attr('value', linhaPesquisa);
        $("#formDesvincularLinhaPesquisa").attr('action', '<?= base_url('social/usuario/desvincularLinhaPesquisaUsuario/0') ?>');
        $("#formDesvincularLinhaPesquisa").submit();
    });
    $("#btnVincularLinhaPesquisa").click(function () {
        $("#formVincularLinhaPesquisa").attr('action', '<?= base_url('social/usuario/vincularLinhaPesquisaUsuario/0') ?>');
        $("#formVincularLinhaPesquisa").submit();
    });
</script>