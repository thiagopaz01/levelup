<?php include_once(INC_HEADER_ADMIN);?>

<?php include_once(INC_MENU_ADMIN);?>   
  
  <div class="col_9">
    <div class="col_12 panel">
        <h4>Visualizar contato</h4>
		<table class="striped" cellspacing="0" cellpadding="0">         
			<tbody>				
		    	<tr>
			        <td>Nome:</td>
			        <td><?php echo $objContato->nome; ?></td>			        
		      	</tr>
		      	
		      	<tr>
			        <td>E-mail:</td>
			        <td><?php echo $objContato->email; ?></td>			        
		      	</tr>
		      	
		      	<tr>
			        <td>Telefone:</td>
			        <td><?php echo $objContato->telefone; ?></td>			        
		      	</tr>
		      	
		      	<tr>
			        <td>Mensagem:</td>
			        <td><?php echo $objContato->mensagem; ?></td>			        
		      	</tr>
		      	
		      	<tr>
			        <td>Data:</td>
			        <td><?php echo formataDataBRcomHora($objContato->dtMensagem); ?></td>			        
		      	</tr>		      			      	
		    </tbody>		    
		</table>
      
      	<a class="button green" href="javascript:history.go(-1);">Voltar</a> 
        
  	 </div>
  	</div>  
<?php include_once(INC_FOOTER_ADMIN);?>