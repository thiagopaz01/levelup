<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
<div class="col_9">
	<div class="col_12 panel">
    	<h4>Conteúdos - <?php echo $objCategoria->descricao;?>
			<ul class="button-bar" style="float:right">
            <li><a href="<?php echo base_url("adm/conteudo/salvar");?>/<?php echo $objCategoria->idCategoria;?>"><span class="icon" data-icon="p"></span> Novo conteúdo</a></li>
			</ul>
		</h4>
        <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
        <!-- util -->
        <?php echo form_open("adm/conteudo/excluir/$objCategoria->idCategoria","class='vertical'");?>
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
            <th>Título</th>
            <th>Última alteração</th>
            <th>Ações</th>
          </tr>
          </thead>
        <tbody>
        <?php if(is_array($lstConteudos)):?>
          <?php foreach ($lstConteudos as $objConteudo):?>    
          <tr>
            <td><input type="checkbox" name="check[]" id="conteudo-<?php echo $objConteudo->idConteudo;?>" value='<?php echo $objConteudo->idConteudo;?>'></td>
            <td><label title="nome"><?php echo $objConteudo->valor(1,'char');?></label></td>                        
            <td><?php echo formataDataBRcomHora($objConteudo->dtModificacao);?> (<?php echo data_passada($objConteudo->dtModificacao)?>)</td>
            <td>
            	<?php if ($objCategoria->idCategoria == 51): // Verifica se é categoria de curso para inserir link para grade curricular ?>
            		<a href="<?php echo base_url("adm/curso/grade-gerenciar"); ?>/<?php echo $objConteudo->idConteudo; ?>" class="tooltip" title="Grade curricular"><span class="icon gray" data-icon="S"></span></a>
            		&nbsp;
            	<?php endif; ?>            	
            	<a href="<?php echo base_url("adm/conteudo/salvar/")?>/<?php echo $objConteudo->idCategoria;?>/<?php echo $objConteudo->idConteudo;?>"><span class="icon gray" data-icon="7"></span></a>
            	&nbsp;
            	<a href="javascript:void(0);" class="tooltip excluirItem" title="Inativar"><span class="icon gray" data-icon="m"></span></a>
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