$conn = mysqli_connect("localhost", "root", "123456789");
mysqli_select_db($conn, "timetabledb");
$list = file("list.txt");
$id = $list[0];
$id = rtrim($id, "\r\n");
