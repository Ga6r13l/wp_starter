<?php 
get_header();


$dir = "blocks";


switch (get_the_ID()) {

	//STRONA GŁÓWNA
	case 20:
	$blocks = array(
		'content'
	);
	break

	//DOMYŚLNE
	default:
	$blocks = array(
		'content'
	);

}

foreach ($blocks as $key => $value){
	if(file_exists( __DIR__ . '/' . $dir . '/' . $value . '.php'))
		get_template_part( $dir . '/' . $value , 'none' );
}

get_footer(); 
?>
