<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function gerarSenha($length) {
	$vowels = "aeiou";
	$consonants = "bdghjmnpqrstvz0123456789";

	$password = "";
	$alt = time() % 2;
	for ($i = 0; $i < $length; $i++) {
		if ($alt == 1) {
			$password .= $consonants[(rand() % strlen($consonants))];
			$alt = 0;
		} else {
			$password .= $vowels[(rand() % strlen($vowels))];
			$alt = 1;
		}
	}
	return $password;
}

function pega_ext($nome_arq)
{
	$ext = explode('.',$nome_arq);
	return '.' . end($ext);
}

function verificarTipoArquivo($tipo)
{
	// Array com tipos válidos
	$tiposValidos	= Array('pdf', 'msword', 'wordprocessingml', 'mpeg', 'xlsx', 'csv', 'JPG', 'xls', 'jpg', 'png');
	$valido			= false;
	
	foreach ($tiposValidos as $tp) {
		if (stristr($tipo, $tp)) {
			$valido = true;
			break;
		}
	}
	
	return $valido;
}

function arquivoValido($tipo)
{
	// Array com tipos válidos
	$tiposValidos	= Array('pdf', 'msword', 'wordprocessingml');
	$valido			= false;

	foreach ($tiposValidos as $tp) {
		if (stristr($tipo, $tp)) {
			$valido = true;
			break;
		}
	}

	return $valido;
}

function formataDataMySql($data)
{
   	$vetorData = explode('/',$data);
	return $vetorData[2] . "-" . $vetorData[1] . "-" . $vetorData[0];
}

function formataHora($data)
{
	$dataHora	= explode(' ', $data);
	$hora		= explode(':', $dataHora[1]);
	
	return $hora[0] . ':' . $hora[1];
}

function data($data)
{
        /*
    
        $vetorData = explode('/',$data);
        
        if($vetorData[1] == '01'){ $mes = "JAN"; }
        if($vetorData[1] == '02'){ $mes = "FEV"; }
        if($vetorData[1] == '03'){ $mes = "MAR"; }
        if($vetorData[1] == '04'){ $mes = "ABR"; }
        if($vetorData[1] == '05'){ $mes = "MAI"; }
        if($vetorData[1] == '06'){ $mes = "JUN"; }
        if($vetorData[1] == '07'){ $mes = "JUL"; }
        if($vetorData[1] == '08'){ $mes = "AGO"; }
        if($vetorData[1] == '09'){ $mes = "SET"; }
        if($vetorData[1] == '10'){ $mes = "OUT"; }
        if($vetorData[1] == '11'){ $mes = "NOV"; }
        if($vetorData[1] == '12'){ $mes = "DEZ"; }
        
    return $vetorData[0] .' '. $mes .' '. $vetorData[2] ;
        */
    
        $vetorData = explode(' ',$data);
        
        $dataDia = $vetorData[0];
                
        $dataDia = explode('-', $dataDia);
        
        if($dataDia[1] == '01'){ $mes = "JAN"; }
        if($dataDia[1] == '02'){ $mes = "FEV"; }
        if($dataDia[1] == '03'){ $mes = "MAR"; }
        if($dataDia[1] == '04'){ $mes = "ABR"; }
        if($dataDia[1] == '05'){ $mes = "MAI"; }
        if($dataDia[1] == '06'){ $mes = "JUN"; }
        if($dataDia[1] == '07'){ $mes = "JUL"; }
        if($dataDia[1] == '08'){ $mes = "AGO"; }
        if($dataDia[1] == '09'){ $mes = "SET"; }
        if($dataDia[1] == '10'){ $mes = "OUT"; }
        if($dataDia[1] == '11'){ $mes = "NOV"; }
        if($dataDia[1] == '12'){ $mes = "DEZ"; }
        
        return $dataDia[2] .' '. $mes .' '. $dataDia[0];
        
    
}

function get_menu()
{
	$CI =& get_instance();
	$CI->load->model("Categoria");
	$lstMenu = $CI->Categoria->listar(null, null, 'ordem ASC', null, null);
	return $lstMenu;
}

