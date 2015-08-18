<?php

class tarefaModel extends abstractModel
{

    protected $_table = "sitelinc_pro_tarefa";

    public function __construct()
    {

        parent::__construct();
        $this->load->model('usuarioModel');
    }

}
