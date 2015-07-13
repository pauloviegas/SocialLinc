<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Pesquisa <small></small></h1>
                    <div><a href="<?= base_url('site/home/index') ?>">Home</a> &nbsp;&rsaquo;&nbsp; Pesquisa</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="container">
    <div class="container" style="margin-top: -20px">
        <h1 style="margin-top: -20px"><small>Linhas de Pesquisa</small></h1>
        <div id="linhaspesquisa" class="row">
            <div class="span12 featured-blocks">
                <ul class="thumbnails pull-center">
                    <?php if (count($linhas) > 0) : ?>
                        <?php foreach ($linhas as $linha) : ?>
                            <li class="span3 thumbnail bg-color-orange-dark  fg-color-white" style="height: 250px;">
                                <a href="<?= base_url('site/pesquisa/projetosLinha/' . $linha->id_linha) ?>">
                                    <div style="text-align: center; margin-left: -65px; margin-top: 20px;">
                                        <i class="<?= $linha->icone ?>" style="font-size: 70pt; width: 100px;"></i>
                                    </div>
                                    <div class="caption fg-color-white" style="text-align: center;">
                                        <h3><?= $linha->linha ?></h3>
                                    </div>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</section><section class="breadcrumbs">
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
</section><section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Publicações <small></small></h1>
                    <div><a href="<?= base_url('site/home/index') ?>">Home</a> &nbsp;&rsaquo;&nbsp; Publicações</div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="container">
    <div class="container" style="margin-top: -20px">
        <div class="row">
            <div class="span12">
                <div id="projetos_lista2" class="carousel bttop">
                    <div class="carousel-wrapper" style="margin-left: -30px">
                        <ul>
                            <li>
                                <div class="span12" >
                                    <blockquote>
                                        <p>
                                            BORGES, K. P. ; MATA, E. C. da ; SANTANA, A. L. de ; JACOB JUNIOR, A. F. L. . <br>
                                            Aplicativo Móvel Lúdico para Ensino de Alunos do nível Médio em Programação de Computadores. 
                                            In: III WCTA - Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014. p. 49-51
                                        </p>
                                    </blockquote>
                                </div>
                            </li>
                            <li>
                                <div class="span12" >
                                    <blockquote>
                                        <p>
                                            MATA, E. C. ; JACOB JR, A. ; FRANCÊS, C. R. L. ; SANTANA, Á. L. ; COSTA, J. C. W. A. .<br>
                                            Programação de Computadores a Jovens do Ensino Médio. In: III WCTA - 
                                            Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014. 
                                            p. 55-57.
                                        </p>
                                    </blockquote>
                                </div>
                            </li>
                            <li>
                                <div class="span12" >
                                    <blockquote>
                                        <p>
                                            SILVA, M. P. ; SOUZA JR., G. N. ; PINHEIRO, M. F. ; SANTANA, Á. L. ; JACOB JR, A. . <br>
                                            Protótipo para Ensino da Leitura e Escrita para Crianças com Dificuldades de Aprendizado. In:
                                            III WCTA - Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014.
                                            p. 58-60.
                                        </p>
                                    </blockquote>
                                </div>
                            </li>                                                
                        </ul>
                    </div>
                </div>
            </div>
        </div>
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
        $('#projetos_lista2').elastislide({
            imageW: 900,
            border: 0,
            minItems: 1,
            margin: 300
        });
    });
</script>