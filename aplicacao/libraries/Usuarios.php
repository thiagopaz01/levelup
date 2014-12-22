<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 
class Usuarios
{
	function alterar_senha($id, $msg = null)
	{
		try {
			$CI =& get_instance();
			
			$objUsuarioLogado = $CI->session->userdata('usuario_logado');
			
			$CI->load->model("Usuario");
			$CI->load->library("session");
			
			if (is_numeric($id)) {		
				$objUsuario = $CI->Usuario->retornarObjeto($id);
	
				if (is_object($objUsuario) && $objUsuario->idUsuario != "") {
					
					$data = array();
					$data['objUsuario'] = $objUsuario;
					$data['objUsuarioLogado'] = $objUsuarioLogado;
					$msgInfo = $CI->session->flashdata('msg');
					if ($msgInfo != "") {
						$data['msg'] = $msgInfo;
					} else if ($msg != "") {
						$data['msg'] = new MsgRetorno($msg,"alerta");
					}
					$CI->load->view('admin/usuario/trocar-senha', $data);
						
				} else {
					redirect('/adm/usuarios', 'location');
				}
			} else {
				redirect('/adm/usuarios', 'location');
			}
		} catch (Exception $ex) {
			//Envia os dados para a view
			$msg = new MsgRetorno("Erro ao realizar a operação","erro");
			$CI->session->set_flashdata('msg', $msg);
			redirect('/adm/usuarios', 'location');
		}
	}
	
	function salvar_senha($id, $campos)
	{
		try {
			$CI =& get_instance();
			
			$CI->load->model("Usuario");
			$CI->load->library("session");
			
			if (is_numeric($id)) {		
				$objUsuario = $CI->Usuario->retornarObjeto($id);
	
				if (is_object($objUsuario) && $objUsuario->idUsuario != "") {					
					// validando os campos
					if (strlen($campos['txtSenha']) < 6) {
						$this->alterar_senha($id, 'A senha deve ter pelo menos 6 caracteres');
					} else if ($campos['txtSenha'] != $campos['txtRepSenha']) {
						$this->alterar_senha($id, 'Senhas não conferem');
					} else {
						$objUsuario->senha = sha1($campos['txtSenha']);
						$objUsuario->salvar();
						
						$msg = new MsgRetorno("Senha alterada com sucesso", "sucesso");
						$CI->session->set_flashdata('msg', $msg);
						
						redirect('/adm/usuarios', 'location');
					}					
				}
			}			
		} catch (Exception $ex) {
			//Envia os dados para a view
			$msg = new MsgRetorno("Erro ao realizar a operação","erro");
			$CI->session->set_flashdata('msg', $msg);
			redirect('/adm/usuarios', 'location');
		}
	}

    function gerenciar()
    {
        $CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');

        $CI->load->model("Usuario");
        $CI->load->model("Categoria");
        $CI->load->library("session");

        $lstUsuarios = $CI->Usuario->listar(null,null,'nome ASC',null,null,'idUsuario,nome,email,imagem,idPerfil');

        //Envia os dados para a view
        $data = array();
        $msgInfo = $CI->session->flashdata('msg');
         if($msgInfo != "")
                $data['msg'] = $msgInfo;
        $data['lstUsuarios'] = $lstUsuarios;
        $data['objUsuarioLogado'] = $objUsuarioLogado;
        
        $data['objCategoria'] = $CI->Categoria->retornarObjeto(1);
        
        $CI->load->view('admin/usuario/gerenciar',$data);
    }
	
    function salvar($id=null,$msg=null)
    {
        $CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');
        
        $CI->load->model("Usuario");
        $CI->load->model("Perfil");
        $CI->load->model("Categoria");
        $CI->load->library('session');
        
        $nome = "";
        $email = "";
        $imagem = "";
        $perfil = "";
        
        if($id != "")
        {
            $objUsuario = $CI->Usuario->retornarObjeto($id);
            if(!is_object($objUsuario) || $objUsuario->idUsuario == "")
                show_404();
            else
            {
            	$nome = $objUsuario->nome;
            	$email = $objUsuario->email;
            	$imagem = $objUsuario->imagem;
            	$perfil = $objUsuario->idPerfil;
            }
        }
        else
        {
            $objUsuario = new Usuario();
        }
        //Listar os perfis disponíveis
        $lstPerfis = array();
        $lstTodosPerfis = $CI->Perfil->listar();
        if(is_array($lstTodosPerfis))
        {
            foreach ($lstTodosPerfis as $objPerfil)
            {
                $lstPerfis[$objPerfil->idPerfil] = $objPerfil->descricao;
            }
        }
        
        //Envia os dados para a view
        $data = array();
        $msgInfo = $CI->session->flashdata('msg');
        if($msgInfo != "")
            $data['msg'] = $msgInfo;
        else if($msg != "")
        	$data['msg'] = new MsgRetorno($msg,"alerta");
        $data['id'] = $id;
        $data['nome'] = $nome;
        $data['email'] = $email;
        $data['imagem'] = $imagem;
        $data['perfil'] = $perfil;
        $data['lstPerfis'] = $lstPerfis;
        $data['objUsuarioLogado'] = $objUsuarioLogado;
        $data['objCategoria'] = $CI->Categoria->retornarObjeto(1);
        $CI->load->view('admin/usuario/salvar',$data);
    }
    
