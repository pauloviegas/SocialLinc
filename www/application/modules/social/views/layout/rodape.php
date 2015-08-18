<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalTitulo"></h4>
            </div>
            <div id="myModalTexto" class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="btnexcluir" type="button" class="btn btn-primary">Deletar</button>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<!-- FIM DO CONTEÚDO DA PÁGINA --> 

<!-- INICIO DOS FRAMEWORKS DE JAVASCRIPT --> 
<script src="<?= $url_base . 'assets/plugins/jquery-1.8.3.min.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/bootstrap/js/bootstrap.min.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/jquery-unveil/jquery.unveil.min.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/jquery-validation-1.13.1/dist/jquery.validate.min.js' ?>" type="text/javascript"></script>
<script src="<?= $url_base . 'assets/plugins/jquery-validation-1.13.1/dist/localization/messages_pt_BR.min.js' ?>" type="text/javascript"></script>
<!-- FIM DOS FRAMEWORKS DE JAVASCRIPT --> 

<!-- INICIO DOS PLUGINS DE JAVASCRIPT -->
<script src="<?= $url_base . 'assets/plugins/pace/pace.min.js' ?>" type="text/javascript"></script>  
<script src="<?= $url_base . 'assets/plugins/breakpoints.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/jquery-slider/jquery.sidr.min.js' ?>" type="text/javascript"></script> 	
<script src="<?= $url_base . 'assets/plugins/jquery-numberAnimate/jquery.animateNumbers.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js' ?>" type="text/javascript"></script>
<!-- FIM DOS PLUGINS DE JAVASCRIPT --> 	

<!-- INICIO DOS PLUGINS DE PAGINAS -->
<script src="<?= $url_base . 'assets/js/jquery.maskedinput.js.js' ?>" type="text/javascript"></script> 
<!-- FIM DOS PLUGINS DE PAGINAS -->

<!-- INICIO DOS CORES DE TEMPLATE DO JAVASCRIPT -->
<script src="<?= $url_base . 'assets/js/core.js' ?>" type="text/javascript"></script> 
<script src="<?= $url_base . 'assets/js/demo.js' ?>" type="text/javascript"></script> 
<!-- FIM DOS CORES DE TEMPLATE DO JAVASCRIPT --> 

<script>
    $(".descricaoMenu").hover(function () {
        $(this).tooltip('show');
    });
</script>

</body>
<!-- FIM DO BODY --> 
</html>