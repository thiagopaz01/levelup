<?php
function is_date( $Str )
{
  $Stamp = strtotime( $Str );
  
  if ($Stamp !== FALSE)
  {
	  $Month = date( 'm', $Stamp );
	  $Day   = date( 'd', $Stamp );
	  $Year  = date( 'Y', $Stamp );
	  return checkdate( $Month, $Day, $Year );
  }
  else
  {
  	return FALSE;
  }
}

function month($mes,$idioma=null)
{
    if(!is_null($idioma) && $idioma != "" && $idioma == "en")
    {
       switch($mes)
        {
            case 1: return "January";break;
            case 2: return "February";break;
            case 3: return "March";break;
            case 4: return "April";break;
            case 5: return "May";break;
            case 6: return "June";break;
            case 7: return "July";break;
            case 8: return "August";break;
            case 9: return "September";break;
            case 10: return "October";break;
            case 11: return "November";break;
            case 12: return "December";break;
        } 
    }
    else
    {
        switch($mes)
        {
            case 1: return "Janeiro";break;
            case 2: return "Fevereiro";break;
            case 3: return "Mar�o";break;
            case 4: return "Abril";break;
            case 5: return "Maio";break;
            case 6: return "Junho";break;
            case 7: return "Julho";break;
            case 8: return "Agosto";break;
            case 9: return "Setembro";break;
            case 10: return "Outubro";break;
            case 11: return "Novembro";break;
            case 12: return "Dezembro";break;
        }   
    }
}

function classificar($a, $b)
{
    $campo	= $a->campo;
    $sentido	= $a->sentido;
    
    if (is_integer($a->$campo))
    {
        if ($a->$campo > $b->$campo)
        {
            $ret = -1;
        }
        else if ($a->$campo < $b->$campo)
        {
            $ret = 1;
        }            
        else
        {
            $ret = 0;
        }

        if ($sentido == "ASC")
        {
            return -1 * $ret; //por default a função retorna DESC
        }
        else
        {
            return $ret;
        }
    }
    else if(is_date($a->$campo))
    {
        if (strtotime($a->$campo) > strtotime($b->$campo))
        {
            $ret = -1;
        }
        else if(strtotime($a->$campo) < strtotime($b->$campo) )
        {
            $ret = 1;
        }
        else
        {
            $ret = 0;
        }

        if ($sentido == "ASC")
        {
            return -1 * $ret; //por default a função retorna DESC
        }
        else
        {
            return $ret;
        }
    }
    else
    {
        $ret = strcasecmp($a->$campo, $b->$campo);

        if ($sentido == "DESC")
        {
            return -1 * $ret;
        }
        else
        {
            return $ret;
        }
    }        
}

function formataDataFBR($data)
{
	$vetorData	= explode('/',$data);
	$dataFBR	= '<span>'. $vetorData[0] .'</span>';
	$dataFBR	.= ' de ' . retornaMes($vetorData[1]);
	$dataFBR	.= ' de ' . $vetorData[2];
	
	return $dataFBR;
}

function verificarPaginaAtiva($pagina)
{
	$CI =& get_instance();

	$seg1	= $CI->uri->segment(1);
	$seg2	= $CI->uri->segment(2);

	$pagina_atual   = FALSE;

	if ( (empty($seg1) && $pagina == '/') OR ($pagina == $seg1) )
	{
		$pagina_atual   = TRUE;
	}
	 
	return $pagina_atual;
}

function categoriaAtiva($pagina)
{
	$CI =& get_instance();

	$seg1	= $CI->uri->segment(1);
	$seg2	= $CI->uri->segment(2);

	$pagina_atual   = FALSE;

	if ($pagina == $seg2)
	{
		$pagina_atual   = TRUE;
	}

	return $pagina_atual;
}

function getDia($dia)
{
    switch($dia){
        case 'Mon': return "Seg"; break;
        case 'Tue': return "Ter"; break;
        case 'Wed': return "Qua"; break;
        case 'Thu': return "Qui"; break;
        case 'Fri': return "Sex"; break;
        case 'Sat': return "Sab"; break;
        case 'Sun': return "Dom"; break;
    }
}

