<div class="col_3">
<div class="panel">
	<h4>Menu</h4>
	<ul class="menu vertical">
	<?php $lstMenus = get_menu();?>
	<?php if(is_array($lstMenus)):?>
	  	<?php foreach ($lstMenus as $objMenu):?>
			<?php echo menu($objMenu);?>
	  	<?php endforeach;?>
	<?php endif;?>
</ul><!-- fims Menu vertival -->
</div>
</div>
