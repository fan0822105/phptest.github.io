<?php
require_once "dbtools.inc.php";

$account  = $_POST["account"];
$password = $_POST["password"];
$name     = $_POST["name"];
$email    = $_POST["email"];
$phone    = $_POST["phone"];

//建立資料連接
$link = create_connection();
//檢查帳號是否有人申請
$sql    = "SELECT*FROM member Where account = '$account'";
$result = execute_sql($link, "book_shop", $sql);
//若帳號已經有人使用
if (mysqli_num_rows($result) != 0) {
    //釋放$result佔用的記憶體
    mysqli_free_result($result);
    //echo "string";
    //顯示訊息要求使用者更換帳號名稱
    //echo "<script type='text/javascript'>";
    $sMsg = "您所指定的帳號已經有人使用，請使用其他帳號";
    $sTag = '';
    //echo "history.back()";
    //echo "</script>";
    //exit;
}
//若帳號沒人使用
else {
    //釋放$result佔用的記憶體
    mysqli_free_result($result);
    //執行SQ命令，新增此帳號
    $sql    = "INSERT INTO member(account, password, name, email, phone) VALUES ('$account', '$password', '$name', '$email', '$phone')";
    $result = execute_sql($link, "book_shop", $sql);
    $sTag   = 'Y';
}
//關閉資料連接
mysqli_close($link);
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>新增帳號成功</title>
</head>
<body onload="alert('<?=$sMsg;?>');">
<?php
if ($sTag != '') {
    echo "<p align='center'>恭喜您已經註冊成功了，您的資料如下<br>
          帳號:<font> $account </font><br>
          密碼:<font> $password  </font><br><a href = 'test.php'>回首頁</a> </p> ";
} else {
    echo "<a href = 'join.html'>回上一頁</a>";
}
?>
</body>
</html>