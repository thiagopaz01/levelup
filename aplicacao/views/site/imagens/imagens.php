<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<title>LEVEL UP imagens</title>
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

<!-- Masonry Javascript File --> 
<script type="text/javascript" src="javascript/jquery.isotope.min.js"></script>	
<script type="text/javascript" src="javascript/toucheffects.js"></script>

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



<!-- START PORTFOLIO -->

<div id="content-wrapper">

	<div class="page-header text-align-center">
			
		<h1 class="title uppercase">Veja nosso curso e sua estrutura</h1>	
							
	</div><!--END PAGE-HEADER-->
	
	<div class="content">
	
		<div class="section">				
	
		<div class="filterable text-align-center">	
			<ul id="gallery-nav">
				<li class="current"><a href="#" data-filter="*">Todas</a></li>
			<?php if(is_array($lstCategorias) && count($lstCategorias) > 0):?>
				<?php foreach($lstCategorias as $objCat):?>
				<li><a data-filter=".<?php echo $objCat->nome;?>" href="#"><?php echo $objCat->nome;?></a></li>
				<?php endforeach;?>
			<?php endif;?>
			</ul><!--END PORTFOLIO-NAV-->
		</div><!--END FILTERABLE-->
			
		<div class="portfolio-grid">
	
			<ul id="thumbs" class="gallery col4 style-3">
			<?php if(is_array($lstImagens) && count($lstImagens) > 0):?>
				<?php foreach($lstImagens as $objImagem):?>
				<li class="item <?php echo $objImagem->catImagem;?>">
					<div>
						<a href="<?php echo base_url("conteudo/$objImagem->imagem2");?>" data-rel="prettyPhoto[landscape]"><img src="<?php echo base_url("conteudo/$objImagem->imagem");?>" alt="" /></a>
						<div class="caption">
							<h3 class="title"><a href="blog-single2.html"><?php echo $objImagem->titulo;?></a></h3>
							<h4 class="title"><?php echo $objImagem->catImagem;?></h4>				
						</div>
					</div>
				</li>
				<?php endforeach;?>
			<?php endif;?>
				
			</ul><!--END UL-->
				
		</div><!--END PORTFOLIO-GRID-->	
			
	</div><!--END SECTION--> 
			
	</div><!--END CONTENT-->

</div><!--END CONTENT-WRAPPER--> 

<!-- END PORTFOLIO -->

</div><!--END WRAPPER--> 





<!-- START FOOTER -->

<div id="footer">

	<div class="section">								
						
			
		
		<div class="divider-border"></div>			
				
		<div class="one text-align-center">	
			<ul class="social-bookmarks rounded">		
				<li><a href="#" class="social-twitter"></a></li>
				<li><a href="#" class="social-facebook"></a></li>
				<li><a href="#" class="social-instagram"></a></li>
			</ul><!--END SOCIAL-BOOKMARKS-->
			<p class="copyright">LEVEL UP curso de idiomas, Av. Norte, 4284, Galeria Anne, 1º andar, Fone: 3314.4284, E-mail: contato@levelupidiomas.com.br, CNPJ:</p>							
		</div><!--END ONE-->	
			
	</div><!--END SECTION-->	
		
</div><!--END FOOTER-->

<!-- END FOOTER -->		         

<a href="#" id="back-top">Top</a> 

	
	<a class="open" href="#"></a>

</div><!--PANEL-->

</body>
</html>