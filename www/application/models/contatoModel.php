<?php

class contatoModel extends abstractModel
{

    /**
     * @var String $_table Nome da tabela no banco na qual este Model atua.
     */
    protected $_table = '';

    /**
     * Carrega todos os métodos contidos na classe pai.
     * @param NULL
     * @author Paulo Viegas <pauloviegas93@gmail.com>
     * @return NULL
     */
    public function __construct()
    {

        parent::__construct();
    }

    public function enviarEmail($mensagem)
    {
        $this->email->from($mensagem['email'], $mensagem['nome']);
        $this->email->to('linc@ufpa.br');
        $this->email->subject('Contato');
        $this->email->message($mensagem['mensagem']);
        if ($this->email->send())
        {
            return TRUE;
        }
        else
        {
            return FALSE;
        }
//        require_once(base_url('/PHPMailer-master/class.phpmailer.php'));
//        $To = $mensagem['email'];
//        $Subject = 'Contato Site';
//        $Message = $mensagem['message'] . '<br><br>' . $mensagem['email'];
//        
//        $Host = 'smtp.ufpa.br';
//        $Username = 'linc@ufpa.br';
//        $Password = 'adamo150';
//        $Port = "465";
//
//        $mail = new PHPMailer();
//        $body = $Message;
//        $mail->IsSMTP(); // telling the class to use SMTP
//        $mail->Host = $Host; // SMTP server
//        $mail->SMTPDebug = 0; // enables SMTP debug information (for testing)
//// 1 = errors and messages
//// 2 = messages only
//        $mail->SMTPAuth = true; // enable SMTP authentication
//        $mail->Port = $Port; // set the SMTP port for the service server
//        $mail->Username = $Username; // account username
//        $mail->Password = $Password; // account password
//
//        $mail->SetFrom($Username, 'LINC');
//        $mail->Subject = $Subject;
//        $mail->MsgHTML($body);
//        $mail->AddAddress($To, "");
//
//        if (!$mail->Send())
//        {
//            var_dump('não enviou');
//            $mensagemRetorno = 'Erro ao enviar e-mail: ' . print($mail->ErrorInfo);
//        }
//        else
//        {
//            var_dump('enviou');
//            $mensagemRetorno = 'E-mail enviado com sucesso!';
//        }
//        var_dump($mensagem);
//        die();
    }

}
