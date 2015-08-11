<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="#" class="active">Perfis e Permissões</a>
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

<?php if ($permissaoCriar) : ?>
    <div class="row botaoCriar">
        <div class="col-md-6">
            <div id="example2_length" class="dataTables_length">
                <button id="cadastrar" type="button" class="btn btn-primary btn-cons">
                    <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Adicionar Perfil
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Perfis de Usuários</h4>
            </div>
            <div class="grid-body ">
                <?php if (count($perfis) > 0) : ?>
                    <form id="formPerfil" method="post">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="example2" width="100%" aria-describedby="example2_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" style="width: 60%;">Perfis de Usuários</th>
                                        <?php if ($permissaoEditarPerfil || $permissaoExcluirPerfil) : ?>
                                            <th class="sorting" style="width: 40%;">Ações</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php foreach ($perfis as $perfil) : ?>
                                        <tr class="gradeX odd">
                                            <td><?= $perfil->perfil ?></td>
                                            <?php if ($permissaoPermissao || $permissaoEditarPerfil || $permissaoExcluirPerfil) : ?>
                                                <td>
                                                    <?php if ($permissaoPermissao) : ?>
                                                        <button id="<?= $perfil->id ?>" type="button" class="btn btn-white btn-xs btn-mini permissao">
                                                            <i class="icon-eye-open"></i>&nbsp;Permissões
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($permissaoEditarPerfil) : ?>
                                                        <button id="<?= $perfil->id ?>" type="button" class="btn btn-default btn-xs btn-mini editar">
                                                            <i class="icon-pencil"></i>&nbsp;Editar
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($permissaoExcluirPerfil) : ?>
                                                        <button id="<?= $perfil->id ?>" name="<?= $perfil->perfil ?>" type="button" data-toggle="modal" data-target="#modalPerfil" class="btn btn-danger btn-xs btn-mini excluir">
                                                            <i class="icon-trash"></i>&nbsp;Excluir
                                                        </button>
                                                    <?php endif; ?>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </form>
                <?php else : ?>
                    <p>Não existem Perfis cadastrados</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalPerfil" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Perfil</h4>
            </div>
            <div id="modalPerfilContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formExcluirPerfil" action="<?= base_url('social/perfil/excluir') ?>" method="post">
                    <input id="modalIdPerfil" type="hidden" name="idPerfil" value="">
                    <input id="inputModalPerfil" type="hidden" name="perfil" value="">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnExcluirPerfil" type="button" class="btn btn-primary" hidden>Excluir</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>
<script>
    $("#cadastrar").click(function () {
        $(window.document.location).attr('href', '<?= base_url('social/perfil/criar') ?>');
    });
    $(".editar").click(function () {
        var form = $("#formPerfil");
        var id = $(this).attr('id');
        form.attr('action', '<?= base_url('social/perfil/editar/') ?>' + id);
        form.submit();
    });
    $(".permissao").click(function () {
        var form = $("#formPerfil");
        var id = $(this).attr('id');
        form.attr('action', '<?= base_url('social/permissao/index') ?>' + '/' + id);
        form.submit();
    });
    $(".excluir").click(function () {
        idPerfil = $(this).attr('id');
        perfil = $(this).attr('name');
        $("#modalPerfilContent").html("Você tem certeza que deseja excluir "
                + " o Título: " + perfil + "?");
    });
    $("#btnExcluirPerfil").click(function (){
        $("#modalIdPerfil").attr('value', idPerfil);
        $("#inputModalPerfil").attr('value', perfil);
        $("#formExcluirPerfil").submit();
    });
</script>