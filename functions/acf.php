<?php 


if( function_exists('acf_add_local_field_group') ){

	acf_add_local_field_group(array(
		'key' => 'group_1',
		'title' => 'My Group',
		'fields' => array (
			array (
				'key' => 'field_1',
				'label' => 'Sub Title',
				'name' => 'sub_title',
				'type' => 'text',
			)
		),
		'location' => array (
			array (
				array (
					'param' => 'page_options',
					'operator' => '==',
					'value' => 'theme-general-settings',
				),
			),
		),
	));

}




if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Główne ustawienia strony',
		'menu_title'	=> 'Ustawienia strony',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));

	acf_add_options_sub_page(array(
		'page_title' 	=> 'Ustawienia Strony głównej',
		'menu_title'	=> 'Strona główna',
		'parent_slug'	=> 'theme-general-settings',
	));

	
}
