<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Laboratórios</a>
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

<?php if ($criarLaboratorio) : ?>
    <div class="row botaoCriar">
        <div class="col-md-12">
            <button id="cadastrar" type="button" class="btn btn-primary btn-cons">
                <i class="icon-plus"></i>&nbsp;&nbsp;&nbsp;Adicionar Laboratório
            </button>
        </div>
    </div>
<?php endif; ?>

<?php if (count($laboratorios) > 0) : ?>
    <?php foreach ($laboratorios as $definicao => $labs) : ?>
        <div class="page-title">	
            <h3><?= ($definicao == 'meuslabs') ? 'Laboratórios que faço parte' : 'Outros laboratórios' ?></h3>
        </div>
        <div class="row">
            <?php if (count($labs) > 0) : ?>
                <?php foreach ($labs as $lab) : ?>
                    <div class="col-sm-10 col-md-3">
                        <div class="thumbnail">
                            <div class="divImgLogoGrupo">
                                <img class="<?= ($lab->logo != '/assets/img/grupo/laboratorio.png') ? 'imgLogoGrupo' : 'imgLogoGrupoDefault' ?>" src="<?= $url_base . $lab->logo ?>">
                            </div>
                            <div class="caption">
                                <h3><?= $lab->sigla ?></h3>
                                <p style="height: 40px;"><?= $lab->nome ?></p>
                                <p style="height: 20px;"><b>Url:</b> <a href="<?= $lab->url ?>"><?= $lab->url ?></a></p>
                                <p>
                                    <a href="<?= base_url('social/laboratorio/descricao/' . $lab->id) ?>" class="btn btn-primary" role="button">Mais...</a>
                                    <a href="<?= ($lab->projeto) ? base_url('social/projeto/index/' . $lab->id) : '#' ?>" class="btn btn-success" role="button">Projetos (<?= $lab->projeto ?>)</a>
                                </p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="paragrafoAviso"><?= ($definicao == 'meuslabs') ? 'Você ainda não faz parte de nenhum laboratório' : 'Você já faz parte de todos os Laboratórios' ?></p>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
<?php else : ?>
    <p class="paragrafoAviso">Não existem laboratórios cadastrados</p>
<?php endif; ?>

<?= $rodape ?>

<script type="text/javascript">
    $("#cadastrar").click(function () {
        $(window.document.location).attr('href', '<?= base_url('social/laboratorio/criar') ?>');
    });
</script>