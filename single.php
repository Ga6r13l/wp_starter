<?php 
get_header();


$dir = "blocks";

	$blocks = array(
		'contact',
		'separator_1'
	);



foreach ($blocks as $key => $value){
	if(file_exists( __DIR__ . '/' . $dir . '/' . $value . '.php'))
		get_template_part( $dir . '/' . $value , 'none' );
}

get_footer(); 
?>
