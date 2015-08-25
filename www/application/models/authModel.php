<?php

class AuthModel extends abstractModel
{

    public function __construct()
    {

        parent::__construct();
        $this->load->model('usuarioModel');
        $this->load->model('acaoModel');
        $this->load->model('viewPerfilAcaoModel');
    }

    public function logar($email, $senha)
    {
        $usuario = $this->usuarioModel->recupera(Array('senha' => sha1($senha), 'email' => $email));
        if (!$usuario)
        {
            $this->authModel->logout();
            $this->session->set_flashdata('erro', 'Usuário ou senha incorretos!!!');
            redirect('/social/serviceauth/index');
        }
        else
        {
            $permissoes = $this->viewPerfilAcaoModel->gerarPaginasComPermissao($usuario[0]->id);
            $this->session->set_userdata('usuario', $usuario[0]);
            $this->session->set_userdata('usuarioPaginasPermitidas', $permissoes);
            return TRUE;
        }
    }

    public function logout()
    {
        $usuario = $this->session->userdata('usuario');
        if ($usuario)
        {
            $this->session->unset_userdata('usuario');
            $this->session->unset_userdata('usuarioPaginasPermitidas');
            $this->session->unset_userdata('PaginasNaoPrecisaPermissao');
            return TRUE;
        }

        return FALSE;
    }
    
    public function verificaLogin()
    {
        $url = $this->recuperaUrl();
        if ($this->session->userdata('usuario') || $url == 'social/usuario/inserir')
        {
            return TRUE;
        }
        return FALSE;
    }

    public function getInfo($item)
    {

        if ($this->session->userdata($item))
        {

            return $this->session->userdata($item);
        }

        return FALSE;
    }

}
