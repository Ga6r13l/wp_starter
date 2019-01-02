<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">		


			<main class="col">


				<h2 class="section-title">
					<?php echo sprintf( __( '%s Search Results for ', 'wordpress-theme-starter' ), $wp_query->found_posts ); echo get_search_query(); ?>
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
