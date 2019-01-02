<?php

/*------------------------------------*\
  External Modules/Files
  \*------------------------------------*/


// Load any external files you have here


/*------------------------------------*\
  Theme Functions
  \*------------------------------------*/

  require_once( get_template_directory() . '/functions/clean.php' );
  require_once( get_template_directory() . '/functions/admin.php' );
  require_once( get_template_directory() . '/functions/theme-support.php' );
  require_once( get_template_directory() . '/functions/menu.php' );
  require_once( get_template_directory() . '/functions/seo.php' );
  require_once( get_template_directory() . '/functions/filters.php' );
  require_once( get_template_directory() . '/functions/sidebar.php' );
  require_once( get_template_directory() . '/functions/shortcode.php' );
  require_once( get_template_directory() . '/functions/post-types.php' );
  require_once( get_template_directory() . '/functions/taxonomies.php' );
  require_once( get_template_directory() . '/functions/enqueue-scripts.php' );
  require_once( get_template_directory() . '/functions/boostrap4nav.php' );
  require_once( get_template_directory() . '/functions/acf.php' );


/*------------------------------------*\
  Custom functions
  \*------------------------------------*/

// Print theme navigation
  function theme_navigation() {
   wp_nav_menu( array(
            'theme_location' => 'header-menu', // Defined when registering the menu
            'menu_id'        => 'primary-menu',
            'container'      => false,
            'depth'          => 2,
            'menu_class'     => 'navbar-nav ml-auto',
            'walker'         => new Bootstrap_NavWalker(), // This controls the display of the Bootstrap Navbar
            'fallback_cb'    => 'Bootstrap_NavWalker::fallback', // For menu fallback
          ) );

   
  //  wp_nav_menu(
  //   array(
  //     'theme_location'  => 'header-menu',
  //     'menu'            => '',
  //     'container'       => 'ul',
  //     'container_class' => 'menu-{menu slug}-container',
  //     'container_id'    => '',
  //     'menu_class'      => 'navbar-nav ml-auto',
  //     'menu_id'         => '',
  //     'echo'            => true,
  //     'fallback_cb'     => 'wp_page_menu',
  //     'before'          => '',
  //     'after'           => '',
  //     'link_before'     => '',
  //     'link_after'      => '',
  //     'items_wrap'      => '<ul>%3$s</ul>',
  //     'depth'           => 0,
  //     'walker'          => ''
  //   )
  // );

 }

// Print theme pagination



 function theme_pagination($pages = '', $range = 2) 
 {  
   $showitems = ($range * 2) + 1;  
   global $paged;
   if(empty($paged)) $paged = 1;
   if($pages == '')
   {
     global $wp_query; 
     $pages = $wp_query->max_num_pages;

     if(!$pages)
       $pages = 1; 
   }   

   if(1 != $pages)
   {
     echo '<nav aria-label="Page navigation" role="navigation">';
     echo '<span class="sr-only">Page navigation</span>';
     echo '<ul class="pagination justify-content-center ft-wpbs">';

     echo '<li class="page-item disabled hidden-md-down d-none d-lg-block"><span class="page-link">Page '.$paged.' of '.$pages.'</span></li>';

     if($paged > 2 && $paged > $range+1 && $showitems < $pages) 
       echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link(1).'" aria-label="First Page">&laquo;<span class="hidden-sm-down d-none d-md-block"> First</span></a></li>';

     if($paged > 1 && $showitems < $pages) 
       echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged - 1).'" aria-label="Previous Page">&lsaquo;<span class="hidden-sm-down d-none d-md-block"> Previous</span></a></li>';

     for ($i=1; $i <= $pages; $i++)
     {
       if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
         echo ($paged == $i)? '<li class="page-item active"><span class="page-link"><span class="sr-only">Current Page </span>'.$i.'</span></li>' : '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($i).'"><span class="sr-only">Page </span>'.$i.'</a></li>';
     }

     if ($paged < $pages && $showitems < $pages) 
       echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($paged + 1).'" aria-label="Next Page"><span class="hidden-sm-down d-none d-md-block">Next </span>&rsaquo;</a></li>';  

     if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) 
       echo '<li class="page-item"><a class="page-link" href="'.get_pagenum_link($pages).'" aria-label="Last Page"><span class="hidden-sm-down d-none d-md-block">Last </span>&raquo;</a></li>';

     echo '</ul>';
     echo '</nav>';
        //echo '<div class="pagination-info mb-5 text-center">[ <span class="text-muted">Page</span> '.$paged.' <span class="text-muted">of</span> '.$pages.' ]</div>'; 
   }



	// the_posts_pagination( array(
	// 	'mid_size' => 2,
	// ) );

 }




 function newsletter_save($contact_form) {


  if(isset($_POST['smkpop']) && $_POST['smkpop'] == 1){

    $list_ids = array( 3 );
    $subscriber_data = array(
      'email' => sanitize_text_field($_POST['email'])
    );

    $lists = array_map('intval', $list_ids);

    try {
      $subscriber = \MailPoet\API\API::MP('v1')->addSubscriber($subscriber_data, $lists, $options);
    } catch(Exception $exception) {
  // return $exception->getMessage();
    }
    
    unset($_POST);
  }
 //}



}

add_action( 'wp_footer', 'newsletter_save');




function hm_get_template_part( $file, $template_args = array(), $cache_args = array() ) {
    $template_args = wp_parse_args( $template_args );
    $cache_args = wp_parse_args( $cache_args );
    if ( $cache_args ) {
        foreach ( $template_args as $key => $value ) {
            if ( is_scalar( $value ) || is_array( $value ) ) {
                $cache_args[$key] = $value;
            } else if ( is_object( $value ) && method_exists( $value, 'get_id' ) ) {
                $cache_args[$key] = call_user_method( 'get_id', $value );
            }
        }
        if ( ( $cache = wp_cache_get( $file, serialize( $cache_args ) ) ) !== false ) {
            if ( ! empty( $template_args['return'] ) )
                return $cache;
            echo $cache;
            return;
        }
    }
    $file_handle = $file;
    do_action( 'start_operation', 'hm_template_part::' . $file_handle );
    if ( file_exists( get_stylesheet_directory() . '/' . $file . '.php' ) )
        $file = get_stylesheet_directory() . '/' . $file . '.php';
    elseif ( file_exists( get_template_directory() . '/' . $file . '.php' ) )
        $file = get_template_directory() . '/' . $file . '.php';
    ob_start();
    $return = require( $file );
    $data = ob_get_clean();
    do_action( 'end_operation', 'hm_template_part::' . $file_handle );
    if ( $cache_args ) {
        wp_cache_set( $file, $data, serialize( $cache_args ), 3600 );
    }
    if ( ! empty( $template_args['return'] ) )
        if ( $return === false )
            return false;
        else
            return $data;
    echo $data;
}



