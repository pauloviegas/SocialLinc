<?php

class MY_Controller extends MX_Controller
{

    protected $_request;
    public $data = array();

    public function __construct()
    {

        parent::__construct();
        $this->_request = $this->input->post() ? $this->input->post() : $this->input->get();
        $this->data['nomeProjeto'] = "Social LINC";
        $this->data['alliasNomeProjeto'] = "LINC - Laboratório de Inteligencia Computacional e Pesquisa Operacional";
    }

}

class SiteController extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        $this->data['topo'] = $this->load->view('layout/topo', $this->data, TRUE);
        $this->data['rodape'] = $this->load->view('layout/rodape', NULL, TRUE);
    }

}

class SocialController extends MY_Controller
{

    public function __construct()
    {

        parent::__construct();
        if (!$this->authModel->verificaLogin())
        {
            $this->session->set_flashdata('erro', 'Para acessar esta página primeiramente você deve realizar seu login!!!');
            redirect('social/serviceauth/index');
        }
        if (!$this->viewPerfilAcaoModel->verificaPermissao())
        {
            $this->authModel->logout();
            $this->session->set_flashdata('erro', 'Desculpe, mas você não tem permissão para acessar esta página!!!');
            redirect('social/serviceauth/index');
        }

        $this->data['nomeUsuarioLogado'] = explode(' ', $this->session->userdata('usuario')->nome);
        $this->data['topo'] = $this->load->view('layout/topo', $this->data, TRUE);
        $this->data['menulateral'] = $this->load->view('layout/menulateral', $this->data, TRUE);
        $this->data['rodape'] = $this->load->view('layout/rodape', NULL, TRUE);
    }

}
