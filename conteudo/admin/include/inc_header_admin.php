<!doctype html>
<!--[if IE 8 ]> <html lang="pt-br" class="no-js ie8"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="pt-br" class="no-js">
<!--<![endif]-->
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>Área administrativa</title>
<base href="<?php echo base_url(); ?>conteudo/">
<meta name="description" content="Área administrativa">
<meta name="author" content="Plano4">
<meta name="robots" content="noindex,nofollow">
<meta name="viewport" content="width=device-width">
<link rel="stylesheet" href="admin/css/style-admin.css?v=<?php echo microtime(false); ?>">
<link rel="stylesheet" type="text/css" href="admin/css/kickstart.css?v=<?php echo microtime(false); ?>">
<link rel="stylesheet" type="text/css" href="admin/css/jquery.sexyalert.css">
<link rel="stylesheet" type="text/css" href="admin/css/ui-lightness/jquery-ui-1.8.18.custom.css">
<link rel="shortcut icon" href="site/favicon.ico"/>
<script src="admin/js/libs/modernizr-2.5.2-respond-1.1.0.min.js"></script>
<script src="admin/js/libs/jquery-1.7.1.min.js"></script>
<script src="admin/js/libs/jquery.sexyalert.min.js"></script>
<script src="admin/js/scripts-admin.js"></script>
<script src="admin/js/kickstart.js"></script>
<script src="admin/js/prettify.js"></script>
<script src="admin/js/libs/jquery-ui-1.8.18.custom.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="ckeditor/adapters/jquery.js"></script>
<script>
$(document).ready(function(){
	$('textarea.editor').ckeditor();
});
</script>
</head>
<body>
<!--<a id="top-of-page"></a>-->
<div id="dados" class="clearfix">    
    <div id="logoCliente">
        <a href="<?php echo base_url('adm');?>"><img src="admin/images/logo_adm.png" alt="<?php echo NOME_CLIENTE; ?>" title="<?php echo NOME_CLIENTE; ?>" /></a>
    </div>

    <div id="info-usuario">
        <img src="<?php echo $objUsuarioLogado->imagem; ?>" alt="<?php echo $objUsuarioLogado->nome; ?>" width="90"  />
        <span>Bem vindo,</span> <?php echo $objUsuarioLogado->nome; ?>
    </div>    
</div>

<div id="wrap" class="clearfix">    
  <div class="col_12"> 
  <input type="hidden" name="urlBase" id="urlBase" value="<?php echo base_url();?>">
    <!-- Menu Horizontal -->
    <ul class="menu" style="z-index: 999999;">
      <li class="<?php if (verificarPaginaAtiva('home')) { echo 'current'; } ?>"><a href="<?php echo base_url("adm/home"); ?>">Home</a></li>
      <li class="<?php if (verificarPaginaAtiva('usuario')) { echo 'current'; } ?>"><a href="javascript:void(0);"><span class="icon" data-icon="R"></span>Configurações</a>
        <ul>
          <li><a href="<?php echo base_url("adm/usuario/gerenciar")?>"><span class="icon" data-icon="G"></span>Usuários</a></li>
        </ul>
      </li>
      <li><a href="<?php echo base_url(); ?>" target="_blank"><span class="icon" data-icon="}"></span>Acessar o site</a></li>
      <li><a href="<?php echo base_url("adm/logout"); ?>"><span class="icon" data-icon="X"></span>Sair</a></li>
    </ul>
  </div>
 <?php 
 include_once 'conteudo/ckeditor/ckeditor.php';
 ?>