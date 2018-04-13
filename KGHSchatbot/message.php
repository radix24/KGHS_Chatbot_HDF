<?php
    $data = json_decode(file_get_contents('php://input'), true);
    $content = $data["content"];

    switch($content)
    {
            case "급식 식단":
                echo '
                {
                    "message":
                    {
                        "text": "급식 식단 메뉴에 들어온걸 환영해! 어느 날짜의 식단을 알려줄까? 잘못 눌렀으면 걱정 말고 아래의 돌아가기 버튼을 눌러주면 돼 :)"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["오늘 식단", "내일 식단", "모레 식단", "어제 식단"]
                    }
                }';
            break;            
            case "오늘 식단":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            case "내일 식단":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            case "모레 식단":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            case "어제 식단":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            
//식단 영역 종료
//시간표 영역 시작   

            case "시간표":
                echo '
                  {
                      "message":
                      {
                          "text": "시간표 메뉴에 들어온걸 환영해! 먼저 학년부터 알려줘! 잘못 눌렀으면 걱정 말고 아래의 돌아가기 버튼을 눌러주면 돼 :)"
                      },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["1학년", "2학년", "3학년"]
                    }
                }';
            break;            
            case "1학년":
                echo '
                    {
                        "message":
                        {
                            "text": "본인의 반을 선택해 주세요. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["1학년 1반", "1학년 2반", "1학년 3반", "1학년 4반", "1학년 5반", "1학년 6반", "1학년 7반", "1학년 8반", "1학년 9반", "1학년 10반", "1학년 11반", "1학년 12반", "1학년 13반", "1학년 14반"]
                        }
                    }';
            break;
            case "2학년":
                echo '
                    {
                        "message":
                        {
                            "text": "본인의 반을 선택해 주세요."
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["2학년 1반", "2학년 2반", "2학년 3반", "2학년 4반", "2학년 5반", "2학년 6반", "2학년 7반", "2학년 8반", "2학년 9반", "2학년 10반", "2학년 11반", "2학년 12반", "2학년 13반", "2학년 14반"]
                        }
                    }';
            break;
            case "3학년":
                echo '
                    {
                        "message":
                        {
                            "text": "본인의 반을 선택해 주세요. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["3학년 1반", "3학년 2반", "3학년 3반", "3학년 4반", "3학년 5반", "3학년 6반", "3학년 7반", "3학년 8반", "3학년 9반", "3학년 10반", "3학년 11반", "3학년 12반", "3학년 13반", "3학년 14반"]
                        }
                    }';
            break;  //반별 추가는 나중에- 코드 길이 길어짐 방지
            
//시간표 영역 종료
//학사력 영역 시작
            
            case "학사력":
                echo '
                  {
                      "message":
                      {
                          "text": "준비중인 기능입니다."
                      },
                }';
            break;
            
//학사력 영역 종료
//영역 시작

            case "교통정보":
                echo '
                    {
                        "message":
                        {
                            "text": "교통정보 메뉴에 들어온걸 환영해! 먼저 정문으로 나갈건지, 후문으로 나갈건지부터 알려줘! 잘못 눌렀으면 걱정 말고 아래의 돌아가기 버튼을 눌러주면 돼 :)"
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["정문", "후문"]
                        }
                    }';
            break;
            case "정문":
                echo '
                    {
                        "message":
                        {
                            "text": "어느 정류장의 정보가 궁금하신가요? "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["정류장A", "정류장B", "정류장 C"]
                        }
                    }';
            break;
            case "후문":
                echo '
                    {
                        "message":
                        {
                            "text": "어느 정류장의 정보가 궁금하신가요? "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["정류장A", "정류장B", "정류장 C"]
                        }
                    }';
            break;
            
//교통정보 영역 종료
//날씨 영역 시작

            case "날씨":
                echo '
                    {
                        "message":
                        {
                            "text": "날씨 메뉴에 들어온걸 환영해! 오늘 날씨를 알려줄까, 내일 날씨를 알려줄까? 잘못 눌렀으면 걱정 말고 아래의 돌아가기 버튼을 눌러주면 돼 :)"
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["오늘 날씨", "내일 날씨"]
                        }
                    }';
            break;            
            case "오늘 날씨":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            case "내일 날씨":
                echo '
                    {
                        "message":
                        {
                            "text": "API 준비중입니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            
//날씨 영역 종료
//개발자 영역 시작

            case "개발자":
                echo '
                    {
                        "message":
                        {
                            "text": "이 채팅봇은 (2018년 현재) 1-8 조현서가 개발했어 :) 개선사항이나 기능을 추가하고 싶다면 언제든지 E-Mail webmaster@inpase.io나 페이스북 메신저로 연락 줘!"
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break;
            
//개발자 영역 종료
//일반기기능종료
            case "돌아가기":
                echo '
                    {
                        "message":
                        {
                            "text": "돌아가기를 선택하셨습니다. 메인메뉴로 돌아갑니다. "
                        },
                        "keyboard":
                        {
                            "type": "buttons",
                            "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                        }
                    }';
            break; 
            
        default:
            echo '
                {
                    "message":
                    {
                        "text": "지금 말한게 뭔지 모르겠는걸 ㅠ 아래 버튼 중에서 다시 선택해볼래?"
                    },
                    "keyboard":
                    {
                        "type": "buttons",
                        "buttons": ["급식 식단", "시간표", "학사력", "교통정보", "날씨", "개발자"]
                    }
                }';
            break;
    }
?>
