<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
  <div class="col_9">
    <div class="col_12 panel">
       <h4><?php if(isset($id)) echo "Editar"; else echo "Inserir";?> usuário</h4>
       <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
       <?php $idCont = "";?>
       <?php if(isset($id)) $idCont = $id;?>
  	     <?php echo form_open_multipart("adm/usuario/confirmar/$idCont","class='vertical'");?>
  	     <input type="hidden" name="id" id="id" value="<?php if(isset($id)) echo $id;?>" />
  	     
         <label for='txtNome'>Nome</label>
	     <input id='txtNome' name='txtNome' type='text' value='<?php echo set_value('txtNome',$nome) ?>'>
	     
	     <label for='txtNome'>E-mail</label>
	     <input id='txtEmail' name='txtEmail' type='text' value='<?php echo set_value('txtEmail',$email) ?>'>
     <?php if(!isset($id)):?>
	     <label for='txtNome'>Senha</label>
	     <input id='txtSenha' name='txtSenha' type='password'>
	     
	     <label for='txtNome'>Repita a senha</label>
	     <input id='txtRepSenha' name='txtRepSenha' type='password'>
     <?php endif;?>
     <?php if($imagem != ""):?>
		  <p class="arquivo hidden">
			<label for="fupImagem">Imagem</label>
			<input id="fupImagem" name="fupImagem" type="file"/>
                    <a class="button small linkAlterar">Cancelar</a>
		  </p>
          <p class="arquivo">
			<label for="fupImagem">Imagem</label>
			<img src="<?php echo $imagem;?>" width="100" />
			<a class="button small linkAlterar">Alterar</a>
		  </p>
	<?php else:?>
			<label for="fupImagem">Imagem</label>
			<input id="fupImagem" name="fupImagem" type="file"/>
	<?php endif;?>
			<label for="selPerfil">Perfil</label>
            <?php echo form_dropdown('selPerfil', $lstPerfis, $perfil,'class="fancy"');?>
      
      	<button type="submit" class="button green" >Salvar</button> 
        
        <a class="button red" href="<?php echo base_url("adm/usuarios");?>">Cancelar</a>
        
    	<?php echo form_close();?>
  	 </div>
  	</div>  
<?php include_once(INC_FOOTER_ADMIN);?>