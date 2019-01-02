<?php 
get_header();


$dir = "blocks";


switch (get_the_ID()) {

	//STRONA GŁÓWNA
	case 20:
	$blocks = array(
		'widget_1',
		'head_1',
		'head_2',
		//'timeline',
		'separator_1',
		'company',
		'video',
		'funstats',
		'zalety',
		'separator_2',

		'prezentacja',
		'table',
		'newsletter',
		'buy',
		'tech'
	);
	break;

	//KONTATKT
	case 26:
	$blocks = array(
		'contact',
		'separator_1'
	);
	break;

	//DOMYŚLNE
	default:
	$blocks = array(
		'head_1',
		'content',
		'newsletter'
		//'faq'
	);

}

foreach ($blocks as $key => $value){
	if(file_exists( __DIR__ . '/' . $dir . '/' . $value . '.php'))
		get_template_part( $dir . '/' . $value , 'none' );
}

get_footer(); 
?>
