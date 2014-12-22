<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Conteudos
{
    function salvar($categoria=null, $id=null)
    {
        $CI =& get_instance();
        $CI->load->library('session');
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');
        
        if($categoria == "")
            show_404();
        
        $CI->load->model("Conteudo");
        $CI->load->model("Categoria");
        
        $idCont = "";
        
        if($id != "")
        {
            $objConteudo = $CI->Conteudo->retornarObjeto($id);
            if(!is_object($objConteudo) || $objConteudo->idConteudo == "")
                show_404();
            $objCategoria = $objConteudo->categoria();
            
            $idCont = $id;
        }
        else
        {
            $objCategoria = $CI->Categoria->retornarObjeto($categoria);
            $objConteudo = $objCategoria->conteudo();
            
            if(!is_object($objCategoria) || $objCategoria->idCategoria == "")
                show_404();
            
            if (!is_object($objConteudo) || $objCategoria->url == 'conteudo/gerenciar') {
            	$objConteudo = new Conteudo;
                $objConteudo->idCategoria = $objCategoria->idCategoria;
                
            } else {
            	$idCont = $objConteudo->idConteudo;
            }
        }
        $lstCampos = $objCategoria->campos();
        $objConteudo = $objConteudo->valores();
        //função de inicialização
        if($objCategoria->inicializacao != "")
            call_user_func($objCategoria->inicializacao,$lstCampos,$objConteudo,$objCategoria);
        
        //Envia os dados para a view
        $data = array();
        $msgInfo = $CI->session->flashdata('msg');
        if($msgInfo != "")
            $data['msg'] = $msgInfo;
        
        $data['id'] = $idCont;
        $data['c'] = $categoria;
        $data['objCategoria'] = $objCategoria;
        $data['objConteudo'] = $objConteudo;
        $data['urlRet'] = $objCategoria->urlRetorno;
        $data['lstCampos'] = $lstCampos;
        $data['objUsuarioLogado'] = $objUsuarioLogado;
        $CI->load->view('admin/conteudo/salvar',$data);
    }
    
    function gerenciar($categoria)
    {
        $CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');
        
        $CI->load->model("Conteudo");
        $CI->load->model("Categoria");
        $CI->load->library('session');
        
        $objCategoria = $CI->Categoria->retornarObjeto($categoria);
        if(!is_object($objCategoria) || $objCategoria->idCategoria == "")
            show_404();
        
        $lstConteudos = $objCategoria->conteudos(null,null,null,'dtModificacao DESC');
        
        //Envia os dados para a view
        $data = array();
        $msgInfo = $CI->session->flashdata('msg');
        if($msgInfo != "")
            $data['msg'] = $msgInfo;
        $data['objCategoria'] = $objCategoria;
        $data['lstConteudos'] = $lstConteudos;
        $data['objUsuarioLogado'] = $objUsuarioLogado;
        
        $CI->load->view('admin/conteudo/gerenciar',$data);
    }
    
    function excluir($categoria,$lstIds,$urlRet)
    {
        $CI =& get_instance();
        $CI->load->model("Conteudo");
        $CI->load->model("Categoria");
        $CI->load->library('session');
        
        $objCategoria = $CI->Categoria->retornarObjeto($categoria);
        
        if(is_array($lstIds) && count($lstIds) > 0)
        {
            foreach($lstIds as $id)
            {
                $objCon = $CI->Conteudo->retornarObjeto($id);
                
                if(is_object($objCon) && $objCon->idConteudo != "" && $objCon->idCategoria == $categoria)
                {
                	$lstImagens = $objCon->imagens();                	
                	if(is_array($lstImagens) && count($lstImagens) > 0)
                	{
                		foreach ($lstImagens as $objImg)
                		{
                			$objImg->remover();
                		}
                	}
                	
                	$lstArquivos = $objCon->arquivos();                	
                	if(is_array($lstArquivos) && count($lstArquivos) > 0)
                	{
                		foreach ($lstArquivos as $objArquivo)
                		{
                			$objArquivo->remover();
                		}
                	}
                	
                	$objCon->remover_valores();
                    $objCon->remover();
                }                    
            }
        }
        //Envia os dados para a view
        $msg = new MsgRetorno("Conteúdo excluído com sucesso.","sucesso");
        $CI->session->set_flashdata('msg', $msg);
        if($objCategoria->urlRetorno != "")
        	$urlRet = "adm/$objCategoria->urlRetorno/$categoria"; 
        redirect($urlRet, 'location');
    }
    
    function visualizar($categoria=null, $id=null)
    {
    	$CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');
        
    	$CI->load->model("Conteudo");
    	$CI->load->model("Valor");
    	$CI->load->model("Categoria");
    	$CI->load->model("Imagem");
    	$CI->load->library('session');
    	
    	try
    	{
            if(is_numeric($id))
            {
                $objConteudo = $CI->Conteudo->retornarObjeto($id);
                if(is_object($objConteudo))
                {
                    $objCategoria = $CI->Categoria->retornarObjeto($categoria);
                    $lstCampos = $objCategoria->campos();

                    //função de inicialização
                    if($objCategoria->inicializacao != "")
                            call_user_func($objCategoria->inicializacao,$lstCampos,$objConteudo,$objCategoria);
                    //Envia os dados para a view
                    $data = array();
                    /*$msgInfo = $this->session->flashdata('msg');
                    if($msgInfo != "")
                        $data['msg'] = $msgInfo;*/
                    $data['id'] = $id;
                    $data['c'] = $categoria;
                    $data['objCategoria'] = $objCategoria;
                    $data['objConteudo'] = $objConteudo;
                    $data['lstCampos'] = $lstCampos;
                    $data['objUsuarioLogado'] = $objUsuarioLogado;
                    $CI->load->view('admin/conteudo/visualizar',$data);
                }
                else
                {    				
                    show_404();
                }
            }
            else
            {    			
                show_404();
            }
    	}
    	catch(Exception $ex)
    	{
    		
    	}
    }
    
    function confirmar($categoria,$id,$campos)
    {	
        $CI =& get_instance();
        $CI->load->model("Conteudo");
        $CI->load->model("Valor");
        $CI->load->model("Categoria");
        $CI->load->model("Imagem");
        $CI->load->library('session');
        
        try
        {
            if($id != "")
            {
                $objConteudo = $CI->Conteudo->retornarObjeto($id);
                $objCategoria = $objConteudo->categoria();
                $objImagem = $objConteudo->imagem();
                $msg = "Conteúdo atualizado com sucesso";
            }
            else
            {
                $objCategoria = $CI->Categoria->retornarObjeto($categoria);
                $objConteudo = new Conteudo;
                $objConteudo->idCategoria = $objCategoria->idCategoria;
                $objConteudo->dtCriacao = date("Y-m-d H:i:s");
                $objImagem = new Imagem;
                $msg = "Conteúdo cadastrado com sucesso";
            }
            //Valida os campos
            
            //Resgata os campos
            $lstCampos = $objCategoria->campos();
            $lstValor = array();
            if(is_array($lstCampos))
            {
                foreach($lstCampos as $objCampo)
                {
                    if(in_array($objCampo->tipo,array('text','textarea','editor','select')))
                    {
                        if(isset($campos[$objCampo->id]))
                        {
                            $objValor = new Valor;
                            $objValor->idCampo = $objCampo->idCampo;
                            switch($objCampo->tipo_dado)
                            {
                                case 'text': $objValor->texto = $campos[$objCampo->id]; break;
                                case 'int': $objValor->numero = $campos[$objCampo->id]; break;
                                case 'data': $objValor->data_hora = $campos[$objCampo->id]; break;
                                case 'char': $objValor->char = $campos[$objCampo->id]; break;
                            }
                            
                            $lstValor[] = $objValor;
                        }
                    }
                    else if(in_array($objCampo->tipo,array('multiple','checkbox')))
                    {
                        if(isset($campos[$objCampo->id]) && (is_array($campos[$objCampo->id])))
                        {
                            $primeiro = true;
                            $objValor = new Valor;
                            $objValor->idCampo = $objCampo->idCampo;
                            foreach($campos[$objCampo->id] as $campo)
                            {
                                if($primeiro)
                                {
                                    $objValor->texto = $campo;
                                    $primeiro = false;
                                }
                                else
                                    $objValor->texto .= "|*|$campo";
                            }
                            $lstValor[] = $objValor;
                        }
                    }
                    if(in_array($objCampo->tipo,array('arquivo')))
                    {
                    	$lstArquivos = array();
                    	if(is_array($_FILES[$objCampo->id]['name']))
                    	{
                    		$count = count($_FILES[$objCampo->id]['name']);
                    		
                    		for($ind = 0; $ind < $count; $ind++)
                    		{
                    			if($_FILES[$objCampo->id]["name"][$ind] != "")
                    			{
                    				$nome = $_FILES[$objCampo->id]["name"][$ind];
                    				$nomeArquivo = ($ind+1) . "-" . $_FILES[$objCampo->id]["name"][$ind];
                    				$tamanhoArquivo = $_FILES[$objCampo->id]["size"][$ind];
                    				$tempArquivo = $_FILES[$objCampo->id]["tmp_name"][$ind];
                    				$tipoArquivo = $_FILES[$objCampo->id]['type'][$ind];
                    				 
                    				$caminho_arquivo = $this->_upload_arquivo($nomeArquivo,$tamanhoArquivo,$tempArquivo,$tipoArquivo);
                    				 
                    				//Verifica se ocorreu o upload
                    				if($caminho_arquivo != "")
                    				{
                    					$dados = array();
                    					$dados['nome'] = $nome;
                    					$dados['caminho'] = $caminho_arquivo;
                    					$lstArquivos[] = $dados;
                    				}
                    			}
                    			
                    		}		
                    	}
                    }
                    else if(in_array($objCampo->tipo,array('imagem')))
                    {
                        $CI->load->model("Imagem");
                        $CI->load->model("Tamanho");
                        
                        if(is_array($_FILES[$objCampo->id]['name']))
                        {
                        	$count = count($_FILES[$objCampo->id]['name']);
                        	$lstTodosTamanhos = array();
                        	
                        	for($ind = 0; $ind < $count; $ind++)
                        	{
                        		$nomeArquivo = ($ind+1) . "-" . $_FILES[$objCampo->id]["name"][$ind];
                        		$tamanhoArquivo = $_FILES[$objCampo->id]["size"][$ind];
                        		$tempArquivo = $_FILES[$objCampo->id]["tmp_name"][$ind];
                        		$tipoArquivo = $_FILES[$objCampo->id]['type'][$ind];
                        		
                        		$caminho_imagem = $this->_upload($nomeArquivo,$tamanhoArquivo,$tempArquivo,$tipoArquivo);
                        		
                        		//Verifica se ocorreu o upload
                        		if($caminho_imagem != "")
                        		{
                        			//Resgata os tamanhos das imagens
                        			$tamanhos = explode(";",$objCampo->tamanhos);
                        		
                        			if(is_array($tamanhos))
                        			{
                        				if(!isset($objImagem) && is_null($objImagem))
                        					$objImagem = new Imagem;
                        		
                        				$indice = 1;
                        				$lstTamanhos = array();
                        				foreach($tamanhos as $tamanho)
                        				{
                        					$tamanho = explode(",",$tamanho);
                        		
                        					if(count($tamanho) == 2)
                        					{
                        						$idImg = $ind + 1;
                        						$titProj = TITULO_PROJETO;
                        						$dataArquivo = date("YmdHis");
                        						//$nome = strtolower(str_replace("[^a-zA-Z0-9_.]", "", strtr($_FILES[$objCampo->id]["name"][$ind], "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucaaaaeeiooouuc_")));
                        						
                        						$extensao	= pega_ext($_FILES[$objCampo->id]["name"][$ind]);
                        						$nome		= slug($_FILES[$objCampo->id]["name"][$ind]);
                        						
                        						$ano = date("Y");
                        						$mes = date("m");
                        						$caminho_nova = "arquivo_adm/imagens/$ano/$mes/$titProj-$idImg-$indice-$dataArquivo-$nome" . $extensao;
                        						
                        						crop_imagem("conteudo/$caminho_imagem","conteudo/$caminho_nova",$tamanho[0],$tamanho[1]);
                        						$objTamanho = new Tamanho;
                        						$objTamanho->tamanho = $indice;
                        						$objTamanho->caminho = $caminho_nova;
                        						$lstTamanhos[] = $objTamanho;
                        					}
                        					$indice++;
                        				}
                        				if(file_exists("conteudo/$caminho_imagem"))
                        					unlink("conteudo/$caminho_imagem");
                        			}
                        		}
                        		$lstTodosTamanhos[] = $lstTamanhos;
                        	}
                        }
                    }
                }
                //função de confirmação
                if($objCategoria->confirmacao != "")
                    call_user_func($objCategoria->confirmacao,$lstCampos,$objConteudo,$objCategoria);
                    
                $objConteudo->idUsuario = 1; //ajeitar depois
                if(isset($campos['selOrdem']) && $campos['selOrdem'] != "") {
                	$objConteudo->ordem = $campos['selOrdem'];
                } else {
                	$objConteudo->ordem = 1;
                }
                
                $objConteudo->dtModificacao = date("Y-m-d H:i:s");
                $objConteudo->salvar();
                                                
                if(isset($campos['selOrdem']) && $campos['selOrdem'] != "")
                {                	                	
					$lstTodosConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
					
                	if (is_array($lstTodosConteudos))
                	{
                		for($i = 1; $i <= count($lstTodosConteudos); $i++)
                		{
	                		$lstTodosConteudos[$i-1]->ordem = $i;
	                		$lstTodosConteudos[$i-1]->salvar();
                		}
                	}
                }                
                
                $objConteudo->remover_valores();
                foreach($lstValor as $objValor)
                {
                    $objValor->idConteudo = $objConteudo->idConteudo;
                    $objValor->salvar();
                }
                
                if(isset($lstTodosTamanhos) && is_array($lstTodosTamanhos) && count($lstTodosTamanhos) > 0)
                {
                	foreach ($lstTodosTamanhos as $lstTamanhos)
                	{
                		if(isset($lstTamanhos) && is_array($lstTamanhos) && count($lstTamanhos) > 0)
                		{
                			$objImagem = new Imagem();
                			$objImagem->idConteudo = $objConteudo->idConteudo;
                			$objImagem->dtModificacao = date("Y-m-d H:i:s");
                			$objImagem->salvar();
                			
                			foreach($lstTamanhos as $objTamanho)
                			{
                				$objTamanho->idImagem = $objImagem->idImagem;
                				$objTamanho->salvar();
                			}
                		}
                	}
                	
                }
                //Insere as legendas das imagens
                if(isset($campos['nameimg']) && is_array($campos['nameimg']) && count($campos['nameimg']) > 0)
                {
                	$lstImages = $objConteudo->imagens();
                	foreach ($campos['nameimg'] as $key => $descImg)
                	{
                		$lstImages[$key]->descricao = $descImg;
                		$lstImages[$key]->salvar();
                	}
                }
                
                //Insere as legendas dos arquivos
                if(isset($campos['namearq']) && is_array($campos['namearq']) && count($campos['namearq']) > 0)
                {
                	$lstArqs = $objConteudo->arquivos();
                	foreach ($campos['namearq'] as $key => $descArq)
                	{
                		$lstArqs[$key]->descricao = $descArq;
                		$lstArqs[$key]->salvar();
                	}
                }
                
                //Salvar os arquivos
                if(isset($lstArquivos) && is_array($lstArquivos) && count($lstArquivos))
                {
                	$CI->load->model("Arquivo");
                	foreach ($lstArquivos as $dadosArquivos)
                	{
                		$objArquivo = new Arquivo();
                		$objArquivo->idConteudo = $objConteudo->idConteudo;
                		$objArquivo->titulo = $dadosArquivos['nome'];
                		$objArquivo->caminho = $dadosArquivos['caminho'];
                		$objArquivo->dtModificacao = date("y-m-d H:i:s");
                		
                		$objArquivo->salvar();
                	}
                }
                
                //Envia os dados para a view
                $data = array();
                $msg = new MsgRetorno($msg,"sucesso");
                $CI->session->set_flashdata('msg', $msg);

                $urlRet = "conteudo/gerenciar/$objCategoria->idCategoria";
                if($objCategoria->urlRetorno != "")
                	$urlRet = "$objCategoria->urlRetorno/$objCategoria->idCategoria";
                redirect("adm/$urlRet", 'location');
            }
                
        }
        catch(Exception $ex)
        {
        	if(isset($lstTodosTamanhos) && is_array($lstTodosTamanhos) && count($lstTodosTamanhos) > 0)
        	{
        		foreach ($lstTodosTamanhos as $lstTamanhos)
        		{
        			if(isset($lstTamanhos) && is_array($lstTamanhos) && count($lstTamanhos) > 0)
        			{	 
        				foreach($lstTamanhos as $objTamanho)
        				{
        					if($objTamanho->caminho != "" && file_exists("conteudo/" . $objTamanho->caminho))
        						unlink("conteudo/" . $objTamanho->caminho);
        					$objTamanho->remover();
        				}
        			}
        		}
        		 
        	}
        }
    }
    
    private function _upload($nomeArquivo,$tamanhoArquivo,$tempArquivo,$tipoArquivo)
    {
	    if(ereg("(image)", $tipoArquivo))
	    {
	        $dataArquivo = date("YmdHis");	        
	        $extensao = pega_ext($nomeArquivo);
	        $nomeArquivo = strtolower($dataArquivo . "_" . $nomeArquivo);
	        
	        //$novoNome = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($nomeArquivo, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucnAAAAEEIOOOUUC_"));
	        $novoNome = slug($nomeArquivo);
	        
	        $ano = date("Y");
	        $mes = date("m");
	        $caminho = "arquivo_adm/imagens/$ano/$mes/";
	        $caminhoImagem = $caminho.$novoNome . $extensao;
	        if(!is_dir("conteudo/arquivo_adm/imagens/$ano"))
	            mkdir("conteudo/arquivo_adm/imagens/$ano");
	        if(!is_dir("conteudo/$caminho"))
	            mkdir("conteudo/$caminho");
	            
	        move_uploaded_file($tempArquivo,"conteudo/$caminhoImagem");
	        
			return $caminhoImagem;       
	    }
    }
    
    private function _upload_arquivo($nomeArquivo,$tamanhoArquivo,$tempArquivo,$tipoArquivo)
    {
    	$tipoValido = verificarTipoArquivo($tipoArquivo);    	
    	
    	if($tipoValido)
    	{
    		$dataArquivo = date("YmdHis");
    		$nomeArquivo = strtolower($dataArquivo . "_" . $nomeArquivo);
    		$novoNome = preg_replace("/[^a-zA-Z0-9_.]/", "", strtr($nomeArquivo, "áàãâéêíóôõúüçñÁÀÃÂÉÊÍÓÔÕÚÜÇ ", "aaaaeeiooouucnAAAAEEIOOOUUC_"));
    		
    		$ano = date("Y");
    		$mes = date("m");
    		$caminho = "arquivo_adm/arquivos/$ano/$mes/";
    		$caminhoArquivo = $caminho.$novoNome;
    		if(!is_dir("conteudo/arquivo_adm/arquivos/$ano"))
    			mkdir("conteudo/arquivo_adm/arquivos/$ano");
    		if(!is_dir("conteudo/$caminho"))
    			mkdir("conteudo/$caminho");
    		 
    		move_uploaded_file($tempArquivo,"conteudo/$caminhoArquivo");
    		 
    		return $caminhoArquivo;
    	}
    }
}