<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function teste($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->titulo;
	$lstCampos[1]->valor = $objConteudo->texto;
}

function home($lstCampos,$objConteudo,$objCategoria=null)
{
    $lstCampos[0]->valor = $objConteudo->valor(1,'char');
    $lstCampos[1]->valor = explode("|*|",$objConteudo->valor(3,'texto'));
    $lstCampos[2]->valor = $objConteudo->valor(4,'texto');
    $lstCampos[3]->valor = $objConteudo->valor(5,'texto');
    $lstCampos[4]->valor = "";
    $lstCampos[5]->valor = "";
    
    //Select 1
    $lstCampos[1]->arrayValor = array('Sala1' => 'Sala 1', 'Sala2' => 'Sala 2','Sala3' => 'Sala 3');
    
    //Select 2
    $lstCampos[2]->arrayValor = array('Sala1' => 'Sala 1', 'Sala2' => 'Sala 2','Sala3' => 'Sala 3');
    
    //Imagem
    $lstImgs = $objConteudo->imagens();
    $lstImagens = array();
    
    if(is_array($lstImgs) && count($lstImgs) > 0)
    {
    	foreach ($lstImgs as $objImg)
    	{
    		$lstTamanhos = $objImg->tamanhos();
    		if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
    		{
    			$lstDados = array();
    			$lstDados['caminho'] = $lstTamanhos[0]->caminho;
    			$lstDados['descricao'] = $objImg->descricao;
    			$lstDados['idImg'] = $objImg->idImagem;
    			$lstImagens[] = $lstDados;
    		}
    	}
    }
    $lstCampos[4]->arrayValor = $lstImagens;
    
    //Arquivos
    $lstArqs = $objConteudo->arquivos();
    //print_r($lstArqs);exit;
    $lstArquivos = array();
    
    if(is_array($lstArqs) && count($lstArqs) > 0)
    {
    	foreach ($lstArqs as $objArq)
    	{
    		$lstDados = array();
    		$lstDados['caminho'] = $objArq->caminho;
    		$lstDados['descricao'] = $objArq->descricao;
    		$lstDados['titulo'] = $objArq->titulo;
    		$lstDados['idArq'] = $objArq->idArquivo;
    		$lstArquivos[] = $lstDados;
    	}
    }
    $lstCampos[5]->arrayValor = $lstArquivos;
}

function banner($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = "";
	$lstCampos[3]->valor = $objConteudo->ordem;
	$lstCampos[4]->valor = $objConteudo->valor(5,'char'); // Status: Publicado, não publicado
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[2]->arrayValor = $lstImagens;
		
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
		
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;			
		}
	}
	
	arsort($lstOrdem); // Ordena o array em ordem descrescente mantendo a associação entre índices e valores
	$lstCampos[3]->arrayValor = $lstOrdem;
	
	// Status
	$lstCampos[4]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function titulo_subtitulo_resumo_texto($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');
	$lstCampos[3]->valor = $objConteudo->valor(4,'texto');	
}

function titulo_resumo_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');
}

function titulo_subtitulo_resumo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
}

function titulo_url_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
}

function texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'texto');	
}

function titulo_subtitulo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
}

function titulo_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');	
}

function resumo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'texto');	
}

function titulo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');	
}

function titulo_ordem($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');	
	$lstCampos[1]->valor = $objConteudo->ordem;
	
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	
	arsort($lstOrdem); // Ordena o array em ordem descrescente mantendo a associação entre índices e valores
	$lstCampos[1]->arrayValor = $lstOrdem;
}

function titulo_arquivo_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = "";
	$lstCampos[2]->valor = $objConteudo->ordem;
	
	//Arquivos
	$lstArqs = $objConteudo->arquivos();
	$lstArquivos = array();
	
	if(is_array($lstArqs) && count($lstArqs) > 0)
	{
		foreach ($lstArqs as $objArq)
		{
			$lstDados = array();
			$lstDados['caminho'] = $objArq->caminho;
			$lstDados['descricao'] = $objArq->descricao;
			$lstDados['titulo'] = $objArq->titulo;
			$lstDados['idArq'] = $objArq->idArquivo;
			$lstArquivos[] = $lstDados;
		}
	}
	
	$lstCampos[1]->arrayValor = $lstArquivos;

	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[2]->arrayValor = $lstOrdem;
}

