<?php /* Template Name: Calendar */ ?>

<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 3
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events?key=AIzaSyCOUaXqxVzZfCLB5Hqk_1WJZupfo7IoWv4&maxResults=2&timeMin=' . $currentTime);
    if ( is_array( $calendarEventsRequest ) ) {
        //var_dump($calendarEventsRequest);
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
        <a href="<?php echo home_url(); ?>" style="color: inherit;"><h1
    class="wscs-info">WOMEN<b>@SCS</b></h1></a>
        </div>
     <!-- end W@SCS general info (CMU logo, W@SCS, mission) -->

     </div>


  <div class="col s12 section-divider"></div>
  <div class="wscs-page-content">
    <div class = "page-title "><b>Calendar</b></div>
        <br>
        <br>
        <h3>Upcoming Events</h3>
            <?php
	        	$json = json_decode($calendarEvents, true);
                //var_dump($json["items"]);
            usort($json["items"], function($a, $b) { //Sort the array using a user defined function
              $dateStringA = $a["start"]["date"] ? $a["start"]["date"] : $a["start"]["dateTime"];
              $dateStringB = $b["start"]["date"] ? $b["start"]["date"] : $b["start"]["dateTime"];
              $currSeconds = strtotime(time());
              return strtotime($dateStringA) - $currSeconds < strtotime($dateStringB) - $currSeconds ? -1 : 1; //Compare the scores
            });
            // var_dump($json["items"]);
            foreach ($json["items"] as $event) {
	        		$dateString = $event["start"]["date"] ? $event["start"]["date"] : $event["start"]["dateTime"];
	        		$date = date_create($dateString);
	        		$formattedDate = date_format($date,"l, M j");
	        		echo
                        '<div>
                            <p> <b>' . $event["summary"] . '</b> on ' . $formattedDate . ' at ' . $event["location"] . '
                            </p>
                        </div>';
	        	}
	        ?>
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
</div>
</main>

<?php get_footer(); ?>


