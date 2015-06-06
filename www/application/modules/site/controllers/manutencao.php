<?php

class manutencao extends SiteController
{

    /**
     * Carrega todos os métodos contidos na classe pai, bem como a Model acaoModel.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        //Redirecionamento
        $this->load->view('home/manutencao', $this->data);
    }

}
