<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
<div class="col_9">
	<div class="col_12 panel">
    	<h4>Últimos conteúdos cadastrados</h4>
        <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
        <!-- util -->
		
        <!-- Gallery -->
			<div>
        <table class="sortable selectTable" cellspacing="0" cellpadding="0">
        <thead>
            <tr>
            <th><span class="icon darkgray" data-icon="C"></span></th>
            <th>Título</th>
            <th>Categoria</th>
            <th>Última alteração</th>
            <th>Usuário</th>
          </tr>
          </thead>
        <tbody>
        <?php if(is_array($lstConteudos)):?>
          <?php foreach ($lstConteudos as $objConteudo):?>    
          <tr>
            <td><input type="checkbox" name="check[]" id="conteudo-<?php echo $objConteudo->idConteudo;?>" value='<?php echo $objConteudo->idConteudo;?>'></td>
            <td><label title="nome"><?php echo $objConteudo->valor(1,'char');?></label></td>
            <td><label><?php echo $objConteudo->categoria()->descricao;?></label></td>
            <td><?php echo formataDataBRcomHora($objConteudo->dtModificacao);?> (<?php echo data_passada($objConteudo->dtModificacao)?>)</td>
            <td><label><?php echo $objConteudo->usuario()->nome;?></label></td>
          </tr>
          <?php endforeach;?>
        <?php endif;?>
          </tbody>
      </table>
        </div>
    </div>  	
</div>  
<?php include_once(INC_FOOTER_ADMIN);?>