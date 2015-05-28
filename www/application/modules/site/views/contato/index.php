<?= $topo ?>
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
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <!--<div class="page-header">-->
        <div class="row" style="margin-bottom: 10px;">
            <div class="span8">
                <h3>Onde Estamos</h3>
            </div>
        </div>
        <!--</div>-->
    </div>
</section>
<!--container-->
<section id="container" style="margin-top: -30px;">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="gmap">
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com.br/maps/ms?msa=0&amp;msid=206608210892714593537.0004d098d7ffe2ce9d555&amp;ie=UTF8&amp;t=w&amp;ll=-1.473998,-48.451869&amp;spn=0,0&amp;output=embed"></iframe>
                </div>
            </div>
        </div>
        <div class="row">
            <section id="page-sidebar" class="pull-left span8">
                <div class="row">
                    <div class="span8">
                        <h3>Contate-nos ou agende uma visita</h3>
                    </div>
                </div>
                <form class="af-form" id="af-form" action="<?= base_url('/site/contato/enviar') ?>" method="post">
                    <div class="af-outer af-required pull-left">
                        <div class="af-inner">
                            <label for="name" id="name_label">Nome:</label>
                            <input type="text" name="name" required id="name" size="30" value="" class="text-input span4" />
                        </div>
                    </div>
                    <div class="af-outer af-required pull-right">
                        <div class="af-inner">
                            <label for="email" id="email_label">E-mail:</label>
                            <input type="text" name="email" required id="email" size="30" value="" class="text-input span4" />
                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="af-outer af-required">
                        <div class="af-inner">
                            <label for="input-message" id="message_label">Mensagem:</label>
                            <textarea name="message" required id="input-message" cols="30" class="text-input span8"></textarea>
                        </div>
                    </div>
                    <div class="af-outer af-required">
                        <div class="af-inner">
                            <button type="submit" class="btn btn-primary btn-large" id="submit_btn" >Enviar</button>
                        </div>
                    </div>
                </form>
            </section>
            <!--sidebar-->
            <aside id="sidebar" class="pull-right span4">
                <!--address-->
                <section>
                    <h4>Endereço</h4>
                    <address>
                        <p>
                            <i class="icon-map-marker"></i> R. Augusto Corrêa, 1 - Guamá, Belém - PA, 66075-110<br/>
                            <i class="icon-add"></i> +55 91 3201-7870<br/>
                            <i class="icon-envelope"></i> <a href="mailto:#">linc.ufpa@gmail.com</a>
                        </p>
                    </address>
                </section>
                <section>
                    <h4>Horário de atendimento</h4>
                    <ul class="unstyled">
                        <li class="clearfix">Segunda à Sexta-feira:<p class="pull-right">8:00 às 18:00</p></li>
                    </ul>
                </section>
            </aside>
        </div>
    </div>    
</section>
<?= $rodape ?>
<script>
    $("#submit_btn").click(function () {
        $("#af-form").submit();
    });
</script>>