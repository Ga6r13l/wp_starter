<?php 
get_header();


$dir = "blocks";


switch (get_the_ID()) {

	//STRONA GŁÓWNA
	case 20:
	$blocks = array(
		'widget_1',
		'head_2',
		//'timeline',
		'separator_1',
		'company',
		'video',
		'separator_2',
		'funstats',
		'prezentacja',
		'newsletter',
		'buy',
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
		'content',
		//'faq'
	);

}

foreach ($blocks as $key => $value){
	if(file_exists( __DIR__ . '/' . $dir . '/' . $value . '.php'))
		get_template_part( $dir . '/' . $value , 'none' );
}

get_footer(); 
?>
