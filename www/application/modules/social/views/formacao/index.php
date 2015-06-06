<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('/social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Formações Acadêmicas</a>
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
                    <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Adicionar Formação Acadêmica
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Formações Acadêmicas</h4>
            </div>
            <div class="grid-body ">
                <?php if (count($formacoes) > 0) : ?>
                    <form id="formFormacoes" method="post">
                        <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="example2" width="100%" aria-describedby="example2_info" style="width: 100%;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" style="width: 60%;">Formações</th>
                                        <?php if ($permissaoEditarFormacao || $permissaoExcluirFormacao) : ?>
                                            <th class="sorting" style="width: 40%;">Ações</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody role="alert" aria-live="polite" aria-relevant="all">
                                    <?php foreach ($formacoes as $formacao) : ?>
                                        <tr class="gradeX odd">
                                            <td><?= $formacao->formacao ?></td>

                                            <?php if ($permissaoEditarFormacao || $permissaoExcluirFormacao) : ?>
                                                <td>
                                                    <?php if ($permissaoEditarFormacao) : ?>
                                                        <button id="<?= $formacao->id ?>" type="button" class="btn btn-default btn-xs btn-mini editar">
                                                            <i class="icon-pencil"></i>&nbsp;Editar
                                                        </button>
                                                    <?php endif; ?>
                                                    <?php if ($permissaoExcluirFormacao) : ?>
                                                        <button id="<?= $formacao->id ?>" name="<?= $formacao->formacao ?>" type="button" data-toggle="modal" data-target="#modalFormacao" class="btn btn-danger btn-xs btn-mini excluir">
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
                    <p>Não existem formações acadêmicas cadastradas</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalFormacao" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Formação Acadêmica</h4>
            </div>
            <div id="modalFormacaoContent" class="modal-body">
            </div>
            <div class="modal-footer">
                <form id="formExcluir" action="<?= base_url('/social/formacao/excluir') ?>" method="post">
                    <input id="modalId" type="hidden" name="idFormacao" value="">
                    <input id="modalNome" type="hidden" name="formacao" value="">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnExcluir" type="button" class="btn btn-primary" hidden>Excluir</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>
<script>
    $("#cadastrar").click(function () {
        $(window.document.location).attr('href', '/social/formacao/criar');
    });
    $(".editar").click(function () {
        var form = $("#formFormacoes");
        var id = $(this).attr('id');
        form.attr('action', '/social/formacao/editar/' + id);
        form.submit();
    });
    $(".excluir").click(function () {
        idFormacao = $(this).attr('id');
        formacao = $(this).attr('name');
        $("#modalFormacaoContent").html("Você tem certeza que deseja excluir "
                + " a formação acadêmica: " + formacao + "?");
    });
    $("#btnExcluir").click(function () {
        $("#modalId").attr('value', idFormacao);
        $("#modalNome").attr('value', formacao);
        $("#formExcluir").submit();
    });
</script>