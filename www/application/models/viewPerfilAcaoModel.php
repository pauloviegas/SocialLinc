<?php

class viewPerfilAcaoModel extends abstractModel
{

    protected $_table = 'sitelinc_view_perfil_acao';

    public function __construct()
    {

        parent::__construct();
        $this->load->model('acaoModel');
    }

    public function gerarPaginasSemPermissao()
    {
        $Permissoes = $this->acaoModel->recupera(Array('permissao' => 0));
        foreach ($Permissoes as $Permissao)
        {
            $novoObjeto = new stdClass();
            $novoObjeto->acao = $Permissao->modulo . '/' . $Permissao->controller . '/' . $Permissao->action;
            $novoObjeto->alias_controller = $Permissao->alias_controller;
            $novoObjeto->alias_action = $Permissao->alias_action;
            $novoObjeto->permissao = $Permissao->permissao;
            $perm[] = $novoObjeto;
        }
        return $perm;
    }

    public function gerarPaginasComPermissao($idUser)
    {
        $permissoesUsuario = $this->recupera(Array('id_usuario' => $idUser));
        foreach ($permissoesUsuario as $permissaoUsuario)
        {
            $novoObjeto = new stdClass();
            $novoObjeto->acao = $permissaoUsuario->acao;
            $novoObjeto->alias_controller = $permissaoUsuario->controller;
            $novoObjeto->alias_action = $permissaoUsuario->action;
            $novoObjeto->permissao = $permissaoUsuario->permissao;
            $novoObjeto->id_instituicao = $permissaoUsuario->id_instituicao;
            $permissoes[] = $novoObjeto;
        }
        return $permissoes;
    }

    public function verificaPermissao($acao = NULL, $grupo = NULL)
    {
        $PaginasNaoPrecisaPermissao = $this->session->userdata('PaginasNaoPrecisaPermissao');
        $usuarioPaginasPermitidas = $this->session->userdata('usuarioPaginasPermitidas');
        $url = $this->recuperaUrl();
        $idGrupo = ($grupo != NULL) ? $grupo : ($this->uri->segment(4) == FALSE) ? 1 : $this->uri->segment(4);
        $acaoAtual = ($acao != NULL) ? $acao : $url;
        foreach ($PaginasNaoPrecisaPermissao as $PaginaNaoPrecisaPermissao)
        {
            if ($PaginaNaoPrecisaPermissao->acao == $acaoAtual)
            {
                return TRUE;
            }
        }
        if ($usuarioPaginasPermitidas)
        {
            foreach ($usuarioPaginasPermitidas as $usuarioPaginaPermitida)
            {
                if ($usuarioPaginaPermitida->acao == $acaoAtual && ($usuarioPaginaPermitida->id_instituicao == $idGrupo || $usuarioPaginaPermitida->id_instituicao == 1))
                {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

}
