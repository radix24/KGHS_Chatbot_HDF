<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $content = $data["content"];
    include("./functions/menu2.php");
    include("./functions/menu3.php");
    include("./functions/weather1.php");
    include("./functions/calander.php");
    include("./functions/timetableweek.php");
    if ( strpos($content, "개발자") !== false ) {
      echo '{
            "message" :
            {
              "text" : "이 채팅봇은 (2018년 현재) 1-8 조현서가 개발했어 :) 개선사항이나 기능을 추가하고 싶다면 언제든지 E-Mail webmaster@inpase.io나 페이스북 메신저로 연락 줘!"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
          }
    }';
}
else if ( strpos($content, "월요일 시간표") !== false ) {
  session_start();
  $final = gettimetable($_SESSION['grade'], $_SESSION['class'], $_SESSION['class'], 1);
  $func = $final[0] . $final[1] . $final[2] . $final[3] . $final[4] . $final[5] . $final[6] . $final[7] . $final[8];
  unset($_SESSION['grade']);
  unset($_SESSION['class']);
  session_destroy();
echo <<< EOD
          {
              "message": {
                  "text": "$func"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
         }
      }
EOD;
}
    else if ( strpos($content, "시간표") !== false ) {
        echo '{
              "message" :
              {
                "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
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
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 8반") !== false ) {
      $final = timetable(1, 8);
      $func = $text[0] . $text[1] . $text[2] . $text[3] . $text[4];
echo <<< EOD
        {
            "message" :
            {
              "text" : "$func"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
            }
        }
EOD;
    }
    elseif ( strpos($content, "1학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "1학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 1반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 8반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "2학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 1반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 2반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 3반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 4반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 5반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 6반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 7반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 8반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 9반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 10반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 11반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 12반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 13반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    elseif ( strpos($content, "3학년 14반") !== false ) {
      echo '{
            "message" :
            {
              "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
            }
      }';
    }
    else if ( strpos($content, "1학년") !== false ) {
        echo '{
              "message" :
              {
                "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
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
                "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
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
                "text" : "학교와의 시간표 정보 관련 협의가 이루어지지 않아 시간표 데이터를 제공할 수 없습니다. 잠시만 기다려주세요, 기능이 추가되면 다시 공지드리겠습니다 :) "
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
                  "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
          "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
                "text" : "정문과 후문 중 어느 방향에서 출발하시는지 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["정문", "후문"]
              }
            }';
    }
    else if ( strpos($content, "143") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["코엑스, 휘문중/고등학교, 은마아파트입구사거리, 대치역, 경기여고, 개포동 방면", "청담중/고등학교, 갤러리아, 압구정, 잠원, 신반포, 고속터미널 방면"]
              }
            }';
    }
    else if ( strpos($content, "청담중/고등학교, 갤러리아, 압구정, 잠원, 신반포, 고속터미널 방면") !== false ) {
      $func = fetchbusdata(d, 143, 71);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "코엑스, 휘문중/고등학교, 은마아파트입구사거리, 대치역, 경기여고, 개포동 방면") !== false ) {
      $func = fetchbusdata(b, 143, 42);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //143 end
    //146 START
    else if ( strpos($content, "146") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["삼성역, 선릉역, 역삼역, 강남역 방면", "건대입구역, 화양동, 군자역, 면목동 (영동대교 경유) 방면"]
              }
            }';
    }
    else if ( strpos($content, "삼성역, 선릉역, 역삼역, 강남역 방면") !== false ) {
      $func = fetchbusdata(b, 146, 55);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "건대입구역, 화양동, 군자역, 면목동 (영동대교 경유) 방면") !== false ) {
      $func = fetchbusdata(d, 146, 79);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //146 end
    //3011 START
    else if ( strpos($content, "3011") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["은마아파트입구, 대치동, 개포동, 수서역SRT, 가락시장 방면", "강남구청역, 도산공원, 압구정, 한남동 방면"]
              }
            }';
    }
    else if ( strpos($content, "은마아파트입구, 대치동, 개포동, 수서역SRT, 가락시장 방면") !== false ) {
      $func = fetchbusdata(e, 3011, 58);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "강남구청역, 도산공원, 압구정, 한남동 방면") !== false ) {
      $func = fetchbusdata(f, 3011, 37);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //3011 end
    //301 START
    else if ( strpos($content, "301") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["봉은사, 종합운동장, 잠실(롯데월드), 가락시장, 문정동 방면", "강남구청, 압구정, 옥수, DDP (동호대교 경유) 방면"]
              }
            }';
    }
    else if ( strpos($content, "봉은사, 종합운동장, 잠실(롯데월드), 가락시장, 문정동 방면") !== false ) {
      $func = fetchbusdata(c, 301, 73);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "강남구청, 압구정, 옥수, DDP (동호대교 경유) 방면") !== false ) {
      $func = fetchbusdata(a, 301, 29);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //301 end
    //362 START
    else if ( strpos($content, "362") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["갤러리아, 압구정, 고속터미널, 여의도 방면", "봉은사, 종합운동장, 잠실(롯데월드), 가락시장, 위례신도시 방면"]
              }
            }';
    }
    else if ( strpos($content, "갤러리아, 압구정, 고속터미널, 여의도 방면") !== false ) {
      $func = fetchbusdata(d, 362, 29);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "봉은사, 종합운동장, 잠실(롯데월드), 가락시장, 위례신도시 방면") !== false ) {
      $func = fetchbusdata(b, 362, 78);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //362 end
    //401 START
    else if ( strpos($content, "401") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["강남구청역, 논현역, 고속터미널, 서울도심(시내) 방면", "삼성역, 개포동, 일원동, 수서역SRT, 가락시장 방면"]
              }
            }';
    }
    else if ( strpos($content, "강남구청역, 논현역, 고속터미널, 서울도심(시내) 방면") !== false ) {
      $func = fetchbusdata(a, 401, 28);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "삼성역, 개포동, 일원동, 수서역SRT, 가락시장 방면") !== false ) {
      $func = fetchbusdata(c, 401, 72);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //401 end
    //2413 start
    else if ( strpos($content, "2413") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["휘문중/고등학교, 대치역, 도곡역, 개포동 방면", "성수동, 뚝섬역, 서울숲 (영동대교 경유) 방면"]
              }
            }';
    }
    else if ( strpos($content, "휘문중/고등학교, 대치역, 도곡역, 개포동 방면") !== false ) {
      $func = fetchbusdata(b, 100100210, 21);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "성수동, 뚝섬역, 서울숲 (영동대교 경유) 방면") !== false ) {
      $func = fetchbusdata(d, 2413, 51);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //2413 end
    //2415 start
    else if ( strpos($content, "2415 (정문)") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["대치동(학원가), 대치역, 도곡역, 한티역 방면 (정문)", "종합운동장, 신천, 잠실, 자양동 (잠실대교 경유) 방면 (정문)"]
              }
            }';
    }
    else if ( strpos($content, "대치동(학원가), 대치역, 도곡역, 한티역 방면 (정문)") !== false ) {
      $func = fetchbusdata(a, 2415, 16);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "종합운동장, 신천, 잠실, 자양동 (잠실대교 경유) 방면 (정문)") !== false ) {
      $func = fetchbusdata(c, 2415, 39);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "2415 (후문)") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["대치동(학원가), 대치역, 도곡역, 한티역 방면 (후문)", "종합운동장, 신천, 잠실, 자양동 (잠실대교 경유) 방면 (후문)"]
              }
            }';
    }
    else if ( strpos($content, "대치동(학원가), 대치역, 도곡역, 한티역 방면 (후문)") !== false ) {
      $func = fetchbusdata(e, 2415, 19);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "종합운동장, 신천, 잠실, 자양동 (잠실대교 경유) 방면 (후문)") !== false ) {
        $func = fetchbusdata(f, 2415, 37);
        $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
    echo <<< EOD
            {
                "message": {
                    "text": "$final"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
               }
            }
EOD;
}
    //2415 end
    //3414 start
    else if ( strpos($content, "3414") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["강남구청역, 학동역, 논현역, 고속터미널 방면", "종합운동장, 신천, 잠실, 방이동 방면"]
              }
            }';
    }
    else if ( strpos($content, "강남구청역, 학동역, 논현역, 고속터미널 방면") !== false ) {
      $func = fetchbusdata(a, 3414, 23);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "종합운동장, 신천, 잠실, 방이동 방면") !== false ) {
      $func = fetchbusdata(c, 3414, 46);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //3414 end
    //3426 start
    else if ( strpos($content, "3426") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["선릉역, 한티역, 개포동, 수서역SRT, 세곡동, 장지역 방면"]
              }
            }';
    }
    else if ( strpos($content, "선릉역, 한티역, 개포동, 수서역SRT, 세곡동, 장지역 방면") !== false ) {
      $func = fetchbusdata(a, 3426, 45);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //3426 end
    //4318 start
    else if ( strpos($content, "4318") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["삼성역, 아주초/중학교, 잠실역, 잠실나루역, 올림픽공원 방면", "청담중/고등학교, 압구정, 고속터미널, 반포, 이수, 사당 방면"]
              }
            }';
    }
    else if ( strpos($content, "삼성역, 아주초/중학교, 잠실역, 잠실나루역, 올림픽공원 방면") !== false ) {
      $func = fetchbusdata(b, 4318, 24);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "청담중/고등학교, 압구정, 고속터미널, 반포, 이수, 사당 방면") !== false ) {
      $func = fetchbusdata(d, 4318, 84);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //4318 end
    //4419 start
    else if ( strpos($content, "4419") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["청담중/고등학교, 갤러리아, 압구정, 도산공원 방면", "삼성역, 학여울역, 수서역SRT, 성남(태평동, 중앙시장, 남한산성) 방면"]
              }
            }';
    }
    else if ( strpos($content, "청담중/고등학교, 갤러리아, 압구정, 도산공원 방면") !== false ) {
      $func = fetchbusdata(a, 4419, 52);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "삼성역, 학여울역, 수서역SRT, 성남(태평동, 중앙시장, 남한산성) 방면") !== false ) {
      $func = fetchbusdata(c, 4419, 69);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //4419 end
    //G08 start
    else if ( strpos($content, "강남08 (정문)") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["코엑스, 삼성중앙역, 청담역, 강남구청역, 신사역 방면 (정문)"]
              }
            }';
    }
    else if ( strpos($content, "코엑스, 삼성중앙역, 청담역, 강남구청역, 신사역 방면 (정문)") !== false ) {
      $func = fetchbusdata(c, 08, 10);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "강남08 (후문)") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["코엑스, 삼성중앙역, 청담역, 강남구청역, 신사역 방면 (후문)"]
              }
            }';
    }
    else if ( strpos($content, "코엑스, 삼성중앙역, 청담역, 강남구청역, 신사역 방면 (후문)") !== false ) {
      $func = fetchbusdata(c, 08, 18);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //G08 end
    //N61 start
    else if ( strpos($content, "N61") !== false ) {
        echo '{
              "message" :
              {
                "text" : "탑승을 원하는 방향을 알려주세요! 심야버스니 운행시간에 주의해 주세요 :)"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["건대입구, 어린이대공원, 면목동, 상봉역KTX, 상계, 노원 방면", "강남역, 교대역, 방배역, 사당역, 신림역, 구로, 오류동 방면"]
              }
            }';
    }
    else if ( strpos($content, "건대입구, 어린이대공원, 면목동, 상봉역KTX, 상계, 노원 방면") !== false ) {
      $func = fetchbusdata(d, 61, 49);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    else if ( strpos($content, "강남역, 교대역, 방배역, 사당역, 신림역, 구로, 오류동 방면") !== false ) {
      $func = fetchbusdata(b, 61, 131);
      $final = $func[0] . $func[1] . $func[2] . $func[3] . $func[4] . $func[5] . $func[6] . $func[7];
  echo <<< EOD
          {
              "message": {
                  "text": "$final"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons": ["급식 식단", "부스 안내", "시설 안내", "교통정보", "행사 안내", "날씨", "시간표", "학사력", "개발자", "메인으로"]
             }
          }
EOD;
}
    //n61 end
    else if ( strpos($content, "정문") !== false ) {
        echo '{
              "message" :
              {
                "text" : "정문에서 탑승 가능한 버스를 출력중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["143", "146", "301", "362", "401", "2413", "2415 (정문)", "3217", "3414", "3426", "4318", "4419", "N61", "강남08 (정문)"]
              }
            }';
    }
    else if ( strpos($content, "후문") !== false ) {
        echo '{
              "message" :
              {
                "text" : "후문에서 탑승 가능한 버스를 출력중입니다. "
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["강남08 (후문)", "2415 (후문)", "3011"]
              }
            }';
    }
    //bus end


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
                  "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
              "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
    else if ( strpos($content, "과학기술정보통신부 지원안내") !== false ) {
        echo '{
              "message" :
              {
                "text" : "과학기술정보통신부는 「과학기술을 선도하는 동아리」 라는 목표로 챗봇인 KyunggiLife의 공식 운영 동아리이며, 3D프린터, VR, 로봇, 드론 등의 최신 산업 기술은 물론, 과학교육봉사 및 코딩교육봉사 등의 활동을 통한 기술의 윤리적인 활용 역시 연구하는 동아리입니다! \\n신규 지원 일정은 아래를 참조해 주시고, 신규 지원 문의는 010-3673-4929 (부장) 으로 연락 주세요 ★\\n\\n지원은 010-3673-4929로 문자 학년/반/번호/이름/지원전형 3월 9일 (일) 까지! \\n\\n3월 7일 (목) : 활동계획세미나 \\n\\n-수학/과학영재전형\\n3월 10일 혹은 3월 11일 지필평가를 선택하여 응시 후 3월 12일 면접 참여를 통하여 지원 (12명)\\n\\n-일반전형\\n3월 12일 면접 참여를 통하여 지원 (3명)\\n\\n(상세 선발 인원은 변동될 수 있습니다.)"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
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
            "buttons": ["과학기술정보통신부 지원안내", "급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
          }
    }';
}
?>