function titulo_texto_imagem_link($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[2]->arrayValor = $lstImagens;
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');
}

function titulo_texto_imagem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[2]->arrayValor = $lstImagens;
}

function titulo_texto_imagem_email_destaque($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = "";
        $lstCampos[3]->valor = $objConteudo->valor(4,'char');
        $lstCampos[4]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[2]->arrayValor = $lstImagens;
        
        // Destaque
	$lstCampos[4]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function contato($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');
        $lstCampos[3]->valor = $objConteudo->valor(4,'char');
        $lstCampos[4]->valor = $objConteudo->valor(5,'char');
	$lstCampos[5]->valor = $objConteudo->valor(6,'char');
        $lstCampos[6]->valor = $objConteudo->valor(7,'char');
        $lstCampos[7]->valor = $objConteudo->valor(8,'texto');
	
}

function titulo_texto_ordem($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->ordem;

	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	
	arsort($lstOrdem);
	$lstCampos[2]->arrayValor = $lstOrdem;
}

function titulo_resumo_texto_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');
	$lstCampos[3]->valor = $objConteudo->ordem;

	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	arsort($lstOrdem);
	$lstCampos[3]->arrayValor = $lstOrdem;
}

function titulo_imagem($lstCampos,$objConteudo,$objCategoria=null)
{
	
	$lstCampos[0]->valor = $objConteudo->valor(1, 'char');
	$lstCampos[1]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[1]->arrayValor = $lstImagens;
}

function titulo_imagem_link_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	
	$lstCampos[0]->valor = $objConteudo->valor(1, 'char');
	$lstCampos[1]->valor = "";
        $lstCampos[2]->valor = $objConteudo->valor(3, 'char');
        $lstCampos[3]->valor = $objConteudo->ordem;
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[1]->arrayValor = $lstImagens;
        
        //Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[3]->arrayValor = $lstOrdem;
}
/**/

function imagem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[0]->arrayValor = $lstImagens;
}

function imagem_texto($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = "";
	$lstCampos[1]->valor = $objConteudo->valor(2, 'texto');

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[0]->arrayValor = $lstImagens;
}

function titulo_imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = "";
	$lstCampos[2]->valor = $objConteudo->ordem;

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[1]->arrayValor = $lstImagens;

	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[2]->arrayValor = $lstOrdem;
}

function imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{	
	$lstCampos[0]->valor = "";	
	$lstCampos[1]->valor = $objConteudo->ordem;
			
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[0]->arrayValor = $lstImagens;
	
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	
	$lstCampos[1]->arrayValor = $lstOrdem;
}

function resumo_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'texto');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');	
}

/**/
function titulo_subtitulo_resumo_texto_imagem_ordem_descricao($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');
	$lstCampos[4]->valor = "";
	$lstCampos[5]->valor = $objConteudo->ordem;
	$lstCampos[6]->valor = $objConteudo->valor(7,'texto');

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[4]->arrayValor = $lstImagens;
	 
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[5]->arrayValor = $lstOrdem;
}
/**/

function titulo_texto_imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');	
	$lstCampos[2]->valor = "";
	$lstCampos[3]->valor = $objConteudo->ordem;

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[2]->arrayValor = $lstImagens;
	 
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[3]->arrayValor = $lstOrdem;
}

function titulo_subtitulo_texto_imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
	$lstCampos[3]->valor = "";
	$lstCampos[4]->valor = $objConteudo->ordem;

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[3]->arrayValor = $lstImagens;
	 
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	arsort($lstOrdem);
	$lstCampos[4]->arrayValor = $lstOrdem;
}

function titulo_resumo_imagem_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = "";
	$lstCampos[3]->valor = $objConteudo->valor(4,'texto');
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[2]->arrayValor = $lstImagens;
}

function resumo_imagem_texto($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'texto');
	$lstCampos[1]->valor = "";
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[1]->arrayValor = $lstImagens;
}

function titulo_resumo_texto_imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
	$lstCampos[3]->valor = "";
	$lstCampos[4]->valor = $objConteudo->ordem;

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[3]->arrayValor = $lstImagens;
	 
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;

	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);

	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}

	$lstCampos[4]->arrayValor = $lstOrdem;
}

