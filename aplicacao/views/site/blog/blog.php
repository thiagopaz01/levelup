<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
<meta name="viewport" content="width=device-width" />
<title>LEVEL UP - blog</title>
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

<!-- Audio Player Javascript --> 
<script type="text/javascript" src="javascript/jquery.player.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jplayer.css" media="screen" />

<!-- Flexslider JavaScript Files -->	
<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
<script type="text/javascript" src="javascript/jquery.flexslider.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$('#blog-slider').flexslider({
		animation: "fade",              
		slideshowSpeed: 3500,      
		animationDuration: 500,  
		directionNav: true, 
		controlNav: false,	
		pauseOnHover: true,			
        smoothHeight: true
	});	
});
</script>		

</head>

<body id="top">	

<div id="wrapper">					

<!-- START HEADER -->

<div id="header-wrapper">

	<div class="header clear">
		
		<div id="logo">	
			<a href="index-2.html"><img src="images/logo.png" alt="" /></a>		
		</div><!--END LOGO-->
	
		<div id="primary-menu">
			
			<ul class="menu">
				<li><a href="index2.html" class="current">Home</a></li>
				<li><a href="#">SOBRE</a>		
					<ul>
						<li><a href="team2.html">Equipe</a></li>
						<li><a href="clients.html">Clientes</a></li>
					</ul>
			    </li>
				<li><a href="gallery-4.html">IMAGENS</a></li>
				<li><a href="blog2.html">Blog</a></li>
				<li><a href="contact3.html">CONTATO</a></li>
			</ul><!--END UL-->
			
		</div><!--END PRIMARY MENU-->
		
	</div><!--END HEADER-->	
	
</div><!--END HEADER-WRAPPER-->		

<!-- END HEADER -->



<!-- START BLOG -->

