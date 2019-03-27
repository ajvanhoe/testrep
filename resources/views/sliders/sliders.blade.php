<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Slider examples</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="" />
  <meta name="author" content="" />


 <!-- css -->

<link href="{{ asset('css/app.css') }}" rel="stylesheet" />

<link href="{{ asset('plugins/sliders/css/nivo.css') }}" rel="stylesheet" />	
  

</head>


<body>
  <div class="container">

  	<h1 class="text-center">Sliders</h1>

  <div class="row">
  
    <section id="featured">

    	<h3>1. Nivo slider</h3>	
      <!-- start slider -->
      <!-- Slider -->
      <div id="nivo-slider">
        <div class="nivo-slider">
          <!-- Slide #1 image -->
          <img src="{{ asset('plugins/sliders/nivo/bg-1.jpg') }}" alt="" title="#caption-1" />
          <!-- Slide #2 image -->
          <img src="{{ asset('plugins/sliders/nivo/bg-2.jpg') }}" alt="" title="#caption-2" />
          <!-- Slide #3 image -->
          <img src="{{ asset('plugins/sliders/nivo/bg-3.jpg') }}" alt="" title="#caption-3" />
        </div>

        <div class="container">
          <div class="row">
            <div class="span12">
              <!-- Slide #1 caption -->
              <div class="nivo-caption" id="caption-1">
                <div>
                  <h2>Awesome <strong>features</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-primary">Read More</a>
                </div>
              </div>
              <!-- Slide #2 caption -->
              <div class="nivo-caption" id="caption-2">
                <div>
                  <h2>Fully <strong>responsive</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn">Read More</a>
                </div>
              </div>
              <!-- Slide #3 caption -->
              <div class="nivo-caption" id="caption-3">
                <div>
                  <h2>Very <strong>customizable</strong></h2>
                  <p>
                    Lorem ipsum dolor sit amet nsectetuer nec Vivamus. Curabitu laoreet amet eget. Viurab oremd ellentesque ameteget. Lorem ipsum dolor sit amet nsectetuer nec vivamus.
                  </p>
                  <a href="#" class="btn btn-default">Read More</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- end slider -->
    </section>


	</div> <!-- /.row -->

  </div>
  <!-- <a href="#" class="scrollup"><i class="icon-chevron-up icon-square icon-32 active"></i></a> -->
  <!-- javascript
    ================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
 
  <script src="{{ asset('plugins/sliders/js/jquery.js') }}"></script>
  <script src="{{ asset('plugins/sliders/js/bootstrap.js') }}"></script>
  

  <script src="{{ asset('plugins/sliders/js/jquery.nivo.slider.js') }}"></script>
  
  
  
<!-- Template Custom JavaScript File -->
<script>

  //nivo slider
  $('.nivo-slider').nivoSlider({
    effect: 'random', // Specify sets like: 'fold,fade,sliceDown'
    slices: 15, // For slice animations
    boxCols: 8, // For box animations
    boxRows: 4, // For box animations
    animSpeed: 500, // Slide transition speed
    pauseTime: 5000, // How long each slide will show
    startSlide: 0, // Set starting Slide (0 index)
    directionNav: true, // Next & Prev navigation
    controlNav: false, // 1,2,3... navigation
    controlNavThumbs: false, // Use thumbnails for Control Nav
    pauseOnHover: true, // Stop animation while hovering
    manualAdvance: false, // Force manual transitions
    prevText: '', // Prev directionNav text
    nextText: '', // Next directionNav text
    randomStart: false, // Start on a random slide
    beforeChange: function() {}, // Triggers before a slide transition
    afterChange: function() {}, // Triggers after a slide transition
    slideshowEnd: function() {}, // Triggers after all slides have been shown
    lastSlide: function() {}, // Triggers when last slide is shown
    afterLoad: function() {} // Triggers when slider has loaded
  });
</script>  

</body>
</html>
