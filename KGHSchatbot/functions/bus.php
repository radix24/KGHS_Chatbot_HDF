<?
$route = $_GET['route'];
$station =  $_GET['station'];
$serviceKey="94qO6gPJpfIPXPHzYydPb4FVAi8a%2B%2FiHJBys4hPMJ0EePgukYE49Q0jEwEGnjZYXs4OsWYFdiaEBBdFOpTtviQ%3D%3D";
$endpoint="http://openapi.gbis.go.kr/ws/rest/busarrivalservice";
switch($route){
    case "1500": $routeCode="218000010"; break;
    case "200": $routeCode="229000028"; break;
    case "9030": $routeCode="229000097"; break;
    case "9030_1": $routeCode="229000083"; break;
    case "66": $routeCode="229000018"; break;
    case "70": $routeCode="229000034"; break;
    case "80": $routeCode="229000020"; break;
    case "77_1": $routeCode="229000116"; break;
    case "77_2": $routeCode="229000117"; break;
    case "77_3": $routeCode="229000118"; break;
    case "5600": $routeCode="241006050"; break;
}
switch($station){
    case "sm": $stationCode="229000849"; break;
    case "tm": $stationCode="229000856"; break;
    case "cpp": $stationCode="229000857"; break;
    case "cpi": $stationCode="229000848"; break;
    case "cmu": $stationCode="229001342"; break;
    case "cmg": $stationCode="229001344"; break;
}
$url=$endpoint . "?serviceKey=" . $serviceKey . "&routeId=" . $routeCode . "&stationId=" . $stationCode;
$html=file_get_contents($url);
$xml=simplexml_load_string($html);
$json=json_encode($xml, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
$result=json_decode($json, true);
$first=$result['msgBody']['busArrivalItem']['predictTime1'];
$second=$result['msgBody']['busArrivalItem']['predictTime2'];
if($first > 1 && $first < 4){
    if($second != null){
        echo '잠시후 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스는 '.$second.'분 후에 도착합니다.';
    }else{
        echo '잠시후 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스의 정보는 없습니다.';
    }
}
if($first == 1){
    if($second != null){
        echo '지금 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스는 '.$second.'분 후에 도착합니다.';
    }else{
        echo '지금 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스의 도착정보는 없습니다.';
    }
}
if($first >= 4){
    if($second != null){
        echo $first.'분 후에 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스는 '.$second.'분 후에 도착합니다.';
    }else{
        echo $first.'분 후에 '.$route.'번 버스가 도착합니다. 다음 '.$route.'번 버스의 정보는 없습니다.';
    }
}
if($first == null){
    echo $route.'번 버스의 도착정보가 없습니다.';
}
?>
