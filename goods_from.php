<!-- 新增書籍資料 -->
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

<body>
  <div class="container">
<!-- book_head -->
    <div id="book_head">
      <a href="test.php">
        <img src="1.jpg" alt="古書鋪" class="img-responsive">
      </a>
    </div>
<!-- book_main -->
    <div id="book_main" class="row">
      <div class="col-md-9 col-sm-8"><h1>編輯商品</h1>
        <form action="tool.php" method="post" class="form-horizontal" role="form">
          <div class="form-group">
            <label class="col-md-2 control-label">書籍名稱:</label>
            <div class="col-md-10">
               <input type="text" class="form-control" name="goods_title" id="goods_title" placeholder="請輸入書名" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">書籍簡介:</label>
            <div class="col-md-10">
               <textarea class="form-control" name="goods_content" id="goods_content" placeholder="請輸入書籍介紹"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-2 control-label">書籍價格:</label>
            <div class="col-md-10">
               <input class="form-control" name="goods_price" id="goods_price" placeholder="請輸入價格" value="">
            </div>
          </div>

         <div class="form-group">
            <div class="col-md-offset-2 col-md-10">
               <button type="submit" class="btn btn-primary" name="op" value="insert_goods">儲存書籍</button>
            </div>
          </div>

        </form>
      </div>

      <div class="col-md-3 col-sm-4">
        <div class="panel panel-primary">
          <div class="panel-heading">功能表</div>
            <div class="panel-body">
            </div>
<!-- php -->
<?php
require_once "config.php";
require_once "function.php";
session_start();
echo "<div class='alert alert-success' id='welcome'>" . $_SESSION['name'] . "您好，歡迎光臨" . _BOOK_NAME . "</div>";
echo "<a href='test.php?op=user_logout' class='btn btn-block btn-primary' id='reset'>登出</a>";
echo "<a href='goods_from.php?op=goods_form' class='btn btn-block btn-success' id='update'>發布新書</a>";
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
