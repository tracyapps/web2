<?php the_content(); ?>
<?php wp_link_pages( [ 'before' => '<nav class="page-nav"><p>' . __( 'Pages:', 'sage' ), 'after' => '</p></nav>' ] ); ?>

<?php if ( is_front_page() ) :

	// begin front page content boxes.
	// storing each array
	$box_group_1_array = get_post_meta( get_the_ID(), 'home-box-group-1', true );
	$box_group_2_array = get_post_meta( get_the_ID(), 'home-box-group-2', true );
	$box_group_3_array = get_post_meta( get_the_ID(), 'home-box-group-3', true );

	$icon_dir = get_template_directory_uri() . '/assets/icons/';

	//print_r($box_group_1_array);
	?>

	<section class="one-third box-one">
		<div class="row block-center">
			<?php
				printf(
					'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
					esc_url( get_page_link( $box_group_1_array[ 'box1-post' ] ), 'web2' ),
					esc_url( $icon_dir . 'svg/smart/' . $box_group_1_array[ 'box1-icon' ], 'web2' )
					);
			?>
		</div>
		<div class="row">
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
		<div class="row block-center">
			<?php
			printf(
				'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
				esc_url( get_page_link( $box_group_2_array[ 'box2-post' ] ), 'web2' ),
				esc_url( $icon_dir . 'svg/smart/' . $box_group_2_array[ 'box2-icon' ], 'web2' )
			);
			?>
		</div>
		<div class="row">
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
		<div class="row block-center">
			<?php
			printf(
				'<a href="%s" class="centered-icon"><img class="iconic" data-src="%s.svg"></a>',
				esc_url( get_page_link( $box_group_3_array[ 'box3-post' ] ), 'web2' ),
				esc_url( $icon_dir . 'svg/smart/' . $box_group_3_array[ 'box3-icon' ], 'web2' )
			);
			?>
		</div>
		<div class="row">
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
	<?php
	endif;
?>