/* PORTAL */
function get_qtdMensagem($idPost)
{
        $CI =& get_instance();
        $CI->load->model("Mensagem");
        $lstMensagem = $CI->Mensagem->listar($idPost);
        return $lstMensagem;
}

function get_Arquivos($id)
{
        $CI =& get_instance();
        $CI->load->model("Arquivo");
        $lstArquivo = $CI->Arquivo->listarArquivosPosts($id);
        return $lstArquivo;
}

function get_Setor($id)
{
        $CI =& get_instance();
        $CI->load->model("Setor");
        $nomeSetor = $CI->Setor->nomeSetor($id);
        return $nomeSetor[0]->nome;
}

function get_Cargo($id)
{
        $CI =& get_instance();
        $CI->load->model("Cargo");
        $nomeCargo = $CI->Cargo->nomeCargo($id);
        return $nomeCargo[0]->nome;
}

function get_nomeCategoria($id)
{
        $CI =& get_instance();
        $CI->load->model("CategoriaPublicacao");
        $nomeCargo = $CI->CategoriaPublicacao->nomeCategoria($id);
        return $nomeCargo[0]->nome;
}

function get_Atendente($id)
{
        $CI =& get_instance();
        $CI->load->model("Atendente");
        $nomeAtendente = $CI->Atendente->nomeAtendente($id);
        return $nomeAtendente[0]->nomeUsuario;
}

function getImagem($id)
{
        $CI =& get_instance();
        $CI->load->model('Imagem');
        $imageCaminho = $CI->Imagem->retornarImagem($id);
        return $imageCaminho[0]->caminho;
}

function encurtarTitulo($titulo)
{
        $cut = substr($titulo, 0, 78);
        $pos = strrpos($cut, ' ');
        $titulo = substr($titulo, 0, $pos);
        return $titulo . '...';
}

function get_CursoById($idConteudo)
{
        $CI =& get_instance();
        $CI->load->model("Conteudo");
        $lstCursos = $CI->Conteudo->valores();
        return $lstCursos;
}

function get_qtdPostsCurso($idCurso)
{
        $CI =& get_instance();
        $CI->load->model("Posts");
        $lstPosts = $CI->Posts->postsByCurso($idCurso);
        return $lstPosts;
}
/* PORTAL */

function detect_ie()
{
	if (isset($_SERVER['HTTP_USER_AGENT']) &&
			(strpos($_SERVER['HTTP_USER_AGENT'], 'MSIE') !== false))
		return true;
	else
		return false;
}

function menu($objMenu)
{
    if($objMenu->idCategoria != '15'){
	$lstSubMenus = $objMenu->menus('ordem ASC');
	$htmlSub = "";
	if(is_array($lstSubMenus) && count($lstSubMenus) > 0)
	{
		$htmlSub = "<ul>";
		foreach ($lstSubMenus as $objSubMenu)
		{
			$htmlSub .= menu($objSubMenu);
		}
		$htmlSub .= "</ul>";
	}
	$url = "javascript:void(0);";
        if($objMenu->descricao != 'Parabenizações'){
	if($objMenu->url != "")
		$url = base_url("adm/$objMenu->url/$objMenu->idCategoria");
	return "<li class='divider'><a href='$url'><span class='icon' data-icon='$objMenu->icone'></span>$objMenu->descricao</a>$htmlSub</li>";
        }
    }
}

function file_extension($filename)
{
    $path_info = pathinfo($filename);
    return $path_info['extension'];
}

function gerarJSON($dados)
{
    $retorno = "[";
    
    if(is_array($dados))
    {
        $retorno .= "{";
        $i = 0;
        foreach($dados as $key => $dado)
        {
            if($i != 0)
                $retorno .= ",";
                
            $retorno .= "\"$key\":";
            if(is_array($dado))
                $retorno .= gerarJSON($dado);
            else
                $retorno .= "\"$dado\"";
            $i++;
        }
        $retorno .= "}";
    }
    $retorno .= "]";
    
    return $retorno;
}