function titulo_subtitulo_resumo_texto_imagem_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');
	$lstCampos[4]->valor = "";
	$lstCampos[5]->valor = $objConteudo->ordem;
	
    //Imagem
    $lstImgs = $objConteudo->imagens();
    $lstImagens = array();
    
    if(is_array($lstImgs) && count($lstImgs) > 0)
    {
    	foreach ($lstImgs as $objImg)
    	{
    		$lstTamanhos = $objImg->tamanhos();
    		if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
    		{
    			$lstDados = array();
    			$lstDados['caminho'] = $lstTamanhos[0]->caminho;
    			$lstDados['descricao'] = $objImg->descricao;
    			$lstDados['idImg'] = $objImg->idImagem;
    			$lstImagens[] = $lstDados;
    		}
    	}
    }
    
    $lstCampos[4]->arrayValor = $lstImagens;
    	
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	
	$lstCampos[5]->arrayValor = $lstOrdem;
}

function titulo_texto_subtitulo_resumo_imagem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');
	$lstCampos[3]->valor = $objConteudo->valor(4,'texto');
	$lstCampos[4]->valor = "";
	
	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[4]->arrayValor = $lstImagens;	
}

function titulo_texto_imagem_arquivo_ordem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = "";
	$lstCampos[3]->valor = "";
	$lstCampos[4]->valor = $objConteudo->ordem;

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}	
	$lstCampos[2]->arrayValor = $lstImagens;
	
	//Arquivos
	$lstArqs = $objConteudo->arquivos();
	$lstArquivos = array();

	if(is_array($lstArqs) && count($lstArqs) > 0)
	{
		foreach ($lstArqs as $objArq)
		{
			$lstDados = array();
			$lstDados['caminho'] = $objArq->caminho;
			$lstDados['descricao'] = $objArq->descricao;
			$lstDados['titulo'] = $objArq->titulo;
			$lstDados['idArq'] = $objArq->idArquivo;
			$lstArquivos[] = $lstDados;
		}
	}
	$lstCampos[3]->arrayValor = $lstArquivos;
	
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	$lstCampos[4]->arrayValor = $lstOrdem;
}
/**/

function titulo_subtitulo_texto_arquivo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
	$lstCampos[3]->valor = "";

	//Arquivos
    $lstArqs = $objConteudo->arquivos();    
    $lstArquivos = array();
    
    if(is_array($lstArqs) && count($lstArqs) > 0)
    {
    	foreach ($lstArqs as $objArq)
    	{
    		$lstDados = array();
    		$lstDados['caminho'] = $objArq->caminho;
    		$lstDados['descricao'] = $objArq->descricao;
    		$lstDados['titulo'] = $objArq->titulo;
    		$lstDados['idArq'] = $objArq->idArquivo;
    		$lstArquivos[] = $lstDados;
    	}
    }
    
    $lstCampos[3]->arrayValor = $lstArquivos;
}

function imagem_case($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'texto');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->idConteudoPai;		// Cliente
	$lstCampos[3]->valor = "";								// Imagem
	
	// Cliente
	$CI =& get_instance();
	$CI->load->model('Categoria');
	
	$lstClientes = $CI->Categoria->retornarClientes();
	$lstClientesRetornar = array();
	
	if (is_array($lstClientes)) {
		foreach ($lstClientes as $cliente) {
			$lstClientesRetornar[$cliente->idConteudo] = $cliente->valores()->nome;
		}		
	}
	
	$lstCampos[2]->arrayValor = $lstClientesRetornar;
		
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[3]->arrayValor = $lstImagens;
}

