<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
  <div class="col_9">
    <div class="col_12 panel">
       <h4><?php if(isset($id)) echo "Editar"; else echo "Inserir";?> conteúdo - <?php echo $objCategoria->descricao;?></h4>
       <?php if(isset($msg) && is_object($msg)) echo $msg->mensagem();?>
  	     <?php echo form_open_multipart("adm/conteudo/confirmar/$c/$id","class='vertical formConteudo'");?>
  	     <input type="hidden" name="id" id="id" value="<?php if(isset($id)) echo $id;?>" />
  	     <input type="hidden" name="urlRet" id="urlRet" value="conteudo/salvar/<?php echo $c;?>/<?php if(isset($id)) echo $id;?>" />
         <?php if(is_array($lstCampos)):?>
                <?php foreach($lstCampos as $objCampo):?>
                    <?php inserirCampo($objCampo->tipo,$objCampo->nome,$objCampo->id,$objCampo->classe,$objCampo->valor,$objCampo->arrayValor);?>
                <?php endforeach;?>
            <?php endif;?>
		
      	<button type="submit" class="button green" >Salvar</button> 
        
        <a class="button red" href="<?php echo base_url("adm")?>/<?php echo $urlRet;?>/<?php echo $c;?>">Cancelar</a>
        
    	<?php echo form_close();?>
  	 </div>
  	</div>  
<?php include_once(INC_FOOTER_ADMIN);?>