function formataDataBR($data)
{
	if($data == null || $data == "")
		return "";
	else
	{
		$vetorDataHora = explode(' ',$data);
		$vetorData = explode('-',$vetorDataHora[0]);
		return $vetorData[2] . "/" . $vetorData[1] . "/" . $vetorData[0];
	}
}

function otherDiffDate($end='2020-06-09 10:30:00', $out_in_array=false){
	try
	{
		$intervalo = date_diff(date_create(), date_create($end));
		$out = $intervalo->format("Years:%y,Months:%m,Days:%d,Hours:%h,Minutes:%i,Seconds:%s");
		if(!$out_in_array)
			return $out;
		$a_out = array();
		foreach(explode(',',$out) as $valor)
		{
			$v=explode(':',$valor);
			$a_out[$v[0]] = $v[1];
		}
		return $a_out;
	}
	catch(Exception $ex)
	{
		print_r($end);exit;
	}

}

function data_passada($data)
{
	$date_array = otherDiffDate($data,true);

	if($date_array['Years'] > 0)
	{
		if($date_array['Years'] == 1)
			return "1 ano atrás";
		else
			return (int)($date_array['Years']) . " anos atrás";
	}
	else if($date_array['Months'] > 0)
	{
		if($date_array['Months'] == 1)
			return "1 mês atrás";
		else
			return (int)($date_array['Months']) . " meses atrás";
	}
	else if($date_array['Days'] > 0)
	{
		if($date_array['Days'] == 1)
			return "1 dia atrás";
		else
			return (int)($date_array['Days']) . " dias atrás";
	}
	else if($date_array['Hours'] > 0)
	{
		if($date_array['Hours'] == 1)
			return "1 hora atrás";
		else
			return (int)($date_array['Hours']) . " horas atrás";
	}
	else if($date_array['Minutes'] > 0)
	{
		if($date_array['Minutes'] == 1)
			return "1 minuto atrás";
		else
			return (int)($date_array['Minutes']) . " minutos atrás";
	}
	else if($date_array['Seconds'] > 0)
	{
		if($date_array['Seconds'] == 1)
			return "1 segundo atrás";
		else
			return (int)($date_array['Seconds']) . " segundos atrás";
	}
	else
	{
		return "Agora mesmo";
	}
}

function formataDataBRcomHora($data)
{
	$vetorDataHora = explode(' ',$data);
	$vetorData = explode('-',$vetorDataHora[0]);
	$vetorHora = explode(':',$vetorDataHora[1]);
	$dataAlt =  $vetorData[2] . "/" . $vetorData[1] . "/" . $vetorData[0];
	$horaAlt = $vetorHora[0] . ":" . $vetorHora[1] . ":" . $vetorHora[2];
	return $dataAlt . " &agrave;s " . $horaAlt;
}

function formataDataBRcomHora2($data)
{
	$vetorDataHora = explode(' ',$data);
	$vetorData = explode('-',$vetorDataHora[0]);
	$vetorHora = explode(':',$vetorDataHora[1]);
        
        switch ($vetorData[1]) {
            case 01: $mes = 'JAN'; break;
            case 02: $mes = 'FEV'; break;
            case 03: $mes = 'MAR'; break;
            case 04: $mes = 'ABR'; break;
            case 05: $mes = 'MAI'; break;
            case 06: $mes = 'JUN'; break;
            case 07: $mes = 'JUL'; break;
            case 08: $mes = 'AGO'; break;
            case 09: $mes = 'SET'; break;
            case 10: $mes = 'OUT'; break;
            case 11: $mes = 'NOV'; break;
            case 12: $mes = 'DEZ'; break;
        }
        
	$dataAlt =  $vetorData[2] . " " . $mes . " " . $vetorData[0];
	$horaAlt = $vetorHora[0] . ":" . $vetorHora[1]. 'H';
	return $dataAlt . " às " . $horaAlt;
}

