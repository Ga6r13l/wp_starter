<section class="py-4 py-md-5">
	<div class="container">
		<div class="row">		


			<main class="col">

				<?php if (have_posts()): while (have_posts()) : the_post(); ?>

					<!-- article -->
					<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

						<!-- page title -->
						<h1 class="page-title"><?php the_title(); ?></h1>

						<?php the_content(); ?>

						<br class="clear">

						<?php edit_post_link(); ?>

					</article>
					<!-- /article -->

				<?php endwhile; ?>

				<?php else: ?>

					<?php get_template_part( 'templates/content', 'none' ); ?>

				<?php endif; ?>

			</main>

		</div>
	</div>
</section>