<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('/social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  	
        <li>   
            <a href="<?= base_url('/social/perfil/index') ?>">Perfis e Permissões</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Editar</a>
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

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Editar informações do perfil:&nbsp;&nbsp; <?= $perfil[0]->perfil ?></h4>
            </div>
            <div class="grid-body ">
                <form id="form" action="/social/perfil/alterar" method="post">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Perfil: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="perfil" type="text" value="<?= ($perfil[0]->perfil) ? $perfil[0]->perfil : '' ?>" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?= $perfil[0]->id ?>">
                                    <input type="hidden" name="perfilAntigo" value="<?= $perfil[0]->perfil ?>">
                                    <button id="btnsalvar" type="button" class="btn btn-primary btn-cons">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>
<script type="text/javascript">
    $("#btnsalvar").click(function () {
        $("#form").submit();
    });
</script>