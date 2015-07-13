<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>   
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>  	
        <li>   
            <a href="<?= base_url('social/instituicaoEnsino/index') ?>">Instituições de Ensino</a>
        </li>
        <i class="icon-angle-right"></i>  					 
        <li>
            <a href="#" class="active">Criar</a>
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
                <h4>Adicionar uma Instituição de Ensino</h4>
            </div>
            <div class="grid-body ">
                <form id="form" action="<?= base_url('social/instituicaoEnsino/inserir') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            * Campos Obrigatórios
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Nome da Instituição de Ensino: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="nome" value="<?= (set_value('nome')) ? set_value('nome') : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Sigla: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="sigla" value="<?= (set_value('sigla')) ? set_value('sigla') : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Descrição da Instituição de Ensino: </label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <textarea name="resumo" placeholder="Digite aqui a descrição da instituição de ensino..."><?= (set_value('resumo')) ? set_value('resumo') : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label class="form-label">E-mail para Contato:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="email" value="<?= (set_value('email')) ? set_value('email') : '' ?>" placeholder="exemplo@exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="form-label">Telefone para Contato:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input id="telefone" class="form-control" type="text" name="telefone" value="<?= (set_value('telefone')) ? set_value('telefone') : '' ?>" placeholder="(__) _____-____">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">
                                Selecione a logo da Instituição:
                                <small>
                                    Tamanho Ideal - 180 x 150
                                    (Extensões Suportadas: gif - jpg - png)
                                </small>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <div class="form-control divImagem" >
                                        <input id="imagem" class="col-md-12 inputImagem" type="file" name="logo"/>
                                        <label id="nomeimagem" class="form-label labelImagem"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label tituloFormularios">Redes Sociais:</label>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Facebook:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="facebook" value="<?= set_value('facebook') ? set_value('facebook') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Google +:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="googleplus" value="<?= set_value('googleplus') ? set_value('googleplus') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Instagram:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="instagram" value="<?= set_value('instagram') ? set_value('instagram') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Twitter:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="twitter" value="<?= set_value('twitter') ? set_value('twitter') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Liked-in:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="likedin" value="<?= set_value('likedin') ? set_value('likedin') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Site:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="url" value="<?= (set_value('url')) ? set_value('url') : '' ?>" placeholder="http://...">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" name="id_tipo" value="1">
                                    <input type="hidden" name="publico" value="1">
                                    <input type="hidden" name="excluido" value="0">
                                    <button id="inserir" type="button" class="btn btn-primary btn-cons">Inserir</button>
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
    $("#inserir").click(function () {
        $("#form").submit();
    });
    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });
    $("#telefone").mask("(99) 9999-9999?9");
</script>