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

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Log's</h4>
            </div>
            <div class="grid-body ">
                <form id="form" method="post">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline" role="grid">
                        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped dataTable" id="example2" width="100%" aria-describedby="example2_info" style="width: 100%;">
                            <thead>
                                <tr role="row">
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 10%;">Usuário</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 20%;">Controller</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 20%;">Action</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 30%;">Descição</th>
                                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Rendering engine: activate to sort column ascending" style="width: 20%;">Data</th>
                                </tr>
                            </thead>
                            <tbody role="alert" aria-live="polite" aria-relevant="all">
                                <?php if (count($logs) > 0) : ?>
                                    <?php foreach ($logs as $log) : ?>
                                        <tr id="<?= $log->id ?>" class="gradeX odd">
                                            <td class=" "><p><?= $log->nome ?></p><p><?= $log->email ?></p></td>
                                            <td class=" "><p><?= $log->alias_controller ?></p></td>
                                            <td class=" "><?= $log->alias_action ?></td>
                                            <td class=" "><textarea style="width: 300px; height: 100px; border-radius: 20px;" disabled="disabled"><?php print_r($log->descricao); ?></textarea></td>
                                            <td class=" "><?= $log->data ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr class="gradeX odd">
                                        <td colspan="5" style="text-align: center;">Não existe nenhuma Ação cadastrada!!!</td>
                                    <tr
                                <?php endif; ?>
                        </tbody>
                    </table>
                </div>
                <input id="idAcao" type="hidden" name="idAcao">
                <input id="nomeAcao" type="hidden" name="nomeAcao">
            </form>
        </div>
    </div>
</div>
<?= $rodape ?>

<script>
    var acao = 0;
    $("#cadastrar").click(function () {
        var form = $("#form");
        form.attr('action', '/social/acao/criar');
        form.submit();
    });

    $(".editar").click(function () {
        var form = $("#form");
        var me = $(this);
        var id = me.attr("id");

        $("#idAcao").attr('value', id);
        form.attr('action', '/social/acao/editar');
        form.submit();
    });

    $(".excluir").click(function () {
        acao = $(this);
        var name = acao.attr("name");

        $("#myModal").show();
        $("#myModalTitulo").html("Aviso: Excluir Ação");
        $("#myModalTexto").html("Você tem certeza que deseja excluir a Ação"
                + " (" + name + ")?");
    });

    $("#btnexcluir").click(function () {
        var form = $("#form");
        var id = acao.attr("id");
        var nome = acao.attr("name");

        $("#idAcao").attr('value', id);
        $("#nomeAcao").attr('value', nome);
        form.attr('action', '/social/acao/excluir');
        form.submit();
    });
</script>