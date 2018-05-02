<?php
  $day = date("w");
  elseif ( strpos($content, "1학년 1반") !== false ) {
    echo '{
          "message" :
          {
            "text" : "아직 이 반은 시간표 정보가 없어! 상담원과 연결하기 버튼을 눌러서 시간표를 추가해줘!"
          },
          "keyboard" :
          {
            "type" : "buttons",
            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
          }
    }';
    }
 ?>
