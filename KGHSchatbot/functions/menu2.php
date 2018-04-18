<?php
function getmeal2($days)
{
  $date = date("Y.m.d", strtotime("+$days days"));
  header("Content-type: application/json; charset=UTF-8");
  require("Snoopy.class.php");
  $URL = "https://stu.sen.go.kr/sts_sci_md01_001.do?schulCode=B100000375&&schulCrseScCode=4&schMmealScCode=2&schYmd=" . $date;
  $snoopy = new Snoopy;
  $snoopy->fetch($URL);
  preg_match('/<tbody>(.*?)<\/tbody>/is', $snoopy->results, $tbody);
  $menu2=$tbody[0];
  preg_match_all('/<tr>(.*?)<\/tr>/is', $menu2, $menu2);
  $menu2=$menu2[0][1];
  preg_match_all('/<td class="textC">(.*?)<\/td>/is', $menu2, $menu2);
  $day=0;
  if ( date('w')+$days > 6) {
    $day = (date('w')+$days)-7;
  } else {
    $day = date('w')+$days;
  }
  $menu2=$menu2[0][$day];
  $menu2=preg_replace("/[0-9]/", "", $menu2);
  $array_filter = array('.', ' ', '<tdclass="textC">', '</td>');
  foreach ($array_filter as $filter) {
      $menu2=str_replace($filter, '', $menu2);
  }
  $menu2=str_replace('<br/>', '\\n', $menu2);
  $menu2=substr($menu2, 0, -2);
  if ( strcmp($menu2, '') == false ){
    $menu2 = "급식이 없습니다. 요청하신 날짜가 주말이나 휴일인지 체크해 보신 후, 오류가 있다면 개발자에게 연락해주세요.";
  }
  $return = array($date, $menu2);
  return $return;
}
?>
