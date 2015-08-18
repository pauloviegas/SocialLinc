<?php

class projetoModel extends abstractModel
{

    protected $_table = 'sitelinc_pro_projeto';

    public function __construct()
    {

        parent::__construct();
        $this->load->model('grupoVinculoModel');
        $this->load->model('usuarioVinculoModel');
    }

    public function inserirVinculosDeProjeto($idProjeto, $idCoordenador, $idResponsavel, $idLab, $idFinanciador = NULL)
    {
        $vinculoCoordenador = $this->usuarioVinculoModel->inserir(Array(
            'id_usuario' => $idCoordenador,
            'id_instituicao' => $idProjeto,
            'id_perfil' => 8
        ));
        $vinculoResponsavel = $this->usuarioVinculoModel->inserir(Array(
            'id_usuario' => $idResponsavel,
            'id_instituicao' => $idProjeto,
            'id_perfil' => 9
        ));
        $vinculoLaboratorio = $this->grupoVinculoModel->inserir(Array(
            'id_grupo_vinculado' => $idProjeto,
            'id_grupo' => $idLab,
            'id_tipo' => 1
        ));
        if ($idFinanciador)
        {
            $this->grupoVinculoModel->inserir(Array(
                'id_grupo_vinculado' => $idProjeto,
                'id_grupo' => $idFinanciador,
                'id_tipo' => 2
            ));
        }
        if ($vinculoCoordenador && $vinculoResponsavel && $vinculoLaboratorio)
        {
            $sucesso = 1;
        }
        else
        {
            $sucesso = 0;
        }
        return $sucesso;
    }

}
