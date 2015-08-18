<?php

class usuarioModel extends abstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = 'sitelinc_usu_usuario';

    public function __construct()
    {
        parent::__construct();
        $this->load->model('viewUsuarioGrupoVinculoModel');
    }

    public function recuperaUsuariosQueNaoPertecemAoLab($idLab, $tipoGrupo = NULL)
    {
        $tipoGrupo = ($tipoGrupo) ? $tipoGrupo : 3;
        $usuarios = $this->recupera(Array('excluido' => 0), Array('nome' => 'asc'));
        $usuariosLab = $this->viewUsuarioGrupoVinculoModel->recupera(Array('id_tipo_grupo' => $tipoGrupo, 'id_grupo' => $idLab));
        $outrosUsuarios = Array();
        foreach ($usuarios as $usuario)
        {
            $flag = count($usuariosLab);
            foreach ($usuariosLab as $usuarioLab)
            {
                if ($usuario->id == $usuarioLab->id_usuario)
                {
                    $flag--;
                }
            }
            if ($flag == count($usuariosLab))
            {
                $outrosUsuarios[] = $usuario;
                $flag = 0;
            }
        }
        return $outrosUsuarios;
    }

    public function recuperaUsuariosQueNaoPertecemAoProj($idProj)
    {
        $usuarios = $this->recupera(Array('excluido' => 0), Array('nome' => 'asc'));
        $usuariosLab = $this->viewUsuarioGrupoVinculoModel->recupera(Array('id_tipo_grupo' => 2, 'id_grupo' => $idProj));
        $outrosUsuarios = Array();
        foreach ($usuarios as $usuario)
        {
            $flag = count($usuariosLab);
            foreach ($usuariosLab as $usuarioLab)
            {
                if ($usuario->id == $usuarioLab->id_usuario)
                {
                    $flag--;
                }
            }
            if ($flag == count($usuariosLab))
            {
                $outrosUsuarios[] = $usuario;
                $flag = 0;
            }
        }
        return $outrosUsuarios;
    }

}
