<?php
include("./functions/timetable.php");
function timetable($grade, $class)
{
    $final = gettimetable($grade, $class, 1);
    $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
    $text[0] = "" . $final . " \\n \\n";
    $final = gettimetable($grade, $class, 2);
    $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
    $text[1] = "" . $final . " \\n \\n";
    $final = gettimetable($grade, $class, 3);
    $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
    $text[2] = "" . $final . " \\n \\n";
    $final = gettimetable($grade, $class, 4);
    $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
    $text[3] = "" . $final . " \\n \\n";
    $final = gettimetable($grade, $class, 5);
    $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
    $text[4] = "" . $final . " \\n \\n";
    return $text;
}
 ?>
