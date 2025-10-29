<?php get_header(); ?>

<div class="container content-wrapper">
	<div class="row">
		<article class="col-sm-12">
			<div class="col-sm-12">
				<h1>Aktuelles</h1>
				<ul class="latest-news">

					<?php
					$custom_query_args = array(
						'post_type' => 'post',
						'posts_per_page' => '999',
						'post_status' => 'publish',
						'order' => 'DESC',
						'orderby' => 'date'
					);

					$custom_query = new WP_Query( $custom_query_args );

					if ( $custom_query->have_posts() ) :
						while( $custom_query->have_posts() ) : $custom_query->the_post(); ?>

						<li>
							<h4 class="title">
								<?php the_title(); ?>
							</h4>
							<?php the_date(); ?>
							<p>
								<?php
								$content = get_the_content();
								echo wp_trim_words( $content , '60' ); ?>
								
								<a class="more" href="<?php the_permalink(); ?>">mehr...</a>
							</li>


							<?php
						endwhile;
						?>

						<?php
						wp_reset_postdata(); // reset the query
					else:
						echo '<p>'.__('Sorry, no posts matched your criteria.').'</p>';
					endif;
					?>


				</ul>


			</div>
		</article>

	</div>
</div>

<?php get_footer();
