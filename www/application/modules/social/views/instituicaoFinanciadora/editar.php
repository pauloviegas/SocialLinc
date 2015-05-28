<?= $topo ?>
<?= $menulateral ?>
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
                <h4>Editar informações - <?= $instituicao[0]->nome ?></h4>
            </div>
            <div class="grid-body ">
                <form id="form" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            * Campos Obrigatórios
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label class="form-label">Nome da Insituição Financiadora: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="nome" type="text" value="<?= ($instituicao[0]->nome) ? $instituicao[0]->nome : '' ?>" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Sigla: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="sigla" value="<?= ($instituicao[0]->sigla) ? $instituicao[0]->sigla : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Descrição da Instituição Financiadora:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <textarea name="resumo" style="width: 100%; height: 150px;"><?= ($instituicao[0]->resumo) ? $instituicao[0]->resumo : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">E-mail para Contato:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="email" value="<?= ($instituicao[0]->email) ? $instituicao[0]->email : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Telefone para Contato:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input name="telefone" value="<?= ($instituicao[0]->telefone) ? $instituicao[0]->telefone : '' ?>" type="text" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Link do Site:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="url" value="<?= ($instituicao[0]->url) ? $instituicao[0]->url : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Selecione a logo da Instituição Financiadora: <small style="font-size: 10px;">Tamanho Ideal - 180 x 100</small></label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <div class="form-control" >
                                        <input id="imagem" class="col-md-12" type="file" name="logo" id="foto" style="opacity: 0; position: relative;" />
                                        <label id="nomeimagem" class="form-label" style="font-size: 15px; position: absolute; margin-top: -35px;"></label>
                                    </div>
                                </div>
                                <?php if ($instituicao[0]->logo != '/assets/img/grupo/sem_imagem.jpg') : ?>
                                    <div id="logo" style="width: 100px; padding-top: 10px;">
                                        <a id="excluirFoto" href="#"><i class="icon-custom-cross" style="opacity: 0.5; float: right; margin-top: 4px;"></i></a>
                                        <img src="<?= $instituicao[0]->logo ?>" width="100">
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <label class="form-label">Redes Sociais:</label>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Facebook:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="facebook" value="<?= $instituicao[0]->facebook ? $instituicao[0]->facebook : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Google +:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="googleplus" value="<?= $instituicao[0]->googleplus ? $instituicao[0]->googleplus : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Instagram:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="instagram" value="<?= $instituicao[0]->instagram ? $instituicao[0]->instagram : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Twitter:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="twitter" value="<?= $instituicao[0]->twitter ? $instituicao[0]->twitter : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Liked-in:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input name="likedin" value="<?= $instituicao[0]->likedin ? $instituicao[0]->likedin : '' ?>" type="text" class="form-control">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <input type="hidden" name="id" value="<?= $instituicao[0]->id ?>">
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
        $("#form").attr('action', '/social/instituicaoFinanciadora/alterar');
        $("#form").submit();
    });
    $("#excluirFoto").click(function () {
        $.ajax({
            url: '/social/instituicaoFinanciadora/excluirfoto',
            dataType: 'json',
            data: {
                'idInstituicao': <?= $instituicao[0]->id ?>
            },
            success: function (sucesso) {
                if (sucesso.excluido == 1)
                {
                    $("#logo").remove();
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