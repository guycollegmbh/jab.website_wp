<?php get_header(); ?>
<main>
	<?php if( has_post_thumbnail( $post->post_parent ) ) : ?>
	<section class="pageimage">
		<div class="container-fluid g-0">
			<div class="row g-0">
				<div class="col"><?php if( has_post_thumbnail( $post->post_parent ) ) { echo get_the_post_thumbnail( $post->post_parent ); } ?></div>
			</div>
		</div>
	</section>
	<?php endif; ?>
	<div class="content">
		<?php
			while ( have_posts() ) : the_post();
				the_content();
			endwhile; // End of the loop.
		?>
	</div>
</main>
<?php get_footer();
