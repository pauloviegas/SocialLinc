<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Projetos <small></small></h1>
                    <div><a href="<?= base_url('site/home/index') ?>">Home</a> &nbsp;&rsaquo;&nbsp; Projetos</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="container">
    <div class="container" style="margin-top: -20px">
        <?php if (count($projetos) > 0) : ?>
            <div class="row">
                <div class="span12">
                    <div id="projetos_lista" class="carousel bttop">
                        <div class="carousel-wrapper" style="margin-left: -30px">
                            <ul>
                                <?php foreach ($projetos as $projeto) : ?>
                                    <li>
                                        <div class="span12">
                                            <div class="hero-unit" style="min-height: 300px;">
                                                <h4><a href="<?= base_url('site/pesquisa/projeto') . '/' . $projeto->id ?>"><?= $projeto->sigla ?> - <?= $projeto->nome ?></a></h4>
                                                <p style="width: 100%" align="justify">
                                                    <?= $projeto->resumo ?>
                                                </p>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        <?php else : ?>
            <p>Não existem Projetos Cadastrados</p>
        <?php endif; ?>
    </div>
</section>

<?= $rodape ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#projetos_lista').elastislide({
            imageW: 900,
            border: 0,
            minItems: 1,
            margin: 300
        });
    });
</script>