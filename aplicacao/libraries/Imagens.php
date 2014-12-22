<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Imagens
{
	public function excluir($idImg, $id)
	{
		$CI =& get_instance();
		$CI->load->model("Conteudo");
		$CI->load->model("Imagem");
		$CI->load->library('session');
		
		try
		{
			if($idImg != "" && $id != "")
			{
				$objConteudo = $CI->Conteudo->retornarObjeto($id);
				if(is_object($objConteudo))
				{
					$lstImagens = $objConteudo->imagens();
					if(is_array($lstImagens) && count($lstImagens) > 0)
					{
						$objImg = $lstImagens[$idImg];
						if(is_object($objImg))
							$objImg->remover();
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
	
	public function excluirTodas($campos)
	{
		$CI =& get_instance();
		$CI->load->model("Conteudo");
		$CI->load->model("Imagem");
		$CI->load->library('session');
	
		try
		{
			
			if($campos['idImg'] != "" && is_array($campos['idImg']))
			{
				foreach ($campos['idImg'] as $img)
				{
					$dados = explode("-", $img);
					
					if(is_array($dados) && count($dados) > 0)
					{
						$idImagem = $dados[1];
						$objImagem = $CI->Imagem->retornarObjeto($idImagem);
						if(is_object($objImagem))
							$objImagem->remover();
					}		
				}
				//Envia os dados para a view
				$msg = new MsgRetorno("Imagens excluídas com sucesso","sucesso");
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
			$msg = new MsgRetorno("Não foi possível excluir as imagens","erro");
			$CI->session->set_flashdata('msg', $msg);
			
			$urlRet = $campos['urlRet'];
			redirect("adm/$urlRet", 'location');
		}
	}
}