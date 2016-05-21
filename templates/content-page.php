<div class="row">
	<?php the_content(); ?>
</div>
<?php wp_link_pages( [ 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ), 'after' => '</p></nav>' ] ); ?>

<?php if ( is_front_page() ) :

	// begin front page content boxes.
	// storing each array
	$box_group_1_array = get_post_meta( get_the_ID(), 'home-box-group-1', true );
	$box_group_2_array = get_post_meta( get_the_ID(), 'home-box-group-2', true );
	$box_group_3_array = get_post_meta( get_the_ID(), 'home-box-group-3', true );

	$icon_dir = get_template_directory_uri() . '/assets/icons/';

	/*
	
	<div class="row clearfix">
		<div class="one-half">
			<h3>Latest <a href="/category/assignments/">Assignment</a></h3>

			<?php
			$args = array(
				'post_type' 	=> 'post',
				'category_name'	=> 'assignments',
				'posts_per_page'=> 1,
			);
			$assignments_query = new WP_Query( $args );
			if ( $assignments_query->have_posts() ) :
				while ( $assignments_query->have_posts() ) : $assignments_query->the_post();
					get_template_part( 'templates/content' );
				endwhile;
			endif;
			wp_reset_postdata();
			?>
		</div>
		<div class="one-half">
			<h3>Calendar</h3>
			<?php echo do_shortcode( '[ai1ec view="stream" events_limit="4"]' ); ?>
		</div>
	</div>

	*/
	?>

	<?php
	$sticky = get_option( 'sticky_posts' );
	$args2 = array(
		'post_type' 	=> 'post',
		'category_name'	=> 'announcements',
		'posts_per_page'=> 1,
		'post__in'		=> $sticky,
		'ignore_sticky_posts' => 1
	);
	$announcements_query = new WP_Query( $args2 );
	if ( $sticky[0] ) : ?>
		<div class="row announcements-box important clearfix">
			<h3 class="announcements-title">Announcement</h3>
			<?php

			while ( $announcements_query->have_posts() ) : $announcements_query->the_post();
				get_template_part( 'templates/content' );
			endwhile;
			?>
		</div>
	<?php endif;
	wp_reset_postdata();
	?>

	<div class="row three-boxes clearfix">
		<hr />

		<section class="one-third box-one">
			<div class="wrapper block-center">
				<?php
				printf(
					'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
					esc_url( get_page_link( $box_group_1_array[ 'box1-post' ] ), 'web2' ),
					esc_url( $icon_dir . 'svg/smart/' . $box_group_1_array[ 'box1-icon' ], 'web2' )
				);
				?>
			</div>
			<div class="wrapper">
				<h3>
					<a href="<?php echo esc_url( get_page_link( $box_group_1_array[ 'box1-post' ] ), 'web2' ) ?>">
						<?php esc_html_e( $box_group_1_array[ 'box1-title' ], 'web2' ); ?>
					</a>
				</h3>
				<p>
					<?php
					echo wp_kses_post( $box_group_1_array[ 'box1-excerpt' ], 'web2' );
					?>
				</p>
			</div>
		</section>

		<section class="one-third box-two">
			<div class="wrapper block-center">
				<?php
				printf(
					'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
					esc_url( get_page_link( $box_group_2_array[ 'box2-post' ] ), 'web2' ),
					esc_url( $icon_dir . 'svg/smart/' . $box_group_2_array[ 'box2-icon' ], 'web2' )
				);
				?>
			</div>
			<div class="wrapper">
				<h3>
					<a href="<?php echo esc_url( get_page_link( $box_group_2_array[ 'box2-post' ] ), 'web2' ) ?>">
						<?php esc_html_e( $box_group_2_array[ 'box2-title' ], 'web2' ); ?>
					</a>
				</h3>
				<p>
					<?php
					echo wp_kses_post( $box_group_2_array[ 'box2-excerpt' ], 'web2' );
					?>
				</p>
			</div>
		</section>

		<section class="one-third box-three">
			<div class="wrapper block-center">
				<?php
				printf(
					'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
					esc_url( get_page_link( $box_group_3_array[ 'box3-post' ] ), 'web2' ),
					esc_url( $icon_dir . 'svg/smart/' . $box_group_3_array[ 'box3-icon' ], 'web2' )
				);
				?>
			</div>
			<div class="wrapper">
				<h3>
					<a href="<?php echo esc_url( get_page_link( $box_group_3_array[ 'box3-post' ] ), 'web2' ) ?>">
						<?php esc_html_e( $box_group_3_array[ 'box3-title' ], 'web2' ); ?>
					</a>
				</h3>
				<p>
					<?php
					echo wp_kses_post( $box_group_3_array[ 'box3-excerpt' ], 'web2' );
					?>
				</p>
			</div>
		</section>
	</div>
	<hr />

	<?php
	endif;
?>