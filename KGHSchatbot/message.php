<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $content = $data["content"];
    include("./functions/menu2.php");
    include("./functions/menu3.php");
    if ( strpos($content, "개발자") !== false ) {
      echo '{
            "message" :
            {
              "text" : "이 채팅봇은 (2018년 현재) 1-8 조현서가 개발했어 :) 개선사항이나 기능을 추가하고 싶다면 언제든지 E-Mail webmaster@inpase.io나 페이스북 메신저로 연락 줘!"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
      }
    else if ( strpos($content, "급식 식단") !== false ) {
        echo '{
              "message" :
              {
                "text" : "급식 식단 메뉴에 들어온걸 환영해! 어느 날짜의 식단을 알려줄까? 잘못 눌렀으면 걱정 말고 아래의 돌아가기 버튼을 눌러주면 돼 :)"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["오늘 중식", "오늘 석식", "내일 중식", "내일 석식", "모레 중식", "모레 석식", "돌아가기"]
              }
            }';
    }
    else if ( strpos($content, "오늘 중식") !== false ) {
        $meal2 = getmeal2(0);
echo <<< EOD
    {
        "message": {
            "text": "$meal2[0]\\n경기고등학교 오늘 중식 식단\\n\\n$meal2[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "내일 중식") !== false ) {
        $meal2 = getmeal2(1);
echo <<< EOD
    {
        "message": {
            "text": "$meal2[0]\\n경기고등학교 내일 중식 식단\\n\\n$meal2[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "모레 중식") !== false ) {
        $meal2 = getmeal2(2);
echo <<< EOD
    {
        "message": {
            "text": "$meal2[0]\\n경기고등학교 모레 중식 식단\\n\\n$meal2[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "오늘 석식") !== false ) {
        $meal3 = getmeal3(0);
echo <<< EOD
    {
        "message": {
            "text": "$meal3[0]\\n경기고등학교 오늘 석식 식단\\n\\n$meal3[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "내일 석식") !== false ) {
        $meal3 = getmeal3(1);
echo <<< EOD
    {
        "message": {
            "text": "$meal3[0]\\n경기고등학교 내일 석식 식단\\n\\n$meal3[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "모레 석식") !== false ) {
        $meal3 = getmeal3(2);
echo <<< EOD
    {
        "message": {
            "text": "$meal3[0]\\n경기고등학교 모레 석식 식단\\n\\n$meal3[1]"
        },
        "keyboard" :
        {
          "type" : "buttons",
          "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
       }
    }
EOD;
    }
    else if ( strpos($content, "돌아가기") !== false ) {
    echo '{
          "message" :
          {
            "text" : "처음으로 돌아왔습니다. 메뉴를 다시 선택해 주세요. "
          },
          "keyboard" :
          {
            "type" : "buttons",
            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
          }
    }';
}
    else if ( strpos($content, "시간표") !== false ) {
        echo '{
              "message" :
              {
                "text" : "개발중인 기능이에요 :) 잠시만 기다려주세요!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
              }
            }';
    }
    else if ( strpos($content, "학사력") !== false ) {
        echo '{
              "message" :
              {
                "text" : "개발중인 기능이에요 :) 잠시만 기다려주세요!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
              }
            }';
    }
    else if ( strpos($content, "교통정보") !== false ) {
        echo '{
              "message" :
              {
                "text" : "개발중인 기능이에요 :) 잠시만 기다려주세요!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
              }
            }';
    }
    else if ( strpos($content, "날씨") !== false ) {
        echo '{
              "message" :
              {
                "text" : "개발중인 기능이에요 :) 잠시만 기다려주세요!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
              }
            }';
    }
else{
    echo '{
          "message" :
          {
            "text" : "지금 말한게 뭔지 모르겠는걸 ㅠ 아래 버튼 중에서 다시 선택해볼래?"
          },
          "keyboard" :
          {
            "type" : "buttons",
            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
          }
    }';
}




?>
