<article <?php post_class(); ?>>
	<div class="post-thumbnail-column">
		<?php if ( has_post_thumbnail() ) :
			echo '<a href="' . get_permalink() . '">';
			the_post_thumbnail( 'thumbnail' );
			echo '</a>';
		endif; ?>
	</div>
	<div class="post-excerpt-column">
		<header>
			<h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
			<?php get_template_part( 'templates/entry-meta' ); ?>
		</header>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>
