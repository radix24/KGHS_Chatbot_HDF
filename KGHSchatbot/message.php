<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $content = $data["content"];
    include("./functions/menu2.php");
    include("./functions/menu3.php");
    include("./functions/weather.php");
    include("./functions/calander.php");
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
                "text" : "메뉴 눌러도 정상출력되지 않을 수 있습니다. 개발중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["1학년", "2학년", "3학년"]
              }
            }';
    }
    elseif ( strpos($content, "1학년 1반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 1;
    }
    elseif ( strpos($content, "1학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 2;
    }
    elseif ( strpos($content, "1학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 3;
    }
    elseif ( strpos($content, "1학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 4;
    }
    elseif ( strpos($content, "1학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 5;
    }
    elseif ( strpos($content, "1학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 6;
    }
    elseif ( strpos($content, "1학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 7;
    }
    elseif ( strpos($content, "1학년 8반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 8;
    }
    elseif ( strpos($content, "1학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 9;
    }
    elseif ( strpos($content, "1학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 10;
    }
    elseif ( strpos($content, "1학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 11;
    }
    elseif ( strpos($content, "1학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 12;
    }
    elseif ( strpos($content, "1학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 13;
    }
    elseif ( strpos($content, "1학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 1;
      $class = 14;
    }
    elseif ( strpos($content, "2학년 1반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 1;
    }
    elseif ( strpos($content, "2학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 2;
    }
    elseif ( strpos($content, "2학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 3;
    }
    elseif ( strpos($content, "2학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 4;
    }
    elseif ( strpos($content, "2학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 5;
    }
    elseif ( strpos($content, "2학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 6;
    }
    elseif ( strpos($content, "2학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 7;
    }
    elseif ( strpos($content, "2학년 8반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 8;
    }
    elseif ( strpos($content, "2학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 9;
    }
    elseif ( strpos($content, "2학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 10;
    }
    elseif ( strpos($content, "2학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 11;
    }
    elseif ( strpos($content, "2학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 12;
    }
    elseif ( strpos($content, "2학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 13;
    }
    elseif ( strpos($content, "2학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 2;
      $class = 14;
    }
    elseif ( strpos($content, "3학년 1반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 1;
    }
    elseif ( strpos($content, "3학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 2;
    }
    elseif ( strpos($content, "3학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 3;
    }
    elseif ( strpos($content, "3학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 4;
    }
    elseif ( strpos($content, "3학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 5;
    }
    elseif ( strpos($content, "3학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 6;
    }
    elseif ( strpos($content, "3학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 7;
    }
    elseif ( strpos($content, "3학년 8반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 8;
    }
    elseif ( strpos($content, "3학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 9;
    }
    elseif ( strpos($content, "3학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 10;
    }
    elseif ( strpos($content, "3학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 11;
    }
    elseif ( strpos($content, "3학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 12;
    }
    elseif ( strpos($content, "3학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 13;
    }
    elseif ( strpos($content, "3학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "조회를 원하는 요일을 선택해주세요. 모든 요일 한번에 보기 기능은 준비중입니다."
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
      }';
      $grade = 3;
      $class = 14;
    }
    else if ( strpos($content, "월요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 1);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
                  {
                      "message": {
                          "text": "$func"
                      },
                      "keyboard" :
                      {
                        "type" : "buttons",
                        "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                     }
                  }
EOD;
}
    else if ( strpos($content, "화요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 2);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
              {
                  "message": {
                      "text": "$func"
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                 }
              }
EOD;
}
    else if ( strpos($content, "수요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 3);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
          {
              "message": {
                  "text": "$func"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
             }
          }
EOD;
}
    else if ( strpos($content, "수요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 3);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
          {
              "message": {
                  "text": "$func"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
             }
          }
EOD;
}
    else if ( strpos($content, "목요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 4);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
          {
              "message": {
                  "text": "$func"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
             }
          }
EOD;
}
    else if ( strpos($content, "금요일 시간표") !== false ) {
      $final = gettimetable($grade, $class, 5);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
echo <<< EOD
          {
              "message": {
                  "text": "$func"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
             }
          }
EOD;
}
    else if ( strpos($content, "1학년") !== false ) {
        echo '{
              "message" :
              {
                "text" : "메뉴 눌러도 정상출력되지 않을 수 있습니다. 개발중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["1학년 1반", "1학년 2반", "1학년 3반", "1학년 4반", "1학년 5반", "1학년 6반", "1학년 7반", "1학년 8반", "1학년 9반", "1학년 10반", "1학년 11반", "1학년 12반", "1학년 13반", "1학년 14반"]
              }
            }';
    }
    else if ( strpos($content, "2학년") !== false ) {
        echo '{
              "message" :
              {
                "text" : "메뉴 눌러도 정상출력되지 않을 수 있습니다. 개발중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["2학년 1반", "2학년 2반", "2학년 3반", "2학년 4반", "2학년 5반", "2학년 6반", "2학년 7반", "2학년 8반", "2학년 9반", "2학년 10반", "2학년 11반", "2학년 12반", "2학년 13반", "2학년 14반"]
              }
            }';
    }
    else if ( strpos($content, "3학년") !== false ) {
        echo '{
              "message" :
              {
                "text" : "메뉴 눌러도 정상출력되지 않을 수 있습니다. 개발중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["3학년 1반", "3학년 2반", "3학년 3반", "3학년 4반", "3학년 5반", "3학년 6반", "3학년 7반", "3학년 8반", "3학년 9반", "3학년 10반", "3학년 11반", "3학년 12반", "3학년 13반", "3학년 14반"]
              }
            }';
    }
    if ( strpos($content, "이번달 학사일정") !== false ) {
      $final = cal(0);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8] . $final[9] . $final[10] . $final[11] . $final[12] . $final[13] . $final[14] . $final[15] . $final[16] . $final[17] . $final[18] . $final[19] . $final[20] . $final[21] . $final[23] . $final[24] . $final[25] . $final[26] . $final[27] . $final[28] . $final[29] . $final[30] . $final[31];
echo <<< EOD
            {
                "message": {
                    "text": "$func"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
               }
            }
EOD;
}
    if ( strpos($content, "다음달 학사일정") !== false ) {
        $final = cal(1);
        $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8] . $final[9] . $final[10] . $final[11] . $final[12] . $final[13] . $final[14] . $final[15] . $final[16] . $final[17] . $final[18] . $final[19] . $final[20] . $final[21] . $final[23] . $final[24] . $final[25] . $final[26] . $final[27] . $final[28] . $final[29] . $final[30] . $final[31];
echo <<< EOD
        {
            "message": {
                "text": "$func"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
           }
        }
EOD;
}
    if ( strpos($content, "다다음달 학사일정") !== false ) {
      $final = cal(2);
      $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8] . $final[9] . $final[10] . $final[11] . $final[12] . $final[13] . $final[14] . $final[15] . $final[16] . $final[17] . $final[18] . $final[19] . $final[20] . $final[21] . $final[23] . $final[24] . $final[25] . $final[26] . $final[27] . $final[28] . $final[29] . $final[30] . $final[31];
echo <<< EOD
        {
            "message": {
                "text": "$func"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
           }
        }
EOD;
}
    else if ( strpos($content, "학사력") !== false ) {
        echo '{
              "message" :
              {
                "text" : "어느 달의 학사력을 알려줄까? 선택해줘!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["이번달 학사일정", "다음달 학사일정", "다다음달 학사일정"]
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
    if ( strpos($content, "오늘 날씨") !== false ) {
        $func = weather(0);
        $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7]. $func[8];
    echo <<< EOD
            {
                "message": {
                    "text": "$final"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
               }
            }
EOD;
        }
        else if ( strpos($content, "내일 날씨") !== false ) {
          $func = weather(1);
          $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7]. $func[8];
    echo <<< EOD
        {
            "message": {
                "text": "$final"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
           }
        }
EOD;
        }
        else if ( strpos($content, "모레 날씨") !== false ) {
          $func = weather(2);
          $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7]. $func[8];
    echo <<< EOD
        {
            "message": {
                "text": "$final"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
           }
        }
EOD;
    }
    else if ( strpos($content, "날씨") !== false ) {
        echo '{
              "message" :
              {
                "text" : "어느 날짜의 날씨를 알려줄까? 날짜를 선택해줘!"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["오늘 날씨", "내일 날씨", "모레 날씨"]
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
