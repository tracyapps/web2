<?php
/**
 * all the custom stuffs
 */

add_filter( 'cmb_meta_boxes', 'web2_custom_meta_front_page' );

function web2_custom_meta_front_page( array $meta_boxes ) {

	$fields = array(
		array(
			'id'	=> 'home-box-group-1',
			'name'	=> 'Home Content Box number one',
			'type'	=> 'group',
			'cols'	=> 12,
			'fields'=> array(
				array(
					'id'	=> 'box1-title',
					'name'	=> 'Title',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box1-post',
					'name'	=> 'Choose page to link to',
					'type'	=> 'post_select',
					'use_ajax'=> true,
					'query'	=> array(
						'post_type'	=> 'page'
					),
					'cols'	=> 4
				),
				array(
					'id'	=> 'box1-icon',
					'name'	=> 'What icon should be used?',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box1-excerpt',
					'name'	=> 'Box excerpt',
					'type'	=> 'wysiwyg',
					'options'=> array(
						'editor_height' => '100'
					),
					'cols'	=> 12
				)
			)
		),
		array(
			'id'	=> 'home-box-group-2',
			'name'	=> 'Home Content Box number two',
			'type'	=> 'group',
			'cols'	=> 12,
			'fields'=> array(
				array(
					'id'	=> 'box2-title',
					'name'	=> 'Title',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box2-post',
					'name'	=> 'Choose page to link to',
					'type'	=> 'post_select',
					'use_ajax'=> true,
					'query'	=> array(
						'post_type'	=> 'page'
					),
					'cols'	=> 4
				),
				array(
					'id'	=> 'box2-icon',
					'name'	=> 'What icon should be used?',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box2-excerpt',
					'name'	=> 'Box excerpt',
					'type'	=> 'wysiwyg',
					'options'=> array(
						'editor_height' => '100'
					),
					'cols'	=> 12
				)
			)
		),
		array(
			'id'	=> 'home-box-group-3',
			'name'	=> 'Home Content Box number three',
			'type'	=> 'group',
			'cols'	=> 12,
			'fields'=> array(
				array(
					'id'	=> 'box3-title',
					'name'	=> 'Title',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box3-post',
					'name'	=> 'Choose page to link to',
					'type'	=> 'post_select',
					'use_ajax'=> true,
					'query'	=> array(
						'post_type'	=> array( 'page', 'post' )
					),
					'cols'	=> 4
				),
				array(
					'id'	=> 'box3-icon',
					'name'	=> 'What icon should be used?',
					'type'	=> 'text',
					'cols'	=> 4
				),
				array(
					'id'	=> 'box3-excerpt',
					'name'	=> 'Box excerpt',
					'type'	=> 'wysiwyg',
					'options'=> array(
						'editor_height' => '100'
					),
					'cols'	=> 12
				)
			)
		)
	);

	$meta_boxes[] = array(
		'title' 	=> 'Front page settings, and such',
		'pages' 	=> 'page',
		'show_on' 	=> array( 'id' => get_option( 'page_on_front' ) ),
		'context'	=> 'normal',
		'priority'	=> 'high',
		'fields' 	=> $fields
	);

	return $meta_boxes;

}