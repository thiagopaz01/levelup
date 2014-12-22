<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
<div class="col_9">
	<div class="col_12 panel">
    	<h4>Usuários
			<ul class="button-bar" style="float:right">
            <li><a href="<?php echo base_url("adm/usuario/salvar");?>"><span class="icon" data-icon="p"></span> Novo usuário</a></li>
			</ul>
		</h4>
        <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
        <!-- util -->
        <?php echo form_open("adm/conteudo/excluir","class='vertical'");?>
		<div class="util">
        	<strong>Escolha:</strong> 
            <a href="javascript:void(0);" class="tooltip selecionarTodos" title="selecionar todos"><span class="icon darkgray" data-icon="c"></span> Selecionar todos</a> 
	        <a href="javascript:void(0);" class="tooltip desmarcarTodos" title="desmarcar todos"><span class="icon darkgray" data-icon="m"></span> Desmarcar todos</a> 
	        <a href="javascript:void(0);" class="tooltip excluirTodos" title="excluir selecionados"><span class="icon darkgray" data-icon="T"></span> Excluir selecionados</a> 
		</div>
        
        <!-- Gallery -->
			<div>
        <table class="sortable selectTable" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
            <th><span class="icon darkgray" data-icon="C"></span></th>
            <th>Foto</th>
            <th>Nome</th>
            <th>Login</th>
            <th>Ações</th>
          </tr>
          </thead>
        <tbody>
        <?php if(is_array($lstUsuarios)):?>
          <?php foreach ($lstUsuarios as $objUsuario):?>    
          <tr>
            <td><input type="checkbox" name="check[]" id="usuario-<?php echo $objUsuario->idUsuario;?>" value='<?php echo $objUsuario->idUsuario;?>'></td>
            <td>
            	<img src="<?php echo $objUsuario->imagem;?>" width="100" height="100" />
             </td>
            <td><label title="nome"><?php echo $objUsuario->nome;?></label></td>
            <td><?php echo htmlentities($objUsuario->email);?></td>
            <td>
            	<a class="tooltip" title="Editar" href="<?php echo base_url("adm/usuario/salvar/")?>/<?php echo $objUsuario->idUsuario;?>"><span class="icon gray" data-icon="7"></span></a>
            	<a href="<?php echo base_url("adm/usuario/senha")?>/<?php echo $objUsuario->idUsuario;?>" title="Alterar senha"><span class="icon gray" data-icon="O"></span></a>
            	<a href="javascript:void(0);" class="tooltip inativarUsuario" title="Inativar"><span class="icon gray" data-icon="m"></span></a>            	            	
            </td>
          </tr>
          <?php endforeach;?>
        <?php endif;?>
          </tbody>
      </table>
        </div>
        <?php echo form_close();?>
    </div>  	
</div>  
<?php include_once(INC_FOOTER_ADMIN);?>