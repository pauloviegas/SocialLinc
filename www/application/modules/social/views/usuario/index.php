<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Membros</a>
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
                <h4>Membros Ativos</h4>
            </div>
            <div class="grid-body ">
                <form id="formMembrosAtivos" method="post">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <table id="example2" class="table table-striped dataTable" width="100%">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" style="width: 30%;">Nome</th>
                                    <th class="sorting" style="width: 15%;">Título</th>
                                    <th class="sorting" style="width: 10%;">Instituição</th>
                                    <th class="sorting" style="width: 20%;">E-mail</th>
                                    <?php if ($permissaoEditarUsuario) : ?>
                                        <th class="sorting" style="width: 25%;">Ações</th>
                                    <?php endif; ?>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php foreach ($usuariosAtivos as $usuarioAtivo) : ?>
                                    <tr class="gradeX odd">
                                        <td>
                                            <img class="imagemRedonda" src="<?= $url_base . $usuarioAtivo->foto ?>">
                                            <label class="nomeImagemRedonda"><?= $usuarioAtivo->nome ?></label>
                                        </td>
                                        <td><?= $usuarioAtivo->formacao ?></td>
                                        <td><?= $usuarioAtivo->sigla_instituicao ?></td>
                                        <td><?= $usuarioAtivo->email ?></td>
                                        <?php if ($permissaoEditarUsuario) : ?>
                                            <td>
                                                <?php if ($permissaoEditarUsuario) : ?>
                                                    <button id="<?= $usuarioAtivo->id ?>" class="btn btn-default btn-xs btn-mini editarAtivo" type="button">
                                                        <i class="icon-pencil"></i>&nbsp;Editar
                                                    </button>
                                                <?php endif; ?>
                                                <button id="<?= $usuarioAtivo->id ?>" class="btn btn-danger btn-xs btn-mini inativarAtivo" type="button" name="<?= $usuarioAtivo->nome ?>" data-toggle="modal" data-target="#modalExcluirUsuario">
                                                    <i class="icon-trash"></i>&nbsp;Excluir
                                                </button>
                                            </td>
                                        <?php endif; ?>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php if ($permissaoUsuariosInativos) : ?>
    <?php if (count($usuariosInativos) > 0) : ?>
        <div class="row-fluid">
            <div class="span12">
                <div class="grid simple ">
                    <div class="grid-title">
                        <h4>Membros Excluidos</h4>
                    </div>
                    <div class="grid-body ">
                        <form id="formMembrosInativos" method="post">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                                <table id="example2" class="table table-striped dataTable">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting" style="width: 30%;">Nome</th>
                                            <th class="sorting" style="width: 15%;">Título</th>
                                            <th class="sorting" style="width: 10%;">Instituição</th>
                                            <th class="sorting" style="width: 20%;">E-mail</th>
                                            <?php if ($permissaoEditarUsuario) : ?>
                                                <th class="sorting" style="width: 25%;">Ações</th>
                                            <?php endif; ?>
                                        </tr>
                                    </thead>
                                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                                        <?php foreach ($usuariosInativos as $usuarioInativo) : ?>
                                            <tr class="gradeX odd">
                                                <td>
                                                    <img class="imagemRedonda" src="<?= $url_base . $usuarioInativo->foto ?>">
                                                    <label class="nomeImagemRedonda"><?= $usuarioInativo->nome ?></label>
                                                </td>
                                                <td><?= $usuarioInativo->formacao ?></td>
                                                <td><?= $usuarioInativo->sigla_instituicao ?></td>
                                                <td><?= $usuarioInativo->email ?></td>
                                                <?php if ($permissaoEditarUsuario) : ?>
                                                    <td style="text-align: center;">
                                                        <?php if ($permissaoEditarUsuario) : ?>
                                                            <button id="<?= $usuarioInativo->id ?>" class="btn btn-default btn-xs btn-mini editarInativo" type="button">
                                                                <i class="icon-pencil"></i>&nbsp;Editar
                                                            </button>
                                                        <?php endif; ?>
                                                        <button id="<?= $usuarioInativo->id ?>" class="btn btn-warning btn-xs btn-mini ativarInativo" type="button">
                                                            <i class="icon-coffee"></i>&nbsp;Ativar
                                                        </button>
                                                    </td>
                                                <?php endif; ?>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="modal fade" id="modalExcluirUsuario" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Usuário</h4>
            </div>
            <div id="modalExcluirUsuarioContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="excluirUsuario" data="" type="button" class="btn btn-primary">Excluir</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>

<script>
    $(".editarAtivo").click(function () {
        var form = $("#formMembrosAtivos");
        var id = $(this).attr('id');
        form.attr('action', '<?= base_url('social/usuario/editar/') ?>' + id);
        form.submit();
    });
    $(".inativarAtivo").click(function () {
        formMembAtivo = $("#formMembrosAtivos");
        id = $(this).attr('id');
        nome = $(this).attr('name');
        $("#modalExcluirUsuarioContent").html('Você tem certeza que deseja excluir o usuário: ' + nome);
    });
    $("#excluirUsuario").click(function() {
        formMembAtivo.attr('action', '<?= base_url('social/usuario/inativar/') ?>' + id);
        formMembAtivo.submit();
    });
    $(".editarInativo").click(function () {
        var form = $("#formMembrosInativos");
        var id = $(this).attr('id');
        form.attr('action', '<?= base_url('social/usuario/editar/') ?>' + id);
        form.submit();
    });
    $(".ativarInativo").click(function () {
        var form = $("#formMembrosInativos");
        var id = $(this).attr('id');
        form.attr('action', '<?= base_url('social/usuario/ativar/') ?>' + id);
        form.submit();
    });
</script>