function cursos($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Nome
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');		// Texto
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');		// Categoria	
	$lstCampos[4]->valor = "";									// Imagem
	$lstCampos[5]->valor = "";
        
	
	// Categoria
	$CI =& get_instance();
	$CI->load->model('Categoria');
	$categoriaCursos	= $CI->Categoria->retornarObjeto(25);
	$lstCategoriaCursos	= $categoriaCursos->conteudos(null, null, null, 'ordem ASC', null, null);
	$arrayCategorias	= array();
	
	if ( (is_array($lstCategoriaCursos)) && ( ! empty($lstCategoriaCursos)) )
	{
		foreach ($lstCategoriaCursos as $categoriaCurso)
		{
			$categoriaCurso		= $categoriaCurso->valores();
			$arrayCategorias[$categoriaCurso->idConteudo] = $categoriaCurso->titulo;
		}
	}
	
	$lstCampos[3]->arrayValor = $arrayCategorias;
		
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[4]->arrayValor = $lstImagens;
	
	// Arquivo
	$lstArqs = $objConteudo->arquivos();
	$lstArquivos = array();
	
	if(is_array($lstArqs) && count($lstArqs) > 0)
	{
		foreach ($lstArqs as $objArq)
		{
			$lstDados = array();
			$lstDados['caminho'] = $objArq->caminho;
			$lstDados['descricao'] = $objArq->descricao;
			$lstDados['titulo'] = $objArq->titulo;
			$lstDados['idArq'] = $objArq->idArquivo;
			$lstArquivos[] = $lstDados;
		}
	}
	
	$lstCampos[5]->arrayValor = $lstArquivos;
}

function noticia($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	//$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo	
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Texto
	$lstCampos[2]->valor = "";									// Imagem
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');		// Data
	//$lstCampos[5]->valor = $objConteudo->valor(6,'char');		// Status: Publicado, não publicado
	
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[2]->arrayValor = $lstImagens;
	
	// Status
	//$lstCampos[5]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function videos($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo	
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');		// Texto
	$lstCampos[3]->valor = "";									// Imagem
	$lstCampos[4]->valor = $objConteudo->valor(5,'char');		// Data
	$lstCampos[5]->valor = $objConteudo->valor(6,'char');		// Status: Publicado, não publicado
	
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[3]->arrayValor = $lstImagens;
	
	// Status
	$lstCampos[5]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function acoes($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo	
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');		// Texto
	$lstCampos[3]->valor = "";									// Imagem
	$lstCampos[4]->valor = $objConteudo->valor(5,'char');		// Data
	$lstCampos[5]->valor = $objConteudo->valor(6,'char');		// Status: Publicado, não publicado
	
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[3]->arrayValor = $lstImagens;
	
	// Status
	$lstCampos[5]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function eventos($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo	
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');		// Texto
	$lstCampos[3]->valor = "";									// Imagem
	$lstCampos[4]->valor = $objConteudo->valor(5,'char');		// Data
	$lstCampos[5]->valor = $objConteudo->valor(6,'char');		// Status: Publicado, não publicado
	
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[3]->arrayValor = $lstImagens;
	
	// Status
	$lstCampos[5]->arrayValor = array('sim' => 'Sim', 'não' => 'Não');
}

function noticia_arquivo($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Texto
	$lstCampos[2]->valor = "";									// Imagem
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');		// Data
	$lstCampos[4]->valor = "";									// Arquivos

	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}	

	$lstCampos[2]->arrayValor = $lstImagens;
	
	//Arquivos
	$lstArqs = $objConteudo->arquivos();
	$lstArquivos = array();
	
	if(is_array($lstArqs) && count($lstArqs) > 0)
	{
		foreach ($lstArqs as $objArq)
		{
			$lstDados = array();
			$lstDados['caminho'] = $objArq->caminho;
			$lstDados['descricao'] = $objArq->descricao;
			$lstDados['titulo'] = $objArq->titulo;
			$lstDados['idArq'] = $objArq->idArquivo;
			$lstArquivos[] = $lstDados;
		}
	}
	
	$lstCampos[4]->arrayValor = $lstArquivos;
}

function lista_opcoes($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Título
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');		// link	
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');       // Ícone
	$lstCampos[3]->valor = $objConteudo->ordem;                 // Ordem
	
	// Ícones
	$lstIcones = array(	'ico-pencil'        => 'Lápis',
						'ico-people'		=> 'Pessoas',
						'ico-money'      	=> 'Saco de dinheiro' );
	
	$lstCampos[2]->arrayValor = $lstIcones;
	
	//Ordem
	$lstOrdem = array();
	$lstOrdem['1'] = 1;
	
	$lstConteudos = $objCategoria->conteudos(null, null, null, 'ordem ASC, dtModificacao DESC', null, null);
	
	if (is_array($lstConteudos))
	{
		for ($i = 1; $i <= count($lstConteudos); $i++)
		{
			$lstOrdem[$i + 1] = $i + 1;
		}
	}
	
	arsort($lstOrdem); // Ordena o array em ordem descrescente mantendo a associação entre índices e valores
	$lstCampos[4]->arrayValor = $lstOrdem;
}

function curso($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Nome
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');		// Resumo
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');      // Texto
	$lstCampos[3]->valor = "";									// Imagens
	$lstCampos[4]->valor = "";									// Arquivos
	$lstCampos[5]->valor = $objConteudo->valor(6,'char');		// Categoria
        $lstCampos[6]->valor = $objConteudo->valor(7,'char');		// Coordenador
	$lstCampos[7]->valor = $objConteudo->valor(8,'char');		// Duracao
	$lstCampos[8]->valor = $objConteudo->valor(9,'char');		// Valor
	
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}	
	$lstCampos[3]->arrayValor = $lstImagens;
	
	// Arquivos
	$lstArqs = $objConteudo->arquivos();
	$lstArquivos = array();
	
	if(is_array($lstArqs) && count($lstArqs) > 0)
	{
		foreach ($lstArqs as $objArq)
		{
			$lstDados = array();
			$lstDados['caminho'] = $objArq->caminho;
			$lstDados['descricao'] = $objArq->descricao;
			$lstDados['titulo'] = $objArq->titulo;
			$lstDados['idArq'] = $objArq->idArquivo;
			$lstArquivos[] = $lstDados;
		}
	}
	$lstCampos[4]->arrayValor = $lstArquivos;
	
	// Categoria curso
	$CI =& get_instance();
	$CI->load->model('Categoria');
	$categoriaCurso = $CI->Categoria->retornarObjeto(25);
	$lstCategorias	= $categoriaCurso->conteudos(null, null, null, 'ordem ASC', null, null);
	$categorias		= array();
	
	if ( (is_array($lstCategorias)) && ( ! empty($lstCategorias)) )
	{
		foreach ($lstCategorias as $cat)
		{
			$cat = $cat->valores();
			$categorias[$cat->idConteudo] = $cat->titulo;
		}
	}
	$lstCampos[5]->arrayValor = $categorias;
}

