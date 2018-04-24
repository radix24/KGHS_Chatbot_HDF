<?php
function getmeal3($days)
{
  $date = date("Y.m.d", strtotime("+$days days"));
  if ($date == "2018.04.25"){
   $final = "오늘은 중간고사 첫째날이에요! 급식은 없지만 영양보충해서 힘내고 다들 시험 화이팅 :) \\n";
   $return = array($date, $final); // 해당날짜, 급식메뉴
   return $return;
 }
 if ($date == "2018.04.26"){
  $final = "오늘은 중간고사 둘째날이에요! 급식은 없지만 영양보충해서 힘내고 다들 시험 화이팅 :) \\n";
  $return = array($date, $final); // 해당날짜, 급식메뉴
  return $return;
}
if ($date == "2018.04.27"){
 $final = "오늘은 중간고사 셋째날이에요! 급식은 없지만 영양보충해서 힘내고 다들 시험 화이팅 :) \\n";
 $return = array($date, $final); // 해당날짜, 급식메뉴
 return $return;
}
if ($date == "2018.04.28"){
 $final = "오늘은 중간고사 기간이에요! 2일차 시험까지 열심히 달려왔으니 토요일에는 쉬어가면서 다음주 시험을 위한 체력보충! 급식은 없지만 다들 시험 화이팅 :) \\n";
 $return = array($date, $final); // 해당날짜, 급식메뉴
 return $return;
}
if ($date == "2018.04.29"){
 $final = "오늘은 중간고사 기간이에요! 급식은 없지만 다들 내일 4일차 시험도 다들 화이팅 :) \\n";
 $return = array($date, $final); // 해당날짜, 급식메뉴
 return $return;
}
if ($date == "2018.04.30"){
 $final = "오늘은 중간고사 넷째날이에요! 급식은 없지만 영양보충해서 힘내고 다들 시험 화이팅 :) \\n";
 $return = array($date, $final); // 해당날짜, 급식메뉴
 return $return;
}
if ($date == "2018.05.01"){
 $final = "오늘은 중간고사 다섯째날이에요! 급식은 없지만 영양보충해서 힘내고 다들 시험 화이팅 :) \\n";
 $return = array($date, $final); // 해당날짜, 급식메뉴
 return $return;
}
  header("Content-type: application/json; charset=UTF-8");
  require("Snoopy.class.php");
  $URL = "https://stu.sen.go.kr/sts_sci_md01_001.do?schulCode=B100000375&&schulCrseScCode=4&schMmealScCode=3&schYmd=" . $date;
  $snoopy = new Snoopy;
  $snoopy->fetch($URL);
  preg_match('/<tbody>(.*?)<\/tbody>/is', $snoopy->results, $tbody);
  $menu3=$tbody[0];
  preg_match_all('/<tr>(.*?)<\/tr>/is', $menu3, $menu3);
  $menu3=$menu3[0][1];
  preg_match_all('/<td class="textC">(.*?)<\/td>/is', $menu3, $menu3);
  $day=0;
  if ( date('w')+$days > 6) {
    $day = (date('w')+$days)-7;
  } else {
    $day = date('w')+$days;
  }
  $menu3=$menu3[0][$day];
  $menu3=preg_replace("/[0-9]/", "", $menu3);
  $array_filter = array('.', ' ', '<tdclass="textC">', '</td>');
  foreach ($array_filter as $filter) {
      $menu3=str_replace($filter, '', $menu3);
  }
  $menu3=str_replace('<br/>', '\\n', $menu3);
  $menu3=substr($menu3, 0, -2);
  if ( strcmp($menu3, '') == false ){
    $menu3 = "급식이 없습니다. 요청하신 날짜가 주말이나 휴일인지 체크해 보신 후, 오류가 있다면 개발자에게 연락해주세요.";
  }
  $return = array($date, $menu3);
  return $return;
}
?>
