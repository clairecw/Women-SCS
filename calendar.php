<?php /* Template Name: Calendar */ ?>
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
        <h1 class="wscs-info">WOMEN<b>@SCS</b></h1>
        <p class="wscs-info hide-on-small-screens"> The Women@SCS mission is to create, encourage, and support academic, social, and professional opportunities for women in computer science and to promote the breadth of the field and its diverse community. </p>
      </div>
      <!-- end W@SCS general info (CMU logo, W@SCS, mission) -->

      <div class="col s12 section-divider"><hr></div>

      <!-- start upcoming events info -->
      <div class="col s12 l4" id="dates">
        <div class="label"> <h2>Upcoming <br> Events</h2> </div>
            <?php
            $json = json_decode($calendarEvents, true);
            // var_dump($json["items"]);
            foreach ($json["items"] as $event) {
              $dateString = $event["start"]["date"] ? $event["start"]["date"] : $event["start"]["dateTime"];
              $date = date_create($dateString);
              $formattedDate = date_format($date,"m/d/y");
              echo
                '<div class="event">
                  <div class="info">' . $formattedDate . '</div>
                  <div class="name"><b>' . $event["summary"] . '</b></div>
                  <div class="info">' . $event["location"] . '</div>
                </div>';
            }
          ?>
      </div>
      <!-- end upcoming events info -->


  <div class="col s12 section-divider"></div>
  <div class="wscs-page-content">
        <div class = "page-title "><b>Calendar</b></div>

        <h3>Upcoming Events</h3>
        <?php

        $upcoming_events = "select startTime, endTime, title, description, location, audience, link, date_format(date, '%a %c/%e/%y') as date, date_format(endDate, '%a %c/%e/%y') as endDate from CalendarEvent where date >= (now() - interval 1 day) and type not like 'volunteers' order by CalendarEvent.date asc, CalendarEvent.startTime asc";
        $no_upcoming_events = "No upcoming events currently!";
        echo_calendar_events($upcoming_events, $no_upcoming_events); ?>

        <h3>Biweekly Women@SCS Meetings</h3>
        <p>Women@SCS has general body meetings every other week on Mondays at Gates, room 8115. Everyone is welcome, so please stop by to learn more about our mission, what events we will be planning for the month, and more!</p>

        <h3>Biweekly SCS4All Meetings</h3>
        <p> On the weeks alternating Women@SCS meetings, our partner organization, SCS4All has its meetings in the same room, Gates room 8115. There are often different events and activities organize with SCS4All, so please drop by to learn more about what they're doing! </p>

        <h3>Tech Nights</h3>
        <p>Tech Nights is an outreach progra run by Women@SCS that has workshops for middle school girls every Tuesday in the fall or spring. You can learn more <a href="https://www.women.cs.cmu.edu/technights/" target="_blank" rel="noopener">here</a> if you're a student looking to join the program, or if you want to volunteer to help with a workshop!</p>

        <h3>Other Events</h3>
        <p>We regularly have other events scheduled, whether it's a student-faculty lunch, an alumnae panel, or a talk given by upperclassmen. You can fnd these events scheduled in our calendar below!</p>

        &nbsp;

        <iframe style="border: 0;" src="https://calendar.google.com/calendar/embed?src=women.at.scs%40gmail.com&amp;ctz=America/New_York" width="800" height="600" frameborder="0" scrolling="no"></iframe>

  </div>
</main>

<?php
    get_footer();
?>

