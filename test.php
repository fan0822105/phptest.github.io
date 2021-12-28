<!-- 主頁 -->
<!DOCTYPE html>
<html lang="zh-Hant">
<head>
  <title>古書鋪</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--BootStrap-->
  <link rel="stylesheet" href="class/bootstrap/css/bootstrap.min.css">
  <!--jQuery-->
  <script src="class/jquery.min.js"></script>
  <script src="class/jquery-migrate.min.js"></script>
<!--jQuery UI-->
<link rel="stylesheet" href="class/jquery-ui/jquery-ui.min.css">
<script src="class/jquery-ui/jquery-ui.min.js"></script>
  <!--Font awesome-->
  <link rel="stylesheet" href="class/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="style.css">
</head>
<script>
    function check_data()
    {
      if (document.myForm.account.value.length==0)
        alert("帳號欄位不可以空白!");
      else if (document.myForm.password.value.length==0)
        alert("密碼欄位不可以空白!");
      else
        myForm.submit();
    }
  </script>
<body>
  <div class="container">
<!-- book_head -->
    <div id="book_head">
      <img src="1.jpg" alt="古書鋪" class="img-responsive">
    </div>
<!-- book_main -->
    <div id="book_main" class="row">
      <div class="col-md-9 col-sm-8">主內容區</div>
      <div class="col-md-3 col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">功能表</div>
            <div class="panel-body">
              <form action="test.php" name="myForm" method="post" role="form" class="form-horizontal">
                <div class="form-group">
                  <label class="col-md-4" control-label>帳號:</label>
                  <div class="col-md-8">
                    <input type="text" name="account" class="form-control" placeholder="請輸入帳號">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-md-4" control-label>密碼:</label>
                  <div class="col-md-8">
                    <input type="text" name="password" class="form-control" placeholder="請輸入密碼">
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-md-4"></label>
                  <a href="forget.php">忘記密碼?</a>
                  <div class="col-md-4">
                     <button type="button" name="button" class="btn btn-primary btn-block" onclick="check_data()">送出</button>
                  </div>
                </div>
              </form>
            </div>
            <div class="panel-heading">
              <label class="col-md-7">沒有帳號嗎?</label>
              <a href="join.html" id="join_btn">註冊</a>
            </div>
            <!-- php -->
<?php
if (isset($_POST["account"])) {
    require_once "dbtools.inc.php";
    header("Content-type: text/html; chareset= utf-8");
//取得表單資料
    $account  = $_POST["account"];
    $password = $_POST["password"];
//建立資料連接
    $link = create_connection();
//檢查帳號密碼是否正確
    $sql    = "SELECT*FROM member Where account = '$account' AND password='$password'";
    $result = execute_sql($link, "book_shop", $sql);
//若帳號密碼錯誤
    if (mysqli_num_rows($result) == 0) {
        //釋放$result佔用的記憶體
        mysqli_free_result($result);
        //關閉資料連接
        mysqli_close($link);
        //顯示訊息要求使用者輸入正確的帳號密碼
        echo "<div class='alert alert-success' id='welcome'>帳號密碼錯誤</div>";
    }
//若帳號密碼正確
    else {
        //將使用者資料加入Session
        session_start();
        $row                 = mysqli_fetch_object($result);
        $_SESSION["account"] = $row->account;
        $_SESSION["name"]    = $row->name;
        //釋放$result記憶體
        mysqli_free_result($result);
        //關閉資料連接
        mysqli_close($link);
        header("location:t1.php");
    }
}
?>
<!-- php結束 -->
        </div>
      </div>
    </div>
<!-- book_foot -->
    <div id="book_foot">
      <div>地址:xx市xx路xx號</div>
      <div>電話:(03)12345678</div>
    </div>
  </div>
</div>
  <!--BootStrap js-->
  <script src="class/bootstrap/js/bootstrap.min.js"></script>
</body>

</html>
