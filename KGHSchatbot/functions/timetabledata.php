<?php
function datainput($user_key, $grade, $class){
  $db_host="localhost";
  $db_user="solasys";
  $db_password="";
  $db_name="solasys";
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  if(mysqli_connect_errno($conn)){
      echo "DB연결실패입니다. 관리자에게 문의해주세요.";
      mysqli_connect_error();
      }
  //db칼럼 정보: user_key (유저키), grade(입력한 학년), class(입력한 반)
  $query = " INSERT INTO 'timetable_data' (user_key, grade, class) VALUES ('" . $user_key . "', '" . $grade . "', '" . $class . "'); ";
  mysqli_query($conn, $query);
  mysqli_close($conn);
}
function dataoutput($user_key){
  $db_host="localhost";
  $db_user="solasys";
  $db_password="";
  $db_name="solasys";
  $conn = mysqli_connect($db_host, $db_user, $db_password, $db_name);
  if(mysqli_connect_errno($conn)){
      echo "DB연결실패입니다. 관리자에게 문의해주세요.";
      mysqli_connect_error();
  }
  $query = "SELECT * FROM `timetable_data` AS p WHERE timestamp=(SELECT MAX(`timestamp`) FROM timetable_data WHERE user_key = p.user_key) AND user_key='" . $user_key . "';";
  $result_set = mysqli_query($conn, $query);
  $row = mysqli_fetch_array($result_set); //row[0] 꼴의 변수 출력
  mysqli_close($conn);
  return $row;
}
 ?>
