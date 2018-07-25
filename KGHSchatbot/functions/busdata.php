<?php
function weather($st_id, $line_code, $ord)
{
  header("Content-type: application/json; charset=UTF-8");
  require("Snoopy.class.php");
  $servicekey = "94qO6gPJpfIPXPHzYydPb4FVAi8a%2B%2FiHJBys4hPMJ0EePgukYE49Q0jEwEGnjZYXs4OsWYFdiaEBBdFOpTtviQ%3D%3D";
  $URL = "http://ws.bus.go.kr/api/rest/arrive/getArrInfoByRoute?serviceKey=" . $servicekey . "&stId=" . $st_id . "&busRouteId=" . $line_code . "&ord=" . $ord . "";
  $snoopy = new Snoopy;
  $snoopy->fetch($URL);
  preg_match('/<msgBody>(.*?)<\/msgBody>/is', $snoopy->results, $body);
  $bus_data = $body[0];
  $bus_data = $bus_data[0];
  preg_match('/<stNm>(.*?)<\/stNm>/is', $bus_data, $station_name);  $station_name = $station_name[0];
  preg_match('/<rtNm>(.*?)<\/rtNm>/is', $bus_data, $route_name);  $route_name = $route_name[0];
  preg_match('/<firstTm>(.*?)<\/firstTm>/is', $bus_data, $first_time);  $first_time = $first_time[0];
  preg_match('/<lastTm>(.*?)<\/lastTm>/is', $bus_data, $last_time); $last_time = $last_time[0];
  preg_match('/<term>(.*?)<\/term>/is', $bus_data, $term);  $term = $term[0];
  preg_match('/<arrmsg1>(.*?)<\/arrmsg1>/is', $bus_data, $bustime1); $bustime1 = $bustime1[0];
  preg_match('/<arrmsg2>(.*?)<\/arrmsg2>/is', $bus_data, $bustime1); $bustime2 = $bustime2[0];
  preg_match('/<nextBus>(.*?)<\/nextBus>/is', $bus_data, $next_bus); $next_bus = $next_bus[0];
  $list_filter = array('<stNm>', '</stNm>', '<rtNm>', '</rtNm>', '<firstTm>', '</firstTm>', '<lastTm>', '</lastTm>', '<term>', '</term>', '<arrmsg1>', '</arrmsg1>', '<arrmsg2>', '</arrmsg2>', '<nextBus>', '</nextBus>');
  foreach ($list_filter as $filter) {
      $station_name = str_replace($filter, '', $station_name);
      $first_time = str_replace($filter, '', $first_time);
      $last_time = str_replace($filter, '', $last_time);
      $term = str_replace($filter, '', $term);
      $bustime1 = str_replace($filter, '', $bustime1);
      $bustime2 = str_replace($filter, '', $bustime2);
      $next_bus = str_replace($filter, '', $next_bus);
  }
  $first_time = date("H시 i분", strtotime( $first_time ) );
  $last_time = date("H시 i분", strtotime( $last_time ) );
  switch ($next_bus) {
    case 'Y': $bus_status="이번 버스가 막차에요! 빨리 서두르세요! \\n"; break;
    case 'N': $bus_status=""; break;
  }
  switch ($st_id) {
    case '122000070': $st_loca="정문에서 길 건너 편의점 앞"; break;
    case '122000068': $st_loca="정문에서 길 건너 혼다자동차/대신증권 앞"; break;
    case '122000070': $st_loca="정문에서 길 건너기 전"; break;
    case '122000085': $st_loca="정문에서 길 건너서 청담역 1번출구쪽"; break;
    case '122000105': $st_loca="후문에서 큰길로 나간 후 길 건너서"; break;
    case '122000101': $st_loca="후문에서 큰길로 나간 후 길 건너기 전"; break;
  }
  if($bustime1 == "운행종료"){
    $bustime1 = "막차 운행이 종료되었습니다. \\n\\n";
  }
  else{
    if($bustime2 == "운행종료"){
      $bustime1 = "이번 버스 : " . $bustime1 . "\\n";
      $bustime2 = "";
    }
    $bustime1 = "이번 버스 : " . $bustime1 . "\\n";
    $bustime2 = "다음 버스 : " . $bustime2 . "\\n";
  }
  $data[0] = "현재 " . $station_name . " (" . $st_loca . ") 정류장의 " . $route_name . "번 버스 도착정보입니다. \\n \\n";
  $data[1] = "" . $bustime1 . "";
  $data[2] = "" . $bustime2 . "";
  $data[3] = "" . $bus_status . "";
  $data[4] = "\\n\\n";
  $data[5] = "첫차 시간 : " . $first_time . "\\n";
  $data[6] = "막차 시간 : " . $last_time . "\\n";
  $data[7] = "배차 간격 : " . $term . "분\\n";
  return $data;
  }
?>
