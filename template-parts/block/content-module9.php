<?php
/**
*  MODULE 9 TEMPLATE
*  Tabs of introductory content with image on the left hand side and intro text on the right hand side.
*/

// Grab our field from the backend.
$main_title = get_field('main_title');

$tab_1_title = get_field('tab_1_title');
$tab_1_image = get_field('tab_1_image');
$tab_1_content = get_field('tab_1_content');

$tab_2_title = get_field('tab_2_title');
$tab_2_image = get_field('tab_2_image');
$tab_2_content = get_field('tab_2_content');

$tab_3_title = get_field('tab_3_title');
$tab_3_image = get_field('tab_3_image');
$tab_3_content = get_field('tab_3_content');

?>

<!-- Begin Module 9 Section -->
<div class="jumbotron white-back">
  <div class="container">
    <div class="argento-grid">
      <div class="col-lg-5 hidden-sm">
          &nbsp;
      </div>

      <div class="col-lg-6">
          <h3 class="a-center">Quality Tea</h3>
      </div>
    </div>

    <div class="argento-grid tab-container">
      <div class="col-lg-5 hidden-sm">
          &nbsp;
      </div>

      <div class="col-lg-6">

        <ul class="nav nav-tabs">
          <li class="active"><a data-toggle="tab" href="#artisans"><span>Creafted<br>By Artisans</span></a></li>
          <li><a data-toggle="tab" href="#handpicked"><span>Single Origin,<br>Hand Picked</span></a></li>
          <li><a data-toggle="tab" href="#safe"><span>Safe &amp;<br>Responsible</span></a></li>
        </ul>

        <div class="tab-content">
          <div id="artisans" class="tab-pane fade in active">
        <div class="m-title">Crafted by Artisans</div>
        <div class="tab-image">
          <div class="image" style="background-image: url(http://staging01.dachitea.co/pub/media/discover/crafted-artisans.JPG)"></div>
        </div>
            <p>What elevates a tea from the commonplace to the sublime is the intricate understanding of the surrounding environment by the tea maker, and this cannot mass-produced. This nuanced relationship with nature is what imbues our tea with that human element of wonder.</p>
            <p>Our makers, some of the world’s most esteemed, reveal a rich palate of flavor profiles including smoky, sweet, fruity and floral notes. All by taking mother nature’s produce and using their judgement on the climate to vary the levels of air, water, sun and fire.</p>
          </div>
         <div id="handpicked" class="tab-pane fade">
        <div class="m-title">Single Origin, Hand Picked</div>
        <div class="tab-image">
          <div class="image" style="background-image: url(http://staging01.dachitea.co/pub/media/discover/hand-picked.JPG)"></div>
        </div>
            <p>When it comes to producing tea with great complexity, tea with aftertastes and overtones, the consistency of the leaves and the nuances of the origin really do matter. Our collections explore the famous tea-making regions of Taiwan and each region's signature taste.</p>
            <p>Additionally, sourcing directly from family-owned farms is how we ensure that our handpicked, traditionally-crafted teas are authentic, fresh, and handled with care.</p>
          </div>
         <div id="safe" class="tab-pane fade">
        <div class="m-title">Safe &amp; Responsible</div>
        <div class="tab-image">
          <div class="image" style="background-image: url(http://staging01.dachitea.co/pub/media/discover/safe-responsible.jpg)"></div>
        </div>
            <p>All of our teas are SGS tested to ensure that there are no traces of pesticides and our packing factory is ISO certified to ensure a safe and cleanly environment for handling the tea.</p>
            <p>To validate the provenance of our teas, we visit the origin to taste the maker’s teas from his current and previous flushes, and to bond with the maker. Trust, respect and loyalty are extremely personal things, and they’re important when it comes to sourcing tea.</p>
          </div>
        </div>

      </div>

    </div>
  </div>
</div>


<!-- End Module 9 Section -->
