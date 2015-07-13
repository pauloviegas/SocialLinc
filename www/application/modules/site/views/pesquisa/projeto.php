<?= $topo ?>
<!--page header / breadcrumbs-->
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Projeto <small></small></h1>
                    <div>
                        <a href="<?= base_url('site/home/index') ?>">Home</a>
                        <a href="<?= base_url('site/pesquisa/projetos') ?>">&nbsp;&rsaquo;&nbsp;Projetos</a> 
                        &nbsp;&rsaquo;&nbsp; Projeto
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="container">
    <div class="container" style="margin-top: -20px">
        <h2><?= $projeto[0]->sigla ?> - <?= $projeto[0]->nome ?></h2>
        <div style="text-align: center; margin-bottom: 30px;">
            <img src="<?= $url_base . $projeto[0]->logo ?>" style="height: 200px;">
        </div>
        <p><?= $projeto[0]->resumo ?></p>
        <h3 style="margin-top: 30px;">Social e Contato:</h3>
        <div class="row">
            <div class="span2"><a href="<?= $projeto[0]->facebook ?>"><?= ($projeto[0]->facebook) ? $projeto[0]->facebook : '-' ?></a></div>
            <div class="span2"><a href="<?= $projeto[0]->googleplus ?>"><?= ($projeto[0]->googleplus) ? $projeto[0]->googleplus : '-' ?></a></div>
            <div class="span2"><a href="<?= $projeto[0]->instagram ?>"><?= ($projeto[0]->instagram) ? $projeto[0]->instagram : '-' ?></a></div>
            <div class="span2"><a href="<?= $projeto[0]->twitter ?>"><?= ($projeto[0]->twitter) ? $projeto[0]->twitter : '-' ?></a></div>
            <div class="span2"><a href="<?= $projeto[0]->likedin ?>"><?= ($projeto[0]->likedin) ? $projeto[0]->likedin : '-' ?></a></div>
            <div class="span2"><a href="<?= $projeto[0]->url ?>"><?= ($projeto[0]->url) ? $projeto[0]->url : '-' ?></a></div>
            <div class="span6" style="margin-top: 20px;">E-mail: <a href="<?= $projeto[0]->email ?>"><?= ($projeto[0]->email) ? $projeto[0]->email : '-' ?></a></div>
            <div class="span6" style="margin-top: 20px;">Site: <a href="<?= $projeto[0]->url ?>"><?= ($projeto[0]->url) ? $projeto[0]->url : '-' ?></a></div>
        </div>
        <h3 style="margin-top: 30px;">Informações:</h3>
        <div class="row">
            <div class="span4"><label>Coordenador: <?= $projeto[0]->nome_coordenador ?></label></div>
            <div class="span4"><label>Responsável: <?= $projeto[0]->nome_responsavel ?></label></div>
            <div class="span4"><label>Processo: <?= ($projeto[0]->processo) ? $projeto[0]->processo : '-' ?></label></div>
            <div class="span4" style="margin-top: 20px;"><label>Edital: <?= ($projeto[0]->edital) ? $projeto[0]->edital : '-' ?></label></div>
            <div class="span4" style="margin-top: 20px;"><label>Data de Início: <?= ($projeto[0]->inicio) ? date('d/m/Y', strtotime($projeto[0]->inicio)) : '-' ?></label></div>
            <div class="span4" style="margin-top: 20px;"><label>Previsao de termino: <?= ($projeto[0]->termino) ? date('d/m/Y', strtotime($projeto[0]->termino)) : '-' ?></label></div>
            <div class="span12" style="margin-top: 20px;"><label>Fundação de Apoio: <?= ($projeto[0]->nome_financiador) ? $projeto[0]->nome_financiador : '-' ?> (<?= ($projeto[0]->sigla_financiador) ? $projeto[0]->sigla_financiador : '-' ?>)</label></div>
        </div>
        
        
        <h3 style="margin-top: 30px;">Membros:</h3>
        <div class="row" style="margin-top: -30px;">
            <?php foreach ($usuarios as $usuario) : ?>
                <?php if ($usuario->ativo == 1) : ?>
                    <div class="span3" style="text-align: center; min-width: 330px;">
                        <h3 class="member-name"><?= $usuario->nome_usuario ?></h3>
                        <p class="member-possition" style="margin-top: -35px;"><?= $usuario->tipo_vinculo ?></p>
                    </div>
                <?php else: ?>
                    <?php $alumni++; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
        <?php if ($alumni > 0) : ?>
            <h3 style="margin-top: 10px;">Alumni:</h3>
            <div class="row" style="margin-top: -30px;">
                <?php foreach ($usuarios as $usuario) : ?>
                    <?php if ($usuario->ativo == 0) : ?>
                        <div class="span3" style="text-align: center; min-width: 330px;">
                            <h3 class="member-name"><?= $usuario->nome_usuario ?></h3>
                            <p class="member-possition" style="margin-top: -35px;"><?= $usuario->tipo_vinculo ?></p>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>

    <h3 style="margin-top: 30px;">Linhas de Pesquisa:</h3>
    <div class="row" style="margin-top: -30px;">
        <?php foreach ($linhas as $linha) : ?>
            <div class="span3" style="text-align: center; min-width: 330px;">
                <h3 class="member-name"><?= $linha->linha ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
</section>
<?= $rodape ?>