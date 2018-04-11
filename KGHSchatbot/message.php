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
                        "buttons": ["오늘", "내일", "모레", "어제"]
                    }
                }';
            break;

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

            case "학사력":
                echo '
                  {
                      "message":
                      {
                          "text": "준비중인 기능입니다."
                      },
                }';
            break;

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
                            "buttons": ["오늘", "내일"]
                        }
                    }';
            break;

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
