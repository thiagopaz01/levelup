<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<title>LEVEL UP - CLIENTES</title>
<base href="<?php echo base_url('conteudo/site'); ?>/">
<link rel="stylesheet" type="text/css" href="css/style.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/blog.css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/responsive.css" media="screen" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,400italic,600,600italic,700italic,700,800,800italic,300italic,300' rel='stylesheet' type='text/css'>

<script type="text/javascript" src="javascript/jquery-1.8.3.js"></script>
<script type="text/javascript" src="javascript/custom.js"></script>
<script type="text/javascript" src="javascript/header.js"></script>
<script type="text/javascript" src="javascript/bra_twitter_plugin.js"></script>

<!-- PrettyPhoto --> 
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
<script type="text/javascript" src="javascript/prettyPhoto.js"></script>	

<!-- Photostream Javascript --> 
<script type="text/javascript" src="javascript/bra_photostream_plugin.js"></script>

</head>

<body id="top">

<div id="wrapper">	

<!-- START HEADER -->

<div id="header-wrapper">

	<div class="header clear">
		
		<div id="logo">	
			<a href="<?php echo base_url(); ?>"><img src="images/logo.png" alt="" /></a>		
		</div><!--END LOGO-->
	
		<div id="primary-menu">
			
			<ul class="menu">
				<li><a href="<?php echo base_url(); ?>" class="current">Home</a></li>
				<li><a href="javascript:void(0);">SOBRE</a>		
					<ul>
						<li><a href="<?php echo base_url(); ?>equipe">Equipe</a></li>
						<li><a href="<?php echo base_url(); ?>clientes">Clientes</a></li>
					</ul>
			    </li>
				<li><a href="<?php echo base_url(); ?>imagens">IMAGENS</a></li>
				<li><a href="<?php echo base_url(); ?>blog">Blog</a></li>
				<li><a href="<?php echo base_url(); ?>contato">CONTATO</a></li>
			</ul><!--END UL-->
			
		</div><!--END PRIMARY MENU-->
  
	</div><!--END HEADER-->	

</div><!--END HEADER-WRAPPER-->		

<!-- END HEADER -->



<!-- START CLIENTS -->

<div id="content-wrapper">

	<div class="page-header text-align-center">
		
		<h1 class="title uppercase">NOSSOS CLIENTES</h1>	
		<h2 class="subtitle">Empresas atendidas pela Level UP.</h2>	
							
	</div><!--END PAGE-HEADER-->
	
	<div class="content">
	
		<div class="section">
			
			<div class="grid row3 clients">
			<?php if(is_array($lstClientes) && count($lstClientes) > 0):?>
				<?php foreach($lstClientes as $objCliente):?>
				<div><a href="javascript:void(0);"><img src="<?php echo base_url("conteudo/$objCliente->imagem");?>" alt="" /></a></div>
				<?php endforeach;?>
			<?php endif;?>
			</div><!--END UL GRID--> 
						
			<div class="one"><br />
			

	  
			</div><!--END ONE-->
			
		</div><!--END SECTION--> 
		
	
	
				
		
		
							
							
		
			
	</div><!--END CONTENT-->

</div><!--END CONTENT-WRAPPER--> 

<!-- END CLIENTS -->

</div><!--END WRAPPER--> 





<!-- START FOOTER -->

<div id="footer">

	<div class="section alternate">	
	
		<div class="holder">		
					
			<div class="one text-align-center color">	
				<ul class="social-bookmarks full-color rounded">		
					<li><a href="#" class="social-twitter"></a></li>
					<li><a href="#" class="social-facebook"></a></li>	
					<li><a href="#" class="social-instagram"></a></li>
				</ul><!--END SOCIAL-BOOKMARKS-->
				
				<p class="copyright">LEVEL UP curso de idiomas, Av. Norte, 4284, Galeria Anne, 1º andar, Fone: 3314.4284, E-mail: contato@levelupidiomas.com.br, CNPJ:</p>						
			</div><!--END ONE-->	
		
		</div><!--END HOLDER-->	
			
	</div><!--END SECTION-->		
		
</div><!--END FOOTER-->

<!-- END FOOTER -->		         

<a href="#" id="back-top">Top</a> 


</body>
</html>