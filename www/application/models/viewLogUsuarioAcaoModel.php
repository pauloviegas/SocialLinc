<?php

class viewLogUsuarioAcaoModel extends AbstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = 'sitelinc_view_log_usuario_acao';

    public function __construct()
    {
        parent::__construct();
    }

    public function recuperaTodos()
    {
        $this->db->order_by('data desc');
        $query = $this->db->get($this->_table);
        $logs = $query->result();
        foreach ($logs as $log)
        {
            $dataTime = $log->data;
            $data = explode('-', date('d/m/Y', strtotime($dataTime)));
            $hora = explode(':', date('H:i:s', strtotime($dataTime)));
            $log->data = $data[0] . ' - ' . ($hora[0] - 4) . ':' . $hora[1] . ':' . $hora[2];
        }
        //var_dump($logs); die();
        return $logs;
    }

}
