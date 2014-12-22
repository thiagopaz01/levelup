<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Arquivos
{
	public function excluir($campos)
	{
		$CI =& get_instance();
		$CI->load->model("Conteudo");
		$CI->load->model("Arquivo");
		$CI->load->library('session');
	
		try
		{
			if($campos['idArq'] != "" && $campos['id'] != "")
			{
				$objConteudo = $CI->Conteudo->retornarObjeto($campos['id']);
				if(is_object($objConteudo))
				{
					$lstArquivos = $objConteudo->arquivos();
					if(is_array($lstArquivos) && count($lstArquivos) > 0)
					{
						$objArq = $lstArquivos[$campos['idArq']];
						if(is_object($objArq))
							$objArq->remover();
						echo "0";
					}
					else
						echo "1";
				}
				else
					echo "1";
			}
			else
				echo "1";
		}
		catch(Exception $ex)
		{
			echo "1";
		}
	}
	
	public function excluirTodos($campos)
	{
		$CI =& get_instance();
		$CI->load->model("Conteudo");
		$CI->load->model("Arquivo");
		$CI->load->library('session');
	
		try
		{
				
			if($campos['idArq'] != "" && is_array($campos['idArq']))
			{
				foreach ($campos['idArq'] as $arq)
				{
					$dados = explode("-", $arq);
						
					if(is_array($dados) && count($dados) > 0)
					{
						$idArq = $dados[1];
						$objArquivo = $CI->Arquivo->retornarObjeto($idArq);
						if(is_object($objArquivo))
							$objArquivo->remover();
					}
				}
				//Envia os dados para a view
				$msg = new MsgRetorno("Arquivos excluídos com sucesso","sucesso");
				$CI->session->set_flashdata('msg', $msg);
	
				$urlRet = $campos['urlRet'];
				redirect("adm/$urlRet", 'location');
			}
			else
			{
				$urlRet = $campos['urlRet'];
				redirect("adm/$urlRet", 'location');
			}
		}
		catch(Exception $ex)
		{
			//Envia os dados para a view
			$data = array();
			$msg = new MsgRetorno("Não foi possível excluir os arquivos","erro");
			$CI->session->set_flashdata('msg', $msg);
				
			$urlRet = $campos['urlRet'];
			redirect("adm/$urlRet", 'location');
		}
	}
	
	public function download($idArquivo)
	{
		if(is_numeric($idArquivo))
		{
			$CI =& get_instance();
			$CI->load->model("Conteudo");
			$CI->load->model("Arquivo");
			$CI->load->library('session');
			$CI->load->helper('download');
			
			$objArquivo = $CI->Arquivo->retornarObjeto($idArquivo);
			if(is_object($objArquivo) && $objArquivo->idArquivo != "")
			{
				$data = file_get_contents("conteudo/$objArquivo->caminho");
					
				force_download($objArquivo->titulo, $data);
			}
			
		}
		
	}
}