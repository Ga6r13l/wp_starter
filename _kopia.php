<?php get_header(); ?>


<!-- main -->
<section>
	<div class="container">
		<div class="row">		


			<main class="col">

				<h2 class="section-title">
					<?php _e( 'Last Posts ', 'wordpress-theme-starter' ); ?>
				</h2>

				<?php get_template_part('loop'); ?>

				<?php get_template_part('pagination'); ?>

			</main>

			<!-- /main -->

			<?php get_sidebar(); ?>

		</div>
	</div>
</section>


<?php get_footer(); ?>
