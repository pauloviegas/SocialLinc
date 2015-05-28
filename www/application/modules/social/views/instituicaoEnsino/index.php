<?= $topo ?>
<?= $menulateral ?>
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
    <div class="row">
        <div class="col-md-6">
            <div id="example2_length" class="dataTables_length">
                <button id="cadastrar" type="button" class="btn btn-primary btn-cons">
                    <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Adicionar Instituição de Ensino
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row-fluid" style="margin-top: 30px;">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Instituições de Ensino</h4>
            </div>
            <div class="grid-body ">
                <?php if (count($instituicoes) > 0) : ?>
                    <form id="formInstituicao" method="post">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="example2" width="100%" aria-describedby="example2_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" style="width: 40%;">Nome</th>
                                        <th class="sorting" style="width: 15%;">Site</th>
                                        <th class="sorting" style="width: 15%;">E-mail</th>
                                        <th class="sorting" style="width: 10%;">Telefone</th>
                                        <?php if ($permissaoEditar || $permissaoExcluir) : ?>
                                            <th class="sorting" style="width: 20%;">Ações</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php foreach ($instituicoes as $instituicao) : ?>
                                        <tr class="gradeX odd">
                                            <td>
                                                <img style="border-radius: 100px; float: left;" alt="" src="<?= $instituicao->logo ?>" width="32" height="32">
                                                <label style="margin-left: 40px; margin-top: 5px;"><?= $instituicao->nome ?></label>
                                            </td>
                                            <td><?= $instituicao->url ?></td>
                                            <td><?= ($instituicao->email) ? $instituicao->email : '-' ?></td>
                                            <td><?= ($instituicao->telefone) ? $instituicao->telefone : '-' ?></td>
                                            <?php if ($permissaoEditar || $permissaoExcluir) : ?>
                                                <td style="text-align: center;">
                                                    <?php if ($permissaoEditar) : ?>
                                                        <button id="<?= $instituicao->id ?>" type="button" class="btn btn-default btn-xs btn-mini editar">
                                                            <i class="icon-pencil"></i>&nbsp;Editar
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($permissaoExcluir) : ?>
                                                        <button id="<?= $instituicao->id ?>" name="<?= $instituicao->nome ?>" type="button" data-toggle="modal" data-target="#modalInstituicao" class="btn btn-danger btn-xs btn-mini excluir">
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
                    <p>Não existem instituições de ensino cadastradas</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalInstituicao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Instituição</h4>
            </div>
            <div id="modalInstituicaoContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formExcluirInstituicao">
                    <input id="modalIdInstituicao" type="hidden" name="idInstituicao" value="">
                    <input id="modalNomeInstituicao" type="hidden" name="nomeInstituicao" value="">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnExcluirInstituicao" type="button" class="btn btn-primary" hidden>Excluir</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>
<script>
    $("#cadastrar").click(function () {
        $(window.document.location).attr('href', '/social/instituicaoEnsino/criar');
    });
    $(".editar").click(function () {
        var form = $("#formInstituicao");
        var id = $(this).attr('id');
        form.attr('action', '/social/instituicaoEnsino/editar/' + id);
        form.submit();
    });
    $(".excluir").click(function () {
        idInstituicao = $(this).attr('id');
        instituicao = $(this).attr('name');
        $("#modalInstituicaoContent").html("Você tem certeza que deseja excluir "
                + " a Instituição: " + instituicao + "?");
    });
    $("#btnExcluirInstituicao").click(function () {
        $("#modalIdInstituicao").attr('value', idInstituicao);
        $("#modalNomeInstituicao").attr('value', instituicao);
        $("#formExcluirInstituicao").attr('action', '/social/instituicaoEnsino/excluir');
        $("#formExcluirInstituicao").submit();
    });
</script>