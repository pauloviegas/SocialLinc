<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('social/laboratorio/index') ?>">Laboratórios</a>
        </li>
        <i class="icon-angle-right"></i>						 
        <li>
            <a href="#" class="active">Projetos do <?= $laboratorio[0]->sigla ?></a>
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

<?php if ($criarProjeto) : ?>
    <div class="row botaoCriar">
        <div class="col-md-6">
            <div id="example2_length" class="dataTables_length">
                <button id="cadastrar" type="button" class="btn btn-primary btn-cons">
                    <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Adicionar Projeto
                </button>
            </div>
        </div>
    </div>
<?php endif; ?>

<?php foreach ($projetos as $definicao => $projs) : ?>
    <div class="page-title">	
        <h3><?= ($definicao == 'meusprojs') ? 'Projetos do ' . $laboratorio[0]->sigla . ' que faço parte' : 'Outros projetos do ' . $laboratorio[0]->sigla ?></h3>
    </div>
    <div class="row">
        <?php if (count($projs) > 0) : ?>
            <?php foreach ($projs as $proj) : ?>
                <?php $usuresp = explode(' ', $proj->nome_responsavel); ?>
                <div class="col-sm-6 col-md-3">
                    <div class="thumbnail">
                        <div class="divImgLogoGrupo">
                            <img class="<?= ($proj->logo != '/assets/img/grupo/projeto.jpg') ? 'imgLogoGrupo' : 'imgLogoGrupoDefault' ?>" src="<?= $url_base . $proj->logo ?>">
                        </div>
                        <div class="caption">
                            <h3><span class="semi-bold"><?= $proj->sigla ?></span></h3>
                            <p style="height: 50px; font-size: 12px;"><?= $proj->nome ?></p>
                            <p style="height: 10px;">
                                <b>Responsável:</b>
                                <?=
                                ((!empty($usuresp[0])) ? $usuresp[0] : '')
                                . ' ' .
                                ((!empty($usuresp[1])) ? $usuresp[1] : '')
                                . ' ' .
                                ((!empty($usuresp[2])) ? $usuresp[2] : '');
                                ?>
                            </p>
                            <p style="height: 10px;">
                                <b>Agencia Financiadora:</b>
                                <?= $proj->sigla_financiador ?>
                            </p>
                            <p style="height: 10px;">
                                <b>Url:</b>
                                <a href="<?= $proj->url ?>"><?= (strlen($proj->url) > 0) ? $proj->url : '-' ?></a>
                            </p>
                            <p style="height: 10px;">
                                <b>Data Inicio:</b>
                                <?= date('d/m/Y', strtotime($proj->inicio)) ?>
                            </p>
                            <p style="height: 30px;">
                                <b>Previsão de Termino:</b>
                                <?= date('d/m/Y', strtotime($proj->termino)) ?>
                            </p>
                            <p class="resumo" style="height: 70px;">
                                <b>Resumo do projeto:</b>
                                <?= (strlen($proj->resumo) > 100) ? substr($proj->resumo, 0, 100) . '...' : substr($proj->resumo, 0, 100) ?>
                            </p>
                            <p>
                                <a href="<?= base_url('social/projeto/descricao/' . $proj->id) ?>" class="btn btn-primary" role="button">Mais...</a>
                                <?php if ($definicao == 'meusprojs') : ?>
                                    <a href="<?= base_url('social/tarefa/index/' . $proj->id) ?>" class="btn btn-success" role="button">Tarefas</a>
                                </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else : ?>
            <p class="paragrafoAviso">
                <?=
                ($definicao == 'meusprojs') ?
                        'Você ainda não faz parte de nenhum projeto do '
                        . $laboratorio[0]->sigla :
                        'Você já faz parte de todos os projetos do '
                        . $laboratorio[0]->sigla . ', ou não existem projetos'
                        . ' cadastrados no ' . $laboratorio[0]->sigla
                ?>
            </p>
        <?php endif; ?>
    </div>
<?php endforeach; ?>

<?= $rodape ?>

<script type="text/javascript">
    $("#cadastrar").click(function () {
        $(window.document.location).attr('href', '<?= $url_base . 'social/projeto/criar/' . $laboratorio[0]->id ?>');
    });
</script>