<?php
/**
*  MODULE 1 TEMPLATE
*  Main banner, CTA on either right or left side, one or two buttons
**/

// Grab our field from the backend.
$content_alignment = get_field('content_alignment');
$background_image = get_field('background_image');
$pre_heading = get_field('pre_heading');
$main_heading = get_field('main_heading');
$sub_heading = get_field('sub_heading');
$description = get_field('description');
$button_1_text = get_field('button_1_text');
$button_1_link = get_field('button_1_link');
$button_2_text = get_field('button_2_text');
$button_2_link = get_field('button_2_link');
$module_height = get_field('module_height');
$additional_css_classes = get_field('additional_css_classes');
?>

<!-- Begin Module 1 Section -->
<div class="jumbotron jumbotron-image jumbotron-inverse hero no-padding home-hero <?php echo $additional_css_classes;?>" style="background: url(<?php echo $background_image;?>) 50% 50%; background-size: cover; background-repeat: no-repeat;">
    <div class="container">

    <div class="argento-grid">

      <?php if($content_alignment === 'left'){ ;?>

        <div class="col-lg-6">
          <h2><?php echo $main_heading ;?></h2>
          <p><?php echo $description;?></p>
          <div class="actions-toolbar">
            <div class="primary"><a href="<?php echo site_url() . $button_1_link;?>" class="action primary"><span><?php echo $button_1_text;?></span></a></div>
            <div class="primary"><a href="<?php echo site_url() . $button_2_link;?>" class="action primary"><span><?php echo $button_2_text;?></span></a></div>
          </div>
        </div>

        <div class="col-lg-6 hidden-sm ">

        </div>

  <?php } else { ;?>

        <div class="col-lg-6 hidden-sm">

        </div>

        <div class="col-lg-6">
          <h2><?php echo $main_heading ;?></h2>
          <p><?php echo $description;?></p>
          <div class="actions-toolbar">
            <div class="primary"><a href="<?php echo site_url() . $button_1_link;?>" class="action primary"><span><?php echo $button_1_text;?></span></a></div>
            <div class="primary"><a href="<?php echo site_url() . $button_2_link;?>" class="action primary"><span><?php echo $button_2_text;?></span></a></div>
          </div>
        </div>

  <?php } ;?>

    </div>

  </div>
</div>
<!-- End Module 1 Section -->
