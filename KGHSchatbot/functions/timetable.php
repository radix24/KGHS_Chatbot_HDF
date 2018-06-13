<?php
function gettimetable($grade, $class, $day)
{
  $db_host="localhost";
  $db_user="solasys";
  $db_password="2833chch";
  $db_name="solasys";
      $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
      if(mysqli_connect_errno($conn)){
      echo "DB연결실패입니다. 관리자에게 문의해주세요.";
      mysqli_connect_error();
      }
    $query = "SELECT * FROM `timetable_init` WHERE `grade`='" . $grade . "' AND `class`='" . $class . "' AND `day_num`='" . $day .  "'";
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
    $result[0] = "" . $day_kor . "요일의 " . $grade . "학년 " . $class . "반 시간표입니다 \\n \\n";
    $result[1] = "1교시: " . $row[4] . " - " . $row[5] . " 선생님 \\n";
    $result[2] = "2교시: " . $row[6] . " - " . $row[7] . " 선생님 \\n";
    $result[3] = "3교시: " . $row[8] . " - " . $row[9] . " 선생님 \\n";
    $result[4] = "4교시: " . $row[10] . " - " . $row[11] . " 선생님 \\n";
    $result[5] = "5교시: " . $row[12] . " - " . $row[13] . " 선생님 \\n";
     if ($day == 5){
       $result[6] = "6교시: 반별창체/학급회의 (HR) \\n";
     }
    else {
      $result[6] = "6교시: " . $row[14] . " - " . $row[15] . " 선생님 \\n";
    }
      if ($day == 1){
        $result[7] = "";
      }
      elseif ($day == 5){
        $result[7] = "7교시: 동아리활동 (CA) \\n";
      }
      else{
        $result[7] = "7교시: " . $row[16] . " - " . $row[17] . " 선생님 \\n";
      }

    $result[8] = "시간표 변동은 아직 반영되지 않고 있습니다. 시간표 변동은 매일매일 교실에 전달되는 전달사항 종이를 참고해주세요! 시간표 변동도 곧 지원하겠습니다 :)";
  return $result;
  } ?>
