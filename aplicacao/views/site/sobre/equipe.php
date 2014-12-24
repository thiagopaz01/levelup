<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<title>LEVEL UP - EQUIPE</title>
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

<!-- ChartPie Javascript --> 
<script type="text/javascript" src="javascript/jquery.easy-pie-chart.js"></script>
<script type="text/javascript">
$(function() {
    //create instance
    $('.percentage').easyPieChart({
        animate: 2000
    });
});
</script>	

<!-- bxSlider Javascript file -->
<link rel="stylesheet" type="text/css" href="css/bxslider.css">
<script src="javascript/jquery.bxslider.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){    
	$('#testimonials').bxSlider({
	  controls: true,
	  pager: true,
	  adaptiveHeight: true,
	  mode: 'fade'
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){    
	$('#team').bxSlider({
	  controls: true,
	  pager: false,
	  adaptiveHeight: true
	});
});
</script>

</head>

<body onLoad="initPieChart();" id="top">

<div id="wrapper">
							
<div class="section parallax-background" id="about2">
			
	<div class="holder text-align-center">
		<h2 class="uppercase">CONHEÇA UM POUCO DOS NOSSOS PROFISSIONAIS</h2>
			
	</div><!--END HOLDER-->		
			
</div><!--END SECTION--> 


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



<!-- START ABOUT -->

<div id="content-wrapper">
	
	<div class="content">
	
			
	
	
		<div class="section">
				
			<h3 class="title uppercase">Conheça nossa equipe</h3>
			
			<ul class="bxslider" id="team">
			<?php if(is_array($lstEquipe) && count($lstEquipe) > 0):?>
				<?php foreach($lstEquipe as $key => $objEquipe):?>	
					<?php if($key % 3 == 0) echo "<li>";?>		
					<div class="one-third team text-align-center <?php if($key % 3 == 2) echo 'last';?>">
						<img src="<?php echo base_url("conteudo/$objEquipe->imagem");?>" alt="" />	
						<div class="team-member-info">	
							<h2 class="title"><b><?php echo $objEquipe->nome;?></b></h2>
							<h3 class="uppercase"><b><?php echo $objEquipe->subtitulo;?></b></h3>	
							<p><?php echo $objEquipe->descricao;?></p>	
							
						</div><!--END TEAM-MEMBER-INFO-->
					</div><!--END ONE-THIRD-->
					<?php if($key % 3 == 2) echo "</li>";?>
				<?php endforeach;?>
				<?php if($key % 3 != 2) echo "</li>";?>
			<?php endif;?>

			</ul><!--END BXSLIDER TESTIMONIALS--> 			
			
		</div><!--END SECTION-->  	
				
	</div><!--END CONTENT-->
	
</div><!--END CONTENT-WRAPPER--> 

<!-- END ABOUT -->

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