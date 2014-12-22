$(document).ready(function(){
    
    var ids = new Array();
    
	//Alternar os links do cadastro das imagens
    $('.arquivo a.linkAlterar').click(function(){
        $('.arquivo').toggleClass('hidden');
        $('.arquivo input').val('');
    });
    
    $('.excluirItem').live('click',function(e){
        e.preventDefault();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir o item<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        $('.sortable :checkbox').attr('checked',false);
        elemento.parents('tr').find(':checkbox').attr('checked',true);
        abrirLightbox(msg,elemento,form);
    }); 

    $('.inativarUsuario').live('click',function(e){
        e.preventDefault();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja inativar o usuário<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/usuario/inativar");
        $('.sortable :checkbox').attr('checked',false);
        elemento.parents('tr').find(':checkbox').attr('checked',true);
        abrirLightbox(msg,elemento,form);
    });
    
    $('.inativarTodos').live('click',function(e){
        e.preventDefault();
        $('.selectTable').find(':checkbox').attr('checked',true);
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja inativar o usuário<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/usuario/inativar");
        
        abrirLightbox(msg,elemento,form);
    });
    
    $('.resetarSenha').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-idprofessor');
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja resetar a senha do professor<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/professor/resetar/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.cancelarChamado').live('click',function(e){
        e.preventDefault();
        var cat = $(this).attr('id-categoria');
        var titulo = $(this).parents('tr').find('label[title="numeroChamado"]').text();
        var id = $(this).attr('id-chamado');
        var msg = "Tem certeza que deseja cancelar o chamado <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/chamado/cancelarChamado/"+ cat + '/' + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirProfessor').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-idprofessor');
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir o professor<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/professor/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirImgInformativo').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var titulo = $(this).parents('tr').find('label[title="para"]').text();
        var msg = "Tem certeza que deseja excluir a imagem<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/informativo/excluir/14/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirParabenizacao').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var titulo = $(this).attr('data-para');
        var msg = "Tem certeza que deseja excluir a parabenizacao para <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/aniversario/excluir/23/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirMensagem').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('data-id');
        var titulo = $(this).attr('data-para');
        var msg = "Tem certeza que deseja excluir a mensagem para <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/mensagem/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirArqInformativo').live('click',function(e){
        e.preventDefault();
        var id = $(this).attr('id');
        var titulo = $(this).parents('tr').find('input[name="namearq"]').val();
        var msg = "Tem certeza que deseja excluir o arquivo?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/publicacao/excluirArquivo/14/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirInformativo').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idInformativo"]').val();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir o informativo<p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/publicacao/excluirInformativo/14/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirSetor').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idSetor"]').val();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir o setor <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/setor/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirIdeia').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idIdeia"]').val();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir a ideia <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/ideias/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirCategoriaPublicacao').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idSetor"]').val();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir a categoria <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/categoriaPublicacoes/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirCargo').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idCargo"]').val();
        var titulo = $(this).parents('tr').find('label[title="nome"]').text();
        var msg = "Tem certeza que deseja excluir o cargo <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/cargo/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirAtendente').live('click',function(e){
        e.preventDefault();
        var id = $(this).parents('tr').find('input[name="idAtendente"]').val();
        var titulo = $(this).parents('tr').find('label[title="nomeUsuario"]').text();
        var msg = "Tem certeza que deseja excluir o atendente <p><strong>" + titulo +"</strong>?</p>";
        var elemento = $(this);
        var form = elemento.parents('form');
        form.attr('action',$('#urlBase').val() + "adm/atendente/excluir/" + id);
                
        abrirLightbox(msg,elemento,form);
    });
    
    $('.excluirTodos').live('click',function(e){
        e.preventDefault();
        if($('.selectTable').find(':checked').size() > 0)
    	{
        	var msg = "Tem certeza que deseja excluir todos os itens selecionados?";
            var elemento = $(this);
            var form = $('.selectTable').parents('form');
            abrirLightbox(msg,elemento,form);
    	}
        else
    	{
        	$.msgbox("Nenhum item selecionado", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
        
    }); 
    
    $('.excluirTodosSelecionados').live('click',function(e){
        e.preventDefault();
        if($('.selectTable').find(':checked').size() > 0)
    	{
            var msg = "Tem certeza que deseja excluir todos os itens selecionados?";
            var elemento = $(this);
            var form = $('.selectTable').parents('form');
            abrirLightbox(msg,elemento,form);
    	}
        else
    	{
            $.msgbox("Nenhum item selecionado", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
        
    }); 
    
    $('.excluirTodasImg').live('click',function(e){
        e.preventDefault();
        if($(this).parent().next().find(':checked').size() > 0)
    	{
        	var msg = "Tem certeza que deseja excluir todas as imagens selecionadas?";
            var elemento = $(this);
            var form = elemento.parents('form');
            form.attr('action',$('#urlBase').val() + "adm/imagem/excluirTodas");
            abrirLightbox(msg,elemento,form);
    	}
        else
    	{
            $.msgbox("Nenhuma imagem selecionada", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
    });
    
    $('.excluirTodosArqs').live('click',function(e){
        e.preventDefault();
        if($(this).parent().next().find(':checked').size() > 0)
    	{
            var msg = "Tem certeza que deseja excluir todos os arquivos selecionados?";
            var elemento = $(this);
            var form = elemento.parents('form');
            form.attr('action',$('#urlBase').val() + "adm/arquivo/excluirTodos");
            abrirLightbox(msg,elemento,form);
    	}
        else
    	{
            $.msgbox("Nenhum arquivo selecionado", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
    });
    
    /*$('.excluirTodosSelecionados').live('click',function(e){
        e.preventDefault();
        if($(this).parent().next().find(':checked').size() > 0)
    	{
            $(this).parent().next().find(':checked').each(function(){
                var id_u = $(this).attr('id');
                ids.push(id_u);
            });
            var id = $("#id").val();
            var urlBase = $("#urlBase").val();
            var elemento = $(this);
            var msg = "Tem certeza que deseja excluir todos os arquivos selecionados?";
            $.msgbox(msg, {
                type: "confirm",
                buttons : [
                    {type: "submit", value: "Sim"},
                    {type: "cancel", value: "Não"}
                    ]
                }, function(result) {
                    if(result == "Sim")
                    {
                        $.ajax({
                	  type: "POST",
                          url: urlBase + "adm/publicacao/excluirTodos/14",
                          data: { ids: ids }
                        });
                        
                        
                    }
            });
        }
        else
    	{
            $.msgbox("Nenhum dado selecionado", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
    });*/
    
    $('.excluirImagem').live('click',function(e){
        e.preventDefault();
        var idImg = $(this).attr('id').split("-");
        var id = $("#id").val();
        var urlBase = $("#urlBase").val();
        var elemento = $(this);
        var msg = "Tem certeza que deseja excluir a imagem?";
        $.msgbox(msg, {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Sim"},
                {type: "cancel", value: "Não"}
                ]
            }, function(result) {
                if(result == "Sim")
                {
                    
                    //Atualizar índices das imagens
                	atualizarLinks();
                    //Excluir a imagem por AJAX
                    $.ajax({
                	  type: "GET",
                	  url: urlBase + "adm/imagem/excluir/" + idImg[1] + '/' + id,
                	  //data: { idImg: idImg[1], id: id }
                	}).done(function(msg) {
                		  if(msg == 0)
            			  {
                			  var tabela = elemento.parents('table');
                			  elemento.parents('tr').remove();
                			  if(tabela.find(':checkbox').size() <= 0)
            				  {
                				  tabela.parent().prev().remove();
                				  tabela.parent().remove();
            				  }	  
                			  atualizarLinks();
            			  }
                		  else
            			  {
                			  $.msgbox("Não foi possível excluir a imagem", {type: "error",buttons : [{type: "cancel", value: "OK"}]});
                			  atualizarLinks();
            			  }
                			  
                	});
                }
        });  
    });
    
    
    $('.excluirArquivo').live('click',function(e){
        e.preventDefault();
        var idArq = $(this).attr('id').split("-");
        var id = $("#id").val();
        var urlBase = $("#urlBase").val();
        var elemento = $(this);
        var msg = "Tem certeza que deseja excluir o arquivo?";
        $.msgbox(msg, {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Sim"},
                {type: "cancel", value: "Não"}
                ]
            }, function(result) {
                if(result == "Sim")
                {
                    //Atualizar índices dos arquivos
                	atualizarLinks();
                    //Excluir o arquivo por AJAX
                    $.ajax({
                	  type: "POST",
                	  url: urlBase + "adm/arquivo/excluir",
                	  data: { idArq: idArq[1], id: id }
                	}).done(function(msg) {
                		  if(msg == 0)
            			  {
                			  var tabela = elemento.parents('table');
                			  elemento.parents('tr').remove();
                			  if(tabela.find(':checkbox').size() <= 0)
            				  {
                				  tabela.parent().prev().remove();
                				  tabela.parent().remove();
            				  }	  
                			  atualizarLinks();
            			  }
                		  else
            			  {
                			  $.msgbox("Não foi possível excluir o arquivo", {type: "error",buttons : [{type: "cancel", value: "OK"}]});
                			  atualizarLinks();
            			  }
                			  
                	});
                }
        });  
    }); 
    
    function abrirLightbox(msg,elemento,form)
    {
        $.msgbox(msg, {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Sim"},
                {type: "cancel", value: "Não"}
                ]
            }, function(result) {
                if(result == "Sim")
                {
                    form.submit();
                }
        });  
    }
    
    function atualizarLinks()
    {
    	var lstLinks = $(".excluirImagem");
        if(lstLinks != "" && lstLinks.size() > 0)
    	{
        	lstLinks.each(function(indice){
        		$(this).attr('id','imagem-' + indice);
        	});
    	}
        
        var lstLinks = $(".excluirImagemAcao");
        if(lstLinks != "" && lstLinks.size() > 0)
    	{
        	lstLinks.each(function(indice){
        		$(this).attr('id','imagem-' + indice);
        	});
    	}
        
        var lstLinks = $(".excluirArquivo");
        if(lstLinks != "" && lstLinks.size() > 0)
    	{
        	lstLinks.each(function(indice){
        		$(this).attr('id','arquivo-' + indice);
        	});
    	}
    }
    
    $('.selecionarTodos').live('click', function(){
    	$(this).parent().next().find(':checkbox').attr('checked',true);   
    });
    
    $('.selecionarTodosUsuarios').live('click', function(){
    	$(this).parent().next().next().find(':checkbox').attr('checked',true);   
    });
    
    $('.desmarcarTodos').live('click', function(){
    	$(this).parent().next().find(':checkbox').attr('checked',false);   
    });
    
    $('.desmarcarTodosUsuarios').live('click', function(){
    	$(this).parent().next().next().find(':checkbox').attr('checked',false);   
    });
    
    $('.adicionarCampo').click(function(){
        var id = $(this).attr('id');
        id = id.split("-");
        id = id[1];
        var count = $("p.campo-" + id + '"').size();
        novoCampo = $("p.campo-" + id + ":first").clone();
		novoCampo.find("input").val("");	
		novoCampo.insertAfter("p.campo-" + id + ":last");
        $("p.campo-" + id + ":last .removerCampo").attr('id','remover-' + id + '-' + count);
        ordenarCampos(id);
    });
    
    $(".removerCampo").live('click', function(){
        var id = $(this).attr('id');
        id = id.split("-");
        id = id[1];
        if($("p.campo-" + id + '"').size() > 1)
        {
            $(this).parent().remove();
        } 
        
        ordenarCampos(id); 
    });
    
    function ordenarCampos(id)
    {
        var i = 1;
        
        $($("p.campo-" + id + '"').each(function()
        {
        		/*$(this).find("label").text(i + ".");
                $(this).children(".removerCampo").attr('id','remover-' + id + '-' + (i-1));
                i = i + 1;*/
        	
	        	$(this).find("span:first").text("Disciplina " + i);
	            $(this).children(".removerCampo").attr('id','remover-' + id + '-' + (i-1));
	            i = i + 1;
        }));
    }
    
    if($(".calendario").size() > 0)
    {
        $(".calendario").datepicker({
            dateFormat: 'dd/mm/yy',
            dayNames: [
            'Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado','Domingo'
            ],
            dayNamesMin: [
            'D','S','T','Q','Q','S','S','D'
            ],
            dayNamesShort: [
            'Dom','Seg','Ter','Qua','Qui','Sex','Sáb','Dom'
            ],
            monthNames: [
            'Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro',
            'Outubro','Novembro','Dezembro'
            ],
            monthNamesShort: [
            'Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set',
            'Out','Nov','Dez'
            ],
            nextText: 'Próximo',
            prevText: 'Anterior',
            changeMonth: true,
            changeYear: true
        });
    }
    
    /**
     * Exclui as fotos
     */
    $('.excluirImagemAcao').live('click',function(e){
        e.preventDefault();
        var idImg = $(this).attr('id').split("-");
        var id = $("#id").val();
        var urlBase = $("#urlBase").val();
        var elemento = $(this);
        var msg = "Tem certeza que deseja excluir a imagem?";
        $.msgbox(msg, {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Sim"},
                {type: "cancel", value: "Não"}
                ]
            }, function(result) {
                if(result == "Sim")
                {
                    
                    //Atualizar índices das imagens
                	atualizarLinks();
                    //Excluir a imagem por AJAX
                    $.ajax({
                	  type: "POST",
                	  url: urlBase + "adm/imagem_acao/excluir",
                	  data: { idImg: idImg[1], id: id }
                	}).done(function(msg) {
                		  if(msg == 0)
            			  {
                			  var tabela = elemento.parents('table');
                			  elemento.parents('tr').remove();
                			  if(tabela.find(':checkbox').size() <= 0)
            				  {
                				  tabela.parent().prev().remove();
                				  tabela.parent().remove();
            				  }	  
                			  atualizarLinks();
            			  }
                		  else
            			  {
                			  $.msgbox("Não foi possível excluir a imagem", {type: "error",buttons : [{type: "cancel", value: "OK"}]});
                			  atualizarLinks();
            			  }
                			  
                	});
                }
        });  
    });
    
    $('.excluirTodasImgAcao').live('click',function(e){
        e.preventDefault();
        if($(this).parent().next().find(':checked').size() > 0)
    	{
        	var msg = "Tem certeza que deseja excluir todas as imagens selecionadas?";
            var elemento = $(this);
            var form = elemento.parents('form');
            form.attr('action',$('#urlBase').val() + "adm/imagem_acao/excluirTodas");
            abrirLightbox(msg,elemento,form);
    	}
        else
    	{
        	$.msgbox("Nenhuma imagem selecionada", {type: "info",buttons : [{type: "cancel", value: "OK"}]});
    	}
        
    });
    
    $('.excluirImgModeracao').live('click',function(e){
        e.preventDefault();
        
        var idImg = $(this).attr('id').split("-");
        var id = $("#id").val();
        var urlBase = $("#urlBase").val();
        var elemento = $(this);
        var msg = "Tem certeza que deseja excluir a imagem?";
                
        $.msgbox(msg, {
            type: "confirm",
            buttons : [
                {type: "submit", value: "Sim"},
                {type: "cancel", value: "Não"}
                ]
            }, function(result) {
                if(result == "Sim")
                {
                    //Excluir a imagem por AJAX
                    $.ajax({
                	  type: "POST",
                	  url: urlBase + "adm/imagem_acao/excluirImgModeracao",
                	  data: { idImg: idImg[1], id: id }
                	}).done(function(msg) {
                		  if(msg == 0)
            			  {
                			  //var tabela = elemento.parents('table');
                			  elemento.parents('tr').remove();
                			  /*if(tabela.find(':checkbox').size() <= 0)
            				  {
                				  tabela.parent().prev().remove();
                				  tabela.parent().remove();
            				  }*/
            			  }
                		  else
            			  {
                			  $.msgbox("Não foi possível excluir a imagem", {type: "error",buttons : [{type: "cancel", value: "OK"}]});                			  
            			  }
                			  
                	});
                }
        });        
    });
        
    $('.aprovarImgModeracao').live('click',function(e){
        e.preventDefault();
        
        var idImg = $(this).attr('id').split("-");
        var id = $("#id").val();
        var urlBase = $("#urlBase").val();
        var elemento = $(this);
                
        //Excluir a imagem por AJAX
        $.ajax({
    	  type: "POST",
    	  url: urlBase + "adm/imagem_acao/aprovarImgModeracao",
    	  data: { idImg: idImg[1], id: id }
    	}).done(function(msg) {
    		  if(msg == 0)
			  {    			  
    			  var status = elemento.parent().prev();
    			  status.html('Publicada');    			  
    			  elemento.remove();
			  }
    		  else
			  {
    			  $.msgbox("Não foi possível publicar a imagem", {type: "error",buttons : [{type: "cancel", value: "OK"}]});                			  
			  }
    			  
    	});        
    });
    	
});