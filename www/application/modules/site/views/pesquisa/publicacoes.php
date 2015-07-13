<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
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
                <div id="projetos_lista" class="carousel bttop">
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
    });
</script>