    function confirmar($id,$campos)
    {
    	$CI =& get_instance();
        
        $objUsuarioLogado = $CI->session->userdata('usuario_logado');
    	
    	$CI->load->model("Usuario");
    	$CI->load->library('session');
    	
    	try
    	{
            if($id != "")
            {
                $objUsuario = $CI->Usuario->retornarObjeto($id);
                $msg = "Dados atualizados com sucesso";
            }
            else
            {
                $objUsuario = new Usuario;
                $msg = "Dados cadastrados com sucesso";
            }

            //Validar campos
            if($campos['txtNome'] == "")
                    $this->salvar($id,"Nome em branco");
            else if($campos['txtEmail'] == "")
                    $this->salvar($id,"E-mail em branco");
            else if($id == "" && $CI->Usuario->verificarLogin($campos['txtEmail']))
                    $this->salvar($id,"E-mail já cadastrado no sistema");
            else if($id == "" && $campos['txtSenha'] == "")
                    $this->salvar($id,"Senha em branco");
            else if($id == "" && $campos['txtRepSenha'] == "")
                    $this->salvar($id,"Repita sua senha");
            else if($id == "" && strlen($campos['txtSenha']) < 6)
                    $this->salvar($id,"A senha deve ter pelo menos 6 caracteres");
            else if($id == "" && $campos['txtSenha'] != $campos['txtRepSenha'])
                    $this->salvar($id,"Senhas não conferem");
            else
            {
                //Faz upload da imagem do usuário
                $caminho_imagem = $this->_upload("fupImagem");
                if($caminho_imagem != "")
                {
                    crop_imagem("conteudo/$caminho_imagem","conteudo/$caminho_imagem",100,100);
                    if($id != "")
                    {
                        if($objUsuario->imagem != "" && file_exists("conteudo/$objUsuario->imagem"))
                                unlink("conteudo/$objUsuario->imagem");
                    }
                }

                //Insere as informações no banco de dados
                $objUsuario->nome = $campos['txtNome'];
                $objUsuario->email = $campos['txtEmail'];
                if($id == "")
                        $objUsuario->senha = sha1($campos['txtSenha']);

                if ($caminho_imagem != "")
                {
                    $objUsuario->imagem = $caminho_imagem;
                    
                    if ( ($objUsuario->idUsuario != "") && ($objUsuarioLogado->idUsuario == $objUsuario->idUsuario) )
                    {
                        $objUsuarioLogado->imagem = $caminho_imagem;
                    }
                }
                
                $objUsuario->idPerfil = $campos['selPerfil'];
                

                $objUsuario->salvar();

                //Envia os dados para a view
                $msg = new MsgRetorno($msg,"sucesso");
                $CI->session->set_flashdata('msg', $msg);
                redirect('/adm/usuarios', 'location');
            }
    	}
    	catch(Exception $ex)
    	{
    		//Envia os dados para a view
    		$msg = new MsgRetorno("Erro ao realizar a operação","erro");
    		$this->session->set_flashdata('msg', $msg);
    		redirect('/adm/usuarios', 'location');
    	}
    }
    
    function inativar($lstIds)
    {
    	$CI =& get_instance();
    	 
    	$CI->load->model("Usuario");
    	$CI->load->library('session');
    	
    	try
    	{
            if(is_array($lstIds) && count($lstIds) > 0)
            {
                foreach ($lstIds as $id)
                {
                    $objUsuario = $CI->Usuario->retornarObjeto($id);

                    if(is_object($objUsuario))
                            $objUsuario->inativar();
                }
            }

            //Envia os dados para a view
            $msg = new MsgRetorno("Usuários inativados com sucesso","sucesso");
            $CI->session->set_flashdata('msg', $msg);
            redirect('/adm/usuarios', 'location');
    	}
    	catch(Exception $ex)
    	{
            //Envia os dados para a view
            $msg = new MsgRetorno("Erro ao realizar a operação","erro");
            $CI->session->set_flashdata('msg', $msg);
            redirect('/adm/usuarios', 'location');
    	}	
    }
    
    private function _upload($nome_campo)
    {
    	$CI =& get_instance();
    	$CI->load->library('ImgCrop');
    	$ano = date("Y");
    	$mes = date("m");
    	$caminho = "arquivo_adm/imagens/$ano/$mes/";
    	 
    	if(!is_dir("conteudo/arquivo_adm/imagens/$ano"))
    		mkdir("conteudo/arquivo_adm/imagens/$ano");
    	if(!is_dir("conteudo/arquivo_adm/imagens/$ano/$mes/"))
    		mkdir("conteudo/arquivo_adm/imagens/$ano/$mes/");
    	$config["upload_path"] = "./conteudo/$caminho";
    	$config["allowed_types"] = "gif|jpg|png|jpeg";
    	$config["overwrite"] = TRUE;
    	$CI->load->library("upload", $config);
    	//em caso de sucesso no upload
    	if ($CI->upload->do_upload($nome_campo))
    	{
            $dataArquivo = date("YmdHis");

            $novoNome = strtolower($dataArquivo . "_".str_replace("[^a-zA-Z0-9_.]", "", strtr($CI->upload->file_name, "áàãâéêíóôõúüçÁÀÃÂÉÊÍÓÔÕÚÜÇ ","aaaaeeiooouucaaaaeeiooouuc_")));
            rename("conteudo/" . $caminho.$CI->upload->file_name, "conteudo/" . $caminho.$novoNome);
            return $caminho.$novoNome;
    	}
    }
}