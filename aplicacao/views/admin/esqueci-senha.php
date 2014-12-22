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
<script src="admin/js/libs/modernizr-2.5.2-respond-1.1.0.min.js"></script>
<script src="admin/js/libs/jquery-1.7.1.min.js"></script>
<script src="admin/js/libs/jquery.sexyalert.min.js"></script>
<script src="admin/js/scripts-admin.js"></script>
<script src="admin/js/kickstart.js"></script>
<script src="admin/js/prettify.js"></script>


<script type="text/javascript">

	$('#form-login').validate();
</script>

<style type="text/css">
body{}
#wrap{background: none;margin:30px auto 30px auto;border: none;position: relative;width: 500px;}
#footer{ display:none;
text-align:center;
padding:20px;
margin:0;
background:#efefef;
border-top:none;
color:#999;
font-size:0.8em;
text-shadow:0px 1px 1px #fff;
border-radius:5px;
}

#login{background: none repeat scroll 0 0 #fff;border: 1px solid rgba(147, 184, 189, 0.8);border-radius:5px;box-shadow: 0 2px 5px rgba(105, 108, 109, 0.7), 0 0 8px 5px rgba(208, 223, 226, 0.4) inset;
    margin:0;
    padding: 18px 6% 60px;
    width: 88%;

}
label{ color:#405C60}
#wrap h4{ text-align:center;color:#405C60}
#wrap h4:after{
	content: ' ';
	display: block;
	width: 100%;
	height: 2px;
	margin-top: 10px;
	background: -moz-linear-gradient(left, rgba(147,184,189,0) 0%, rgba(147,184,189,0.8) 20%, rgba(147,184,189,1) 53%, rgba(147,184,189,0.8) 79%, rgba(147,184,189,0) 100%); 
	background: -webkit-gradient(linear, left top, right top, color-stop(0%,rgba(147,184,189,0)), color-stop(20%,rgba(147,184,189,0.8)), color-stop(53%,rgba(147,184,189,1)), color-stop(79%,rgba(147,184,189,0.8)), color-stop(100%,rgba(147,184,189,0))); 
	background: -webkit-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
	background: -o-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
	background: -ms-linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
	background: linear-gradient(left, rgba(147,184,189,0) 0%,rgba(147,184,189,0.8) 20%,rgba(147,184,189,1) 53%,rgba(147,184,189,0.8) 79%,rgba(147,184,189,0) 100%); 
}
.right{ float:right; text-decoration:none;-moz-transition: all 0.1s linear 0s;
    background:#F7F8F1;
    border: 1px solid #CBD5D6;
    border-radius: 4px 4px 4px 4px;
    color: #1DA2C1;
    display: inline-block;
    font-weight: bold;
    margin-left: 10px;
    padding: 2px 6px;
    text-decoration: none;
	font-size:11px}
.right:hover{ background:#4AB3C6; color:#fff}
.logo{ margin:20px auto 30px auto; width:230px}
</style>
</head>
<body>
<div id="wrap" class="clearfix"> 
<div class="col_12" id="login">
       <!--<h4>Login Área Administrativa</h4> 
       -->
       <div><img src="admin/images/logo.png" alt=""></div>
       
       <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
       <?php echo form_open("adm/email_esqueci_senha",'class="vertical" id="form-login"')?>
       
       		<label for='txtEmail'>Digite seu e-mail</label>
	     	<input id='txtEmail' name='txtEmail' type='text' class="required">
            
            <button type="submit" class="button green" >enviar</button>
            <a href="<?php echo base_url('adm/login'); ?>" class="right">voltar</a>
            
       <?php echo form_close();?>
</div>  
<div class="clear"></div>
<div id="footer">&copy; Copyright <?php echo date("Y") ?>  &ndash; desenvolvido por <a href="http://www.plano4.com.br/" target="_blank" id="plano4">Plano4</a></div>	
</div>  
</body>
</html>