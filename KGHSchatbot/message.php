<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $content = $data["content"];
    include("./functions/menu2.php");
    include("./functions/menu3.php");
    include("./functions/weather1.php");
    include("./functions/calander.php");
    include("./functions/timetableweek.php");
    include("./functions/busdata.php");
    if ( strpos($content, "개발자") !== false ) {
      echo '{
            "message" :
            {
              "text" : "이 채팅봇은 (2018년 현재) 1-8 조현서가 개발했어 :) 개선사항이나 기능을 추가하고 싶다면 언제든지 E-Mail webmaster@inpase.io나 페이스북 메신저로 연락 줘!"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
            }
      }';
    }
    else if ( strpos($content, "위치로 찾기") !== false ) {
        echo '{
              "message" :
              {
                "text" : "다음 중 원하는 건물을 찾아주세요 :)"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["학생동 부스", "화동관 부스", "과학동 부스", "관리동 부스", "체육관 부스", "삼성재 (검도장) 부스"]
              }
            }';
    }
    else if ( strpos($content, "메인으로") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "메인화면으로 돌아왔습니다. "
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
                }
              }';
      }
      else if ( strpos($content, "화동제 도우미 (부스 정보, 시설 정보, 행사 정보)") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "화동제에 방문하신 것을 환영합니다! 아래 메뉴 중 필요하신 기능을 선택해 주세요. "
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["부스 정보", "시설 정보", "행사 정보", "메인으로"]
                }
              }';
      }
      else if ( strpos($content, "부스 정보") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "어떻게 부스를 찾고 싶으신가요? 알려주세요!"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
                }
              }';
      }
      else if ( strpos($content, "시설 정보") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "어떤 시설을 찾고 있으신가요? 알려주세요!"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["교실 위치", "화장실 위치", "처음으로"]
                }
              }';
      }
      //대표메뉴 종료
      //부스정보 세부메뉴 시작
      else if ( strpos($content, "동아리 이름으로 찾기") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "가나다순으로 나와있는 동아리 중 원하는 동아리를 찾아주세요 :)"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["검도부", "경영부", "경제부(KLX)", "과학기술정보통신부(LIST)", "교지편집부", "기계공학부(KEC)", "내셔널트러스트부", "농구부", "도서부(Papyrus)", "물리부", "미술부(AC7)", "방송부", "배구부", "생물부(KBRC)", "수학부(KMOC)", "시사영어토론부(ATOM)", "신문부", "실용음악부(홍련)", "심리부", "아이스하키부", "연극부", "영어토론부(OAK)", "영자신문부(KyunggiYouth)", "오케스트라부", "유네스코부", "이디엠(EDM)부", "창의수학탐구부", "창의융합과학부(CSS)", "천문학부", "청담농사부", "축구부", "컴퓨터부(CE-L)", "항공부(KAST)", "헬스부", "화학부(KCC)", "힙합댄스부(매드스텝)", "힙합음악부(Absolute)"]
                }
              }';
      }
      else if ( strpos($content, "동아리 주제로 찾기") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "찾으시려는 동아리의 주제를 선택해주세요 :)"
                },
                  "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["이공계", "인문사회", "예체능"]
                }
              }';
      }
      else if ( strpos($content, "이공계") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "이공계 분야의 동아리만 표시중입니다! 원하는 동아리를 찾아주세요 :)"
                },
                  "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["과학기술정보통신부(LIST)", "기계공학부(KEC)", "물리부", "생물부(KBRC)", "수학부(KMOC)", "창의수학탐구부", "창의융합과학부(CSS)", "천문학부", "컴퓨터부(CE-L)", "항공부(KAST)", "화학부(KCC)", "동아리 분야 다시 찾기"]
                }
              }';
          }
      else if ( strpos($content, "인문사회") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "인문사회 분야의 동아리만 표시중입니다! 원하는 동아리를 찾아주세요 :)"
                },
                  "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["경영부", "경제부(KLX)", "교지편집부", "내셔널트러스트부", "도서부(Papyrus)", "방송부", "시사영어토론부(ATOM)", "신문부", "심리부", "영어토론부(OAK)", "영자신문부(KyunggiYouth)", "유네스코부", "청담농사부", "동아리 분야 다시 찾기"]
                }
              }';
          }
      else if ( strpos($content, "예체능") !== false ) {
        echo '{
              "message" :
              {
                "text" : "예체능 분야의 동아리만 표시중입니다! 원하는 동아리를 찾아주세요 :) 찾는 분야의 동아리가 아니라면 분야 다시 찾기를 눌러주세요! "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["검도부", "농구부", "미술부(AC7)", "배구부", "실용음악부(홍련)", "아이스하키부", "연극부", "오케스트라부", "이디엠(EDM)부", "축구부", "헬스부", "힙합댄스부(매드스텝)", "힙합음악부(Absolute)", "동아리 분야 다시 찾기"]
              }
            }';
        }
      else if ( strpos($content, "학생동 부스") !== false ) {
        echo '{
              "message" :
              {
                "text" : "학생동은 경기고의 중앙에 위치한 긴 하얀색 건물이며 1학년과 2학년 교실이 위치해 있습니다! 학생동에 위치한 동아리만 표시중입니다! 찾는 부스가 아니라면 부스 다시 찾기를 눌러주세요! "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["과학기술정보통신부(LIST)", "경영부", "경제부(KLX)", "교지편집부", "기계공학부(KEC)", "내셔널트러스트부", "도서부(Papyrus)", "배구부", "수학부(KMOC)", "신문부", "심리부", "아이스하키부", "영자신문부(KyunggiYouth)", "유네스코부", "창의수학탐구부", "천문학부", "청담농사부", "축구부", "컴퓨터부(CE-L)", "항공부(KAST)", "헬스부", "부스 다시 찾기"]
              }
            }';
        }
      else if ( strpos($content, "화동관 부스") !== false ) {
        echo '{
              "message" :
              {
                "text" : "화동관은 경기고의 가장 안쪽에 위치한 벽돌 건물이며 1학년 교실과 멀티미디어실이 위치해 있습니다! 화동관에 위치한 동아리만 표시중입니다! 찾는 부스가 아니라면 부스 다시 찾기를 눌러주세요! "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["실용음악부(홍련)", "영어토론부(OAK)", "미술부(AC7)", "농구부", "이디엠(EDM)부", "힙합댄스부(매드스텝)", "부스 다시 찾기"]
              }
            }';
        }
      else if ( strpos($content, "과학동 부스") !== false ) {
        echo '{
              "message" :
              {
                "text" : "과학동은 학생동과 색이 비슷하지만 학생동처럼 길지는 않은 건물로 각 과학실과 컴퓨터실 등이 위치해 있습니다! 과학동에 위치한 동아리만 표시중입니다! 찾는 부스가 아니라면 부스 다시 찾기를 눌러주세요! "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["물리부", "생물부(KBRC)", "창의융합과학부(CSS)", "화학부(KCC)", "부스 다시 찾기"]
              }
            }';
        }
      else if ( strpos($content, "관리동 부스") !== false ) {
        echo '{
              "message" :
              {
                "text" : "관리동은 파란색 건물로 방송실 등이 위치해 있습니다! 관리동에 위치한 동아리만 표시중입니다! 찾는 부스가 아니라면 부스 다시 찾기를 눌러주세요! "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["방송부", "부스 다시 찾기"]
              }
            }';
        }
      else if ( strpos($content, "부스 다시 찾기") !== false ) {
        echo '{
              "message" :
              {
                "text" : "동아리 위치 찾기 메뉴로 돌아왔습니다. 검색하고자 하는 동아리의 위치를 다시 입력해주세요. "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["학생동 부스", "화동관 부스", "과학동 부스", "관리동 부스", "체육관 부스", "삼성재 (검도장) 부스"]
              }
            }';
        }
      else if ( strpos($content, "동아리 분야 다시 찾기") !== false ) {
        echo '{
              "message" :
              {
                "text" : "동아리 주제 찾기 메뉴로 돌아왔습니다. 검색하고자 하는 동아리의 위치를 다시 입력해주세요. "
              },
                "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["이공계", "인문사회", "예체능"]
              }
            }';
        }
      //부스정보 세부메뉴 종료
      //시설정보 세부메뉴 시작
      else if ( strpos($content, "화장실 위치") !== false ) {
        echo '{
              "message" :
              {
                "text" : "<<남자화장실>> - 총 7개소 \\n\\n학생동 4층 2학년 13반 옆\\n학생동 4층 2학년 10반과 9반 사이\\n학생동 3층 2학년 6반과 5반 사이\\n학생동 2층 1학년 9반과 10반 사이\\n학생동 1층 1학년 14반과 13반 사이\\n화동관 3층 로비\\n화동관 2층 로비\\n\\n\\n<<여자화장실>> - 2개소\\n\\n학생동 3층 2학년 반 옆\\n학생동 2층 2학년 2반 옆"
              },
              "keyboard" :
              {
                "type" : "buttons",
                "buttons" : ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
              }
            }';
          }
      else if ( strpos($content, "교실 위치") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "준비중입니다"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
                }
              }';
            }
      //시설정보 세부메뉴 종료
      //행사정보 세부메뉴 시작
      else if ( strpos($content, "행사 정보") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "준비중입니다"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
                }
              }';
            }
      //기타
      else if ( strpos($content, "처음으로") !== false ) {
          echo '{
                "message" :
                {
                  "text" : "초기 메뉴로 돌아왔습니다 :)"
                },
                "keyboard" :
                {
                  "type" : "buttons",
                  "buttons" : ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 2반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 3반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 4반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 5반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 6반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 7반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 8반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 9반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 10반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 11반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 12반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 13반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "1학년 14반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 1반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 2반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 3반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 4반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 5반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 6반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 7반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 8반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 9반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 10반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 11반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 12반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 13반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "2학년 14반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 1반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 2반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 3반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 4반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 5반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 6반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 7반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 8반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 9반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 10반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 11반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 12반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 13반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
                  }
              }';
    }
    elseif ( strpos($content, "3학년 14반") !== false ) {
      echo '{
                  "message" :
                  {
                    "text" : "시간표를 조회하고자 하는 요일을 선택해 주세요."
                  },
                  "keyboard" :
                  {
                    "type" : "buttons",
                    "buttons": ["월요일 시간표", "화요일 시간표", "수요일 시간표", "목요일 시간표", "금요일 시간표"]
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
                  "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
          "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
              "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                  "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
              "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
              "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
    else if ( strpos($content, "부스 다시 찾기") !== false ) {
      echo '{
            "message" :
            {
              "text" : "다음 중 원하는 건물을 찾아주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["학생동 부스", "화동관 부스", "과학관 부스", "관리동 부스", "체육관 부스", "삼성재 (검도장) 부스"]
          }';
    }
    else if ( strpos($content, "검도부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<검도부>>\\n\\n위치: 삼성재 (검도관)\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "경영부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<경영부>>\\n\\n위치: 학생동 2학년 9반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "경제부(KLX)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<경제부(KLX)>>\\n\\n위치: 학생동 1층 1학년 14반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "과학기술정보통신부(LIST)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<과학기술정보통신부(LIST)>>\\n\\n위치: 학생동 4층 2학년 13반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n특이사항: KyunggiLife 개발자가 과기정통에 있습니다 ★\\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "교지편집부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<교지편집부>>\\n\\n위치: 학생동 2층 1학년 10반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "기계공학부(KEC)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<기계공학부(KEC)>>\\n\\n위치: 학생동 층 2학년 4반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "내셔널트러스트부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<농구부>>\\n\\n위치: 학생동 2층 2학년 2반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "농구부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<농구부>>\\n\\n위치: 화동관 3층 1학년 4반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "도서부(Papyrus)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<도서부(Papyrus)>>\\n\\n위치: 학생동 층 2학년 11반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "물리부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<물리부>>\\n\\n위치: 과학동 층 물리실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "미술부(AC7)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<미술부(AC7)>>\\n\\n위치: 화동관 2층 1학년 3반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "방송부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<방송부>>\\n\\n위치: 관리동 3층 방송실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "배구부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<배구부>>\\n\\n위치: 학생동 층 2학년 8반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "생물부(KBRC)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<생물부(KBRC)>>\\n\\n위치: 과학동 2층 생물실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "수학부(KMOC)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<수학부(KMOC)>>\\n\\n위치: 학생동 4층 2학년 12반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "시사영어토론부(ATOM)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<시사영어토론부(ATOM)>>\\n\\n위치: 교과3교실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "영자신문부(KyunggiYouth)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<영자신문부(KyunggiYouth)>>\\n\\n위치: 학생동 3층 2학년 6반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "신문부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<신문부>>\\n\\n위치: 화동관 2층 1학년 7반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "실용음악부(홍련)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<실용음악부(홍련)>>\\n\\n위치: 화동관 4층 1학년 1반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "심리부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<심리부>>\\n\\n위치: 학생동 2층 1학년 8반\\n부스 소개: 들어오는 순간 당신은 이미 동아리의 매력에 흠뿍 취해 헤어나올수 없을겁니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "아이스하키부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<아이스하키부>>\\n\\n위치: 학생동 1층 1학년 13반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "연극부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<연극부>>\\n\\n위치: 화동관 1층 멀티미디어실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "영어토론부(OAK)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<영어토론부(OAK)>>\\n\\n위치: 화동관 3층 1학년 2반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "오케스트라부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<오케스트라부>>\\n\\n위치: 문화관\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "유네스코부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<유네스코부>>\\n\\n위치: 학생동 층 2학년 1반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "이디엠(EDM)부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<이디엠(EDM)부>>\\n\\n위치: 화동관 2층 1학년 5반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "창의수학탐구부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<창의수학탐구부>>\\n\\n위치: 학생동 1층 1학년 12반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "창의융합과학부(CSS)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<창의융합과학부(CSS)>>\\n\\n위치: 과학동 층 지학실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "천문학부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<천문학부>>\\n\\n위치: 학생동 3층 2학년 5반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "축구부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<축구부>>\\n\\n위치: 학생동 층 2학년 10반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "컴퓨터부(CE-L)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<컴퓨터부(CE-L)>>\\n\\n위치: 학생동 층 2학년 3반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "항공부(KAST)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<항공부(KAST)>>\\n\\n위치: 학생동 2층 1학년 9반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "헬스부") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<헬스부>>\\n\\n위치: 학생동 2층 1학년 11반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "화학부(KCC)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<화학부(KCC)>>\\n\\n위치: 과학동 층 화학실\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "힙합댄스부(매드스텝)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<힙합댄스부(매드스텝)>>\\n\\n위치: 화동관 2층 1학년 6반\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
            }
          }';
    }
    else if ( strpos($content, "힙합음악부(Absolute)") !== false ) {
      echo '{
            "message" :
            {
              "text" : "<<힙합음악부(Absolute)>>\\n\\n위치: 체육관\\n부스 소개: 해당 부서 부장이나 담당자가 아직 부스 소개를 입력하지 않았습니다. \\n\\n다른 동아리를 찾고 싶으면 아래에서 다시 검색해 주세요 :)"
            },
            "keyboard" :
            {
              "type" : "buttons",
              "buttons" : ["동아리 이름으로 찾기", "위치로 찾기", "동아리 주제로 찾기", "컨텐츠 추천", "처음으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                  "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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
                "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
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

else{
    echo '{
          "message" :
          {
            "text" : "지금 말한게 뭔지 모르겠는걸 ㅠ 아래 버튼 중에서 다시 선택해볼래?"
          },
          "keyboard" :
          {
            "type" : "buttons",
            "buttons": ["화동제 도우미 (부스 정보, 시설 정보, 행사 정보)", "급식 식단", "교통정보", "날씨", "시간표", "학사력", "개발자", "메인으로"]
          }
    }';
}
?>
