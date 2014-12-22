<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?> 
  
  <div class="col_9">
    <div class="col_12 panel">
       <h4>Editar senha usuário - <?php echo $objUsuario->nome; ?></h4>
       <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
       
  	     <?php echo form_open_multipart("adm/usuario/salvarSenha/$objUsuario->idUsuario","class='vertical'");?>
  	     	<input type="hidden" name="id" id="id" value="<?php echo $objUsuario->idUsuario; ?>" />
  	     
			<?php if ($objUsuario->imagem != ""): ?>		  
          		<p class="arquivo">					
					<img src="<?php echo $objUsuario->imagem; ?>" width="100" />			
	  			</p>
			<?php endif; ?>
         
			<label for='txtNome'>Digite a nova senha</label>
	     	<input id='txtSenha' name='txtSenha' type='password'>
	     
	     	<label for='txtNome'>Repita a nova senha</label>
	     	<input id='txtRepSenha' name='txtRepSenha' type='password'>
	  
	      	<button type="submit" class="button green" >Salvar</button>	        
	        <a class="button red" href="<?php echo base_url("adm/usuarios");?>">Cancelar</a>
        
    	<?php echo form_close();?>
  	 </div>
  	</div>  
<?php include_once(INC_FOOTER_ADMIN);?>