function redes_sociais($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'char');
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');
	$lstCampos[3]->valor = $objConteudo->valor(4,'char');
	$lstCampos[4]->valor = $objConteudo->valor(5,'char');	
}

function imagens($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');		// Nome
	$lstCampos[1]->valor = "";
	$lstCampos[2]->valor = $objConteudo->valor(3,'char');	
        
	
	// Categoria
	$CI =& get_instance();
	$CI->load->model('Categoria');
	$categoriaImagens	= $CI->Categoria->retornarObjeto(17);
	$lstCategoriaImagens	= $categoriaImagens->conteudos(null, null, null, 'ordem ASC', null, null);
	$arrayCategorias	= array();
	
	if ( (is_array($lstCategoriaImagens)) && ( ! empty($lstCategoriaImagens)) )
	{
		foreach ($lstCategoriaImagens as $categoriaImagem)
		{
			$categoriaImagem		= $categoriaImagem->valores();
			$arrayCategorias[$categoriaImagem->idConteudo] = $categoriaImagem->nome;
		}
	}
	
	$lstCampos[2]->arrayValor = $arrayCategorias;
		
	// Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();
	
	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}
	
	$lstCampos[1]->arrayValor = $lstImagens;
}
function titulo_resumo_texto_imagem($lstCampos,$objConteudo,$objCategoria=null)
{
	$lstCampos[0]->valor = $objConteudo->valor(1,'char');
	$lstCampos[1]->valor = $objConteudo->valor(2,'texto');
	$lstCampos[2]->valor = $objConteudo->valor(3,'texto');	
	$lstCampos[3]->valor = "";

	//Imagem
	$lstImgs = $objConteudo->imagens();
	$lstImagens = array();

	if(is_array($lstImgs) && count($lstImgs) > 0)
	{
		foreach ($lstImgs as $objImg)
		{
			$lstTamanhos = $objImg->tamanhos();
			if(is_array($lstTamanhos) && count($lstTamanhos) > 0)
			{
				$lstDados = array();
				$lstDados['caminho'] = $lstTamanhos[0]->caminho;
				$lstDados['descricao'] = $objImg->descricao;
				$lstDados['idImg'] = $objImg->idImagem;
				$lstImagens[] = $lstDados;
			}
		}
	}

	$lstCampos[3]->arrayValor = $lstImagens;
}
