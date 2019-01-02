<?php get_header(); ?>

<section>
	<div class="container">
		<div class="row">		


			<main class="col">

				<!-- section -->
				<section>

					<h2 class="section-title">
						<?php the_archive_title(); ?>
					</h2>

					<?php get_template_part('loop'); ?>

					<?php get_template_part('pagination'); ?>

				</section>
				<!-- /section -->
			</main>

			<?php get_sidebar(); ?>
		</div>
	</div>
</section>
<?php get_footer(); ?>
