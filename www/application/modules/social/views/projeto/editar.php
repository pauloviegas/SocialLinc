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
            <a href="<?= base_url('social/projeto/index') . '/' . $projeto[0]->id_laboratorio ?>">Projetos do <?= $projeto[0]->sigla_laboratorio ?></a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('social/projeto/descricao') . '/' . $projeto[0]->id ?>">Descrição do <?= $projeto[0]->sigla ?></a>
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
                <h4>Adicionar um Projeto</h4>
            </div>
            <div class="grid-body ">
                <form id="form" action="<?= base_url('social/projeto/alterar') ?>" method="post" enctype="multipart/form-data">
                    <div class="row">
                        <div class="form-group col-md-12">
                            * Campos Obrigatórios
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Nome do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="nome" value="<?= ($projeto[0]->nome) ? $projeto[0]->nome : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Sigla do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="sigla" value="<?= ($projeto[0]->sigla) ? $projeto[0]->sigla : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Data de Inicio: *</label>
                            <div class="controls">
                                <div class="input-append success date col-md-10 no-padding">
                                    <input id="dataInicio" class="form-control" type="text" name="inicio" value="<?= ($projeto[0]->inicio) ? date('d/m/Y', strtotime($projeto[0]->inicio)) : '' ?>" placeholder="__/__/____"/>
                                    <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Previsão de Termino: *</label>
                            <div class="controls">
                                <div class="input-append success date col-md-10 no-padding">
                                    <input id="dataTermino" class="form-control" type="text" name="termino" value="<?= ($projeto[0]->termino) ? date('d/m/Y', strtotime($projeto[0]->termino)) : '' ?>" placeholder="__/__/____"/>
                                    <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Descrição do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <textarea name="resumo" placeholder="Digite aqui a descrição do projeto..."><?= ($projeto[0]->resumo) ? $projeto[0]->resumo : '' ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label class="form-label">Coordenador do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_coordenador" style="width:100%">
                                        <?php if (count($usuarios) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <option value="<?= $usuario->id ?>" <?= ($projeto[0]->id_coordenador == $usuario->id) ? 'selected' : '' ?> ><?= $usuario->nome ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não Existe Nenhum Usuário Disponível</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Responsável do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_responsavel" style="width:100%">
                                        <?php if (count($usuarios) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($usuarios as $usuario) : ?>
                                                <option value="<?= $usuario->id ?>" <?= ($projeto[0]->id_responsavel == $usuario->id) ? 'selected' : '' ?>><?= $usuario->nome ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não Existe Nenhum Usuário Disponível</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label class="form-label">Instituição Financiadora: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select name="id_financiador" style="width:100%">
                                        <?php if (count($financiadoras) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($financiadoras as $financiadora) : ?>
                                                <option value="<?= $financiadora->id ?>" <?= ($projeto[0]->id_financiador == $financiadora->id) ? 'selected' : '' ?>><?= $financiadora->nome ?></option>
                                            <?php endforeach; ?>
                                        <?php else : ?>
                                            <option value="0">Não Existe Nenhuma Instituição Financeira Disponível</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">
                                Selecione a logo do Projeto:
                                <small style="font-size: 10px;">
                                    Tamanho Ideal - 180 x 150
                                    (Extensões Suportadas: gif - jpg - png)
                                </small>
                            </label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <div class="form-control divImagem">
                                        <input id="imagem" class="col-md-12 inputImagem" type="file" name="logo"/>
                                        <label id="nomeimagem" class="form-label labelImagem"></label>
                                    </div>
                                    <?php if ($projeto[0]->logo != '/assets/img/grupo/projeto.jpg') : ?>
                                        <div id="logo" class="imagemEdicao">
                                            <img src="<?= $url_base . $projeto[0]->logo ?>" width="100">
                                        </div>
                                    <?php endif; ?>
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
                                    <input class="form-control" type="text" name="email" value="<?= ($projeto[0]->email) ? $projeto[0]->email : '' ?>" placeholder="exemplo@exemplo...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="form-label">Telefone para Contato:</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <input id="telefone" class="form-control" type="text" name="telefone" value="<?= ($projeto[0]->telefone) ? $projeto[0]->telefone : '' ?>" placeholder="(__) _____-____">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label class="form-label">Processo:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input id="processo" class="form-control" type="text" name="processo" value="<?= ($projeto[0]->processo) ? $projeto[0]->processo : '' ?>" placeholder="________/_______.___.__">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="form-label">Edital:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="edital" value="<?= ($projeto[0]->edital) ? $projeto[0]->edital : '' ?>">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2" style="margin-top: 25px; text-align: center;">
                            <label class="form-label">Projeto Público ?</label>
                            <div class="radio radio-success">
                                <input id="yes" type="radio" name="publico" value="1" <?= ($projeto[0]->publico) ? 'checked' : '' ?>>
                                <label for="yes">Sim</label>
                                <input id="no" type="radio" name="publico" value="0" <?= ($projeto[0]->publico) ? '' : 'checked' ?>>
                                <label for="no">Não</label>
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
                                    <input class="form-control" type="text" name="facebook" value="<?= ($projeto[0]->facebook) ? $projeto[0]->facebook : '' ?>" placeholder="http://www.exemplo...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Google +:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="googleplus" value="<?= ($projeto[0]->googleplus) ? $projeto[0]->googleplus : '' ?>" placeholder="http://www.exemplo...">
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Instagram:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="instagram" value="<?= $projeto[0]->instagram ? $projeto[0]->instagram : '' ?>" placeholder="http://www.exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Twitter:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="twitter" value="<?= $projeto[0]->twitter ? $projeto[0]->twitter : '' ?>" placeholder="http://www.exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Liked-in:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="likedin" value="<?= $projeto[0]->likedin ? $projeto[0]->likedin : '' ?>" placeholder="http://www.exemplo...">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Link do Site:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="url" value="<?= ($projeto[0]->url) ? $projeto[0]->url : '' ?>" placeholder="http://www.exemplo...">                                 
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <div class="form-group">
                                <div class="controls">
                                    <button id="btnSalvar" type="button" class="btn btn-primary btn-cons">Salvar</button>
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
    $("#btnSalvar").click(function () {
        $("#form").attr('action', '<?= $url_base . 'social/projeto/alterar/' . $projeto[0]->id ?>');
        $("#form").submit();
    });
    $("#dataInicio").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'
        ],
        dayNamesMin: [
            'D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'
        ],
        dayNamesShort: [
            'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'
        ],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
            'Outubro', 'Novembro', 'Dezembro'
        ],
        monthNamesShort: [
            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set',
            'Out', 'Nov', 'Dez'
        ],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
    $("#dataTermino").datepicker({
        dateFormat: 'dd/mm/yy',
        dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado', 'Domingo'
        ],
        dayNamesMin: [
            'D', 'S', 'T', 'Q', 'Q', 'S', 'S', 'D'
        ],
        dayNamesShort: [
            'Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb', 'Dom'
        ],
        monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
            'Outubro', 'Novembro', 'Dezembro'
        ],
        monthNamesShort: [
            'Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set',
            'Out', 'Nov', 'Dez'
        ],
        nextText: 'Próximo',
        prevText: 'Anterior'
    });
    $("#inserir").click(function () {
        $("#form").submit();
    });
    $("#dataInicio").mask("99/99/9999");
    $("#dataTermino").mask("99/99/9999");
    $("#telefone").mask("(99) 9999-9999?9");
    $("#processo").mask("99999999/9999999.999.99");
    //Trata o nome da imagem para inserir no campo de envio da mesma
    $("#imagem").change(function () {
        nomeAntigo = $(this).val();
        posicao = nomeAntigo.lastIndexOf('\\');
        nome = (posicao) ? nomeAntigo.slice(posicao + 1) : nomeAntigo;
        $("#nomeimagem").text(nome);
    });
</script>