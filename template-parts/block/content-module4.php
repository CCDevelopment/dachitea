<?php
/**
*  MODULE 4 TEMPLATE
*  Module for the tea reccomendation tool. Users can choose their prefferences for taste, caffeine, roast, etc.. and the module will provide a reccomendation
**/

// Grab our field from the backend.
$version = get_field('version');
$title = get_field('title');
$intro_text = get_field('intro_text');

?>

<!-- Begin Module 4 Section -->
<div class="jumbotron">
  <div class="container">
      <div class="row">

    <div class="block-title a-center">
      <h3 style="font-size: 2.8rem;margin-bottom: 10px;">Explore Our Collection</h3>
      <p class="subtitle no-margin" style="font-size: 1.6rem;">Don't know what you are looking for? <br> Adjust the dials and we'll recommend the perfect tea for you.</p>
    </div>

    <div class="block-content">
          <div class="magento-grid">
            <div class="col-lg-6">
              <div class="block filter">
                <div class="block-content filter-content">

                      <div class="filter-slider-option" data-layer="oxydation">
                        <div class="options-title">oxydation
                          <span class="tooltip" title="Some description that can be configured blah alb dasf,m bdfksjbdkfjb"></span>
                        </div>
                        <div class="options-content">
                          <div class="option-item" data-value="green" data-choice-aspect="oxydation">
                            <div class="title"><span>Green</span></div>
                          </div>
                          <div class="option-item selected" data-value="oolong" data-choice-aspect="oxydation">
                            <div class="title"><span>Oolong</span></div>
                          </div>
                          <div class="option-item" data-value="black" data-choice-aspect="oxydation">
                            <div class="title"><span>Black</span></div>
                          </div>
                        </div>
                      </div>

                      <div class="filter-slider-option" data-layer="taste">
                        <div class="options-title">taste</div>
                        <div class="options-content">
                          <div class="option-item" data-value="light" data-choice-aspect="taste">
                              <div class="title"><span>Light</span></div>
                          </div>
                          <div class="option-item selected" data-value="balanced" data-choice-aspect="taste">
                            <div class="title"><span>Balanced</span></div>
                          </div>
                          <div class="option-item" data-value="heavy" data-choice-aspect="taste">
                              <div class="title"><span>Heavy</span></div>
                          </div>
                        </div>
                      </div>

                      <div class="filter-slider-option" data-layer="caffeine">
                          <div class="options-title">caffeine</div>
                            <div class="options-content">
                              <div class="option-item" data-value="low" data-choice-aspect="caffeine">
                                  <div class="title"><span>Low</span></div>
                              </div>
                              <div class="option-item selected" data-value="medium" data-choice-aspect="caffeine">
                                  <div class="title"><span>Medium</span></div>
                              </div>
                              <div class="option-item" data-value="high" data-choice-aspect="caffeine">
                                    <div class="title"><span>High</span></div>
                              </div>
                            </div>
                      </div>

                      <div class="filter-slider-option" data-layer="roast">
                        <div class="options-title">roast</div>
                        <div class="options-content">
                            <div class="option-item" data-value="light" data-choice-aspect="roast">
                              <div class="title"><span>Light</span></div>
                            </div>
                            <div class="option-item selected" data-value="medium" data-choice-aspect="roast">
                              <div class="title"><span>Medium</span></div>
                            </div>
                            <div class="option-item" data-value="dark" data-choice-aspect="roast">
                              <div class="title"><span>Dark</span></div>
                            </div>
                         </div>
                      </div>
                </div>
            </div>
        </div>

      <div class="col-lg-6">
          <div class="filtered-products homepage" style="display: block;">
              <div id="filter-product-container" class=""><div class="message info empty"><div>We can't find products matching the selection.</div></div></div>
          </div>
      </div>

    </div>

    </div>
  </div> <!-- End row -->
  </div> <!-- End container -->
</div> <!-- End Jumbotron  -->

<script type="text/javascript">

// This will grab all of the choice options in the picker module.
var options = document.getElementsByClassName('option-item');
// Set our default values for the picker.
var oxydation = 'oolong',
    taste     = 'balanced',
    caffeine  = 'medium',
    roast     = 'medium';

// Here we'll listen for a click on any of the options and fire the ajax call when clicked.
for (var k = 0; k < options.length; k++) {
  options[k].addEventListener("click", function(){

    console.log(this.dataset);
    // Set our live variables to work with with default values
    var choiceAspect = this.dataset.choiceAspect;
    var choiceValue = this.dataset.value
    var parent = this.parentNode;
    var optionItems = parent.getElementsByClassName("option-item");

    //Remove the label on all sibilings when new choice is made
    for (var i = 0; i < optionItems.length; i++) {
      optionItems[i].classList.remove("selected");
    }
    // Add the label to the new choice
    this.classList.add("selected");

    // Set the newly selected value.
    if(choiceAspect == 'oxydation'){
      oxydation = choiceValue;
    } else if (choiceAspect == 'taste') {
      taste = choiceValue;
    } else if (choiceAspect == 'caffeine'){
      caffeine = choiceValue;
    } else if(choiceAspect == 'roast'){
      roast = choiceValue;
    } else {
      //
    }

    //Fire the data to the server and run logic to provide the product reccomendation
    var ajaxurl = '<?php echo admin_url('admin-ajax.php');?>';
    jQuery.ajax({
      url : ajaxurl,
      data : {
          action : 'tea_reccomendation_engine',
          oxydation:  oxydation,
          taste:      taste,
          caffeine:   caffeine,
          roast:      roast
      },
      dataype: JSON,
      method : 'POST', //Post method
      success : function( response ){
        // With a valid response, we'll fill the reccomendation <div> with options
        var results = JSON.parse(response);
        console.log(response);

      },
      // If there's an error, let's log it out.
      error : function(error){ console.log(error) }
    });
  });
}
</script>


<!-- End Module 4 Section -->
