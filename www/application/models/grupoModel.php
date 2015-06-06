<?php

class grupoModel extends abstractModel
{

    protected $_table = 'sitelinc_gru_grupo';

    public function __construct()
    {

        parent::__construct();
        $this->load->model('grupoVinculoModel');
        $this->load->model('usuarioVinculoModel');
    }

    public function recuperaLaboratoriosComQuantProj()
    {
        $laboratorios = $this->recuperaPorParametro(NULL, Array(
            'id_tipo' => 3,
            'excluido' => 0
        ));
        $labs = Array(
            'meuslabs' => Array(),
            'outroslabs' => Array()
        );
        foreach ($laboratorios as $laboratorio)
        {
            $laboratorio->projeto = $this->grupoVinculoModel->recuperaQuantDeProjetosDoLaboratorio($laboratorio->id);
            if ($this->usuarioVinculoModel->verificaUsuarioLogadoPertenceLaboratorio($laboratorio->id))
            {
                $labs['meuslabs'][] = $laboratorio;
            }
            else
            {
                $labs['outroslabs'][] = $laboratorio;
            }
        }
        return $labs;
    }

}