function dateLikeObject($dataConteudo)
{
    $dataHora	= explode(' ', $dataConteudo);
    $data	= explode('-', $dataHora[0]);	
    $objData	= (object)array('dia' => null, 'mes' => null, 'ano' => null, 'hora' => null, 'minuto' => null, 'segundo' => null);

    $objData->dia = $data[2];
    $objData->mes = $data[1];
    $objData->ano = $data[0];

    if (count($dataHora) == 2)
    {
        $hora               = explode(':', $dataHora[1]);
        $objData->hora      = $hora[0];
        $objData->minuto    = $hora[1];
        $objData->segundo   = $hora[2];
    }

    return $objData;
}

function retornaMes($mes)
{
	switch($mes)
	{
		case 1: return "Janeiro"; break;
		case 2: return "Fevereiro"; break;
		case 3: return "Março"; break;
		case 4: return "Abril"; break;
		case 5: return "Maio"; break;
		case 6: return "Junho"; break;
		case 7: return "Julho"; break;
		case 8: return "Agosto"; break;
		case 9: return "Setembro"; break;
		case 10: return "Outubro"; break;
		case 11: return "Novembro"; break;
		case 12: return "Dezembro"; break;
	}
}

function formataDataPontos($data)
{
	$vetorDataHora = explode(' ',$data);
	$vetorData = explode('-',$vetorDataHora[0]);
	return $vetorData[2] . "." . $vetorData[1] . "." . $vetorData[0];
}

function formataDataExtenso($data)
{
	$data	= formataDataMySql($data);
	$data	= dateLikeObject($data);
	
	return "<em>$data->dia</em> de " . retornaMes($data->mes) . " de $data->ano";
}

function formataDataPontosBr($data)
{
	return str_replace('/', '.', $data);
}

function limitarTexto($texto, $limite)
{
	if (stristr($texto, ' ')) {
		$texto = substr($texto, 0, strrpos(substr($texto, 0, $limite), ' '));
	}

	return trim($texto)  . '...';
}

function slug($str) {
	$CI =& get_instance();	
	$str = $CI->stringtoslug->gen($str);
	
	return $str;
}

function anti_injection($sql)
{
	// remove palavras que contenham sintaxe sql
	$sql = preg_replace("/(from|select|insert|delete|where|drop table|show tables|#|\*|--|\\\\)/i", '', $sql);
	$sql = trim($sql);//limpa espa�os vazio
	$sql = strip_tags($sql);//tira tags html e php
	$sql = addslashes($sql);//Adiciona barras invertidas a uma string
    return $sql;
}

