<?= $topo ?>
<div class="row" style="margin-bottom: 50px;">
    <div class="span8">
        <section id="apps">
            <div class="page-header">
                <h1>Início</h1>
                <div><a href="<?= base_url('site/home/index') ?>">Home</a></div> 
            </div>

            <br/>
            <p>
                O Laboratório de Inteligência Computacional e Pesquisa 
                Operacional (LINC) é associado à Faculdade de Engenharia da 
                Computação e Telecomunicações (FCT) do Instituto de Tecnologia 
                (ITEC) da Universidade Federal do Pará (UFPA).
            </p>
            <p>
                O LINC tem como objetivo gerar soluções e avanços, motivados 
                pelo problemas e aplicações do “mundo real”, na pesquisa e 
                implementação de modelos matemáticos, estatísticos e de 
                inteligência computacional para a geração de conhecimento.
            </p>
            <p>
                O LINC atua acerca de duas principais áreas:
            </p>
            <ul>
                <li>
                    Investigar novos modelos, bem como aprimoramentos, para 
                    sistemas e algoritmos, nas áreas de matemática, otimização 
                    e inteligência computacional; 
                </li>
                <li>Prover logística para o meio público e profissional, 
                    através do desenvolvimento de sistemas e metodologias para 
                    suporte à decisão, permitindo, particularmente, identificar 
                    padrões, realizar predições e inferir cenários e 
                    comportamentos para análise e diagnóstico.
                </li>
            </ul>   
            <p>
                Dentre os domínios recentes de trabalho estão: 
                telecomunicações, agroindústria, energia, saúde e segurança.
            </p>
        </section> 


    </div>
    <!--    <div class="span4 hidden-phone">
            <section class="search clearfix">
                <form id="search" class="input-append">
                    <input class="span4" id="appendedInputButton" size="16" type="text" placeholder="Buscar por informações" />
                    <input class="btn search-bt" type="submit" name="submit" value="" />
                </form>
            </section>
        </div>-->
    <div class="span3 bs-docs-sidebar" style="padding-bottom: 20px;">
        <!--<h3>Últimas Notícias</h3>
        <p>
            Não existe nenhuma notícia no momento.
        </p>
                <ul class="nav nav-list bs-docs-sidenav" style="margin-bottom: 20px;">
                    <li><a href="#">Chamada de Estágio de Iniciação Científica - PIBIC.<i class="icon-chevron-right"></i></a></li>                        
                    <li><a href="#"> Mobile Qualis.<i class="icon-chevron-right"></i></a></li>
                    <li><a href="#"> Palestra prof. Vladimiro Miranda (INESCTEC-Porto).<i class="icon-chevron-right"></i></a></li>
                    <li><a href="#"> XLVI Simpósio Brasileiro de Pesquisa Operacional.<i class="icon-chevron-right"></i></a></li>
                    <li><a href="#">III Workshop de Ciência e Tecnologia & Arte da Amazônia - WCTA 2014. <i class="icon-chevron-right"></i> </a></li>
                </ul>
                <p style="text-align: right; margin-right: 11px;">
                    <a href="#" class="btn btn-large btn-welcome">
                        Mostrar Todos<i class="icon-chevron-right"></i>
                    </a>
                </p>-->
        <h3>Últimas Notícias</h3>
        <ul class="nav nav-list bs-docs-sidenav">                        
            <li>
                <a href="#" controller="index" action="noticias" onclick="Layout.go($(this))" >
                    <div style="width: 10%; float: left; text-align: center; margin-right: 10%">
                        04<br>
                        MAR
                    </div>
                    <div style="width: 80%">
                        Universidade de Leipzig e UFPA...
                    </div>
                </a>
            </li>
            <li style="background-color: rgb(4,110,149);">
                <a style="color: antiquewhite;" href="#" controller="index" action="noticias" onclick="Layout.go($(this))" >
                    <div style="width: 10%; float: left; text-align: center; margin-right: 10%">
                        19<br>
                        JUN
                    </div>
                    <div style="width: 80%">
                        Lançamento do novo site do Mobile Qualis
                    </div>
                </a>
            </li>
            <li>
                <a href="#" controller="index" action="noticias" onclick="Layout.go($(this))" >
                    <div style="width: 10%; float: left; text-align: center; margin-right: 10%">
                        25<br>
                        MAR
                    </div>
                    <div style="width: 80%">
                        Apresentação do projeto de extensão intitulado Fábrica de Games
                    </div>
                </a>
            </li> 
            <li>
                <a href="#" controller="index" action="noticias" onclick="Layout.go($(this))" >
                    <div style="width: 10%; float: left; text-align: center; margin-right: 10%">
                        19<br>
                        MAR
                    </div>
                    <div style="width: 80%">
                        Fábrica de Games: capacitação e criação...
                    </div>
                </a>
            </li>                        
            <li>
                <a href="#" controller="index" action="noticias" onclick="Layout.go($(this))" >
                    <div style="width: 10%; float: left; text-align: center; margin-right: 10%">
                        04<br>
                        MAR
                    </div>
                    <div style="width: 80%">
                        Chamada de Estágio de Iniciação Científica...
                    </div>
                </a>
            </li>
        </ul>
        <p style="margin-top: 20px;"><a href="#" controller="index" action="noticias" class="btn btn-large btn-welcome" onclick="Layout.go($(this))">
                Mostrar Todos</a></p>
        <br>
        <br>
        <br>
    </div>
</div>
</div>
<?= $rodape ?>