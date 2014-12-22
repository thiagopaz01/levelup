<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<title>LEVEL UP idiomas</title>
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

<!-- Flexslider JavaScript Files -->	
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript" src="javascript/jquery.flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#index-slider').flexslider({
		animation: "fade",  
		slideDirection: "",       
		slideshowSpeed: 3500,      
		animationDuration: 500,	       
		pauseOnHover: true,		
        smoothHeight: true
	});	
});
</script>	

<!-- bxSlider Javascript file -->
<link rel="stylesheet" type="text/css" href="css/bxslider.css">
<script src="javascript/jquery.bxslider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){    
	$('#testimonials').bxSlider({
	  controls: false,
/*    video: true,*/
	  auto: false,
	  pause: 2000,
	  adaptiveHeight: true,
	  mode: 'fade'
	});
});
</script>

</head>

<body id="top">

<div id="wrapper">	

	<div class="fullwidth">

		<div class="flexslider" id="index-slider">
			
			<ul class="slides">
				
				<li>
					<a href="#"><img src="images/slider1.jpg" alt="" /></a>
					<div class="flex-caption transparent light-font center">
						
					</div>
			  </li>
					
				<li>
					<a href="#"><img src="images/slider2.jpg" alt="" /></a>
					<div class="flex-caption transparent dark-font">
						<div>
							<h2><span class="uppercase">UNIVERSITÁRIO <br>DÊ UM UP NA SUA CARREIRA PROFISSIONAL</span></h2>
							<p><span class="lowercase">Descontos especiais para universitários<br>Cursos regulares e semi-intensivos </span></p>
							<p><a href="#" class="button medium orange">veja mais</a></p>
						</div>
					</div>
			  </li>
			  <li>
					<a href="#"><img src="images/slider3.jpg" alt="" /></a>
					<div class="flex-caption transparent dark-font">
						<div>
							<h2><span class="uppercase">CUROS PARA FAIXAS DIFERENTES </br>DE IDADES</span></h2>
							<p><a href="#" class="button medium orange">veja mais</a></p>
						</div>
					</div>
			  </li>
					
				
					
			</ul><!--END UL SLIDES-->
			
		</div><!--END FLEXSLIDER-->
		
	</div><!--END FULLWIDTH-->
	

<!-- START HEADER -->

<div id="header-wrapper" class="alternate">

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
			



<!-- START HOME -->

<div id="content-wrapper">
	
	<div class="content">								
							
		<div class="section alternate">
		
			<div class="holder text-align-center">		
								
				<div class="one-fourth text-align-center">
					<h1><i class="icon-pencil"></i></h1>
					<h3>MATERIAL</h3>
					<p><?php echo $material->texto;?></p>
				</div><!--END ONE-FOURTH-->		
										
				<div class="one-fourth text-align-center">
					<h1><i class="icon-thumbs-up-alt"></i></h1>
					<h3>PREÇOS</h3>
					<p><?php echo $precos->texto;?></p>
				</div><!--END ONE-FOURTH-->		
											
				<div class="one-fourth text-align-center">
					<h1><i class="icon-lightbulb"></i></h1>
					<h3>OUTROS</h3>
					<p><?php echo $outros->texto;?></p>
				</div><!--END ONE-FOURTH-->			
										
				<div class="one-fourth text-align-center last">
					<h1><i class="icon-comments"></i></h1>
					<h3>GRUPOS</h3>
					<p><?php echo $grupos->texto;?></p>
				</div><!--END ONE-FOURTH LAST-->
				
				
					
			
			</div><!--END HOLDER-->
		
		</div><!--END SECTION ALTERNATE--> 	
		
		
	
		<div class="section text-align-center">			
			
			<h3 class="title uppercase">DIFERENCIAL</h3><br>
				
			<div class="portfolio-grid">
		
				<ul id="thumbs" class="col3">
				<?php if(is_array($lstDiferencial) && count($lstDiferencial) > 0):?>
					<?php foreach($lstDiferencial as $objDiferencial):?>
					<li class="item web">
						<img src="<?php echo base_url("conteudo/$objDiferencial->imagem");?>" alt="" width="368" />
						<div class="col4 item-info">
							<h3 class="title"><a href="<?php echo $objDiferencial->link;?>"><?php echo $objDiferencial->titulo;?></a></h3>
						</div><!--END ITEM-INFO--> 	
						<div class="item-info-overlay">
						<div>
								
							<p><?php echo $objDiferencial->texto;?></p>
							 
							<a href="<?php echo base_url("conteudo/$objDiferencial->imagem");?>" class="button small rounded orange" data-rel="prettyPhoto[web]">preview</a>
						</div>					
						</div><!--END ITEM-INFO-OVERLAY--> 
					</li>	
					<?php endforeach;?>
				<?php endif;?>							
					
				</ul><!--END UL THUMBS--> <br>  
					
			</div><!--END PORTFOLIO-GRID-->
		
		</div><!--END SECTION-->	
					
		<div class="section parallax-background dark" id="index">
	
			<div class="holder text-align-center">
				<h2 class="uppercase">SOBRE NÓS</h2>
				<h3><?php echo $sobrenos->texto;?></h3><br>
					
			</div><!--END HOLDER-->		
			
		</div><!--END SECTION--> 
		 
		
							
							
		
			
	</div><!--END CONTENT-->

</div><!--END CONTENT-WRAPPER--> 

<!-- END HOME -->

</div><!-- END WRAPPER --> 

<!-- START FOOTER -->

<div id="footer">
<div class="section">								
						
		<div class="one text-align-center">	

			
		</div><!--END ONE-->		

<div class="section alternate">	
	
		<div class="holder">		
					
			<div class="one text-align-center color">	
				<ul class="social-bookmarks full-color rounded">		
					<li><a href="#" class="social-twitter"></a></li>
					<li><a href="#" class="social-facebook"></a></li>	
					<li><a href="#" class="social-instagram"></a></li>
				</ul><!--END SOCIAL-BOOKMARKS-->
				
									
			<p class="copyright"><?php echo $endereco->texto;?></p>	
			</div><!--END ONE-->	
		
		</div><!--END HOLDER-->	
			
	</div><!--END SECTION-->		
		
</div><!--END FOOTER-->

<!-- END FOOTER -->		         

<a href="#" id="back-top">Top</a> 



</body>
</html>