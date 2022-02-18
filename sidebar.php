	<div class="col-md-4">
		<?php $sidebar = (is_single() || is_home() ) ? 'blog' : 'page';?>
			<?php if (is_active_sidebar($sidebar)): ?>
			<?php dynamic_sidebar($sidebar);?>
		<?php endif;?>
	</div>