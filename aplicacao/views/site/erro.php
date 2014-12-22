<div class="main-container">
<!-- banner iterno, widget clima, e titulo da seÃ§Ã£o-->
    <?php 
    $innerTitle = "Página não encontrada";
    /* nublado;nublado-parcial-noite;nublado-parcial-dia;chuva;sol*/
    include(INC_INNER_HEADER);
    ?>
    <!---->

    <div class="row">
        <div class="wrapper spacer">
            <div class="erro404 inner">    	
            <hr class="alt1" />      	
            <p>Por algum motivo a página que você tentou acessar não pode ser apresentada e pode acontecer pelos seguintes motivos:</p>      	
            <ul class="checks">
                    <li>O conteúdo não está mais no ar;</li>
                    <li>A página não existe;</li>
                    <li>Você digitou o endereço errado.</li>
            </ul>       
            <div class="grid col-220" style="margin-top: 20px;">
                <a class="btn brick" href="<?php echo base_url(); ?>" title="Ir para o início">
                    Página inicial
                </a>
            </div>
            </div>
        </div>
    </div>
    
    <!---->
   <div class="row home-line-1">
   		<div class="square dark-orange left"></div>
   		<div class="wrapper">
            	<div class="grid col-220">
                	<div class="bg">
                		<h2>Help-desk</h2>
                	</div>
                </div>
                <div class="grid col-460">
                	<p class="extra">Precisando de ajuda? Contate agora nossa central de suporte!</p>
                </div>
                <div class="grid col-220 fit">
                	<div class="extra"><a href="<?php echo base_url(); ?>ajuda-e-melhorias/help-desk" class="btn yellow">Abra um chamado</a></div>
                </div>
        </div>
   </div>
   <div class="row home-line-2">
   		<div class="square dark-brick left"></div>
   		<div class="wrapper">
            	<div class="grid col-220">
                	<div class="bg">
                		<h2>Central de ideias</h2>
                	</div>
                </div>
                <div class="grid col-460">
                	<p class="extra">Sabe como tornar nosso trabalho ainda melhor? Conte-nos!</p>
                </div>
                <div class="grid col-220 fit">
                    <div class="extra"><a href="<?php echo base_url(); ?>ajuda-e-melhorias/central-de-ideias" class="btn brick">Envie sua ideia</a></div>
                </div>
        </div>
   </div>
</div><!-- #main-container -->