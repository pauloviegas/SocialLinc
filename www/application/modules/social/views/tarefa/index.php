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

<div class="page-title">	
    <h3>Tarefas do Projeto</h3>
</div>
<div class="row">
    <?php foreach ($vstatus as $status => $tarefas) : ?>
        <div class="col-sm-6 col-md-3">
            <div class="thumbnail">
                <div class="caption" style="height: 300px;">
                    <h4 style="text-align: center;"><?= $status ?></h4>
                    <div class="scroller" data-height="200px" style="overflow: hidden; width: auto; height: 200px;">
                        <?php foreach ($tarefas as $tarefa) : ?>
                            <div class="well well-small" style="margin-bottom: 5px; height: 45px;">
                                <?php if ($tarefa->foto_usuario) : ?>
                                    <img style="border-radius: 100px;" alt="" src="<?= $tarefa->foto_usuario ?>" width="20" height="20"> 
                                <?php endif; ?>
                                <?php if (strlen($tarefa->titulo) > 23) : ?>
                                    &nbsp;<?= substr($tarefa->titulo, 0, 23) . '...' ?>
                                <?php else : ?>
                                    <?= $tarefa->titulo ?>
                                <?php endif; ?>
                                <a data-toggle="dropdown" class="dropdown-toggle  pull-right" href="#">						
                                    <div class="icon-reorder top-settings-dark "></div> 	
                                </a>
                                <ul class="dropdown-menu pull-right" role="menu" aria-labelledby="dropdownMenu">
                                    <?php if ($aprovarTarefa || $tarefa->status != 'Em Análise') : ?>
                                        <li>
                                            <a href="#"><i class="icon-move"></i>&nbsp;&nbsp;Mover Para...</a>
                                        </li>
                                        <li class="divider"></li>
                                    <?php endif; ?>
                                    <li>
                                        <a href=#"><i class="icon-wrench"></i>&nbsp;&nbsp;Editar</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="icon-trash"></i>&nbsp;&nbsp;Excluir</a>
                                    </li>
                                </ul>
                            </div>
                        <?php endforeach; ?>
                        <?php if ($status == 'Em Análise') : ?>
                            <div class="well well-small addtarefa" data-toggle="modal" data-target="#myModalTarefa" style="margin-bottom: 5px;">
                                <i class="icon-plus"></i>
                                <span style="opacity: 0.6">&nbsp;&nbsp;Adicionar Nova Tarefa</span>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="modal fade" id="myModalTarefa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalTituloTarefa">Criar uma Nova Tarefa</h4>
            </div>
            <div id="myModalTextoTarefa" class="modal-body">
                <div class="row">
                    <div class="col-md-12 col-sm-8 col-xs-8">
                        <div class="form-group">
                            <label class="form-label">Título</label>
                            <div class="controls">
                                <input type="text" name="nome" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Descrição</label>
                            <div class="controls">
                                <input type="text" name="nome" value="" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Prioridade</label>
                            <div class="controls">
                                <select name="prioridade" style="width:100%" tabindex="-1" class="select2-offscreen">
                                    <option value="Baixa">Baixa</option>
                                    <option value="Normal">Normal</option>
                                    <option value="Alta">Alta</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" name="data_inicio">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnexcluirTarefa" type="button" class="btn btn-primary">Deletar</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>

<script type="text/javascript">
    $(".addtarefa").mouseover(function () {
        $(this).css('opacity', '0.5');
    });
    $(".addtarefa").mouseout(function () {
        $(this).css('opacity', '1');
    });
    $(".addtarefa").click(function () {
        $("#myModalTarefa").show();
    });
</script>