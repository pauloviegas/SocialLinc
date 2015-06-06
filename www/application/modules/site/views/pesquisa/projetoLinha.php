<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Projeto <small></small></h1>
                    <div>
                        <a href="<?= base_url('/site/home/index') ?>">Home</a>
                        <a href="<?= base_url('/site/pesquisa/projetos') ?>">&nbsp;&rsaquo;&nbsp;Projetos</a> 
                        &nbsp;&rsaquo;&nbsp; Projeto
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="container">
    <div class="container">
        <?php if (count($projetos) > 0) : ?>
            <div class="row">
                <?php foreach ($projetos as $projeto) : ?>
                    <div class="col-lg-12" style="margin-left: 30px;">
                        <a href="<?= base_url('/site/pesquisa/projeto/' . $projeto->id_grupo) ?>"><h3><?= $projeto->nome_grupo ?></h3></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            <p>Não existem projetos com essa linha de pesquisa</p>
        <?php endif; ?>
    </div>
</section>
<?= $rodape ?>