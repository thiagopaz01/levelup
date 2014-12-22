<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class MsgRetorno
{
    private $msg;
    private $classe;
    
    function MsgRetorno($newMensagem = "",$newClasse = "")
    {
        $this->msg = $newMensagem;
        $this->classe = $newClasse;
    }
    
    function mensagem_retorno()
    {
        return "<p class='message $this->classe'>
                    $this->msg   
                </p>";
    }
    
    function _msg()
    {
        return $this->msg;
    }
    
    function mensagem()
    {
        $class = "";
        $icon = "";
        switch($this->classe)
        {
            case 'sucesso': $class = "success";$icon = "C"; break;
            case 'erro': $class = "error";$icon = "X";break;
            case 'alerta': $class = "warning";$icon = "!";break;
        }
        
        return "<div class='notice $class'>
                    <span data-icon='$icon' class='icon medium'></span>$this->msg 
                    <a data-icon='x' class='icon close' href='#close' style='display: inline-block;'></a>
                </div>";
    } 
    
    function classe()
    {
        return $this->classe;
    }
}
?>