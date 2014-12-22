<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Adm extends CI_Controller {

	public function index()
	{		
		$this->login();        
	}
	
	public function login()
	{
		$this->load->model('Usuario');
		$this->load->library('session');
		
		//Verifica se o usuário está logado
		if ($this->session->userdata('usuario_logado'))
		{
			$objUsuarioLogado = $this->session->userdata('usuario_logado');
		
			//Redireciona o usuário pra a home
			redirect('adm/home', 'location');
		}
		else
		{
			//Caso não esteja logado, exibe a tela de login.
			$data = array();
			$data['msg'] = $this->session->flashdata('msg');
			$this->load->view('admin/login',$data);
		}
	}
	
	public function logar()
	{
            try
            {
                $this->load->model('Usuario');
                $this->load->library('session');

                $objUsuario = $this->Usuario->autenticarUsuario($this->input->post('txtLogin'),sha1($this->input->post('txtSenha')));

                if(is_object($objUsuario))
                {
                    if($objUsuario->status == USUARIO_ATIVO)
                    {
                            $this->session->set_userdata('usuario_logado', $objUsuario);
                    redirect('adm/home', 'location');
                    }
                }
                else
                {
                    $msg = new MsgRetorno("Login ou senha inválidos","erro");
                    $this->session->set_flashdata('msg', $msg);
                    redirect('adm/login', 'location');
                }
            }
            catch(Exception $ex)
            {
                    reportarErro($ex);
            }
	}
	
	public function logout()
	{
		$this->load->library('session');
		if ($this->session->userdata('usuario_logado'))
		{
			$objUsuarioLogado = $this->session->userdata('usuario_logado');
			$this->session->unset_userdata('usuario_logado');
		}
		redirect('adm/login', 'location');
	}
    
    public function conteudo($operacao=null,$categoria=null,$id=null)
    {
        if($operacao == "" || $categoria == "")
            show_404();
        else
        {
        	//Verifica se o usuário está logado
        	$objUsuarioLogado = $this->_usuarioLogado();
        	//Valida se o usuário pode visualizar essa categoria
        	if(false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/)
        		show_404();
        	else 
        	{
        		$this->load->library("conteudos");
        		switch($operacao)
        		{
        			case 'salvar': $this->conteudos->salvar($categoria,$id); break;
        			case 'gerenciar': $this->conteudos->gerenciar($categoria); break;
        			case 'excluir': $this->conteudos->excluir($categoria,$this->input->post("check",TRUE),$this->input->post("urlRet",TRUE)); break;
        			case 'visualizar': $this->conteudos->visualizar($categoria,$id); break;
        			case 'confirmar': $this->conteudos->confirmar($categoria,$id,$this->input->post()); break;
        		}
        	}
        }
    }
    
    public function usuario($operacao=null,$id=null)
    {
    	if ($operacao == "") {
            show_404();
    	}
    	
    	//Inserir código de validação de perfil (se necessário)
    	
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
    	
    	//Fim do código de validação de perfil
    	
    	$this->load->library("usuarios");
    	switch($operacao)
    	{
            case 'salvar': $this->usuarios->salvar($id); break;
            case 'gerenciar': $this->usuarios->gerenciar(); break;
            case 'inativar': $this->usuarios->inativar($this->input->post("check",TRUE)); break;
            case 'visualizar': $this->usuarios->visualizar($id); break;
            case 'confirmar': $this->usuarios->confirmar($id,$this->input->post()); break;
            case 'senha': $this->usuarios->alterar_senha($id); break;
            case 'salvarSenha': $this->usuarios->salvar_senha($id, $this->input->post()); break;
    	}
    }
    
    public function buscar_usuario(){
        
        $CI =& get_instance();
        $CI->load->model("Usuario");
    	$CI->load->library('session');
        
        $usuario = $CI->input->post('palavra', TRUE);
        
        $objUsuario = $CI->Usuario->buscarResultado($usuario);
        
        foreach($objUsuario as $user){
            
            if($user->status == 'ativo'){
            
            if(!empty($user->imagem)){
                $imagem = $user->imagem;
            }else{
                $imagem = "arquivo_adm/imagens/noimage.jpg";
            }
            
            $arrayResultado .= '
            <tr>
                <td><input type="checkbox" name="check[]" id="usuario-'.$user->idUsuario.'" value="'.$user->idUsuario.'" class="checkbox"></td>
                <td>
                    <img src="'.base_url('conteudo')."/".$imagem.'" width="100" height="100">
                 </td>
                <td value="'.$user->nome.'"><label title="nome">'.$user->nome.'</label></td>
                <td value="'.$user->email.'">'.$user->email.'</td>
                <td>
                    <a class="tooltip" title="Editar" href="'.base_url('adm/usuario/salvar/')."/".$user->idUsuario.'"><span class="icon gray" data-icon="7" style="display: inline-block;"><span aria-hidden="true">7</span></span></a>
                    <a class="tooltip" href="'.base_url('adm/usuario/senha/')."/".$user->idUsuario.'" title="Alterar senha"><span class="icon gray" data-icon="O" style="display: inline-block;"><span aria-hidden="true">O</span></span></a>
                    <a href="javascript:void(0);" class="tooltip inativarUsuario" title="Inativar Usuário"><span class="icon gray" data-icon="m" style="display: inline-block;"><span aria-hidden="true">m</span></span></a>            	            	
                </td>
            </tr>';
            }
        }
        echo $arrayResultado;
    }
    
    public function listar_usuario(){
        $CI =& get_instance();
        $CI->load->model("Usuario");
    	$CI->load->library('session');
        
        $usuario = $CI->input->post('palavra', TRUE);
        
        $objUsuario = $CI->Usuario->listar(null,null,'nome ASC',null,null,'idUsuario,nome,email,imagem,idPerfil');
        
        foreach($objUsuario as $user){
            
            if(!empty($user->imagem)){
                $imagem = $user->imagem;
            }else{
                $imagem = "arquivo_adm/imagens/noimage.jpg";
            }
            
            $arrayResultado .= '
            <tr class="first">
                <td value=""><input type="checkbox" name="check[]" id="usuario-'.$user->idUsuario.'" value="'.$user->idUsuario.'" class="checkbox"></td>
                <td value="

                 ">
                    <img src="'.base_url('conteudo')."/".$imagem.'" width="100" height="100">
                 </td>
                <td value="'.$user->nome.'"><label title="nome">'.$user->nome.'</label></td>
                <td value="'.$user->email.'">'.$user->email.'</td>
                <td value="">
                    <a class="tooltip" title="Alterar" href="'.base_url('adm/usuario/salvar/')."/".$user->idUsuario.'"><span class="icon gray" data-icon="7" style="display: inline-block;"><span aria-hidden="true">7</span></span></a>
                    <a class="tooltip" href="'.base_url('adm/usuario/senha/')."/".$user->idUsuario.'" title="Alterar senha"><span class="icon gray" data-icon="O" style="display: inline-block;"><span aria-hidden="true">O</span></span></a>
                    <a href="javascript:void(0);" class="tooltip inativarUsuario" title="Inativar Usuário"><span class="icon gray" data-icon="m" style="display: inline-block;"><span aria-hidden="true">m</span></span></a>            	            	
                </td>
            </tr>';
        }
        echo $arrayResultado;
    }
    
    public function imagem($operacao=null, $idImg = null, $id = null)
    {
    	if ($operacao == "") {
    		echo "1";
    	}
    	
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
   
    	$this->load->library("imagens");
    	switch($operacao)
    	{
    		case 'excluir': $this->imagens->excluir($idImg, $id); break;
    		case 'excluirTodas': $this->imagens->excluirTodas($this->input->post()); break;
    	}
    }
    
    public function logs($operacao=null)
    {
        //Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
   
    	$this->load->library("logs_library");
        
    	switch($operacao)
    	{
            case 'visualizar': $this->logs_library->visualizar($this->input->post()); break;
            case 'csv': $this->logs_library->csv($this->input->post()); break;
    	}
    }
        
    public function arquivo($operacao=null,$id=null)
    {
    	if ($operacao == "") {
    		echo "1";
    	}
    	
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
    	 
    	$this->load->library("arquivos");
    	switch($operacao)
    	{
    		case 'excluir': $this->arquivos->excluir($this->input->post()); break;
    		case 'excluirTodos': $this->arquivos->excluirTodos($this->input->post()); break;
    		case 'download': $this->arquivos->download($id); break;
    	}
    }
    
    public function usuarios()
    {
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
    	
    	redirect("adm/usuario/gerenciar");
    }
    
    public function home()
    {
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
    	
    	$CI =& get_instance();
        
        $CI->load->model("Conteudo");
        $CI->load->model("Categoria");
        $CI->load->library('session');
        
        $lstConteudos = $CI->Conteudo->ultimos();
        
        //Envia os dados para a view
        $data = array();
        $data['objUsuarioLogado']   = $objUsuarioLogado;
        $msgInfo = $CI->session->flashdata('msg');
        if($msgInfo != "")
            $data['msg'] = $msgInfo;
        $data['lstConteudos'] = $lstConteudos;

        //$data['objUsuarioLogado'] = $objUsuarioLogado;
        $CI->load->view('admin/dashboard',$data);
    }
    
    private function _usuarioLogado()
    {
    	$CI =& get_instance();
    	$CI->load->model('Usuario');
    	$CI->load->library('session');
    	
    	//Verifica se o usuário está logado
    	if (!$CI->session->userdata('usuario_logado'))
    		redirect('/adm/login', 'location');
    	else
    	{
    		$objUsuarioLogado = $CI->session->userdata('usuario_logado');
    		return $objUsuarioLogado;
    	}
    }
    
    public function contato($operacao = NULL, $categoria = NULL, $id = NULL)
    {
    	if($operacao == "" || $categoria == "")
    		show_404();
    	else
    	{
    		//Verifica se o usuário está logado
    		$objUsuarioLogado = $this->_usuarioLogado();
    		//Valida se o usuário pode visualizar essa categoria
    		if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
    			show_404();
    		}
    		else
    		{
    			$this->load->library("contatos");
    			switch ($operacao) {    				
    				case 'gerenciar':
    					$this->contatos->gerenciar($categoria);
    					break;
    				case 'excluir':
    					$this->contatos->excluir($categoria, $this->input->post("check",TRUE), $this->input->post("urlRet",TRUE));
    					break;
    				case 'visualizar': 
    					$this->contatos->visualizar($categoria, $id);
    					break;    				 					
    			}
    		}
    	}
    }
    
    public function publicacao($operacao = NULL, $categoria = NULL, $id = NULL)
    {
            //Verifica se o usuário está logado
            $objUsuarioLogado = $this->_usuarioLogado();
            //Valida se o usuário pode visualizar essa categoria
            if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                    show_404();
            }
            else
            {
                $this->load->library("publicacao");
                
                switch ($operacao) {
                    case 'gerenciar': $this->publicacao->gerenciar($categoria); break;
                    case 'salvar': $this->publicacao->salvar($id); break;
                    case 'confirmar': $this->publicacao->confirmar($id, $this->input->post()); break;
                    case 'excluir': $this->publicacao->excluir($categoria, $id); break;
                    case 'excluirTodos': $this->publicacao->excluirTodos($categoria, $this->input->post("check",TRUE)); break;
                    case 'excluirArquivo': $this->publicacao->excluirArquivo($categoria, $id); break;
                    case 'excluirInformativo': $this->publicacao->excluirInformativo($categoria, $id); break;
                }
            }
    }
    
    
    public function ideias($operacao = NULL, $categoria = NULL, $id = NULL)
    {
            //Verifica se o usuário está logado
            $objUsuarioLogado = $this->_usuarioLogado();
            //Valida se o usuário pode visualizar essa categoria
            if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                    show_404();
            }
            else
            {
                $this->load->library("ideias");
                switch ($operacao) {
                    case 'gerenciar': $this->ideias->gerenciar($categoria); break;
                    case 'excluir': $this->ideias->excluir($categoria, $this->input->post("check",TRUE), $this->input->post("urlRet",TRUE)); break;
                    case 'excluirTodos': $this->ideias->excluirTodos($categoria, $this->input->post("check",TRUE)); break;
                    case 'visualizar': $this->ideias->visualizar($categoria, $id); break;
                }
            }
    }
    
    public function aniversario($operacao = NULL, $categoria = NULL, $id = NULL)
    {
            //Verifica se o usuário está logado
            $objUsuarioLogado = $this->_usuarioLogado();
            //Valida se o usuário pode visualizar essa categoria
            if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                    show_404();
            }
            else
            {
                $this->load->library("aniversarios");
                switch ($operacao) {
                    case 'gerenciar': $this->aniversarios->gerenciar($categoria); break;
                    case 'excluir': $this->aniversarios->excluir($categoria, $id, $this->input->post("check",TRUE), $this->input->post("urlRet",TRUE)); break;
                    case 'visualizar': $this->aniversarios->visualizar($categoria, $id); break;
                }
            }
    }
    
    public function mensagem($operacao = NULL, $id = NULL)
    {
            //Verifica se o usuário está logado
            $objUsuarioLogado = $this->_usuarioLogado();
            //Valida se o usuário pode visualizar essa categoria
            if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                    show_404();
            }
            else
            {
                $this->load->library("mensagens");
                switch ($operacao) {
                    case 'gerenciar': $this->mensagens->gerenciar(); break;
                    case 'excluir': $this->mensagens->excluir($id, $this->input->post("check",TRUE), $this->input->post("urlRet",TRUE)); break;
                    case 'visualizar': $this->mensagens->visualizar($id); break;
                }
            }
    }
    
    public function chamado($operacao = NULL, $categoria = NULL, $id = NULL)
    {
            //Verifica se o usuário está logado
            $objUsuarioLogado = $this->_usuarioLogado();
            //Valida se o usuário pode visualizar essa categoria
            if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                    show_404();
            }
            else
            {
                $this->load->library("chamados");
                switch ($operacao) {
                    case 'gerenciar': $this->chamados->gerenciar($categoria, $this->input->post()); break;
                    case 'excluir': $this->chamados->excluir($categoria, $this->input->post("check",TRUE), $this->input->post("urlRet",TRUE)); break;
                    case 'visualizar': $this->chamados->visualizar($categoria, $id); break;
                    case 'cancelarChamado': $this->chamados->cancelarChamado($categoria, $id); break;
                    case 'gerar_relatorio': $this->chamados->gerar_relatorio($this->input->post()); break;
                }
            }
    }
    
    public function setor($operacao = NULL, $id = NULL)
    {
        //Verifica se o usuário está logado
        $objUsuarioLogado = $this->_usuarioLogado();
        //Valida se o usuário pode visualizar essa categoria
        if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                show_404();
        }
        else
        {
            $this->load->library("setores");
            switch ($operacao) {
                case 'gerenciar': $this->setores->gerenciar(); break;
                case 'salvar': $this->setores->salvar($id); break;
                case 'confirmar': $this->setores->confirmar($id, $this->input->post()); break;
                case 'excluirTodos': $this->setores->excluirTodos($this->input->post("check",TRUE)); break;
                case 'excluir': $this->setores->excluir($id); break;
                case 'excluirInformativo': $this->setores->excluirInformativo($id); break;
            }
        }
    }
    
    public function cargo($operacao = NULL, $id = NULL)
    {
        //Verifica se o usuário está logado
        $objUsuarioLogado = $this->_usuarioLogado();
        //Valida se o usuário pode visualizar essa categoria
        if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                show_404();
        }
        else
        {
            $this->load->library("cargos");
            switch ($operacao) {
                case 'gerenciar': $this->cargos->gerenciar(); break;
                case 'salvar': $this->cargos->salvar($id); break;
                case 'confirmar': $this->cargos->confirmar($id, $this->input->post()); break;
                case 'excluirTodos': $this->cargos->excluirTodos($this->input->post("check",TRUE)); break;
                case 'excluir': $this->cargos->excluir($id); break;
            }
        }
    }
    
    public function categoriaPublicacoes($operacao = NULL, $id = NULL)
    {
        //Verifica se o usuário está logado
        $objUsuarioLogado = $this->_usuarioLogado();
        //Valida se o usuário pode visualizar essa categoria
        if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                show_404();
        }
        else
        {
            $this->load->library("categoriapublicacoes");
            switch ($operacao) {
                case 'gerenciar': $this->categoriapublicacoes->gerenciar(); break;
                case 'salvar': $this->categoriapublicacoes->salvar($id); break;
                case 'confirmar': $this->categoriapublicacoes->confirmar($id, $this->input->post()); break;
                case 'excluir': $this->categoriapublicacoes->excluir($id); break;
            }
        }
    }
    
    public function atendente($operacao = NULL, $id = NULL){
        
        //Verifica se o usuário está logado
        $objUsuarioLogado = $this->_usuarioLogado();
        //Valida se o usuário pode visualizar essa categoria
        if (false/*!$this->Usuario->verificar_permissao($objUsuarioLogado->idPerfil,$categoria)*/) {
                show_404();
        }
        else
        {
            $this->load->library("atendentes");
            switch ($operacao) {
                case 'gerenciar': $this->atendentes->gerenciar(); break;
                case 'salvar': $this->atendentes->salvar($id); break;
                case 'confirmar': $this->atendentes->confirmar($id, $this->input->post()); break;
                case 'excluir': $this->atendentes->excluir($id); break;
            }
        } 
    }
    
    public function enviar_nova_senha()
    {
    	//Verifica se o usuário está logado
    	$objUsuarioLogado = $this->_usuarioLogado();
    	
    	echo '<pre>'; 
    	var_dump($this->input->post());
    }
    
    public function esqueci_senha($msg=null)
    {
    	try
    	{
    		//Envia dados para a view
    		$data = array();
    		$data['msg'] = null;
    		if($msg != null)
    			$data['msg'] = new MsgRetorno($msg, "alerta");
    		$this->load->view('admin/esqueci-senha', $data);
    	}
    	catch(Exception $ex)
    	{
    		reportarErro($ex);
    	}
    }
    
    public function email_esqueci_senha()
    {
    	try
    	{
    		$this->load->model('Usuario');
    		$this->load->library('session');    		
    
    		$email = $this->input->post("txtEmail");
    		if($email == null || $email == "")
    		{
    			$this->esqueci_senha("Email em branco");
    		}
    		else if($this->Usuario->verificarEmail($email))
    		{
    			$objUsuario = $this->Usuario->retornarUsuarioEmail($email);
    
    			if(is_object($objUsuario) && $objUsuario->email != "")
    			{
    				$novaSenha = gerarSenha(6);
    				$objUsuario->senha = sha1($novaSenha);    				
    				$objUsuario->resetarSenha();
    				
    				//Enviar e-mail ao usuário
    				$this->_enviarEmailEsqueciSenha($objUsuario, $novaSenha);
    
    				$this->esqueci_senha("Uma mensagem foi enviada ao seu e-mail com a sua nova senha");
    
    			}
    			else
    			{
    				$this->esqueci_senha("E-mail não cadastrado no sistema");
    			}
    		}
    		else
    		{
    			$this->esqueci_senha("E-mail não cadastrado no sistema");
    		}
    	}
    	catch(Exception $ex)
    	{
    		reportarErro($ex);
    	}
    }
    
    private function _enviarEmailEsqueciSenha($objUsuario, $novaSenha)
    {
    	$url 			= base_url() . 'conteudo';
		$emailGatilho	= 'planejando@plano4.com.br';
		$urlSite		= base_url();
    	
    	$html = "<table width='494' border='0' align='center' cellpadding='0' cellspacing='0' bgcolor='#FFFFFF'>
    	<tr>
    	<td><a href= '$urlSite' target='_blank'><img src='$url/email/topo.jpg' width='494' height='180' border='0' /></a></td>
    	</tr>
    	<tr>
    	<td>&nbsp;</td>
    	</tr>
    	<tr>
    	<td><table width='454' border='0' align='center' cellpadding='0' cellspacing='0'>
    	<tr>
    	<td><table width='454' border='0' cellspacing='0' cellpadding='0'>
    	<tr>
    	<td height='6'><img src='$url/email/textoPqn_bg_top.jpg' alt='' width='454' height='6' /></td>
    	</tr>
    	<tr>
    	<td bgcolor='#e6e6e6'><table width='452' border='0' align='center' cellpadding='0' cellspacing='0'>
    	<tr>
    	<td width='10' bgcolor='#ffffff'>&nbsp;</td>
    	<td width='415' bgcolor='#ffffff'><font face='Tahoma, Geneva, sans-serif' size='2' color='#000'><b>Mensagem:</b></font> <br />
    	<font face='Tahoma, Geneva, sans-serif' size='2' color='#666666'>
    	Olá <strong>$objUsuario->nome</strong>,<br />
    	sua nova senha é: <strong>$novaSenha</strong> <br />
    	</font></td>
    	<td width='10' bgcolor='#ffffff'>&nbsp;</td>
    	</tr>
    	</table></td>
    	</tr>
    	<tr>
    	<td height='6'><img src='$url/email/textoPqn_bg_bottom.jpg' alt='' width='454' height='6' /></td>
    	</tr>
    	</table></td>
    	</tr>
    	</table></td>
    	</tr>
    	<tr>
    	<td>&nbsp;</td>
    	</tr>
    	<tr>
    	<td><img src='$url/email/rodape.jpg' alt='' width='494' height='87' /></td>
    	</tr>
    	</table>";
    
    	$html = utf8_decode($html);
    	$headers = "MIME-Version: 1.1\r\n";
    	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
    	$headers .= "From: $emailGatilho\r\n"; //E-mail do remetente
    	$headers .= "Reply-To: $emailGatilho\r\n"; //responde para o usuário que enviou
    	$headers .= "Return-Path: $emailGatilho\r\n"; //E-mail do remetente
    	$env = @mail($objUsuario->email, 'Instituto do Coração de Pernambuco - Redefinição de senha', $html, $headers, "-r". "$emailGatilho");
    }
    
}