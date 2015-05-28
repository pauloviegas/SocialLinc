<?php

class tarefaModel extends AbstractModel
{

    protected $_table = "sitelinc_pro_tarefa";

    public function __construct()
    {

        parent::__construct();
        $this->load->model('usuarioModel');
    }

    public function recuperaTarefasOrganizadas()
    {
        $tarefas = $this->recuperaTodos();
        foreach ($tarefas as $tarefa)
        {
            $usuario = $this->usuarioModel->recuperaPorParametro(NULL, Array('id' => $tarefa->id_usuario));
            if (!empty($usuario))
            {
                $tarefa->nome_usuario = $usuario[0]->nome;
                $tarefa->foto_usuario = $usuario[0]->foto;
            }
            else
            {
                $tarefa->nome_usuario = null;
                $tarefa->foto_usuario = null;
            }
            foreach ($tarefas as $subtarefa)
            {
                if ($tarefa->id == $subtarefa->id_tarefa)
                {
                    $tarefa->subtarefas[] = $subtarefa;
                }
            }
            if ($tarefa->id_tarefa == '')
            {
                $novasTarefas[$tarefa->status][] = $tarefa;
            }
        }
        return $novasTarefas;
    }

}
