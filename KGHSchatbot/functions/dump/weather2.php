<?php
function d1_weather()
{
  header("Content-type: application/json; charset=UTF-8");
  require("Snoopy.class.php");
  $URL = "http://www.weather.go.kr/wid/queryDFSRSS.jsp?zone=1168056500";
  $snoopy = new Snoopy;
  $snoopy->fetch($URL);
  preg_match('/<body>(.*?)<\/body>/is', $snoopy->results, $body);
  $d1_data = $body[0];
  $date = 0;
  $month = date("m");
  $day = date("d", strtotime("+1 days"));
  $re = "/<data seq=\"" . $date . "\">(.*?)<\/data>/is";
  preg_match($re, $d0_data, $d0_data);  $d0_data = $d0_data[0];
  preg_match('/<temp>(.*?)<\/temp>/is', $d0_data, $temp_now);  $temp_now = $temp_now[0];
  preg_match('/<tmx>(.*?)<\/tmx>/is', $d0_data, $temp_max);  $temp_max = $temp_max[0];
  preg_match('/<tmn>(.*?)<\/tmn>/is', $d0_data, $temp_min);  $temp_min = $temp_min[0];
  preg_match('/<sky>(.*?)<\/sky>/is', $d0_data, $sky_status);
  $sky_status = $sky_status[0];  $sky_status = str_replace(1, '맑음', $sky_status);
  $sky_status = str_replace(2, '구름 조금', $sky_status);
  $sky_status = str_replace(3, '구름 많음', $sky_status);
  $sky_status = str_replace(4, '흐림', $sky_status);
  preg_match('/<pty>(.*?)<\/pty>/is', $d0_data, $rain_status);
  $rain_status = $rain_status[0];
  $rain_status = str_replace(0, '없음', $rain_status);
  $rain_status = str_replace(1, '비', $rain_status);
  $rain_status = str_replace(2, '비/눈', $rain_status);
  $rain_status = str_replace(3, '눈/비', $rain_status);
  $rain_status = str_replace(4, '눈', $rain_status);
  preg_match('/<wfKor>(.*?)<\/wfKor>/is', $d0_data, $kor); $kor = $kor[0];
  preg_match('/<pop>(.*?)<\/pop>/is', $d0_data, $rain_posb); $rain_posb = $rain_posb[0];
  preg_match('/<reh>(.*?)<\/reh>/is', $d0_data, $hmdty); $hmdty = $hmdty[0];
  $list_filter = array('<temp>', '</temp>', '<tmx>', '</tmx>', '<tmn>', '</tmn>', '<sky>', '</sky>', '<pty>', '</pty>', '<wfKor>', '</wfKor>', '<pop>', '</pop>', '<reh>', '</reh>');
  foreach ($list_filter as $filter) {
      $temp_now = str_replace($filter, '', $temp_now);
      $temp_max = str_replace($filter, '', $temp_max);
      $temp_min = str_replace($filter, '', $temp_min);
      $sky_status = str_replace($filter, '', $sky_status);
      $rain_status = str_replace($filter, '', $rain_status);
      $kor = str_replace($filter, '', $kor);
      $rain_posb = str_replace($filter, '', $rain_posb);
      $hmdty = str_replace($filter, '', $hmdty);
  }
  if ($temp_max == -999.0){
    $temp_max = "기상청 데이터가 없습니다. ";
  }
  if ($temp_min == -999.0){
    $temp_min = "기상청 데이터가 없습니다. ";
  }
  $data2[0] = "" . $month . " 월 " . $day . " 일의 경기고등학교 날씨 정보입니다. (기상청 제공, 서울특별시 강남구 청담동 기준)\\n\\n"
  $data2[1] = "현재 시간 온도 : " . $temp_now . "\\n";
  $data2[2] = "최고 온도 : " . $temp_max . "\\n";
  $data2[3] = "최저 온도 : " . $temp_min . "\\n";
  $data2[4] = "구름의 양 : " . $sky_status . "\\n";
  $data2[5] = "강수 상태 : " . $rain_status . "\\n";
  $data2[6] = "날씨 : " . $kor . "\\n";
  $data2[7] = "강수 확률 : " . $rain_posb . "%\\n";
  $data2[8] = "습도 : " . $hmdty . "%";
return $data2;
  }
