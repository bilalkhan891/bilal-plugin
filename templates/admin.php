<div class="wrap">
	<h1 class="ba-title">Bilal Plugin</h1>
 	<?php settings_errors(); ?>

 	<form action="options.php" method="post">
 		<?php 

 			settings_fields('bilal_options_group');
 			do_settings_sections( 'bilal_plugin' );
 			submit_button();

 		 ?>
 	</form>

</div>