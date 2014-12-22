<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contatos
{	
    public function gerenciar($categoria)
    {
        $CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');

        if ($categoria == "") {
                show_404();
        }

        $CI->load->model('Categoria');
        $CI->load->model('Contato');
        $CI->load->library('session');

        $objCategoria = $CI->Categoria->retornarObjeto($categoria);

        if (!is_object($objCategoria) || $objCategoria->idCategoria == "") {
            show_404();
        }

        $lstContatos = $CI->Contato->listar(NUll, NULL, 'dtMensagem DESC');

        $data = Array();		
        $msgInfo = $CI->session->flashdata('msg');
        if ($msgInfo != "") {
                $data['msg'] = $msgInfo;
        }
        $data['objCategoria'] = $objCategoria;
        $data['lstContatos'] = $lstContatos;
        $data['objUsuarioLogado'] = $objUsuarioLogado;

        $CI->load->view('admin/contato/gerenciar', $data);
    }
	
    public function visualizar($categoria, $id)
    {	
        $CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');

        if ($categoria == "" || $id == "") {
                show_404();
        }

        $CI->load->model('Categoria');
        $CI->load->model('Contato');
        $CI->load->library('session');

        $objCategoria	= $CI->Categoria->retornarObjeto($categoria);
        $objContato		= $CI->Contato->retornarObjeto($id);

        if (!is_object($objContato) || !is_object($objCategoria)) {
                show_404();
        }

        $data['objContato']		= $objContato;
        $data['objCategoria']	= $objCategoria;
        $data['objUsuarioLogado'] = $objUsuarioLogado;

        $CI->load->view('admin/contato/visualizar', $data);		
    }
	
    public function excluir($categoria, $lstIds, $urlRet)
    {	
        $CI =& get_instance();
        $CI->load->model('Categoria');
        $CI->load->model('Contato');
        $CI->load->library('session');

        $objCategoria = $CI->Categoria->retornarObjeto($categoria);

        $s = NULL;
        if (count($lstIds) > 1) {
                $s = 's'; // Para colocar mensagem de retorno no plural
        }

        if(is_array($lstIds) && count($lstIds) > 0)
        {
            foreach ($lstIds as $id)
            {
                $objCon = $CI->Contato->retornarObjeto($id);

                if (is_object($objCon) && $objCon->idContato != "")
                {					
                        $objCon->remover();
                }
            }
        }

        //Envia os dados para a view
        $msg = new MsgRetorno("Contato$s excluído$s com sucesso.", "sucesso");
        $CI->session->set_flashdata('msg', $msg);

        if ($objCategoria->urlRetorno != "") {
                $urlRet = "adm/$objCategoria->urlRetorno/$categoria";
        }

        redirect($urlRet, 'location');
    }
}
