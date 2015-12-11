<?php the_content(); ?>
<?php wp_link_pages( [ 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ), 'after' => '</p></nav>' ] ); ?>

<?php if ( is_front_page() ) :



	echo '<h2>this is the <strong>front page</strong></h2>';
	endif;
?>