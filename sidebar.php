<?php if( !is_active_sidebar( 'main-sidebar' ) ) {
	return;
} ?>

<!-- sidebar -->
<aside class="col-12 col-sm-3 sidebar">
	<?php dynamic_sidebar( 'main-sidebar' ); ?>
</aside>
<!-- /sidebar -->
