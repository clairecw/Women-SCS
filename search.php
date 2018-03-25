<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 3
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/xiangyiqisara@gmail.com/events?key=AIzaSyDDIMbO-_T-5cklnZU1-nnZAavWox67-ds&maxResults=3&timeMin=' . $currentTime);
    if ( is_array( $calendarEventsRequest ) ) {
      $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>

<main>

  <div class="row content-top">

      <!-- start W@SCS general info (CMU logo, W@SCS, mission) -->
      <div class="col s12 l8">
        <div class="wscs-info">
          <a href="https://www.cmu.edu/"><img class="cmu-logo" src="<?php echo get_template_directory_uri() . '/img/cmu_wordmark.png';?>"></a>
        </div>
        <a href="<?php echo home_url(); ?>" style="color: inherit;"><h1 class="wscs-info">WOMEN<b>@SCS</b></h1></a>
      </div>

      <div class="col s12 section-divider"><hr></div>

    </div>


  <div class="col s12 section-divider"></div>
  <div class="wscs-page-content">
    <?php if ( have_posts() ) : ?>
      <header class="search-page-header">
        <span class="page-title">
          <?php printf( "<b>Search Results for \"" . get_search_query() . "\"</b>"); ?>
        </span>
      </header>

      <?php while ( have_posts() ) : the_post(); ?>
        <div class="search-post">
          <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
          <?php the_excerpt(); ?>
        </div>
      <?php endwhile; ?>

    <?php else : ?>
      <header class="search-page-header">
        <span class="page-title">
          <?php printf( "<b>Search Results for \"" . get_search_query() . "\"</b>"); ?>
        </span>
      </header>
      <p class="no-results"><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
    <?php endif; ?>
  </div>
</main>

<?php get_footer(); ?>

