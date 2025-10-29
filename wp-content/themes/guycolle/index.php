<?php get_header(); ?>

<main data-spy="scroll" data-target="#navbar" data-offset="0">
				<?php
				while ( have_posts() ) : the_post();
					the_content();
				endwhile; // End of the loop.
				?>
</main>

<?php get_footer();
