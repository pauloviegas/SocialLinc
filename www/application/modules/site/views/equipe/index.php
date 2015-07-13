<?= $topo ?>
<section class="breadcrumbs">
    <div class="container">
        <div class="page-header">
            <div class="row">
                <div class="span8">
                    <h1>Equipe <small>/ Pesquisa e Desenvolvimento</small></h1>
                    <div><a href="<?= base_url('site/home/index') ?>">Home</a> &nbsp;&rsaquo;&nbsp; Equipe</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--container-->
<section id="container">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="row member-info">
                    <?php $participantes = 0; ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <?php if ($usuario->ativo == 1) : ?>
                            <?php $participantes++; ?>
                            <div class="span3" align="center" style="margin-top: 20px;">
                                <img src="<?= base_url($usuario->foto_usuario) ?>" style="width: 180px; height: 216px;" />
                                <h3 class="member-name" style="height: 80px;"><?= $usuario->nome_usuario ?></h3>
                                <p class="member-possition"><?= $usuario->tipo_vinculo ?></p>
                                <?php if ($usuario->lattes_usuario) : ?>
                                    <p class="member-social" style="text-align: center;">
                                        <a target="_blank" href="<?= base_url($usuario->lattes_usuario) ?>">
                                            <img style=" height: 18px; width: 24px" src="<?= $url_base . 'assets/img/icon/logolattes.gif' ?>">
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($participantes == 0) : ?>
                        <p>Não exite equipe cadastradas no momento.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="page-header" style="margin-top: 100px;">
            <div class="row">
                <div class="span8">
                    <h1>Alumni<small></small></h1>
                </div>
            </div>
        </div>
        <div class="row" style="margin-top: 30px; margin-bottom: 100px;">
            <div class="span12">
                <div class="row member-info">
                    <?php $participantes = 0; ?>
                    <?php foreach ($usuarios as $usuario) : ?>
                        <?php if ($usuario->ativo == 0) : ?>
                            <?php $participantes++; ?>
                            <div class="span3" align="center" style="margin-top: 20px;">
                                <img  src="<?= base_url($usuario->foto_usuario) ?>" style="width: 180px; height: 216px;" />
                                <h3 class="member-name" style="height: 80px;"><?= $usuario->nome_usuario ?></h3>
                                <p class="member-possition"><?= $usuario->formacao_usuario ?></p>
                                <?php if ($usuario->lattes_usuario) : ?>
                                    <p class="member-social">
                                        <a target="_blank" href="<?= base_url($usuario->lattes_usuario) ?>">
                                            <img style=" height: 18px; width: 24px" src="<?= $url_base . 'assets/img/icon/logolattes.gif' ?>">
                                        </a>
                                    </p>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <?php if ($participantes == 0) : ?>
                        <p>Não existem Alumni no momento.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <hr>
        <div class="row" style="margin-top: 50px;">
            <section id="page" class="pull-left span12">
                <div class="row">
                    <div class="span12">
                        <h2>Parceiros <small></small></h2>
                        <span class="span3">
                            <blockquote align="center">
                                <a href="http://www.lprad.ufpa.br/" target="_blank">
                                    <h4>LPRAD - Laboratório de Planejamento de Redes de Alto Desempenho</h4>
                                </a>
                            </blockquote>
                        </span>
                        <span class="span3" >
                            <blockquote align="center">
                                <a href="http://www.lea.ufpa.br/" target="_blank">
                                    <h4>LEA - Laboratório de Eletromagnetismo Aplicado</h4>
                                    <br/>
                                </a>
                            </blockquote>
                        </span>
                        <span class="span3">
                            <blockquote align="center">
                                <a href="https://www.laps.ufpa.br/" target="_blank">
                                    <h4>LAPS - Laboratório de Processamento de Sinais</h4>
                                    <br/>
                                </a>
                            </blockquote>
                        </span>
                    </div>
                </div>
            </section>
        </div>
    </div>
</section>

<?= $rodape ?>