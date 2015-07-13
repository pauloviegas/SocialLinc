<?= $topo ?>
<?= $menulateral ?>

<div class="cascalho">
    <ul class="breadcrumb">
        <li>
            <a href="<?= base_url('social/home/index') ?>">Feed</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="<?= base_url('social/perfil/index') ?>">Perfis e Permissões</a>
        </li>
        <i class="icon-angle-right"></i>
        <li>
            <a href="#" class="active">Permissões</a>
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

<?php if (count($controllers) > 0) : ?>
    <div class="row">
        <?php foreach ($controllers as $controller => $permissoes) : ?>
            <div class="col-md-4">
                <div class="grid simple vertical green">
                    <div class="grid-title no-border">
                        <h4><span class="semi-bold"><?= $controller ?></span></h4>
                        <div class="tools" style="margin-top: 5px;">
                            <a href="javascript:;" class="expand"></a>
                        </div>
                    </div>
                    <div class="grid-body no-border" style="overflow: hidden; display: none;">
                        <?php foreach ($permissoes as $permissao) : ?>
                            <div class="row-fluid ">
                                <div class="row-fluid">
                                    <div class="checkbox check-primary checkbox-circle">
                                        <input id="checkbox<?= $permissao->id ?>" type="checkbox" value="1" <?= ($permissao->perfilPermissao) ? 'checked' : '' ?>>
                                        <label id="<?= $permissao->id ?>" class="permissao" for="checkbox<?= $permissao->id ?>"><?= $permissao->alias_action ?></label>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div> 
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
<input type="hidden" id="idPerfil" name="idUsuario" value="<?= $idPerfil ?>">


<div class="modal fade" id="modalAviso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">AVISO IMPORTANTE!!!</h3>
            </div>
            <div class="modal-body">
                <p>
                    As permissões são dadas a perfis, não a usuários, portanto, para
                    que um usuário tenha uma determinada permissão a mesma os 
                    devidos passos deverão ser seguidos:
                </p>
                <ol class="bold">
                    <li>
                        <span class="normal">
                            Conceder tal permissão a um perfil;
                        </span>
                    </li>
                    <li>
                        <span class="normal">
                            Escolher o grupo (Laboratório ou Projeto) onde o
                            usuário terá a permissão vinculada no passo 1;
                        </span>
                    </li>
                    <li>
                        <span class="normal">
                            Acessar este grupo (Laboratório ou Projeto);
                        </span>
                    </li>
                    <li>
                        <span class="normal">
                            Vincular este usuário, neste grupo (Laboratório ou 
                            Projeto), com este determinado perfil.
                        </span>
                    </li>
                </ol>
                <p>
                    <b>Observação 01: </b>
                    As permissões funcionam através do vinculo entre um usuário
                    e um grupo, sendo assim, os perfis detem as permissões e os
                    usuários usufruem destas ao serem vinculados a um grupo 
                    através deste perfil.<br>
                    Exemplo:<br>
                    Se o perfil X tem as permissões: A, B e C somente ao vincular
                    o usuário Y a um grupo ele deterá estas permissões e somente
                    neste grupo.
                </p>
                <br>
                <p>
                    <b>OBSERVAÇÃO 02: </b>
                    O grupo Administrativo refere-se unica e exclusivamente ao
                    sistema.<br>
                    Deve-se ter em mente que caso um usuário seja vinculado ao
                    grupo Administrativo todas as permissões concedidas ao 
                    perfil do vinculo valerão sobre todo o sistema.
                </p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
    </div>
</div>

<?= $rodape ?>
<script type="text/javascript">
    $("#modalAviso").modal('show');
    $(".permissao").click(function () {
        var idAcao = $(this).attr('id');
        var idPerfil = $('#idPerfil').attr('value');
        $.ajax({
            url: '<?= base_url('social/permissao/atualizarPermissao') ?>',
            type: 'post',
            data: {
                'idAcao': idAcao,
                'idPerfil': idPerfil
            },
            dataRype: "json",
            success: function (resposta) {
                if (resposta == 0)
                {
                    $(".content").prepend('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>'
                            + 'Ops... Ocorreu um erro e a permissão não foi dada ou retirada com sucesso, por favor tente novamente.' + '</div>');
                }
            }
        });
    });
</script>