<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
  <div class="col_9">
    <div class="col_12 panel">
       <h4>Visualizar conteúdo - <?php echo $objCategoria->descricao;?></h4>
  	     <?php echo form_open_multipart("adm/conteudo/confirmar/$c/$id","class='vertical'");?>
  	     <input type="hidden" name="id" id="id" value="<?php if(isset($id)) echo $id;?>" />
         <?php if(is_array($lstCampos)):?>
                <?php foreach($lstCampos as $objCampo):?>
                    <?php visualizarCampo($objCampo->tipo,$objCampo->nome,$objCampo->id,$objCampo->classe,$objCampo->valor,$objCampo->arrayValor);?>
                <?php endforeach;?>
         <?php endif;?>
         <table class="sortable" cellspacing="0" cellpadding="0">
		    <thead>
		      <tr>
		       
		        <th>Imagem</th>
		        <th>Título</th>
		        <th>Data</th>
		      </tr>
		    </thead>
		    <tbody>
		      <tr>
		       
		        <td><img src="http://placehold.it/100x100/4D99E0/ffffff.png&text=100x100" width="100" height="100" /></td>
		        <td>todas as imagens agora devem ter título</td>
		        <td>27/03/2012</td>
		       
		      </tr>
		    </tbody>
		  </table>
      
      	<a class="button green" href="<?php echo base_url("adm/conteudo/salvar/$c/$id")?>">Editar</a> 
        
    	<?php echo form_close();?>
  	 </div>
  	</div>  
<?php include_once(INC_FOOTER_ADMIN);?>
