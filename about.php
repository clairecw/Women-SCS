<?php /* Template Name: About */ ?>
<?php get_header();
    date_default_timezone_set('EST');
    $currentTime = date('c');
    // 3 query parameters set:
    // maxResults = 2
    // timeMin = currentTime
    // key = API key (obtain from console.developers.google.com - navigate to correct project > create credentials > API key)
    $calendarEventsRequest = wp_remote_get( 'https://www.googleapis.com/calendar/v3/calendars/women.at.scs@gmail.com/events?key=AIzaSyCOUaXqxVzZfCLB5Hqk_1WJZupfo7IoWv4&maxResults=2&timeMin=' . $currentTime);
    if ( is_array( $calendarEventsRequest ) ) {
      $calendarEvents = $calendarEventsRequest['body']; // use the content
    }
?>

<main>
	<div class="row content-top" style="height:180px;">

      <!-- start W@SCS general info (CMU logo, W@SCS, mission) -->
      <div class="col s12 l8">
        <div class="wscs-info">
          <a href="https://www.cmu.edu/"><img class="cmu-logo" src="<?php echo get_template_directory_uri() . '/img/cmu_wordmark.png';?>"></a>
        </div>
        <a href="<?php echo home_url(); ?>" style="color: inherit;"><h1 class="wscs-info">WOMEN<b>@SCS</b></h1></a>
      </div>
      <!-- end W@SCS general info (CMU logo, W@SCS, mission) -->

      
      <h1>Women@SCS Background</h1><br>
<div style="display: flex;">
<div style="display: flex; align-items: left; flex-direction: column; width: 50%;">

Women@SCS' mission is to create, encourage, and support women's academic, social and professional opportunities in the computer sciences and to promote the breadth of the field and its diverse community. The Women@SCS Advisory Committee consists of undergraduate students, graduate students, and faculty within the School of Computer Science.

Members of the Committee have initiated many programs, such as the Big/Little Sister program for undergraduates, the invited Speaker Series, professional development workshops, as well as dinners and other social and academic events. Women@SCS also sponsors outreach projects such as "Is there a robot in your future?" workshop for middle school girls, and the Women@SCS Outreach Roadshow with its different versions for undergraduates, for grade school children, teachers, and parents, and TechNights, a free weekly series of workshops for middle school girls taught by our students. In general, the committee strives to promote a healthy and supportive community atmosphere for ALL. Making a difference and solving problems serve as the basic motivating purposes of the organization.

Read more about us in <a href="https://www.women.cs.cmu.edu/Resources/Papers/">our gender and CS research papers</a>!

Please take a look at our website and give us your input! We appreciate your comments and concerns.

</div>
<div style="display: flex; align-items: right; flex-direction: column; width: 50%; align-content: center; ">
  <br>
<div><img src="https://www.women.cs.cmu.edu/Who/About/groupPicture.jpg" alt="" height="500px" align="right" style="padding-left: 20px" /></div>
<div style="text-align: center; padding-left:60px"><i>Members of Women@SCS at an Undergraduate Council meeting. We meet every other Wednesday at 4:30pm in GHC 7101. Everyone is welcome!</i></div>
</div>
</div>
&nbsp;
<h1>FAQ: Find more about us</h1>
<div>

<b><img id = "pic1" class="wp-image-464 alignnone" onclick = "answerVisibility('1')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" />How can schools get more women involved in CS-related activities?</b>
<p id = "a1" style="display: none;">Definitely publicize. Set up a distribution list (dlist) of all the women in the Computer Science department and send emails to inform them about the exciting activities you are planning! Ask other women in the department for their input on what activities to run so that more people are involved in the activity planning process.</p>

</div>
<div>

<img id = "pic2" class="wp-image-464 alignnone" onclick = "answerVisibility('2')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" /><b>How did you expand the size of your committee?</b>
<p id = "a2" style="display: none;">We opened up the Women@SCS committee to anyone who is dedicated to helping this program succeed, and just as importantly, to anyone who is committed to succeeding in the field of computer science. The commitment and success of the Women@SCS organization at CMU is a testimonial to the dedication and time that our members put forth for the group. As we’ve expanded our visibility to the community by sponsoring events on campus and organizing outreach programs such as the Roadshow, more and more people have decided to be a part of this team.</p>

</div>
<div>

<img id = "pic3" class="wp-image-464 alignnone" onclick = "answerVisibility('3')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" /><b>How does the Big Sister/Little Sister program work?</b>
<p id = "a3" style="display: none;">At the start of the academic year, we email all of the upperclassmen in the organization asking them if they want to mentor a freshman, as well as send out an interest form to the freshmen who would like to have a Women@SCS mentor for the year. We then match these mentors up with the interested freshmen based on common interests or hobbies. Join our mailing list and get notified the next time we do Big/Little matchings!</p>

</div>
<div>

<img id = "pic4" class="wp-image-464 alignnone" onclick = "answerVisibility('4')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" /><b>How do you budget time for all these activities and events?</b>
<p id = "a4" style="display: none;">Within our undergraduate committee, different members work on different projects at the same time so we can streamline our planning process. We have pre-planned agendas for our weekly meetings, in which we organize upcoming events and delegate responsibilities.</p>

</div>
<div>
<img id = "pic5" class="wp-image-464 alignnone" onclick ="answerVisibility('5')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" /><b>Why are women “different”? If the end goal is equality, why do you think women merit special attention?</b>
<p id = "a5" style="display: none;">Women are not different. Women have been involved in computer science since its early days, but more recently the majority of women (and many men too) have not been seeing it as an option. The field is little understood and those who “can do” computer science have often been reduced to stereotypes so that few people viably see themselves in this field. Like most academic fields computer science thrives on diverse ideas, so we need to reach out to a broad range of potential students. Organizations like Women@SCS try to present to the world the real picture - which is that women can be great at computer science and that the field offers tremendous opportunities!</p>

</div>
<div>

<img id = "pic6" class="wp-image-464 alignnone" onclick = "answerVisibility('6')" src="https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg" alt="" width="16" height="18" /><b>Why do you think technical fields are still underpopulated with women, while fields like medicine and law are closer to 50/50?</b>
<p id = "a6" style="display: none;">Most people grow up with some familiarity with the medical and legal professions, even if only through TV and movies. But computer science is still less understood, and many people in our society share the notion that technical fields are for men. This means fewer girls and women are encouraged by parents/ teachers/peers to consider technical fields and computer science. We have far fewer role models in these fields for girls and women and those who are interested often find themselves in situations with very few same sex peers, which can create a cycle of underrepresentation. We need to show that women are good at technical fields and encourage more women to consider these exciting areas.
Furthermore, 49% of the SCS class of 2021 consists of women - so we’re getting there!</p>

</div>

<script>
function answerVisibility(num) {
    var e = document.getElementById("a"+num);
    if (e.style.display === 'none') {
        e.style.display = 'block';
        document.getElementById("pic"+num).src = "https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/minus.jpg";
    } else {
        e.style.display = 'none';
        document.getElementById("pic"+num).src = "https://www.women.cs.cmu.edu/test-site/wp-content/uploads/2018/03/plus.jpg";
    }
}
</script>

	
</div>
</main>

<?php get_footer(); ?>