<div id="content-wrapper">

	<div class="page-header text-align-center">
		
		<h1 class="title uppercase">Blog</h1>
						
	</div><!--END PAGE-HEADER-->
		
	<div class="blog1 two-half content">
		
			<div class="post">
			
				<div class="post-holder">
				
					<div class="post-media">		
						<a href="#"><img src="images/portfolio-slider-3.jpg" alt="" /></a>			
					</div><!--END POST-MEDIA-->		
					
					<div class="post-content">	
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">Jun</span> <span class="day">27</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>4</span> comments</a></li>	
							</ul>										
						</div><!--END POST-DATE-->	
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Duis aute irure dolor in reprehenderit in voluptate.</a></h2>
						</div><!--END POST-TITLE-->	
					
						
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
			
			
		
			
		
			<div class="post">	
			
				<div class="post-holder">	
                
					<div class="post-media featured-image">		
									
						<script type="text/javascript">
							jQuery(document).ready(function($) { 
								if($().jPlayer) {
									$("#jquery_jplayer").jPlayer({
										ready: function () {
											$(this).jPlayer("setMedia", {					
												mp3: "audio/VTubic.mp3",
												oga: "audio/VTubic.ogg",		    	
												end: ""
											});
										},
										swfPath: "files/jplayer",
										cssSelectorAncestor: "#jp_interface",
										supplied: "oga,mp3,  all"
									});						
								}
							});
							</script>
							
							<img src="images/portfolio-slider-2.jpg" alt="" width="270" />
							
							<div class="player">
								
								<div id="jquery_jplayer" class="jp-jplayer-audio"></div>
											
								<div class="jp-audio-container">
								
									<div class="jp-audio">
									
										<div class="jp-type-single">
										
											<div id="jp_interface" class="jp-interface">
											
												<ul class="jp-controls">
													<li><div class="seperator-first"></div></li>
													<li><div class="seperator-second"></div></li>
													<li><a href="#" class="jp-play" tabindex="1">play</a></li>
													<li><a href="#" class="jp-pause" tabindex="1">pause</a></li>
													<li><a href="#" class="jp-mute" tabindex="1">mute</a></li>
													<li><a href="#" class="jp-unmute" tabindex="1">unmute</a></li>
												</ul>
															
												<div class="jp-progress-container">
													<div class="jp-progress">
														<div class="jp-seek-bar">
															<div class="jp-play-bar"></div>
														</div><!--END jp-seek-bar-->
													</div><!--END jp-progress-->
												</div><!--END jp-progress-container-->
												
												<div class="jp-volume-bar-container">
													<div class="jp-volume-bar">
														<div class="jp-volume-bar-value"></div>
													</div><!--END jp-volume-bar-->
												</div><!--END jp-volume-bar-container-->
												
											</div><!--END jp-interface-->
											
										</div><!--END jp-type-single-->
										
									</div><!--END audio-->
												
								</div><!--END jp-audio-container-->
								
							</div><!--END PLAYER-->
									
						</div><!--END POST-MEDIA-->
				
					<div class="post-content">
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">jun</span> <span class="day">12</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>1</span> comments</a></li>	
							</ul>											
						</div><!--END POST-DATE-->		
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Cras mattis consectetur purus sit amet fermentum.</a></h2>
						</div><!--END POST-TITLE-->
					
							
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
			
			
			
			
		
			<div class="post">	
			
				<div class="post-holder">		
				
					<div class="post-media">
						
						<div class="flexslider" id="blog-slider">
						
							<ul class="slides">
								<li>
									<a href="#"><img src="images/portfolio-slider-1.jpg" alt="" /></a>								
								</li>
								<li>
									<a href="#"><img src="images/portfolio-slider-2.jpg" alt="" /></a>								
								</li>
								<li>
									<a href="#"><img src="images/portfolio-slider-3.jpg" alt="" /></a>								
								</li>
							</ul><!--END UL SLIDES-->
							
						</div><!--END FLEXSLIDER-->	
						
					</div><!--END POST-MEDIA-->	
				
					<div class="post-content">
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">may</span> <span class="day">18</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>9</span> comments</a></li>	
							</ul>									
						</div><!--END POST-DATE-->		
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Omnis iste natus sit accusantium.</a></h2>
						</div><!--END POST-TITLE-->
					
							
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
			
			
			
			
			
			
		
			<div class="post">	
			
				<div class="post-holder">
					
					<div class="post-media">		
						<div class="responsive-video-div responsive-video-vimeo">
							<div>
								<iframe src="http://player.vimeo.com/video/34177255?title=0&amp;byline=0&amp;portrait=0" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe>
							</div>
						</div>
					</div><!--END POST-MEDIA-->	
				
					<div class="post-content">	
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">Mar</span> <span class="day">18</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>9</span> comments</a></li>	
							</ul>										
						</div><!--END POST-DATE-->		
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Omnis iste natus sit accusantium.</a></h2>
						</div><!--END POST-TITLE-->
					
							
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
			
			
		
			
		
			<div class="post">	
			
				<div class="post-holder">
				
					<div class="post-media">		
						<a href="#"><img src="images/portfolio-slider-1.jpg" alt="" /></a>					
					</div><!--END POST-MEDIA-->	
				
					<div class="post-content">	
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">Apr</span> <span class="day">19</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>no</span> comments</a></li>	
							</ul>									
						</div><!--END POST-DATE-->		
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Lorem ipsum dolor amet adipiscing elit.</a></h2>
						</div><!--END POST-TITLE-->
					
							
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
			
			
		
			
		
			<div class="post">	
			
				<div class="post-holder">
					
					<div class="post-media">		
						<div class="responsive-video-div responsive-video-youtube">
							<div>
								<iframe src="http://www.youtube.com/embed/1jv_UbCmtIU?wmode=transparent&amp;showinfo=0&amp;rel=0" frameborder="0" allowfullscreen></iframe>
							</div>
						</div>
					</div><!--END POST-MEDIA-->	
				
					<div class="post-content">	
				
						<div class="post-date">
							<ul>
								<li class="date"><span class="month">Mar</span> <span class="day">18</span> <span class="year">2013</span></li>
								<li class="comments"><a href="#"><span>9</span> comments</a></li>	
							</ul>										
						</div><!--END POST-DATE-->		
					
						<div class="post-title">				
							<h2 class="title"><a href="blog-single.html">Omnis iste natus sit accusantium.</a></h2>
						</div><!--END POST-TITLE-->
					
							
					
						<div class="post-entry">
								
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam enim enim, pharetra in sodales at, interdum sit amet dui. Nullam vulputate euismod urna non pharetra. Phasellus blandit mattis ipsum, ac laoreet lorem lacinia et. Cras et ligula libero. Quisque quis&hellip;</p>
							<p><a href="#" class="button medium grey">Continue lendo</a></p>
						
						</div><!--END POST-ENTRY-->
						
					</div><!--END POST-CONTENT -->
					
				</div><!--END POST-HOLDER -->	
				
			</div><!--END POST-->
            
			
			<div class="wp-pagenavi text-align-center">
				<span class="pages">página 1 de 9</span>
				<span class="current">1</span>
				<a href="#">2</a>
				<a href="#">3</a>
				<a href="#">4</a>
				<a href="#">5</a>
				<a href="#">&rarr;</a>			
			</div><!--END WP-PAGENAVI-->	
			
	</div><!--END CONTENT-->
		
</div><!--END CONTENT-WRAPPER--> 

<!-- END BLOG -->

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