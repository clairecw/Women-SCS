<!doctype html>
  <head>
    <meta charset="utf-8"/>
    <!-- Using the meta viewport value width=device-width instructs the page to match the screen's width in device-independent pixels. This allows the page to reflow content to match different screen sizes, whether rendered on a small mobile phone or a large desktop monitor.
    tldr:
    Use the meta viewport tag to control the width and scaling of the browser's viewport.
    Include width=device-width to match the screen's width in device-independent pixels.
    Include initial-scale=1 to establish a 1:1 relationship between CSS pixels and device-independent pixels.-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Women@SCS</title>
    <?php wp_head(); ?>
	<link rel="icon" href="<?php echo get_template_directory_uri() . '/img/wscs_logo2.png';?>">
  </head>

  <body <?php body_class(); ?>>
    <div class="row blue-bar">
      <div class="col s12 padding-top zindex-top"></div>
    </div>

      <!-- z-depth-0 removes the shadow effect that is the default for materialize css nav bars -->
      <div class="row content-top">
        <!-- start W@SCS general info (CMU logo, W@SCS, mission) -->
        <div class="col s12 l3">
          <div class="wscs-info">
            <a href="https://www.cmu.edu/"><img class="cmu-logo" src="<?php echo get_template_directory_uri() . '/img/cmu_wordmark.png';?>"></a>
          </div>
          <a href="<?php echo home_url(); ?>" style="color: #00294b;"><h1 class="wscs-info">WOMEN<b>@SCS</b></h1></a>
        </div>
        <!-- end W@SCS general info (CMU logo, W@SCS, mission) -->

        <!-- start nav bar -->
        <div class="col s12 l9">
        <nav class="nav-wrapper">
          <a href="#" data-activates="mobile-nav" class="button-collapse"><i class="material-icons">menu</i></a> <!-- hamburger icon :D - only visible on mobile -->
          <?php
            $defaults = array(
              'menu_class'=>'right hide-on-med-and-down',
              'container'=> false,
              'theme_location' => 'primary-menu',
              'walker' => new wscs_materializecss_large_walker(),
            );
            //details: https://developer.wordpress.org/reference/functions/wp_nav_menu/
            //container boolean determines whether wrapped in auto-generated div
            //theme_location links to menu (from functions.php array)
            //menu-class adds classes to ul (that wraps the nav)

            wp_nav_menu($defaults);
         ?>
         <?php
            $defaults = array(
              'menu_class'=>'side-nav',
              'menu_id' => 'mobile-nav',
              'container'=> false,
              'theme_location' => 'primary-menu',
              'walker' => new wscs_materializecss_small_walker(),
            );
            wp_nav_menu($defaults);
         ?>
        </nav>
        </div>
        <!-- end nav bar -->
      </div>
