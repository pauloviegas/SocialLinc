
</div>
</div>
</div>
<!--footer-->
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="span4">
                <address>
                    <p>Universidade Federal do Pará - Campus profissional</p>
                    <p> +55 (91) 3201-7870</p>
                    <p><a href="mailto:#">linc@ufpa.br</a></p>
                </address>
<!--                <p style="margin-top: 40px;">
                    <a href="<?= base_url('social') ?>">
                        <img src="/assets/img/logo_social.png" width="150" alt="">
                    </a>
                </p>-->
            </div>
            <div class="span8">
                <div class="row">
                    <div class="span8"></div>
                    <div class="span8">
                    </div>
                </div>
            </div>
            <div class="span4">
                <p class="heading">:: LINC-UFPa ::</p>
                <ul class="footer-navigate">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Pesquisa</a></li>
                    <li><a href="#">Mídia</a></li>
                    <li><a href="#">Notícias</a></li>
                    <li><a href="#">Equipe</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </div>
        </div>
    </div>
</footer>
<!--footer menu-->
<section id="footer-menu">
    <div class="container">
        <div class="row">
            <div class="span4">
                <p class="copyright">LINC-UFPa &copy; Copyright 2014.</p>
            </div>
            <div class="span8 hidden-phone">
                <ul class="pull-right">
                    <li><a href="#">Políticas de utilização</a></li>
                    <li><a href="#">Mapa do site</a></li>
                </ul>
            </div>
        </div>
    </div>
</section>
<script src="<?= $url_base . 'assets/js/jquery.min.js' ?>" type="text/javascript"></script>
<script src="<?= $url_base . 'assets/plugins/jquery-1.8.3.min.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/js/jquery.elastislide.js' ?>" type="text/javascript"></script> 
<script type="text/javascript">
    $("#menuPesquisa").mouseover(function () {
        $("#subMenuPerquisa").css("display", "block");
    });
    $("#menuPesquisa").mouseout(function () {
        $("#subMenuPerquisa").css("display", "none");
    });
    $("#menuMidia").mouseover(function () {
        $("#subMenuMidia").css("display", "block");
    });
    $("#menuMidia").mouseout(function () {
        $("#subMenuMidia").css("display", "none");
    });
</script>
</body>
</html>
