<?php 
get_header();

$dir = "blocks";

$blocks = array(
	'head_1',
	'timeline',
	'company',
	'separator_1',
	'video',
	'separator_2',
	'funstats',
	'newsletter',
	'buy',

);

foreach ($blocks as $key => $value){
	if(file_exists( __DIR__ . '/' . $dir . '/' . $value . '.php'))
		get_template_part( $dir . '/' . $value , 'none' );
}

get_footer(); 
?>
