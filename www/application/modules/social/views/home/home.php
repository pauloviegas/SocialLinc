<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb" style="margin-bottom: 20px;">				 
        <li>
            <a href="#" class="active">Feed</a>
        </li>                    
    </ul>
</div>

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

<div style="width: 100%; text-align: center;">
    <h1>Seja Bem-vindo ao <b>Social LINC</b></h1>
    <p style="margin-top: 20px;">
        Em breve você poderá comenrar em todos os laboratórios e projetos, além
        de realizar post's pessoais e sobre suas publicações cintíficas, aguarde
        e desfrute de mais funções do social LINC.
    </p>
</div>

<?= $rodape ?>