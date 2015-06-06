<?php

class viewProjetoModel extends abstractModel
{
    
    protected $_table = 'sitelinc_view_projeto';
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuarioVinculoModel');
    }
    
    public function recuperaProjetosPorLaboratorio($idLab)
    {
        $projetos = $this->recuperaPorParametro(NULL, Array(
            'id_laboratorio' => $idLab,
            'excluido' => 0
        ));
        $projs = Array (
            'meusprojs' => Array(),
            'outrosprojs' => Array()
        );
        foreach ($projetos as $projeto)
        {
            if ($this->usuarioVinculoModel->verificaUsuarioLogadoPertenceProjeto($projeto->id))
            {
                $projs['meusprojs'][] = $projeto;
            }
            else
            {
                $projs['outrosprojs'][] = $projeto;
            }
        }
        return $projs;
    }
}
