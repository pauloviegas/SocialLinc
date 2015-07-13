<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="#" class="active">Administradores do Sistema</a>
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

<div class="row">
    <div class="col-md-12">
        <div class="grid simple transparent">
            <div class="grid-title">
                <h4>Usuários  <span class="semi-bold">Administrativos</span></h4>
            </div>
            <div class="grid-body">
                <?php if (count($usuariosVinculados) > 0) : ?>
                    <?php foreach ($usuariosVinculados as $usuarioVinculado) : ?>
                        <div class="col-sm-10 col-md-3">
                            <div class="thumbnail" style="min-height: 300px;">
                                <?php if ($permissaoDesvincularUsuario && count($usuariosVinculados) > 1) : ?>
                                    <div class="botaoExcluirVinculo">
                                        <a class="desvincularUsuario" href="#" data-toggle="modal" data-target="#modalDesvincularUsuario">
                                            <input class="nomeUsuario" type="hidden" value="<?= $usuarioVinculado->nome_usuario ?>">
                                            <input class="idVinculo" type="hidden" value="<?= $usuarioVinculado->id ?>">
                                            &nbsp;&nbsp;<i class="icon-custom-cross"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <div class="fotoVinculo">
                                    <!-- Imagem de 180x100 -->
                                    <img src="<?= $url_base . $usuarioVinculado->foto_usuario ?>">
                                </div>
                                <div class="caption nomeVinculo">
                                    <h3><?= $usuarioVinculado->nome_usuario ?></h3>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
                <?php if ($permissaoVincularUsuario && count($usuarios) > 0) : ?>
                    <div id="vincularUsuario" class="col-sm-10 col-md-3" data-toggle="modal" data-target="#modalVincularUsuario">
                        <div id="vincularUsuarioContent" class="thumbnail vincular">
                            <div class="fotoAddVinculo">
                                <!-- Imagem de 180x100 -->
                                <img src="<?= $url_base . 'assets/img/usuarios/default_user.jpg' ?>">
                            </div>
                            <div class="caption nomeAddVinculo">
                                <h3><i class="icon-plus"></i>&nbsp;&nbsp;Novo Usuário</h3>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalVincularUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Selecione um usuário para fazer parte do grupo Administrativo</h4>
            </div>
            <div class="modal-body">
                <form id="formUsuario" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Usuário:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_usuario" style="width:100%">
                                        <?php if (count($usuarios) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <option value="<?= $usuario->id ?>"><?= $usuario->nome ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não existe nenhum Usuário Disponível</option>
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
                                            <?php foreach ($perfis as $perfl) : ?>
                                                <option value="<?= $perfl->id ?>"><?= $perfl->perfil ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não existe nenhum perfil disponível!</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="id_instituicao" value="1">
                    <input type="hidden" name="id_ativo" value="1">
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
                <h4 class="modal-title">Desvincular</h4>
            </div>
            <div id="myModalDesvincularUsuario" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formDesvincularUsuario" method="post">
                    <input type="hidden" name="controller" value="laboratorio">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnDesvincularUsuario" data="" type="button" class="btn btn-primary">Desvincular</button>
            </div>
        </div>
    </div>
</div>


<?= $rodape ?>
<script type="text/javascript">
    $("#vincularUsuario").mouseover(function () {
        $("#vincularUsuarioContent").css('opacity', '0.25');
    });
    $("#vincularUsuario").mouseout(function () {
        $("#vincularUsuarioContent").css('opacity', '0.5');
    });
    $(".desvincularUsuario").click(function () {
        var nomeUsuario = $(this).find(".nomeUsuario").attr('value');
        idVinculo = $(this).find(".idVinculo").attr('value');
        $("#myModalDesvincularUsuario").html("Você tem certeza que deseja desvincular"
                + " o usuário: " + nomeUsuario + "?");
    });
    $("#btnVincularUsuario").click(function () {
        $("#formUsuario").attr('action', '<?= base_url('social/sistema/vincularUsuario') ?>');
        $("#formUsuario").submit();
    });
    $("#btnDesvincularUsuario").click(function () {
        $("#formDesvincularUsuario").attr('action', '<?= base_url('social/sistema/desvincularUsuario/') ?>' + idVinculo);
        $("#formDesvincularUsuario").submit();
    });
</script>