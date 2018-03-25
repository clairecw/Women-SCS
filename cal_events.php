<?php

/**
 * Echos a table displaying the calendar events.
 *
 * Query must contain the following fields to display correctly:
 *      date, endDate, startTime, endTime, location, title, description, audience
 *
 * @param string $query             the MySQL query to run
 * @param string $empty_message     message to display when no results are returned
 *
 * @author Lucy Li <lucyl@andrew> 2010-11-11
 */

function echo_calendar_events($query, $empty_message) {
    $result = mysql_query($query) or die(mysql_error());
    $count = mysql_num_rows($result);

    if ($count > 0) {
        // table header
        echo '<table cellspacing="10" cellpadding="5" border="0" width="100%">
         <thead>
         <tr>
            <th class="calendar_when">When</td>
            <th class="calendar_event">Women@SCS Event</td>
            <th class="calendar_where">Where</td>
            <th class="calendar_who">Who</td>
         </tr>
         </thead>

         <tbody>';

        // display the events
        while ($row = mysql_fetch_array($result)) {
            echo " <tr>
                <td class=\"calendar_when\">
                    $row[date]"; // start date
                    if ($row['endDate'])
                        echo "&ndash;$row[endDate]"; // end date

                     // show start and end times if applicable
                    if ($row['startTime'] != "00:00:00") {
                        $startTime = date('g:iA', strtotime($row['startTime']));
                        echo "<br>$startTime";

                        if ($row['endTime']) {
                            $endTime = date('g:iA', strtotime($row['endTime']));
                            echo "-$endTime";
                        }
                    }

            if (!$row['location'])
                $row['location'] = "N/A";

            echo "</td>
                <td class=\"calendar_event\">
                <p class=\"calendar_event_title\">";
                if (isset($row['link']) && $row['link'])
                    echo "<p><a href=\"$row[link]\" target=\"_blank\">$row[title]</a></p>";
                else
                    echo "<p><b>$row[title]</b></p>";
            echo"

                    <p>$row[description]</p>
                </td>
                <td class=\"calendar_where\">
                    $row[location]
                </td>
                <td class=\"calendar_who\">
                    $row[audience]
                </td>
             </tr>";
        }

        echo '</tbody>
        </table>';
    }

    // no events
    else {
        echo "<p>$empty_message</p>";
    }
} // end of echo_calendar_events()

?>
