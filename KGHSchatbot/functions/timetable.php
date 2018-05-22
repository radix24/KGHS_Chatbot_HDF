<?php
gettimetable($grade, $class, $day){
    $db_host="";
    $db_user="";
    $db_password="";
    $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
    if(mysqli_connect_errno($conn)){
    echo "DB연결실패입니다. 관리자에게 문의해주세요.";
    mysqli_connect_error();
    }
  $query = "SELECT timetable.*
            FROM timetable
            WHERE timetable.[class]=" . $class . " AND timetable.[grade]=" . $grade . " AND timetable.[day_num]=" . $day . ";"
  $result_set = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result_set); //row[0] 꼴의 변수 출력
  mysqli_close($conn);
  if ($day == 1){
    $day_kor = "월";
  }
  else if ($day == 2){
    $day_kor = "화";
  }
  else if ($day == 3){
    $day_kor = "수";
  }
  else if ($day == 4){
    $day_kor = "목";
  }
  else if ($day == 5){
    $day_kor = "금";
  }
  $result[0] = "" . $day_kor . "요일의 " . $grade . "학년 " . $class . "반 시간표입니다 \\n \\n;";
  $result[1] = "1교시:" . $row[5] . " - " . $row[6] . " 선생님";
  $result[2] = "2교시:" . $row[7] . " - " . $row[8] . " 선생님";
  $result[3] = "2교시:" . $row[9] . " - " . $row[10] . " 선생님";
  $result[4] = "2교시:" . $row[11] . " - " . $row[12] . " 선생님";
  $result[5] = "2교시:" . $row[13] . " - " . $row[14] . " 선생님";
  $result[6] = "2교시:" . $row[15] . " - " . $row[16] . " 선생님";
  $result[7] = "2교시:" . $row[17] . " - " . $row[18] . " 선생님";
  $result[8] = "시간표 변동은 아직 반영되지 않고 있습니다. 시간표 변동은 매일매일 교실에 전달되는 전달사항 종이를 참고해주세요! 시간표 변동도 곧 지원하겠습니다 :)";
  return $result;
  }
 ?>
