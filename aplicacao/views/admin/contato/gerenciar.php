<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
<div class="col_9">
	<div class="col_12 panel">
    	<h4>Contatos - <?php echo $objCategoria->descricao;?></h4>
        <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
        <!-- util -->
        <?php echo form_open("adm/contato/excluir/$objCategoria->idCategoria","class='vertical'");?>
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
            <th>Nome</th>
            <th>E-mail</th>
            <th>Data</th>
            <th>Ações</th>
          </tr>
          </thead>
        <tbody>
        <?php if(is_array($lstContatos)):?>
          <?php foreach ($lstContatos as $objContato):?>
          <tr>
            <td><input type="checkbox" name="check[]" id="conteudo-<?php echo $objContato->idContato;?>" value='<?php echo $objContato->idContato;?>'></td>
            <td><label title="nome"><?php echo $objContato->nome; ?></label></td>
            <td><?php echo $objContato->email; ?></td>
            <td><?php echo formataDataBRcomHora($objContato->dtMensagem); ?></td>
            <td><a href="<?php echo base_url("adm/contato/visualizar")?>/<?php echo $objCategoria->idCategoria;?>/<?php echo $objContato->idContato;?>"><span class="icon gray tooltip" title="Visualizar" data-icon="s"></span></a> <a href="javascript:void(0);" class="tooltip excluirItem" title="Excluir"><span class="icon gray" data-icon="m"></span></a></td>
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