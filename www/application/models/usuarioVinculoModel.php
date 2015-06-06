<?php

class usuarioVinculoModel extends abstractModel
{

    protected $_table = 'sitelinc_usu_vinculo';

    public function __construct()
    {
        
        parent::__construct();
    }
    
    public function verificaUsuarioLogadoPertenceLaboratorio($idLaboratorio)
    {
        $this->db->get_where($this->_table, Array(
            'id_usuario' => $this->session->userdata('usuario')->id,
            'id_instituicao' => $idLaboratorio
            ));
        return $this->db->affected_rows();
    }
    
    public function verificaUsuarioLogadoPertenceProjeto($idProjeto)
    {
        $this->db->get_where($this->_table, Array(
            'id_usuario' => $this->session->userdata('usuario')->id,
            'id_instituicao' => $idProjeto
            ));
        return $this->db->affected_rows();
    }

    public function desvinculaVinculaUsuariosProjeto($idProjeto, $idTipo, $idUsuarioAntigo, $idUsuarioNovo)
    {
        $this->deletar(NULL, Array(
            'id_usuario' => $idUsuarioAntigo,
            'id_instituicao' => $idProjeto,
            'id_perfil' => $idTipo
        ));
        $this->inserir(Array(
            'id_usuario' => $idUsuarioNovo,
            'id_instituicao' => $idProjeto,
            'id_perfil' => $idTipo
        ));
    }
}
