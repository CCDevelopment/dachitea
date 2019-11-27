<?php
/**
*  MODULE 7 TEMPLATE
*  Special offers row to highlight featured products, additional deals, or any other specials we have running.
*/

// Grab our field from the backend.
// check if the repeater field has rows of data
if( have_rows('offer') ):

 	// loop through the rows of data
    while ( have_rows('offer') ) : the_row();

        // Grab the sub field values
        $offer_title = the_sub_field('offer_title');
        $intro_text = the_sub_field('intro_text');
        $custom_image = the_sub_field('custom_image');
        $product_id = the_sub_field('product_id');
        $offer_price = the_sub_field('offer_price');

    endwhile;

else :

    // no rows found

endif;
?>

<!-- Begin Module 7 Section -->



<!-- End Module 7 Section -->
