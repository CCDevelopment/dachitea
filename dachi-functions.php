<?php
/**
* Plugin Name: Dachi Tea Co.
* Plugin URI: https://progressiodev.co
* Version: 1.0.0
* Author: Chris Collins
* Author uri: https://progressiodev.co
* Description: Custom functionality for Dachi Tea Co., Inc.
*/


/* Bring in the custom syles */
function dachi_style_scripts() {
    wp_enqueue_style( 'dachi-styles-1', plugin_dir_url(__FILE__) . 'css/styles-1.css' );
}
add_action( 'wp_enqueue_scripts', 'dachi_style_scripts' );


// This is our tea reccomendation logic engine.
add_action( 'wp_ajax_nopriv_tea_reccomendation_engine', 'tea_reccomendation_engine' );
add_action( 'wp_ajax_tea_reccomendation_engine', 'tea_reccomendation_engine' );
function tea_reccomendation_engine() {

  // Grab the fresh inputs from the frontend
  $oxydation = $_POST['oxydation'];
  $taste = $_POST['taste'];
  $caffeine = $_POST['caffeine'];
  $roast = $_POST['roast'];

  $choiceArray = [
    'Oxydation' => $oxydation,
    'taste'     => $taste,
    'caffeine'  => $caffeine,
    'roast'     => $roast
  ];
  // Run a query to get all of our products
  $query = new WC_Product_Query( array(
    'limit' => 1,
    'orderby' => 'date',
    'order' => 'DESC',
  ) );
  $products = $query->get_products();


  // HERE IS WHERE WE'LL INCLUDE THE PICKER LOGIC //


  // Return the results
  echo wp_json_encode($choiceArray);
  wp_die();
}


/* Here we are going to begin registering our new custom Dachi Tea Co. blocks */
add_action('acf/init', 'my_acf_init');
function my_acf_init() {

	// check function exists
	if( function_exists('acf_register_block') ) {

    // Define each of our modules and attributes.
    $module1 = array(
			'name'				=> 'Module1',
			'title'				=> __('Module 1'),
			'description'		=> __('A custom  block for main banner module 1'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'main banner', 'module 1' ),
		);
    $module2 = array(
			'name'				=> 'Module2',
			'title'				=> __('Module 2'),
			'description'		=> __('A custom  block for a row of 4 highlighted products'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'four products row', 'module 2', 'display products', 'highlighted products', 'featured products', 'featured' ),
		);
    $module3 = array(
			'name'				=> 'Module3',
			'title'				=> __('Module 3'),
			'description'		=> __('A custom  block for featured gift sets'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'gift sets', 'module 3', 'display products', 'highlighted products', 'featured products', 'featured' ),
		);
    $module4 = array(
			'name'				=> 'Module4',
			'title'				=> __('Module 4'),
			'description'		=> __('Tea Reccomendation Module'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'reccomendation', 'tea picker' ),
		);
    $module5 = array(
			'name'				=> 'Module5',
			'title'				=> __('Module 5'),
			'description'		=> __('Large USP Box x 2 section'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'usp', 'usp boxes' ),
		);
    $module6 = array(
			'name'				=> 'Module6',
			'title'				=> __('Module 6'),
			'description'		=> __('Product catalog'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'catalog', 'products' ),
		);
    $module7 = array(
			'name'				=> 'Module7',
			'title'				=> __('Module 7'),
			'description'		=> __('Special Offers Section'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'special offers', 'products', 'offers', 'featured' ),
		);
    $module8 = array(
			'name'				=> 'Module8',
			'title'				=> __('Module 8'),
			'description'		=> __('Small row USP icons x 3'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'usp','usp icons boxes' ),
		);
    $module9 = array(
			'name'				=> 'Module9',
			'title'				=> __('Module 9'),
			'description'		=> __('Informational Tabs'),
			'render_callback'	=> 'dachi_acf_block_render_callback', /* We'll call this later to dynamically display call the front-end for each block */
			'category'			=> 'formatting',
			'icon'				=> 'admin-comments',
			'keywords'			=> array( 'tabs','information tabs boxes' ),
		);

    // Collect all of our module definiations into an array.
    $allmodules = [$module1, $module2, $module3, $module4, $module5, $module6, $module7, $module8, $module9];

    // Loop through all modules to register each one-by-one.
    for ($i=0; $i < sizeof($allmodules); $i++) {
      // register a testimonial block
  		acf_register_block($allmodules[$i]);
    }

	}
}

/* This function will dynamically call the content files for each block to render its' content on the front-end */
function dachi_acf_block_render_callback( $block ) {

	// convert name ("acf/testimonial") into path friendly slug ("testimonial")
	$slug = str_replace('acf/', '', $block['name']);

	// include a template part from within the "template-parts/block" folder
	if( file_exists( plugin_dir_path(__FILE__) . "/template-parts/block/content-{$slug}.php" ) ) {
		include( plugin_dir_path(__FILE__) . "/template-parts/block/content-{$slug}.php" );
	}
}
