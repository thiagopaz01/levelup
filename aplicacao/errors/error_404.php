<!doctype html>
<!--[if IE 8 ]> <html lang="pt-br" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="pt-br" class="no-js">
<!--<![endif]-->
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php echo NOME_CLIENTE; ?> | Página não encontrada</title>
		<base href="<?php echo config_item('base_url'); ?>conteudo/">
		<meta name="description" content="Página não encontrada">
		<meta name="author" content="Plano4">
		<meta name="robots" content="noindex,nofollow">
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="admin/css/style-admin.css">
		<link rel="stylesheet" type="text/css" href="admin/css/kickstart.css">
		<link rel="stylesheet" type="text/css" href="admin/css/jquery.sexyalert.css">
		<link rel="stylesheet" type="text/css" href="admin/css/ui-lightness/jquery-ui-1.8.18.custom.css">
		<script src="admin/js/libs/modernizr-2.5.2-respond-1.1.0.min.js"></script>
		<script src="admin/js/libs/jquery-1.7.1.min.js"></script>
		<script src="admin/js/libs/jquery.sexyalert.min.js"></script>
		<script src="admin/js/scripts-admin.js"></script>
		<script src="admin/js/kickstart.js"></script>
		<script src="admin/js/prettify.js"></script>
		<script src="admin/js/libs/jquery-ui-1.8.18.custom.min.js"></script>
		<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
		<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
		<style type="text/css">
			body { background-image: none !important; background-color: #fff; margin: 50px; font-size: 18px; }
			hr.alt1 { margin: 20px 0px; }
			.erro404 { 
				border:1px solid #828282;	 
				margin:0 auto; 
				padding: 50px; 
				position:relative; 
				background: -moz-linear-gradient(top, #E8E8E8, #fff) repeat-X;
				background: -webkit-gradient(linear, left top, left bottom, from(#E8E8E8), to(#fff)) repeat-X;
				-ms-filter: "progid:DXImageTransform.Microsoft.gradient(startColorstr=#E8E8E8, endColorstr=#FFFFFFFF)";
				filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=#E8E8E8, endColorstr=#FFFFFFFF);
				-moz-border-radius: 10px;
			  	-webkit-border-radius: 10px;
			  	border-radius: 10px;
			}
			.erro404 h1{ margin: 0px; }
			.erro404 li { color: #666666; font-size: 15px; }
		</style>
	</head>

	<body>
		<div class="erro404 inner">
	      	<h1>PÁGINA NÃO ENCONTRADA</h1>      	
	      	<hr class="alt1" />      	
	      	<p>Por algum motivo a página que você tentou acessar não pode ser apresentada e pode acontecer pelos seguintes motivos:</p>      	
	        <ul class="checks">
	        	<li>O conteúdo não está mais no ar;</li>
				<li>A página não existe;</li>
				<li>Você digitou o endereço errado.</li>
	        </ul>                
			<a class="button green large" href="<?php echo config_item('base_url'); ?>" title="Ir para o início">
				<span class="icon large" data-icon=":"></span>
				Página inicial
			</a>
		</div>
	</body>
</html>