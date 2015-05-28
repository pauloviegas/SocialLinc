<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Pesquisa <small></small></h1>
                    <div><a href="<?= base_url('/site/home/index') ?>">Home</a> &nbsp;&rsaquo;&nbsp; Pesquisa</div>
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
                                <div style="text-align: center; margin-left: -65px; margin-top: 20px;">
                                    <i class="<?= $linha->icone ?>" style="font-size: 70pt; width: 100px;"></i>
                                </div>
                                <div class="caption fg-color-white" style="text-align: center;">
                                    <h3><?= $linha->linha ?></h3>
                                </div>
                            </li>
                        <?php endforeach; ?>
                    <?php else : ?>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
        <!--        <hr style="border-top: 1px solid #D6D3D1;border-bottom: 0px"/>
                <h1 style="margin-top: -38px"><small>/ Projetos</small></h1>
                <div class="row">
                    <div class="span12">
                        <div id="projetos_lista" class="carousel bttop">
                            <div class="carousel-wrapper" style="margin-left: -30px">
                                <ul>
                                    <li>
                                        <div class="span12" >
                                            <div class="hero-unit">
                                                <h4>Sistema de Apoio à Decisão para Gestão e Estruturação Organizacional da Secretaria de Inclusão Digital</h4>
                                                <p style="width: 100%" align="justify"> Este projeto de pesquisa tem como objetivo principal o desenvolvimento de um sistema de apoio à decisão para gestão e estruturação
                                                    organizacional da Secretaria de Inclusão Digital (SID). O conjunto de informações a ser disponibilizado pelo sistema propicia um ambiente
                                                    favorável ao aperfeiçoamento da estrutura organizacional adotada pela SID. Esse ambiente é baseado na gestão por processos, na implantação
                                                    da prática de gestão por processos, no alinhamento entre novos fluxos, estrutura e estratégia, considerando periodicamente a necessidade 
                                                    de mudanças nas estratégias instituídas pelos usuários de níveis decisórios, no que concerne aos processos de inclusão digital. 
                                                    Além disso, o sistema contempla um conjunto de modelos matemáticos e de inteligência computacional que possibilitam a extração de padrões
                                                    e indicadores relacionados às ações de gestão no âmbito da SID</p>
                                                </p>     <a class="btn btn-welcome btn-large pull-right">Learn more</a>
                                            </div>
        
        
                                        </div>
                                    </li>
                                    <li>
                                        <div class="span12" >
                                            <div class="hero-unit">
                                                <h4>Sistema de Apoio à Decisão para Gestão e Estruturação Organizacional da Secretaria de Inclusão Digital</h4>
                                                <p style="width: 100%" align="justify"> Este projeto de pesquisa tem como objetivo principal o desenvolvimento de um sistema de apoio à decisão para gestão e estruturação
                                                    organizacional da Secretaria de Inclusão Digital (SID). O conjunto de informações a ser disponibilizado pelo sistema propicia um ambiente
                                                    favorável ao aperfeiçoamento da estrutura organizacional adotada pela SID. Esse ambiente é baseado na gestão por processos, na implantação
                                                    da prática de gestão por processos, no alinhamento entre novos fluxos, estrutura e estratégia, considerando periodicamente a necessidade 
                                                    de mudanças nas estratégias instituídas pelos usuários de níveis decisórios, no que concerne aos processos de inclusão digital. 
                                                    Além disso, o sistema contempla um conjunto de modelos matemáticos e de inteligência computacional que possibilitam a extração de padrões
                                                    e indicadores relacionados às ações de gestão no âmbito da SID</p>
                                                </p>     <a class="btn btn-welcome btn-large pull-right">Learn more</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
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
                        <p><a href="#" class="btn btn-large btn-welcome"><i class="icon-chevron-right"></i>Mostrar Todos</a></p>
                    </div>
                </div>
                <hr style="border-top: 1px solid #D6D3D1;border-bottom: 0px"/>
                <h1 style="margin-top: -45px"><small>/ Publicações</small></h1>
                <div class="row">
                    <div class="span12">
                        <div id="publicacoes_lista" class="carousel bttop">
                            <div class="carousel-wrapper" style="margin-left: -30px">
                                <ul>
                                    <li>
                                        <div class="span12" >
                                            <blockquote>
                                                <p>BORGES, K. P. ; MATA, E. C. da ; SANTANA, A. L. de ; JACOB JUNIOR, A. F. L. . <br>
                                                    Aplicativo Móvel Lúdico para Ensino de Alunos do nível Médio em Programação de Computadores. 
                                                    In: III WCTA - Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014. p. 49-51</p>
        
                                            </blockquote>
                                        </div>
        
                                    </li>
                                    <li>
                                        <div class="span12" >
                                            <blockquote>
                                                <p>MATA, E. C. ; JACOB JR, A. ; FRANCÊS, C. R. L. ; SANTANA, Á. L. ; COSTA, J. C. W. A. .<br>
                                                    Programação de Computadores a Jovens do Ensino Médio. In: III WCTA - 
                                                    Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014. 
                                                    p. 55-57.</p>
        
                                            </blockquote>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="span12" >
                                            <blockquote>
                                                <p>SILVA, M. P. ; SOUZA JR., G. N. ; PINHEIRO, M. F. ; SANTANA, Á. L. ; JACOB JR, A. . <br>
                                                    Protótipo para Ensino da Leitura e Escrita para Crianças com Dificuldades de Aprendizado. In:
                                                    III WCTA - Workshop de Ciência, Tecnologia & Arte da Amazônia, 2014, Belém. Publicações do III WCTA, 2014.
                                                    p. 58-60.</p>
        
                                            </blockquote>
                                        </div>
                                    </li>                                                
                                </ul>
                            </div>
                        </div>
                        <p><a href="#" class="btn btn-large btn-welcome"><i class="icon-chevron-right"></i>Mostrar Todos</a></p>
                        <script type="text/javascript">
                            $(document).ready(function () {
                                $('#publicacoes_lista').elastislide({
                                    imageW: 900,
                                    border: 0,
                                    minItems: 1,
                                    margin: 300
                                });
                            });
                        </script>
                    </div>
        
                </div>-->
        <!--
        <hr style="border-top: 1px solid #D6D3D1;border-bottom: 0px"/>
        <h1 style="margin-top: -45px"><small>/ Áreas de Interesse</small></h1>
        <div class="row">
            <div class="span11">
                <div class="span11 service">
                    <div class="well bg-color-orange-dark fg-color-white">
                        <div class="service-icon"><i class="icon-cogs"></i></div>
                        <div class="service-desc">
                            <p>
                            </p>
                            <div class="span12">
                                <div class="span16">
                                    <ul>
                                        <li>Algoritmos Evolutivos</li>
                                        <li> Análise de dados de sequenciadores de novas gerações</li>
                                        <li>Avaliação de Desempenho de Redes de Telecomunicações</li>
                                        <li> Bioinformática</li>
                                        <li> Desenvolvimento de Sistemas Inteligentes</li>
                                        <li> Desenvolvimento de Tecnologias aplicadas à Educação</li>
                                        <li> Filogenômica e DNA Humano</li>
                                        <li> Inteligência Artificial aplicada à Educação</li>
                                    </ul>
                                </div>
                                <div class="span16">
                                    <ul>
                                        <li> Inteligência Computacional</li>
                                        <li> Inteligência de Negócios (Business Intelligence)</li>
                                        <li> Mineração de Dados</li>
                                        <li> Organização industrial e desenvolvimento regional</li>
                                        <li> Redes Neurais Artificiais</li>
                                        <li> Suporte à Decisão</li>
                                        <li> Tecnologias para Smart Grids</li>
                                    </ul>
                                </div>
                            </div>
                            <ul>

                        </div>
                    </div>
                </div>

            </div>
        </div> -->
    </div>
</section>

<?= $rodape ?>