/* envia e-mail de contato */
function enviarContato($nome,$email,$fone,$mensagem,$emailDestinatario,$tituloEmail)
{
	$url = base_url() . 'conteudo/site/';
	$cor = '#981E35'; // Cor do texto de contato em hexadecimal
	
	$html = '<table width="494" border="0" align="center" cellpadding="0" cellspacing="0" bgcolor="#FFFFFF">
  <tr>
    <td><a href="'. base_url() .'" target="_blank"><img src="'. $url.'email/topo.jpg" width="494" height="180" border="0" /></a></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><table width="454" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td><img src="'. $url.'email/pixel.gif" width="10" height="11" /></td>
        </tr>
        <tr>
          <td><table width="454" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_top.jpg" alt="" width="454" height="6" /></td>
              </tr>
              <tr>
                <td bgcolor="#e6e6e6"><table width="452" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                      <td width="415" bgcolor="#ffffff"><font face="Tahoma, Geneva, sans-serif" size="2" color="#000"><b>Nome:</b></font> <font face="Tahoma, Geneva, sans-serif" size="2" color="'. $cor .'">'. $nome.'</font></td>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_bottom.jpg" alt="" width="454" height="6" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><img src="'. $url.'email/pixel.gif" alt="" width="10" height="11" /></td>
        </tr>
        <tr>
          <td><table width="454" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_top.jpg" alt="" width="454" height="6" /></td>
              </tr>
              <tr>
                <td bgcolor="#e6e6e6"><table width="452" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                      <td width="415" bgcolor="#ffffff"><font face="Tahoma, Geneva, sans-serif" size="2" color="#000"><b>E-mail:</b></font> <font face="Tahoma, Geneva, sans-serif" size="2" color="'. $cor .'">'. $email.'</font></td>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_bottom.jpg" alt="" width="454" height="6" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><img src="'. $url.'email/pixel.gif" alt="" width="10" height="11" /></td>
        </tr>
        <tr>
          <td><table width="454" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_top.jpg" alt="" width="454" height="6" /></td>
              </tr>
              <tr>
                <td bgcolor="#e6e6e6"><table width="452" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                      <td width="415" bgcolor="#ffffff"><font face="Tahoma, Geneva, sans-serif" size="2" color="#000"><b>Telefone:</b></font> <font face="Tahoma, Geneva, sans-serif" size="2" color="'. $cor .'">'. $fone.'</font></td>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_bottom.jpg" alt="" width="454" height="6" /></td>
              </tr>
            </table></td>
        </tr>
        <tr>
          <td><img src="'. $url.'email/pixel.gif" alt="" width="10" height="11" /></td>
        </tr>
        <tr>
          <td><table width="454" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_top.jpg" alt="" width="454" height="6" /></td>
              </tr>
              <tr>
                <td bgcolor="#e6e6e6"><table width="452" border="0" align="center" cellpadding="0" cellspacing="0">
                    <tr>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                      <td width="415" bgcolor="#ffffff"><font face="Tahoma, Geneva, sans-serif" size="2" color="#000"><b>Mensagem:</b></font> <br />
                        <font face="Tahoma, Geneva, sans-serif" size="2" color="'. $cor .'">'.$mensagem.'</font></td>
                      <td width="10" bgcolor="#ffffff">&nbsp;</td>
                    </tr>
                  </table></td>
              </tr>
              <tr>
                <td height="6"><img src="'. $url.'email/textoPqn_bg_bottom.jpg" alt="" width="454" height="6" /></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td><img src="'. $url.'email/rodape.jpg" alt="" width="494" height="87" /></td>
  </tr>
</table>';
		
		/* IMPORTANTE */		
		// Hospedagem Windows A quebra de linha para utilizar no cabecalho deve ser "\r\n" 
		// O remetente deve ser um e-mail do seu dominio conforme determina a RFC 822.
		// O return-path deve ser ser o mesmo e-mail do remetente.
		$headers = "MIME-Version: 1.1\r\n"; //MIME-Version mas rescente
		$headers .= "Content-type: text/html; charset=utf-8\r\n";//Content-type para HTML e acentuacao
		$headers .= "From: $emailDestinatario\r\n"; //E-mail do remetente
		$headers .= "Cc: $email\r\n"; //copia para o usuario
		$headers .= "Reply-To: $email\r\n"; //responde para o usuario que enviou
		$headers .= "Return-Path: $emailDestinatario\r\n"; //retorna para o e-mail do remetente
		$env = @mail($emailDestinatario, $tituloEmail, $html, $headers, "-r". "$emailDestinatario");
		
		if ($env){
			return 1;
		}else{
			return 2;
		}
}

/*
 * Retorna apenas os valores númericos da string
 */
function getNumeric($valor)
{	
	$numero = '';
	
	for ($i = 0; $i < (strlen($valor)); $i++) {
		if (is_numeric($valor[$i])) {
			$numero .= $valor[$i];
		}
	}
	
	return $numero;
}

/*
 * Realiza o câmbio de valores
 * $from é a moeda atual, $to é a moeda para qual deseja fazer o câmbio, $preco é o valor
 * retorna o valor com câmbio realizado ou false caso não seja possível o câmbio
 */
function convert($from, $to, $preco)
{
	$url = "http://www.google.com/finance/converter?a=$preco&from=$from&to=$to";

	$data = getPage($url);
	if(empty($data))
		return false;

	$dom = new DOMDocument();
	@$dom->loadHTML($data);

	$return = @$dom->getElementById('currency_converter_result')
	->getElementsByTagName('span')
	->item(0)
	->firstChild
	->wholeText;

	$return =  (float)$return;
	if($return == 0 )
		return false;

	return $return;
}

function getPage($url)
{
	if(ini_get('allow_url_fopen') != 1) {
		@ini_set('allow_url_fopen', '1');
	}
	if(ini_get('allow_url_fopen') != 1) {
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL,$url);
		curl_setopt($ch, CURLOPT_FAILONERROR, 1);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 3);
		$data = curl_exec($ch);
		curl_close($ch);
	}
	else {
		$data = file_get_contents($url);
	}
	return $data;
}

?>
