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
                "text" : "메뉴 눌러도 정상출력되지 않을 수 있습니다. 개발중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["1학년", "2학년", "3학년"]
              }
            }';
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
    elseif ( strpos($content, "1학년 2반") !== false ) {
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
    elseif ( strpos($content, "1학년 3반") !== false ) {
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
    elseif ( strpos($content, "1학년 4반") !== false ) {
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
    elseif ( strpos($content, "1학년 5반") !== false ) {
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
    elseif ( strpos($content, "1학년 6반") !== false ) {
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
    elseif ( strpos($content, "1학년 7반") !== false ) {
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
    elseif ( strpos($content, "1학년 8반") !== false ) {
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
    elseif ( strpos($content, "1학년 9반") !== false ) {
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
    elseif ( strpos($content, "1학년 10반") !== false ) {
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
    elseif ( strpos($content, "1학년 11반") !== false ) {
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
    elseif ( strpos($content, "1학년 12반") !== false ) {
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
    elseif ( strpos($content, "1학년 13반") !== false ) {
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
    elseif ( strpos($content, "1학년 14반") !== false ) {
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
    elseif ( strpos($content, "2학년 1반") !== false ) {
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
    elseif ( strpos($content, "2학년 2반") !== false ) {
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
    elseif ( strpos($content, "2학년 3반") !== false ) {
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
    elseif ( strpos($content, "2학년 4반") !== false ) {
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
    elseif ( strpos($content, "2학년 5반") !== false ) {
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
    elseif ( strpos($content, "2학년 6반") !== false ) {
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
    elseif ( strpos($content, "2학년 7반") !== false ) {
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
    elseif ( strpos($content, "2학년 8반") !== false ) {
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
    elseif ( strpos($content, "2학년 9반") !== false ) {
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
    elseif ( strpos($content, "2학년 10반") !== false ) {
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
    elseif ( strpos($content, "2학년 11반") !== false ) {
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
    elseif ( strpos($content, "2학년 12반") !== false ) {
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
    elseif ( strpos($content, "2학년 13반") !== false ) {
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
    elseif ( strpos($content, "2학년 14반") !== false ) {
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
    elseif ( strpos($content, "3학년 1반") !== false ) {
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
    elseif ( strpos($content, "3학년 2반") !== false ) {
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
    elseif ( strpos($content, "3학년 3반") !== false ) {
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
    elseif ( strpos($content, "3학년 4반") !== false ) {
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
    elseif ( strpos($content, "3학년 5반") !== false ) {
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
    elseif ( strpos($content, "3학년 6반") !== false ) {
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
    elseif ( strpos($content, "3학년 7반") !== false ) {
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
    elseif ( strpos($content, "3학년 8반") !== false ) {
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
    elseif ( strpos($content, "3학년 9반") !== false ) {
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
    elseif ( strpos($content, "3학년 10반") !== false ) {
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
    elseif ( strpos($content, "3학년 11반") !== false ) {
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
    elseif ( strpos($content, "3학년 12반") !== false ) {
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
    elseif ( strpos($content, "3학년 13반") !== false ) {
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
    elseif ( strpos($content, "3학년 14반") !== false ) {
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