function inserirCampo($tipo,$nome=null,$id=null,$classe=null,$valor=null,$array=null)
{
    $html = "";
    switch($tipo)
    {
        case 'text':
        $html = "<label for='$id'>$nome</label>
			    <input id='$id' name='$id' class='$classe' type='text' value='" . set_value('$id',$valor) ."'>";
        break;
        
        case 'imagem':
        
        if(is_array($array) && count($array) > 0)
        {
        	$html .= " <br />
			<br /><div class='util'>
			          <strong>Escolha:</strong> 
			            <a href='javascript:void(0);' class='tooltip selecionarTodos' title='selecionar todos'><span class='icon darkgray' data-icon='c'></span> Selecionar todos</a> 
			            <a href='javascript:void(0);' class='tooltip desmarcarTodos' title='desmarcar todos'><span class='icon darkgray' data-icon='m'></span> Desmarcar todos</a> 
				        <a href='javascript:void(0);' class='tooltip excluirTodasImg' title='excluir selecionados'><span class='icon darkgray' data-icon='T'></span> Excluir selecionados</a> 
					</div>
			            
			            <div>
			            	
			            	<table class='sortable selectTable' cellspacing='0' cellpadding='0'>
			            	<thead>
			            	<tr>
			            	<th><span class='icon darkgray' data-icon='C'></span></th>
			            	<th>Imagem</th>
			            	<th>Título</th>
			            	<th>Ações</th>
			            	</tr>
			            	</thead>
			            	<tbody>";
        	foreach ($array as $key => $dados)
        	{
        		$html .= "<tr>
	            	<td><input type='checkbox' name='idImg[]' value='idImg-" . $dados["idImg"] ."'></td>
	            	<td><img src='" . $dados["caminho"] ."' height='90' /></td>
	            	<td><input type='text' name='nameimg[]' id='nameImg-$key' value='" . $dados["descricao"] ."'></td>
	            	<td>
	                	<a href='javascript:void(0);' class='excluirImagem' id='imagem-$key'><span class='icon gray' data-icon='T'></span></a></td>
	            	</tr>";
        	}
        	$html .= "</tbody>
		            	</table>
		            </div>";
        }
		if(detect_ie())
		{
			$html .= "<label>Novas imagens</label>
			<p class='campo-$id'>
            <label for='" . $id . "[]'>1.</label>
            	<input type='file' name='" . $id . "[]' value='' /><a class='button small removerCampo' href='javascript:void(0);' id='remover-$id-1'>Remover Imagem</a>
            </p>
            <p>
				<a href='javascript:void(0);' class='button small adicionarCampo' id='add-$id'> + Adicionar Imagem</a>
			</p>";
		}
		else
		{			
			$html .= "<label for='$id'>Novas imagens <span>Você pode selecionar várias imagens</span></label>
			<input id='$id' name='" . $id . "[]' type='file' multiple='multiple'/>";
		}
        break;
                
        case 'foto':
        
		if(is_array($array) && count($array) > 0)
        {
        	$html .= " <br />
        	<br /><div class='util'>
        	<strong>Escolha:</strong>
        	<a href='javascript:void(0);' class='tooltip selecionarTodos' title='selecionar todos'><span class='icon darkgray' data-icon='c'></span> Selecionar todos</a>
        	<a href='javascript:void(0);' class='tooltip desmarcarTodos' title='desmarcar todos'><span class='icon darkgray' data-icon='m'></span> Desmarcar todos</a>
        	<a href='javascript:void(0);' class='tooltip excluirTodasImgAcao' title='excluir selecionados'><span class='icon darkgray' data-icon='T'></span> Excluir selecionados</a>
        	</div>
        	 
        	<div>
        
       		<table class='sortable selectTable' cellspacing='0' cellpadding='0'>
       		<thead>
       		<tr>
       		<th><span class='icon darkgray' data-icon='C'></span></th>
       		<th>Imagem</th>
       		<th>Título</th>
       		<th>Ações</th>
       		</tr>
       		</thead>
       		<tbody>";
       		foreach ($array as $key => $dados)
       		{
       			$html .= "<tr>
       			<td><input type='checkbox' name='idImg[]' value='idImg-" . $dados["idImg"] ."'></td>
       			<td><img src='" . $dados["caminho"] ."' height='90' /></td>
       			<td><input type='text' name='nameimg[]' id='nameImg-$key' value='" . $dados["descricao"] ."'></td>
       			<td>
       			<a href='javascript:void(0);' class='excluirImagemAcao' id='imagem-$key'><span class='icon gray' data-icon='T'></span></a></td>
       			</tr>";
       		}
       		
       		$html .= "</tbody>
       		</table>
       		</div>";
        }
        /*if(detect_ie())
        {
	        $html .= "<label>Novas imagens</label>
	        <p class='campo-$id'>
	        <label for='" . $id . "[]'>1.</label>
	        <input type='file' name='" . $id . "[]' value='' /><a class='button small removerCampo' href='javascript:void(0);' id='remover-$id-1'>Remover Imagem</a>
	        </p>
	        <p>
	        <a href='javascript:void(0);' class='button small adicionarCampo' id='add-$id'> + Adicionar Imagem</a>
	        </p>";
		}
        else
        {
        	$html .= "<label for='$id'>Novas imagens <span>Você pode selecionar várias imagens</span></label>
        	<input id='$id' name='" . $id . "[]' type='file' multiple='multiple'/>";
        }*/
        break;        
        
        case 'arquivo':
        
        	if(is_array($array) && count($array) > 0)
        	{
        		$html .= " <br />
        		<br />
        		<div class='util'>
        			<strong>Escolha:</strong>
	        		<a href='javascript:void(0);' class='tooltip selecionarTodos' title='selecionar todos'><span class='icon darkgray' data-icon='c'></span> Selecionar todos</a>
	        		<a href='javascript:void(0);' class='tooltip desmarcarTodos' title='desmarcar todos'><span class='icon darkgray' data-icon='m'></span> Desmarcar todos</a>
	        		<a href='javascript:void(0);' class='tooltip excluirTodosArqs' title='excluir selecionados'><span class='icon darkgray' data-icon='T'></span> Excluir selecionados</a>
        		</div>
        		 
        		<div>
        
        		<table class='sortable selectTable' cellspacing='0' cellpadding='0'>
        		<thead>
        		<tr>
        		<th><span class='icon darkgray' data-icon='C'></span></th>
        		<th>Arquivo</th>
        		<th>Descrição</th>
        		<th>Ações</th>
        		</tr>
        		</thead>
        		<tbody>";
        		foreach ($array as $key => $dados)
        		{
        			$html .= "<tr>
        			<td><input type='checkbox' name='idArq[]' value='idArq-" . $dados["idArq"] ."'></td>
        			<td>" . $dados["titulo"] ."</td>        			
        			<td><input type='text' name='namearq[]' id='namearq-$key' value='" . $dados["descricao"] ."'></td>
        			<td>
        			<a href='" . base_url("adm/arquivo/download/". $dados["idArq"]) . "'><span class='icon gray tooltip' data-icon='(' title='Download'></span></a>
        			<a href='javascript:void(0);' class='excluirArquivo tooltip' id='arquivo-$key' title='Excluir'><span class='icon gray' data-icon='T'></span></a>
        			</td>
        			</tr>";
        		}
        		$html .= "</tbody>
        		</table>
        		</div>";
        }
        if(detect_ie())
        {
        $html .= "<label>Novos arquivos</label>
        <p class='campo-$id'>
        <label for='" . $id . "[]'>1.</label>
        <input type='file' name='" . $id . "[]' value='' /><a class='button small removerCampo' href='javascript:void(0);' id='remover-$id-1'>Remover Arquivo</a>
        </p>
        <p>
        <a href='javascript:void(0);' class='button small adicionarCampo' id='add-$id'> + Adicionar arquivo</a>
        </p>";
        }
        else
        {
        	$html .= "<label for='$id'>Novos arquivos <span>Você pode selecionar vários arquivos</span></label>
        	<input id='$id' name='" . $id . "[]' type='file' multiple='multiple'/>";
        }
        break;
        
        case 'textarea':
        $html = "<label for='$id'>$nome</label>
                 <textarea id='$id' name='$id'>$valor</textarea>";
        break;
        
        case 'multiple':
        $html = "<label for='$id'>$nome</label>";	
        $html .= form_multiselect($id . "[]",$array,$valor,"class='fancy' multiple='multiple'");
        break;
        
        case 'editor':
        $html = "<p><label for='$id'>$nome</label>
                 <textarea id='$id' class='editor' name='$id'>$valor</textarea></p>";
        break;
        
        case 'password':
        $html = "<label for='$id'>$nome:</label>
                <input type='password' name='$id' id='$id' class='$classe' value='' />";
        break;
        
        case 'select':
        $html = "<label for='$id'>$nome</label>";
        $html .= form_dropdown($id, $array, $valor,"class='fancy'");
        break;
    }
    echo $html;
}

