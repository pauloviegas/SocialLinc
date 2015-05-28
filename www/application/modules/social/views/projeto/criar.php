<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url('/social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('/social/laboratorio/index') ?>">Laboratórios</a>
        </li>
        <i class="icon-angle-right"></i>						 
        <li>
            <a href="<?= base_url('/social/projeto/index/' . $laboratorio[0]->id) ?>">Projetos do <?= $laboratorio[0]->sigla ?></a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="#" class="active">Adicionar</a>
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
                <h4>Adicionar Projeto</h4>
            </div>
            <div class="grid-body ">
                <form id="form" action="/social/projeto/inserir/<?= $idLab ?>" method="post" enctype="multipart/form-data">
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
                                    <input class="form-control" type="text" name="nome" value="<?= (set_value('nome')) ? set_value('nome') : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <label class="form-label">Sigla do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="sigla" value="<?= (set_value('sigla')) ? set_value('sigla') : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Data de Inicio: *</label>
                            <div class="controls">
                                <div class="input-append success date col-md-10 no-padding">
                                    <input id="dataInicio" type="text" name="inicio" placeholder="__/__/____" />
                                    <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label class="form-label">Previsão de Termino: *</label>
                            <div class="controls">
                                <div class="input-append success date col-md-10 no-padding">
                                    <input id="dataTermino" type="text" name="termino" placeholder="__/__/____" />
                                    <span class="add-on"><span class="arrow"></span><i class="icon-th"></i></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="divLinhaPesquisa" class="row">
                        <div class="form-group col-md-12">
                            <label class="form-label">Linha de Pesquisa: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <select class="selectLinhaPesquisa" name="id_linha" style="width:100%">
                                        <?php if (count($linhasPesquisa) > 0) : ?>
                                            <option value="0">Selecione</option>
                                            <?php foreach ($linhasPesquisa as $linhaPesquisa) : ?>
                                                <option value="<?= $linhaPesquisa->id ?>"><?= $linhaPesquisa->linha ?></option>
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
                            <label class="form-label">Descrição do Projeto: *</label>
                            <div class="controls">
                                <div class="input-with-icon right">
                                    <i class=""></i>
                                    <textarea name="resumo" placeholder="Digite aqui a descrição do projeto..."><?= (set_value('resumo')) ? set_value('resumo') : '' ?></textarea>
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
                                                <option value="<?= $usuario->id ?>"><?= $usuario->nome ?></option>
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
                                                <option value="<?= $usuario->id ?>"><?= $usuario->nome ?></option>
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
                                                <option value="<?= $financiadora->id ?>"><?= $financiadora->nome ?></option>
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
                                        <input id="imagem" class="col-md-12 inputImagem" type="file" name="logo" />
                                        <label id="nomeimagem" class="form-label labelImagem"></label>
                                    </div>
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
                                    <input class="form-control" type="text" id="telefone" name="telefone" value="<?= (set_value('telefone')) ? set_value('telefone') : '' ?>" placeholder="(__) _____-____">
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
                                    <input class="form-control" type="text" id="processo" name="processo" value="<?= (set_value('processo')) ? set_value('proceso') : '' ?>" placeholder="________/_______.___.__">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-5">
                            <label class="form-label">Edital:</label>
                            <div class="controls">
                                <div class="input-with-icon right">                                       
                                    <i class=""></i>
                                    <input class="form-control" type="text" name="edital" value="<?= (set_value('edital')) ? set_value('edital') : '' ?>">                                 
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-md-2" style="margin-top: 25px; text-align: center;">
                            <label class="form-label">Projeto Público ?</label>
                            <div class="radio radio-success">
                                <input id="yes" type="radio" name="publico" value="1" checked="checked">
                                <label for="yes">Sim</label>
                                <input id="no" type="radio" name="publico" value="0">
                                <label for="no">Não</label>
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

<div class="modal fade" id="modalLinhaPesquisa" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Linha de Pesquisa</h4>
            </div>
            <div id="modalLinhaPesquisaContent" class="modal-body">
                Você pode adicionar novas linhas de pesquisa ao laboratório, 
                se seu vinculo com o mesmo lhe permitir, com o passar do tempo, 
                na descrição e dição do mesmo!
            </div>
            <div class="modal-footer">
                <form id="formDesvincularUsuario">
                    <input type="hidden" name="controller" value="projeto">
                </form>
                <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>

<script type="text/javascript">
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
    $(".selectLinhaPesquisa").change(function () {
        $('#modalLinhaPesquisa').modal('show');
    });

    $("#inserir").click(function () {
        $("#form").submit();
    });
</script>