<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('social/laboratorio/index') ?>">Laboratórios</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('social/laboratorio/descricao/' . $laboratorio[0]->id) ?>">Descrição do <?= $laboratorio[0]->sigla ?></a>
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
                <h4>Editar informações - <?= $laboratorio[0]->nome ?></h4>
            </div>
            <div class="grid-body ">
                <form id="form" action="<?= base_url('social/laboratorio/alterar') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            * Campos Obrigatórios
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Nome do Laboratório: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="nome" value="<?= ($laboratorio[0]->nome) ? $laboratorio[0]->nome : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Sigla: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="sigla" value="<?= ($laboratorio[0]->sigla) ? $laboratorio[0]->sigla : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="form-label">E-mail para Contato: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="email" value="<?= ($laboratorio[0]->email) ? $laboratorio[0]->email : '' ?>" placeholder="exemplo@exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Telefone para Contato: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="telefone" value="<?= ($laboratorio[0]->telefone) ? $laboratorio[0]->telefone : '' ?>" placeholder="(__)_____-____">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3" style="margin-top: 25px; text-align: center;">
                            <label class="form-label">Laboratório Público *</label>
                            <div class="radio radio-success">
                                <input id="yes" type="radio" name="publico" value="1" <?= ($laboratorio[0]->publico) ? 'checked' : '' ?>>
                                <label for="yes">Sim</label>
                                <input id="no" type="radio" name="publico" value="0" <?= ($laboratorio[0]->publico) ? '' : 'checked' ?>>
                                <label for="no">Não</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Descrição do Laboratório: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <textarea name="resumo" placeholder="Digite aqui a descrição do projeto..."><?= ($laboratorio[0]->resumo) ? $laboratorio[0]->resumo : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">
                                Selecione a logo do Laboratório:
                                <small style="font-size: 10px;">
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
                                <?php if ($laboratorio[0]->logo != '/assets/img/grupo/laboratorio.png') : ?>
                                    <div id="logo" class="imagemEdicao">
                                        <a href="#" data-toggle="modal" data-target="#modalExcluirFoto"><i class="icon-custom-cross iconeExcluir"></i></a>
                                        <img src="<?= $url_base . $laboratorio[0]->logo ?>" width="100">
                                    </div>
                                <?php endif; ?>
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
                                    <input class="form-control" type="text" name="facebook" value="<?= $laboratorio[0]->facebook ? $laboratorio[0]->facebook : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Google +:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="googleplus" value="<?= $laboratorio[0]->googleplus ? $laboratorio[0]->googleplus : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Instagram:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="instagram" value="<?= $laboratorio[0]->instagram ? $laboratorio[0]->instagram : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Twitter:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="twitter" value="<?= $laboratorio[0]->twitter ? $laboratorio[0]->twitter : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Liked-in:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="likedin" value="<?= $laboratorio[0]->likedin ? $laboratorio[0]->likedin : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Site:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="url" value="<?= ($laboratorio[0]->url) ? $laboratorio[0]->url : '' ?>" placeholder="http://...">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?= $laboratorio[0]->id ?>">
                                    <input type="hidden" name="id_tipo" value="3">
                                    <input type="hidden" name="excluido" value="0">
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

<div class="modal fade" id="modalExcluirFoto" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Excluir Anexo</h4>
            </div>
            <div id="modalExcluirFotoContent" class="modal-body">
                Você tem certeza que deseja excluir a logo do laboratório: <?= $laboratorio[0]->nome ?>?
            </div>
            <div class="modal-footer">
                <form id="formExcluirFoto" method="post">
                    <input type="hidden" name="controller" value="laboratorio">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                <button id="excluirFoto" data="" type="button" class="btn btn-primary">Excluir</button>
            </div>
        </div>
    </div>
</div>


<?= $rodape ?>

<script type="text/javascript">
    $("#form").validate({
        rules: {
            nome: "required",
            sigla: "required",
            email: {
                required: true,
                email: true
            },
            resumo: "required"
        }
    });
    $("#btnsalvar").click(function () {
        $("#form").submit();
    });
    $("#excluirFoto").click(function () {
        $.ajax({
            url: '<?= base_url('social/laboratorio/excluirfoto') ?>',
            dataType: 'json',
            data: {
                'idLab': <?= $laboratorio[0]->id ?>
            },
            success: function (sucesso) {
                if (sucesso.excluido == 1)
                {
                    $("#logo").remove();
                    $('#modalExcluirFoto').modal('hide');
                }
            }
        });
    });
    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });
</script>