function visualizarCampo($tipo,$nome=null,$id=null,$classe=null,$valor=null,$array=null)
{
	$html = "<h5>$nome</h5>";
	switch($tipo)
	{
		case 'text':
		case 'textarea':
		case 'editor':
			$html .= "<p>$valor</p>";
			break;

		case 'imagem':
			$html .= "<p>";
			if(is_array($array) && count($array) > 0)
			{
				foreach ($array as $caminho)
				{
					$html .= "<img src='$caminho' />";
				}
			}
			$html .= "</p>";
			break;

		case 'multiple':
			$campo = "";
			if(is_array($valor))
			{
				foreach ($valor as $id)
				{
					if($campo == "")
						$campo .= $array[$id];
					else
						$campo .= "," . $array[$id];
				}
			}
			$html .= "<p>" . $campo . "</p>";
			break;
			
		case 'select':
			$html .= "<p>" . $array[$valor] . "</p>";
			break;
	}
	echo $html;
}

if(!function_exists('date_diff')) {
	class DateInterval {
		public $y;
		public $m;
		public $d;
		public $h;
		public $i;
		public $s;
		public $invert;

		public function format($format) {
			$format = str_replace('%R%y', ($this->invert ? '-' : '+') . $this->y, $format);
			$format = str_replace('%R%m', ($this->invert ? '-' : '+') . $this->m, $format);
			$format = str_replace('%R%d', ($this->invert ? '-' : '+') . $this->d, $format);
			$format = str_replace('%R%h', ($this->invert ? '-' : '+') . $this->h, $format);
			$format = str_replace('%R%i', ($this->invert ? '-' : '+') . $this->i, $format);
			$format = str_replace('%R%s', ($this->invert ? '-' : '+') . $this->s, $format);

			$format = str_replace('%y', $this->y, $format);
			$format = str_replace('%m', $this->m, $format);
			$format = str_replace('%d', $this->d, $format);
			$format = str_replace('%h', $this->h, $format);
			$format = str_replace('%i', $this->i, $format);
			$format = str_replace('%s', $this->s, $format);

			return $format;
		}
	}

	function date_diff(DateTime $date1, DateTime $date2) {
		$diff = new DateInterval();
		if($date1 > $date2) {
			$tmp = $date1;
			$date1 = $date2;
			$date2 = $tmp;
			$diff->invert = true;
		}

		$diff->y = ((int) $date2->format('Y')) - ((int) $date1->format('Y'));
		$diff->m = ((int) $date2->format('n')) - ((int) $date1->format('n'));
		if($diff->m < 0) {
			$diff->y -= 1;
			$diff->m = $diff->m + 12;
		}
		$diff->d = ((int) $date2->format('j')) - ((int) $date1->format('j'));
		if($diff->d < 0) {
			$diff->m -= 1;
			$diff->d = $diff->d + ((int) $date1->format('t'));
		}
		$diff->h = ((int) $date2->format('G')) - ((int) $date1->format('G'));
		if($diff->h < 0) {
			$diff->d -= 1;
			$diff->h = $diff->h + 24;
		}
		$diff->i = ((int) $date2->format('i')) - ((int) $date1->format('i'));
		if($diff->i < 0) {
			$diff->h -= 1;
			$diff->i = $diff->i + 60;
		}
		$diff->s = ((int) $date2->format('s')) - ((int) $date1->format('s'));
		if($diff->s < 0) {
			$diff->i -= 1;
			$diff->s = $diff->s + 60;
		}

		return $diff;
	}
}