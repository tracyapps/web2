<?php use Roots\Sage\Titles; ?>

<?php

if ( has_post_thumbnail() )

?>
<div class="page-header<?php
		if ( has_post_thumbnail() ) :
			$the_image_url = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) );
			echo ' has-image" style="background-image: url(' . esc_url( $the_image_url, 'web2' ) . ');"';
		else :
			echo '"';
		endif;
	?>
>
	<h1><?= Titles\title(); ?></h1>
</div>
