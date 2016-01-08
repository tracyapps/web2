<?php while ( have_posts() ) : the_post(); ?>
	<article <?php post_class(); ?>>
		<header class="post-header<?php
		if ( has_post_thumbnail() && ! is_home() ) :
			$the_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			echo ' has-image" style="background-image: url(' . esc_url( $the_image_url, 'web2' ) . ');"';
		else :
			echo '"';
		endif;
		?>
		>
			<h1 class="entry-title"><?php the_title(); ?></h1>
			<?php get_template_part( 'templates/entry-meta' ); ?>
		</header>
		<div class="entry-content">
			<?php the_content(); ?>
		</div>
		<footer>
			<?php wp_link_pages( [ 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ), 'after' => '</p></nav>' ] ); ?>
		</footer>
		<?php comments_template( '/templates/comments.php' ); ?>
	</article>
<?php endwhile; ?>
